<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_buku','mbk');
		$this->load->model('M_kategori','mkt');
		$this->load->model('M_transaksi','mts');
		$this->load->model('M_user','msr');
	}

	public function index(){
		if($this->session->userdata('level')){

			$data['transaksi']=count($this->mts->ambil_semua());
			$data['user']=count($this->msr->ambil_semua());
			$data['kategori']=count($this->mkt->ambilkategori());
			$data['buku']=count($this->mbk->ambilbuku());
			$data['konten']='v_dashboard'; 
			$this->load->view('template', $data);
		}else{
			redirect('Login','refresh');
		}
		
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */


?>