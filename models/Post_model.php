<?php 
class Post_model extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }

    public function get_account_type(){
        
        $this->db->order_by('id');
        $query = $this->db->get('account_type');
        return $query->result_array();
    }
    
    public function get_resource_type(){
        
        $this->db->order_by('id');
        $query = $this->db->get('book_type');
        return $query->result_array();    
    }
    
    public function get_department(){
        
        $this->db->order_by('name');
        $query = $this->db->get('department');
        return $query->result_array();
    }
	
	public function get_library_section(){
        
        $this->db->order_by('name');
        $query = $this->db->get('library_section');
        return $query->result_array();
    }
    
    public function get_program(){
        $this->db->order_by('name');
        $query= $this->db->get('program');
        return $query->result_array();
    }
	
	public function get_all_accounts($account_type, $limit = FALSE, $offset = FALSE){
        
        if($limit){
            $this->db->limit($limit, $offset);
        }
        
		$this->db->order_by('id','DESC');
		if($account_type==1){
			$query= $this->db->get('library_accounts');
		}else{
			$query= $this->db->get('user_accounts');
		}
		return $query->result_array();
    }
	
	public function get_view_user(){ // used to fetch data from database
		$id_number = $this->input->post('search_id');
		$query = $this->db->get_where('user_accounts', array('user_id_number' => $id_number));
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$view_info['type'] = $row->user_type;
				$view_info['fname'] = $row->user_fname;
				$view_info['lname'] = $row->user_lname;
				$view_info['id_number'] = $row->user_id_number;
				$view_info['email'] = $row->user_email;
				$view_info['password'] = $row->user_password;
				$view_info['dep'] = $row->user_dep;
				$view_info['prog'] = $row->user_prog;
				$view_info['year'] = $row->user_year;
				$view_info['bday'] = $row->user_bday;
				$view_info['phone'] = $row->user_phone;
				$view_info['address'] = $row->user_address;

			}
			return $view_info;
		}
		else{
			$query = $this->db->get_where('library_accounts', array('lib_id_number' => $id_number));
			if($query->num_rows() > 0){
				foreach ($query->result() as $row) {
					$user_info['fname'] = $row->lib_fname;
					$user_info['lname'] = $row->lib_lname;
					$user_info['id_number'] = $row->lib_id_number;
					$user_info['email'] = $row->lib_email;
					$user_info['password'] = $row->lib_password;
					$user_info['section'] = $row->lib_section;
					$user_info['bday'] = $row->lib_bday;
					$user_info['phone'] = $row->lib_phone;
					$user_info['address'] = $row->lib_address;

				}
				return $user_info;
			}else{
				return false;
			}
		}
	}
	
	public function get_session_account_info($id_login,$account_type){
		
        if($account_type == 1)/*admin*/{
            
			$query = $this->db->get_where('library_accounts', array('lib_id_number' => $id_login));
			foreach ($query->result() as $row) {
				$user_info['fname'] = $row->lib_fname;
				$user_info['lname'] = $row->lib_lname;
				$user_info['id_number'] = $row->lib_id_number;
				$user_info['email'] = $row->lib_email;
				$user_info['password'] = $row->lib_password;
				$user_info['section'] = $row->lib_section;
				$user_info['bday'] = $row->lib_bday;
				$user_info['phone'] = $row->lib_phone;
				$user_info['address'] = $row->lib_address;

			}
		} else if($account_type == 2)/*students*/ {
            
			$query = $this->db->get_where('user_accounts', array('user_id_number' => $id_login));
			
			foreach ($query->result() as $row) {
				$user_info['type'] = $row->user_type;
				$user_info['fname'] = $row->user_fname;
				$user_info['lname'] = $row->user_lname;
				$user_info['id_number'] = $row->user_id_number;
				$user_info['email'] = $row->user_email;
				$user_info['password'] = $row->user_password;
				$user_info['dep'] = $row->user_dep;
				$user_info['prog'] = $row->user_prog;
				$user_info['year'] = $row->user_year;
				$user_info['bday'] = $row->user_bday;
				$user_info['phone'] = $row->user_phone;
				$user_info['address'] = $row->user_address;

			}
		}
        
        return $user_info;
    }
    
    public function set_users($enc_password){
		
		if($this->input->post('account') == 2) /* faculty */{
			$data = array(
				'user_type' => 2,
				'user_fname' => $this->input->post('fname',TRUE),
				'user_lname' => $this->input->post('lname',TRUE),
				'user_id_number' => $this->input->post('id-num',TRUE),
				'user_email' => $this->input->post('email',TRUE),
				'user_password' => $enc_password,
				'user_dep' => $this->input->post('department',TRUE),
				'user_prog' => '',
				'user_year' => '',
				'user_bday' => $this->input->post('birthday',TRUE),
				'user_phone' => $this->input->post('phone',TRUE),
				'user_address' => $this->input->post('address',TRUE),
			);
		}else if($this->input->post('account') == 3) /* student */{
			$data = array(
				'user_type' => 3,				
				'user_fname' => $this->input->post('fname',TRUE),
				'user_lname' => $this->input->post('lname',TRUE),
				'user_id_number' => $this->input->post('id-num',TRUE),
				'user_email' => $this->input->post('email',TRUE),
				'user_password' => $enc_password,
				'user_dep' => $this->input->post('department',TRUE),
				'user_prog' => $this->input->post('program',TRUE),
				'user_year' => $this->input->post('year',TRUE),
				'user_bday' => $this->input->post('birthday',TRUE),
				'user_phone' => $this->input->post('phone',TRUE),
				'user_address' => $this->input->post('address',TRUE),
			);
		}else if($this->input->post('account') == 4) /* other */{
			/*$newid = 0;

			$this->db->select('user_id');
			$this->db->where('user_type',4);
			$allOther = $this->db->get('user_accounts');
			
			$newid = $allOther->num_rows() + 1;

			$newIDNumber = "mseuf-".$newid;*/
			
			$newid = 0;

			$maxID = $this->post_model->get_max_id(4);

			if ($maxID->num_rows() > 0)
			{
				$row = $maxID->result_array();
				$newid = 1 + $row[0]['id'];
			}

			$newIDNumber = "mseuf-".$newid;
			
			$data = array(
				'user_type' => 4,
				'user_fname' => $this->input->post('fname',TRUE),
				'user_lname' => $this->input->post('lname',TRUE),
				'user_id_number' => $newIDNumber,
				'user_email' => $this->input->post('email',TRUE),
				'user_password' => $enc_password,
				'user_dep' => '',
				'user_prog' => '',
				'user_year' => '',
				'user_bday' => $this->input->post('birthday',TRUE),
				'user_phone' => $this->input->post('phone',TRUE),
				'user_address' => $this->input->post('address',TRUE),
			);
		}
        
        $this->db->insert('user_accounts', html_escape($data));
        
    }
	
	public function get_max_id($user_type) {
		$this->db->select_max('id');
		
		if($user_type==1){
			$maxID = $this->db->get('library_accounts');
		}else{
			$maxID = $this->db->get('user_accounts');
		}
		
		return $maxID;
	}
	
	public function get_most_recent_id($user_type){
		/*$this->db->select('id')->order_by('id',"desc")->limit(1)->row();
		if($user_type==1){
			$maxID = $this->db->get('library_accounts');
		}else{
			$maxID = $this->db->get('user_accounts');
		}
		return $maxID;*/
		
		if($user_type==1){
			$query ="select * from library_accounts order by id DESC limit 1";
		}else{
			$query ="select * from user_accounts order by id DESC limit 1";
		}

     	$res = $this->db->query($query);

     	if($res->num_rows() > 0) {
            return $res->result("array");
    	}
    	return array();
	}
	
	public function set_admin_users($enc_password){
		$newid = 0;

    	$maxID = $this->post_model->get_max_id(1);
		
		if ($maxID->num_rows() > 0)
        {
            $row = $maxID->result_array();
            $newid = 1 + $row[0]['id'];
        }
		
		$newIDNumber = "admin-".$newid;
		
			$data = array(
				'lib_fname' => $this->input->post('fname',TRUE),
				'lib_lname' => $this->input->post('lname',TRUE),
				'lib_id_number' => $newIDNumber,
				'lib_email' => $this->input->post('email',TRUE),
				'lib_password' => $enc_password,
				'lib_section' => $this->input->post('lib-sec',TRUE),
				'lib_bday' => $this->input->post('birthday',TRUE),
				'lib_phone' => $this->input->post('phone',TRUE),
				'lib_address' => $this->input->post('address',TRUE),
			);
		
        
        $this->db->insert('library_accounts', html_escape($data));
        
    }
	
	public function update_users($enc_password){
		
		if($this->input->post('account') == 2) /* faculty */{
			$data = array(
				'user_type' => 2,
				'user_fname' => $this->input->post('fname',TRUE),
				'user_lname' => $this->input->post('lname',TRUE),
				'user_id_number' => $this->input->post('id-num',TRUE),
				'user_email' => $this->input->post('email',TRUE),
				'user_password' => $enc_password,
				'user_dep' => $this->input->post('department',TRUE),
				'user_prog' => '',
				'user_year' => '',
				'user_bday' => $this->input->post('birthday',TRUE),
				'user_phone' => $this->input->post('phone',TRUE),
				'user_address' => $this->input->post('address',TRUE),
			);
		}else if($this->input->post('account') == 3) /* student */{
			$data = array(
				'user_type' => 3,				
				'user_fname' => $this->input->post('fname',TRUE),
				'user_lname' => $this->input->post('lname',TRUE),
				'user_id_number' => $this->input->post('id-num',TRUE),
				'user_email' => $this->input->post('email',TRUE),
				'user_password' => $enc_password,
				'user_dep' => $this->input->post('department',TRUE),
				'user_prog' => $this->input->post('program',TRUE),
				'user_year' => $this->input->post('year',TRUE),
				'user_bday' => $this->input->post('birthday',TRUE),
				'user_phone' => $this->input->post('phone',TRUE),
				'user_address' => $this->input->post('address',TRUE),
			);
		}else if($this->input->post('account') == 4) /* other */{
			/*$newid = 0;

			$this->db->select('user_id');
			$this->db->where('user_type',4);
			$allOther = $this->db->get('user_accounts');
			
			$newid = $allOther->num_rows() + 1;

			$newIDNumber = "mseuf-".$newid;
			
			$newid = 0;

			$this->db->select_max('id');
			$maxID = $this->db->get('user_accounts');

			if ($maxID->num_rows() > 0)
			{
				$row = $maxID->result_array();
				$newid = 1 + $row[0]['id'];
			}

			$newIDNumber = "mseuf-".$newid;*/
			
			$data = array(
				'user_type' => 4,
				'user_fname' => $this->input->post('fname',TRUE),
				'user_lname' => $this->input->post('lname',TRUE),
				'user_id_number' => $this->input->post('cur_id_number',TRUE),
				//'user_id_number' => $newIDNumber,
				'user_email' => $this->input->post('email',TRUE),
				'user_password' => $enc_password,
				'user_dep' => '',
				'user_prog' => '',
				'user_year' => '',
				'user_bday' => $this->input->post('birthday',TRUE),
				'user_phone' => $this->input->post('phone',TRUE),
				'user_address' => $this->input->post('address',TRUE),
			);
		}
        $this_id_number = $this->input->post('cur_id_number');
		$this->db->where('user_id_number', $this_id_number);
 		$query = $this->db->update('user_accounts',html_escape($data));
        //$this->db->insert('user_accounts', html_escape($data));
        
    }
	
	public function update_admin_users($enc_password){
		/*$newid = 0;

        $this->db->select_max('id');
    	$maxID = $this->db->get('library_accounts');
		
		if ($maxID->num_rows() > 0)
        {
            $row = $maxID->result_array();
            $newid = 1 + $row[0]['id'];
        }
		
		$newIDNumber = "admin-".$newid;*/
		
			$data = array(
				'lib_fname' => $this->input->post('fname',TRUE),
				'lib_lname' => $this->input->post('lname',TRUE),
				'lib_id_number' => $this->input->post('cur_id_number',TRUE),
				'lib_email' => $this->input->post('email',TRUE),
				'lib_password' => $enc_password,
				'lib_section' => $this->input->post('lib-sec',TRUE),
				'lib_bday' => $this->input->post('birthday',TRUE),
				'lib_phone' => $this->input->post('phone',TRUE),
				'lib_address' => $this->input->post('address',TRUE),
			);
		
        $this_id_number = $this->input->post('cur_id_number');
		$this->db->where('lib_id_number', $this_id_number);
 		//$query = $this->db->update('user_accounts',html_escape($data));
		
        $this->db->insert('library_accounts', html_escape($data));
        
    }
	
	public function delete_user_account($oldAccountType,$oldIdNumber){
		if($oldAccountType!=1)/*not admin*/{
			$whereArray = array('user_type' => $oldAccountType, 'user_id_number' => $oldIdNumber);
			$this->db->where($whereArray);
			$this -> db -> delete('user_accounts');
		}else{
			$whereArray = array('lib_id_number' => $oldIdNumber);
			$this->db->where($whereArray);
			$this -> db -> delete('library_accounts');
		}
	}
    
    public function check_id_exists($id,$account){
		if($account==1){
			$admin_query = $this->db->get_where('library_accounts', array('lib_id_number' => $id));
			if(empty($admin_query->row_array())){
				return true;
			}
			else{
				return false;
			}
		}else{
        	$users_query = $this->db->get_where('user_accounts', array('user_type' => $account, 'user_id_number' => $id));
			if(empty($users_query->row_array())){
				return true;
			}
			else{
				return false;
			}
		}
    }
	
	public function check_email_exists($email,$account){
		/*if($account==1){
			$admin_query = $this->db->get_where('library_accounts', array('lib_email' => $email));
			if(empty($admin_query->row_array())){
				return true;
			}
			else{
				return false;
			}
		}else{
        	$users_query = $this->db->get_where('user_accounts', array('user_type' => $account,'user_email' => $email));
			if(empty($users_query->row_array())){
				return true;
			}
			else{
				return false;
			}
		}*/
			$admin_query = $this->db->get_where('library_accounts', array('lib_email' => $email));
			if(empty($admin_query->row_array())){
				return true;
			}
			else{
				$users_query = $this->db->get_where('user_accounts', array('user_type' => $account,'user_email' => $email));
				if(empty($users_query->row_array())){
					return true;
				}
				else{
					return false;
				}
			}
    }
    
    public function user_login($id_login,$password){
        $this->db->where('user_id_number', $id_login);
        $this->db->where('user_password', $password);
        
        $result = $this->db->get('user_accounts');
		
        if($result->num_rows() == 1){
            return $result->row(0)->id;
        }
        else{
            return false;
        }
    }
    
	public function admin_login($id_login,$password){
        $this->db->where('lib_id_number', $id_login);
        $this->db->where('lib_password', $password);
        
        $result = $this->db->get('library_accounts');
        if($result->num_rows() == 1){
            return $result->row(0)->id;
        }
        else{
            return false;
        }
    }
    
    public function set_book($post_image){
        
        $data = array(
            'image' => $post_image,
            'title' => $this->input->post('title',TRUE),
            'author' => $this->input->post('author',TRUE),
            'publisher' => $this->input->post('publisher',TRUE),
            'published_date' => $this->input->post('publish-date',TRUE),
            'book_number' => $this->input->post('book-number',TRUE),
            'genre' => $this->input->post('genre',TRUE),
            'department' => $this->input->post('department', TRUE),
            'program' => $this->input->post('program', TRUE),
            'location' => $this->input->post('location',TRUE),
            'quantity' => $this->input->post('quantity',TRUE),
            'summary' => $this->input->post('about',TRUE)
            
        );
        
        $this->db->insert('book_type',html_escape($data));
        
    }
    
    

	
}

?>