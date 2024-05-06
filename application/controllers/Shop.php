<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'shop';
    $data['bhs'] = GetBahasa("shop");
    $data['cari'] = $this->input->post("s_shop");
		$this->load->view('template', $data);
	}
	
	public function detail($id)
	{
		if(!$id) redirect(lang_url('shop'));
		$data = GetHeaderFooter();
		$data['bhs'] = GetBahasa("shop");
		$data['val'] = GetAll("merchandise_prod", array("id"=> "where/".$id))->result_array()[0];
    $data['main'] = 'shop_detail';
		$this->load->view('template', $data);
	}
}
