<?php 

/**
 * 	装修公司信息编辑
 */
class CompanyAction extends BaseAction {
	public function __construct() {
		parent::__construct();
		$this->model = D('Company');
	}
	
	public function edit(){
		$aId = getRequest('id');
		$aCompany = $this->model->getById($aId);
		
			if ($this->isPost()) {
				$password = getRequest('password');
				$repassword = getRequest('repassword');
				if(!($password || $repassword)){
					$this->error('请输入密码');
				}
				if($password || $repassword){
			    	if($password != $repassword){
			    		$this->error('两次密码输入不一致');
			    	}
				}
				$id  = D('User')->where(array('id'=>$aCompany['uid']))->save(array('appid'=>$this->oApp->id,'createtime'=>time(),'account'=>getRequest('account'),'password'=>md5(getRequest('password')),'type'=>3));
				$res = $this->model->where(array('id'=>$aId))->save(array('name'=>getRequest('name')));
				if($res !== false && $id !== false){
					$this->success('修改成功');
				}else{
					$this->error($this->model->getError());
				}
			} else {
				$aUser = D('User')->getById($aCompany['uid']);
				$data = array();
				$data['password']=$aUser['password'];
				$data['account']=$aUser['account'];
				$data['name']=$aCompany['name'];
				$this->_display_form($data, 'add');
			}
			}
	/*
	 * 装修公司列表
	 */
	public function index() {
		$params = array(
			'order' => 'createtime DESC',
		);

		$this->_getPageList($params);
	}
	public function add(){
		if ($this->isPost()) {
			$password = getRequest('password');
			$repassword = getRequest('repassword');
			if(!($password || $repassword)){
				$this->error('请输入密码');
			}
			if($password || $repassword){
		    	if($password != $repassword){
		    		$this->error('两次密码输入不一致');
		    	}
			}
			$id  = D('User')->add(array('appid'=>$this->oApp->id,'createtime'=>time(),'account'=>getRequest('account'),'password'=>md5(getRequest('password')),'type'=>3));
			$res = $this->model->addData(array('name'=>getRequest('name'),'uid'=>$id,'type'=>1));
			if($res !== false && $id !== false){
				$this->success('添加成功');
			}else{
				$this->error($this->model->getError());
			}
		} else {
			$this->_display_form();
		}
	}

	/*
	 * 审核
	 */
	public function audit() {
		$this->_audit();
	}
	
}

?>
