<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index($page = 'home')
	{
        //check user if user is logged in 
        if(!$this->session->userdata('logged_in')){
            redirect('user/login');
        }
		
		if(!file_exists(APPPATH.'views/pages/contents/'.$page.'.php')){
			show_404();
		}
		
		$data['user_info'] = $this->post_model->get_session_account_info($this->session->userdata('id_login'),2);
		
		$departments = $this->post_model->get_department();
		foreach ($departments as $dep){
			if ($dep['id']==$data['user_info']['dep']){
				$data['user_info']['dep'] = $dep['name'];
			}
		}
		
		$programs = $this->post_model->get_program();
		foreach ($programs as $prog){
			if ($prog['id']==$data['user_info']['prog']){
				$data['user_info']['prog'] = $prog['name'];
			}
		}
		
		switch ($data['user_info']['type']){
			case 2: $data['user_info']['type'] = "faculty"; break;
			case 3: $data['user_info']['type'] = "student"; break;
			case 4: $data['user_info']['type'] = "mseuf"; break;
			default: $data['user_info']['type'] = "mseuf"; break;
		}
        
		$this->load->view('templates/pagesHeader');
        $this->load->view('pages/index',$data);
        $this->load->view('pages/contents/'.$page);
        $this->load->view('pages/contents/modals');
        $this->load->view('js/pagesJS');
        $this->load->view('templates/pagesFooter');
	}
    
    public function login(){
        $this->load->view('login');
    }
	
	public function contents($page = "home"){
		//check user if user is logged in 
        if(!$this->session->userdata('logged_in')){
            redirect('user/login');
        }
		
		if(!file_exists(APPPATH.'views/pages/contents/'.$page.'.php')){
			show_404();
		}
		
		$data['user_info'] = $this->post_model->get_session_account_info($this->session->userdata('id_login'),2);
		
		$departments = $this->post_model->get_department();
		foreach ($departments as $dep){
			if ($dep['id']==$data['user_info']['dep']){
				$data['user_info']['dep'] = $dep['name'];
			}
		}
		
		$programs = $this->post_model->get_program();
		foreach ($programs as $prog){
			if ($prog['id']==$data['user_info']['prog']){
				$data['user_info']['prog'] = $prog['name'];
			}
		}
		
		switch ($data['user_info']['type']){
			case 2: $data['user_info']['type'] = "faculty"; break;
			case 3: $data['user_info']['type'] = "student"; break;
			case 4: $data['user_info']['type'] = "mseuf"; break;
			default: $data['user_info']['type'] = "mseuf"; break;
		}
        
		$this->load->view('templates/pagesHeader');
        $this->load->view('pages/index',$data);
        $this->load->view('pages/contents/'.$page);
        $this->load->view('pages/contents/modals');
        $this->load->view('js/pagesJS');
        $this->load->view('templates/pagesFooter');
	}
}
