<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_group extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'company_group';
		$data['filez'] 		= 'company_group';
		$data['functionz'] 	= 'company_group';
		$data['labelz'] 	= 'Company Group';
		$Q_record 			= 'SELECT * FROM kg_company_group WHERE is_delete = 0 ORDER BY urutan ASC';
		$data['record'] 	= $this->db->query($Q_record)->result_array();
		$this->load->view('template', $data);
	}

	function company_group_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'company_group_detail';
		$data['filez'] 		= 'company_group';
		$data['functionz'] 	= 'company_group';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("company_group", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Company Group';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Company Group';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function company_group_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
unset($post['id']);
		$urutan 	= json_decode($post['urutan']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");

		if(!isset($post['is_publish'])) $post['is_publish'] = 0;
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","company_group",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		
		// upload file
		$config ['upload_path']   = '../uploads/company_group';
		$config ['allowed_types'] = 'jpg|png|jpeg';
		$config ['max_size']      = 50000;
		#$config['max_width']     = 1024;
		#$config['max_height']    = 768;
		$this->load->library('upload', $config);
		// end
		$cek_id = GetValue("id","company_group",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			if (!$this->upload->do_upload('image')){
				$post['image'] 	= '';
			} else {
				$image = $this->upload->data();
				$post['image']	= $image['file_name'];
			}
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("company_group", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$record = GetAll('company_group',array('id'=>'where/'.$cek_id))->row_array();
			if (!$this->upload->do_upload('image')){
				$post['image'] 	= $record['image'];
			} else {
				$image = $this->upload->data();
				$post['image']	= $image['file_name'];
			}
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("company_group", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('company_group'));
  	}

	function company_group_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("company_group", array("is_delete"=> 1));
			}
		}
	}

	function update_sort(){
		$admin_id 	= permission();
		$post = $param = $this->input->post();
unset($post['id']);
		if(isset($post['update'])){
			foreach($post['order'] as $p){
				$id 	= $p[0];
				$order 	= $p[1];
				$this->db->where("id", $id);
				$this->db->update("company_group", array('urutan' => $order));
				$this->session->set_flashdata("message", "success-Edit Success");
			}
		}
	}
  
}
