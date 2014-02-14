<?php
class ActiveModel extends BaseModel {

	public function __construct(){
		parent::__construct();
	}

	protected function _after_find(&$resultSet,$options) {
		if(!empty($this->oCollect['active'])){
			foreach($this->oCollect['active'] as $i){
				if($i['target'] == $resultSet['id']  && $i['type'] == 3){
					$resultSet['is_collect'] = 1;
				}
			}
		}
		$resultSet['focus_img'] = getFileUrl($resultSet['focus']);
		$resultSet['picture'] = D('Picture')->where(array('type'=>3, 'target' => $resultSet['id']))->select();
		$resultSet['join_count'] = D('Active_partner')->where(array('type' => 1, 'aid' => $resultSet['id']))->count();
		$resultSet['info_j'] =  infoFormat($resultSet['info']);
	}
}
