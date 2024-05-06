<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_recommender extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main']      = 'product_recommender';
		$data['filez']     = 'product_recommender';
		$data['functionz'] = 'product_recommender';
		$data['labelz']    = 'Product Recommender';
		$this->load->view('template', $data);
	}
	
	function product_recommender_new()
	{
		permission();
		$data = array();
		$data['filez']     = 'product_recommender';
		$data['functionz'] = 'product_recommender';
		$data['labelz']    = 'Product Recommender';
		$this->load->view('product_recommender_new', $data);
	}
	
	function product_recommender_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("","umur","status","penghasilan","tanggungan","perlindungan","jenis_product","nama_product","harga_premi","jenis_premi","create_date");
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
			
		$query_no_limit = "SELECT * FROM kg_product_recommender WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_product_recommender WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list  = $this->db->query($query);
		$data  = array();
		$no    = $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
			$check 		= "<a href='".site_url('product_recommender/product_recommender_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 		.= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$tanggungan = $r['is_tanggungan'] ? "Memiliki Tanggungan" : "Tidak Memiliki";
			$data[] 	= array($no, $r['umur'], $r['status'], $r['penghasilan'], $tanggungan, $r['perlindungan'], $r['jenis_product'], $r['product'], number_format($r['harga_premi']).' /Bulan', $r['jenis_premi'], $r['create_date'], $check);
		}
		
		$output = array(
			"draw"            => $_POST['draw'],
			"recordsTotal"    => $this->db->query($query_no_limit)->num_rows(),
			"recordsFiltered" => $this->db->query($query_no_limit)->num_rows(),
			"data"            => $data
		);
		//output to json format
		echo json_encode($output);
	}
  
	function product_recommender_detail($id=0)
		{
			permission();
			$data = GetHeaderFooter();
			$data['main']      	= 'product_recommender_detail';
			$data['filez']     	= 'product_recommender';
			$data['functionz'] 	= 'product_recommender';
			$data['id']        	= $id;
			$data['product'] 	= GetAll('product')->result_array();
			if($id) {
				$q = GetAll("product_recommender", array("id"=> "where/".$id))->result_array()[0];
				$data['labelz'] = 'Update Product Recommender';
				$data['val'] 	= $q;
			} else {
				$data['labelz'] = 'Insert a New Product Recommender';
				$data['val'] 	= array();
			}
		$this->load->view('template', $data);
	}
  
	function product_recommender_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
unset($post['id']);
		$get_produk	= GetAll('product',array('id' => 'where/'.$post['id_product']))->row_array();	
		$post['product']		= isset($get_produk['title']) ? $get_produk['title'] : '';
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		
		$cek_id = GetValue("id","product_recommender",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("product_recommender", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] 	= $admin_id;
			$post['modify_date']    	= date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("product_recommender", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('product_recommender'));
	}

	function product_recommender_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("product_recommender", array("is_delete"=> 1));
			}
		}
	}
	
}
