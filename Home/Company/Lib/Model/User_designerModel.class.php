<?php 
/**
 * 设计师模型
 */
class User_designerModel extends BaseModel {
	
	protected $aValidate = array(
							);
	
	protected $aOptions = array(
			'decoration_type' => array('1' => '家装', '2' => '工装'),
			'style' => array(
					'1'=>'现代风格',
					'2'=>'田园风格',
					'3'=>'中式风格',
					'4'=>'欧式风格',
					'5'=>'地中海风格',
					'6'=>'东南亚风格',
					'7'=>'美式风格',
					'8'=>'新古典风格',
					'9'=>'混搭风格'
				),

	);
	
	protected $formConfig = array(
			'account' => array('账号：', 'text'),
			'password' => array('密码：', 'password'),
			'repassword'=>array('确认密码：','password'),
			'realname'=>array('真实姓名：','text'),
			'nickname'=>array('昵称：','text'),
			'decoration_type' => array('装修类型：', 'select'),
			'style' => array('风格', 'select', array('all')),
			array('', 'submit'),
	);
	
	
	/*
	 * 获取公司所有设计师
	 */
	public function getAll() {
		$where = array(
					'cid' => $this->oCom->id,
				);
		
		return $this->where($where)->select();
	}
	
	protected function _after_select(&$resultSet,$options) {
		$User = D('User');
		foreach ($resultSet as &$value) {
			$aUser = $User->getById($value['uid']);
			$value['account']  =  $aUser['account'];
			$value['realname'] = $aUser['realname'];
			$value['nickname'] = $aUser['nickname'];
		}
	}
	
}



?>