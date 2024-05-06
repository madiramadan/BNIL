<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagenotfound extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
		$data['main'] = 'pagenotfound';
    $this->load->view('template', $data);
	}
}
