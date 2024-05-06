<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thankyoupage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
  
	function index()
  	{
    	$this->main();
  	}
  
	public function main()
	{
		$data = GetHeaderFooter();
		$data['main'] = 'thankyoupage';
    	$this->load->view('template', $data);
	}

	public function detail($slug)
	{
		if(!$slug) redirect(lang_url('thankyoupage'));
		$data = GetHeaderFooter();
		$data['main'] = 'thankyoupage';
		$this->load->view('template', $data);
	}
}
