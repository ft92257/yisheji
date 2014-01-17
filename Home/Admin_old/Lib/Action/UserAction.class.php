<?php 

/**
 * 	用户相关：登录，注册，资料修改
 */
class UserAction extends BaseAction {

	//需要验证的方法
	protected $aVerify = array(
	);
	
	public function __construct() {
		parent::__construct();
		
		$this->model = D('User');
	}
	/*
	 * 用户列表
	 */
    public function userlist() {
    	if($this->isLogin()){
    		if(!$this->isPost()){
    				import('ORG.Util.Page');//导入分页类
			       	$count = $this->model->where()->count();
			       	$Page = new Page($count,5);
			       	$show = $Page ->show();
			       	$list = $this->model->where()->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			        $this->assign('list',$list);
			        $this->assign('page',$show); 
			        $this->display();
    		} else{
    				import('ORG.Util.Page');//导入分页类
    				$account = getRequest('account');
    				$count = $this->model->where(array('account'=>$account))->count();
    				$Page = new Page($count,5);
    				$show = $Page->show();
    				if(!$account){
						$this->error('请填写查询条件');
					}
    				$list = $this->model->where(array('account'=>$account))->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    				$this->assign('page',$show);
    				$this->assign('list',$list);
    				$this->display();
    		}
    	}else{
    		$this->error('请先登录',U('/Manager/login'));
    	}
		
    }
    /*
     * 更新用户
     */
    public function update() {
    	if($this->isLogin()){
	    	$id = getRequest('id');
	    	$pid = getRequest('pid');
	    	if($id){
		    	$data = array('isreal'=>0);
		    	$res = $this->model->where(array('id'=>$id))->data($data)->save();
		    	$res1 = D('Score')->where(array('uid'=>$id))->data($data)->save();
		    	if($res !== false && $re1 !== false){
		    		$this->success('更新成功', $_SERVER['HTTP_REFERER']);
		    	}else{
		    		$this->error('更新失败');
		    	}
	    	}
	    	if($pid){
	    		$res = $this->model->where(array('id'=>$pid))->find();
	    		$res['status'] !=-2 ?$res1 = $this->model->where(array('id'=>$pid))->data(array('status'=>-2))->save():$res2 = $this->model->where(array('id'=>$pid))->data(array('status'=>0))->save();
	    		if($res1 !== false && $res2 !== false){
		    		$this->success('更新成功', $_SERVER['HTTP_REFERER']);
		    	}else{
		    		$this->error('更新失败');
		    	}
	    	}
    	}else{
    		$this->error('请先登录',U('/Manager/login'));
    	}
    	
    }
    /*
     * 添加监理
     */
    public function adduser() {
    	if($this->isLogin()){
	    	$this->checkPost();
	    	 $this->compare(getRequest('password'),getRequest('repassword'));
	         $data = array('type'=>2,
	         			  'password'=>getRequest('password'),
	    				  'account'=>getRequest('account'),
	    				  'nickname'=>getRequest('nickname'),
	    				  'realname'=>getRequest('realname'),
	         			  'isreal'=>1,
	         			  'info'=>getRequest('info'),
	    				  'sex'=>getRequest('sex'),
	    				);
	    	$res = $this->model->addNew($data);
	    	if(!$res) {
	    			 $this->error($this->model->getError());
	    	}else{
	    	    $info = D('File')->upload('pic');
				
				if ($info['status'] != 0) {
					$this->error($info['msg']);
				} else {
					$this->model->where(array('id' => $res))->data(array('avatar' => $info['data']['fileid']))->save();
				}
				
				$this->success('添加成功！',$_SERVER['HTTP_REFERER']);
			}
    }else{
    	$this->error('请先登录',U('/Manager/login'));
    }
   }
}

?>