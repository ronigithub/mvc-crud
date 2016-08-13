<?php
/**
* CRUD controller
*/
class CRUDcontroller extends MainController
{
	
	public function __construct(){
		parent::__construct();
	}

	public function addNew(){
		$this->load->view('header');
		$this->load->view('add_new');
		$this->load->view('footer');
	}

	public function insert(){

		$data = array();
		$table = "user_info";
		$input = $this->load->validation('Form');
		$input->post('name')->isEmpty();
		$input->post('email')->isEmpty();
		$input->post('skill')->isEmpty();
		if($input->submit())
		{
			$data = array(
				'name'=> $input->values['name'],
				'email'=> $input->values['email'],
				'skill'=> $input->values['skill']
				);
			$crudmodel = $this->load->model('CRUDModel');
			$result = $crudmodel->insert($table, $data);
			//check inserted or not
			$mdata = array();
			if($result == 1){
				$mdata['msg'] = "Data Added Successfully";
			}else{
				$mdata['msg'] = "Data Not Added";
			}
			//redirect homepage
			$url = BASE_URL."/Index/home?msg=".urlencode(serialize($mdata));
			header("Location: $url");
		}else{
			$data['postErrors'] = $input->errors;
			$table = "user_info";
			$this->load->view('header');
			$this->load->view('add_new',$data);
			$this->load->view('footer');
		}
	}

	public function updateInfo($id = NULL){

		$this->load->view('header');
		$table = 'user_info';
		$crudmodel = $this->load->model('CRUDModel');
		$data['readbyid'] = $crudmodel->readById($table,$id);
		$this->load->view('update_info',$data);
		$this->load->view('footer');
	}

	public function editInfo($id = NULL){

		$data = array();
		$table = "user_info";
		$cond  = "id = $id";
		$input = $this->load->validation('Form');
		$input->post('name')->isEmpty();
		$input->post('email')->isEmpty();
		$input->post('skill')->isEmpty();
		if($input->submit())
		{	

			$data = array(
				'name'=> $input->values['name'],
				'email'=> $input->values['email'],
				'skill'=> $input->values['skill']
				);
			$crudmodel = $this->load->model('CRUDModel');
			$result = $crudmodel->update($table, $data, $cond);
			
			// Check Updated or not
			$mdata = array();
			if($result == 1){
				$mdata['msg'] = "Data Updated Successfully";
			}else{
				$mdata['msg'] = "Not Updated";
			}
			// redirect homepage
			$url = BASE_URL."/Index/home?msg=".urlencode(serialize($mdata));
			 header("Location: $url");
		}else{
			$data['postErrors'] = $input->errors;
			$table = "user_info";
			$this->load->view('header');
			$crudmodel = $this->load->model("CRUDModel");
	 		$data['readbyid'] = $crudmodel->readByID($table,$id); 
			$this->load->view('update_info',$data);
			$this->load->view('footer');
		}
	}

	public function deleteInfo($id = NULL){

		$table = "user_info";
		$cond = "id = $id";
		$crudmodel = $this->load->model("CRUDModel");
		$result = $crudmodel->deleteInfoById($table,$cond);
		
		// Check Deleted or not
		$mdata = array();
		if($result == 1){
			$mdata['msg'] = "Data Deleted Successfully";
		}else{
			$mdata['msg'] = "Not Deleted";
		}
		// redirect homepage
		$url = BASE_URL."/Index/home?msg=".urlencode(serialize($mdata));
		header("Location: $url");
	}

}
?>