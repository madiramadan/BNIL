<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'promo';
		$this->load->view('template', $data);
	}
	
	public function detail($slug)
	{
		if(!$slug) redirect(lang_url('promo'));
		$data = GetHeaderFooter();
		if(intval($slug)) $data['val'] = GetAll("promo", array("id"=> "where/".$slug))->result_array()[0];
		else $data['val'] = GetAll("promo", array("slug"=> "where/".$slug))->result_array()[0];
    $data['main'] = 'promo_detail';
		$this->load->view('template', $data);
	}
	
	function muat_lebih($limit=3) 
	{
		$lang = $this->input->post("langz");

		$q = GetAll('promo', array( "id_media_cat"=> "where/1", "publish_date"=> "order/desc", 'limit'=> $limit.'/3'));
		foreach($q->result_array() as $r) {
			$img = base_url().'uploads/promo/';
			$linkzz = $lang ? str_replace("/id/","/en/",lang_url('promo/detail/'.$r['id'])) : lang_url('promo/detail/'.$r['id']);

			echo "<div class='col-md-4 col-xs-12' style='padding-bottom:30px;'>
            	<div class='promoz'>
              	<img src='".base_url().'uploads/promo/'.$r['image'.getLang()]."' width='100%' alt='".$r['title_image'.getLang()]."' title='".$r['title_image'.getLang()]."'>
              	<div class='box-promo'>
                	<div class='tgl'>
                		".FormatTanggalShort(substr($r['publish_date'],0,10))."
                	</div>
                	<div class='judul'>
                		".JudulTitik($lang ? $r['title_eng'] : $r['title'])."
                	</div>
                	<a href='".$linkzz."'>".JudulTitik($lang ? "Check Promo" : "Cek Promo")."</a>
                </div>
              </div>
            </div>";
	  }
	}
}
