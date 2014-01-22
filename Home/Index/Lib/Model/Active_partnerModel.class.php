<?php
class Active_partnerModel extends BaseModel {

	public function __construct(){
		parent::__construct();
	}

	protected function _after_find(&$resultSet,$options) {
		$active = D('Active');
		$resultSet['active'] = $active->where(array('id' => $resultSet['aid']))->find();
	}

}
