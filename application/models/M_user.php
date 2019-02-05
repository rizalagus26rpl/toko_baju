
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {


public function login(){


	return $this->db
	->where('password',$this->input->post('password'))
	->where('username',$this->input->post('username'))
	->get('user');
}




public function ambil_user(){
	return $this->db->where('level','kasir')->get('user')->result();
}


public function ambil_semua(){
	return $this->db->get('user')->result();
}



public function tambah(){
$usert = array('nama_user' => $this->input->post('nama_user'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level' => 'kasir' );

		return $this->db->insert('user', $usert); 

}


public function hapus($kode_user){

	return $this->db
		->where('kode_user', $kode_user)
		->delete('user');
}



public function tampil_ubah_user($kode_user){
		return $this->db->where('kode_user',$kode_user)->get('user')->row();

}


	public function update(){
			$ubah = array(
				'nama_user' => $this->input->post('nama_user'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),);

		return $this->db->where('kode_user',$this->input->post('kode_user'))->update('user', $ubah);

}

}


/* End of file M_user.php */
/* Location: ./application/models/M_user.php */
?>