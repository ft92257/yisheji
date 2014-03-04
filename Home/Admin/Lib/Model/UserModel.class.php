<?php 
/**
 * 后台用户登录
 */
class UserModel extends BaseModel {
	protected $aOptions = array(
		'type' => array('1' => '普通用户', '2' => '设计师','3' => '公司'),
		'sex' => array('0'=>'保密','1'=>'男','2'=>'女'),
	);
	/*
	 * 验证form字段规则
	*/
	protected $aValidate = array(
			array('account', 'required', '请填写用户名！'),
			array('account', 'unique', '该用户名已存在！'),
			array('password', 'required', '请填写密码！'),
			array('repassword', 'repeat', '两次密码输入不一致！', 'password'),
			array('realname', 'required', '请填写姓名！'),
			array('nickname', 'required', '请填写昵称！'),
	);

	protected $formConfig = array(
		'account' => array('用户名：', 'text'),
		'password' => array('密码：', 'password'),
		'repassword' => array('确认密码：', 'password'),
		'realname' => array('真实姓名', 'text'),
		'nickname' => array('昵称', 'text'),
		array('', 'submit'),
	);
	protected $listConfig = array(
			'id' => '编号',
			'type' => '类型',
			'account' => '账户',
			'sex' => '性别',
			'realname' => '真实姓名',
			'nickname' =>'昵称',
			'createtime' => '添加时间',
			'status' => array('状态', array('audit')),
			array('操作', array(
					'<a href="admin.php?s=/User/autologin/uid/{id}" target="_blank">编辑</a>',
				),),
	);
	protected $searchConfig = array(
			'type' =>array('类型：','radio_list'),
			'status' => array('状态：', 'radio_list'),
			'account' => array('账号：', 'text'),
			'createtime' => array('选择时间：', 'date'),
	);
	/*
	 * 扣款
	*/
	public function charge($id, $money) {
		$aManager = $this->getById($id);
		if ($aManager['money'] < $money) {
			return false;
		}
		$set = array(
				'money' => $aManager['money'] - $money,
		);
	
		return $this->where(array('id' => $id))->data($set)->save();
	}
	
	/*
	 * 根据帐号获取用户对象
	*/
	public function getUser($account) {
		$data = $this->where(array('account'=>$account))->find();
		return empty($data) ? null : (object) $data;
	}
	
	/*
	 * 用户登陆
	*/
	public function login($account, $password) {
		$account = getRequest('account');
		$password = getRequest('password');
	
		$oUser = $this->getUser($account);
		if (empty($oUser)) {
			$this->error = '对不起，用户名不存在！';
			return false;
		}
	
		if ($oUser->password != md5($password)) {
			$this->error = '对不起，密码不正确！';
			return false;
		}
	
		D('Session')->setKey($oUser);
	
		return $oUser;
	}
	protected function _after_select(&$resultSet,$options) {
		foreach ($resultSet as &$value) {
			$this->_auto_process_data($value);
			$value['createtime'] = date('Y-m-d H:i', $value['createtime']);
		}
	}
}



?>