<?php
/**
 * 基础类
 */
class BaseAction extends Action {
	
	protected $oApp;//项目信息
	protected $oUser;//用户信息
	protected $oCom;//用户信息
	protected $aVerify = array();//需要验证的方法
	protected $model;
	protected $retType = 0;//返回数据格式 0：网页，1：ajax，自定义数组 array(状态字段  => 状态值, 消息字段 => 消息信息)
	
	public function __construct() {
		parent::__construct();
		//加载项目信息
		if (empty($_SESSION['app'])) {
			$_SESSION['app'] = (object) C('APP_INFO');
			$this->oApp = $data;
		} else {
			$this->oApp = $_SESSION['app'];
		}
		
		//加载用户数据
		$uid = D('Session')->check();
		if ($uid) {
			$oUser = D('User')->getObjectById($uid);
			$this->oUser = $oUser;
			$_SESSION['user'] = $oUser;

 			if(in_array($this->oUser->type, array(2,3)) ){
				$aCom =  D('Company')->getObjectById($this->oUser->id, 'uid');
				if (empty($aCom)) {
					$this->error('ERROR:没有公司信息！');
				}
				$_SESSION['company'] = $aCom;
				$this->oCom = $aCom;
			} else {
				D('Session')->destroy($this->oUser->id);
				$this->error('禁止操作！', U('User/login'));
			}
		} else {
			if (MODULE_NAME != 'User') {
				//redirect('index.php?s=/User/login');
				$this->error('请先登录', 'index.php?s=/User/login');
			}
		} 
		
		$this->assign('user', (array) $this->oUser);
		$this->assign('isCompany', ($this->oCom->type == 1 ? 1 : 0));
	}
	
	/*
	 * 是否装修公司管理员
	 */
	public function isAdmin() {
		return $this->oUser->id == $this->oCom->uid ? 1 : 0;
	}
	
	/*
	 * 获取对应权限的where条件
	 */
	public function getPurviewCondition() {
		$where = array('cid' => $this->oCom->id);
		if (!$this->isAdmin()) {
			$where['uid'] = $this->oUser->id;
		}
		
		return $where;
	}
	
	/*
	 * 判断数据是否有操作权限
	 */
	public function checkPurviewData($data) {
		if (empty($data)) {
			$this->error('没有该记录');
		}
		if ($data['cid'] != $this->oCom->id) {
			$this->error('非法操作！');
		}
		if (!$this->isAdmin() && $data['uid'] != $this->oUser->id) {
			$this->error('非法操作！');
		}
	}
	
	/*
	 * 是否已登录
	 */
	protected function isLogin() {
		return !empty($this->oUser);
	}
	

	/*
	 * ajax验证接口
	 * @param _NAME 验证单个字段是否合法，验证规则在model层$aValidate设置
	 * html用法： <input type="text" name="account" onblur="ajaxValidate(this)" />
	 */
	public function ajaxValidate() {
		$field = getRequest('FIELD');
		$value = getRequest('VALUE');

		die($this->model->ajaxValidate($field, $value));
	}

	/*
	 * 检测是否post
	 */
	public function checkPost($templateFile='',$charset='',$contentType='',$content='',$prefix='') {
		if (!$this->isPost()) {
			$this->display($templateFile, $charset, $contentType, $content, $prefix);
			die;
		}
	}

	/*
	 * 添加操作
	 */
	protected function _add($dataBase = array(), $returl = '', $return = false) {
		if ($returl == '') {
			$returl = U('index');
		}
		
		$data = $this->model->getFormData();
		if (!empty($dataBase)) {
			$data = array_merge($data, $dataBase);
		}
		
		if (!$this->model->getError()) {
			$newid = $this->model->addData($data);
			if ($newid) {
				if ($return) {
					return $newid;
				} else {
					$this->success('添加成功！', $returl);
					return;
				}
			}
		}
		if ($return) {
			return false;
		} else {
			$this->error($this->model->getError());
		}
	}
	
	/*
	 * 输出表单模版
	 */
	protected function _display_form($data = array(), $template = '') {
		$this->assign('formHtml', $this->model->getFormHtml($data));
		$this->display($template);
	}
	
	/*
	 * 修改记录
	 */
	protected function _edit($data, $dataBase = array(), $returl = '', $return = false) {
		if (isset($dataBase['_WHERE_'])) {
			$where = $dataBase['_WHERE_'];
			unset($dataBase['_WHERE_']);
		} else {
			$where = array('id' => $data['id']);
		}
		
		if ($returl == '') {
			$returl = U('index');
		}
		
		$newdata = $this->model->getFormData($data);
		if ($this->model->getError() || !$this->model->checkData($newdata)) {
			$this->error($this->model->getError());
		}
		
		$newdata = array_merge($newdata, $dataBase);
		if ($this->model->where($where)->data($newdata)->save() !== false) {
			if ($return) {
				return $newdata;
			} else {
				$this->success('编辑成功！', $returl);
				return;
			}
		} else {
			if ($return) {
				return false;
			} else {
				$this->error('编辑失败！', $returl);
			}
		}
	}
	
	/*
	 * 删除记录
	 */
	protected function _delete($where) {
		if ($this->model->del($where)) {
			$this->success('删除成功!');
		} else {
			$this->error('删除失败!');
		}
	}
	
