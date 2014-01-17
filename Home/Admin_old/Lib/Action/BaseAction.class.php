<?php 

/**
 * 基础类
 */
class BaseAction extends Action {
	
	protected $oApp;//项目信息
	protected $oUser;//用户信息
	protected $aVerify = array();//需要验证的方法

	public function __construct() {
		parent::__construct();
		
		//加载项目信息
		if (empty($_SESSION['app'])) {
			$_SESSION['app'] = (object) C('APP_INFO');
			$this->oApp = $data;
		} else {
			$this->oApp = $_SESSION['app'];
		}
		
		//加载用户数据
		if ($this->isLogin()) {
			$this->oUser = $_SESSION['user'];
		}

		//对免验证模块，不进行登录验证。
		if (in_array(ACTION_NAME,$this->aVerify)) {
			if (!$this->isLogin()) {
				$this->error('您尚未登录！', U('User/login'));
			}
		}
	}
	
	/*
	 * 是否已登录
	 */
	protected function isLogin() {
		return !empty($_SESSION['user']);
	}
	/*
	 * 比较两次密码是否一致
	 */
	public function compare($password,$repassword) {
		if(!($password || $repassword)){
				$this->error('请输入密码');
		}
		if($password || $repassword){
	    	if($password != $repassword){
	    		$this->error('两次密码输入不一致');
	    	}
		}
		return true;
	}
	/*
	 * 审核通过
	 */
	public function update() {
    	if($this->isLogin()){
	    	$id = getRequest('id');
	    	if($id){
	    		$res = $this->model->getById($id);
	    		$res['status'] !=-2 ?$res1 = $this->model->where(array('id'=>$id))->data(array('status'=>-2))->save():$res2 = $this->model->where(array('id'=>$id))->data(array('status'=>0))->save();
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
	 * ajax验证接口
	 * @param _NAME 验证单个字段是否合法，验证规则在model层$aValidate设置
	 * html用法： <input type="text" name="account" id="account" onblur="ajaxValidate(this.id)" /> <span id="_prompt_account"></span>
	 */
	public function ajaxValidate() {
		$name = getRequest('_NAME');

		die($this->model->ajaxValidate($name));
	}
	
	/*
	 * 检测是否post
	 */
	public function checkPost($templateFile='',$charset='',$contentType='',$content='',$prefix='') {
		if (!$this->isPost()) {
			$this->display($templateFile, $charset, $contentType, $content, $prefix);
			die;
		}
	}
	
}

?>