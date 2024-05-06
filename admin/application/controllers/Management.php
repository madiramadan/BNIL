<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'management';
		$data['filez'] 		= 'management';
		$data['functionz'] 	= 'management';
		$data['labelz'] 	= 'Profile Management';
		$this->load->view('template', $data);
	}
	
	function management_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("","name","position_eng","category_eng");
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
			
		$query_no_limit = "SELECT * FROM kg_management WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_management WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 		= "<a href='".site_url('management/management_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] 	= array($no, $r['name'], $r['position'], $r['category'], $check);
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
  
  	function management_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'management_detail';
		$data['filez'] 		= 'management';
		$data['functionz'] 	= 'management';
		$data['category'] 	= GetAll('management_category', array("id"=> "order/desc"))->result_array();
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("management", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Management';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Management';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function management_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
unset($post['id']);
		$category 	= GetAll("management_category",array("id" => "where/".$post['id_category']))->result_array()[0];
		$post['category'] 		= isset($category['management_category']) ? $category['management_category'] : '';
		$post['category_eng'] 	= isset($category['management_category_eng']) ? $category['management_category_eng'] : '';
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","management",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}

		// upload file
		$config['upload_path']          = '../uploads/management';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 50000;
		#$config['max_width']            = 1024;
		#$config['max_height']           = 768;
		$this->load->library('upload', $config);
		// end
			
		$cek_id = GetValue("id","management",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			if (!$this->upload->do_upload('image')){
				$post['image'] = "";
			} else {
				$image = $this->upload->data();
				$post['image'] = $image['file_name'];
			}
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("management", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$record = GetAll('management',array('id'=>'where/'.$cek_id))->row_array();
			if (!$this->upload->do_upload('image')){
				$post['image'] 	= $record['image'];
			} else {
				$image = $this->upload->data();
				$post['image'] 	= $image['file_name'];
			}
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("management", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('management'));
  	}
	
	function management_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("management", array("is_delete"=> 1));
			}
		}
	}

	function categoryman()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'categoryman';
		$data['filez'] 		= 'management';
		$data['functionz'] 	= 'categoryman';
		$data['labelz'] 	= 'Management Category';
		$this->load->view('template', $data);
	}

	function categoryman_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("","management_category");
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
			
		$query_no_limit = "SELECT * FROM kg_management_category WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_management_category WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 		= "<a href='".site_url('management/categoryman_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href='javascript:;'><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] 	= array($no, $r['management_category'], $check);
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

	function categoryman_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'categoryman_detail';
		$data['filez'] 		= 'management';
		$data['functionz'] 	= 'categoryman';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("management_category", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Management Category';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a new Management Category';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}

	function categoryman_add()
	{
		ini_set('memory_limit', -1);
		$admin_id         		= permission();
		$post=$param= $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","management_category",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		
		$cek_id = GetValue("id","management_category",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("management_category", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("management_category", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('management/categoryman'));
  	}
	
	function categoryman_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt") == 2) {
				$this->db->where("id", $idz);
				$this->db->update("management_category", array("is_delete"=> 1));
			}
		}
	}
  
}
