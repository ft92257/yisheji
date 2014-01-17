<?php 

/**
 * 	装修公司后台登陆
 */
class UserAction extends BaseAction {
  
	public function __construct() {
		parent::__construct();
	
		$this->model = D('User');
	}
	/*
	public function test() {
		$where = array(
				'type not in' => array(1,2,3),
				'qq like' => "%r'rr%",
				'money between' => array(1,2),
				"`account` = 'ffff'",
				'id > | uid <' => array(1,2),
				);
		//$this->model->w(array('id' => 2));
		$this->model->w($where, false);
		//$this->model->w();
		$this->model->select();
		echo $this->model->getLastSql();
	}*/
	
	
	/*
	 * 登录
	*/
	public function login() {
		if ($this->isLogin()) {
			redirect('admin.php');
		}
	
		if (!$this->isPost()) {
			$this->display();
			die;
		}
	
		if ($this->model->login()) {
			$this->success('登录成功！', U('/Index/index'));
		} else {
			$this->error($this->model->getError());
		}
	}
	
	/*
	 * 退出
	*/
	public function logout() {
		unset($_SESSION['admin_user']);
		$this->success('退出成功！');
	}
	
	
}
?>