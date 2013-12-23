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
	 * 注册 TODO 装修公司和设计师注册
	*/
	public function register() {
		if (!$this->isPost()) {
			$this->_display_form();
		} else {
			$database = array(
				'type' => 1,//普通用户
				'reg_ip' => get_client_ip(),
			);
			$uid = $this->_add($database, '', true);
			if ($uid) {
				//TODO同步添加旧版数据
				
				$this->model->login();
				$this->success('注册成功！', U('/Index/index'));
			} else {
				$this->error($this->model->getError());
			}
		}
	
	}
	
	/*
	 * 登录
	*/
	public function login() {
		if ($this->isLogin()) {
			$this->error('您已经登录了', U('/Index/index'));
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
		D('Session')->destroy($this->oUser->id);
		$this->success('退出成功！');
	}
	
	public function qq_login() {
		require_once "./public/Library/qqAuth/qqConnectAPI.php";
		$qc = new QC();
		$qc->qq_login();
	}
	
	public function qq_callback() {
		require_once "./public/Library/qqAuth/qqConnectAPI.php";
		$qc = new QC();
		echo $qc->qq_callback();
		echo $qc->get_openid();
		
		$arr = $qc->get_user_info();
		
		echo '<meta charset="UTF-8">';
		echo "<p>";
		echo "Gender:".$arr["gender"];
		echo "</p>";
		echo "<p>";
		echo "NickName:".$arr["nickname"];
		echo "</p>";
		echo "<p>";
		echo "<img src=\"".$arr['figureurl']."\">";
		echo "<p>";
		echo "<p>";
		echo "<img src=\"".$arr['figureurl_1']."\">";
		echo "<p>";
		echo "<p>";
		echo "<img src=\"".$arr['figureurl_2']."\">";
		echo "<p>";
		echo "vip:".$arr["vip"];
		echo "</p>";
		echo "level:".$arr["level"];
		echo "</p>";
		echo "is_yellow_year_vip:".$arr["is_yellow_year_vip"];
		echo "</p>";
	}
}
?>