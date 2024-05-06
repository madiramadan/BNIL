<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csr extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'csr';
    $data['filez'] = 'csr';
    $data['functionz'] = 'csr';
    $data['labelz'] = 'CSR';
    $this->load->view('template', $data);
	}
	
	function csr_new()
	{
		permission();
    $data = array();
    $data['filez'] = 'csr';
    $data['functionz'] = 'csr';
    $data['labelz'] = 'CSR';
    $this->load->view('csr_new', $data);
	}
	
	function csr_list($trash=0)
  {
  	ini_set('memory_limit', -1);
  	$cat = GetOptMediaCat();
  	$where="1=1";
  	$kolom = array("","title","publish_date","is_publish","urutan");
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
		
		$query_no_limit = "SELECT * FROM kg_csr WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_csr WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('csr/csr_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $publish = $r['is_publish'] ? "Published" : "Draft";
		  $cat = $r['csr_cat']=="gambar" ? "Image" : "Video";
		  $data[] = array($no, $r['title'], $cat, $r['publish_date'], $publish, $check);
	  }
	  
	  $output = array(
	                  "draw" => $_POST['draw'],
	                  "recordsTotal" => $this->db->query($query_no_limit)->num_rows(),
	                  "recordsFiltered" => $this->db->query($query_no_limit)->num_rows(),
	                  "data" => $data
	                 );
	  //output to json format
	  echo json_encode($output);
  }
  
  function csr_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'csr_detail';
    $data['filez'] = 'csr';
    $data['functionz'] = 'csr';
    $data['labelz'] = 'CSR';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("csr", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function csr_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("csr", array("is_delete"=> 1));
			}
		}
	}
  
  function csr_add()
  {
  	ini_set('memory_limit', -1);
		$admin_id = permission();
		$post=$param= $this->input->post();
		unset($post['id']);
	  $post['slug']           = url_title($post['title']);
    $post['modify_user_id'] = $admin_id;
    $post['modify_date']    = date("Y-m-d H:i:s");
    if (!isset($post['is_publish'])) $post['is_publish']   = 0;
    if (!isset($post['is_featured'])) $post['is_featured'] = 0;
    if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","csr",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
	
		// upload file
		$config ['upload_path']   = '../uploads/csr';
		$config ['allowed_types'] = 'jpg|png|jpeg';
		$config ['max_size']      = 50000;
		//$config['width']     = 800;
		//$config['height']    = 800;
		$this->load->library('upload', $config);
		$this->load->library('image_lib');
		// end
	
	$cek_id = GetValue("id","csr",array("id"=> "where/".$param['id']));
	if(!$cek_id) {
		if (!$this->upload->do_upload('image')){
			$post['image'] = "";
		} else {
			$image = $this->upload->data();
			$post['image'] = $image['file_name'];
			//Resize
			$file_up = $_FILES['image']['name'];
			$up_file = '../uploads/csr/'.$post['image'];
			$configz['image_library'] = 'gd2';
			$configz['source_image'] = $up_file;
			$configz['dest_image'] = '../uploads/csr';
			$configz['create_thumb'] = TRUE;
			$configz['maintain_ratio'] = TRUE; //Width=Height
			$configz['height'] = 800;
			$configz['width'] = 800;
			$this->image_lib->initialize($configz);
			if(!$this->image_lib->resize()) {
				print_mz($this->image_lib->display_errors());
			}
		}
		if (!$this->upload->do_upload('image_mobile')){
			$post['image_mobile'] = "";
		} else {
			$image_mobile 			= $this->upload->data();
			$post['image_mobile'] 	= $image_mobile['file_name'];
			//Resize
			$file_up = $_FILES['image']['name'];
			$up_file = '../uploads/csr/'.$post['image_mobile'];
			$configz['image_library'] = 'gd2';
			$configz['source_image'] = $up_file;
			$configz['dest_image'] = '../uploads/csr';
			$configz['create_thumb'] = TRUE;
			$configz['maintain_ratio'] = TRUE; //Width=Height
			$configz['height'] = 300;
			$configz['width'] = 300;
			$this->image_lib->initialize($configz);
			$this->image_lib->resize();
		}
    	$post['create_user_id'] = $admin_id;
    	$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
		if($this->db->insert("csr", $post)) $this->session->set_flashdata("message", "success-Add Success");
  	else $this->session->set_flashdata("message", "danger-Add Failed");
  } else {
		$record = GetAll('csr',array('id'=>'where/'.$cek_id))->row_array();
		if (!$this->upload->do_upload('image')){
			$post['image'] 	= $record['image'];
		} else {
			$image = $this->upload->data();
			$post['image'] 	= $image['file_name'];
			//print_mz($this->image_lib->display_errors());
		}
		if (!$this->upload->do_upload('image_mobile')){
			$post['image_mobile'] 	= $record['image_mobile'];
		} else {
			$image_mobile 			= $this->upload->data();
			$post['image_mobile'] 	= $image_mobile['file_name'];
		}
    	$post['modify_user_id'] 	= $admin_id;
    	$post['modify_date']    	= date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
    	if($this->db->update("csr", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    
    //Crop
		$file_up = $_FILES['image']['name'];
		$file_up_mobile = $_FILES['image_mobile']['name'];
		if($file_up) {
			$up_file = '../uploads/csr/'.$post['image'];
			$configz['image_library'] = 'gd2';
			$configz['source_image'] = $up_file;
			$configz['dest_image'] = '../uploads/csr';
			$configz['create_thumb'] = TRUE;
			$configz['maintain_ratio'] = FALSE; //Width=Height
			$imageSize = $this->image_lib->get_image_properties($configz['source_image'], TRUE);
			$newSize = $imageSize['width'] > $imageSize['height'] ? $imageSize['height'] : $imageSize['width'];
	    $configz['width'] = $newSize;
	    $configz['height'] = $newSize;
	    $configz['y_axis'] = ($imageSize['height'] - $newSize) / 2;
	    $configz['x_axis'] = ($imageSize['width'] - $newSize) / 2;
	    $this->image_lib->initialize($configz);
			$this->image_lib->crop();
		}
		if($file_up_mobile) {
			$up_file = '../uploads/csr/'.$post['image_mobile'];
			$configz['image_library'] = 'gd2';
			$configz['source_image'] = $up_file;
			$configz['dest_image'] = '../uploads/csr';
			$configz['create_thumb'] = TRUE;
			$configz['maintain_ratio'] = FALSE; //Width=Height
			$imageSize = $this->image_lib->get_image_properties($configz['source_image'], TRUE);
			$newSize = $imageSize['width'] > $imageSize['height'] ? $imageSize['height'] : $imageSize['width'];
	    $configz['width'] = $newSize;
	    $configz['height'] = $newSize;
	    $configz['y_axis'] = ($imageSize['height'] - $newSize) / 2;
	    $configz['x_axis'] = ($imageSize['width'] - $newSize) / 2;
	    $this->image_lib->initialize($configz);
			$this->image_lib->crop();
		}
    redirect(site_url('csr'));
  }
}
