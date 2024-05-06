<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_custom extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'content_custom';
    $data['filez'] = 'content_custom';
    $data['functionz'] = 'content_custom';
    $data['labelz'] = 'Custom Pages';
    $this->load->view('template', $data);
	}
	
	function custom_template($idz, $val) {
		redirect(site_url('content_custom/content_custom_detail/'.$idz.'/'.$val));
	}
	
	function content_custom_list($trash=0)
  {
  	ini_set('memory_limit', -1);
  	$where="1=1";
  	$kolom = array("","title");
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
		
		$query_no_limit = "SELECT * FROM kg_contents_custom WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_contents_custom WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('content_custom/content_custom_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $publish = $r['is_publish'] ? "Published" : "Draft";
		  $data[] = array($no, $r['title'], "Template ".$r['nm_template'], $r['publish_date'], $publish, $check);
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
  
  function content_custom_detail($id=0, $id_tem=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'content_custom_detail';
    $data['filez'] = 'content_custom';
    $data['functionz'] = 'content_custom';
    $data['labelz'] = 'Pages';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("contents_custom", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    if(!isset($data['val']['nm_template'])) $data['val']['nm_template']=1;
    $data['nm_template'] = $id_tem ? $id_tem : $data['val']['nm_template'];
    $this->load->view('template', $data);
	}
	
	function content_custom_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("contents_custom", array("is_delete"=> 1));
			}
		}
	}
  
  function content_custom_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    $post = $param = $this->input->post();
unset($post['id']);
    $post['slug'] = url_title($post['title']);
		$post['modify_user_id'] = $post['create_user_id'] = $admin_id;
		$post['modify_date'] = $post['create_date'] = date("Y-m-d H:i:s");
		if(!isset($post['is_publish'])) $post['is_publish']=0;
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","contents_custom",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		
		//File
		$template=array("","2","3");
		foreach($template as $tem) {
			if($tem <= $post['nm_template']) {
				$flz = array("file","file_mobile");
				foreach($flz as $xx) {
					$key=$xx.$tem;
					$file_up = date("YmdHis").".".$_FILES[$key]['name'];
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
			}
		}
		
		$cek_id = GetValue("id","contents_custom",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
    	if($this->db->insert("contents_custom", $post)) $this->session->set_flashdata("message", "success-Add Success");
    	else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
    	$this->db->where("id", $param['id']);
    	if($this->db->update("contents_custom", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    redirect(site_url('content_custom'));
  }
}