	/*
	 * 获取分页列表
	 */
	protected function _getPageList($params) {
		$where = isset($params['where']) ? $params['where'] : array();
		$params['templete'] = isset($params['templete']) ? $params['templete'] : '';
		$params['pagesize'] = isset($params['pagesize']) ? $params['pagesize'] : 10;
		$params['vars'] = isset($params['vars']) ? $params['vars'] : array();
		
		$search = $this->model->getSearchCondition();
		$where = array_merge($where, $search);
		import('ORG.Util.Page');//导入分页类
		$count = $this->model->where($where)->count();
		$Page = new Page($count, $params['pagesize']);
		$this->assign('page', $Page->show());
		
		$data = $this->model->where($where)->order($params['order'])->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$searchHtml = $this->model->getSearchHtml();
		$listHtml = $this->model->getListHtml($data, $params['vars']);
		
		$this->assign('searchHtml', $searchHtml);
		$this->assign('listHtml', $listHtml);
		$this->display($params['templete']);
	}
	
	/*
	 * 获取数据列表，不分页
	*/
	protected function _getList($params) {
		$where = isset($params['where']) ? $params['where'] : array();
		$params['templete'] = isset($params['templete']) ? $params['templete'] : '';
		$params['vars'] = isset($params['vars']) ? $params['vars'] : array();
		
		$data = $this->model->where($where)->order($params['order'])->select();
		
		$listHtml = $this->model->getListHtml($data, $params['vars']);
		$this->assign('listHtml', $listHtml);
		
		$this->display($params['templete']);
	}
	
	/*
	 * 图片管理
	 */
	protected function _picture($type, $id) {
		$this->model = D('Picture');
		$data = $this->model->getTarget($type, $id);
		$this->checkPurviewData($data);
		$tab = $this->model->getTabTitle($type, $id, $data);
		$this->assign('tabTitle', $tab);
		$this->assign('condition', '/type/' . $type . '/target/' . $id);
		
		$params = array(
				'where' => array('type' => $type,	'target' => $id),
				'order' => 'createtime DESC',
				'templete' => 'Picture:index',
				'vars' => array('focus' => $data['focus']),
				);
		$this->_getList($params);
	}
	
	/*
	 * 审核
	*/
	protected function _audit() {
		$id = getRequest('id');
		$status = getRequest('status');
		if (!in_array($status, array('0', '-1', '-2'))) {
			die('非法操作！');
		}
		$ret = $this->model->where(array('id' => $id))->data(array('status' => $status))->save();
		if ($ret === false) {
			die('更新数据库失败！');
		} else {
			die('1');
		}
	}
	
	/*
	 * 自动更新列表字段
	 */
	public function _autoUpdate($where) {
		$field = getRequest('field');
		$value = getRequest('value');
		if ($this->model->where($where)->data(array($field => $value))->save() !== false) {
			$this->success('更新成功！');
		} else {
			$this->error('更新失败！');
		}
	}
	
	protected function error($message,$jumpUrl='',$ajax=false) {
		$retType = $this->retType;
		if (is_array($retType)) {
			$ret = array();
			$ret = array_merge($ret, $retType['error']);
			$ret = array_merge($ret, array($retType['msg'] => $message));
			unset($retType['success']);
			unset($retType['error']);
			unset($retType['msg']);
			$ret = array_merge($ret, $retType);
			
			die(json_encode($ret));
		} elseif ($retType == 1) {
			$this->dispatchJump($message,0,$jumpUrl, true);
		} else {
			$this->dispatchJump($message,0,$jumpUrl,$ajax);
		}
	}
	
	protected function success($message,$jumpUrl='',$ajax=false) {
		$retType = $this->retType;
		if (is_array($retType)) {
			$ret = array();
			$ret = array_merge($ret, $retType['success']);
			$ret = array_merge($ret, array($retType['msg'] => $message));
			unset($retType['success']);
			unset($retType['error']);
			unset($retType['msg']);
			$ret = array_merge($ret, $retType);
			
			die(json_encode($ret));
		} elseif ($retType == 1) {
			$this->dispatchJump($message,1,$jumpUrl, true);
		} else {
			$this->dispatchJump($message,1,$jumpUrl,$ajax);
		}
	}
	
	private function dispatchJump($message,$status=1,$jumpUrl='',$ajax=false) {
		if(true === $ajax || IS_AJAX) {// AJAX提交
			$data           =   is_array($ajax)?$ajax:array();
			$data['info']   =   $message;
			$data['status'] =   $status;
			$data['url']    =   $jumpUrl;
			$this->ajaxReturn($data);
		}
		if(is_int($ajax)) $this->assign('waitSecond',$ajax);
		if(!empty($jumpUrl)) $this->assign('jumpUrl',$jumpUrl);
		// 提示标题
		$this->assign('msgTitle',$status? L('_OPERATION_SUCCESS_') : L('_OPERATION_FAIL_'));
		//如果设置了关闭窗口，则提示完毕后自动关闭窗口
		if($this->get('closeWin'))    $this->assign('jumpUrl','javascript:window.close();');
		$this->assign('status',$status);   // 状态
		//保证输出不受静态缓存影响
		C('HTML_CACHE_ON',false);
		if($status) { //发送成功信息
			$this->assign('message',$message);// 提示信息
			// 成功操作后默认停留1秒
			if(!isset($this->waitSecond))    $this->assign('waitSecond','1');
			// 默认操作成功自动返回操作前页面
			if(!isset($this->jumpUrl)) $this->assign("jumpUrl",$_SERVER["HTTP_REFERER"]);
			$this->display(C('TMPL_ACTION_SUCCESS'));
		}else{
			$this->assign('error',$message);// 提示信息
			//发生错误时候默认停留3秒
			if(!isset($this->waitSecond))    $this->assign('waitSecond','3');
			// 默认发生错误的话自动返回上页
			if(!isset($this->jumpUrl)) $this->assign('jumpUrl',"javascript:history.back(-1);");
			$this->display(C('TMPL_ACTION_ERROR'));
			// 中止执行  避免出错后继续执行
			exit ;
		}
	}
}
?>