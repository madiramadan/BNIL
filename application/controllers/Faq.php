<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'faq';
    $data['bhs'] = GetBahasa("faq");
		$this->load->view('template', $data);
	}
}
