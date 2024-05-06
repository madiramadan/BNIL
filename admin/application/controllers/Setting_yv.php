<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_yv extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'setting_yv';
		$data['filez'] 		= 'setting_yv';
		$data['functionz'] 	= 'setting_yv';
		$data['labelz'] 	= 'Youtube Videos';
		$data['record'] 	= GetAll('setting_yv',array('id'=>'where/1'))->row_array();
		$this->load->view('template', $data);
	}

	function setting_yv_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("link","is_publish","modify_date");
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
			
		$query_no_limit = "SELECT * FROM kg_setting_yv WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_setting_yv WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 		= "<a href='".site_url('setting_yv/setting_yv_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$publish 	= $r['is_publish'] ? "Published" : "Draft";
			$data[] 	= array($r['link'], $publish, $r['modify_date'], $check);
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

	function setting_yv_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main']      = 'setting_yv_detail';
		$data['filez']     = 'setting_yv';
		$data['functionz'] = 'setting_yv';
		$data['id']        = $id;
		if($id) {
			$q = GetAll("setting_yv", array("id"=> "where/".$id))->result_array()[0];
			$data['labelz']	= 'Update Youtube Video';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Add New a Youtube Video';
			$data['val']    = array();
		}
		$this->load->view('template', $data);
	}
  
	function setting_yv_add()
	{
		ini_set('memory_limit', -1);
		$admin_id         		= permission();
		$post=$param= $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");

		if(!isset($post['is_publish'])) $post['is_publish']=0;
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","setting_yv",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		
		$cek_id = GetValue("id","setting_yv",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("setting_yv", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("setting_yv", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('setting_yv'));
  	}
	
	function setting_yv_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("setting_yv", array("is_delete"=> 1));
			}
		}
	}
  
}
