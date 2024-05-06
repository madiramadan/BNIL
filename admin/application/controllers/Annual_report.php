<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Annual_report extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'annual_report';
		$data['filez'] 		= 'annual_report';
		$data['functionz'] 	= 'annual_report';
		$data['labelz'] 	= 'Annual Report';
		$this->load->view('template', $data);
	}
	
	function annual_report_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("","title_eng","image","year","create_date");
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
			
		$query_no_limit = "SELECT * FROM kg_annual_report WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_annual_report WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$file 		= !empty($r['file']) ? '<a href="'.base_url('assets/uploads/annual_report/'.$r['file']).'" target="_blank" class="btn btn-info btn-xs">View</a>' : '';
			$check 		= "<a href='".site_url('annual_report/annual_report_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
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
  
  	function annual_report_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'annual_report_detail';
		$data['filez'] 		= 'annual_report';
		$data['functionz'] 	= 'annual_report';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("annual_report", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Annual Report';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Annual Report';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function annual_report_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","annual_report",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}

		// upload file
		$config['upload_path']          = '../uploads/annual_reports';
		$config['allowed_types']        = 'jpg|png|jpeg|pdf';
		$config['max_size']             = 50000;
		#$config['max_width']            = 1024;
		#$config['max_height']           = 768;
		$this->load->library('upload', $config);
		// end
			
		$cek_id = GetValue("id","annual_report",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			if (!$this->upload->do_upload('userfile')){
				die($this->upload->display_error());
				$post['file'] = "";
			} else {
				$file = $this->upload->data();
				$post['file'] = $file['file_name'];
			}
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
			if($this->db->insert("annual_report", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$record = GetAll('annual_report',array('id'=>'where/'.$cek_id))->row_array();
			if (!$this->upload->do_upload('userfile')){
				$post['file'] 	= $record['file'];
			} else {
				$file = $this->upload->data();
				$post['file'] 	= $file['file_name'];
			}	
			if (!$this->upload->do_upload('image')){
				$post['image'] 	= $record['image'];
			} else {
				$image = $this->upload->data();
				$post['image'] 	= $image['file_name'];
			}
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("annual_report", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('annual_report'));
  	}
	
	function annual_report_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("annual_report", array("is_delete"=> 1));
			}
		}
	}
  
}
