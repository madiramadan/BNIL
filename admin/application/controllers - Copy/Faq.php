<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'faq';
		$data['filez'] 		= 'faq';
		$data['functionz'] 	= 'faq';
		$data['labelz'] 	= 'FAQ';
		$this->load->view('template', $data);
	}
	
	function faq_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = 1;
		$kolom = array("","nama_eng","urutan");
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
			
		$query_no_limit = "SELECT * FROM kg_faq WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_faq WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 	= "<a href='".site_url('faq/view/'.$r['id'])."'><i class='icon icon-list' title='View List'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href='".site_url('faq/faq_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] = array($no, $r['nama_eng'], $r['urutan'], $check);
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
  
  	function faq_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'faq_detail';
		$data['filez'] 		= 'faq';
		$data['functionz'] 	= 'faq';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("faq", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update FAQ';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New FAQ';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function faq_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post     	= $this->input->post();
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
			
		$cek_id = GetValue("id","faq",array("id"=> "where/".$post['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date']    = date("Y-m-d H:i:s");
			if($this->db->insert("faq", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $post['id']);
			if($this->db->update("faq", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('faq'));
  	}
	
	function faq_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("faq", array("is_delete"=> 1));
				
				$this->db->where("id_faq", $idz);
				$this->db->update("faq_view", array("is_delete"=> 1));
			}
		}
	}

	function view($id_faq=0)
	{
		permission();
		$data 	= GetHeaderFooter();
		$record = GetAll('faq', array('id'=>'where/'.$id_faq))->result_array()[0];
		$data['main'] 		= 'faq_view';
		$data['filez'] 		= 'faq';
		$data['functionz'] 	= 'view';
		$data['labelz'] 	= '<a href="'.site_url('faq').'">FAQ</a> | '.$record['nama_eng'];
		$data['id_faq'] 	= $id_faq;
		$this->load->view('template', $data);
	}

	function view_list($id_faq=0){
		ini_set('memory_limit', -1);
		$where  = '1 AND id_faq = '.$id_faq;
		$kolom  = array("","question_eng","answer_eng","create_date","modify_date","urutan");
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
			
		$query_no_limit = "SELECT * FROM kg_faq_view WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_faq_view WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 	= "<a href='".site_url('faq/view_form/'.$id_faq.'/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href='javascript:;'><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] = array($no, $r['question_eng'], $r['answer_eng'], $r['create_date'], $r['modify_date'], $r['urutan'], $check);
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

	function view_form($id_faq=0,$id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'faq_view_form';
		$data['filez'] 		= 'faq';
		$data['functionz'] 	= 'view_form';
		$data['id_faq'] 	= $id_faq;
		$data['id'] 		= $id;
		$get_faq 			= GetAll('faq',array('id'=>'where/'.$id_faq))->result_array()[0];
		if($id) {
			$q = GetAll("faq_view", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update '.$get_faq['nama_eng'];
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New '.$get_faq['nama_eng'];
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}

	function view_form_save(){
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post     	= $this->input->post();
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
			
		$cek_id = GetValue("id","faq_view",array("id"=> "where/".$post['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date']    = date("Y-m-d H:i:s");
			if($this->db->insert("faq_view", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $post['id']);
			if($this->db->update("faq_view", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('faq/view/'.$post['id_faq']));
	}

	function view_aktif($id_faq=0)
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$where = array(
					'id' 		=> $idz,
					'id_faq' 	=> $id_faq
				);
				$this->db->where($where);
				$this->db->update("faq_view", array('is_delete' => 1));
			}
		}
	}
  
}
