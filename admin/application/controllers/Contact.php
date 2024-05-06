<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'contact';
		$data['filez'] 		= 'contact';
		$data['functionz'] 	= 'contact';
		$data['labelz'] 	= 'Contact';
		$this->load->view('template', $data);
	}
	
	function contact_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("","nama_eng");
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
			
		$query_no_limit = "SELECT * FROM kg_contact WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_contact WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 	= "<a href='".site_url('contact/view/'.$r['id'])."'><i class='icon icon-list' title='View List'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href='".site_url('contact/contact_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] = array($no, $r['nama_eng'], $check);
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
  
  	function contact_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'contact_detail';
		$data['filez'] 		= 'contact';
		$data['functionz'] 	= 'contact';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("contact", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update contact';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New contact';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function contact_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","contact",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
			
		$cek_id = GetValue("id","contact",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("contact", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("contact", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('contact'));
  	}
	
	function contact_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("contact", array("is_delete"=> 1));
				
				$this->db->where("id_contact", $idz);
				$this->db->update("contact_view", array("is_delete"=> 1));
			}
		}
	}

	function view($id_contact=0)
	{
		permission();
		$data 	= GetHeaderFooter();
		$record = GetAll('contact', array('id'=>'where/'.$id_contact))->result_array()[0];
		$data['main'] 			= 'contact_view';
		$data['filez'] 			= 'contact';
		$data['functionz'] 		= 'view';
		$data['labelz'] 		= '<a href="'.site_url('contact').'">Contact</a> | '.$record['nama_eng'];
		$data['id_contact'] 	= $id_contact;
		$this->load->view('template', $data);
	}

	function view_list($id_contact=0){
		ini_set('memory_limit', -1);
		$where  = ' id_contact = '.$id_contact;
		$kolom  = array("","nama_eng","kup","address","city");
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
			
		$query_no_limit = "SELECT * FROM kg_contact_view WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_contact_view WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 	= "<a href='".site_url('contact/view_form/'.$id_contact.'/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href='javascript:;'><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] = array($no, $r['nama'], $r['kup'], $r['address'], $r['city'], $check);
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

	function view_form($id_contact=0,$id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 			= 'contact_view_form';
		$data['filez'] 			= 'contact';
		$data['functionz'] 		= 'view_form';
		$data['id_contact']		= $id_contact;
		$data['id'] 			= $id;
		$get_contact 			= GetAll('contact',array('id'=>'where/'.$id_contact))->result_array()[0];
		if($id) {
			$q = GetAll("contact_view", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update '.$get_contact['nama_eng'];
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New '.$get_contact['nama_eng'];
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}

	function view_form_save(){
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
		unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","contact_view",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		
		$prov = GetAll('provinsi',array('id' => 'where/'.$post['id_province']))->row_array();
		$city = GetAll('kota',array('id' => 'where/'.$post['id_city']))->row_array();
		$post['province'] = isset($prov['provinsi']) ? $prov['provinsi'] : '';
		$post['city'] = isset($city['kabupaten']) ? $city['kabupaten'] : '';
		
		$cek_id = GetValue("id","contact_view",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
			$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("contact_view", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("contact_view", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('contact/view/'.$post['id_contact']));
	}

	function view_aktif($id_contact=0)
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$where = array(
					'id' 		=> $idz,
					'id_contact' 	=> $id_contact
				);
				$this->db->where($where);
				$this->db->update("contact_view", array('is_delete' => 1));
			}
		}
	}
	
	function get_kabupaten() {
		$id_prov=$this->input->post("id_prov");
		$id_kab=$this->input->post("id_kab");
		echo GetKabList($id_prov,$id_kab);
	}
  
}