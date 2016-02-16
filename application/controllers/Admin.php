
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model("Admin/Da_TIN_influencer");
 	
 	}

 	/* check if user login
     *
 	 */
 	private function check_isvalidated()
 	{

 		// if user has login session return true
		if(isset($_SESSION['admin_name']))
		{
			return true;
		} 
		else 
		{
			return false;
		}

			
		
	}
	public function index()
	{	
		
 		if ($this->check_isvalidated() == true)
 		{
 			redirect('admin/influencer');
 		}
 		else
 		{
 			//$this->session->set_flashdata('msg1', '<div class="alert alert-danger text-center">Pless login!</div>');
 			redirect('admin/login_form');

 		}
    }
    public function login_form()
	{	
		
	 	// set page title
		$data['title'] = "TIN | HOME";
		$this->load->view('header',$data);
		$this->load->view('admin/login_view',$data);
		$this->load->view('footer');
 	
    }
    public function login()
    {
    	//get the posted values
		$data = array(
        	$admin_name = $this->input->post("admin_name"),
       		$admin_password = $this->input->post("admin_password"),
		);

		//set validations
        $this->form_validation->set_rules("admin_name", "Username", "trim|required");
        $this->form_validation->set_rules("admin_password", "Password", "trim|required");
        $this->form_validation->set_message("required","กรุณากรอกข้อมูล %s");

         // if form login is null
        if ($this->form_validation->run() == FALSE)
        {
 			
 			//validation fails
		    $data['title'] = "TIN | HOME";
			$this->load->view('header',$data);
			$this->load->view('admin/login_view',$data);
			$this->load->view('footer');
        }
        // if form login is not null
        else
        {
			//check if username and password is correct

                $usr_result = $this->Da_TIN_influencer->get_user($admin_name, $admin_password);
                if ($usr_result > 0) //active user record is present
                {
                    //set the session variables
                    $sessiondata = array(
                        'admin_name' => $admin_name,
                        'loginuser' => TRUE
                    );
                    // Add user data in session
                    $this->session->set_userdata($sessiondata); 
                    //$this->influencer();
               		redirect('/admin/influencer');
                   
                }
                else
                {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                    redirect('/admin/index');
                }

        }
    
    }  

    // Logout from admin page
	public function logout() 
	{
		
		$sess_array = array
		(
			'admin_name' ,
			'loginuser' 
		);
		// removing session data
		$this->session->unset_userdata($sess_array);
		redirect('/admin/index');
        
	} 



	//page show  all influencers data     
	public function influencer()
	{
		//pagination section
		$config["base_url"] = base_url() . "/Admin/influencer";
        $config["total_rows"] = $this->db->count_all("influencer");
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['customer'] = $this->Da_TIN_influencer->get_department_list($config["per_page"], $data['page']);  

        //$this->db->limit($config['per_page'], $this->uri->segment(3));
        $data['pagination'] = $this->pagination->create_links();
        

        //get all influencers data 
		$data['customer'] = $this->Da_TIN_influencer->show();
		
		//if user login
	    if ($this->check_isvalidated() == true)
	    {
	    	//push data to show in table
	        if(!empty($data['customer']))
	        {
	        	
	        	$data['title'] = "TIN | HOME";
				$this->load->view('header',$data);
				$this->load->view('admin/influencer_view',$data);
				$this->load->view('footer');
	        }
	        else
	        {
	        	$this->session->set_flashdata('msg2', '<div class="alert alert-danger text-center">NO profile influencer</div>');
	        	$data['title'] = "TIN | HOME";
				$this->load->view('header',$data);
				$this->load->view('admin/influencer_view',$data);
				$this->load->view('footer');
	        }
	        
		}
		//lif user no login
		else
		{
			$this->session->set_flashdata('msg1', '<div class="alert alert-danger text-center">Pless login!</div>');
			redirect('admin/login_form');
		}
		
		
    }
        

	//up load image 
	public function uploadimage()
	{
		$config = array();
			$config['upload_path'] = './profile_images';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '0';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';


			$this->load->library('upload',$config);
            $this->upload->initialize($config);

			//$this->upload->addinflu();
			
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());

				print_r($error); exit;
			}

			return $this->upload->data();
	}

	//validation in function addinflu and function updateinflu 
	public function validation()
	{
		$tim=$this->form_validation;
	  	$data_option = array(
	  		array(
	  			"field"=>"name",
	  			"label"=>"Name",
	  			"rules"=>"required"
	  		),
	  		array(
	  			"field"=>"firstname",
	  			"label"=>"Firstname",
	  			"rules"=>"required"
	  		),
	  		array(
	  			"field"=>"lastname",
	  			"label"=>"Lastname",
	  			"rules"=>"required"
	  		),
	  		array(
                "field"   => "email", 
                "label"   => "Email", 
                "rules"   => "required|valid_email"
            ),
	  		array(
	  			"field"=>"sex",
	  			"label"=>"Sex",
	  			"rules"=>"required"
	  		),
	  		
	  		array(
	  			"field"=>"id_card",
	  			"label"=>"ID_Card",
	  			"rules"=>"exact_length[13]"
	  		),
	  		
	  		array(
	  			"field"=>"fb_id",
	  			"label"=>"facebookid",
	  			"rules"=>""
	  		),
	  		array(
	  			"field"=>"name_fb",
	  			"label"=>"facebookname",
	  			"rules"=>""
	  		),
	  		array(
	  			"field"=>"usernameIG",
	  			"label"=>"intagramname",
	  			"rules"=>""
	  		),
	  		array(
	  			"field"=>"token",
	  			"label"=>"access_token",
	  			"rules"=>""
	  		),
	  	);
	  	$tim->set_rules($data_option);
	  	$tim->set_message("required","กรุณากรอกข้อมูล %s");
	  	$tim->set_message("alpha_numeric","กรุณากรอกข้อมูล %s ให้ถูกต้อง ");
	  	$tim->set_message("exact_length","กรุณากรอกตัวเลข 13 หลัก");
	  	$tim->set_message("valid_email","กรุณากรอก %s ให้ถูกต้อง");
	}
 
	//call form addinflu-view 
	public function addinfluform() 
	{
		if ($this->check_isvalidated() == true)
		{
			$data['title'] = "TIN | HOME";
			$this->load->view('header',$data);
			$this->load->view('admin/addinflu_view',$data);
			$this->load->view('footer');
		}
		else
		{
			 $this->session->set_flashdata('msg1', '<div class="alert alert-danger text-center">Pless login!</div>');
			redirect('admin/login_form');
		}
		
	}

	//insert data 
	public function addinflu()
	{

		// set validation rules
		$this->validation();
	  
        // check for validation
	    if ($this->form_validation->run() == FALSE)
	    {
	    	
 			
	        $data['title'] = "TIN | HOME";
			$this->load->view('header',$data);

			$this->load->view('admin/addinflu_view',$data);

			$this->load->view('footer');
	    }
	    else
	    {
	    	$id = $this->input->post('id');
	    	$now = date("Y-m-d H:i:s");
			//if user does not select any files update only data
			if($_FILES['picture']['name'] == "")
			{

				$data = array(
					'name' => $this->input->post('name') ,
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'sex' => $this->input->post('sex'),
					'birthday' => $this->input->post('birthday'),
					'address' => $this->input->post('address'),
					'id_card' => $this->input->post('id_card'),
					'bank' => $this->input->post('bank'),
					'bank_account' => $this->input->post('bank_account'),
					'fb_id' =>$this->input->post('fb_id'),
					'name_fb' => $this->input->post('name_fb'),
					'usernameIG' =>$this->input->post('usernameIG'),
					'token' => $this->input->post('token'),
					'updated'=> $now,
					'created'=> $now,
						
					);
				$data1 = array(
					'fb_id' => $this->input->post('fb_id'),
					'name_fb' => $this->input->post('name_fb'),
				);
				$data2 = array(
					'usernameIG' => $this->input->post('usernameIG'),
					'token' => $this->input->post('token'),
				);
				$this->Da_TIN_influencer->insert_influencer($data,$data1,$data2);
				//if adding success go to influencer list page.
				redirect('/admin/influencer');
			}
			else //if user  select  files update data
			{
				$file_data = $this->uploadimage();
			
			    // prepare data to add in to database
				$data = array(
					'name' => $this->input->post('name') ,
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'sex' => $this->input->post('sex'),
					'birthday' => $this->input->post('birthday'),
					'picture' => $file_data['file_name'],
					'address' => $this->input->post('address'),
					'id_card' => $this->input->post('id_card'),
					'bank' => $this->input->post('bank'),
					'bank_account' => $this->input->post('bank_account'),
					'fb_id' =>$this->input->post('fb_id'),
					'name_fb' => $this->input->post('name_fb'),
					'usernameIG' =>$this->input->post('usernameIG'),
					'token' => $this->input->post('token'),
					'updated'=> $now,
					'created'=> $now,
							
				);
				$data1 = array(
					'fb_id' => $this->input->post('fb_id'),
					'name_fb' => $this->input->post('name_fb'),
				);
				$data2 = array(
					'usernameIG' => $this->input->post('usernameIG'),
					'token' => $this->input->post('token'),
				);
				$this->Da_TIN_influencer->insert_influencer($data,$data1,$data2);
		
				//if adding success go to influencer list page.
				redirect('/admin/influencer'); 
				        
			}
			
		}	


	}

	public function updateinfluform() 
	{	
		if ($this->check_isvalidated() == true)
		{
			$id = $this->input->get('edit');
			$data['customer'] = $this->Da_TIN_influencer->show_one($id);
			$data['title'] = "TIN | HOME";
			$this->load->view('header',$data);
			$this->load->view('admin/update_view',$data);
			$this->load->view('footer');
		}
		else
		{
			$this->session->set_flashdata('msg1', '<div class="alert alert-danger text-center">Pless login!</div>');
			redirect('admin/login_form');
		}
	}

	//update data in database
	public function updateinflu()
	{
		$now = date("Y-m-d H:i:s");
		$id = $this->input->post('edit');
	
		//if user does not select any files update only data
		$this->validation(); 
	    $data['customer'] = $this->Da_TIN_influencer->show_one($id);
		
        // check for validation
	    if ($this->form_validation->run() == FALSE)
	    {

	        $data['title'] = "TIN | HOME";
			$this->load->view('header',$data);
			$this->load->view('admin/update_view',$data); 
			$this->load->view('footer');
	    }
	    else
	    {
			if($_FILES['picture']['name'] == "")
			{
			
				$data = array(
						'name' => $this->input->post('name') ,
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'email' => $this->input->post('email'),
						'sex' => $this->input->post('sex'),
						'birthday' => $this->input->post('birthday'),
						'address' => $this->input->post('address'),
						'id_card' => $this->input->post('id_card'),
						'bank' => $this->input->post('bank'),
						'bank_account' => $this->input->post('bank_account'),
						'fb_id' =>$this->input->post('fb_id'),
						'name_fb' => $this->input->post('name_fb'),
						'usernameIG' =>$this->input->post('usernameIG'),
						'token' => $this->input->post('token'),
						'updated'=> $now,
						
					);
				$data1 = array(
					'fb_id' => $this->input->post('fb_id'),
					'name_fb' => $this->input->post('name_fb'),
				);
				$data2 = array(
					'usernameIG' => $this->input->post('usernameIG'),
					'token' => $this->input->post('token'),
				);
				$this->Da_TIN_influencer->updated($id,$data,$data1,$data2);

				//if adding success go to influencer list page.
				redirect('/admin/influencer');
			}
			else
			{
				
				
				$file_data = $this->uploadimage();
			
				$data = array(
						'name' => $this->input->post('name') ,
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'email' => $this->input->post('email'),
						'sex' => $this->input->post('sex'),
						'birthday' => $this->input->post('birthday'),
						'picture' => $file_data['file_name'],
						'address' => $this->input->post('address'),
						'id_card' => $this->input->post('id_card'),
						'bank' => $this->input->post('bank'),
						'bank_account' => $this->input->post('bank_account'),
						'fb_id' =>$this->input->post('fb_id'),
						'name_fb' => $this->input->post('name_fb'),
						'usernameIG' =>$this->input->post('usernameIG'),
						'token' => $this->input->post('token'),
						'updated'=> $now,
						
					);
				$data1 = array(
					'fb_id' => $this->input->post('fb_id'),
					'name_fb' => $this->input->post('name_fb'),
				);
				$data2 = array(
					'usernameIG' => $this->input->post('usernameIG'),
					'token' => $this->input->post('token'),
				);
			
				$this->Da_TIN_influencer->updated($id,$data);

				//if adding success go to influencer list page.
				redirect('/admin/influencer');
			}	
		}
	}

	
	public function deleteinflu()
	{

		if ($this->check_isvalidated() == true)
        {
        	$id = $this->input->get('delete');

			if($this->Da_TIN_influencer->delete($id))
			{
				redirect('/admin/influencer');
			}
			else
			{
				echo "error! no delete picture ";
			}
		}
		else
		{
			 $this->session->set_flashdata('msg1', '<div class="alert alert-danger text-center">Pless login!</div>');
			redirect('admin/login_form');
		}
		

	}
}
?>
