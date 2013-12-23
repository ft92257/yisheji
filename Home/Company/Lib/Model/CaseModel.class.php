<?php 
/**
 * 	案例表相关：信息的查询、修改、添加、删除
 */
class CaseModel extends BaseModel {
	protected $aValidate = array(
			array('name', 'required', '请填写案例名称！'),
	);
	
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
	
	protected $formConfig = array(
			'name' => array('作品名称', 'text'),
			'is_original' => array('类型', 'radio'),
			'source' => array('来源', 'text'),
			'decoration_type' => array('装修类型', 'select'),
			'info' => array('说明', 'textarea'),
			'createdate' => array('创作日期', 'date'),
			'authorize' => array('作品授权', 'radio', array('br')),
			'housetype' => array('户型', 'text', '例：3室1厅'),
			'style' => array('风格', 'select', array('all')),
			'design_fee' => array('费用', 'text', array('int', '元')),
			'tags' => array('标签', 'tags'),
			'recommend' => array('推荐（排序值）', 'text', array('int', '数值大的优先出现在首页')),
			'hot' => array('热门（排序值）', 'text', array('int', '数值大的优先出现在热门栏目')),
			array('', 'submit'),
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
			array('操作', array('edit', 'delete', 'picture')),
	);
	
	protected $searchConfig = array(
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