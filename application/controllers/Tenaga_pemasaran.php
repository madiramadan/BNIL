<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenaga_pemasaran extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'tenaga_pemasaran';
    $data['bhs'] = GetBahasa("tenaga");
		$this->load->view('template', $data);
	}
}
