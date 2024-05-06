<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulir extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'formulir';
    $data['bhs'] = GetBahasa("formulir");
		$this->load->view('template', $data);
	}
}
