<?php
class Da_tp_register extends CI_Model {
	
	
	function __construct(){
		parent::__construct();
	}
	
	
	function insert($data = array()){
		$data = array(
			'fname' => $data['fname'] ,
			'email' => $data['email'] ,
			'password' => $data['password'],
			'repassword' => $data['repassword'],
			'birthday' => $data['birthday'],
			'sex' => $data['sex'],
	
		);
		$this->db->insert('register_member', $data);		
	}
}
?>