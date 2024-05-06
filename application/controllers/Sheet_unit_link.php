<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sheet_unit_link extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'sheet_unit_link';
    $data['bhs'] = GetBahasa("unitlink");
		$this->load->view('template', $data);
	}
}
