<?php
class CollectAction extends BaseAction {
	
	private $Para;
	
	public function __construct() {
		
		parent::__construct();
		$this->Model = D('Collect');
	}
	
	public function collect_list($type = 0){
		$where = array('uid' => $this->oUser['id']);
		$where = $type ? array_merge($where, array('type' => $type)) : $where;
		return $this->model->getList($where, 'createtime desc', 10, 1);
	}
	
	public function add(){
		switch($this->para['type']){
			case '1': //案例
				$this->model = D('Case');
				$res = $this->Model->where(array('id' => $this->para['target']))->find();
				break;
			case '2': //样板房
				$this->model = D('House');
				$res = $this->Model->where(array('id' => $this->para['target']))->find();
				break;
			case '3': //活动
				$this->model = D('Active');
				$res = $this->Model->where(array('id' => $this->para['target']))->find();
				$res['tags'] = $this->Model->Options['activeType'][$res['type']];
				break;
		}
		$this->model = D('Collect');
		$data = array(
				'uid' => $this->User['id'],
				'type' => $this->para['type'],
				'target' => $this->para['target'],
				'tags' => $res['tags'],
				'title' => $res['title'] ? $res['title'] : $res['name'],
				'pic' => $res['focus']
		);
		$this->resultFormat(null, 0, '111');
		$res = $this->model->insert($data);
		$this->resultFormat(null, 0, $this->model->getLastSql());
		$res != false ? $this->resultFormat(null, 1) : $this->resultFormat(null, 0, $this->model->getLastSql()); 
	}
}