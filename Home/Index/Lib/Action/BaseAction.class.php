<?php
class BaseAction extends Action {
	
	protected $oApp;
	protected $oUser;
	protected $_aBaseOptions;
	protected $model;
	protected $para;
	protected $urlPara;
	protected $oCollect;
	
	public function __construct() {
		parent::__construct();
		
		$this->_aBaseOptions = require CONF_PATH.'dataConfig.inc.php';
		$this->para = $_REQUEST;
		if(empty($_SESSION['app_index'])){
			$_SESSION['app_index'] = (array) C('APP_INFO');
		}
		$this->oApp = $_SESSION['app_index'];
		$uid = D('Session')->check();
		if ($uid) {
			$user = D('User')->where(array('id' => $uid))->find();
			$_SESSION['user'] = $user;
			$this->oUser = $user;
			#用户名
			$this->assign('user', $this->oUser);
			#未读私信数
			$this->assign('letterCount', D('Letter')->where(array('recipient' =>$uid, 'isread' => 0))->count());
			
			$collect['case'] = D('collect')->where(array('uid'=>$this->oUser['id'], 'type'=>1))->select();
			$collect['house'] = D('collect')->where(array('uid'=>$this->oUser['id'], 'type'=>2))->select();
			$collect['active'] = D('collect')->where(array('uid'=>$this->oUser['id'], 'type'=>3))->select();
			$_SESSION['collect'] = $collect;
			$this->oCollect = $collect;
		} else {
			$this->oUser = array();
		}
		$this->assign('hot_designer', D('User_designer')->getHotDesigner());
		$this->assign('hot_case', D('Case')->getHotCase());
	}
	
	public  function resultFormat($data = null, $status = 0, $msg = null, $url = null){
		$arr['act'] = $this->para['act'];
		$arr['data'] = $data;
		$arr['status'] = $status;
		$arr['total'] = $data && is_array($data) ? sizeof($data) : 0;
		$arr['msg'] = $msg;
		$arr['url'] = $url;
		if (IS_AJAX){
			echo json_encode($arr); exit;
		}
		return $arr;
	}

	protected function rightCheck($act){
		$confArr = array('1111', '2105', '3107', '7101', '7102', '7103', '8101', '8102', '9101', '9102', '9103', '9105');
		if(in_array($act, $confArr)){
			if(empty($this->oUser)){
				$this->resultFormat(null, -2);
			}
		}
	}
	
	protected function paraCheck($act){	 }
	
	public function isLogin(){
		echo empty($this->oUser) ? -2 : 1; exit;
	}
	
	public function actRequest(){
		
		$this->rightCheck($this->para['act']);
		
		switch($this->para['act']){
			#Index
			case '0101':A('Index')->index(); break;
			case '0102':A('Index')->indexCase(); break;
			case '0103':A('Index')->indexDesigner(); break;
			case '0104':A('Index')->indexHouse();  break;
			#My
			case '0201': A('My')->myCollect(); break; #我的收藏列表
			case '0202': A('My')->myLetterList(); break; #我的私信列表
			case '0203': A('My')->myLetterDetails(); break; #我的私信明细
			case '0204': A('My')->mySet(); break; #个人信息设置
			case '0205': A("My")->passwordSave(); break; #修改密码	
			case '0206': A("My")->headerEdit(); break; #头像设置
			case '0207': A("My")->infoEdit(); break; #信息设置
			#User
			case '1001': A('User')->register2();  break; #注册
			case '1002': A('User')->init(); break; #初始化个人信息
			case '1003': A('User')->login();  break; #登录
			case '1004': A('User')->fastLogin();  break; #快速登录（弹层）
			#Designer
			case '1101': A('Designer')->designerIndex(); break; #设计师列表
			case '1102': A('Designer')->designerDetails(); break; #设计师详情
			case '1105': A('Designer')->designerCase(); #设计师案例查询
			case '1106': A('Designer')->designerComment(); break; #设计师评论查询	
			case '1107': A('Designer')->designerActive(); break; #设计师活动查询
			case '1108': A('Designer')->designerFriend(); break; #设计师圈子查询
			case '1109': A('Designer')->designerInfo(); break; #设计师描述查询
			case '1110': A('Designer')->designerMessage(); break; #设计师分享查询
			case '1111':  A('Designer')->grade(); break; #为设计师评分
			case '1112': A("My")->designerApply(); break; #申请成为设计师
			#Company
			case '1201': A('Company')->companyDetails(); break; #企业详情
			#Case
			case '2101': A('Case')->caseIndex(); break; #案例列表
			case '2102': A('Case')->caseDetails(); break; #案例详情
			case '2105': A('Case')->caseReport(); break; #举报案例	
			#House
			case '2201': A('House')->houseIndex(); break; #样板房列表
			case '2202': A('House')->houseDetails(); break; #样板房详情	
			case '2205': A('House')->houseApply(); break; #申请成为样板房	
			#Active
			case '3101': A('Active')->activeIndex(); break; #活动列表
			case '3102': A('Active')->activeDetails(); break; #活动详情
			case '3103': A('Active')->activeImgList(); break; #活动图片列表
			case '3104': A('Active')->activeImgDetails(); break; #活动图片详情	
			case '3107': A("Active")->signUp(); break; #活动报名	
			#Question	
			case '4101': A('Question')->testIndex(); break; #测试首页	
			case '4102': A('Question')->testStep(); break; #测试题	
			case '4103': A('Question')->testMatch(); break; #测试结果匹配
			#comment
			case '7101': A('Comment')->add(); break; #发布评论
			case '7102': A('Comment')->reply(); break; #回复评论
			case '7103': A('Comment')->forward(); break; #转发评论	
			#Friend
			case '8101': A('Friend')->add(); break; #加关注
			case '8102': A('Friend')->del(); break; #取消关注
			#Common
			case '9101': A('Reserve')->add(); break; #预约设计师/装修公司
			case '9102': A("Common")->zan(); break; #赞
			case '9103': A("Letter")->sendLetter(); break; #发送私信
			case '9104': A("Letter")->delLetter(); break; #删除私信	
			case '9105': A('Collect')->add(); break; #添加收藏			
			case '105': A("User")->accountUnique(); break; #账号唯一校验
			case '106': A("User")->emailUnique(); break; #邮件唯一校验
			case '107': A("User")->mobileUnique(); break; #手机唯一校验
			case '108': A("User")->passwordCheck(); break; #检查密码
		}
	}
	
}
?>