<?php 
/*
 * 全文搜索模型
 */
class SearchModel extends BaseModel {
	
	public function addRecord($data, $fields, $type) {
		$aFields = explode(',', $fields);
		$cont = '';
		foreach ($aFields as $field) {
			$cont .= $data[$field] .' ';
		}
		$sdata = array(
				'type' => $type,
				'target' => $data['id'],
				'content' => $cont,
		);
		$this->addData($sdata);
	}
}
?>