<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Transaksi extends CI_Model {


	public function cekstok(){

			$ck=1;
		for($i=0;$i<count($this->cart->contents());$i++){

			$stok = $this->db->where('kode_buku', $this->input->post('kode_buku')[$i])->get('buku')->row()->stok;
			$qty = $this->input->post('banyak')[$i];
			$cek = $stok - $qty;
			if($cek < 0){

				$cc = 0;

			}else{

				$cc = 1;

			}


			$ck = $cc*$ck;

		}

		return $ck;


	}



	public function simpan_db(){

			for($i=0;$i<count($this->cart->contents());$i++){
			$stok = $this->db->where('kode_buku', $this->input->post('kode_buku')[$i])->get('buku')->row()->stok;
			$qty = $this->input->post('banyak')[$i];
			$sisa = $stok - $qty;
			$u_stok = array('stok' => $sisa, );
			$this->db->where('kode_buku', $this->input->post('kode_buku')[$i])->update('buku', $u_stok);
			}


			$s_transaksi = array('kode_user' =>  $this->session->userdata('kode_user'),
								'nama_pembeli' =>$this->input->post('pembeli'),
								'total' =>$this->cart->total(),
								'tanggal_beli' => date('Y-m-d'));

			$this->db->insert('transaksi', $s_transaksi);


			$ts=$this->db->order_by('kode_transaksi', 'desc')
						->where('nama_pembeli',$this->input->post('pembeli'))
						->limit(1)
						->get('transaksi')
						->row();


			for($i=0;$i<count($this->cart->contents());$i++){
			
			$s_dttransaski[] = array('kode_transaksi' => $ts->kode_transaksi,
									 'kode_buku'=>$this->input->post('kode_buku')[$i],
									 'jumlah' => $this->input->post('banyak')[$i]);
			}
				$db = $this->db->insert_batch('detail_transaksi', $s_dttransaski);
				if ($db){

					return $ts->kode_transaksi;


				}else{
					return 0;

				}

			}



		public function ambil_dts($kode_transaksi){

			return $this->db->join('buku', 'buku.kode_buku = detail_transaksi.kode_buku')
						->where('kode_transaksi',$kode_transaksi)
						->get('detail_transaksi')
						->result();

		}


		public function ambil_ts($kode_transaksi){

			return $this->db->join('user', 'user.kode_user = transaksi.kode_user')
						->where('kode_transaksi',$kode_transaksi)
						->get('transaksi')
						->row();
						

		}


		public function ambil_semua(){
				return $this->db->join('user', 'user.kode_user = transaksi.kode_user')
						->get('transaksi')
						->result();
		}

}

/* End of file M_Transaksi.php */
/* Location: ./application/models/M_Transaksi.php */

?>