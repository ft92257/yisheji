<?php
class ReserveModel extends BaseModel {

	public function __construct(){
		parent::__construct();
	}
	
	protected function _after_find(&$resultSet,$options) {
		
	}
}