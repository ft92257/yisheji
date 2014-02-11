<?php
class PublicAction extends Action{
	
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

}