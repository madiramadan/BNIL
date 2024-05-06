<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Follow_me extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'follow_me';
		$data['filez'] 		= 'follow_me';
		$data['functionz'] 	= 'follow_me';
		$data['labelz'] 	= 'Follow Me (Footer)';
		$Q_record 			= 'SELECT * FROM kg_follow_me WHERE is_delete = 0 ORDER BY urutan ASC';
		$data['record'] 	= $this->db->query($Q_record)->result_array();
		$this->load->view('template', $data);
	}

	function follow_me_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'follow_me_detail';
		$data['filez'] 		= 'follow_me';
		$data['functionz'] 	= 'follow_me';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("follow_me", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Follow Me (Footer)';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Follow Me (Footer)';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function follow_me_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
		unset($post['id']);
		$id 		= isset($param['id']) ? $param['id'] : 0;
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");

		if(!isset($post['is_publish'])) $post['is_publish'] = 0;
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","follow_me",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		$post['urutan'] = 0;
		if($post['image_type'] == 'icon'){
			$post['icon'] 			= $post['icon'];
			$post['title_image'] 	= '';
		} else {
			$post['title_image'] 	= $post['title_image'];
			$post['icon'] 			= '';
		}
		
		// upload file
		$config ['upload_path']   = '../uploads/follow_me';
		$config ['allowed_types'] = 'jpg|png|jpeg';
		$config ['max_size']      = 50000;
		#$config['max_width']     = 1024;
		#$config['max_height']    = 768;
		$this->load->library('upload', $config);
		// end
			
		$cek_id = GetValue("id","follow_me",array("id"=> "where/".$id));
		if(!$cek_id) {
			if (!$this->upload->do_upload('image')){
				$post['image'] 	= '';
			} else {
				if($post['image_type'] == 'img'){
					$image 			= $this->upload->data();
					$post['image']	= $image['file_name'];
				} else {
					$post['image']	= '';
				}
			}
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("follow_me", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$record = GetAll('follow_me',array('id'=>'where/'.$cek_id))->row_array();
			if (!$this->upload->do_upload('image')){
				$post['image'] = $post['image_type'] == 'img' ? $record['image'] : '';
			} else {
				if($post['image_type'] == 'img'){
					$image 			= $this->upload->data();
					$post['image']	= $image['file_name'];
				} else {
					$post['image']	= '';
				}
			}
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("follow_me", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('follow_me'));
  	}

	function follow_me_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("follow_me", array("is_delete"=> 1));
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
				$this->db->update("follow_me", array('urutan' => $order));
				$this->session->set_flashdata("message", "success-Edit Success");
			}
		}
	}
  
}
