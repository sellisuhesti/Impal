<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	  public function __construct()
    {
        parent::__construct();
        $this->load->model('hotel_model');
        $this->load->library('form_validation');
        $this->load->library('session');

    }
    
    
	public function index()
	{
		
		$this->data['hasil'] = $this->hotel_model->getUser('hotel');
		$this->load->view('welcome_message', $this->data);
	;
	}

	public function form_input(){
		$this->load->view('form-input');
	}

	public function insert(){
		$id_hotel = $_POST['id_hotel'];
		$id_pemilik = $_POST['id_pemilik'];
		$nama_hotel = $_POST['nama_hotel'];
		$alamat = $_POST['alamat'];
		$kota = $_POST['kota'];
		$rating = $_POST['rating'];
		$fasilitas = $_POST['fasilitas'];
		$data = array('id_hotel' => $id_hotel, 'id_pemilik' => $id_pemilik, 'nama_hotel' => $nama_hotel, 'alamat' => $alamat,'kota'=> $kota ,'rating' => $rating,'fasilitas'=> $fasilitas);
		$tambah = $this->hotel_model->tambahData('hotel',$data);
		if($tambah > 0){
			redirect('Welcome/index');
		}else{
			echo 'Data Gagal Disiman';
		}
	}

	public function delete($id){
		$hapus = $this->hotel_model->hapusData('hotel',$id);
		if($hapus > 0){
			redirect('Welcome/index');
		}else{
			echo'Data Gagal Dihapus';
		}
	}

	public function form_edit($id){
		$this->data['dataEdit'] = $this->hotel_model->dataEdit('hotel',$id);
		$this->load->view('form-edit', $this->data);
	}

	public function update($id){
		$id_hotel = $_POST['id_hotel'];
		$id_pemilik = $_POST['id_pemilik'];
		$nama_hotel = $_POST['nama_hotel'];
		$alamat = $_POST['alamat'];
		$kota = $_POST['kota'];
		$rating = $_POST['rating'];
		$data = array('id_hotel' => $id_hotel, 'id_pemilik' => $id_pemilik, 'nama_hotel' => $nama_hotel, 'alamat' => $alamat,'kota'=> $kota ,'rating' => $rating);
		$edit = $this->hotel_model->editData('hotel',$data,$id);
		
		if($edit > 0){
			redirect('Welcome/index');
		}else{
			echo 'Data Gagal Disiman';
		}
	}


// KAMAR
	public function dataKamar()
	{
		$this->data['hasil'] = $this->hotel_model->getDataKamar('kamar');
		$this->load->view('kamar_view', $this->data);
	}

	

	public function formKamar(){
		$data['hotel'] = $this->hotel_model->getDataHotel();
		$this->load->view('form-input-kamar',$data);
	}

	public function insertKamar(){
		$nama_hotel = $_POST['nama_hotel'];
		$no_kamar = $_POST['no_kamar'];
		$kelas_kamar = $_POST['kelas_kamar'];
		$harga_kamar = $_POST['harga_kamar'];
		
		$data = array('nama_hotel' => $nama_hotel, 'no_kamar' => $no_kamar, 'kelas_kamar' => $kelas_kamar, 'harga_kamar' => $harga_kamar);
		$tambahKamar = $this->hotel_model->tambahData('kamar',$data);
		if($tambahKamar > 0){
			redirect('Welcome/dataKamar');
		}else{
			echo 'Data Gagal Disiman';
		}
	}

	public function deleteKamar($id){
		$hapus = $this->hotel_model->hapusDataKamar('kamar',$id);
		if($hapus > 0){
			redirect('Welcome/dataKamar');
		}else{
			echo'Data Gagal Dihapus';
		}
	}

	public function form_editKamar($id){
		$this->data['dataEditKamar'] = $this->hotel_model->dataEditKamar('kamar',$id);
		$this->load->view('form-editKamar', $this->data);
	}


	public function updateKamar($id){
		$id_kamar = $_POST['id_kamar'];
		$id_hotel = $_POST['id_hotel'];
		$no_kamar = $_POST['no_kamar'];
		$kelas_kamar= $_POST['kelas_kamar'];
		$harga_kamar = $_POST['harga_kamar'];
		$status_kamar= $_POST['status_kamar'];
		$data = array('id_kamar' => $id_kamar, 'id_hotel' => $id_hotel, 'no_kamar' => $no_kamar, 'kelas_kamar' => $kelas_kamar,'harga_kamar'=> $harga_kamar,'status_kamar' => $status_kamar);
		$edit = $this->hotel_model->editDataKamar('kamar',$data,$id);
		
		if($edit > 0){
			redirect('Welcome/dataKamar');
		}else{
			echo 'Data Gagal Disiman';
		}
	}
	
	// PEMBAYARAN

	public function dataPembayaran()
	{
		$this->data['hasil'] = $this->hotel_model->getDataPembayaran('pembayaran');
		$this->load->view('pembayaran_view', $this->data);
	}

	

	public function formPembayaran(){
		$this->load->view('form-inputPembayaran');
	}
	
	public function deletePembayaran($id){
		$hapus = $this->hotel_model->hapusDataPembayaran('pembayaran',$id);
		if($hapus > 0){
			redirect('Welcome/dataPembayaran');
		}else{
			echo'Data Gagal Dihapus';
		}
	}
	
}
