<?php 
/**
 * 	活动模型
 */
class ActiveModel extends BaseModel {
	protected $aValidate = array(
			array('title', 'required', '请填写活动标题！'),
	);
	
	protected $aOptions = array(
			'type' => array('1' => '展览', '2' => '商业交流', '3' => '聚会'),
			'datetype' => array('1' => '单日', '2' => '连续多日', '3' => '每周固定日'),
			'weekdays' => array('1' => '一', '2' => '二', '3' => '三', '4' => '四', '5' => '五', '6' => '六', '7' => '日'),
	);
	
	protected $formConfig = array(
			'title' => array('活动标题', 'text'),
			'type' => array('类型', 'select'),
			'datetype' => array('日期类型', 'radio'),
			'weekdays' => array('活动频率', 'checkbox'),
			'begin_date' => array('开始日期', 'date'),
			'end_date' => array('结束日期', 'date'),
			'begin_time' => array('开始时间', 'text', '（例：09:30）'),
			'end_time' => array('结束时间', 'text', '（例：17:30）'),
			'province' => array(array('所在地区', 'BEGIN'), 'province'),
			'city' => array(array('', 'APPEND'), 'city'),
			'county' => array(array('', 'APPEND'), 'county'),
			'town' => array(array('', 'END'), 'town'),
			'address' => array('详细地址', 'text', array('long')),
			'plimit' => array('人数限制', 'text', array('int', '0或者空表示不限制')),
			'organizer' => array('主办方', 'text'),
			'cost' => array('花费', 'text', array('int', '元')),
			'info' => array('详细信息', 'textarea'),
			'tags' => array('标签', 'tags'),
			'recommend' => array('推荐（排序值）', 'text', array('int', '数值大的优先出现在首页')),
			'hot' => array('热门（排序值）', 'text', array('int', '数值大的优先出现在热门栏目')),
			array('', 'submit'),
	);
	
	protected $listConfig = array(
			'id' => '编号',
			'title' => '标题',
			'type' => '类型',
			'begin_date' => '开始日期',
			'end_date' => '结束日期',
			'plimit' => '人数限制',
			'organizer' => '主办方',
			'createtime' => '添加时间',
			array('操作', array('edit', 'delete', 'picture')),
	);
	
	protected $searchConfig = array(
			'title' => array('活动标题：', 'text_submit'),
	);
	
	protected function _after_select(&$resultSet,$options) {
		foreach ($resultSet as &$value) {
			$this->_auto_process_data($value);
			$value['createtime'] = date('Y-m-d H:i', $value['createtime']);
			if ($value['plimit'] == 0) {
				$value['plimit'] = '不限制';
			}
		}
	}
	
	/*
	 * 全文搜索添加记录
	 */
	protected function _after_insert($data,$options) {
		$this->_auto_process_data($data);
		$fields = 'title,type,address,organizer,info';
		D('Search')->addRecord($data, $fields, 1);
	}
}
?>