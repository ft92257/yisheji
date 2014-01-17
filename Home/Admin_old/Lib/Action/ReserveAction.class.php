<?php
	/*
	 * 样板房
	 */


	class ReserveAction extends BaseAction {
			
		//需要验证的方法
		protected $aVerify = array(
		);
		
		public function __construct() {
			parent::__construct();
			$this->model = D('Reserve');
		}
		public function reserveList(){
			if($this->isLogin()) {
				import('ORG.Util.Page');//导入分页类
				if(!$this->isPost()){
			        $count = $this->model->where(array(status=>0))->count();
			        $Page = new Page($count,5);
			        $show = $Page ->show();
			        $data = $this->model->where(array(status=>0))->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			        $this->assign('page',$show); 
					$this->assign('data',$data);
					$this->display();			
				}
			}	
		}		
	}