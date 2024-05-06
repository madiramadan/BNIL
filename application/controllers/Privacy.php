<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'pages';
    $data['val'] = GetAll("contents",array("id"=> "where/3"))->result_array()[0];
		$this->load->view('template', $data);
	}
}
