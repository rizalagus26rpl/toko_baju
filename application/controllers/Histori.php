<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Histori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaksi','mts');
	}
	public function index()
	{

		if($this->session->userdata('level')){
			$data['ts']=$this->mts->ambil_semua();
			$data['konten']='v_histori';
			$this->load->view('template', $data);

		}else{
			redirect('Login','refresh');
		}
	}


	public function cetak_laporan(){
		$data['ts']=$this->mts->ambil_semua();
		$this->load->view('Laporan', $data);
	}
}

/* End of file Histori.php */
/* Location: ./application/controllers/Histori.php */
?>