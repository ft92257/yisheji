<?php
class QuestionModel extends BaseModel {

	public function __construct(){
		parent::__construct();
	}

	protected function _after_find(&$resultSet,$options) {
		$this->model = D('Question_option');
		$resultSet['option'] = $this->model->where(array('qid' => $resultSet['id']))->select();
	}
	
	
}