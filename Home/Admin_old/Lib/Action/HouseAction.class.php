<?php
	/*
	 * 样板房
	 */


	class HouseAction extends BaseAction {
			
		//需要验证的方法
		protected $aVerify = array(
		);
		
		public function __construct() {
			parent::__construct();
			
			$this->model = D('House');
		}
		public function houseList(){
			if($this->isLogin()) {
				import('ORG.Util.Page');//导入分页类
				if(!$this->ispost()){
			        $count = $this->model->where(array(status=>0))->count();
			        $Page = new Page($count,5);
			        $show = $Page ->show();
			        $data = $this->model->where(array(status=>0))->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			        $this->assign('page',$show); 
					$this->assign('data',$data);
					$this->display();			
				}else{
					$decoration = getRequest("decoration");
					$style = getRequest("style");
					$map = array('decoration_style'=>$decoration,'style'=>$style);
					if(!$map){
						$this->error('请填写查询条件');
					}else{
						$count = $this->model->where($map)->count();
						$Page = new Page($count,5);
						$show = $Page->show();
						$data = $this->model->where($map)->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
						if($data){
							$this->assign('page',$show); 
							$this->assign('data',$data);
						    $this->display();
						}else{
							$this->error('没有查到符合内容！',$_SERVER['HTTP_REFERER']);
						}
					}
				}
			}	
		}		
	}