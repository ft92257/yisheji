<?php 

/**
 * 	图文编辑
 */
class RichtextAction extends BaseAction {

	public function __construct() {
		parent::__construct();
		
		$this->model = D('Richtext');
	}
	
	/*
	 * 添加
	*/
	public function add(){
		$pid = (int) getRequest('pid');
		if ($pid) {
			$parent = $this->model->getById($pid);
			if (empty($parent)) {
				$pid = 0;
			} else {
				$this->assign('pid', $pid);
				$this->assign('parent_menu', $parent['menu']);
			}
		}
		
		if ($this->isPost()) {
			$dataBase = array(
				'parentid' => $pid,
			);
			$this->_add($dataBase, U('/Richtext/edit/id/' . $pid));
		} else {
			$this->_display_form();
		}
	}
	
	/*
	 * 修改
	*/
	public function edit() {
		$id = getRequest('id');
		if (!$id) {
			$id = $this->model->getIndexId();
			if ($id) {
				redirect(U('edit') . '/id/' . $id);
			} else {
				redirect(U('add'));
			}
		} else {
			$data = $this->model->getById($id);
		}
		if (empty($data)) {
			redirect(U('add'));
			//$this->error('没有该菜单！');
		}
		$data['text'] = stripslashes($data['text']);
		
		if ($this->isPost()) {
			$this->_edit($data);
		} else {
			$pid = $data['parentid'] ? $data['parentid'] : $id;
			$parent_menus = $this->model->getParentMenus($pid);
			$menus = $this->model->getChildrenMenus($pid, $id);
			
			$this->assign('addhref', U('/Richtext/add/pid/' . $pid));
			$this->assign('parent_menus', $parent_menus);
			$this->assign('menus', $menus);
			
			$this->_display_form($data);
		}
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