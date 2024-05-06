<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saham extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
    $data = array();
		$this->load->view('saham', $data);
	}
}
