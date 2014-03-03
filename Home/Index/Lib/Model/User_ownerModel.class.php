<?php
class User_ownerModel extends BaseModel {

	public function __construct(){
		parent::__construct();
	}

	protected function _after_find(&$resultSet,$options) {
		$data = D('User')->getById($resultSet['uid'], 'uid');
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
	}
}