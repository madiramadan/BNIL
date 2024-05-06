<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kinerja_bulanan extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'kinerja_bulanan';
		$data['filez'] 		= 'kinerja_bulanan';
		$data['functionz'] 	= 'kinerja_bulanan';
		$data['labelz'] 	= 'Kinerja Bulanan';
		$this->load->view('template', $data);
	}
	
	function kinerja_bulanan_list()
	{
		ini_set('memory_limit', -1);
		$where = 1;
		$kolom = array("","product","periode");
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
			
		$query_no_limit = "SELECT * FROM kg_kinerja_bulanan WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_kinerja_bulanan WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 	= "<a href='".site_url('kinerja_bulanan/kinerja_bulanan_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] = array($no, $r['product'], $r['periode'], $check);
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
  
  	function kinerja_bulanan_detail($id=0)
	{
		permission();
		$data   = GetHeaderFooter();
		$data['main'] 		= 'kinerja_bulanan_detail';
		$data['filez'] 		= 'kinerja_bulanan';
		$data['functionz'] 	= 'kinerja_bulanan';
		$data['id'] 		= $id;
		$data['product'] 	= GetAll('fun_product')->result_array();
		if($id) {
			$q = GetAll("kinerja_bulanan", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Kinerja Bulanan';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Kinerja Bulanan';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function kinerja_bulanan_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post     	= $this->input->post();
		$query 		= 'SELECT * FROM kg_fun_product WHERE id = '.$post['id_product'];
		$product 	= $this->db->query($query)->row_array();
		$post['product'] 		= isset($product['title']) ? $product['title'] : '';
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
			
		$cek_id = GetValue("id","kinerja_bulanan",array("id"=> "where/".$post['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date']    = date("Y-m-d H:i:s");
			if($this->db->insert("kinerja_bulanan", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $post['id']);
			if($this->db->update("kinerja_bulanan", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('kinerja_bulanan'));
  	}
	
	function kinerja_bulanan_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("kinerja_bulanan", array("is_delete"=> 1));
			}
		}
	}
  
}
