<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klaim extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'klaim';
    $data['bahasa'] = GetBahasa("home");
    $data['bhs'] = GetBahasa("klaim");
		$this->load->view('template', $data);
	}
	
	public function layanan_1_hari()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'layanan_1_hari';
    $data['val'] = GetAll("contents_custom",array("id"=> "where/2"))->result_array()[0];
    $data['bahasa'] = GetBahasa("home");
    $data['bhs'] = GetBahasa("klaim");
		$this->load->view('template', $data);
	}
}
