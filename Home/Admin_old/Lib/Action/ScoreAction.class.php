<?php 

/**
 * 	图文编辑
 */
class ScoreAction extends BaseAction {

	//需要验证的方法
	protected $aVerify = array(
	);
	
	public function __construct() {
		parent::__construct();
		
		$this->model = D('Score');
	}
	/*根据时间、用户名、评论内容查询记录
	 * 
	 */
	public function scoreList()	{
		if($this->isLogin()) {
			import('ORG.Util.Page');//导入分页类
			if(!$this->ispost()){
		        $count = $this->model->where(array(status=>0))->count();
		        $Page = new Page($count,5);
		        $show = $Page ->show();
		        $data = $this->model->where(array(status=>0))->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		        $this->assign('page',$show); 
				$this->assign('data',$data);
				$this->display();
			}else{
					$stime = getRequest("stime");
					$etime = getRequest("etime");
					$account = getRequest("username");
					$comment = getRequest("comment");
					$map = $this->model->findlist($stime,$etime,$account,$comment);
					if(!$map){
						$this->error('请填写查询条件');
					}else{
						$count = $this->model->where($map)->count();
						$Page = new Page($count,5);
						$show = $Page->show();
						$data = $this->model->where($map)->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
						if($data){
							$this->assign('page',$show); 
							$this->assign('data',$data);
						    $this->display();
						}else{
							$this->error('没有查到符合内容！');
						}
					}
			}
		}else{
					$this->error('请先登录',U('/Manager/login'));
		}
	
	}
	/*查询
	 * 单个用户评论条数详情
	 */
	public function single() {
		
		if($this->isLogin()){
			$this->checkPost();
			
			$nickname = getrequest('nickname');
			$User = D('User');
			$uid = $User->where(array('nickname'=>$nickname))->getField('id');
			$res = $this->model->where(array('uid'=>$uid))->select();
			$len = count($res);
			if($len){
			$this->assign('len',$len);
			$this->assign('res',$res);
			$this->display();
			}else{
				$this->error('没有查到该用户评论');
			}
		}else {
				$this->error('请先登录',U('/Manager/login'));
		}
				
	}
	/*
	 * 刷新评分
	 */
	public function fresh() {
		
		if($this->isLogin()){
			$this->checkPost();
			
			set_time_limit(0);
			$res = $this->model->query("SELECT  type,target,usertype ,avg(score) avgs,count(*) amount FROM `tb_score` where isreal=1  group by type,target,usertype" );
			foreach($res as $k=>&$v){
				if($v['type'] == 1 ){
					if($v['usertype'] == 1){
						$suc = D('Company')->where(array('id'=>$v['target']))->data(array('score_owner'=>$v['avgs'],'score_owner_count'=>$v['amount']))->save();
					}else{
						$suc = D('Company')->where(array('id'=>$v['target']))->data(array('score_expert'=>$v['avgs'],'score_expert_count'=>$v['amount']))->save();
					}
					if($suc === false){
						$this->error('更新失败');
					}
				}
				if($v['type'] == 2 ){
					if($v['usertype'] == 1){
						$suc = D('Construction')->where(array('id'=>$v['target']))->data(array('score_owner'=>$v['avgs'],'score_owner_count'=>$v['amount']))->save();
					}else{
						$suc = D('Construction')->where(array('id'=>$v['target']))->data(array('score_expert'=>$v['avgs'],'score_expert_count'=>$v['amount']))->save();
					}
					if($suc === false){
						$this->error('更新失败');
					}
				}
				if($v['type'] == 3){
					if($v['usertype'] == 1){
						$suc = D('Case')->where(array('id'=>$v['target']))->data(array('score_owner'=>$v['avgs'],'score_owner_count'=>$v['amount']))->save();
					}else{
						$suc = D('Case')->where(array('id'=>$v['target']))->data(array('score_expert'=>$v['avgs'],'score_expert_count'=>$v['amount']))->save();
					}
					if($suc === false){
						$this->error('更新失败');
					}
				}
			}
			$res1 = $this->model->query("SELECT  type,target,avg(score) avgs FROM `tb_score` where isreal=1 group by type,target" );
			foreach($res1 as $k=>&$v){
				if($v['type'] == 1){
					$suc = D('Company')->where(array('id'=>$v['target']))->data(array('score_complex'=>$v['avgs']))->save();
					if($suc === false){
						$this->error('更新失败');
					}
				}
				if($v['type'] == 2){
					$suc = D('Construction')->where(array('id'=>$v['target']))->data(array('score_complex'=>$v['avgs']))->save();
					if($suc === false){
						$this->error('更新失败');
					}
				}
				if($v['type'] == 3){
					$suc = D('Case')->where(array('id'=>$v['target']))->data(array('score_complex'=>$v['avgs']))->save();
					if($suc === false){
						$this->error('更新失败');
					}
				}
			}
			$this->success('更新成功',$_SERVER['HTTP_REFERER']);
		}else {
			$this->error('请先登录',U('/Manager/login'));
		}	
	}
}
?>