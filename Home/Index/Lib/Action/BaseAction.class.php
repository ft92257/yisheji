<?php
class BaseAction extends Action {
	
	protected $oApp;
	protected $oUser;
	protected $_aBaseOptions;
	protected $model;
	protected $para;
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
		}
		$this->assign('hot_designer', D('User_designer')->getHotDesigner());
		$this->assign('hot_case', D('Case')->getHotCase());
	}
	
	protected  function resultFormat($data = null, $status = 0, $msg = null, $url = null){
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
				$this->resultFormat(null,-2);
			}
		}
	}
	
	protected function paraCheck($act){	 }
	
	public function actRequest(){
		
		$this->rightCheck($this->para['act']);
		
		switch($this->para['act']){
			#Index
			case '0101':
				A('Index')->index(); #首页
				break;
			case '0102':
				A('Index')->indexCase(); #首页案例查询
				break;
			case '0103':
				A('Index')->indexDesigner(); #首页设计师查询
				break;
			case '0104':
				A('Index')->indexHouse();  #首页样板房查询
				break;

			#My
			case '0201':
				A('My')->myCollect(); #我的收藏
				break;
			case '0202':
				A('My')->myLetterList(); #我的私信列表
				break;
			case '0203':
				A('My')->myLetterDetails(); #我的私信明细
				break;
			case '0204':
				A('My')->mySet(); #个人中心设置
				break;
			case '0205': 
				A("My")->passwordSave(); #修改密码
				break;
			case '0206': 
				A("My")->headerEdit(); #头像设置
				break;
			case '0207':
				A("My")->infoEdit(); #信息设置
			#User
			case '1001': 
				A('User')->register();  #注册
				break;
			case '1002': 
				A('User')->init(); #初始化个人信息
				break;
			case '1003': 
				A('User')->login();  #登录
				break;
			case '1004':
				A('User')->fastLogin();  #快速登录（弹层）
				break;
			#Designer
			case '1101': 
				A('Designer')->designerIndex(); #设计师列表
				break;
			case '1102':
				A('Designer')->designerDetails(); #设计师详情
				break;
			case '1103':
				A('Designer')->designerList(); 
				break;
			case '1104':
				A('Designer')->designerFocus();
				break;
			case '1105':
				A('Designer')->designerCase(); #设计师案例查询
				break;
			case '1106':
				A('Designer')->designerComment(); #设计师评论查询
				break;
			case '1107':
				A('Designer')->designerActive(); #设计师活动查询
				break;
			case '1108':
				A('Designer')->designerFriend(); #设计师圈子查询
				break;
			case '1109':
				A('Designer')->designerInfo(); #设计师描述查询
				break;
			case '1110':
				A('Designer')->designerMessage(); #设计师分享查询
				break;
			case '1111':
				A('Designer')->grade(); #为设计师评分
				break;
			case '1112':
				A("My")->designerApply(); #申请成为设计师
				break;
			#Company
			case '1201':
				A('Company')->companyDetails(); #企业详情
				break;
			#Case
			case '2101':
				A('Case')->caseIndex(); #案例列表
				break;
			case '2102':
				A('Case')->caseDetails(); #案例详情
				break;
			case '2103':
				A('Case')->caseList();
				break;
			case '2104':
				A('Case')->caseFocus();
				break;
			case '2105':
				A('Case')->caseReport(); #举报案例
				break;
			#House
			case '2201':
				A('House')->houseIndex(); #样板房列表
				break;
			case '2202':
				A('House')->houseDetails(); #样板房详情
				break;
			case '2203':
				A('House')->houseList(); 
				break;
			case '2204':
				A('House')->houseFocus();
				break;
			#Active
			case '3101':
				A('Active')->activeIndex(); #活动列表
				break;
			case '3102':
				A('Active')->activeDetails(); #活动详情
				break;
			case '3103':
				A('Active')->activeList();
				break;
			case '3104':
				A('Active')->activeFocus();
				break;
			case '3105':
				A('Active')->activeImgList(); #活动图片列表
				break;
			case '3106':
				A('Active')->activeImgDetails(); #活动图片详情
				break;
			case '3107':
				A("Active")->signUp(); #活动报名
				break;
			#Question	
			case '4101':
				A('Question')->testIndex(); #测试首页
				break;
			case '4102':
				A('Question')->testStep(); #测试题
				break;
			case '4103':
				A('Question')->testMatch(); #测试结果匹配
				break;
			#comment
			case '7101':
				A('Comment')->add(); #发布评论
				break;
			case '7102':
				A('Comment')->reply(); #回复评论
				break;
			case '7103':
				A('Comment')->forward(); #转发评论
				break;
			#Friend
			case '8101':
				A('Friend')->add(); #加关注
				break;
			case '8102':
				A('Friend')->del(); #取消关注
				break;
			#Common
			case '9101':
				A('Reserve')->add(); #预约设计师/装修公司
				break;
			case '9102':
				A("Common")->zan(); #赞
				break;
			case '9103':
				A("Letter")->sendLetter(); #发送私信
				break;
			case '9104':
				A("Letter")->delLetter(); #删除私信
				break;
			case '9105':
				A('Collect')->add(); #添加收藏
				break;				
			case '105': 
				A("User")->accountUnique(); #账号唯一校验
				break;
			case '106': 
				A("User")->emailUnique(); #邮件唯一校验
				break;
			case '107': 
				A("User")->mobileUnique(); #手机唯一校验
				break;
			case '108': 
				A("User")->passwordCheck(); #检查密码
				break;
		}
	}
	
}
?>