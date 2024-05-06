<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kisah extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'kisah';
    $data['val'] = GetAll("contents_custom",array("id"=> "where/1"))->result_array()[0];
    $data['bhs'] = GetBahasa("kisah");
		$this->load->view('template', $data);
	}
}
