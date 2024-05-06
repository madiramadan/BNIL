<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'testimoni';
    $data['filez'] = 'testimoni';
    $data['functionz'] = 'testimoni';
    $data['labelz'] = 'Testimoni';
    $this->load->view('template', $data);
	}
	
	function testimoni_new()
	{
		permission();
    $data = array();
    $data['filez'] = 'testimoni';
    $data['functionz'] = 'testimoni';
    $data['labelz'] = 'Testimoni';
    $this->load->view('testimoni_new', $data);
	}
	
	function testimoni_list($trash=0)
  {
  	ini_set('memory_limit', -1);
  	$where="1=1";
  	$kolom = array("","title","publish_date","is_publish","urutan");
  	if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
  	else $ord = " urutan asc, publish_date desc ";
		
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
		
		$query_no_limit = "SELECT * FROM kg_testimoni WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_testimoni WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('testimoni/testimoni_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $publish = $r['is_publish'] ? "Published" : "Draft";
		  $data[] = array($no, $r['title'], $r['publish_date'], $publish, $r['urutan'], $check);
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
  
  function testimoni_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'testimoni_detail';
    $data['filez'] = 'testimoni';
    $data['functionz'] = 'testimoni';
    $data['labelz'] = 'Testimoni';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("testimoni", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function testimoni_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("testimoni", array("is_delete"=> 1));
			}
		}
	}
  
  function testimoni_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id = permission();
    $post=$param= $this->input->post();
unset($post['id']);
    $post['slug']           = url_title($post['title']);
    $post['modify_user_id'] = $admin_id;
    $post['modify_date']    = date("Y-m-d H:i:s");
		if (!isset($post['is_publish'])) $post['is_publish'] = 0;
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","testimoni",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
	// upload file
	$config ['upload_path']   = '../uploads/testimoni';
	$config ['allowed_types'] = 'jpg|png|jpeg';
	$config ['max_size']      = 50000;
	#$config['max_width']     = 1024;
	#$config['max_height']    = 768;
	$this->load->library('upload', $config);
	// end
		
	$cek_id = GetValue("id","testimoni",array("id"=> "where/".$param['id']));
	if(!$cek_id) {
		if (!$this->upload->do_upload('image')){
			$post['image'] = "";
		} else {
			$image = $this->upload->data();
			$post['image'] = $image['file_name'];
		}
		if (!$this->upload->do_upload('image_mobile')){
			$post['image_mobile'] = "";
		} else {
			$image_mobile 			= $this->upload->data();
			$post['image_mobile'] 	= $image_mobile['file_name'];
		}
		$post['create_user_id'] = $admin_id;
		$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
		if($this->db->insert("testimoni", $post)) $this->session->set_flashdata("message", "success-Add Success");
		else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
		$record = GetAll('testimoni',array('id'=>'where/'.$cek_id))->row_array();
		if (!$this->upload->do_upload('image')){
			$post['image'] 	= $record['image'];
		} else {
			$image = $this->upload->data();
			$post['image'] 	= $image['file_name'];
		}
		if (!$this->upload->do_upload('image_mobile')){
			$post['image_mobile'] 	= $record['image_mobile'];
		} else {
			$image_mobile 			= $this->upload->data();
			$post['image_mobile'] 	= $image_mobile['file_name'];
		}
    	$post['modify_user_id'] = $admin_id;
    	$post['modify_date']    = date("Y-m-d H:i:s");
		$this->db->where("id", $param['id']);
    	if($this->db->update("testimoni", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    redirect(site_url('testimoni'));
  }
  
  function testimoni_info()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'testimoni_info';
    $data['filez'] = 'testimoni';
    $data['functionz'] = 'testimoni_info';
    $data['labelz'] = 'Info in Testimoni';
    $this->load->view('template', $data);
	}
  
  function testimoni_info_list($trash=0)
  {
  	ini_set('memory_limit', -1);
  	$where="1=1";
  	$kolom = array("","title","publish_date","is_publish","urutan");
  	if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
  	else $ord = " urutan asc, publish_date desc ";
		
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
		
		$query_no_limit = "SELECT * FROM kg_testimoni_info WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_testimoni_info WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('testimoni/testimoni_info_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $publish = $r['is_publish'] ? "Published" : "Draft";
		  $data[] = array($no, $r['title'], $r['publish_date'], $publish, $r['urutan'], $check);
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
  
  function testimoni_info_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'testimoni_info_detail';
    $data['filez'] = 'testimoni';
    $data['functionz'] = 'testimoni_info';
    $data['labelz'] = 'Info in Testimoni';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("testimoni_info", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function testimoni_info_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("testimoni_info", array("is_delete"=> 1));
			}
		}
	}
  
  function testimoni_info_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    $post = $param = $this->input->post();
unset($post['id']);
    $post['slug'] = url_title($post['title']);
		if(!isset($post['is_publish'])) $post['is_publish']=0;
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","testimoni_info",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		
		//File
		$flz = array("file","file_mobile");
		foreach($flz as $key) {
			if($_FILES[$key]['name']) {
				$file_up = date("YmdHis").".".$_FILES[$key]['name'];
				$myfile_up	= $_FILES[$key]['tmp_name'];
				$ukuranfile_up = $_FILES[$key]['size'];
				$up_file = "../uploads/".$file_up;
			
				//unlink("../uploads/".$file_up);
				if(copy($myfile_up, $up_file)) {
					$post[$key] = $file_up;
				}
			}
		}
		
		$cek_id = GetValue("id","testimoni_info",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
    	$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("testimoni_info", $post)) $this->session->set_flashdata("message", "success-Add Success");
    	else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
    	$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
    	if($this->db->update("testimoni_info", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    redirect(site_url('testimoni/testimoni_info'));
  }
}
