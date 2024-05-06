<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_cp extends CI_Controller {
	
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
		$data['main'] 		= 'setting_cp';
		$data['filez'] 		= 'setting_cp';
		$data['functionz'] 	= 'setting_cp';
		$data['labelz'] 	= 'Setting Change Password';
		$data['record'] 	= GetAll('setting_cp',array('id'=>'where/1'))->row_array();
		$this->load->view('template', $data);
	}
  
	function setting_cp_add()
	{
		ini_set('memory_limit', -1);
		$admin_id         		= permission();
		$post=$param= $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		if($post['new_password'] === $post['confirm_password']){
			$cek_id = GetValue("id","setting_cp",array("id"=> "where/".$param['id']));
			if(!$cek_id) {
				$post['create_user_id'] = $admin_id;
				$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
				if($this->db->insert("setting_cp", $post)) $this->session->set_flashdata("message", "success-Add Success");
				else $this->session->set_flashdata("message", "danger-Add Failed");
			} else {
				$post['modify_user_id'] = $admin_id;
				$post['modify_date']    = date("Y-m-d H:i:s");
				$this->db->where("id", $param['id']);
				if($this->db->update("setting_cp", $post)) $this->session->set_flashdata("message", "success-Edit Success");
				else $this->session->set_flashdata("message", "danger-Edit Failed");
			}
			redirect(site_url('setting_cp'));
		} else {
			$this->session->set_flashdata("failed", "New Password is not the same as Confirm Password");
		}
		redirect(site_url('setting_cp'));
  	}
	
	function setting_cp_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("setting_cp", array("is_delete"=> 1));
			}
		}
	}
  
}
