<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_fl extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'setting_fl';
		$data['filez'] 		= 'setting_fl';
		$data['functionz'] 	= 'setting_fl';
		$data['labelz'] 	= 'Setitng Footer & Logo';
		$data['record'] 	= GetAll('setting_fl',array('is_delete'=>'where/0'))->result_array();
		$this->load->view('template', $data);
	}
  
  	function setting_fl_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'setting_fl_detail';
		$data['filez'] 		= 'setting_fl';
		$data['functionz'] 	= 'setting_fl';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("setting_fl", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Setitng Footer & Logo';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a new Setitng Footer & Logo';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function setting_fl_add()
	{
		ini_set('memory_limit', -1);
		$admin_id         		= permission();
		$post=$param= $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
			
		$cek_id = GetValue("id","setting_fl",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("setting_fl", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("setting_fl", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('setting_fl'));
  	}
	
	function setting_fl_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("setting_fl", array("is_delete"=> 1));
			}
		}
	}
  
}
