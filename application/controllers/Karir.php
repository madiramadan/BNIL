<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karir extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main($cat=NULL)
	{
		$data = GetHeaderFooter();
    $data['main'] = 'karir';
    $data['cat'] = $cat;
    $data['bhs'] = GetBahasa("karir");
		$this->load->view('template', $data);
	}
	
	public function detail($slug)
	{
		if(!$slug) redirect(lang_url('karir'));
		$data = GetHeaderFooter();
		//$data['val'] = GetAll("career", array("id"=> "where/".$id))->result_array()[0];
		$data['val'] = GetAll("career", array("slug"=> "where/".$slug))->result_array()[0];
    $data['main'] = 'karir_detail';
		$this->load->view('template', $data);
	}
}
