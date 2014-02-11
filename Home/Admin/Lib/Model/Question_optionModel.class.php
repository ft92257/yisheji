<?php 
/**
 * 	案例表相关：信息的查询、修改、添加、删除
 */
class Question_optionModel extends BaseModel {
	
	protected $aOptions = array(
			'type' => array('1' => '家装', '2' => '工装'),
			'attr' => array('1' => '风格', '2' => '面积' , '3'=>'油漆'),
	);
	
	protected $listConfig = array(
			'number'=> '编号',
			'answer' => '答案',
			'status' => array('状态', array('audit')),
			array('操作',array('edit')),
	);
	protected $formConfig = array(
			'number' => array('答案编号', 'text',array('int')),
			'answer' => array('答案', 'text',array('long')),
			'pic' => array('选择图片', 'file', '', array('thumbs' => '80-80')),
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