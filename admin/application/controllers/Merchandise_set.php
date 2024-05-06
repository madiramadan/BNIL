<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchandise_set extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'merchandise_set';
		$data['filez'] 		= 'merchandise_set';
		$data['functionz'] 	= 'merchandise_set';
		$data['labelz'] 	= 'Merchandise Setting';
		$data['record'] 	= GetAll('merchandise_set')->row_array();
		$this->load->view('template', $data);
	}
  
	function merchandise_set_add()
	{
		ini_set('memory_limit', -1);
		$admin_id = permission();
		$post=$param= $this->input->post();
unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		
		// upload file
		$config ['upload_path']   = '../uploads/merchandise_set';
		$config ['allowed_types'] = 'jpg|png|jpeg';
		$config ['max_size']      = 50000;
		#$config['max_width']     = 1024;
		#$config['max_height']    = 768;
		$this->load->library('upload', $config);
		// end
			
		$cek_id = GetValue("id","merchandise_set",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			if (!$this->upload->do_upload('harga_biaya')){
				$post['harga_biaya'] 	= '';
			} else {
				$harga_biaya = $this->upload->data();
				$post['harga_biaya']	= $harga_biaya['file_name'];
			}
			if (!$this->upload->do_upload('pembayaran')){
				$post['pembayaran']	= '';
			} else {
				$pembayaran			= $this->upload->data();
				$post['pembayaran']	= $pembayaran['file_name'];
			}
			if (!$this->upload->do_upload('pemesanan')){
				$post['pemesanan'] 	= '';
			} else {
				$pemesanan 			= $this->upload->data();
				$post['pemesanan'] 	= $pemesanan['file_name'];
			}
			if (!$this->upload->do_upload('pembatalan')){
				$post['pembatalan']	= '';
			} else {
				$pembatalan 		= $this->upload->data();
				$post['pembatalan'] = $pembatalan['file_name'];
			}
			if (!$this->upload->do_upload('pengiriman')){
				$post['pengiriman']	= '';
			} else {
				$pengiriman			= $this->upload->data();
				$post['pengiriman']	= $pengiriman['file_name'];
			}
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("merchandise_set", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$record = GetAll('merchandise_set',array('id'=>'where/'.$cek_id))->row_array();
			if (!$this->upload->do_upload('harga_biaya')){
				$post['harga_biaya'] 	= $record['harga_biaya'];
			} else {
				$harga_biaya = $this->upload->data();
				$post['harga_biaya']	= $harga_biaya['harga_biaya'];
			}
			if (!$this->upload->do_upload('pembayaran')){
				$post['pembayaran']	= $record['pembayaran'];
			} else {
				$pembayaran			= $this->upload->data();
				$post['pembayaran']	= $pembayaran['file_name'];
			}
			if (!$this->upload->do_upload('pemesanan')){
				$post['pemesanan'] 	= $record['pemesanan'];
			} else {
				$pemesanan 			= $this->upload->data();
				$post['pemesanan'] 	= $pemesanan['file_name'];
			}
			if (!$this->upload->do_upload('pembatalan')){
				$post['pembatalan']	= $record['pembatalan'];
			} else {
				$pembatalan 		= $this->upload->data();
				$post['pembatalan'] = $pembatalan['file_name'];
			}
			if (!$this->upload->do_upload('pengiriman')){
				$post['pengiriman']	= $record['pengiriman'];
			} else {
				$pengiriman			= $this->upload->data();
				$post['pengiriman']	= $pengiriman['file_name'];
			}
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("merchandise_set", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('merchandise_set'));
  	}
  
}
