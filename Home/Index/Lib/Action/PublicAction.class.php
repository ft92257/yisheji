<?php
class PublicAction extends BaseAction{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function activeApplyForm(){
		$this->display();
	}
	
	public function indexHouse(){
		$this->display();
	}
	
	public function indexCase(){
		$this->display();
	}
	
	public function indexDesigner(){
		$this->display();
	}
	
	public function indexActive(){
		$this->display();
	}
	
	public function header_zc(){
		$this->display();
	}
	
	public function header(){
		$this->display();
	}
	
	public function footer_zc(){
		$this->display();
	}

}