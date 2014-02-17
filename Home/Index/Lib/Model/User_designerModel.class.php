<?php
class User_designerModel extends BaseModel {

	public function __construct(){
		parent::__construct();
	}
	
	protected function _after_find(&$resultSet,$options) {
		$user = D('User');
		$data = $user->where(array('id' => $resultSet['uid']))->find();
		$resultSet = array_merge($data, $resultSet);
		$resultSet['sex_zh'] = $this->_aBaseOptions['sex'][$resultSet['sex']];
		$resultSet['style_zh'] = $this->_aBaseOptions['style'][$resultSet['style']];
		$resultSet['name_zh'] = $resultSet['nickname'] ? $resultSet['nickname'] : $resultSet['realname'];
		$resultSet['decoration_type_zh'] = $this->_aBaseOptions['decorationType'][$resultSet['decoration_type']];
		$resultSet['housetype_zh'] = $this->_aBaseOptions['houseType'][$resultSet['housetype']];
		$resultSet['designation_zh'] = $this->_aBaseOptions['designation'][$resultSet['designation']];
		$resultSet['service_area'] = $this->_aBaseOptions['serviceArea'][$resultSet['service_area']];
		$resultSet['ischeck_zh'] = $this->_aBaseOptions['ischeck'][$resultSet['ischeck']];
		$resultSet['header'] = getFileUrl($resultSet['avatar']);
		$resultSet['avg_score'] = ($resultSet['score_skill'] + $resultSet['score_service']) / 2;
		$resultSet['star_html'] = getStar($resultSet['avg_score']);
		$resultSet['info_j'] =  infoFormat($resultSet['info']);
	}
	
	public function getAvgScore(){
		$arr['avg_score_skill'] = $this->avg('score_skill');
		$arr['avg_score_service'] = $this->avg('score_service');
		return $arr;
	}
	
	public function getHotDesigner($limit = 8){
		return $this->getList(array('ischeck' => 1), 'reserve_count desc', $limit);
	}
	 
}