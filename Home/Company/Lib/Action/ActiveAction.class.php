<?php 

/**
 * 	活动
 */
class ActiveAction extends BaseAction {
	
	public function __construct() {
		parent::__construct();
	
		$this->model = D('Active');
	}
	
	/*
	 * 添加
	 */
	public function add(){
		if ($this->isPost()) {
			$dataBase = array(
					'cid' => $this->oCom->id,
					'uid' => $this->oUser->id,
			);
			if (getRequest('datetype') == 1) {
				$dataBase['begin_date'] = getRequest('active_date');
				$dataBase['end_date'] = getRequest('active_date');
			}
			$this->_add($dataBase);
		} else {
			$this->_display_form();
		}
	}
	
	//列表
	public function index(){
		$params = array(
				'where' => $this->getPurviewCondition(),
				'order' => 'createtime DESC',
		);
		
		$this->_getPageList($params);
	}
	
	/*
	 * 修改
	 */
	public function edit() {
		$data = $this->model->getById(getRequest('id'));
		$this->checkPurviewData($data);
		if ($data['datetype'] == 1) {
			$data['active_date'] = $data['begin_date'];
		}
		
		if ($this->isPost()) {
			$dataBase = array();
			if (getRequest('datetype') == 1) {
				$dataBase['begin_date'] = getRequest('active_date');
				$dataBase['end_date'] = getRequest('active_date');
			}
			$this->_edit($data, $dataBase);
		} else {
			$this->_display_form($data, 'add');
		}
	}
	
	/*
	 * 删除
	 */
	public function delete() {
		$id = getRequest('id');
		$data = $this->model->getById($id);
		$this->checkPurviewData($data);
		
		$this->_delete(array('id' => $id));
	}
	
	/*
	 * 图库
	 */
	public function picture() {
		$this->_picture(1, getRequest('id'));
	}
	
	/*
	 * 设为焦点图
	*/
	public function focus() {
		$id = getRequest('id');
		$data = D('Picture')->getById($id);
		$this->checkPurviewData($data);
		
		$where = array('id' => $data['target']);
		$set = array('focus' => $data['fid']);
		$this->model->where($where)->data($set)->save();

		$this->success('设置成功！');
	}

}
?>