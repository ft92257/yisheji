<?php
class CompanyModel extends BaseModel {
	
	public function __construct(){
		parent::__construct();
	}
	
	protected function _after_find(&$resultSet,$options) {
		$resultSet['logo_img'] = getFileUrl($resultSet['logo']);
		$resultSet['housetype_zh'] = $this->_aBaseOptions['housetype'][$resultSet['housetype']];
	}
}