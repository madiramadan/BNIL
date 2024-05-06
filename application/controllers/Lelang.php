<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lelang extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'lelang';
    $data['bhs'] = GetBahasa("lelang");
		$this->load->view('template', $data);
	}
	
	public function syarat($slug=NULL)
	{
		$data = GetHeaderFooter();
    $data['main'] = 'lelang_syarat';
    $data['bhs'] = GetBahasa("lelang");
		$this->load->view('template', $data);
	}
	
	function muat_lebih($limit=8) 
	{
		$lang = $this->input->post("langz");

		$q = GetAll("lelang", array("file >"=> "where/0", "periode"=> "order/desc", "is_delete"=> "where/0", "limit"=> $limit."/8"));
			foreach($q->result_array() as $r) {
				$img = base_url().'uploads/lelang/';
				echo "<div class='col-md-3 col-xs-12'>
										<div class='box-lelang'>
										<div class='judul-lelang'>".JudulTitik($lang ? $r['title_eng'] : $r['title'])."
											<div class='lelang-tgl'>
												".FormatTanggalShort(substr($r['periode'],0,10))."
											</div>
										</div>
										<div class='tgl-lelang'>
											<div class='download-lelang'>
												<a href='".$img.$r['file']."' target='_blank'>
													<img src='".base_url()."assets/images/download_biru.png' style='width:40px;'>
												</a>
											</div>
										</div>
									</div>
									</div>";
		
	  }
	}
}
