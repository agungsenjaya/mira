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
			$this->load->model('m_admin');
    		$this->load->database();
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
	public function edit_pegawai($id){
		$where = array('pg_id' => $id);
		$data['pegawai'] = $this->m_admin->edit_pegawai($where,'tbl_pg')->result();
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('pegawai',$data);
		$this->load->view('layouts/footer');
	}
	public function update_pegawai(){
		$id = $this->input->post('pg_id');
		$nama = $this->input->post('pg_nama');
        $alamat = $this->input->post('pg_alamat');
        $kelamin = $this->input->post('pg_kelamin');
        $gaji = $this->input->post('pg_gaji');
        $ktp = $this->input->post('pg_ktp');
        $jabatan = $this->input->post('jb_id');
		$data = array(
	      'pg_nama' => $nama,
          'pg_alamat' => $alamat,
          'pg_kelamin' => $kelamin,
          'pg_ktp' => $ktp,
          'jb_id' => $jabatan,
          'pg_gaji' => $gaji,
	    );
	    $where = array(
	        'pg_id' => $id
	      );
	    $this->m_admin->update_pegawai($where,$data,'tbl_pg');
	    redirect('admin');
	}
	public function tambah_pegawai(){
	  $koda = $this->input->post('pg_ktp');
	  $sql = $this->db->query("SELECT * FROM tbl_pg WHERE pg_ktp='$koda'");
      $count = $sql->num_rows();
      if ($count > 0) {
        echo "sudah ada";
      }else{
        $nama = $this->input->post('pg_nama');
        $alamat = $this->input->post('pg_alamat');
        $kelamin = $this->input->post('pg_kelamin');
        $gaji = $this->input->post('pg_gaji');
        $reg = date('Y-m-d H:i:s');
        $ktp = $this->input->post('pg_ktp');
        $jabatan = $this->input->post('jb_id');
        $status = 1;
        $data = array(
          'pg_nama' => $nama,
          'pg_alamat' => $alamat,
          'pg_kelamin' => $kelamin,
          'pg_ktp' => $ktp,
          'jb_id' => $jabatan,
          'pg_reg' => $reg,
          'pg_gaji' => $gaji,
          'pg_status' => $status
          );
        $this->m_admin->tambah_pegawai($data,'tbl_pg');
        redirect('admin');
      }
	}
	// jabatan
	public function jabatan(){
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('jabatan');
		$this->load->view('layouts/footer');
	}
	public function tambah_jabatan(){
	  $koda = $this->input->post('jb_name');
	  $sql = $this->db->query("SELECT * FROM tbl_jb WHERE jb_name='$koda'");
      $count = $sql->num_rows();
      if ($count > 0) {
        echo "sudah ada";
      }else{
      	$nama = $this->input->post('jb_name');
        $data = array(
          'jb_name' => $nama,
          );
        $this->m_admin->tambah_jabatan($data,'tbl_jb');
        redirect('admin/jabatan');
      }
	}
	// ketentuan
	public function ketentuan(){
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('ketentuan');
		$this->load->view('layouts/footer');
	}
}
