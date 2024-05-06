<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hero extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'hero';
    $data['filez'] = 'hero';
    $data['functionz'] = 'hero';
    $data['labelz'] = 'Hero';
    $this->load->view('template', $data);
	}
	
	function hero_list($trash=0)
  {
  	ini_set('memory_limit', -1);
  	$where="1=1";
  	$kolom = array("","title");
  	if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
  	else $ord = " id desc";
		
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
		
		$query_no_limit = "SELECT * FROM kg_hero WHERE ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_hero WHERE ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
		  $check = "<a href='".site_url('hero/hero_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $data[] = array($no, $r['title'], $check);
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
  
  function hero_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'hero_detail';
    $data['filez'] = 'hero';
    $data['functionz'] = 'hero';
    $data['labelz'] = 'Hero';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("hero", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function hero_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("hero", array("is_delete"=> 1));
			}
		}
	}
  
  function hero_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    $post = $param = $this->input->post();
		unset($post['id']);
		$idz = $param['id'];
		if(!$param['id']) {
			$post['id'] = GetValue("id","hero",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		//File
		$flz = array("image","image_mobile");
		foreach($flz as $key) {
			$file_up = date("YmdHis").".".($_FILES[$key]['name']);
			$myfile_up	= $_FILES[$key]['tmp_name'];
			$ukuranfile_up = $_FILES[$key]['size'];
			$up_file = "../uploads/".$file_up;
			if($_FILES[$key]['name']) {
				//unlink("../uploads/".$file_up);
				if(copy($myfile_up, $up_file)) {
					$post[$key] = $file_up;
				}
			}
		}
		
		$cek_id = GetValue("id","hero",array("id"=> "where/".$idz));
		if(!$cek_id) {
			if($this->db->insert("hero", $post)) $this->session->set_flashdata("message", "success-Add Success");
    	else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
    	$this->db->where("id", $idz);
    	if($this->db->update("hero", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    //lastq();
    redirect(site_url('hero'));
  }
}
