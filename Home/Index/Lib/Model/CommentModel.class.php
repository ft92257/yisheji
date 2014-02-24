<?php
class CommentModel extends BaseModel{
	
	public function __construct(){
		parent::__construct();
	}
	
	protected function _after_find(&$resultSet,$options) {
		$data = D('User')->where(array('id' => $resultSet['uid']))->find();
		$resultSet = array_merge($data, $resultSet);
		$resultSet['header'] = getFileUrl($resultSet['avatar']);
		$resultSet['name_zh'] = $resultSet['nickname'] ? $resultSet['nickname'] : $resultSet['realname'];
		$resultSet['content'] = ubbReplace($resultSet['content']);
		$resultSet['createtime'] = date('Y-m-d h:i:s', $resultSet['createtime']);
		$resultSet['reply_arr'] = $this->replyFormat($resultSet['reply']);
		$resultSet['reply_c'] = sizeof($resultSet['reply_arr']);
	}
	
	private function replyFormat($reply){
		$reply = json_decode($reply, 1);
		foreach($reply as $i){ 
			$i['content'] = ubbReplace($i['content']);
			$i['createtime'] = date('Y-m-d h:i:s', $i['createtime']);
			$new[] = $i;
		}
		return array_reverse($new);
	}
}