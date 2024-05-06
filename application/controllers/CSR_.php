<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSR extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'csr';
		$this->load->view('template', $data);
	}
}
