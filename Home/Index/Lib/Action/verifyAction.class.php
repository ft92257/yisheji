<?php
class VerifyAction extends BaseAction {
	
	private $reg_account;
	private $reg_password;
	private $reg_mobile;
	private $reg_telephone;
	private $reg_email;
	private $reg_url;
	private $reg_qq;
	private $reg_ip;
	private $reg_zipCode;
	
	public function nonEmpty($value){
		return !empty(trim($value));
	}

	public function account($value){
		return preg_match($this->reg_account, $value);
	}
	
	public function password($value){
		return preg_match($this->reg_password, $value);
	}
	
	public function mobile($value){
		return preg_match($this->reg_mobile, $value);
	}
	
	public function telephone($value){
		return preg_match($this->reg_telephone, $value);
	}
	
	public function email($value){
		return preg_match($this->reg_email, $value);
	}
	
	public function ID($value){
		
	}
	
	public function url($value){
		return preg_match($this->reg_url, $value);
	}
	
	public function qq($value){
		return preg_match($this->reg_qq, $value);
	}
	
	public function ip($value){
		return preg_match($this->ip, $value);
	}
	
	public function zipCode($value){
		return preg_match($this->zipCode, $value);
	}
	
}