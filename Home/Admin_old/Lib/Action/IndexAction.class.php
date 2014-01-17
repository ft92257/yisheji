<?php

	class IndexAction extends BaseAction {
		
		public function __construct() {
			parent::__construct();
		}
		
		public function index() {
			if(isset($_SESSION['user'])){
	           $this->display();
	        }else{
			$this->error('请先登录',U('/Manager/login'));
	        }
		}
		
		public function left() {
			$this->display();
		}
		
		public function top() {
		 if(!empty($_COOKIE['lastvisit'])) {
				$last = $_COOKIE['lastvisit'];
		        setcookie("lastvisit",date("Y-m-d H:i:s"),time()+24*3600*30);
	    }else{
	      //说明第一次登录
	     $last =  "你是第一次登录";
	    setcookie("lastvisit",date("Y-m-d H:i:s"),time()+24*3600*30);
	    }
	    $this->assign('last',$last);
		$this->display();
		}
		
	}
?>    