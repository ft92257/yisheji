<?php
class PictureModel extends BaseModel {

	public function __construct(){
		parent::__construct();
	}
	
	protected function _after_find(&$resultSet,$options) {
		$resultSet['fid_img'] = getFileUrl($resultSet['fid']);
		$resultSet['fid_img_thumb'] = getFileUrl($resultSet['fid'], '80-80');
		$resultSet['nickname'] = D('user')->where(array('id' => $resultSet['uid']))->getField('nickname');
		$resultSet['createtime_format'] = date('Y-m-d', $resultSet['createtime']);
	}
}