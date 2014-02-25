<?php
class InitAction extends BaseAction {
	
	public function __construct() {
		parent::__construct();
	}
	public function addAll(){
		$this->addUser();
		$this->addCase();
		$this->addActive();
		$this->addHouse();
	}
	
	public function addUser(){
		$total = $_REQUEST['total'] ? $_REQUEST['total'] : 100;
		for($i = 1; $i <= $total; $i++){
			$this->model = D('User');
			$data = array(
					'appid' => 1,
					'type' => mt_rand(1, 2),
					'account' => 'username_'.$i,
					'password' => md5('123456'),
					'reg_ip' => ip2long($_SERVER["REMOTE_ADDR"]),
					'email' => time().'@qq.com',
					'mobile' => '13'.sprintf('%09d', mt_rand(100000000, 999999999)),
					'qq' => mt_rand(10000000, 9999999999),
					'isreal' => 1,
					'integral' => 500,
					'last_login' => time()+3600,
					'status' => 0,
					'createtime' => time()-3600,
					'avatar' => mt_rand(16, 18),
					'idnum' => '31011019'.sprintf('%05d', mt_rand(10000, 99999)).sprintf('%05d', mt_rand(10000, 99999)),
					'idcard' => 27,
					'bankcard' => '622202'.sprintf('%04d', mt_rand(1000, 9999)).sprintf('%04d', mt_rand(1000, 9999)).sprintf('%04d', mt_rand(1000, 9999)),
					'sex' => mt_rand(1, 2),
					'nickname' => '逗逗_'.$i,
					);
			if($data['type'] == 1) $data['realname'] = '业主_'.$i;
			if($data['type'] == 2) $data['realname'] = '设计师_'.$i;
			if($data['type'] == 3) $data['realname'] = '企业_'.$i;
			$uid = $this->model->insert($data);
			
			if($data['type'] == 1){
				$this->model = D('User_owner');
				$data = array(
						'appid' => 1,
						'uid' => $uid,
						'community' => '幸福小区',
						'decoration_type' => mt_rand(1, 2),
						'xqid' => 1,
						'address' => '上海市杨浦区幸福路幸福小区1号',
						'zipcode' => '200000',
						'budget' => 200,
						'housetype' => mt_rand(1, 6),
						'style' => mt_rand(1, 12),
						'info' => '我要装修我的新房',
						'status' => 0,
						'createtime' => $data['createtime']
				);
				$this->model->insert($data);
			} elseif ($data['type'] == 2){
				$this->model = D('User_designer');
				$data = array(
						'appid' => 1,
						'uid' => $uid,
						'cid' => mt_rand(0, 5),
						'style' => mt_rand(1, 12),
						'design_fee' => 200,
						'housetype' => mt_rand(1, 6),
						'decoration_type' => mt_rand(1, 2),
						'designation' => '一级建筑设计师',
						'service_area' => '上海',
						'ischeck' => mt_rand(0, 3),
						'info' => '我是一名专业的设计师',
						'reserve_count' => mt_rand(0, 100),
						'score_skill' => (mt_rand(10, 50)/10),
						'score_service' => (mt_rand(10, 50)/10),
						'status' => 0,
						'createtime' => $data['createtime'],
						'recommend' => mt_rand(0, 1)
				);
				$nationality = array('中国', '英国', '日本', '澳大利亚', '意大利');
				shuffle($nationality);
				$data['nationality'] = reset($nationality);
				$data['score_count'] = $data['reserve_count'];
				$this->model->insert($data);
			} 
		}
	}
	
