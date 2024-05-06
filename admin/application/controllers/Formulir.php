<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class formulir extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'formulir';
		$data['filez'] 		= 'formulir';
		$data['functionz'] 	= 'formulir';
		$data['labelz'] 	= 'Formulir';
		$this->load->view('template', $data);
	}
	
	function formulir_list($trash=0)
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
			
		$query_no_limit = "SELECT * FROM kg_formulir WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_formulir WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 	= "<a href='".site_url('formulir/view/'.$r['id'])."'><i class='icon icon-list' title='View List'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href='".site_url('formulir/formulir_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
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
  
  	function formulir_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'formulir_detail';
		$data['filez'] 		= 'formulir';
		$data['functionz'] 	= 'formulir';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("formulir", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Formulir';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Formulir';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function formulir_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","formulir",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
			
		$cek_id = GetValue("id","formulir",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("formulir", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("formulir", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('formulir'));
  	}
	
	function formulir_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("formulir", array("is_delete"=> 1));
				
				$this->db->where("id_formulir", $idz);
				$this->db->update("formulir_view", array("is_delete"=> 1));
			}
		}
	}

	function view($id_formulir=0)
	{
		permission();
		$data 	= GetHeaderFooter();
		$record = GetAll('formulir', array('id'=>'where/'.$id_formulir))->result_array()[0];
		$data['main'] 			= 'formulir_view';
		$data['filez'] 			= 'formulir';
		$data['functionz'] 		= 'view';
		$data['labelz'] 		= '<a href="'.site_url('formulir').'">Formulir</a> | '.$record['nama_eng'];
		$data['id_formulir'] 	= $id_formulir;
		$this->load->view('template', $data);
	}

	function view_list($id_formulir=0){
		ini_set('memory_limit', -1);
		$where  = '1=1 AND id_formulir = '.$id_formulir;
		$kolom  = array("","nama_eng","file","from_html","create_date","modify_date");
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
			
		$query_no_limit = "SELECT * FROM kg_formulir_view WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_formulir_view WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$file	= !empty($r['file']) ? '<a href="'.base_url('assets/uploads/formulir/'.$r['file']).'" target="_blank" class="btn btn-info btn-xs">View</a>' : '';
			$check 	= "<a href='".site_url('formulir/view_form/'.$id_formulir.'/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href='javascript:;'><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] = array($no, $r['nama_eng'], $file, $r['from_html'], $r['create_date'], $r['modify_date'], $check);
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

	function view_form($id_formulir=0,$id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 			= 'formulir_view_form';
		$data['filez'] 			= 'formulir';
		$data['functionz'] 		= 'view_form';
		$data['id_formulir']	= $id_formulir;
		$data['id'] 			= $id;
		$get_formulir 			= GetAll('formulir',array('id'=>'where/'.$id_formulir))->result_array()[0];
		if($id) {
			$q = GetAll("formulir_view", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update '.$get_formulir['nama_eng'];
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New '.$get_formulir['nama_eng'];
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
			$post['id'] = GetValue("id","formulir_view",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}

		// upload file
		$config['upload_path']          = '../uploads/formulir';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 10000;
		#$config['max_width']            = 1024;
		#$config['max_height']           = 768;
		$this->load->library('upload', $config);
		// end
			
		$cek_id = GetValue("id","formulir_view",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			if (!$this->upload->do_upload('userfile')){
				$post['file'] = "";
			} else {
				$file = $this->upload->data();
				$post['file'] = $file['file_name'];
			}
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("formulir_view", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$record = GetAll('formulir_view',array('id'=>'where/'.$cek_id))->row_array();
			if (!$this->upload->do_upload('userfile')){
				$post['file'] 	= $record['file'];
			} else {
				$file = $this->upload->data();
				$post['file'] 	= $file['file_name'];
			}	
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("formulir_view", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('formulir/view/'.$post['id_formulir']));
	}

	function view_aktif($id_formulir=0)
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$where = array(
					'id' 		=> $idz,
					'id_formulir' 	=> $id_formulir
				);
				$this->db->where($where);
				$this->db->update("formulir_view", array('is_delete' => 1));
			}
		}
	}
  
}
