<?php
class IndexAction extends BaseAction{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index(){
		#企业LOGO推广
		$this->assign('companyLogo', $this->getCompanyLogo());
		
		$this->model = D('Active');
		$data = $this->model->getList(array('type' => 1), 'recommend desc,createtime desc', 3);
		$this->assign('activeType1', $data);
		$data = $this->model->getList(array('type' => 2), 'recommend desc,createtime desc', 3);
		$this->assign('activeType2', $data);
		$data = $this->model->getList(array('type' => 3), 'recommend desc,createtime desc', 3);
		$this->assign('activeType3', $data);
		$this->assign('returnUrl', urlencode('Index/index'));
		$this->display();

	}
	
	public  function getFeeRange($i){
		switch($i){
			case '1' : return array('min' => 0, 'max' => 50000);
			case '2' : return array('min' => 50001, 'max' => 200000);
			case '3' : return array('min' => 200001, 'max' => 500000);
			case '4' : return array('min' => 500001, 'max' => 9999999);
		}
	}
	
	public function indexHouse(){
		
		$this->model = D('House');
		$where = array();
		if($this->para['style']){
			$where = array('style' => $this->para['style']);
		}
		if($this->para['housetype']){
			$where = array('housetype' => $this->para['housetype']);
		}
		$data = $this->model->getList($where, 'recommend desc, createtime desc', 6);
		$this->assign('house', $data);
		
		$this->assign('style', $this->_aBaseOptions['style']);
		$this->assign('housetype', $this->_aBaseOptions['houseType']);
		$this->assign('search', $this->para);
		
		$this->display();
	}
	
	public function indexCase(){
		$this->model = D('Case');
		$where = array('decoration_type' => 1);
		if($this->para['style'] > 0){
			$where = array('style' => $this->para['style']);
		}
		if($this->para['housetype'] > 0){
			$where = array('housetype' => $this->para['housetype']);
		}
		$data = $this->model->getList($where, 'recommend desc, createtime desc', 6);
		$this->assign('caseType1', $data);
		
		$where = array('decoration_type' => 2);
		if($this->para['style']){
			$where = array_merge($where, array('style' => $this->para['style']));
		}
		if($this->para['housetype']){
			$where = array_merge($where, array('housetype' => $this->para['housetype']));
		}
		$data = $this->model->getList($where, 'recommend desc, createtime desc', 6);
		$this->assign('caseType2', $data);
		$this->assign('housetype', $this->_aBaseOptions['houseType']);
		$this->assign('style', $this->_aBaseOptions['style']);
		$this->assign('decorationType', $this->_aBaseOptions['decorationType']);
		$this->assign('search', $this->para);
		$this->display();
	}
	
	public function indexDesigner(){
		$this->model = D('User_designer');
		$where = array('ischeck' => 1);
		if($this->para['style']){
			$where = array_merge($where, array('style' => $this->para['style']));
		}
		if($this->para['design_fee']){
			$fee = $this->getFeeRange($this->para['design_fee']);
			$where = array_merge($where, array('_string' => "design_fee >= ".$fee['min']." and design_fee < ".$fee['max'] ));
		}
		if($this->para['service_area']){
			$where = array_merge($where, array('service_area' => $this->para['service_area']));
		}
		$data = $this->model->getList($where, 'recommend desc,createtime desc', 6);
		$this->assign('designer', $data);
		$this->assign('style', $this->_aBaseOptions['style']);
		$this->assign('design_fee', $this->_aBaseOptions['designFee']);
		$this->assign('service_area', $this->_aBaseOptions['serviceArea']);
		$this->assign('search', $this->para);
		$this->display();
	}
	
	public function indexActive(){
		$this->display();
	}
	
	
	private function getCompanyLogo(){
		return D('Company')->getList(false, 'ord desc, reserve_count desc', 7);
	}

}