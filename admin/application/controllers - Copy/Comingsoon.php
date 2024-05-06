<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comingsoon extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'comingsoon';
    $data['labelz'] = 'Coming Soon';
    $this->load->view('template', $data);
	}
}
