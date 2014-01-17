<?php
	/*
	 * 样板房
	 */


	class CaseAction extends BaseAction {
			
		//需要验证的方法
		protected $aVerify = array(
		);
		
		public function __construct() {
			parent::__construct();
			
			$this->model = D('Case');
		}
		/*
		 * 案例列表
		 */
		public function caseList(){
			if($this->isLogin()) {
				import('ORG.Util.Page');//导入分页类
				$Page = new Page($count,5);
				if(!$this->isPost()){
			        $count = $this->model->where()->count();
			        $show = $Page ->show();
			        $data = $this->model->where()->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			        $this->assign('page',$show); 
					$this->assign('data',$data);
					$this->display();			
				}else{
					$decoration = getRequest("decoration");
					$style = getRequest("style");
					$where= array('decoration_style'=>$decoration,'style'=>$style);
					if(!$where){
						$this->error('请填写查询条件');
					}else{
						$count = $this->model->where($where)->count();
						$show = $Page->show();
						$data = $this->model->where($where)->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
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