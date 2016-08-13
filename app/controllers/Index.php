<?php
/**
* Default Controller
*/
class Index extends MainController{
	
	public function __construct(){
		parent::__construct();
	}

	public function Index(){
		$this->home();
	}
	#############################################
	#			Home Page
	#############################################

	public function home(){
		
		$data  = array();
		$table = "user_info";
		$this->load->view('header');
		$crudmodel = $this->load->model('CRUDModel');
		$data['alldata'] = $crudmodel->readALL($table); 
		$this->load->view('homeview',$data);
		$this->load->view('footer');
	}

	################################################################
	#			NOT FOUND / 404 Page
	################################################################

	public function notFound(){
		$this->load->view('header');
		$this->load->view('404');
		$this->load->view('footer');
	}



}

?>