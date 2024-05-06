<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financial_report extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'financial_report';
		$data['filez'] 		= 'financial_report';
		$data['functionz'] 	= 'financial_report';
		$data['labelz'] 	= 'Financial Report';
		$this->load->view('template', $data);
	}
	
	function financial_report_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = 1;
		$kolom = array("","title_eng","file","year","create_date");
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
			
		$query_no_limit = "SELECT * FROM kg_financial_report WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_financial_report WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$file 		= !empty($r['file']) ? '<a href="'.base_url('assets/uploads/financial_report/'.$r['file']).'" target="_blank" class="btn btn-info btn-xs">View</a>' : '';
			$check 		= "<a href='".site_url('financial_report/financial_report_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] 	= array($no, $r['title_eng'], $file, $r['year'], $r['create_date'], $check);
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
  
  	function financial_report_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'financial_report_detail';
		$data['filez'] 		= 'financial_report';
		$data['functionz'] 	= 'financial_report';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("financial_report", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Financial Report';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Financial Report';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function financial_report_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post     	= $this->input->post();
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");

		// upload file
		$config['upload_path']          = './assets/uploads/financial_report';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 50000;
		#$config['max_width']            = 1024;
		#$config['max_height']           = 768;
		$this->load->library('upload', $config);
		// end

		$cek_id = GetValue("id","financial_report",array("id"=> "where/".$post['id']));
		if(!$cek_id) {
			if (!$this->upload->do_upload('userfile')){
				$post['file'] = "";
			} else {
				$file = $this->upload->data();
				$post['file'] = $file['file_name'];
			}

			$post['create_user_id'] = $admin_id;
			$post['create_date']    = date("Y-m-d H:i:s");
			if($this->db->insert("financial_report", $post)) $this->session->set_flashdata("message", "success-Add Success");
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
			if($this->db->update("financial_report", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('financial_report'));
  	}
	
	function financial_report_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("financial_report", array("is_delete"=> 1));
			}
		}
	}
  
}
