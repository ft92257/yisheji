<?php 

/**
 * 	装修公司后台登陆
 */
class DesignerAction extends BaseAction {
  
	public function __construct() {
		parent::__construct();
	
		$this->model = D('User_designer');
	}
	/*
	public function test() {
		$where = array(
				'type not in' => array(1,2,3),
				'qq like' => "%r'rr%",
				'money between' => array(1,2),
				"`account` = 'ffff'",
				'id > | uid <' => array(1,2),
				);
		//$this->model->w(array('id' => 2));
		$this->model->w($where, false);
		//$this->model->w();
		$this->model->select();
		echo $this->model->getLastSql();
	}*/
	
	/*
	 * 退出
	*/
	public function logout() {
		unset($_SESSION['admin_user']);
		$this->success('退出成功！');
	}
	/*
	 * 设计师列表
	 */
	public function index() {
		//$str = json_encode(array('text'=>array('info'=>'sss')));
		//echo $str;die;
		$params = array(
			'order' => 'createtime DESC',
		);
		$this->_getPageList($params);
		//echo $this->model->getLastSql();die;
	}
	/*
	 * 添加设计师
	 */
	/*public function add(){
		if ($this->isPost()) {
			$dataBase = array(
					'cid' => $this->oCom->id,
					'uid' => $this->oUser->id,
			);
			$this->_add($dataBase);
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
	public function ischeck() {
		$this->_ischeck();
	}	
}
?>