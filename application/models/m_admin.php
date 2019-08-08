<?php 
class M_admin extends CI_Model
{
	function tambah_pegawai($data,$table){
		$this->db->insert($table,$data);
	}
	function edit_pegawai($where, $table){
		return $this->db->get_where($table,$where);
	}
	function update_pegawai($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function phk_pegawai($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function kembali_pegawai($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	// Jabatan
	function tambah_jabatan($data,$table){
		$this->db->insert($table,$data);
	}
	function update_jabatan($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	// Ketentuan
	function tambah_ketentuan($data,$table){
		$this->db->insert($table,$data);
	}
	function update_ketentuan($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}