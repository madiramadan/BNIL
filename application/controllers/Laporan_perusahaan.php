<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_perusahaan extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'laporan_perusahaan';
    $data['bhs'] = GetBahasa("laporan_perusahaan");
		$this->load->view('template', $data);
	}
	
	function muat_lebih($limit=8) 
	{
		$lang = $this->input->post("langz");

		$q = GetAll("financial_report", array("file >"=> "where/0", "year"=> "order/desc", "create_date"=> "order/desc", "is_delete"=> "where/0", "limit"=> $limit."/8"));
		foreach($q->result_array() as $r) {
			$img = base_url().'uploads/financial_report/';
			$img2 = base_url().'uploads/financial_reports/';
			if(file_exists("./uploads/financial_reports/".$r['file'])) $img=$img2;
			echo "<div class='col-md-3 col-xs-6'>
							                    	<div class='box-lelang box-lelang90'>
						                            <div class='judul-lelang'>".JudulTitik($lang ? $r['title_eng'] : $r['title'])."</div>
						                            <div class='tgl-lelang'>
						                            	<div class='download-lelang'>
						                            		<a href=".$img.$r['file']." target='_blank'>
						                            			<img src='".base_url()."assets/images/download_biru.png' style='width:40px;'>
						                            		</a>
						                            	</div>
						                            </div>
						                        </div>
							                    </div>";
	  }
	}
	
	function muat_lebih2($limit=8) 
	{
		$lang = $this->input->post("langz");
		$q = GetAll("annual_report", array("file >"=> "where/0", "year"=> "order/desc", "create_date"=> "order/desc", "is_delete"=> "where/0", "limit"=> $limit."/8"));
		foreach($q->result_array() as $r) {
			$img = base_url().'uploads/annual_repor/';
			$img2 = base_url().'uploads/annual_reports/';
			if(file_exists("./uploads/financial_reports/".$r['file'])) $img=$img2;
			echo "<div class='col-md-3 col-xs-6'>
							                    	<div class='box-lelang'>
						                            <div class='judul-lelang'>".JudulTitik($lang ? $r['title_eng'] : $r['title'])."</div>
						                            <div class='tgl-lelang'>
						                            	<div class='download-lelang'>
						                            		<a href=".$img.$r['file']." target='_blank'>
						                            			<img src='".base_url()."assets/images/download_biru.png' style='width:40px;'>
						                            		</a>
						                            	</div>
						                            </div>
						                        </div>
							                    </div>";
	  }
	}
}
