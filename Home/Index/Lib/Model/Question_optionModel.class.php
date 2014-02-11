<?php
class Question_optionModel extends BaseModel {

	public function __construct(){
		parent::__construct();
	}

	protected function _after_find(&$resultSet,$options) {
		$resultSet['focus_img'] = getFileUrl($resultSet['pic']);
	}
}