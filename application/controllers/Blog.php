<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main($id=NULL)
	{
		$data = GetHeaderFooter();
    $data['main'] = 'blog';
    $data['id_blog_cat'] = $id;
		$this->load->view('template', $data);
	}
	
	public function detail($slug)
	{
		if(!$slug) redirect(lang_url('blog'));
		$data = GetHeaderFooter();
		//$data['val'] = GetAll("blog", array("id"=> "where/".$id))->result_array()[0];

		//$data['val'] = GetAll("blog", array('is_delete'=> 'where/0',"slug"=> "where/".$slug))->result_array()[0];
    	//$data['main'] = 'blog_detail';

		//$data['val'] = GetAll("blog", array("slug"=> "where/".$slug))->result_array()[0];
        //$data['main'] = 'blog_detail';

		//$this->load->view('template', $data);

		$data['val'] = GetAll("blog", array('is_delete'=> 'where/0',"slug"=> "where/".$slug))->result_array()[0];
    	$data['main'] = 'blog_detail';
		$this->load->view('template', $data);
	}
	
	function muat_lebih($limit=7) 
	{
		$lang = $this->input->post("langz");
		$id = $this->input->post("catz");
		if($id) $q = GetAll('blog', array('id_blog_cat'=> 'where/'.$id, 'is_publish'=> 'where/1', 'publish_date'=> 'order/desc', 'is_delete'=> 'where/0','limit'=> $limit.'/5'));
		else $q = GetAll('blog', array('is_publish'=> 'where/1', 'publish_date'=> 'order/desc','is_delete'=> 'where/0', 'limit'=> $limit.'/5'));
		foreach($q->result_array() as $r) {
			$linkzz = $lang ? str_replace("/id/","/en/",lang_url('lifeblog/'.$r['slug'])) : lang_url('lifeblog/'.$r['slug']);
			echo "<div class='col-md-12 col-xs-12'>
	    	<div class='col-md-3 col-xs-12 cat_lain blog_cat_lain'>
	  			".GetValue('title'.$lang, 'blog_cat', array('id'=> 'where/'.$r['id_blog_cat']))."<br>
	  			<div class='tgl'>".FormatTanggalShort(substr($r['publish_date'],0,10))."</div>
	    	</div>
	    	<div class='col-md-9 col-xs-12 cat_lain blog_cat_lain'>
	    		<div class='judul'><a href='".$linkzz."'>".$r['title'.$lang]."</a></div>
	    		<div class='headline'>".$r['headline'.$lang]."</div>
	    	</div>
	    </div>";
	  }
	}
}
