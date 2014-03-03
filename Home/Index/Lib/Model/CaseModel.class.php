<?php
class CaseModel extends BaseModel {

	public function __construct(){
		parent::__construct();
	}
	
	protected function _after_find(&$resultSet,$options) {
		$resultSet['housetype_zh'] = $this->_aBaseOptions['houseType'][$resultSet['housetype']];
		$resultSet['style_zh'] = $this->_aBaseOptions['style'][$resultSet['style']];
		$resultSet['authorize_zh'] = $this->_aBaseOptions['authorize'][$resultSet['authorize']];
		$resultSet['focus_img'] = getFileUrl($resultSet['focus']);
		$user = D('User')->where(array('id' => $resultSet['uid']))->find();
		if($user['type'] == 2){
			$resultSet['user'] = D('User_designer')->where(array('uid'=> $user['id']))->find();
		} else if($user['type'] == 3){
			$resultSet['user'] = D('Company')->where(array('uid'=> $user['id']))->find();
		}
		$resultSet['user']['type'] = getFileUrl($user['type']);
		$resultSet['user']['header'] = getFileUrl($user['avatar']);
		$resultSet['user']['name_zh'] = $user['realname'] ? $user['realname'] : $user['nickname'];
		$resultSet['tag_zh'] = formatTag($resultSet['tags']);
		$resultSet['is_original_zh'] = $resultSet['is_original'] ? '原创' : '转发';
		$resultSet['createtime_zh'] = time_tran($resultSet['createtime']);
		$resultSet['info_j'] =  infoFormat($resultSet['info']);
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
	
	public function getCasePhoto($id){
		$where  =  array('type' => 2, 'target' => $id);
		return D('Picture')->getList($where);
	}
}
