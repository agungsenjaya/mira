<?php 
class M_admin extends CI_Model
{
	function tambah_pegawai($data,$table){
		$this->db->insert($table,$data);
	}
}