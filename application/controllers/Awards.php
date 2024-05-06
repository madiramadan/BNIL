<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Awards extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'awards';
    $data['bhs'] = GetBahasa("awards");
		$this->load->view('template', $data);
	}
	
	function muat_lebih($limit=8) 
	{
		$lang = $this->input->post("langz");
		$id = $this->input->post("catz");
		$q = GetAll('award', array('date'=> 'order/desc', 'is_delete"=> "where/0', 'limit'=> $limit.'/8'));
		foreach($q->result_array() as $r) {
			if(file_exists("./uploads/awards/".$r['image'])) $img = base_url().'uploads/awards/';
      else $img = base_url().'uploads/award/';
			echo "<div class='col-xs-6 col-lg-3 box_blog_lain box_media_lain'>
	              	<div class='box_image'>
		              	<img src='".$img.$r['image']."' alt='".$r['title_image']."' title='".$r['title_image']."'>
		              </div>
						      <div class='tgl'>".FormatTanggalShort(substr($r['date'],0,10))."</div>
		              <div class='judul'>".JudulTitik($lang ? $r['description_eng'] : $r['description'])."</div>
			          </div>";
	  }
	}
}
