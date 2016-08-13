<?php
/**
* Form
*/
class Form
{
	public $currentValue;
	public $values = array();
	public $errors = array();
	public function __construct(){
		
	}

	public function post($key){

		$this->values[$key] = trim($_POST[$key]);
		$this->values[$key] = stripslashes($_POST[$key]);
		$this->values[$key] = htmlspecialchars($_POST[$key]);
		$this->currentValue = $key;
		return $this;
	}

	public function isEmpty(){

		if(empty($this->values[$this->currentValue])){
			$this->errors[$this->currentValue]['empty'] = "Field Must not be empty..";
		}
		return $this;
	}

	public function submit(){

		if(empty($this->errors)){
			return true;
		}else{
			return false;
		}

	}
}


?>