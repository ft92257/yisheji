<?php
class CommentAction extends BaseAction{

	public function __construct() {
		parent::__construct();
	}

	public function add(){
		$data = array(
				'uid' => $this->oUser['id'],
				'type' => $this->para['type'],
				'target' => $this->para['target'],
				'cmtid' => 0,
				'content'=> $this->para['content'],
				'focus' => $this->para['focus'],
				'comment_count' => 0,
				'forward_count' => 0,
				'pic' => $this->para['pic'] ? $this->para['pic'] : 0 
				);
		$this->model = D('Comment');
		$id = $this->model->insert($data);
		if (!$id) {
			$this->resultFormat(null, 0, 'SQL:'.$this->model->getLastSql());
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
		$comment_count = $this->model->where(array('id' => $this->para['target']))->getField('comment_count');
		$res = $this->model->update(array('comment_count' => $comment_count+1), array('id' => $this->para['target']));
		$res != false ? $this->resultFormat(null, 1) : $this->resultFormat(null, 0, $this->model->getLastSql());
	}
	
	function reply(){
		switch($this->para['type']){
			case '1':
				$this->model = D('Case');
				break;
			case '2':
				$this->model = D('Designer');
				break;
			case '3':
				$this->model = D('Active');
				break;
			case '4':
				$this->model = D('House');
				break;
		}
		$case = $this->model->queryOne(array('uid' => $this->oUser['id'], 'target' => $this->para['target']));
		
		$this->model = D('Comment');
		#获取json格式的回复信息
		$res = $this->model->queryOne(array('id' => $this->para['id']));
		
		if(empty($case) && $this->oUser['id'] != $res['uid']){
			$this->resultFormat(null, 0, '你没有对该评论回复的权限');
		}
		
		$reply = json_decode($res['reply']);
		if(!is_array($reply)){ $reply = array(); }
		$data = array(
				'uid' => $this->oUser['id'],
				'header' => getFileUrl($this->oUser['avatar']),
				'name_zh' => $this->oUser['nickname'] ? $this->oUser['nickname'] : $this->oUser['realname'],
				'content' => $this->para['content'],
				'createtime' => time()
		);
		#向回复信息中追加数据
		array_push($reply, $data);
		$reply = json_encode($reply);
		$data = array('reply' => $reply);
		$where = array( 'id' => $this->para['id'] );
		#保存更新后的回复信息
		$id = $this->model->update($data, $where);
		if (!$id) {
			$this->resultFormat(null, 0, 'SQL:'.$this->model->getLastSql());
		}
		$this->resultFormat(null, 1);
	}
	
	function forward(){
		
	}
	
}
