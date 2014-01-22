<?php
class CompanyAction extends BaseAction{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function companyDetails(){
		$this->display();
	}
	
}