<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direktori extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'direktori';
		$data['filez'] 		= 'direktori';
		$data['functionz'] 	= 'direktori';
		$data['labelz'] 	= 'Directory';
		$this->load->view('template', $data);
	}
	
	function direktori_list($trash=0)
	{
		ini_set('memory_limit', -1);
		//ini_set('memory_limit','256M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
		ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
		ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288'); 
		$where = "1=1";
		$kolom = array("","nama","category","type","tags","service","city");
		if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
		else $ord = "id desc";
			
		if(isset($_POST['search']['value'])) {
			$src = $_POST['search']['value'];
			if($src) {
				$w_like=array();
				foreach($kolom as $val) {
					if($val!='service'){
						if($val) $w_like[] = $val." LIKE '%".$src."%'";
					}
				}
				$where = "(".join(" OR ", $w_like).")";
			}
		}
			
		$query_no_limit = "SELECT * FROM kg_directory WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_directory WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		//lastq();
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 		= "<a href='".site_url('direktori/direktori_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
 
			$status = '';
			if($r['is_rawat_inap']) $status .= 'Rawat Inap, ';
			if($r['is_rawat_jalan']) $status .= 'Rawat jalan, ';
			if($r['is_medical_checkup']) $status .= 'Medical Checkup, ';
			if($r['is_optik']) $status .= 'Optik';
			
			$data[] 	= array($r['nama'], $r['category'], $r['type'], $r['tags'], $status, $r['city'], $check);
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
  
  	function direktori_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'direktori_detail';
		$data['filez'] 		= 'direktori';
		$data['functionz'] 	= 'direktori';
		$data['id'] 		= $id;
		$data['category'] 	= GetAll('directory_category')->result_array();
		$data['type'] 		= GetAll('directory_type')->result_array();
		$data['tags'] 		= GetAll('directory_tags')->result_array();
		if($id) {
			$q = GetAll("directory", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Directory';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Directory';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function direktori_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
unset($post['id']);
		$get_cat 	= GetAll('directory_category',array('id' => 'where/'.$post['id_category']))->row_array();
		$get_type 	= GetAll('directory_type',array('id' => 'where/'.$post['id_type']))->row_array();
		$get_tags 	= GetAll('directory_tags',array('id' => 'where/'.$post['id_tags']))->row_array();
		$post['category']	= isset($get_cat['title_eng']) ? $get_cat['title_eng'] : '';
		$post['type'] 		= isset($get_type['title_eng']) ? $get_type['title_eng'] : '';
		$post['tags'] 		= isset($get_tags['title']) ? $get_tags['title'] : '';
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");

		if(!isset($post['is_rawat_inap'])) $post['is_rawat_inap'] = 0;
		if(!isset($post['is_rawat_jalan'])) $post['is_rawat_jalan'] = 0;
		if(!isset($post['is_medical_checkup'])) $post['is_medical_checkup'] = 0;
		if(!isset($post['is_optik'])) $post['is_optik'] = 0;
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","directory",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		$prov = GetAll('provinsi',array('id' => 'where/'.$post['id_province']))->row_array();
		$city = GetAll('kota',array('id' => 'where/'.$post['id_city']))->row_array();
		$post['province'] = isset($prov['provinsi']) ? $prov['provinsi'] : '';
		$post['city'] = isset($city['kabupaten']) ? $city['kabupaten'] : '';
		
		$cek_id = GetValue("id","directory",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("directory", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("directory", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('direktori'));
  	}
	
	function direktori_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("directory", array("is_delete"=> 1));
			}
		}
	}

	function category()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'direktori_category';
		$data['filez'] 		= 'direktori';
		$data['functionz'] 	= 'category';
		$data['labelz'] 	= 'Directory Category';
		$this->load->view('template', $data);
	}

	function category_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("title_eng");
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
			
		$query_no_limit = "SELECT * FROM kg_directory_category WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_directory_category WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 		= "<a href='".site_url('direktori/category_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] 	= array($r['title_eng'],$check);
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
		$data['main'] 		= 'direktori_category_detail';
		$data['filez'] 		= 'direktori';
		$data['functionz'] 	= 'category';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("directory_category", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Directory Category';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Directory Category';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function category_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
			
		$cek_id = GetValue("id","directory_category",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("directory_category", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {	
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("directory_category", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('direktori/category'));
  	}
	
	function category_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("directory_category", array("is_delete"=> 1));
			}
		}
	}

	function type()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'direktori_type';
		$data['filez'] 		= 'direktori';
		$data['functionz'] 	= 'type';
		$data['labelz'] 	= 'Directory Type';
		$this->load->view('template', $data);
	}

	function type_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("title_eng");
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
			
		$query_no_limit = "SELECT * FROM kg_directory_type WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_directory_type WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 		= "<a href='".site_url('direktori/type_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] 	= array($r['title_eng'],$check);
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
  
  	function type_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'direktori_type_detail';
		$data['filez'] 		= 'direktori';
		$data['functionz'] 	= 'type';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("directory_type", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Directory Type';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Directory Type';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function type_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
			
		$cek_id = GetValue("id","directory_type",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("directory_type", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {	
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("directory_type", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('direktori/type'));
  	}
	
	function type_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("directory_type", array("is_delete"=> 1));
			}
		}
	}

	function tags()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'direktori_tags';
		$data['filez'] 		= 'direktori';
		$data['functionz'] 	= 'tags';
		$data['labelz'] 	= 'Directory Tags';
		$this->load->view('template', $data);
	}

	function tags_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("title");
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
			
		$query_no_limit = "SELECT * FROM kg_directory_tags WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_directory_tags WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 		= "<a href='".site_url('direktori/tags_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] 	= array($r['title'],$check);
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
  
  	function tags_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'direktori_tags_detail';
		$data['filez'] 		= 'direktori';
		$data['functionz'] 	= 'tags';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("directory_tags", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Directory Tags';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Directory Tags';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function tags_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
			
		$cek_id = GetValue("id","directory_tags",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("directory_tags", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {	
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("directory_tags", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('direktori/tags'));
  	}
	
	function tags_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("directory_tags", array("is_delete"=> 1));
			}
		}
	}
  
}
