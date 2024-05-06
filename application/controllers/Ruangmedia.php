<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangmedia extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main($cat=NULL)
	{
		$data = GetHeaderFooter();
    $data['main'] = 'ruangmedia';
    $data['cat'] = $cat;
    $data['bhs'] = GetBahasa("berita");
		$this->load->view('template', $data);
	}
	
	public function detail($slug)
	{
		if(!$slug) redirect(lang_url('ruangmedia'));
		$data = GetHeaderFooter();
		//$data['val'] = GetAll("media", array("id"=> "where/".$id))->result_array()[0];
		$data['val'] = GetAll("media", array("slug"=> "where/".$slug))->result_array()[0];
    $data['main'] = 'ruangmedia_detail';
		$this->load->view('template', $data);
	}
	
	function muat_lebih($limit=10) 
	{
		$lang = $this->input->post("langz");
		$id = $this->input->post("catz");
		if($id) $q = GetAll('media', array('id_media_cat'=> 'where/'.$id, 'is_publish'=> 'where/1', 'is_delete'=> 'where/0', 'publish_date'=> 'order/desc', 'limit'=> $limit.'/8'));
		else $q = GetAll('media', array('is_publish'=> 'where/1', 'is_delete'=> 'where/0', 'publish_date'=> 'order/desc', 'limit'=> $limit.'/8'));
		foreach($q->result_array() as $r) {
			
			$linkzz = $lang ? str_replace("/id/","/en/",lang_url('ruangmedia/'.$r['slug'])) : lang_url('ruangmedia/'.$r['slug']);
			$img = base_url().'uploads/media/';
			$img2 = base_url().'uploads/medias/';
			if(file_exists("./uploads/medias/".$r['image'])) $img=$img2;
			echo "<div class='col-xs-6 col-lg-3 box_blog_lain box_media_lain'>
	              	<div class='box_image'>
		              	<img src='".$img.$r['image']."' alt='".$r['title_image']."' title='".$r['title_image']."'>
		              </div>
						      <div class='tgl'>".FormatTanggalShort(substr($r['publish_date'],0,10))."</div>
		              <div class='judul'><a href='".$linkzz."'>".$r['title'.$lang]."</a></div>
			          </div>";
	  }
	}
}
