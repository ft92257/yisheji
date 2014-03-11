<?php 
/**
 * 	案例表相关：信息的查询、修改、添加、删除
 */
class Question_attrModel extends BaseModel {
	
	protected $aOptions = array(
			'type' => array('1' => '家装', '2' => '工装'),
			'attr' => array('1' => '类型', '2' => '房型' , '3'=>'风格', '4'=>'费用'),
	);
	
	protected $listConfig = array(
			'number'=> '编号',
			'attr' => '属性',
			'status' => array('状态', array('audit')),
			array('操作',array('edit')),
	);
	protected $formConfig = array(
			'number' => array('编号', 'text',array('int')),
			'attr' => array('属性','select',array('all')),
			array('', 'submit'),
	);
	protected $searchConfig = array(
			'status' => array('状态：', 'radio_list'),
			'name' => array('作品名称：', 'text'),
			'createtime' => array('选择时间：', 'date'),
	);
	
	protected function _after_select(&$resultSet,$options) {
		foreach ($resultSet as &$value) {
			$this->_auto_process_data($value);
			$value['createtime'] = date('Y-m-d H:i', $value['createtime']);
		}
	}
}
?>