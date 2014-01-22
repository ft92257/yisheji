<?php 
class UserAction extends BaseAction {
	
	private $returnUrl;
	
	public function __construct() {
		parent::__construct();
		$this->returnUrl = 'index.php?s=/Index/index';
	}
	
	public function register() {
		if ($this->para['act'] == '1001') {
			$this->model = D('User');
			$data = array(
				'account' => $this->para['account'],
				'password' => md5($this->para['password']),
				'type' => $this->para['type'],
				'reg_ip' => ip2long($_SERVER["REMOTE_ADDR"]),
				'email' => $this->para['email']
			);
			$id = $this->model->insert($data);
			if (!$id) {
				$this->resultFormat(null, 0, 'SQL:'.$this->model->getLastSql());
			}
			$this->model = $this->para['type'] == 1 ? D('User_owner') : D('User_designer');
			$data = array(
				'uid' => $id,
				'decoration_type' => $this->para['decoration_type'],
				'style' => $this->para['style']
			);
			$id = $this->model->insert($data);
			if (!$id) {
				$this->resultFormat(null, 0, 'SQL:'.$this->model->getLastSql());
			}
			setcookie('uaccount', $this->para['account'], time()+7200, '/');
			setcookie('upassword', $this->para['password'], time()+7200, '/');
			$this->resultFormat(array('uid' => $data['uid']), 1);
		}else {
			setcookie('return_url', $this->returnUrl,  time() + 7200, '/');
			$this->display();
		}
	}

	public function init(){
		if(!$this->para['uid']){
			redirect(__GROUP__.'Index/index');
		}
		$this->model = D('User');
		if ($this->para['act'] == '1002') {
			$data = array(
				'sex' => $this->para['sex'],
				'occupation' => $this->para['occupation'],
				'province' => $this->para['province'],
				'city' => $this->para['city'],
				'county' => $this->para['county'],
				'mobile' => $this->para['mobile'],
				'web' => $this->para['web'],
				'school' => $this->para['school'],
				'subject' => $this->para['subject'],
				'hobby' => $this->para['hobby'],
				'info' => $this->para['info']
			);
			$where = array('id' => $this->para['uid']);
			$res = $this->model->update($data, $where);
			$res ? $this->resultFormat(null, 1, $res) : $this->resultFormat(null, 0, $this->model->getLastSql());
		}else {
			$this->assign('occupation', $this->model->_aBaseOptions['occupation']);
			$this->assign('hobby', $this->model->_aBaseOptions['hobby']);
			$this->assign('uid', $this->para['uid']);
			$this->display();
		}
	}
	
	public function login() {
		if($this->para['act'] == '1003'){
			if(!empty($this->oUser)){
				$this->resultFormat($this->oUser, 2);
			}
			$user = D('User')->login($this->para['account'], $this->para['password']);
			if ($user) {
				$this->resultFormat($user, 1);
			} else {
				$this->resultFormat(null, 0, '用户名或密码错误');
			}
		}else{
			if(!empty($this->oUser)){
				header('Location: ' . U('/Index/index'));
				exit;
			}
			setcookie('return_url', $this->returnUrl,  time() + 7200, '/');
			$this->display();
		}
	}
	
	//退出
	public function logout() {
		D('Session')->destroy($this->oUser['id']);
		$this->redirect('Index/index');
	}
	//账户唯一验证
	public function accountUnique(){
		$this->model = D('User');
		$res = $this->model->where(array('account' => $this->para['account']))->find();
		empty($res) ? $this->resultFormat(null, 1) : $this->resultFormat(null, 0); 
	}
	//邮箱唯一验证
	public function emailUnique(){
		$this->model = D('User');
		$res = $this->model->where(array('email' => $_REQUEST['email']))->find();
		empty($res) ? $this->resultFormat(null, 1) : $this->resultFormat(null, 0); 
		exit;
	}
	//手机唯一验证
	public function mobileUnique(){
		$this->model = D('User');
		$res = $this->model->where(array('mobile' => $_REQUEST['mobile']))->find('id');
		empty($res) ? $this->resultFormat(null, 1) : $this->resultFormat(null, 0); 
		exit;
	}
	//密码校验
	public function passwordCheck(){
		$this->model = D('User');
		$password = $this->model->where(array('id' => $this->oUser['id']))->getField('password');
		$password == md5($_REQUEST['oldpassword']) ? $this->resultFormat(null, 1) : $this->resultFormat(null, 0);
		exit;
	}
	//保存密码
	public function passwordSave(){
		$this->model = D('User');
		$res = $this->model->where(array('id' => $this->oUser['id']))->data(array('password' => md5($_REQUEST['password'])))->save();
		echo  $res ? $this->resultFormat(null, 1) : $this->resultFormat(null, 0);
	}
	
	public function qq_login() {
		require_once "./public/Library/qqAuth/qqConnectAPI.php";
		$qc = new QC();
		$qc->qq_login();
	}
	
	public function qq_callback() {
		require_once "./public/Library/qqAuth/qqConnectAPI.php";
		$qc = new QC();
		//echo $qc->qq_callback();
		$openid = $qc->get_openid();
		$arr = $qc->get_user_info();
		$nickname = $arr["nickname"];
		
		//TODO 注册登录操作
	}
	
	public function sina_login() {
		$dir = './Public/Library/sinaAuth/';
		include_once( $dir . 'config.php' );
		include_once( $dir . 'saetv2.ex.class.php' );
		
		$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
		$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
		
		echo '<a href="'.$code_url.'">点击进入授权页面</a>';
	}
	
	public function sina_callback() {
		$dir = './Public/Library/sinaAuth/';
		include_once( $dir . 'config.php' );
		include_once( $dir . 'saetv2.ex.class.php' );

		$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

		if (isset($_REQUEST['code'])) {
			$keys = array();
			$keys['code'] = $_REQUEST['code'];
			$keys['redirect_uri'] = WB_CALLBACK_URL;
			try {
				$token = $o->getAccessToken( 'code', $keys ) ;
			} catch (OAuthException $e) {
			}
		}

		if ($token) {
			$_SESSION['token'] = $token;
			setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );

			$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
			//$ms  = $c->home_timeline(); // done
			$uid_get = $c->get_uid();
			$uid = $uid_get['uid'];
			$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息

			$openid = $user_message['idstr'];
			$nickname = $user_message['name'];
			//TODO 注册登录
		} else {
			echo '授权失败。';
		}
	}
}