<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fun_product extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'fun_product';
		$data['filez'] 		= 'fun_product';
		$data['functionz'] 	= 'fun_product';
		$data['labelz'] 	= 'FSS Product';
		$this->load->view('template', $data);
	}
	
	function fun_product_list()
	{
		ini_set('memory_limit', -1);
		$where = 1;
		$kolom = array("","title","category","create_date");
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
			
		$query_no_limit = "SELECT * FROM kg_fun_product WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_fun_product WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 	= "<a href='".site_url('fun_product/fun_product_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] = array($no, $r['title'], $r['category'], $r['create_date'], $check);
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
  
  	function fun_product_detail($id=0)
	{
		permission();
		$data   = GetHeaderFooter();
		$data['main'] 		= 'fun_product_detail';
		$data['filez'] 		= 'fun_product';
		$data['functionz'] 	= 'fun_product';
		$data['id'] 		= $id;
		$data['category'] 	= GetAll('fun_product_cat')->result_array();
		if($id) {
			$q = GetAll("fun_product", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update FSS Product';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New FSS Product';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function fun_product_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post     	= $this->input->post();
		$query 		= 'SELECT * FROM kg_fun_product_cat WHERE id = '.$post['id_category'];
		$category 	= $this->db->query($query)->row_array();
		$post['category'] 		= isset($category['title']) ? $category['parent'].' > '.$category['title'] : '';
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
			
		$cek_id = GetValue("id","fun_product",array("id"=> "where/".$post['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date']    = date("Y-m-d H:i:s");
			if($this->db->insert("fun_product", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $post['id']);
			if($this->db->update("fun_product", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('fun_product'));
  	}
	
	function fun_product_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("fun_product", array("is_delete"=> 1));
			}
		}
	}
  
}
