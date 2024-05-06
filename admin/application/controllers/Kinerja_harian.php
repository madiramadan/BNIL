<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kinerja_harian extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'kinerja_harian';
		$data['filez'] 		= 'kinerja_harian';
		$data['functionz'] 	= 'kinerja_harian';
		$data['labelz'] 	= 'Kinerja Harian';
		$this->load->view('template', $data);
	}
	
	function kinerja_harian_list()
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("","periode","content","file","create_date");
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
			
		$query_no_limit = "SELECT * FROM kg_kinerja_harian WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_kinerja_harian WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 	= "<a href='".site_url('kinerja_harian/kinerja_harian_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] = array($no, date('Y-m-d',strtotime($r['periode'])), $r['content'], $r['file'], $r['create_date'], $check);
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
  
  	function kinerja_harian_detail($id=0)
	{
		permission();
		$data   = GetHeaderFooter();
		$data['main'] 		= 'kinerja_harian_detail';
		$data['filez'] 		= 'kinerja_harian';
		$data['functionz'] 	= 'kinerja_harian';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("kinerja_harian", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Kinerja Harian';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Kinerja Harian';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function kinerja_harian_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","kinerja_harian",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
			
		// upload file
		$config['upload_path']          = '../uploads/kinerja_harian';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 50000;
		$this->load->library('upload', $config);
		// end
		
		$cek_id = GetValue("id","kinerja_harian",array("id"=> "where/".$param['id']));
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
			if($this->db->insert("kinerja_harian", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			if (!$this->upload->do_upload('userfile')){
				$record = GetAll('kinerja_harian',array('id'=>'where/'.$cek_id))->row_array();
				$post['file'] 	= $record['file'];
			} else {
				$file = $this->upload->data();
				$post['file'] 	= $file['file_name'];
			}	
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("kinerja_harian", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('kinerja_harian'));
  	}
	
	function kinerja_harian_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("kinerja_harian", array("is_delete"=> 1));
			}
		}
	}
  
}
