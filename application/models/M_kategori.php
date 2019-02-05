


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {
	
	public function ambilkategori(){
			$ambilkategori = $this->db->get('kategori')->result();
			return $ambilkategori;
	}


	public function tambah(){
			$tambah = array(
				'nama_kategori' => $this->input->post('nama_kategori'),);
				
			return $this->db->insert('kategori', $tambah);

	}



	public function tampil_ubah_kategori($kode_kategori){

		return $this->db->where('kode_kategori',$kode_kategori)->get('kategori')->row();

	}


	public function update(){
			$ubah = array(
				'nama_kategori' => $this->input->post('nama_kategori'),);

		return $this->db->where('kode_kategori',$this->input->post('kode_kategori'))->update('kategori', $ubah);
}




public function hapus($kode_kategori ){
	return $this->db->where('kode_kategori',$kode_kategori)->delete('kategori');
}

}


/* End of file M_kategori.php */
/* Location: ./application/models/M_kategori.php */


?>