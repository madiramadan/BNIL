<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csr extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'csr';
    $data['bhs'] = GetBahasa("csr");
		$this->load->view('template', $data);
	}
	
	function muat_lebih($limit=6) 
	{
		//$q = GetAll("financial_report", array("file >"=> "where/0", "year"=> "order/desc", "create_date"=> "order/desc", "is_delete"=> "where/0", "limit"=> $limit."/6"));
		$q = GetAll("csr",array("is_publish"=> "where/1", "limit"=> $limit."/6"));
		foreach($q->result_array() as $r) {
			echo "<div class='col-md-4 col-xs-6'>
			            		<a class='modalImg' desc='".$r['contents'.getLang()]."' flag='".$r['csr_cat']."' title='".$r['title'.getLang()]."' gbr='".base_url()."uploads/csr/".$r['image']."'>
			            		<img src='".base_url()."uploads/csr/".$r['image']."'></a>
			            	</div>
			            	
			            	
<div id='myModal' class='modal'>
  <div class='box-modal'>
	  <div class='col-md-6 kolom_image'>
	  	<img class='modal-content' id='img01'>
	  	<iframe class='modal-content' id='vid01' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'></iframe>
	  </div>
	  <div class='col-md-6'>
	  	<div class='label_modalz'></div>
	  	<div class='caption_modalz'></div>
	  </div>
	</div>
</div>

<script>
	var modal = $('#myModal');
	var img = $('#myImg');
	var modalImg = $('#img01');
	$('.modalImg').click(function(){
		var flag = $(this).attr('flag');
		$('#myModal').show();
	  if(flag=='video') {
	  	$('#vid01').attr('src', $(this).attr('gbr'));
	  	$('#img01').hide();
	  	$('#vid01').show();
	  } else {
	  	$('#img01').attr('src', $(this).attr('gbr'));
	  	$('#img01').show();
	  	$('#vid01').hide();
	  }
	  $('.label_modalz').html($(this).attr('title'));
	  $('.caption_modalz').html($(this).attr('desc'));
	  $('body').attr('style','overflow: hidden;');
	});

</script>";
	  }
	}
}
