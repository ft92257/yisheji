<?php 

/**
 * 图文编辑模型
 *
 */
class ScoreModel extends BaseModel {
		/*
	 * 验证form字段规则
	 */
	protected $aValidate = array(
		array('nickname','required', '请填写用户名！'),
	);
	
	protected $aOptions = array(
		'type' => array(
			'1' => '公司',
			'2' => '施工队',
			'3' => '样板房',
		),
	);
	
	/*
	 * 查询结果处理
	 */
	protected function _after_select(&$resultSet,$options) {
		foreach ($resultSet as &$value) {
			$value['type'] = $this->getOptions('type', $value['type']);
		}
	}
	
	
	public function findlist($stime,$etime,$username,$comment) {
		import('ORG.Util.Page');//导入分页类
		$map = array();
		if(!empty($stime)){
			$start = strtotime($stime);
	        $end = strtotime($etime);
	        $map['_string'] = "createtime>$start AND createtime<$end";
		} 
		if(!empty($username)){
			$map['username'] = $username;
		}
		if(!empty($comment)){
		 	$map['comment'] = array('like', "%$comment%");
		}
		if(empty($map)){
			return NULL;
		}else{
			$map['status'] = 0;
			return $map;
		}
	}
	

}



?>