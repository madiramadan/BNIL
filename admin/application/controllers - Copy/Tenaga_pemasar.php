<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenaga_pemasar extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'tenaga_pemasar';
		$data['filez'] 		= 'tenaga_pemasar';
		$data['functionz'] 	= 'tenaga_pemasar';
		$data['labelz'] 	= 'Tenaga Pemasar';
		$this->load->view('template', $data);
	}
	
	function tenaga_pemasar_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = 1;
		$kolom = array("","title","file","create_date");
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
			
		$query_no_limit = "SELECT * FROM kg_tenaga_pemasar WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_tenaga_pemasar WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$file 		= !empty($r['file']) ? '<a href="'.base_url('assets/uploads/tenaga_pemasar/'.$r['file']).'" target="_blank" class="btn btn-info btn-xs">View</a>' : '';
			$check 		= "<a href='".site_url('tenaga_pemasar/tenaga_pemasar_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] 	= array($no, $r['title'], $file, $r['create_date'], $check);
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
  
  	function tenaga_pemasar_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'tenaga_pemasar_detail';
		$data['filez'] 		= 'tenaga_pemasar';
		$data['functionz'] 	= 'tenaga_pemasar';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("tenaga_pemasar", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Tenaga Pemasar';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Tenaga Pemasar';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function tenaga_pemasar_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post     	= $this->input->post();
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");

		// upload file
		$config['upload_path']          = './assets/uploads/tenaga_pemasar';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 50000;
		#$config['max_width']            = 1024;
		#$config['max_height']           = 768;
		$this->load->library('upload', $config);
		// end
			
		$cek_id = GetValue("id","tenaga_pemasar",array("id"=> "where/".$post['id']));
		if(!$cek_id) {
			if (!$this->upload->do_upload('userfile')){
				$post['file'] = "";
			} else {
				$file = $this->upload->data();
				$post['file'] = $file['file_name'];
			}
			$post['create_user_id'] = $admin_id;
			$post['create_date']    = date("Y-m-d H:i:s");
			if($this->db->insert("tenaga_pemasar", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$record = GetAll('financial_report',array('id'=>'where/'.$cek_id))->row_array();
			if (!$this->upload->do_upload('userfile')){
				$post['file'] 	= $record['file'];
			} else {
				$file = $this->upload->data();
				$post['file'] 	= $file['file_name'];
			}		
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $post['id']);
			if($this->db->update("tenaga_pemasar", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('tenaga_pemasar'));
  	}
	
	function tenaga_pemasar_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("tenaga_pemasar", array("is_delete"=> 1));
			}
		}
	}
  
}
