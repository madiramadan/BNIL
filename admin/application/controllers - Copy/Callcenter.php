<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callcenter extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
  
	public function main($trash=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'survei';
    $data['trash'] = $trash;
    $this->load->view('template', $data);
	}
	  
  function responden($id_survei=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'responden_cc';
    //if(!$id_survei) $id_survei=GetValue("id","survei",array("is_active"=> "where/1", "limit"=> "0/1", "periode_start"=> "order/asc"));
    $data['id_survei'] = $id_survei;
    $this->load->view('template', $data);
	}
	
	function responden_detail($id_survei=0, $id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'responden_cc_detail';
    $data['id'] = $id;
    $data['id_survei'] = $id_survei;
    if($id) {
    	$q = GetAll("survei_rdd", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function responden_list($id_survei, $trash=0)
  {
  	$cc = permission();
  	ini_set('memory_limit', -1);
  	$opt_prov=GetOptProv();
  	$opt_kab=GetOptKab();
  	$where=1;
  	$kolom = array("","nama","gender");
  	if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
  	else $ord = " create_date desc";
		
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
		
		$query_no_limit = "SELECT * FROM responden WHERE 1 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM responden WHERE 1 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];

  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	$prov = $opt_prov[$r['id_prov']];
	  	$kab = $opt_kab[$r['id_kab']];
	  	$data[] = array($no, $r['nama'], $r['gender'], $prov, $kab);
	  }
	  
	  $output = array(
	                  "draw" => $_POST['draw'],
	                  "recordsTotal" => $this->db->query($query_no_limit)->num_rows(),
	                  "recordsFiltered" => $this->db->query($query_no_limit)->num_rows(),
	                  "data" => $data
	                 );
	  //output to json format
	  echo json_encode($output);
  }
  
  function kuota($id)
  {
  	permission();
    $data = array();
    $data['id'] = $id;
  	$q = GetAll("survei", array("id"=> "where/".$id))->result_array()[0];
  	$data['val'] = $q;
    $this->load->view('responden_kuota', $data);
  }
}
