<?php 
/**
 * 	案例表相关：信息的查询、修改、添加、删除
 */
class QuestionModel extends BaseModel {
	
	protected $aOptions = array(
			'type' => array('1' => '家装', '2' => '工装'),
			'attr' => array('1' => '类型', '2' => '房型' , '3'=>'风格', '4'=>'费用'),
	);
	
	public $attr =  array(
			'1' => array(
				'1' => '家装',
				'2' => '工装'
			),
			'2' => array(
					'1' => '一房',
					'2' => '二房',
					'3' => '三房',
					'4' => '四房及以上平层公寓',
					'5' => '复式',
					'6' => '别墅'
					),
			'3' => array(
					'1'=>'现代风格',
					'2'=>'田园风格',
					'3'=>'中式风格',
					'4'=>'欧式风格',
					'5'=>'地中海风格',
					'6'=>'东南亚风格',
					'7'=>'美式风格',
					'8'=>'新古典风格',
					'9'=>'混搭风格',
					'99'=>'其他'
					),
			'4' =>  array(
				'1' => '5,0000以下',
				'2' => '5,0000~20,0000',
				'3' => '20,0000~50,0000',
				'4' => '50,0000以上'
				),
	);
	
	//$aAttrs = array('1' => array('1' => '家装', '2' => '工装'));
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
			//'number' => array('题目编号','text',array('int')),
			'title' => array('题目', 'text'),
			'type' => array('类型','select',array('all')),
			'attr' => array('属性','select',array('all')),
			array('', 'submit'),
	);
	protected $searchConfig = array(
			'status' => array('状态：', 'radio_list'),
			'title' => array('题目名称：','text'),
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