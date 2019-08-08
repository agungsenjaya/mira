<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}
	function index()
	{
		if ($this->session->userdata('status') == "login") {
			redirect(base_url("admin"));
		}
		$this->load->view('layouts/header');
		$this->load->view('login_view');
		$this->load->view('layouts/footer');
	}
	function login_act(){
		$username = $this->input->post('user_name');
		$password = $this->input->post('user_password');
		$where = array(
			'user_name' => $username, 
			'user_password' => $password, 
		);
		$cek = $this->m_login->cek_login("tbl_users",$where)->num_rows();
		if ($cek > 0) {
			$data_session = array(
				'nama' => $username,
				'status' => 'login'
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('admin'));
		}else{
			$this->session->set_flashdata('us-1', 'This is test message');
			redirect(base_url(""));
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url(''));
	}
}
