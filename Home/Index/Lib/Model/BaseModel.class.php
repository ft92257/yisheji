<?php 
class BaseModel extends Model {
	
	public $oApp;
	public $oCom;
	public $oUser;
	public $aWhere;
	public $aOrder;
	
	public $oCollect;
	public $_aBaseOptions;
	private $para;
	private static $soRedis = null;//redis实例
	protected $useRedis = false;//是否使用redis
	protected $addbase = true;//添加默认查询条件
	
	public function __construct() {
		parent::__construct();
		$this->_aBaseOptions = require CONF_PATH.'dataConfig.inc.php';
		$this->oApp = $_SESSION['app_index'];
		$this->oCom = $_SESSION['company'];
		$this->oUser = (array) $_SESSION['user'];
		$this->oCollect = $_SESSION['collect'];
	}
	
	public function getList($where = array(), $order = false, $limit = false, $page = false, $group = false){
		
		$data = array();
		if($page){
			import('ORG.Util.Page');
			$count = $this->where($where)->count();
			$limit = $limit ? $limit : 10;
			$Page = new Page($count, $limit);	
			$data['page'] = $Page->show();
			if($group){
				$this->group($group);
			}
			if($order){
				$this->order($order);
			}
			$this->limit($Page->firstRow.','.$Page->listRows);
			$data['list'] = $this->where($where)->select();

		} else {
			if($limit){
				$this->limit($limit);
			}
			if($group){
				$this->group($group);
			}
			if($order){
				$this->order($order);
			}
			$data = $this->where($where)->select();
			
		}
		return $data;
	}
	
	public function queryOne($where = array()){
		$ret =  $this->where($where)->find();
		return $ret;
	}

	public function insert($data){
		$data['appid'] = $this->oApp['id'];
		$data['status'] = 0;
		$data['createtime'] = time();
		$ret = $this->data($data)->add();
		return $ret;
	}

	public function update($data, $where){
		$ret = $this->where($where)->data($data)->save();
		return $ret;
	}

	public function delInfo($id, $pk = 'id'){
		$data['status'] = -2;
		$ret = $this->where(array($pk => array('in', $id)))->data($data)->save();
		return $ret;
	}
	
	public function where($condition, $parse=null) {
		if (is_array($condition)){
			$condition = array_merge(array('appid' => $this->oApp['id'], 'status' => 0), $condition);
		}
		return parent::where($condition, $parse);
	}
	
	protected function _after_select(&$resultSet,$options) {
		foreach ($resultSet as &$value) {
			$this->_after_find($value,$options);
		}
	}
	
	/*
	 * 根据id获取数组数据
	* @return array
	*/
	public function getById($id, $pk = 'id') {
		$id = (int) $id;
		if ($id <= 0) {
			return array();
		}

		$redis = $this->getRedis();
		if ($redis === null) {
			return $this->where(array($pk => $id))->find();
		}
		
		$key = $this->trueTableName . ':' . $id;
		if (!$redis->exists($key)) {
			$data = $this->where(array($pk => $id))->find();
			$redis->hmset($key, $data);
			return $data;
		} else {
			return $redis->hgetall($key);
		}
	}
	
	/*
	 * 获取redis单一实例
	 */
	public function getRedis() {
		if (!C('REDIS_OPEN') || !$this->useRedis || !class_exists('Redis', false)) {
			return null;	
		}
		
		if (self::$soRedis === null) {
			$redis = new Redis();
			$redis->connect('127.0.0.1', 6379);
			
			self::$soRedis = $redis;
		}
		
		return self::$soRedis;
	}
	
	/*
	 * 更新redis缓存
	 */
	protected function _after_update($data,$options) {
		$this->updateRedisCache($data, $options);
	}
	
	protected function updateRedisCache($data, $options, $ret = null) {
		$redis = $this->getRedis();
		if ($redis !== null) {
			if (isset($data['status']) && $data['status'] == -2) {
				//删除操作
				$id = $options['where']['id'];
				if ($id) {
					$key = $this->trueTableName . ':' . $id;
					$redis->del($key);
				}
			} else {
				if ($ret === null) {
					$this->options = $options;
					$ret = $this->select();
				}
				
				foreach ($ret as $aValue) {
					$key = $this->trueTableName . ':' . $aValue['id'];
					if ($redis->exists($key)) {
						$redis->hmset($key, $aValue);
					}
				}
			}
		}
	}
}