<?php
class CaseAction extends BaseAction{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function caseIndex(){
		$this->assign('decoration_type', $this->_aBaseOptions['decorationType']);
		$this->assign('style', $this->_aBaseOptions['style']);
		
		$this->assign('caseFocus', $this->caseFocus());
		$data = $this->caseList();
		$this->assign('caseList', $data['list']);
		$this->assign('casePage', $data['page']);
		
		$this->assign('search', $this->para);
		$this->display();
	}
	
	public function caseImgDetails(){
		$this->model = D('Case');
		$this->assign('casePhoto', $this->model->getCasePhoto($this->para['id']));
		$this->assign('num', $this->para['num']);
		$this->display();
	}
	
	public function caseDetails(){
		if(!$this->para['id']){
			redirect(__URL__.'/caseIndex');
		}
		
		$this->model = D('Case');
		$data = $this->model->queryOne(array('id' => $this->para['id']));
		if(empty($data)){
			redirect(__URL__.'/caseIndex');
		}
		$this->assign('casePhoto', $this->model->getCasePhoto($data['id']));
		
		$click_count = $this->model->where(array('id' => $this->para['id']))->getField('click_count');
		$this->model->update(array('click_count' => $click_count+1), array('id' => $this->para['id']));
		
		$this->assign('caseInfo', $data);
		$pid = $this->model->where(array('id' => array('lt', $this->para['id'])))->order('createtime desc')->limit(1)->getField('id');
		$nid = $this->model->where(array('id' => array('gt', $this->para['id'])))->limit(1)->getField('id');
		$this->assign('pid', $pid ? $pid : 0);
		$this->assign('nid', $nid ? $nid : 0);
		
		$this->assign('designerCase', $this->model->getDesignerCase($data['uid'], 4));
		
		$this->model = D("Comment");
		$where = array(
				'type' => '1',
				'target' => $data['id']
				);
		$data = $this->model->getList($where, "createtime desc", 5, true);
		$this->assign('caseComment', $data['list']);
		$this->assign('caseCommentPage', $data['page']);
		$this->display();
	}
	
	public function caseList(){
		
		$this->model = D('Case');
		$where = array();
		$order = false;
		if($this->para['list_decoration_type']){
			$where = array_merge($where, array('decoration_type' => $this->para['list_decoration_type']));
		}
		if($this->para['list_style']){
			$where = array_merge($where, array('style' => $this->para['list_style']));
		}
		if($this->para['list_order']){
			$order =  "{$this->para['list_order']} desc";
		}
		return $this->model->getList($where, $order, 10, true);
	}
	
	public function caseFocus(){
		$this->model = D('Case');
		$where = array();
		$order = "";
		if($this->para['focus_decoration_type']){
			$where = array('decoration_type' => $this->para['focus_decoration_type']);
		}
		if($this->para['focus_order']){
			$order = "{$this->para['focus_order']} desc ,";
		}
		return $this->model->getList($where, "{$order} createtime desc", 6);
	}
	
	public function caseReport(){
		if($this->para['act'] == '2105'){
			$this->model = D('Report');
			#一个账号只能举报一次一个（未处理举报的）案例
			$where = array(
			'uid' => $this->oUser['id'],
			'type' => 2,
			'target' => $this->para['target'],
			'status' => 0
			);
			$res = $this->model->queryOne($where);
			if(!empty($res)){
				$this->resultFormat(null, 0, '一个账号只能举报一次一个（未处理举报的）案例');
			}
			$data = array(
					'uid'=> $this->oUser['id'],
					'name' => $this->para['name'],
					'type' => 2,
					'target' => $this->para['target'],
					'reason' => $this->para['reason'],
					'telephone' => $this->para['telephone'],
					'url' => $this->para['url']
			);
			$res = $this->model->insert($data);
			$res != false ? $this->resultFormat(null, 1, '举报成功', __APP__ . "/Case/caseDetails/id/{$this->para['target']}") : $this->resultFormat(null, 0, $this->model->getLastSql());
		}else {
			if(!$this->para['id']){
				redirect(__URL__.'/caseIndex');
			}
			$this->assign('target', $this->para['id']);
			$this->display();
		}
	}
}