	public function addCase(){
		$total = $_REQUEST['total'] ? $_REQUEST['total'] : 100;
		for($i = 1; $i <= $total; $i++){
			$this->model = D('Case');
			$data = array(
					'appid' => 1,
					'decoration_type' => mt_rand(1, 2),
					'focus' => mt_rand(8, 15),
					'community' => '幸福小区',
					'name' => '设计案例_'.$i,
					'is_original' => mt_rand(1, 2),
					'tags' => '1,2,3',
					'recommend' => mt_rand(0, 1),
					'hot' => mt_rand(0, 1),
					'housetype' => mt_rand(1, 6),
					'style' => mt_rand(1, 12),
					'comment_count' => mt_rand(0, 1000),
					'share_count' => mt_rand(0, 1000),
					'like_count' => mt_rand(0, 1000),
					'collect_count' => mt_rand(0, 1000),
					'info' => '大师级经典案例',
					'design_fee' => 200,
					'ord' => 0,
					'status' => 0,
					'createtime' => time()
			);
			if ($data['is_original'] == 1) $data['authorize'] = mt_rand(0, 2);
			if ($data['is_original'] == 2) $data['source'] = 'http://www.baidu.com';
			$data['uid'] = $_REQUEST['uid'] ? $_REQUEST['uid'] : mt_rand(1, 1000);
			$data['cid'] = $_REQUEST['cid'] ? $_REQUEST['cid'] : mt_rand(1, 1000);
			$this->model->insert($data);;
		}
	}
	
	public function addActive(){
		$total = $_REQUEST['total'] ? $_REQUEST['total'] : 100;
		for($i = 1; $i <= $total; $i++){
			$this->model = D('Active');
			$data = array(
					'appid' => 1,
					'title' => '活动_'.$i,
					'datetype' => mt_rand(1, 3),
					'begin_date' => '2014-01-01',
					'end_date' => '2014-06-30',
					'begin_time' => '10:00:00',
					'end_time' => '16:00:00',
					'plimit' => 0,
					'organizer' => '易设计网',
					'info' => '没事儿过来瞧一瞧',
					'address' => '上海市杨浦区国康路同济大学',
					'recommend' => mt_rand(1, 2),
					'hot' => mt_rand(1, 2),
					'comment_count' => mt_rand(0, 1000),
					'type' => mt_rand(0, 3),
					'cost' => 0,
					'collect_count' => mt_rand(0, 1000),
					'focus' => mt_rand(10, 15),
					'status' => 0,
					'createtime' => time()
			);
			$data['uid'] = $_REQUEST['uid'] ? $_REQUEST['uid'] : mt_rand(1, 1000);
			$data['cid'] = $_REQUEST['cid'] ? $_REQUEST['cid'] : mt_rand(1, 1000);
			$this->model->insert($data);
		}
	}
	
	public function addHouse(){
		$total = $_REQUEST['total'] ? $_REQUEST['total'] : 100;
		for($i = 1; $i <= $total; $i++){
			$this->model = D('House');
			$data = array(
					'appid' => 1,
					'decoration_type' => mt_rand(1, 2),
					'focus' => mt_rand(8, 15),
					'community' => '幸福小区',
					'name' => '样板房_'.$i,
					'is_original' => mt_rand(1, 2),
					'tags' => '1,2,3',
					'recommend' => mt_rand(0, 1),
					'hot' => mt_rand(0, 1),
					'housetype' => mt_rand(1, 6),
					'style' => mt_rand(1, 12),
					'comment_count' => mt_rand(0, 1000),
					'collect_count' => mt_rand(0, 1000),
					'info' => '大师级经典样板房',
					'design_fee' => 200,
					'contract_amount' => 200000,
					'material' => '',
					'owner_interview' => '',
					'designer_interview' => '',
					'cons_interview' => '',
					'ord' => 0,
					'status' => 0,
					'createtime' => time()
			);
			if ($data['is_original'] == 1) $data['authorize'] = mt_rand(0, 2);
			if ($data['is_original'] == 2) $data['source'] = 'http://www.baidu.com';
			$data['uid'] = $_REQUEST['uid'] ? $_REQUEST['uid'] : mt_rand(1, 1000);
			$data['cid'] = $_REQUEST['cid'] ? $_REQUEST['cid'] : mt_rand(1, 1000);
			$this->model->insert($data);
		}
	}
	
	public function del(){
		$arr = array(
				'User',
				'User_designer',
				'User_owner',
				'Case',
				'Active',
				'House'
				);
		foreach($arr as $val){
			D($val)->delete();
		}
	}
	
	public function getData(){
		$this->model = D($this->para['model']);
		if(isset($this->para['where']))
			$this->model->where($this->para['where']);
		$res = $this->model->select();
		echo $this->model->getLastSql();
		print_r('<pre>');
		print_r($res);
	}
	
	
}