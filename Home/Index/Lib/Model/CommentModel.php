<?php
class CommentModel extends BaseModel{
	
	public function __construct(){
		parent::__construct();
	}
	
	protected function _after_find(&$resultSet,$options) {
		
		//$resultSet['focus_img'] = getFileUrl($resultSet['focus']);
	}
	
	public function commentByCase($id){
		return array('type' => 1, 'target' => $id);
	}
	
	public function replyOfComment($id){
	}
}