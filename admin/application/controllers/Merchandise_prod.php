<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class merchandise_prod extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'merchandise_prod';
		$data['filez'] 		= 'merchandise_prod';
		$data['functionz'] 	= 'merchandise_prod';
		$data['labelz'] 	= 'Merchandise Product';
		$this->load->view('template', $data);
	}
	
	function merchandise_prod_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("","nama_eng","price","sku","category_eng","stock","is_publish","create_date");
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
			
		$query_no_limit = "SELECT * FROM kg_merchandise_prod WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_merchandise_prod WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 		= "<a href='".site_url('merchandise_prod/merchandise_prod_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$publish 	= $r['is_publish'] ? "Published" : "Draft";
			$data[] 	= array($no, $r['nama_eng'], 'Rp. '.number_format($r['price']), $r['sku'], $r['category_eng'], $r['stock'], $publish, $r['create_date'], $check);
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
  
  	function merchandise_prod_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'merchandise_prod_detail';
		$data['filez'] 		= 'merchandise_prod';
		$data['functionz'] 	= 'merchandise_prod';
		$data['id'] 		= $id;
		$data['category'] 	= GetAll('merchandise_cat')->result_array();
		if($id) {
			$q = GetAll("merchandise_prod", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Merchandise Product';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a new Merchandise Product';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function merchandise_prod_add()
	{
		ini_set('memory_limit', -1);
		$admin_id         		= permission();
		$post=$param= $this->input->post();
unset($post['id']);
		$get_category 			= GetAll('merchandise_cat',array('id','where/'.$post['id_category']))->row_array();
		$post['category'] 		= isset($get_category['category']) ? $get_category['category'] : '';
		$post['category_eng'] 	= isset($get_category['category_eng']) ? $get_category['category_eng'] : '';
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		
		if (!isset($post['is_publish'])) $post['is_publish'] = 0;
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","merchandise_prod",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		// upload file
		$config ['upload_path']   = '../uploads/merchandise_prod';
		$config ['allowed_types'] = 'jpg|png|jpeg';
		$config ['max_size']      = 50000;
		#$config['max_width']     = 1024;
		#$config['max_height']    = 768;
		$this->load->library('upload', $config);
		// end
			
		$cek_id = GetValue("id","merchandise_prod",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			if (!$this->upload->do_upload('image1')){
				$post['image1'] = "";
			} else {
				$image1 = $this->upload->data();
				$post['image1'] = $image1['file_name'];
			}
			if (!$this->upload->do_upload('image2')){
				$post['image2'] = "";
			} else {
				$image2 			= $this->upload->data();
				$post['image2'] 	= $image2['file_name'];
			}
			if (!$this->upload->do_upload('image3')){
				$post['image3'] = "";
			} else {
				$image3 = $this->upload->data();
				$post['image3'] = $image3['file_name'];
			}
			if (!$this->upload->do_upload('image4')){
				$post['image4'] = "";
			} else {
				$image4 			= $this->upload->data();
				$post['image4'] 	= $image4['file_name'];
			}
			if (!$this->upload->do_upload('image5')){
				$post['image5'] = "";
			} else {
				$image5 			= $this->upload->data();
				$post['image5'] 	= $image5['file_name'];
			}
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("merchandise_prod", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$record = GetAll('merchandise_prod',array('id'=>'where/'.$cek_id))->row_array();
			if (!$this->upload->do_upload('image1')){
				$post['image1'] 	= $record['image1'];
			} else {
				$image1 = $this->upload->data();
				$post['image1'] 	= $image1['file_name'];
			}
			if (!$this->upload->do_upload('image2')){
				$post['image2'] 	= $record['image2'];
			} else {
				$image2 			= $this->upload->data();
				$post['image2'] 	= $image2['file_name'];
			}
			if (!$this->upload->do_upload('image3')){
				$post['image3'] 	= $record['image3'];
			} else {
				$image3 			= $this->upload->data();
				$post['image3'] 	= $image3['file_name'];
			}
			if (!$this->upload->do_upload('image4')){
				$post['image4'] 	= $record['image4'];
			} else {
				$image4 			= $this->upload->data();
				$post['image4'] 	= $image4['file_name'];
			}
			if (!$this->upload->do_upload('image5')){
				$post['image5'] 	= $record['image5'];
			} else {
				$image5 			= $this->upload->data();
				$post['image5'] 	= $image5['file_name'];
			}
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("merchandise_prod", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('merchandise_prod'));
  	}
	
	function merchandise_prod_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("merchandise_prod", array("is_delete"=> 1));
			}
		}
	}
  
}
