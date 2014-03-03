<?php
class TestAction extends BaseAction {
	public function __construct() {
		parent::__construct();
	}
	
	public function index(){
		$a = json_decode('{"case":{"id":"9","name":"\u6211\u662f\u8c01","focus":"http:\/\/localhost\/yisheji\/data\/files\/404.jpg"}}',true);
		//dump($a);die;
		$b = D('User_designer')->where(array())->select();dump($b);
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