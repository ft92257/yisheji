<?php 
/**
 * 	样板房模型
 */
class HouseModel extends BaseModel {
	
	protected $aOptions = array(
			'decoration_type' => array('1' => '家装', '2' => '工装'),
			'style' => array('1' => '地中海风格', '2' => '简约风格', '3' => '欧美风格'),
			'step' => array('1' => '隐蔽', '2' => '泥木', '3' => '油漆', '4' => '安装', '5' => '软装', '6' => '竣工'),
	);

	protected $listConfig = array(
			'id' => '编号',
			'name' => '名称',
			'decoration_type' => '装修类型',
			'step' => '阶段',
			'housetype' => '户型',
			'style' => '风格',
			'design_fee' => '设计费用(元)',
			'createtime' => '添加时间',
			'status' => array('状态', array('audit')),
			array('操作', array('<a href="index.php?s=/House/detail/id/{id}">详情</a>')),
	);
	
	protected $searchConfig = array(
			'status' => array('状态：', 'radio_list'),
			'name' => array('样板房名称：', 'text_submit'),
	);
	
	protected function _after_select(&$resultSet,$options) {
		foreach ($resultSet as &$value) {
			$this->_auto_process_data($value);
			$value['createtime'] = date('Y-m-d H:i', $value['createtime']);
		}
	}
}
?>