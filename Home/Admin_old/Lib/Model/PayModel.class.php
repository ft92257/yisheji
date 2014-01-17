<?php

	class PayModel extends BaseModel {
		
		protected $aOptions = array(
			'type' => array(
				'1' => '业主',
				'2' => '装修公司',
			),
			'result' => array(
				'-1' => '充值失败',
				'0' =>  '未处理',
				'1' =>	'充值成功',
			),
		);
		
		/*
		 * 查询结果处理
		 */
		protected function _after_select(&$resultSet,$options) {
			foreach ($resultSet as &$value) {
				$value['type'] = $this->getOptions('type', $value['type']);
				$value['result'] = $this->getOptions('result',$value['result']);
			}
		}
	
	}
?>