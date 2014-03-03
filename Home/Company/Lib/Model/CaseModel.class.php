<?php 
/**
 * 	案例表相关：信息的查询、修改、添加、删除
 */
class CaseModel extends BaseModel {
	protected $aValidate = array(
			array('name', 'required', '请填写案例名称！'),
	);
	
	protected $aOptions = array(
			'decoration_type' => array('1' => '家装', '2' => '工装'),
			'is_original' => array('1' => '原创', '0' => '转发'),
			'authorize' => array(
					'1' => '禁止匿名转载；禁止商业用途；禁止个人使用',
					'2' => '禁止匿名转载；禁止商业用途',
					'0' => '不限制用途',
			),
			'style' => array(
					'1'=>'现代风格',
					'2'=>'田园风格',
					'3'=>'中式风格',
					'4'=>'欧式风格',
					'5'=>'地中海风格',
					'6'=>'东南亚风格',
					'7'=>'美式风格',
					'8'=>'新古典风格',
					'9'=>'混搭风格',
					'99'=>'其它',
				),
			'htype' => array('1' => '连锁店', '2' => '办公室', '3' => '实验室', '4' => '公共空间','5'=>'会所','6'=>'百货公司')

	);
	
	protected $formConfig = array(
			'name' => array('作品名称', 'text'),
			'is_original' => array('类型', 'radio'),
			'source' => array('来源', 'text'),
			'decoration_type' => array('装修类型', 'select'),
			'style' => array('风格', 'select', array('all')),
			'housetype' => array('户型', 'text', '例：3室1厅'),
			'htype' => array('工装类型', 'select', array('all')),
			'info' => array('说明', 'textarea'),
			'createdate' => array('创作日期', 'date'),
			'authorize' => array('作品授权', 'radio', array('br')),
			'design_fee' => array('费用', 'text', array('int', '元')),
			'tags' => array('标签', 'tags'),
			'recommend' => array('推荐（排序值）', 'text', array('int', '数值大的优先出现在首页')),
			'hot' => array('热门（排序值）', 'text', array('int', '数值大的优先出现在热门栏目')),
			array('', 'submit'),
	);
	
	protected $listConfig = array(
			'id' => '编号',
			'account' => '发布者',
			'name' => '作品名称',
			'decoration_type' => '装修类型',
			'style' => '风格',
			'design_fee' => '费用(元)',
			'recommend' => '推荐',
			'hot' => '热门',
			'createtime' => '添加时间',
			array('操作', array('edit', 'delete', 'picture')),
	);
	
	protected $searchConfig = array(
			'name' => array('作品名称：', 'text'),
			'createtime' => array('选择时间：', 'date'),
	);
// 删除成功后的回调方法
    protected function _after_delete($data,$options) {}
	protected function _after_select(&$resultSet,$options) {
		$model = D('User');
		foreach ($resultSet as &$value) {
			$this->_auto_process_data($value);
			$value['account'] = $model->where(array('id'=>$value['uid']))->getField('account');
			$value['createtime'] = date('Y-m-d H:i', $value['createtime']);
		}
	}
	protected function _after_update($data,$options) {
		$aData = $this->where($options['where'])->find();
		
		$this->setUserRecommend($aData['uid']);
	}
	/*
	 * 全文搜索添加记录
	*/
	protected function _after_insert($data,$options) {
		$this->_auto_process_data($data);
		$fields = 'name,is_original,decoration_type,style,housetype,htype,info';
		D('Search')->addRecord($data, $fields, 2);
		
		//增加设计师的案例数量
		D('User_designer')->where(array('uid' => $data['uid']))->setInc('case_count');
		
		$this->setUserRecommend($data['uid']);
	}
	public function del($condition) {
		return $this->where($condition)->data(array('status'=>-2))->save();
	}
	public function setUserRecommend($uid) {
		//查询用户 如果是设计师
		$aUser = D('User')->getById($uid);
		if($aUser['type'] == 2) {
			$model = D('User_designer');
		} else if($aUser['type'] == 3) {
			$model = D('Company');
		} else {
			return ;
		}
		$aDer = $model->getById($uid,'uid');
		
		//查询推荐的记录
		$aData = $this->where(array('uid'=>$uid))->order('recommend desc,createtime desc')->find();
		//组装cache数组
		$aCache = json_decode($aDer['cache'],true);
		$aCache['case'] = array('id'=>$aData['id'],'name' => $aData['name'],'focus'=>getFileUrl($aData['focus']));
		
		$model->where(array('uid'=>$uid))->data(array('cache'=>json_encode($aCache)))->save();
		echo "sql:".$model->getLastSql();exit;
		//更新cache字段
		
	}
}
?>