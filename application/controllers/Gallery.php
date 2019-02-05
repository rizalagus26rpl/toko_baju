<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function index()
    {
        $data['konten']="Gallery";
        $this->load->view('template', $data);
    }

}

?>
