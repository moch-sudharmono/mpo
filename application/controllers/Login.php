<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			// Your own constructor code
	}
	
	public function index()
	{
		$this->load->model("user_m");
		$data['title'] = "Login Form";
		
		$this->load->view("pages/login/login_form", $data);
	}
	
	public function login_process()
	{
		$this->load->model("user_m");
		
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$where = array("username"=>$username, "password"=>hash('sha256', $password));
		
		$result = $this->user_m->auth_login($where);
		
		if( $result )
		{			
			$sess_array = array(
				 'id_user' => $result[0]->id_user,
				 'is_hqlogged' => true,
				 'username' => $result[0]->username
			);
			
			$this->session->set_userdata('gajiku_in', $sess_array);
			
			redirect("page");
		}
		else
		{
			$message = '<div class="alert alert-danger" role="alert"><strong>Gagal!</strong> Username dan Password tidak sesuai.</div>';
			$this->session->set_flashdata('pesan', $message);
			redirect("login");
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('gajiku_in');
		redirect("login", 'refresh');
	}
}