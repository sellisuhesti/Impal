<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_model extends CI_Model {

	
	public function getUser($table_name)
	{
		$get_user =$this->db->get($table_name);
		return $get_user->result_array();
		
	}

	public function tambahData($table_name,$data){
		$tambah = $this->db->insert($table_name,$data);
		return $tambah;
	}

	public function editData($table_name,$data,$id){
		$this->db->where('id_hotel',$id);
		$edit  = $this->db->update($table_name,$data);
		return $edit;

	}

	public function hapusData($table_name,$id){
		$this->db->where('id_hotel',$id);
		$hapus = $this->db->delete($table_name);
		return $hapus;

	}

	public function dataEdit($table_name,$id)
	{
		$this->db->where('id_hotel',$id);
		$get_user =$this->db->get($table_name);
		return $get_user->row();
		
	}


	public function getDataKamar($table_name)
	{

		$get_DataKamar =$this->db->get($table_name);
		return $get_DataKamar->result_array();
		
	}

	
	public function getDataHotel(){
		$this->db->from('hotel');
		return $this->db->get()->result();
	}

	

	public function tambahDataKamar($table_name,$data){
		$tambahKamar = $this->db->insertKamar($table_name,$data);
		return $tambahKamar;
	}


	public function hapusDataKamar($table_name,$id){
		$this->db->where('id_hotel',$id);
		$hapus = $this->db->deleteKamar($table_name);
		return $hapus;

	}

	public function editDataKamar($table_name,$data,$id){
		$this->db->where('id_hotel',$id);
		$edit  = $this->db->updateKamar($table_name,$data);
		return $edit;

	}


	public function dataEditKamar($table_name,$id)
	{
		$this->db->where('id_hotel',$id);
		$get_DataKamar =$this->db->get($table_name);
		return $get_DataKamar->row();
		
	}

	public function getDataPembayaran($table_name)
	{
		$get_user =$this->db->get($table_name);
		return $get_user->result_array();
		
	}

	
	public function hapusDataPembayaran($table_name,$id){
		// $where = array('id_pembayaran' => $id);
		// $this->db->deletePembayaran($where,$table_name);
		$this->db->where('id_pembayaran',$id);
		$hapus = $this->db->deletePembayaran($table_name);
		return $hapus;

	}
}
