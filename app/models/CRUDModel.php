<?php
/**
* CRUD Model
*/
class CRUDModel extends MainModel
{
	
	public function __construct(){
		parent::__construct();
	}

	public function readALL($table){
		$sql    = "SELECT * FROM $table ORDER BY id desc";
		$result = $this->db->select($sql);
		return $result;
	}

	public function readById($table,$id){
		$sql    = "SELECT * FROM $table WHERE id='$id'";
		$result = $this->db->select($sql);
		return $result;
	}

	public function insert($table, $data){

		 return $this->db->insert($table,$data);
	}

	public function update($table, $data, $cond){
		$result = $this->db->update($table, $data, $cond);
		return $result;
	}

	public function deleteInfoById($table,$cond){
		$result = $this->db->delete($table,$cond);
		return $result;
	}
	
}
?>