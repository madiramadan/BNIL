<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'about';
    $data['id'] = $id;
    $q = GetAll("contents", array("id"=> "where/".$id));
    if($q->num_rows() > 0) $data['val'] = $q->result_array()[0];
    else $data['val'] = array();
    $this->load->view('template', $data);
	}
  
  function add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    $post = $param = $this->input->post();
		unset($post['id']);
    $post['slug'] = url_title($post['title']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date'] = date("Y-m-d H:i:s");
		if(!isset($post['is_publish'])) $post['is_publish']=0;
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","contents",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		
		//File
		$flz = array("file","file_mobile");
		foreach($flz as $key) {
			$file_up = date("YmdHis").".".$_FILES[$key]['name'];
			$myfile_up	= $_FILES[$key]['tmp_name'];
			$ukuranfile_up = $_FILES[$key]['size'];
			$up_file = "../uploads/".$file_up;
			if($_FILES[$key]['name']) {
				unlink("../uploads/".$file_up);
				if(copy($myfile_up, $up_file)) {
					$post[$key] = $file_up;
				}
			}
		}
		
		$cek_id = GetValue("id","contents",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
    	if($this->db->insert("contents", $post)) $this->session->set_flashdata("message", "success-Add Success");
    	else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
    	$this->db->where("id", $param['id']);
    	if($this->db->update("contents", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    redirect(site_url('about/main/'.$param['id']));
  }
  
  function blog($cat=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'blog';
    $data['cat'] = $cat;
    $q = GetAll("news", array("id_news_category"=> "where/".$cat));
    if($q->num_rows() > 0) $data['val'] = $q->result_array()[0];
    else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function blog_list($cat=0)
  {
  	ini_set('memory_limit', -1);
  	$opt_cat=GetOptAll("news_category");
  	$where="id_news_category='".$cat."'";
  	$kolom = array("title");
  	if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
  	else $ord = " id asc ";
		
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
		
		$query_no_limit = "SELECT * FROM kg_news WHERE 1 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_news WHERE 1 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
		  $check = "<a href='".site_url('about/blog_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $data[] = array($no, $r['title'], $opt_cat[$r['id_news_category']], $check);
	  }
	  
	  $output = array(
	                  "draw" => $_POST['draw'],
	                  "recordsTotal" => $this->db->query($query_no_limit)->num_rows(),
	                  "recordsFiltered" => $this->db->query($query_no_limit)->num_rows(),
	                  "data" => $data
	                 );
	  //print_mz($data);
	  //output to json format
	  echo json_encode($output);
  }
  
  function blog_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'blog_detail';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("news", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
		
	function blog_add()
  {
    $admin_id=permission();
    $post = $param = $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date'] = date("Y-m-d H:i:s");
		
		//File
		$key="file";
		$file_up = $param['id']."-".$_FILES[$key]['name'];
		$myfile_up	= $_FILES[$key]['tmp_name'];
		$ukuranfile_up = $_FILES[$key]['size'];
		//$up_file = "../idea/uploads/".$file_up;
		$up_file = "../uploads/".$file_up;
		if($_FILES[$key]['name']) {
			//if($ukuranfile_up < (1024 * 1024 * 15)) {
			//die($myfile_up."S".$up_file);
				unlink("../uploads/".$file_up);
				if(copy($myfile_up, $up_file)) {
					$post['file'] = $file_up;
				}
			//}
		}
		//print_mz($_FILES);
    if(!$param['id']) {
    	if($this->db->insert("news", $post)) $this->session->set_flashdata("message", "success-Add Success");
    	else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
    	$this->db->where("id", $param['id']);
    	if($this->db->update("news", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    
    redirect(site_url('about/blog/'.$post['id_news_category']));
  }
}
