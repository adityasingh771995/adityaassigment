<?php

Class New_control extends CI_Controller{
	
	public function __construct(){
		parent::__construct();

		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');

		$this->load->library('session');
		$this->load->helper('captcha');
		$this->load->helper('email');


		$this->load->model('new_model');

		//$this->load->helper('logo');
		//$this->load->helper('getimagepath');
		//$this->load->helper('notification');


	}

	public function index(){
//echo "hi"; die();
		 $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            
            'img_width'     => '160',
            'img_height'    => 160,
            'word_length'   => 4,
            'font_size'     => 10
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);
        
        // Pass captcha image to view
        $data['captchaImg'] = $captcha['image'];
        $data['res']=$this->db->select('*')->from('student_data')->get()->result();
		//echo "<pre>";
		//print_r($data);die();
        
        // Load the view
        $this->load->view('form',$data);


		
	}

	public function insert(){

		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('designation', 'designation', 'trim|required');
		$this->form_validation->set_rules('salary','salary','trim|required');
		$this->form_validation->set_rules('date','date','trim|required');
		$this->form_validation->set_rules('captcha','captcha','trim|required|callback_matchcaptcha');

		if($this->form_validation->run() == TRUE){
			//print_r($this->input->post($_POST));die();
			//$captcha=$this->input->post('captcha');
			
				$data= array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'designation' => $this->input->post('designation'),
					'salary' => $this->input->post('salary'),
					'date' => $this->input->post('date')
					
				);
				//print_r($data);
				$result=$this->new_model->insert_data($data);
				$data['captchaImg'] =$this->get_captcha();
				$data['res']=$this->db->select('*')->from('student_data')->get()->result();
				//echo "<pre>";
				//print_r($data);die();
				
				if($result==TRUE){
					//echo "hhhhhlkhzhs";
					$data['message']="data inserted successfully";
					$this->load->view('form',$data);
				}else{
					//echo "chdbchdchb";
					$data['message']="data not inserted try again";
					$this->load->view('form',$data);
				}



			

		}else{
			$this->index();
		}





	}

	public function matchcaptcha($str){
		
		echo $str;
		echo $this->session->userdata('captchaCode');

		
		if($str == $this->session->userdata('captchaCode')){
			//echo "hi";
			return true;
		}else{
			$this->form_validation->set_message('matchcaptcha','captcha does not match');
			//echo "aaaaa";
			return false;
		}

	}

	public function get_captcha(){
		 $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            
            'img_width'     => '160',
            'img_height'    => 160,
            'word_length'   => 4,
            'font_size'     => 10
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);
        
        // Pass captcha image to view
        $data['captchaImg'] = $captcha['image'];
        return $data['captchaImg'];
	}


	public function select_data(){
				$data['res']=$this->db->select('*')->from('student_data')->get()->result();
				//echo "<pre>";
				//print_r($data1);die();
				$this->load->view('showall',$data);
	}


	public function delete(){
		$id=$this->input->get('id');
		//echo $id;die();
		$result=$this->new_model->delete($id);
		//$this->index();
		$data['res']=$this->db->select('*')->from('student_data')->get()->result();
		$data['captchaImg'] =$this->get_captcha();
		if($result==TRUE){
			//echo "hhhhhlkhzhs";
			$data['message']="data deleted successfully";
			$this->load->view('form',$data);
		}else{
			//echo "chdbchdchb";
			$data['message']="data not deleted try again";
			$this->load->view('form',$data);
		}

	}


	public function getbyid(){
		$id=$this->input->get('id');
		//echo $id;die();

		$data['result']=$this->new_model->getbyid($id);
		$data['captchaImg'] =$this->get_captcha();
		//$data['res']=$this->db->select('*')->from('student_data')->get()->result();
		//echo "<pre>";
		//print_r($data);die();
		$this->load->view('formupdate',$data);
		
	}

	public function update_data(){

		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('designation', 'designation', 'trim|required');
		$this->form_validation->set_rules('salary','salary','trim|required');
		$this->form_validation->set_rules('date','date','trim|required');
		$this->form_validation->set_rules('captcha','captcha','trim|required|callback_matchcaptcha');

		if($this->form_validation->run() == TRUE){
			//print_r($this->input->post($_POST));die();
			//$captcha=$this->input->post('captcha');
			
				$data= array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'designation' => $this->input->post('designation'),
					'salary' => $this->input->post('salary'),
					'date' => $this->input->post('date')
					
				);
				
				$id=$this->input->post('id');
				$result=$this->new_model->update($data,$id);
				$data['captchaImg'] =$this->get_captcha();
				$data['res']=$this->db->select('*')->from('student_data')->get()->result();
				//echo "<pre>";
				//print_r($data);die();
				
				if($result==TRUE){
					
					$data['message']="data updated successfully";
					$this->load->view('form',$data);
				}else{
					
					$data['message']="data not updated try again";
					$this->load->view('form',$data);
				}



		}else{
			$this->index();
		}

	}


	







}

