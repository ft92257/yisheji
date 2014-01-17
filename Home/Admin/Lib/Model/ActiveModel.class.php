<?php 
/**
 * 	活动模型
 */
class ActiveModel extends BaseModel {
	
	protected $aOptions = array(
			'type' => array('1' => '展览', '2' => '商业交流', '3' => '聚会'),
			'datetype' => array('1' => '单日', '2' => '连续多日', '3' => '每周固定日'),
			'weekdays' => array('1' => '一', '2' => '二', '3' => '三', '4' => '四', '5' => '五', '6' => '六', '7' => '日'),
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
			'status' => array('状态', array('audit')),
			array('操作', array('<a href="index.php?s=/Active/detail/id/{id}">详情</a>')),
	);
	
	protected $searchConfig = array(
			'status' => array('状态：', 'radio_list'),
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
	
}
?>