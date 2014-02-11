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
		$data = (array) $this->oCom;
		if ($this->isPost()) {
			$newdata = $this->_edit($data, array(), '', true);
			if($newdata !== false){
				$_SESSION['company'] = array_merge($data, $newdata);
				$this->success('修改成功!');
			}else{
				$this->error('修改失败!');
			}
		} else {
			//$data['logo'] = getFileUrl($data['logo'], '120-120');
			$this->_display_form($data);
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
			$id  = D('User')->data(array('account'=>getRequest('account')))->add();
			$res = $this->model->data(array('name'=>getRequest('name'),'uid'=>$id,'type'=>1))->add();
			if($res !== false){
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
