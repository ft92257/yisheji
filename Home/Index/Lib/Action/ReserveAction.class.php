<?php 
class ReserveAction extends BaseAction {

	public function __construct() {
		parent::__construct();
	}
	
	public function add() {
		#ID不存在退出预约
		switch($this->para['type']){
			case '3':
				$company =  D('Company')->where(array('uid' => $this->para['uid']))->find();
				if(empty($company)){
					$this->resultFormat(null, -1);
				}
				break;
			case '2':
				$user_designer =  D('User_designer')->where(array('uid' => $this->para['uid']))->find();
				if(empty($user_designer)){
					$this->resultFormat(null, -1);
				}
				break;
		}
		$this->model = D('Reserve');
		$res = $this->model->queryOne(array('target' => $this->para['uid'], 'type' => $this->para['type'],  'uid' => $this->oUser['id'], 'handle' => 0));
		if(!empty($res)){
			$this->resultFormat(null, 0, '您已经提交过一次预约，在未处理之前不能重复预约');
		}
		#设计师/企业扣款金额
		$cost = 100;
		$reserve_count = 1;
		$this->model = D('Reserve');
		$count = $this->model->where(array('uid' =>$this->oUser['id']))->group('target')->count();
		#业主扣款金额，前3次预约免费
		$user_cost = $count >= 3 ? 100 : 0;
		#重复预约的双方都不扣款
		$where = array(
					'uid' => $this->oUser['id'],
					 'target' => $this->para['uid']
				);
		
		$res = $this->model->queryOne($where);
		if(!empty($res)){
			$cost = 0;
			$user_cost = 0;
			$reserve_count = 0;
		}
		#执行扣款,记录消费流水
		$cid = $this->para['type'] == 2 ? 0 : $this->para['cid'];
		$data = array(
				'cid' => $cid,
				'type' => 1, 
				'name' => '预约扣款',
				);
		$this->model= D('User');
		$money = $this->model->where(array('id' => $this->oUser['id']))->getField('money');
		
		if($money < $user_cost){
			$this->resultFormat(null, 0, '您的账户余额不足');
		}
		$where = array('id' => $this->oUser['id']);
		$data = array('money' => ($money - $user_cost));
		
		if($this->model->update($data, $where) === false){
			$this->resultFormat(null, 0, $this->model->getLastSql());
		}
		
		$data = array(
					'uid' => $this->oUser['id'],
					'target' => $this->para['uid'],
					'money' => $user_cost
				);
		
		$this->model = D('Money');
		if($this->model->insert($data) === false){
			$this->resultFormat(null, 0, $this->model->getLastSql());
		}
		$this->model = D('User');
		$where = array('id' => $this->para['uid']);
		$money = $this->model->where($where)->getField('money');
		
		if($money < $cost){
			$charged = 0;
		}else{
			$where = array('id' => $this->para['uid']);
			$data = array('money' => ($money - $cost));
			if($this->model->update($data, $where) === false){
				$this->resultFormat(null, 0, $this->model->getLastSql());
			}
			$data['uid'] = $this->para['uid'];
			$data['target'] = $this->oUser['id'];
			$data['money'] = $cost;
			$charged = 1;
		}
		
		$this->model = D('Money');
		if($this->model->insert($data) === false){
			$this->resultFormat(null, 0, $this->model->getLastSql());
		}
		
		
		#添加预约记录
		$this->model = D('Reserve');
		$data = array(
			'cid' => $cid,
			'uid' => $this->oUser['id'],
			'type' => $this->para['type'],
			'target' => $this->para['uid'],
			'name' => $this->para['name'],
			'telephone' => $this->para['telephone'],
			'charged' => $charged
		);
		if($this->model->insert($data) === false){
			$this->resultFormat(null, 0, $this->model->getLastSql());
		}
		#更新设计师预约记录
		switch($this->para['type']){
			case '3':
				$this->model = D('Company');
				$where = array('uid' => $this->para['uid']);
				$data = array('reserve_count' => ($company['reserve_count'] + $reserve_count));
				break;
			case '2':
				$this->model = D('User_designer');
				$where = array('uid' => $this->para['uid']);
				$data = array('reserve_count' => ($user_designer['reserve_count'] + $reserve_count));
				break;
		}
		$res = $this->model->update($data, $where);
		$res !== false ? $this->resultFormat(null, 1, '预约成功') : $this->resultFormat(null, 0, $this->model->getLastSql());
	}
	
	public function getcode() {
		
		$mobile = getRequest('mobile');
		//检测手机号码格式
		if (!checkMobile($mobile)) {
			die('手机号码格式不正确！');
		}
		
		$code = D('Code')->getCode($mobile);
		if (empty($code)) {
			die('您的操作太频繁了，请稍后再试！');
		} else {
			$msg = "您的验证码是：" . $code;
			$ret = sendMobileMsg($mobile, $msg);
			var_dump($ret);
		}
	}
}

?>