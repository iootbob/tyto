<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function accman($page = 'browse'){ // browse, add, view ,change
        
            //check if user is loged in 
            if(!$this->session->userdata('logged_in')){
                redirect('user/login');
            }
        
            if(!file_exists(APPPATH.'views/admin/account/'.$page.'.php')){
                show_404();
            }
                
            $data['active_tab'] = "active-tab-sidenav"; 
            $data['active_sublink'] = "active-sidenav-sublinks"; 
            $data['active_page'] = "active-page-option";
        
            //if($page == 'add' || $page == 'view'){
                $data['account_types'] = $this->post_model->get_account_type();
                $data['departments'] = $this->post_model->get_department();
                $data['library_sections'] = $this->post_model->get_library_section();
                $data['programs'] = $this->post_model->get_program();
            //}
		
			if($page == 'browse'){
				$data['all_admins'] = $this->post_model->get_all_accounts(1);
				$data['all_users'] = $this->post_model->get_all_accounts(2);
			}
		
			$data['user_info'] = $this->post_model->get_session_account_info($this->session->userdata('id_login'),1);

            $this->load->view('templates/adminHeader'); //just meta data
            $this->load->view('admin/index', $data);    //sidebar and mainHeader
            $this->load->view('admin/account/accTab');  //content header
            $this->load->view('admin/account/'.$page);
            $this->load->view('js/adminJS');
            $this->load->view('templates/adminFooter');
      

	}
    
    
    public function resdata($page = 'browse') //browse, add, change
	{
            //check if user is loged in 
            if(!$this->session->userdata('logged_in')){
                redirect('user/login');
            }
            if(!file_exists(APPPATH.'views/admin/resource/'.$page.'.php')){
                show_404();
            }
			
			$data['active_sublink'] = "active-sidenav-sublinks"; 
            $data['active_tab'] = "active-tab-sidenav";
            $data['active_page'] = "active-page-option";
        
            if($page == 'add'){
                $data['resource_types'] = $this->post_model->get_resource_type();
                $data['departments'] = $this->post_model->get_department();
				$data['library_sections'] = $this->post_model->get_library_section();
                $data['programs'] = $this->post_model->get_program();
            }
			
			$data['user_info'] = $this->post_model->get_session_account_info($this->session->userdata('id_login'),1);

            $this->load->view('templates/adminHeader');
            $this->load->view('admin/index', $data);
            $this->load->view('admin/resource/resourceTab');
            $this->load->view('admin/resource/'.$page);
            $this->load->view('js/adminJS');
            $this->load->view('templates/adminFooter');
	}
    
    
    public function records($page = 'browse'){
        
            //check if user is loged in 
            if(!$this->session->userdata('logged_in')){
                redirect('user/login');
            }
			
			$data['active_sublink'] = "active-sidenav-sublinks"; 
            $data['active_tab'] = "active-tab-sidenav";
            $data['active_page'] = "active-page-option";
			
			$data['user_info'] = $this->post_model->get_session_account_info($this->session->userdata('id_login'),1);

            $this->load->view('templates/adminHeader');
            $this->load->view('admin/index', $data);
            $this->load->view('admin/records/recTab');
            $this->load->view('js/adminJS');
            $this->load->view('templates/adminFooter');
    }
    
    
    
    public function statistics($page = 'library'){
            //check if user is loged in 
            if(!$this->session->userdata('logged_in')){
                redirect('user/login');
            }
		
			if(!file_exists(APPPATH.'views/admin/statistics/'.$page.'.php')){
                show_404();
            }

			$data['active_sublink'] = "active-sidenav-sublinks"; 
            $data['active_tab'] = "active-tab-sidenav";
            $data['active_page'] = "active-page-option";
		
			$data['user_info'] = $this->post_model->get_session_account_info($this->session->userdata('id_login'),1);

            $this->load->view('templates/adminHeader');
            $this->load->view('admin/index', $data);
            $this->load->view('admin/statistics/statTab');
            $this->load->view('admin/statistics/'.$page);
            $this->load->view('js/adminJS');
            $this->load->view('templates/adminFooter');
    }
	
	public function viewUser(){
			//check if user is logged in 
            if(!$this->session->userdata('logged_in')){
                redirect('user/login');
            }
			
			//echo "<script>alert('Searching')</script>";
			
			//$this->form_validation->set_rules('id-num', 'ID', 'required|exact_length[9]');
			
			$data['active_sublink'] = "active-sidenav-sublinks";
			$data['view_user'] = $this->post_model->get_view_user();
			
			if($data['view_user']){
				//$name = $data['view_user']['fname'];
				//echo "<script>alert('User Found $name')</script>";
				
				$data['active_sublink'] = "active-sidenav-sublinks";
				$data['active_tab'] = "active-tab-sidenav"; 
				$data['active_page'] = "active-page-option";

				$data['account_types'] = $this->post_model->get_account_type();
				$data['departments'] = $this->post_model->get_department();
				$data['library_sections'] = $this->post_model->get_library_section();
				$data['programs'] = $this->post_model->get_program();

				$data['user_info'] = $this->post_model->get_session_account_info($this->session->userdata('id_login'),1);

				$this->load->view('templates/adminHeader'); //just meta data
				$this->load->view('admin/index', $data);    //sidebar and mainHeader
				$this->load->view('admin/account/accTab');  //content header
				$this->load->view('admin/account/modify');
				$this->load->view('js/adminJS');
				$this->load->view('templates/adminFooter');
				
			}else{
				echo "<script>alert('User NOT Found')</script>";
				
				$data['active_sublink'] = "active-sidenav-sublinks";
				$data['active_tab'] = "active-tab-sidenav"; 
				$data['active_page'] = "active-page-option";

				$data['account_types'] = $this->post_model->get_account_type();
				$data['departments'] = $this->post_model->get_department();
				$data['library_sections'] = $this->post_model->get_library_section();
				$data['programs'] = $this->post_model->get_program();

				$data['user_info'] = $this->post_model->get_session_account_info($this->session->userdata('id_login'),1);

				$this->load->view('templates/adminHeader'); //just meta data
				$this->load->view('admin/index', $data);    //sidebar and mainHeader
				$this->load->view('admin/account/accTab');  //content header
				$this->load->view('admin/account/modify');
				$this->load->view('js/adminJS');
				$this->load->view('templates/adminFooter');
			}
		}
    
    public function createUser(){
        
        //check if user is loged in 
            if(!$this->session->userdata('logged_in')){
                redirect('user/login');
            }
		
		$accountType = $this->input->post('account');
		
		if($this->input->post('account') == 1)/*library staff */{
			//$idNumber = $this->input->post('id-num');
			//$this->form_validation->set_rules('id-num', 'ID', 'required|exact_length[9]|callback_check_id_exists['.$accountType.']');
			$this->form_validation->set_rules('lib-sec', 'Library Section', 'required');
	   	}
	   	else if($this->input->post('account') == 2)/*faculty */{
			$this->form_validation->set_rules('id-num', 'ID', 'required|exact_length[9]|callback_check_id_exists['.$accountType.']');
	   	}
		else if($this->input->post('account') == 3)/*student*/{
			$this->form_validation->set_rules('id-num', 'ID', 'required|exact_length[9]|callback_check_id_exists['.$accountType.']');
			$this->form_validation->set_rules('program','Program', '');
			$this->form_validation->set_rules('year', 'Year', 'required'); // set limited amount
	   	}
		else if($this->input->post('account') == 4)/*other*/{
			
	   	}
        
        $this->form_validation->set_rules('fname', 'First Name', 'required|alpha|trim');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|trim|alpha');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|callback_check_email_exists['.$accountType.']');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
        $this->form_validation->set_rules('cpassword', 'Confirmation Password', 'matches[password]');
        $this->form_validation->set_rules('phone', 'Phone', ''); // set limited amount
        $this->form_validation->set_rules('address', 'Address', 'required');
		
        if($this->form_validation->run() === FALSE){
	       $page = 'add';
        
            if(!file_exists(APPPATH.'views/admin/account/'.$page.'.php')){
                show_404();
            }else{
                $page = 'add';
            }
            
            $data['active_sublink'] = "active-sidenav-sublinks";
            $data['active_tab'] = "active-tab-sidenav"; 
            $data['active_page'] = "active-page-option";
            $data['page_form'] = $this->input->post('account');
            
            if($page == 'add'){
                $data['account_types'] = $this->post_model->get_account_type();
                $data['departments'] = $this->post_model->get_department();
				$data['library_sections'] = $this->post_model->get_library_section();
                $data['programs'] = $this->post_model->get_program();
            }
			
			$data['user_info'] = $this->post_model->get_session_account_info($this->session->userdata('id_login'),1);

            $this->load->view('templates/adminHeader'); //just meta data
            $this->load->view('admin/index', $data);    //sidebar and mainHeader
            $this->load->view('admin/account/accTab');  //content header
            $this->load->view('admin/account/'.$page);
            $this->load->view('js/adminJS');
            $this->load->view('templates/adminFooter');
        }
        
        else{
         
               if($this->input->post('account') != 1)/*not admin/library staff */{
				   $enc_password = md5($this->input->post('password'));
                    
                   $this->post_model->set_users($enc_password);
				   
				   if($this->input->post('account')==4){
					   $maxID = $this->post_model->get_most_recent_id(4);
					   $newID = $maxID[0]['user_id_number'];
					   /*if ($maxID->num_rows() > 0)
						{
							$row = $maxID->result_array();
							$newID = $row[0]['user_id_number'];
							//$newID = "mseuf-".$newid;
						}*/
					   $this->session->set_flashdata('new_id_number',$newID);
					}else{
					   $this->session->set_flashdata('new_id_number',$this->input->post('id-num'));
				   }
				   $this->session->set_flashdata('new_name',$this->input->post('fname')." ".$this->input->post('lname'));
				   $this->session->set_flashdata('new_password',$this->input->post('password'));
				   
                   redirect('admin/accman/browse');
               }
                else /*library staff*/{
                   $enc_password = md5($this->input->post('password'));
                    
					$maxID = $this->post_model->get_most_recent_id(1);
					$newID = $maxID[0]['lib_id_number'];
					/*if ($maxID->num_rows() > 0)
						{
							$row = $maxID->result_array();
							$newID = $row[0]['lib_id_number'];
							//$newID = "admin-".$newid;
						}*/
					$this->session->set_flashdata('new_id_number',$newID);
					$this->session->set_flashdata('new_name',$this->input->post('fname')." ".$this->input->post('lname'));
				   $this->session->set_flashdata('new_password',$this->input->post('password'));
					
                   $this->post_model->set_admin_users($enc_password);
                   redirect('admin/accman/browse');
               }
            }
            
        }
	
	public function modifyUser(){
		if(!$this->session->userdata('logged_in')){
                redirect('user/login');
            }
		
		$accountType = $this->input->post('account');
		$oldAccountType = $this->input->post('old_account');
		$oldIdNumber = $this->input->post('cur_id_number');
		$oldEmail = $this->input->post('cur_email');
		$newEmail = $this->input->post('email');
		
		$accountChange = false;
		
		if($accountType!=$oldAccountType){
			$accountChange = true;
		}
		
		if($this->input->post('account') == 1)/*library staff */{
			//$idNumber = $this->input->post('id-num');
			//$this->form_validation->set_rules('id-num', 'ID', 'required|exact_length[9]|callback_check_id_exists['.$accountType.']');
			$this->form_validation->set_rules('lib-sec', 'Library Section', 'required');
	   	}
	   	else if($this->input->post('account') == 2)/*faculty */{
			$IdNumber = $this->input->post('id_number');
			if($accountChange){
				$this->form_validation->set_rules('id-num', 'ID', 'required|exact_length[9]|callback_check_id_exists['.$accountType.']');
			}else{
				if($oldIdNumber!=$IdNumber){
					$this->form_validation->set_rules('id-num', 'ID', 'required|exact_length[9]|callback_check_id_exists['.$accountType.']');
				}else{
					$this->form_validation->set_rules('id-num', 'ID', 'required|exact_length[9]');
				}
			}
	   	}
		else if($this->input->post('account') == 3)/*student*/{
			$IdNumber = $this->input->post('id_number');
			if($accountChange){
				$this->form_validation->set_rules('id-num', 'ID', 'required|exact_length[9]|callback_check_id_exists['.$accountType.']');
			}else{
				if($oldIdNumber!=$IdNumber){
					$this->form_validation->set_rules('id-num', 'ID', 'required|exact_length[9]|callback_check_id_exists['.$accountType.']');
				}else{
					$this->form_validation->set_rules('id-num', 'ID', 'required|exact_length[9]');
				}
			}
			$this->form_validation->set_rules('program','Program', '');
			$this->form_validation->set_rules('year', 'Year', 'required'); // set limited amount
	   	}
		else if($this->input->post('account') == 4)/*other*/{
			
	   	}
        
        $this->form_validation->set_rules('fname', 'First Name', 'required|alpha|trim');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|trim|alpha');
		if($accountChange){
			$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|callback_check_email_exists['.$accountType.']');
		}else{
			if($oldEmail!=$newEmail){
				$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|callback_check_email_exists['.$accountType.']');
			}else{
				$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
			}
		}
        $this->form_validation->set_rules('phone', 'Phone', ''); // set limited amount
        $this->form_validation->set_rules('address', 'Address', 'required');
		
		if($this->form_validation->run() === FALSE){
	       /*$page = 'modify';
            if(!file_exists(APPPATH.'views/admin/account/'.$page.'.php')){
                show_404();
            }
            
			$data['active_sublink'] = "active-sidenav-sublinks";
            $data['active_tab'] = "active-tab-sidenav"; 
            $data['active_page'] = "active-page-option";
            
            //if($page == 'add'){
                $data['account_types'] = $this->post_model->get_account_type();
                $data['departments'] = $this->post_model->get_department();
				$data['library_sections'] = $this->post_model->get_library_section();
                $data['programs'] = $this->post_model->get_program();
            //}
			
			$data['user_info'] = $this->post_model->get_session_account_info($this->session->userdata('id_login'),1);

            $this->load->view('templates/adminHeader'); //just meta data
            $this->load->view('admin/index', $data);    //sidebar and mainHeader
            $this->load->view('admin/account/accTab');  //content header
            $this->load->view('admin/account/'.$page);
            $this->load->view('js/adminJS');
            $this->load->view('templates/adminFooter');*/
			$this->load->view('admin/accman/modify.php');
        }
        
        else{
			if($accountChange){
				$this->post_model->delete_user_account($oldAccountType,$oldIdNumber);
			}
         
		   if($this->input->post('account') != 1)/*not admin/library staff */{
				$enc_password = $this->input->post('password');
			   
				if($accountChange){
					$this->post_model->set_users($enc_password);
				}else{
					$this->post_model->update_users($enc_password);
			   	}
			   
			   redirect('admin/accman/browse');
		   }
			else /*library staff*/{
			   $enc_password = $this->input->post('password');
				
				if($accountChange){
					$this->post_model->set_admin_users($enc_password);
				}else{
					$this->post_model->update_admin_users($enc_password);
			   	}
				
			   redirect('admin/accman/browse');
		   }
		}
	}
	
	public function deleteUser(){
		$accountType = $this->input->post('search_type');
		$idNumber = $this->input->post('search_id');
		if($accountType==1){
			$adminIdNumber = $this->input->post('search_cur_id');
		}
		
		$this->post_model->delete_user_account($accountType,$idNumber);
		if($accountType==1){
			redirect('user/logout');
		}else{
			redirect('admin/accman/browse');
		}
	}
    
         
        function check_id_exists($id,$account){
            $this->form_validation->set_message('check_id_exists', 'This ID number already exists, please enter a non-existent ID number');
            
            if($this->post_model->check_id_exists($id,$account)){
                return true;
            }
            else{
                return false;
            }
       }
		
		function check_email_exists($email,$account){
            $this->form_validation->set_message('check_email_exists', 'This Email already exists, please enter a non-existent Email');
            
            if(empty($this->post_model->check_email_exists($email,$account))){
                return false;
            }
            else{
                return true;
            }
        }
    
    
    
    
     public function createBook(){
        
        //check if user is logged in 
            if(!$this->session->userdata('logged_in')){
                redirect('user/login');
            }
        
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('author','Author','required');
        $this->form_validation->set_rules('publisher','Publisher','required');
        $this->form_validation->set_rules('publish-date','Publish Date','required'); 
        $this->form_validation->set_rules('book-number','Book Number','required|numeric');
        $this->form_validation->set_rules('genre','Genre','required');
        $this->form_validation->set_rules('department','Department','required');
        $this->form_validation->set_rules('program','Program','required');
        $this->form_validation->set_rules('location','Location','required');
        $this->form_validation->set_rules('quantity','Quantity','required|numeric');
        $this->form_validation->set_rules('about','Summay/Sypnosis','required');
        
        if($this->form_validation->run() === FALSE){
            
	       $page = 'add';
        
            if(!file_exists(APPPATH.'views/admin/resource/'.$page.'.php')){
                show_404();
            }
            
            // if error refresh page with errors
                
            $data['active_tab'] = "active-tab-sidenav"; 
            $data['active_page'] = "active-page-option";
            
            if($page == 'add'){
                $data['resource_types'] = $this->post_model->get_resource_type();
                $data['departments'] = $this->post_model->get_department();
				$data['library_sections'] = $this->post_model->get_library_section();
                $data['programs'] = $this->post_model->get_program();
            }
			
			$data['user_info'] = $this->post_model->get_session_account_info($this->session->userdata('id_login'),1);

            $this->load->view('templates/adminHeader'); //just meta data
            $this->load->view('admin/index', $data);    //sidebar and mainHeader
            $this->load->view('admin/resource/resourceTab');  //content header
            $this->load->view('admin/resource/'.$page);
            $this->load->view('js/adminJS');
            $this->load->view('templates/adminFooter');
        }
        
        else{
                // Upload Image
				$config['upload_path'] = './assets/admin/images/bookcover';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '0';
				$config['max_height'] = '0';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('userfile')){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->post_model->set_book($post_image);
            
                redirect('admin/resdata/add');
               }
             
            }


    
} // end of class
