<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'career';
		$data['filez'] 		= 'career';
		$data['functionz'] 	= 'career';
		$data['labelz'] 	= 'Career';
		$this->load->view('template', $data);
	}
	
	function career_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("","title","category","level","cities","salary_range","closed_date","create_date");
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
			
		$query_no_limit = "SELECT * FROM kg_career WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_career WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 		= "<a href='".site_url('career/career_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] 	= array($no, $r['title'], $r['category'], $r['level'], $r['cities'], $r['salary_range'], $r['closed_date'], $r['create_date'], $check);
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
  
  	function career_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'career_detail';
		$data['filez'] 		= 'career';
		$data['functionz'] 	= 'career';
		$data['id'] 		= $id;
		$data['category'] 	= GetAll("career_category")->result_array();
		$data['level'] 		= GetAll("career_level")->result_array();
		if($id) {
			$q = GetAll("career", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Career';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a new Career';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function career_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
unset($post['id']);
		$category 	= GetAll("career_category",array("id" => "where/".$post['id_category']))->result_array()[0];
		$level 		= GetAll("career_level",array("id"=> "where/".$post['id_level']))->result_array()[0];
		$post['category'] 		= isset($category['career_category']) ? $category['career_category'] : '';
		$post['level'] 			= isset($level['career_level']) ? $level['career_level'] : '';
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
			
		$cek_id = GetValue("id","career",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("career", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("career", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('career'));
  	}
	
	function career_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("career", array("is_delete"=> 1));
			}
		}
	}

	function category()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'category';
		$data['filez'] 		= 'career';
		$data['functionz'] 	= 'category';
		$data['labelz'] 	= 'Career Category';
		$this->load->view('template', $data);
	}

	function category_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("","career_category");
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
			
		$query_no_limit = "SELECT * FROM kg_career_category WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_career_category WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 		= "<a href='".site_url('career/category_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href='javascript:;'><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] 	= array($no, $r['career_category'], $check);
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

	function category_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'category_detail';
		$data['filez'] 		= 'career';
		$data['functionz'] 	= 'category';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("career_category", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Carer Category';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a new Career Category';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}

	function category_add()
	{
		ini_set('memory_limit', -1);
		$admin_id         		= permission();
		$post=$param= $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
			
		$cek_id = GetValue("id","career_category",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("career_category", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("career_category", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('career/category'));
  	}
	
	function category_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt") == 2) {
				$this->db->where("id", $idz);
				$this->db->update("career_category", array("is_delete"=> 1));
			}
		}
	}

	function level()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'level';
		$data['filez'] 		= 'career';
		$data['functionz'] 	= 'level';
		$data['labelz'] 	= 'Career Level';
		$this->load->view('template', $data);
	}

	function level_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("","career_level");
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
			
		$query_no_limit = "SELECT * FROM kg_career_level WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_career_level WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 		= "<a href='".site_url('career/level_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href='javascript:;'><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] 	= array($no, $r['career_level'], $check);
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

	function level_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'level_detail';
		$data['filez'] 		= 'career';
		$data['functionz'] 	= 'level';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("career_level", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Carer level';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a new Career level';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}

	function level_add()
	{
		ini_set('memory_limit', -1);
		$admin_id         		= permission();
		$post=$param= $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
			
		$cek_id = GetValue("id","career_level",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("career_level", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("career_level", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('career/level'));
  	}
	
	function level_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt") == 2) {
				$this->db->where("id", $idz);
				$this->db->update("career_level", array("is_delete"=> 1));
			}
		}
	}
  
}
