<?php
class CollectAction extends BaseAction {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function collect_list($type = 0){
		$this->model = D('Collect');
		$where = array('uid' => $this->oUser['id']);
		$where = $type ? array_merge($where, array('type' => $type)) : $where;
		return $this->model->getList($where, 'createtime desc', 10, 1);
	}
	
	public function add(){
		$this->model = D('Collect');
		$where = array('uid' => $this->oUser['id'], 'type'=>$this->para['type'], 'target'=>$this->para['target']);
		$res = $this->model->queryOne($where);
		if(!empty($res)){
			$this->resultFormat(null, 0, '你不能重复收藏');
		}
		switch($this->para['type']){
			case '1': //案例
				$this->model = D('Case');
				$res = $this->model->where(array('id' => $this->para['target']))->find();
				break;
			case '3': //活动
				$this->model = D('Active');
				$res = $this->model->where(array('id' => $this->para['target']))->find();
				$res['tags'] = $this->Options['activeType'][$res['type']];
				break;
			case '4': //样板房
				$this->model = D('House');
				$res = $this->model->where(array('id' => $this->para['target']))->find();
				break;
		}
		
		$data = array(
				'uid' => $this->oUser['id'],
				'type' => $this->para['type'],
				'target' => $this->para['target'],
				'tags' => $res['tags'],
				'title' => $res['title'] ? urldecode($res['title']) : urldecode($res['name']),
				'pic' => $res['focus']
		);
		$this->model = D('Collect');
		$res = $this->model->insert($data);
		if(!$res){
			$this->resultFormat(null, 0, $this->model->getLastSql());
		}
		switch($this->para['type']){
			case '1': //案例
				$this->model = D('Case');
				break;
			case '3': //活动
				$this->model = D('Active');
				break;
			case '4': //样板房
				$this->model = D('House');
				break;
		}
		$collect_count = $this->model->where(array('id' => $this->para['target']))->getField('collect_count');
		$res = $this->model->update(array('collect_count' => $collect_count+1), array('id' => $this->para['target']));
		$res != false ? $this->resultFormat(null, 1) : $this->resultFormat(null, 0, $this->model->getLastSql()); 
	}
}