<?php 
/**
 * 	案例表相关：信息的查询、修改、添加、删除
 */
class CaseModel extends BaseModel {
	
	protected $aOptions = array(
			'decoration_type' => array('1' => '家装', '2' => '工装'),
			'is_original' => array('1' => '原创', '0' => '转发'),
			'authorize' => array(
					'1' => '禁止匿名转载；禁止商业用途；禁止个人使用',
					'2' => '禁止匿名转载；禁止商业用途',
					'0' => '不限制用途',
			),
			'style' => array('1' => '地中海风格', '2' => '简约风格', '3' => '欧美风格'),
	);
	
	protected $listConfig = array(
			'id' => '编号',
			'name' => '作品名称',
			'decoration_type' => '装修类型',
			'housetype' => '户型',
			'style' => '风格',
			'design_fee' => '费用(元)',
			'recommend' => '推荐',
			'hot' => '热门',
			'createtime' => '添加时间',
			'status' => array('状态', array('audit')),
			array('操作', array('<a href="index.php?s=/Case/detail/id/{id}">详情</a>')),
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