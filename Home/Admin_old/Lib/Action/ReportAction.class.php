<?php 

/**
 * 	用户相关：登录，注册，资料修改
 */
class ReportAction extends BaseAction {

	//需要验证的方法
	protected $aVerify = array(
	);
	
	public function __construct() {
		parent::__construct();
		
		$this->model = D('Report');
	}
	/*
	 * 举报信息
	 */
    public function reportList() {
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


}

?>