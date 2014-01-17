<?php


	class ReserveModel extends BaseModel {
		protected $aOptions = array(
			'type' => array(
				'1' => '公司',
				'2' => '设计师',
			),
			'handle'=>array(
				'0' => '未处理',
				'1' => '已处理',
			),
			'charged'=>array(
				'0' => '未扣款',
				'1' => '已扣款',
			)
		);
		
		/*
		 * 查询结果处理
		 */
		protected function _after_select(&$resultSet,$options) {
			foreach ($resultSet as &$value) {
				$value['type'] = $this->getOptions('type', $value['type']);
				$value['handle'] = $this->getOptions('handle', $value['handle']);
				$value['charged'] = $this->getOptions('charged', $value['charged']);
			}
		}
	}
?>