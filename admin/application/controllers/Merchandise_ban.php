<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchandise_ban extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'merchandise_ban';
		$data['filez'] 		= 'merchandise_ban';
		$data['functionz'] 	= 'merchandise_ban';
		$data['labelz'] 	= 'Merchandise Banner';
		$this->load->view('template', $data);
	}
	
	function merchandise_ban_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("","title","urutan","is_publish");
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
			
		$query_no_limit = "SELECT * FROM kg_merchandise_ban WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_merchandise_ban WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 		= "<a href='".site_url('merchandise_ban/merchandise_ban_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$publish 	= $r['is_publish'] ? "Published" : "Draft";
			$data[] 	= array($no, $r['title'], $r['urutan'], $publish, $check);
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
  
  	function merchandise_ban_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'merchandise_ban_detail';
		$data['filez'] 		= 'merchandise_ban';
		$data['functionz'] 	= 'merchandise_ban';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("merchandise_ban", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Merchandise Banner';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a new Merchandise Banner';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
	
	function merchandise_ban_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("merchandise_ban", array("is_delete"=> 1));
			}
		}
	}
  
	function merchandise_ban_add()
	{
		ini_set('memory_limit', -1);
		$admin_id         		= permission();
		$post=$param= $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		if (!isset($post['is_publish'])) $post['is_publish'] = 0;
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","merchandise_ban",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		
		// upload file
		$config ['upload_path']   = '../uploads/merchandise_ban';
		$config ['allowed_types'] = 'jpg|png|jpeg';
		$config ['max_size']      = 50000;
		#$config['max_width']     = 1024;
		#$config['max_height']    = 768;
		$this->load->library('upload', $config);
		// end
			
		$cek_id = GetValue("id","merchandise_ban",array("id"=> "where/".$param['id']));
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
			if($this->db->insert("merchandise_ban", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$record = GetAll('merchandise_ban',array('id'=>'where/'.$cek_id))->row_array();
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
			if($this->db->update("merchandise_ban", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('merchandise_ban'));
  	}
  
}
