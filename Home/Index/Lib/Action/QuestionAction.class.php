<?php
class QuestionAction extends BaseAction {
	
	public function __construct() {
		
		parent::__construct();
	}
	
	public function testIndex(){
		
		$number = $this->para['id'] ? $this->para['id'] : 1;
		$max_number = D('Question_attr')->count();
		$type = $this->para['type'] ? $this->para['type'] : 0;
		
		$this->assign('hidden', array('number'=>$number, 'max_number'=>$max_number, 'type' => $type)) ;
		
		$this->display();
	}
	
	#获取每次回答问题后的属性数组，并更新COOKIE
	public function saveArray(){
		if($_COOKIE['question']){
			$cookie = json_decode($_COOKIE['question'], 1);
		}
		
		$cookie[$this->para['id']] = $this->para['val'];	
		
		setcookie('question', json_encode($cookie), time()+7200, '/');
		$this->model = D('Question_attr');
		$arr = array();
		foreach($cookie as $k=>$v){
			$attr = $this->model->where(array('id' => $k))->getField('attr');
			if(key_exists($attr, $arr)){
				array_push($arr[$attr], $v);
				$arr[$attr] = array_unique($arr[$attr]);
			}else{
				$arr[$attr] = array($v);
			}	
		}
		if(!empty($this->oUser)){
			if($this->oUser['type'] == 1){
				$this->model = D('User_owner');
				$this->model->where(array('uid' => $this->oUser['id']))->data(array('attr' => json_encode($arr)))->save();
			}
		}
		echo '1';exit;
	}
	
	public function testStep(){
		
		echo $number = $this->para['id'] ? $this->para['id'] : 1;
		echo $max_number = D('Question_attr')->count();
		$type = $this->para['type'] ? $this->para['type'] : 0;
		$this->model = D('Question');
		$data = $this->model->where(array('type'=>$this->para['type'], 'number' => $number))->order('rand()')->find();
		$this->assign('question', $data);
		$this->assign('hidden', array('number'=>$number, 'max_number'=>$max_number, 'type' => $type)) ;
		$jump = $number-1 >= $max_number ? __GROUP__.'/Question/testMatch' : __GROUP__.'/Question/testStep/id/'.($number+1).'/type/'.$type;
		$this->assign('jump', $jump);
		$this->display();
	}
	
	public function testMatch(){
		if(!empty($this->oUser)){
			$this->model = D('User_owner');
			$attr = $this->model->where(array('uid' => $this->oUser['id']))->getField('attr');
			
			$attrArr = json_decode($attr, 1);
			print_r('<pre>');print_r($attrArr);
		} else {
			$attrArr = json_decode($_COOKIE['Question_attr'], 1);
		}
		
		$this->model = D('User_designer');
		$where = array();
		foreach($attrArr as $attr=>$i){
			$in = '';
			foreach($i as $v){
				$in .= ",$v";
			}
			
			$in = substr($in, 1);
			$where = array_merge($where, array($this->_aBaseOptions['attr'][$attr] => array('in', $in)));
		}
		$data = $this->model->getList($where, 'createtime desc', 3);
		echo $this->model->getLastSql();
		$this->assign('designerList', $data['list']);
		
		$this->display();
	}
	
}