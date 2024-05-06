<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main']      = 'product';
		$data['filez']     = 'product';
		$data['functionz'] = 'product';
		$data['labelz']    = 'Product';
		$this->load->view('template', $data);
	}
	
	function product_new()
	{
		permission();
		$data = array();
		$data['filez']     = 'product';
		$data['functionz'] = 'product';
		$data['labelz']    = 'Product';
		$this->load->view('product_new', $data);
	}
	
	function product_list($trash=0)
	{
		ini_set('memory_limit', -1);
		// $cat   = GetOptProductCat();
		$where = "1=1";
		$kolom = array("","title","category","lifestage","publish_date","is_publish");
		if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
		else $ord = " publish_date desc ";
			
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
		
		$query_no_limit = "SELECT * FROM kg_product WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_product WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list = $this->db->query($query);
		$data = array();
		$no = $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
			$check 	= "<a href='".site_url('product/unggulan/'.$r['id'])."'>Keunggulan</a>&nbsp;|&nbsp;";
			$check 	.= "<a href='".site_url('product/manfaat/'.$r['id'])."'>Manfaat</a>&nbsp;|&nbsp;";
			$check 	.= "<a href='".site_url('product/syarat/'.$r['id'])."'>Syarat</a><br>";
			$check 	.= "&nbsp;&nbsp;<a href='".site_url('product/product_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$publish 	= $r['is_publish'] ? "Published" : "Draft";
			// $data[] 	= array($no, $r['title'], $cat[$r['id_product_cat']], $r['publish_date'], $publish, $check);
			$data[] 	= array($no, $r['title'], $r['category'], $r['lifestage'], $r['publish_date'], $publish, $check);
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
  
  	function product_detail($id=0)
	{
		permission();
		$data  = GetHeaderFooter();
		$data['main']      	= 'product_detail';
		$data['filez']     	= 'product';
		$data['functionz'] 	= 'product';
		$data['id']        	= $id;
		$opt_cat = array();
		$q = GetAll("product_cat", array("id_parent"=> "where/0"));
		foreach($q->result_array() as $r) {
			$opt_cat[] = $r;
			$qq = GetAll("product_cat", array("id_parent"=> "where/".$r['id']));
			foreach($qq->result_array() as $rr) {
				$opt_cat[] = $rr;
			}
		}
		//print_mz($opt_cat);
		$data['category']	= $opt_cat;
		$data['lifestage']	= GetAll('lifestage')->result_array();
		if($id) {
			$q = GetAll("product", array("id"=> "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Product';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Product';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function product_add()
	{
		ini_set("memory_limit", -1);
		set_time_limit(0);
		$admin_id = permission();
		$post=$param= $this->input->post();
		unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");

		if(!isset($post['is_publish'])) $post['is_publish'] = 0;
		if(!isset($post['is_champions'])) $post['is_champions'] = 0;
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","product",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		
		$cat_id=$cat=$life_id=$life=array();
		foreach($post['id_category'] as $idc) {
			$cat_id[] = "-".$idc."-";
			$cat[] = GetValue('title','product_cat',array('id' => 'where/'.$idc));
			//$post['category'] 	= isset($category['title']) ? $category['parent'].' > '.$category['title'] : '';
		}
		$post['id_category'] = join(",",$cat_id);
		$post['category'] = join(",",$cat);
		foreach($post['id_lifestage'] as $idl) {
			$life_id[] = "-".$idl."-";
			$life[] = GetValue('title','lifestage',array('id' => 'where/'.$idl));
			//$post['category'] 	= isset($category['title']) ? $category['parent'].' > '.$category['title'] : '';
		}
		$post['id_lifestage'] = join(",",$life_id);
		$post['lifestage'] = join(",",$life);
		//print_mz($post);
		// upload file
		$config['upload_path']          = '../uploads/product';
		$config['allowed_types']        = 'jpg|png|jpeg|pdf';
		$config['max_size']             = 500000;
		#$config['max_width']            = 1024;
		#$config['max_height']           = 768;
		$this->load->library('upload', $config);
		// end
		
		$cek_id = GetValue("id","product",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			if (!$this->upload->do_upload('image')){
				$post['image'] = "";
			} else {
				$image = $this->upload->data();
				$post['image'] = $image['file_name'];
			}
			if (!$this->upload->do_upload('image_mobile')){
				$post['image'] = "";
			} else {
				$image_mobile 			= $this->upload->data();
				$post['image_mobile'] 	= $image_mobile['file_name'];
			}
			if (!$this->upload->do_upload('brosur')){
				$post['brosur'] = "";
			} else {
				$brosur = $this->upload->data();
				$post['brosur'] = $brosur['file_name'];
			}
			if (!$this->upload->do_upload('riplay')){
				$post['title_image_mobile'] = "";
			} else {
				$riplay = $this->upload->data();
				$post['title_image_mobile'] = $riplay['file_name'];
			}
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
            $post['modify_user_id'] = $admin_id;
            $post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("product", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$record = GetAll('product',array('id'=>'where/'.$cek_id))->row_array();
			if (!$this->upload->do_upload('image')){
				$post['image'] 	= $record['image'];
			} else {
				$image = $this->upload->data();
				$post['image'] 	= $image['file_name'];
			}
			if (!$this->upload->do_upload('image_mobile')){
				$post['image_mobile'] 	= $record['image_mobile'];
			} else {
				$image_mobile 			= $this->upload->data();
				$post['image_mobile'] 	= $image_mobile['file_name'];
			}
			if (!$this->upload->do_upload('brosur')){
				$post['brosur'] 	= $record['brosur'];
			} else {
				$brosur 			= $this->upload->data();
				$post['brosur'] 	= $brosur['file_name'];
			}	
			if (!$this->upload->do_upload('riplay')){
				$post['title_image_mobile'] 	= $record['title_image_mobile'];
			} else {
				$riplay 			= $this->upload->data();
				$post['title_image_mobile'] 	= $riplay['file_name'];
			}	
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("product", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('product'));
	}

	function product_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("product", array("is_delete"=> 1));
			}
		}
	}
  
	function product_import($survei_id=NULL)
	{
		ini_set("memory_limit", -1);
		set_time_limit(0);
		$idz  = permission();
		$data = GetHeaderFooter();
		$data['main']   = 'product_import';
		$data['labelz'] = 'Import Product';
		$xls = ""; $i=0;
		$key = "file";
		if(isset($_FILES[$key]['name'])) {
			$file_up = $_FILES[$key]['name'];
			$type_file = substr($file_up,-3);							
				$myfile_up	= $_FILES[$key]['tmp_name'];
				$ukuranfile_up = $_FILES[$key]['size'];
				$up_file = "../uploads/".date("YmdHis")."_".$file_up;
				if($_FILES[$key]['name']) {
					if(copy($myfile_up, $up_file)) {
						$this->load->library('excel');
						$objPHPExcel = PHPExcel_IOFactory::load($up_file);
						$log=array();
						$objPHPExcel->setActiveSheetIndex(0);
						$exl = $objPHPExcel->getActiveSheet();
						$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();
						$kar=$row=$head=array();
						$jum=0;$temp_area="";
						for($b=2;$b<=$highestRow;$b++){
							$upd['id_product_cat'] = $exl->getCell('B'.$b)->getValue();
							$upd['title'] = $exl->getCell('C'.$b)->getValue();
							if($upd['id_product_cat'] && $upd['title']) {
								$jum++;
								$upd['title_eng'] = $exl->getCell('D'.$b)->getValue();
								$upd['headline'] = $exl->getCell('E'.$b)->getValue();
								$upd['headline_eng'] = $exl->getCell('F'.$b)->getValue();
								$upd['contents'] = $exl->getCell('G'.$b)->getValue();
								$upd['contents_eng'] = $exl->getCell('H'.$b)->getValue();
								$upd['seo_title'] = $exl->getCell('I'.$b)->getValue();
								$upd['seo_title_eng'] = $exl->getCell('J'.$b)->getValue();
								$upd['seo_desc'] = $exl->getCell('K'.$b)->getValue();
								$upd['seo_desc_eng'] = $exl->getCell('L'.$b)->getValue();
								$upd['publish_date'] = $exl->getCell('M'.$b)->getValue();
								$upd['file'] = $exl->getCell('N'.$b)->getValue();
								$upd['file_mobile'] = $exl->getCell('O'.$b)->getValue();
								$upd['create_date'] = date("Y-m-d H:i:s");
								$upd['create_user_id'] = $idz;
								$cek = GetValue("id","product",array("id_product_cat"=> "where/".$upd['id_product_cat'], "title"=> "where/".$upd['title']));
								//print_mz($upd);
								if($cek) {
									$this->db->where("id", $cek);
									$this->db->update("product", $upd);
								} else $this->db->insert("product", $upd);
							}
						}
						if($jum) $xls = $jum." Product berhasil di Import";
						else $xls = "Tidak ada Product yang di Import";
					}
				}
		}
		$data['msg'] = $xls;
		$this->load->view('template', $data);
	}
  
  	function product_cat()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main']      = 'product_cat';
		$data['filez']     = 'product';
		$data['functionz'] = 'product_cat';
		$data['labelz']    = 'Product Category';
		$this->load->view('template', $data);
	}
  
	function product_cat_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where="1=1";
		$kolom = array("","title_eng","parent_eng","is_publish");
		if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
		else $ord = "id asc";
			
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
		
		$query_no_limit = "SELECT * FROM kg_product_cat WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query          = "SELECT * FROM kg_product_cat WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list = $this->db->query($query);
		$data = array();
		$no   = $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
			$check 	= "<a href='".site_url('product/product_cat_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$strip  = !($r['id_parent']) ? '' : '- ';
			$publis = $r['is_publish'] ? 'Published' : 'Draft';
			$data[] = array($no, $strip.$r['title_eng'], $r['parent_eng'], $publis, $check);
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
  
  	function product_cat_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main']      = 'product_cat_detail';
		$data['filez']     = 'product';
		$data['functionz'] = 'product_cat';
		$data['labelz']    = 'Product Category';
		$data['id']        = $id;
		$data['category']  = GetAll('product_cat',array(
			'id_parent' 	=> 'where/0',
			'is_publish' 	=> 'where/1'
		))->result_array();
		if($id) {
			$q = GetAll("product_cat", array("id"=> "where/".$id))->result_array()[0];
			$data['val'] = $q;
		} else $data['val'] = array();
		$this->load->view('template', $data);
	}

	function product_cat_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
		unset($post['id']);
		$id_parent 	= !empty($post['id_parent']) ? $post['id_parent'] : 0;
		$get_cat  	= GetAll('product_cat',array('id' => 'where/'.$id_parent))->row_array();
		$post['parent'] 	= isset($get_cat['title']) ? $get_cat['title'] : '';
		$post['parent_eng'] = isset($get_cat['title_eng']) ? $get_cat['title_eng'] : '';
		if(!isset($post['is_publish'])) $post['is_publish'] = 0;
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","product_cat",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		
		// upload file
		$config['upload_path']          = '../uploads/product_cat';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 50000;
		#$config['max_width']            = 1024;
		#$config['max_height']           = 768;
		$this->load->library('upload', $config);
		// end
		
		$cek_id = GetValue("id","product_cat",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			if (!$this->upload->do_upload('image')){
				$post['image'] = "";
			} else {
				$image = $this->upload->data();
				$post['image'] = $image['file_name'];
			}
			if (!$this->upload->do_upload('image_mobile')){
				$post['image_mobile'] = "";
			} else {
				$image_mobile 			= $this->upload->data();
				$post['image_mobile'] 	= $image_mobile['file_name'];
			}
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
			$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("product_cat", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$record = GetAll('product_cat',array('id'=>'where/'.$cek_id))->row_array();
			if (!$this->upload->do_upload('image')){
				$post['image'] 	= $record['image'];
			} else {
				$image = $this->upload->data();
				$post['image'] 	= $image['file_name'];
			}
			if (!$this->upload->do_upload('image_mobile')){
				$post['image_mobile'] 	= $record['image_mobile'];
			} else {
				$image_mobile 			= $this->upload->data();
				$post['image_mobile'] 	= $image_mobile['file_name'];
			}
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("product_cat", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('product/product_cat'));
	}
	
	function product_cat_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("product_cat", array("is_delete"=> 1));

				$this->db->where("id_parent", $idz);
				$this->db->update("product_cat", array("is_delete"=> 1));
			}
		}
	}

	function lifestage()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main']      = 'lifestage';
		$data['filez']     = 'product';
		$data['functionz'] = 'lifestage';
		$data['labelz']    = 'Product Lifestage';
		$this->load->view('template', $data);
	}
  
	function lifestage_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where="1=1";
		$kolom = array("","title_eng","parent_eng","is_publish");
		if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
		else $ord = "id asc";
			
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
		
		$query_no_limit = "SELECT * FROM kg_lifestage WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query          = "SELECT * FROM kg_lifestage WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list = $this->db->query($query);
		$data = array();
		$no   = $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
			$check 	= "<a href='".site_url('product/lifestage_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$strip  = !($r['id_parent']) ? '' : '- ';
			$publis = $r['is_publish'] ? 'Published' : 'Draft';
			$data[] = array($no, $strip.$r['title'], $r['title'], $publis, $check);
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

	function lifestage_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main']      = 'lifestage_detail';
		$data['filez']     = 'product';
		$data['functionz'] = 'lifestage';
		$data['labelz']    = 'Product Category';
		$data['id']        = $id;
		$data['category']  = GetAll('lifestage',array(
			'id_parent' 	=> 'where/0',
			'is_publish' 	=> 'where/1'
		))->result_array();
		if($id) {
			$q = GetAll("lifestage", array("id"=> "where/".$id))->result_array()[0];
			$data['val'] = $q;
		} else $data['val'] = array();
		$this->load->view('template', $data);
	}

	function lifestage_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
		unset($post['id']);
		$id_parent 	= !empty($post['id_parent']) ? $post['id_parent'] : 0;
		$get_cat  	= GetAll('lifestage',array('id' => 'where/'.$id_parent))->row_array();
		$post['parent'] 	= isset($get_cat['title']) ? $get_cat['title'] : '';
		$post['parent_eng'] = isset($get_cat['title_eng']) ? $get_cat['title_eng'] : '';
		if(!isset($post['is_publish'])) $post['is_publish'] = 0;
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			//$post['id'] = GetValue("id","lifestage",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		$post['image_mobile'] = "";
		
		// upload file
		$config['upload_path']          = '../uploads/lifestage';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 50000;
		#$config['max_width']            = 1024;
		#$config['max_height']           = 768;
		$this->load->library('upload', $config);
		// end
		
		$cek_id = GetValue("id","lifestage",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			if (!$this->upload->do_upload('image')){
				$post['image'] = "";
			} else {
				$image = $this->upload->data();
				$post['image'] = $image['file_name'];
			}
			if (!$this->upload->do_upload('image_mobile')){
				$post['image'] = "";
			} else {
				$image_mobile 			= $this->upload->data();
				$post['image_mobile'] 	= $image_mobile['file_name'];
			}
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
			$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("lifestage", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$record = GetAll('lifestage',array('id'=>'where/'.$cek_id))->row_array();
			if (!$this->upload->do_upload('image')){
				$post['image'] 	= $record['image'];
			} else {
				$image = $this->upload->data();
				$post['image'] 	= $image['file_name'];
			}
			if (!$this->upload->do_upload('image_mobile')){
				$post['image_mobile'] 	= $record['image_mobile'];
			} else {
				$image_mobile 			= $this->upload->data();
				$post['image_mobile'] 	= $image_mobile['file_name'];
			}
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("lifestage", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('product/lifestage'));
	}
	
	function lifestage_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("lifestage", array("is_delete"=> 1));

				$this->db->where("id_parent", $idz);
				$this->db->update("lifestage", array("is_delete"=> 1));
			}
		}
	}
	
	function unggulan($id_product=0)
	{
		permission();
		$data 	= GetHeaderFooter();
		$record = GetAll('product', array('id'=>'where/'.$id_product))->result_array()[0];
		$data['main'] 		= 'product_unggulan';
		$data['filez'] 		= 'product';
		$data['functionz'] 	= 'unggulan';
		$data['labelz'] 	= '<a href="'.site_url('product').'">Product</a> | KEUNGGULAN '.$record['title'];
		$data['id_product'] 	= $id_product;
		$this->load->view('template', $data);
	}

	function unggulan_list($id_product=0){
		ini_set('memory_limit', -1);
		$where  = '1=1 AND id_product = '.$id_product;
		$kolom  = array("","title");
		if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
		else $ord = "publish_date desc";
			
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
			
		$query_no_limit = "SELECT * FROM kg_product_unggulan WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_product_unggulan WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 	= "<a href='".site_url('product/unggulan_form/'.$id_product.'/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href='javascript:;'><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] = array($no, $r['title'], $check);
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

	function unggulan_form($id_product=0,$id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'product_unggulan_form';
		$data['filez'] 		= 'product';
		$data['functionz'] 	= 'unggulan_form';
		$data['id_product'] 	= $id_product;
		$data['id'] 		= $id;
		$get_product 			= GetAll('product',array('id'=>'where/'.$id_product))->result_array()[0];
		if($id) {
			$q = GetAll("product_unggulan", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Keunggulan '.$get_product['title'];
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert Keunggulan '.$get_product['title'];
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}

	function unggulan_form_save(){
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
		unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		if(!$param['id']) {
			$post['id'] = GetValue("id","product_unggulan",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		if(!$post['is_publish']) $post['is_publish']=0;
		$post['seo']=$post['seo_eng']=$post['seo_description']=$post['seo_description_eng']="";
		$post['image']=$post['title_image']=$post['image_mobile']=$post['title_image_mobile']="";
		$post['slug'] = url_title($post['title']);
		$post['slug_eng'] = url_title($post['title_eng']);
		$cek_id = GetValue("id","product_unggulan",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['is_delete'] = 0;
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
			$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("product_unggulan", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("product_unggulan", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('product/unggulan/'.$post['id_product']));
	}

	function unggulan_aktif($id_product=0)
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$where = array(
					'id' 		=> $idz,
					'id_product' 	=> $id_product
				);
				$this->db->where($where);
				$this->db->update("product_unggulan", array('is_delete' => 1));
			}
		}
	}
	
	function manfaat($id_product=0)
	{
		permission();
		$data 	= GetHeaderFooter();
		$record = GetAll('product', array('id'=>'where/'.$id_product))->result_array()[0];
		$data['main'] 		= 'product_manfaat';
		$data['filez'] 		= 'product';
		$data['functionz'] 	= 'manfaat';
		$data['labelz'] 	= '<a href="'.site_url('product').'">Product</a> | MANFAAT '.$record['title'];
		$data['id_product'] 	= $id_product;
		$this->load->view('template', $data);
	}

	function manfaat_list($id_product=0){
		ini_set('memory_limit', -1);
		$where  = '1=1 AND id_product = '.$id_product;
		$kolom  = array("","title");
		if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
		else $ord = "publish_date desc";
			
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
			
		$query_no_limit = "SELECT * FROM kg_product_manfaat WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_product_manfaat WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 	= "<a href='".site_url('product/manfaat_form/'.$id_product.'/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href='javascript:;'><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] = array($no, $r['title'], $check);
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

	function manfaat_form($id_product=0,$id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'product_manfaat_form';
		$data['filez'] 		= 'product';
		$data['functionz'] 	= 'manfaat_form';
		$data['id_product'] 	= $id_product;
		$data['id'] 		= $id;
		$get_product 			= GetAll('product',array('id'=>'where/'.$id_product))->result_array()[0];
		if($id) {
			$q = GetAll("product_manfaat", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Manfaat '.$get_product['title'];
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert Manfaat '.$get_product['title'];
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}

	function manfaat_form_save(){
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
		unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		if(!$param['id']) {
			$post['id'] = GetValue("id","product_manfaat",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		if(!$post['is_publish']) $post['is_publish']=0;
		$post['seo']=$post['seo_eng']=$post['seo_description']=$post['seo_description_eng']="";
		$post['image']=$post['title_image']=$post['image_mobile']=$post['title_image_mobile']="";
		$post['slug'] = url_title($post['title']);
		$post['slug_eng'] = url_title($post['title_eng']);
		$cek_id = GetValue("id","product_manfaat",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['is_delete'] = 0;
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
			$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("product_manfaat", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("product_manfaat", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('product/manfaat/'.$post['id_product']));
	}

	function manfaat_aktif($id_product=0)
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$where = array(
					'id' 		=> $idz,
					'id_product' 	=> $id_product
				);
				$this->db->where($where);
				$this->db->update("product_manfaat", array('is_delete' => 1));
			}
		}
	}
	
	function syarat($id_product=0)
	{
		permission();
		$data 	= GetHeaderFooter();
		$record = GetAll('product', array('id'=>'where/'.$id_product))->result_array()[0];
		$data['main'] 		= 'product_syarat';
		$data['filez'] 		= 'product';
		$data['functionz'] 	= 'syarat';
		$data['labelz'] 	= '<a href="'.site_url('product').'">Product</a> | SYARAT '.$record['title'];
		$data['id_product'] 	= $id_product;
		$this->load->view('template', $data);
	}

	function syarat_list($id_product=0){
		ini_set('memory_limit', -1);
		$where  = '1=1 AND id_product = '.$id_product;
		$kolom  = array("","title");
		if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
		else $ord = "publish_date desc";
			
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
			
		$query_no_limit = "SELECT * FROM kg_product_syarat WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_product_syarat WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 	= "<a href='".site_url('product/syarat_form/'.$id_product.'/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	.= "&nbsp;&nbsp;<a href='javascript:;'><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] = array($no, $r['title'], $check);
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

	function syarat_form($id_product=0,$id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'product_syarat_form';
		$data['filez'] 		= 'product';
		$data['functionz'] 	= 'syarat_form';
		$data['id_product'] 	= $id_product;
		$data['id'] 		= $id;
		$get_product 			= GetAll('product',array('id'=>'where/'.$id_product))->result_array()[0];
		if($id) {
			$q = GetAll("product_syarat", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Syarat '.$get_product['title'];
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert Syarat '.$get_product['title'];
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}

	function syarat_form_save(){
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
		unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		if(!$param['id']) {
			$post['id'] = GetValue("id","product_syarat",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		if(!$post['is_publish']) $post['is_publish']=0;
		$post['seo']=$post['seo_eng']=$post['seo_description']=$post['seo_description_eng']="";
		$post['image']=$post['title_image']=$post['image_mobile']=$post['title_image_mobile']="";
		$post['slug'] = url_title($post['title']);
		$post['slug_eng'] = url_title($post['title_eng']);
		$cek_id = GetValue("id","product_syarat",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['is_delete'] = 0;
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
			$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("product_syarat", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("product_syarat", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('product/syarat/'.$post['id_product']));
	}

	function syarat_aktif($id_product=0)
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$where = array(
					'id' 		=> $idz,
					'id_product' 	=> $id_product
				);
				$this->db->where($where);
				$this->db->update("product_syarat", array('is_delete' => 1));
			}
		}
	}
	function deletebrosur(){
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$upd=$this->db->update('kg_product',array('brosur'=>NULL));
		if($upd) echo 'ok';
		else echo "nok";
	}
	
  
}
