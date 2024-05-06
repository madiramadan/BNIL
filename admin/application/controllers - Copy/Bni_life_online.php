<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bni_life_online extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'bni_life_online';
		$data['filez'] 		= 'bni_life_online';
		$data['functionz'] 	= 'bni_life_online';
		$data['labelz'] 	= 'BNI Life Online';
		$this->load->view('template', $data);
	}
	
	function bni_life_online_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = 1;
		$kolom = array("","tgl_daftar","no_ktp","no_ref","nama","tgl_lahir","phone","email","no_va","no_polis","status");
		if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
		else $ord = "id desc";
			
		if(isset($_POST['search']['value'])) {
			$src = $_POST['search']['value'];
			if($src) {
				$w_like=array();
				foreach($kolom as $val) {
					if($val) $w_like[] = $val." LIKE '%".$src."%'";
				}
				$where = "(".join(" OR ", $w_like).")";
			}
		}
			
		$query_no_limit = "SELECT * FROM kg_bni_life_online WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_bni_life_online WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 		= "<a href='".site_url('bni_life_online/bni_life_online_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$status 	= '<span class="badge bg-light">'.$r['status'].'</span>';
			$data[] 	= array($no, $r['tgl_daftar'], $r['no_ktp'], $r['no_ref'], $r['nama'], $r['tgl_lahir'], $r['phone'], $r['email'], $r['no_va'], $r['no_polis'], $status);
		}
		
		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->db->query($query_no_limit)->num_rows(),
			"recordsFiltered" 	=> $this->db->query($query_no_limit)->num_rows(),
			"data" 				=> $data
		);
		//output to json format
		echo json_encode($output);
	}
  
}
