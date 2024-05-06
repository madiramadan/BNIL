<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fun_product_cat extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'fun_product_cat';
		$data['filez'] 		= 'fun_product_cat';
		$data['functionz'] 	= 'fun_product_cat';
		$data['labelz'] 	= 'FSS Product Category';
		$this->load->view('template', $data);
	}
	
	function fun_product_cat_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("","title");
		if(isset($_POST['order'][0]['column'])){
			$ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
		} 
		else{
			$ord = "id asc";
		} 
			
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
			
		$query_no_limit = "SELECT * FROM kg_fun_product_cat WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_fun_product_cat WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$parent=GetValue('title','kg_fun_product_cat',array('id'=>'where/'.$r['id_parent']));
			$strip  = !($r['id_parent']) ? '' : '- ';
			$check 	= "<a href='".site_url('fun_product_cat/fun_product_cat_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] = array($no, $strip.$r['title'],$parent=='0'?'':$parent, $check);
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
  
  	function fun_product_cat_detail($id=0)
	{
		permission();
		$data   = GetHeaderFooter();
		$query	= 'SELECT * FROM kg_fun_product_cat WHERE id_parent = 0';
		$data['main'] 		= 'fun_product_cat_detail';
		$data['filez'] 		= 'fun_product_cat';
		$data['functionz'] 	= 'fun_product_cat';
		$data['id'] 		= $id;
		$data['record'] 	= $this->db->query($query)->result_array();
		if($id) {
			$q = GetAll("fun_product_cat", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update FSS Product Category';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New FSS Product Category';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function fun_product_cat_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
unset($post['id']);
		$id_parent 	= !empty($post['id_parent']) ? $post['id_parent'] : 0;
		$query 		= 'SELECT * FROM kg_fun_product_cat WHERE id = '.$id_parent;
		$parent 	= $this->db->query($query)->row_array();
		$post['parent'] 		= isset($parent['title']) ? $parent['title'] : '';
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","fun_product_cat",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
			
		$cek_id = GetValue("id","fun_product_cat",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("fun_product_cat", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("fun_product_cat", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('fun_product_cat'));
  	}
	
	function fun_product_cat_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("fun_product_cat", array("is_delete"=> 1));
				
				$this->db->where("id_parent", $idz);
				$this->db->update("fun_product_cat", array("is_delete"=> 1));
			}
		}
	}
  
}
