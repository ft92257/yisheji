<?php
class DesignerAction extends BaseAction{
	
	public function __construct() {
		parent::__construct();
	}
	
	private function getCount($field){
		switch($field){
			case 'decoration_type': $format = "decorationType"; break;
			default: $format = $field;
		}
	
		$sql = "SELECT {$field}, count(id) AS {$field}_c  FROM tb_user_designer where ischeck = 1 and appid = 1 and status = 0 GROUP BY {$field}";
		$res = $this->model->query($sql);
	
		foreach($res as $k => $i){
			$arr[$k] = array(
					$field => $i[$field],
					"{$field}_zh" => $this->_aBaseOptions[$format][$i[$field]],
					"{$field}_c" => $i["{$field}_c"]
			);
			
		}
		return $arr;
	}
	
	public function designerIndex(){
		$this->model = D('User_designer');
		$this->assign('decoration_type_c', $this->getCount('decoration_type'));
		$this->assign('style_c', $this->getCount('style'));
		$this->assign('total', $this->model->where(array('ischeck' => 1))->count());
		
		$this->assign('decoration_type', $this->_aBaseOptions['decorationType']);
		$this->assign('design_fee', $this->_aBaseOptions['designFee']);
		$this->assign('service_area', $this->_aBaseOptions['serviceArea']);
		$this->assign('style', $this->_aBaseOptions['style']);
		
		$sql = "SELECT nationality  FROM tb_user_designer GROUP BY nationality";
		$res = $this->model->query($sql);
		foreach($res as $vo){
			$arr[] = $vo['nationality'];
		}
		$this->assign('nationality', $arr);
		
		$data = $this->designerList();
		$this->assign('designerList', $data['list']);
		$this->assign('designerPage', $data['page']);
		
		$this->assign('search', $this->para);
		$this->display();
	}
	
	public function designerDetails(){
		if(!$this->para['uid']){
			redirect(__URL__.'/designerIndex');
		}
		
		$this->model = D('User_designer');
		$data = $this->model->queryOne(array('uid' => $this->para['uid']));
		if(empty($data)){
			redirect(__URL__.'/designerIndex');
		}
		$click_count = $this->model->where(array('uid' => $this->para['uid']))->getField('click_count');
		$this->model->update(array('click_count' => $click_count+1), array('uid' => $this->para['uid']));
		$this->assign('designerInfo', $data);
		
		$res = $this->model->getAvgScore();
		$this->assign('avg_score_skill', $res['avg_score_skill']);
		$this->assign('avg_score_service', $res['avg_score_service']);

		$this->assign('sender', $this->oUser['id']);
		$this->assign('recipient', $data['uid']);
		$this->assign('user', $this->oUser);
		
		$isSelf = $this->para['uid'] == $this->oUser['id'] ? 1 : 0;
		$this->assign('isSelf', $isSelf);
		
		$res = D('Reserve')->where(array('uid' => $this->para['uid'], 'owner_uid' => $this->oUser['id'], 'isclinch' => 1))->select();
		$isclinch = $res ?  1: 0;
		$this->assign('isclinch', $isclinch);
		$this->display();
	}
	
	public function designerList(){
		$this->model = D('User_designer');
		$where = array();
		$order = false;
		if($this->para['list_service_area']>0){
			$where = array('service_area' => $this->para['list_service_area']);
		}
		if($this->para['list_style']>0){
			$where = array('style' => $this->para['list_style']);
		}
		if($this->para['list_design_fee']>0){
			$where = array('design_fee' => $this->para['list_design_fee']);
		}
		if($this->para['list_decoration_type']>0){
			$where = array('decoration_type' => $this->para['list_decoration_type']);
		}
		if($this->para['list_nationality']){
			$where = array('nationality' => $this->para['list_nationality']);
		}
		if($this->para['list_reserve_count']>0){
			$order = $this->para['list_reserve_count'] == 1 ? 'desc' : '';
			$order =  "reserve_count {$order}";
		}
		if($this->para['cid'] > 0){
			$where['cid'] = $this->para['cid'];
		}
		$where = array_merge($where, array('ischeck' => 1));
		return $this->model->getList($where, $order, 5, true);
	}
	
	public function designerFocus(){
		$this->display();
	}
	
	public function designerCase(){
		$this->model = D('Case');
		$data = $this->model->getList(array('uid' => $this->para['uid'], 'is_original' => 1), 'createtime desc', 8);
		$this->assign('caseList1', $data);
		$data = $this->model->getList(array('uid' => $this->para['uid'], 'is_original' => 0), 'createtime desc', 8);
		$this->assign('caseList2', $data);
		$this->display();
	}
	
	public function designerComment(){
		$this->model = D("Comment");
		$this->model->getList(array('uid' => $this->para['uid']));
		
		$this->display();
	}
	
	public function designerActive(){
		$this->model = D('Active_partner');
		$data = $this->model->getList(array('uid' => $this->para['uid']), 'createtime desc', 4);
		$this->assign('activeList1', $data);
		
		$data = $this->model->getList(array('uid' => $this->para['uid'], 'type' => 3), 'createtime desc', 4);
		$this->assign('activeList2', $data);
		
		$data = $this->model->getList(array('uid' => $this->para['uid'], 'type' => 2), 'createtime desc', 4);
		$this->assign('activeList3', $data);
		
		$this->display();
	}
	
	public function designerFriend(){
		$this->display();
	}
	
	public function designerInfo(){
		$this->model = D('User_designer');
		$info = $this->model->where(array('uid' => $this->para['uid']))->getField('info');
		$this->assign('info', $info);
		$this->display();
	}
	
	public function designerMessage(){
		$this->display();
	}
	
	public function grade(){
		$this->model = D('Reserve');
		$where = array(
				'uid' => $this->para['uid'],
				'owner_uid' => $this->oUser['id'],
				'isclinch' => 1
		);
		$res = $this->model->queryOne($where);
		if(!empty($res)){
			$this->resultFormat(null, 0, '您不能对没有预约过的设计师进行评分');
		}
		$this->model = D('Score');
		$where = array(
				'uid' => $this->para['uid'],
				'owner_uid' => $this->oUser['id']
		);
		$res = $this->model->queryOne($where);
		if(!empty($res)){
			$this->resultFormat(null, 0, '您不能对一位设计师重复评分');
		}
		$this->model = D('Score');
		$data = array(
				'type' => 1,
				'uid' => $this->para['uid'],
				'owner_uid' => $this->oUser['id'],
				'username' => $this->oUser['account'],
				'case_name' => $this->para['case_name'],
				'score_skill' => $this->para['score_skill'],
				'score_service' => $this->para['score_service'],
				'case_begin' => $this->para['case_begin'],
				'case_end' => $this->para['case_end'],
				'isreal' => 1
		);
		if($this->model->insert($data) == false){
			$this->resultFormat(null, 0, 'SQL:'.$this->model->getLastSql());
		}
	
		$this->model = D('User_designer');
		$res = $this->model->queryOne(array('uid' => $this->para['uid']));
		$data = array(
				'score_skill' => ($res['score_skill'] * $res['score_count'] + $this->para['score_skill']) / ($res['score_count'] + 1),
				'score_service' => ($res['score_service'] * $res['score_count'] + $this->para['score_service']) / ($res['score_count'] + 1),
				'score_count' => $res['score_count'] + 1
		);
	
		if($this->model->update($data, $where) == false){
			$this->resultFormat(null, 0, 'SQL:'.$this->model->getLastSql());
		}
		$this->resultFormat(null, 1, '评分成功');
	}
}