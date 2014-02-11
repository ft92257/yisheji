<?php
class CollectModel extends BaseModel {

	public function __construct(){
		parent::__construct();
	}
	
	protected function _after_find(&$resultSet,$options) {
		$resultSet['tags_zh'] = $this->_aBaseOptions['tags'][$resultSet['tags']];
		$resultSet['focus_img'] = getFileUrl($resultSet['pic']);
		$resultSet['tag_zh'] = formatTag($resultSet['tags']);
		
		switch($resultSet['type']){
			case '1':
				$resultSet['case'] = D('Case')->where(array('id' => $resultSet['target']))->find();
				$resultSet['info'] = $resultSet['case']['info'];
				$resultSet['designer'] = D('User_designer')->where(array('uid' => $resultSet['case']['uid']))->find();
				$resultSet['header'] = $resultSet['designer']['header'];
				break;
			case '2':
				$resultSet['house'] = D('House')->where(array('id' => $resultSet['target']))->find();
				$resultSet['info'] = $resultSet['house']['info'];
				$resultSet['designer'] = D('User_designer')->where(array('uid' => $resultSet['case']['uid']))->find();
				$resultSet['header'] = $resultSet['designer']['header'];
				break;
		} 
	}
}
