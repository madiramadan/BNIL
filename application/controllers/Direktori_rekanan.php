<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direktori_rekanan extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'direktori_rekanan';
    $data['bhs'] = GetBahasa("provider");
    $data['cat'] = $this->input->get("cat");
    $data['id_prov'] = $this->input->get("id_prov");
    $data['id_type'] = $this->input->get("id_type");
    $data['id_tags'] = $this->input->get("id_tags");
    $data['s_kunci'] = $this->input->get("s_kunci");
		$this->load->view('template', $data);
	}
}
