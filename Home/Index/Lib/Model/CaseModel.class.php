<?php
class CaseModel extends BaseModel {

	public function __construct(){
		parent::__construct();
	}
	
	protected function _after_find(&$resultSet,$options) {
		$resultSet['housetype_zh'] = $this->_aBaseOptions['housetype'][$resultSet['housetype']];
		$resultSet['style_zh'] = $this->_aBaseOptions['style'][$resultSet['style']];
		$resultSet['authorize_zh'] = $this->_aBaseOptions['authorize'][$resultSet['authorize']];
		$resultSet['focus_img'] = getFileUrl($resultSet['focus']);
		$resultSet['designer'] = D('User_designer')->where(array('uid' => $resultSet['uid']))->find();
		$resultSet['header'] = $resultSet['designer']['header'];
		$resultSet['designer_name'] = $resultSet['designer']['realname'] ? $resultSet['designer']['realname'] : $resultSet['designer']['nickname'];
		$resultSet['tag_zh'] = formatTag($resultSet['tags']);
		$resultSet['is_original_zh'] = $resultSet['is_original'] ? '原创' : '转发';
		$resultSet['createtime_zh'] = time_tran($resultSet['createtime']);
		$resultSet['is_collect'] = 0;
		if(!empty($this->oCollect['case'])){
			foreach($this->oCollect['case'] as $i){
				if($i['target'] == $resultSet['id']  && $i['type'] == 1){
					$resultSet['is_collect'] = 1;
				}
			}
		}
	}
	
	public function getHotCase($limit = 6){
		return $this->getList(array(), 'comment_count desc, createtime desc', $limit);
	}
	
	public function getDesignerCase($uid, $limit = false){
		return $this->getList(array('uid' => $uid), 'createtime desc', $limit);
	}
}
