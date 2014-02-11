<?php 
/**
 * 	案例表相关：信息的查询、修改、添加、删除
 */
class QuestionModel extends BaseModel {
	
	protected $aOptions = array(
			'type' => array('1' => '家装', '2' => '工装'),
			'attr' => array('1' => '风格', '2' => '面积' , '3'=>'油漆'),
	);
	
	protected $listConfig = array(
			'number' => '编号',
			'title' => '题目',
			'type' => '类型',
			'attr' => '属性',
			'status' => array('状态', array('audit')),
			array('操作', array('edit',array('/Question_option/add/id/{id}', '编辑答案'),array('/Question_option/index/id/{id}','答案列表'),
						)),
	);
	protected $formConfig = array(
			'number' => array('题目编号', 'text',array('int')),
			'title' => array('题目', 'text'),
			'type' => array('类型','select',array('all')),
			'attr' => array('属性','select',array('all')),
			array('', 'submit'),
	);
	protected $searchConfig = array(
			'status' => array('状态：', 'radio_list'),
			'title' => array('题目名称：', 'text'),
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