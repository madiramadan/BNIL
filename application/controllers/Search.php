<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	
	function index()
  {
    $data = GetHeaderFooter();
    $data['main'] = 'search';
		$this->load->view('template', $data);
  }
}
