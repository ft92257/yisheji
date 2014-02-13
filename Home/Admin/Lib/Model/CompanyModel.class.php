<?php 
/**
 * 	案例表相关：信息的查询、修改、添加、删除
 */
class CompanyModel extends BaseModel {
	
	protected $aOptions = array(
			'type' => array('1' => '公司', '2' => '设计师'),
	);
	protected $aValidate = array(
			array('name', 'unique', '公司名称已经存在'),
			array('name', 'required', '请填写公司名称'),
			
			
							);
	protected $formConfig = array(
			'name' => array('公司名称', 'text'),
			'account' => array('公司账号', 'text'),
			'password' => array('输入密码','password'),
			'repassword' => array('确认密码','password'),
			array('', 'submit'),
	);
	protected $listConfig = array(
			'id' => '编号',
			'name' => '公司名称',
			'type' => '类型',
			'region' => '服务区域',
			'contact' => '联系人',
			'telephone' => '联系电话',
			'logo' => array('图片', array('img')),
			'createtime' => '添加时间',
			'status' => array('状态', array('audit')),
			array('操作', array('edit')),
	);
	
	protected $searchConfig = array(
			'status' => array('状态：', 'radio_list'),
			'name' => array('公司名称：', 'text'),
			'createtime' => array('选择时间：', 'date'),
	);
	
	protected function _after_select(&$resultSet,$options) {
		foreach ($resultSet as &$value) {
			$this->_auto_process_data($value);
			$value['logo'] = getFileUrl($value['logo']);
			$value['createtime'] = date('Y-m-d H:i', $value['createtime']);
		}
	}
}
?>