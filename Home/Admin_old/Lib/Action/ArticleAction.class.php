<?php 

/**
 * 	图文编辑
 */
class ArticleAction extends BaseAction {

	//需要验证的方法
	protected $aVerify = array(
	);
	
	public function __construct() {
		parent::__construct();
		
		$this->model = D('Article');
	}
	
	/*
	 * 添加文章
	 */
	public function addnews() {
		if($this->isLogin()){
			$this->checkPost();
			
			$data = array(
						'author' => getRequest('author'),
						'title' => getRequest('title'),
						'info' => getRequest('info'),
						'content' => getRequest('content'),
					);
			$id = $this->model->addData($data);
			if (!$id) {
				$this->error($this->model->getError());
			} else {
				$info = D('File')->upload('pic');
				
				if ($info['status'] != 0) {
					$this->error($info['msg']);
				} else {
					$this->model->where(array('id' => $id))->data(array('image' => $info['data']['fileid']))->save();
				}
				
				$this->success('添加成功！',U('/Article/edit'));
			}
		}else
				$this->error('请先登录',U('/Manager/login'));
		
	}
	
/*
 * 文章查看以及修改
 */
	public function edit() {
		if($this->isLogin()){
			$id = getrequest('id');
			if(!$this->ispost()){
				if(!getrequest('id')){
					import('ORG.Util.Page');//导入分页类
					$count = $this->model->where('status = 0')->count();
			       	$Page = new Page($count,5);
			       	$show = $Page ->show();
			       	$res = $this->model->where(array('status' => 0))->order('createtime')->limit($Page->firstRow.','.$Page->listRows)->select();
					$data = $this->model->getNews($res);
	                $this->assign('page',$show);
					$this->assign('data',$data);
					$this->display();
				}else{
					$this->assign('id',$id);
					$result = $this->model->getById($id);
					$this->assign('result',$result);
					$this->display();
				}
			}else{
				$data = array(
						'author' => getRequest('author'),
						'title' => getRequest('title'),
						'info' => getRequest('info'),
						'content' => getRequest('content'),
					);
				//$this->model->create($data);
				$ret = $this->model->where(array('id' => $id))->data($data)->save();
				$info = D('File')->upload('pic');
				if ($info["status"]==1001){
				}else if($info["status"]!=0){
					$this->error($info['msg']);
				} else {
					$this->model->where(array('id' => $id))->data(array('image' => $info['data']['fileid']))->save();
				}
				if ($ret) {
					$this->success('修改成功！', U('/Article/edit'));
				} else {
					$this->error('内容没有更改或保存数据库失败！');
				 }
			}
		}else 
				$this->error('请先登录',U('/Manager/login'));
		 		
	}
	
	/*
	 * 图片上传
	 */
	public function upload() {
		$info = D('File')->upload('imgFile');
		$arr = array(
			'error' => $info['status'],
		);
		if ($info['status'] != 0) {
			$arr['message'] = $info['msg'];
		} else {
			$arr['url'] = getFileUrl($info['data']['fileid']);
		}
		
		die(json_encode($arr));
	}
}

?>