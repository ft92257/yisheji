<?php
class TestAction extends BaseAction {
	public function __construct() {
		parent::__construct();
	}
	
	public function index(){
		$aUser = D('User')->where(array())->select();
		foreach($aUser as $value){
			if($value['type'] > 1){
				if($value['type']==2){
					$model = D('User_designer');
				}elseif($value['type']==3){
					$model = D('Company');
				}
				$aCase = D('Case')->where(array('uid'=>$value['id']))->order('recommend desc,createtime desc')->find();
				if(empty($aCase)) continue;
				$aDer = $model->getById($value['id'],'uid');
				$aCache = json_decode($aDer['cache'],true);
				$aCache['case'] = array('id'=>$aCase['id'],'name' => $aCase['name'],'focus'=>getFileUrl($aCase['focus']));
				$model->where(array('uid'=>$value['id']))->data(array('cache'=>json_encode($aCache)))->save();
				echo $model->getLastSql()."<br/>";
			}
		}
	}
}