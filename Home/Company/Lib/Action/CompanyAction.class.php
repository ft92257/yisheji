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
				D('User')->where(array('id'=>$this->oUser->id))->save(array('avatar'=>$_SESSION['company']['logo']));
			//echo D('User')->getLastSql();die;
				$this->success('修改成功！');
			}else{
				$this->error('修改失败！');
			}
		} else {
			$data['logo'] = getFileUrl($data['logo'], '120-120');
			$this->_display_form($data);
		}
	}
}

?>
