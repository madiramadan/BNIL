<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main($id_kat=4)
	{
		$data = GetHeaderFooter();
    $data['main'] = 'manajemen';
    $data['id_kat'] = $id_kat;
    $data['bhs'] = GetBahasa("manajemen");
		$this->load->view('template', $data);
	}
}
