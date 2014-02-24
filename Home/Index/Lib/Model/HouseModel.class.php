<?php
class HouseModel extends BaseModel {
	
	public function __construct(){
		parent::__construct();
	}
	
	protected function _after_find(&$resultSet,$options) {
		$resultSet['housetype_zh'] = $this->_aBaseOptions['housetype'][$resultSet['housetype']];
		$resultSet['style_zh'] = $this->_aBaseOptions['style'][$resultSet['style']];
		$resultSet['focus_img'] = getFileUrl($resultSet['focus']);
		$resultSet['header'] = getFileUrl($resultSet['uid']);
		if(!empty($this->oCollect['house'])){
			foreach($this->oCollect['house'] as $i){
				if($i['target'] == $resultSet['id'] && $i['type'] == 2){
					$resultSet['is_collect'] = 1;
				}
			}
		}
		$resultSet['info_j'] =  infoFormat($resultSet['info']);
		$resultSet['picture'] = D('Picture')->where(array('type'=>3, 'target' => $resultSet['id']))->select();
		$resultSet['material'] = explode("\n", $resultSet['material']);
		$resultSet['owner_interview'] = json_decode($resultSet['owner_interview'], 1);
		$resultSet['designer_interview'] = json_decode($resultSet['designer_interview'], 1);
		$resultSet['cons_interview'] = json_decode($resultSet['cons_interview'], 1);
		$resultSet['jl_jump'] = "http://yijianli.com/house/index.php?s=/Case/detail/id/{$resultSet['jl_id']}";
	}
}