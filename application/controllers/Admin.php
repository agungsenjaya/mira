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
	 function pro(){
	        $data = $this->db->get("tbl_pg")->result();
	        echo json_encode( $data);
	  }
	public function penggajian(){
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('penggajian');
		$this->load->view('layouts/footer');
	}
	public function tambah_penggajian(){
	  $koda = $this->input->post('pg_id');
	  $dats = date('Y-m-d');
	  $sql = $this->db->query("SELECT * FROM tbl_log WHERE pg_id='$koda' AND log_reg LIKE '$dats%'");
      $count = $sql->num_rows();
      if ($count > 0) {
	        echo "Tanggal yang sama sudah di gajih..";
	      }else{
        $id = $this->input->post('pg_id');
        $gaji = $this->input->post('log_gaji');
        $min = $this->input->post('log_absen');
        $plus = $this->input->post('log_lembur');
        $reg = date('Y-m-d H:i:s');
        // Logic Penggajian
        function rupiah($angka){
			$hasil_rupiah = number_format($angka,0,'.','.');
			return $hasil_rupiah;
		}
        $aa = "SELECT * FROM tbl_kt WHERE kt_id=1";
        $bb = $this->db->query($aa);
        foreach ($bb->result() as $ah) {
        	$cc = $ah->kt_price;
        }
        $dd = str_replace(".", "", $cc) * $min;

        $ee = "SELECT * FROM tbl_kt WHERE kt_id=2";
        $ff = $this->db->query($ee);
        foreach ($ff->result() as $uh) {
        	$gg = $uh->kt_price;
        }
        $hh = str_replace(".", "", $gg) * $plus;

        $ii = str_replace(".", "", $gaji);
        $jj = $ii + $hh - $dd;
        $kk = rupiah($jj);
        $total = $kk;
        // End Logic Penggajian
        $data = array(
          'pg_id' => $id,
          'log_reg' => $reg,
          'log_gaji' => $gaji,
          'log_absen' => $min,
          'log_lembur' => $plus,
          'log_total' => $total,
          );
        $this->m_admin->tambah_jabatan($data,'tbl_log');
        redirect('admin/penggajian');
	}
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
      	$reg = date('Y-m-d H:i:s');
        $data = array(
          'jb_name' => $nama,
          'jb_reg' => $reg
          );
        $this->m_admin->tambah_jabatan($data,'tbl_jb');
        redirect('admin/jabatan');
      }
	}
	public function update_jabatan(){
		$id = $this->input->post('jb_id');
		$nama = $this->input->post('jb_name');
		$data = array(
	      'jb_name' => $nama,
	    );
	    $where = array(
	        'jb_id' => $id
	      );
	    $this->m_admin->update_jabatan($where,$data,'tbl_jb');
	    redirect('admin/jabatan');
	}
	// ketentuan
	public function ketentuan(){
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('ketentuan');
		$this->load->view('layouts/footer');
	}
	public function tambah_ketentuan(){
	  $koda = $this->input->post('kt_nama');
	  $sql = $this->db->query("SELECT * FROM tbl_kt WHERE kt_nama='$koda'");
      $count = $sql->num_rows();
      if ($count > 0) {
        echo "sudah ada";
      }else{
      	$nama = $this->input->post('kt_nama');
      	$price = $this->input->post('kt_price');
      	$reg = date('Y-m-d H:i:s');
        $data = array(
          'kt_nama' => $nama,
          'kt_price' => $price,
          'kt_reg' => $reg,
          );
        $this->m_admin->tambah_ketentuan($data,'tbl_kt');
        redirect('admin/ketentuan');
      }
	}
	public function update_ketentuan(){
		$id = $this->input->post('kt_id');
		$nama = $this->input->post('kt_nama');
		$price = $this->input->post('kt_price');
		$data = array(
	      'kt_nama' => $nama,
	      'kt_price' => $price
	    );
	    $where = array(
	        'kt_id' => $id
	      );
	    $this->m_admin->update_ketentuan($where,$data,'tbl_kt');
	    redirect('admin/ketentuan');
	}
}
