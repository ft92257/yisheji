<?php
class CommonAction extends BaseAction{

	public function __construct() {
		parent::__construct();
	}
	
	#1活动, 2设计师, 3案例, 4样板房
	public function zan(){
		$this->model = D('Zan');
		$where = array(
				'uid' => $this->oUser['id'],
				'type' => $this->para['type'],
				'target' =>  $this->para['target']
		);
		$res = $this->model->queryOne($where);
		if(!empty($res)){
			$this->resultFormat(null, 0, '你已经对它赞过一次');
		}
		
		$data = array(
				'uid' => $this->oUser['id'],
				'type' => $this->para['type'],
				'target' =>  $this->para['target']
		);
		$res = $this->model->insert($data);
		if($res == false){
			$this->resultFormat(null, 0, $this->model->getLastSql());
		}
		switch($this->para['type']){
			case 1:
				$this->model = D('Active'); break;
			case 2:
				$this->model = D('Designer'); break;
			case 3:
				$this->model = D('Case'); break;
			case 4:
				$this->model = D('House'); break;
		}
		$like_count = $this->model->where(array('id' => $this->para['target']))->getField('like_count');
		$res = $this->model->update(array('like_count' => $like_count+1), array('id' => $this->para['target']));
		$res != false ? $this->resultFormat(null, 1, null) : $this->resultFormat(null, 0, $this->model->getLastSql());
	}
}