<?php
class CompanyAction extends BaseAction{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function companyDetails(){
		$this->model = D('Company');
		$data = $this->model->queryOne(array('id' => $this->para['id'])); 
		$this->assign('companyInfo', $data);
		
		$where = array(
				'cid' => $this->para['id']
				);
		$this->model = D('Active');
		$data = $this->model->getList($where, 'createtime desc', 1);
		$this->assign('activeList', $data);
		
		$this->model = D('House');
		$data = $this->model->getList($where, 'createtime desc', 3);
		$this->assign('house', $data);
		
		$this->model = D('User_designer');
		$data = $this->model->getList($where, 'createtime desc', 3);
		$this->assign('designer', $data);
		
		$this->model = D('Case');
		$data = $this->model->getList($where, 'createtime desc', 3);
		$this->assign('case', $data);
		
		$this->display();
	}
	
}