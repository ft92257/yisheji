<?php 
/**
 * 后台用户登录
 */
class User_designerModel extends BaseModel {
	protected $aOptions = array(
		'ischeck' => array('0'=>'未申请','1' => '审核通过', '2' => '审核未通过','3'=>'等待审核'),
		'decoration_type' => array('1' => '家装', '2' => '工装'),
		'style' => array(
				'1'=>'意式风格',
				'2'=>'美国乡村',
				'3'=>'东南亚风格',
				'4'=>'简约主义',
				'5'=>'田园风格',
				'6'=>'中式',
				'7'=>'奢华',
				'8'=>'地中海风格'
			),
		'housetype' => array('1' => '连锁店', '2' => '办公室', '3' => '实验室', '4' => '公共空间'),
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
			'uid' => '编号',
			'account' => '账号',
			'avatar' => array('头像', array('img')),
			'realname' => '真实姓名',
			'nickname' => '昵称',
			'style' => '擅长风格',
			'design_fee' => '设计最低费用(元)',
			'housetype' =>'擅长户型',
			'decoration_type'=> '装修类型',
			'designation'=>'职称',
			'ischeck'=>array('审核状态',array('select'),'/Designer/ischeck/id/{id}'),
			'status' => array('状态', array('audit')),
		);
	protected $searchConfig = array(
			'status' => array('状态：', 'radio_list'),
			'ischeck'=>array('审核状态：','radio_list'),
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
			$data = D('User')->getById($value['uid']);
			$value['account'] = $data['account'];
			$value['realname'] = $data['realname'];
			$value['nickname'] = $data['nickname'];
			$value['avatar'] = getFileUrl($data['avatar']);
			$value['createtime'] = date('Y-m-d H:i', $value['createtime']);
		}
	}
}



?>