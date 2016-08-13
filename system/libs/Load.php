<?php
/**
* Class Load
*/
class Load{
	
	public function __construct(){

	}

	public function view($filename, $data = false){
		
		if ($data == true) {
			extract($data);
		}
		include "app/views/".$filename.".php";
	}

	public function model($modelname){
	
		include "app/models/".$modelname.".php";
		return new $modelname;
	}

	public function validation($classname){

		include "app/validation/".$classname.".php";
		return new $classname;
	}

}

?>