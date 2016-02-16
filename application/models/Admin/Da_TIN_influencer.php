<?php
class Da_TIN_influencer extends CI_Model 
{
	
	
	function __construct()
	{
		parent::__construct();
	}
	
	//insert data down database influencer
	function insert_influencer($data = array(),$data1 = array(),$data2 = array())
	{

		$this->db->trans_begin();
		//set date time
		$now = date("Y-m-d H:i:s");

		// if user upload picure
		if (isset ($data['picture']) ) 
		{
			$data = array(
				'name' => $data['name'] ,
				'firstname' => $data['firstname'],
				'lastname' => $data['lastname'],
				'email' => $data['email'],
				'sex' =>$data['sex'],
				'birthday' => $data['birthday'],
				'picture' => $data['picture'],
				'address' =>$data['address'],
				'id_card' => $data['id_card'],
				'bank' => $data['bank'],
				'bank_account' => $data['bank_account'],
				'fb_id' => $data['fb_id'],
				'name_fb' => $data['name_fb'],
				'usernameIG' => $data['usernameIG'],
				'token' => $data['token'],
				'updated'=> $now,
				'created'=> $now,
			);
			
		}
		// if no picture uploaded
		else
		{
			$data = array(
            'name' => $data['name'] ,
			'firstname' => $data['firstname'],
			'lastname' => $data['lastname'],
			'email' => $data['email'],
			'sex' =>$data['sex'],
			'birthday' => $data['birthday'],
			'address' =>$data['address'],
			'id_card' => $data['id_card'],
			'bank' => $data['bank'],
			'bank_account' => $data['bank_account'],
			'fb_id' => $data['fb_id'],
			'name_fb' => $data['name_fb'],
			'usernameIG' => $data['usernameIG'],
			'token' => $data['token'],
			'updated'=> $now,
			'created'=> $now,
            );
        
		} 
		//insert data to influencer table
		$this->db->set($data);
		$this->db->insert('influencer', $data);	
		
		//insert id of table influencer to  facebook and  instagram table
        //find the max if_inlue  to add in istagram and facebook table
		$this->db->select_max('id_influ');

		$id_influ = $this->db->get('influencer')->result();

		do_dump($id_influ[0]->id_influ,"id_influ"); 

		//insert data to facebook table
		$data1 = array(
            	'id_influ' =>$id_influ[0]->id_influ,
				'fb_id' => $data['fb_id'],
				'name' => $data['name_fb'],
		);
		$this->db->set($data1);
		$this->db->insert('facebook', $data1);

		//insert data to instagram table
		$data2 = array(
				'id_influ' =>$id_influ[0]->id_influ,
				'usernameIG' => $data['usernameIG'],
				'token' => $data['token'],
			);

		$this->db->set($data2);
		$this->db->insert('instagram', $data2);	

        $this->db->trans_complete();

        // check status of transaction
        if ($this->db->trans_status() === FALSE) 
        {
            log_message('error','got problem with insert data');
        }


			
	}

	//call data all in database comeback show
	function show()
	{
		return $this->db->get('influencer')->result();
	}

	//update data in table influencer
	function updated($id,$data,$data1,$data2)
	{
		$this->db->trans_begin();
		$now = date("Y-m-d H:i:s");
		//if no file picture
		if (isset ($data['picture']) ) {
			
			$data = array(
            'name' => $data['name'] ,
			'firstname' => $data['firstname'],
			'lastname' => $data['lastname'],
			'email' => $data['email'],
			'sex' =>$data['sex'],
			'birthday' => $data['birthday'],
			'picture' => $data['picture'],
			'address' =>$data['address'],
			'id_card' => $data['id_card'],
			'bank' => $data['bank'],
			'bank_account' => $data['bank_account'],
			'fb_id' => $data['fb_id'],
			'name_fb' => $data['name_fb'],
			'usernameIG' => $data['usernameIG'],
			'token' => $data['token'],
			'updated'=> $now,
            );	
		}	
		//if has file picture
		else {
			$data = array(
            'name' => $data['name'] ,
			'firstname' => $data['firstname'],
			'lastname' => $data['lastname'],
			'email' => $data['email'],
			'sex' =>$data['sex'],
			'birthday' => $data['birthday'],
			'address' =>$data['address'],
			'id_card' => $data['id_card'],
			'bank' => $data['bank'],
			'bank_account' => $data['bank_account'],
			'fb_id' => $data['fb_id'],
			'name_fb' => $data['name_fb'],
			'usernameIG' => $data['usernameIG'],
			'token' => $data['token'],
			'updated'=> $now,
            );

		} 
		//update data to influencer table
		$this->db->where('id_influ', $id);
		$this->db->update('influencer', $data);

		//update data to facebook table
		$data1 = array(
				'fb_id' => $data['fb_id'],
				'name' => $data['name_fb'],
		);
		$this->db->where('id_influ', $id);
		$this->db->update('facebook', $data1);

		//update data to instagram table
		$data2 = array(
				'usernameIG' => $data['usernameIG'],
				'token' => $data['token'],
		);
		$this->db->where('id_influ', $id);
		$this->db->update('instagram', $data2);

		$this->db->trans_complete();

        // check status of transaction
        if ($this->db->trans_status() === FALSE) 
        {
            log_message('error','got problem with insert data');
        }
	}

	//show data in table influencer one by one.
    function show_one($ifid) {

        $sql = "SELECT * FROM influencer   WHERE id_influ = ".$ifid ;
        $query = $this->db->query($sql);
        return $query->row();
  
    }

    //delete data in row
    function delete($id)
    {
    	$file = $this->show_one($id);
    	$detables = array('influencer','facebook','instagram');
    	$this->db->where('id_influ', $id);
   		$this->db->delete($detables);
   		//delete path picture
   		unlink('profile_images/' .$file->picture);
    	return true;
   		//$this->db->delete('influencer','facebook','instagram', array('id_influ' => $id)); 
    }

    //get pagination in page profile influencer
	function get_department_list($limit, $start)
    {
        $sql = 'SELECT * FROM influencer  WHERE id_influ LIMIT ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

    //get the username & password from admin
    function get_user($usr, $pwd)
    {
        $sql = "SELECT * FROM admin WHERE admin_name = '" . $usr . "' AND admin_password = '" . MD5($pwd) . "' AND status = 1";
        $query = $this->db->query($sql);
    
        return $query->num_rows();

    }


}
?>
