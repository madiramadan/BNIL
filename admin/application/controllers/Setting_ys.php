<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_ys extends CI_Controller {
	
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
		$data['main'] 		= 'setting_ys';
		$data['filez'] 		= 'setting_ys';
		$data['functionz'] 	= 'setting_ys';
		$data['labelz'] 	= 'Youtube Setting';
		$data['record'] 	= GetAll('setting_ys',array('id'=>'where/1'))->row_array();
		$this->load->view('template', $data);
	}
  
	function setting_ys_add()
	{
		ini_set('memory_limit', -1);
		$admin_id         		= permission();
		$post=$param= $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		if($post['new_password'] === $post['confirm_password']){
			$cek_id = GetValue("id","setting_ys",array("id"=> "where/".$param['id']));
			if(!$cek_id) {
				$post['create_user_id'] = $admin_id;
				$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
				if($this->db->insert("setting_ys", $post)) $this->session->set_flashdata("message", "success-Add Success");
				else $this->session->set_flashdata("message", "danger-Add Failed");
			} else {
				$post['modify_user_id'] = $admin_id;
				$post['modify_date']    = date("Y-m-d H:i:s");
				$this->db->where("id", $param['id']);
				if($this->db->update("setting_ys", $post)) $this->session->set_flashdata("message", "success-Edit Success");
				else $this->session->set_flashdata("message", "danger-Edit Failed");
			}
			redirect(site_url('setting_ys'));
		} else {
			$this->session->set_flashdata("failed", "New Password is not the same as Confirm Password");
		}
		redirect(site_url('setting_ys'));
  	}
	
	function setting_ys_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("setting_ys", array("is_delete"=> 1));
			}
		}
	}
  
}
