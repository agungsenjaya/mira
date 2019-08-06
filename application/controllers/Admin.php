<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}
	}
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('dashboard');
		$this->load->view('layouts/footer');
	}
	public function json(){
		$this->load->library('datatables');
		$this->datatables->select('*');
		$this->datatables->from('tbl_pg');
		$this->datatables->where('pg_status',1);
		return print_r($this->	datatables->generate());
	}
	public function penggajian(){
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('penggajian');
		$this->load->view('layouts/footer');
	}
	public function pegawai_find(){
		// 
	}
}
