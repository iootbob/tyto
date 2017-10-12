<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function login()
	{
        
        $this->form_validation->set_rules('id-num','ID-Number','required', array('required' => 'ID - Number is required'));
        $this->form_validation->set_rules('password','Password','required', array('required' => 'Password is required'));
		
		$id_login = $this->input->post('id-num');
        $password = md5($this->input->post('password'));
		
        if($this->form_validation->run() === FALSE){
            $this->load->view('login');
        }
        else{
            $user_id = $this->post_model->user_login($id_login,$password);
            
            if($user_id){
            
            $user_data = array(
                'user_id'=> $user_id,
                'id_login' => $id_login,
                'logged_in' => true
            );
            
            $this->session->set_userdata($user_data);
            
            redirect('pages');
                
            } else {
				
				$user_id = $this->post_model->admin_login($id_login,$password);
				
				if($user_id){
            
					$user_data = array(
						'user_id'=> $user_id,
						'id_login' => $id_login,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					redirect('admin/accman/browse');

					} else { 
				
					$this->session->set_flashdata('login_error', 'Invalid login details');
					redirect('user/login');
				}
			}
            
		}
	}
    
    public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('user/login');
		}
    
	/*
	public function login()
	{
        $data['account_types'] = $this->post_model->get_account_type();

        
        $this->form_validation->set_rules('id-num','ID-Number','required', array('required' => 'ID - Number is required'));
        $this->form_validation->set_rules('password','Password','required', array('required' => 'Password is required'));
        
        if($this->form_validation->run() === FALSE){
            $this->load->view('login',$data);
        }
        else{

            
            if($this->input->post('accType') == 1) /* student /{
            $id_login = $this->input->post('id-num');
            $password = md5($this->input->post('password'));
            
                $user_id = $this->post_model->student_login($id_login,$password);
            
            if($user_id){
            
            $user_data = array(
                'user_id'=> $user_id,
                'id_login' => $id_login,
                'logged_in' => true
            );
            
            $this->session->set_userdata($user_data);
            
            redirect('pages');
            }
            }
            
            if($this->input->post('accType') == 2) /* faculty /{
            $id_login = $this->input->post('id-num');
            $password = md5($this->input->post('password'));
            
                $user_id = $this->post_model->faculty_login($id_login,$password);
            
            if($user_id){
            
            $user_data = array(
                'user_id'=> $user_id,
                'id_login' => $id_login,
                'logged_in' => true
            );
            
            $this->session->set_userdata($user_data);
            
            redirect('pages');
            }
            }
            
            if($this->input->post('accType') == 3) /* library /{
            $id_login = $this->input->post('id-num');
            $password = md5($this->input->post('password'));
            
                $user_id = $this->post_model->library_login($id_login,$password);
            
            if($user_id){
            
            $user_data = array(
                'user_id'=> $user_id,
                'id_login' => $id_login,
                'logged_in' => true
            );
            
            $this->session->set_userdata($user_data);
            
            redirect('admin/accman/browse');
                
            }
                else{
                $this->session->set_flashdata('login_error', 'Invalid login details');
                redirect('user/login');
                }
            }
        
            
        else{
            
            $this->session->set_flashdata('login_error', 'Invalid login details');
            redirect('user/login');
            }
        }	
	}*/
    
}
