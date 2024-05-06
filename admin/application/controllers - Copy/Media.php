<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'media';
    $data['filez'] = 'media';
    $data['functionz'] = 'media';
    $data['labelz'] = 'Ruang Media';
    $this->load->view('template', $data);
	}
	
	function media_new()
	{
		permission();
    $data = array();
    $data['filez'] = 'media';
    $data['functionz'] = 'media';
    $data['labelz'] = 'Ruang Media';
    $this->load->view('media_new', $data);
	}
	
	function media_list($trash=0)
  {
  	ini_set('memory_limit', -1);
  	$cat = GetOptMediaCat();
  	$where=1;
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
		
		$query_no_limit = "SELECT * FROM kg_media WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_media WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('media/media_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $publish = $r['is_publish'] ? "Published" : "Draft";
		  $featured = $r['is_featured'] ? "Yes (".$r['is_featured'].")" : "No";
		  $data[] = array($no, $r['title'], $cat[$r['id_media_cat']], $r['publish_date'], $publish, $check);
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
  
  function media_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'media_detail';
    $data['filez'] = 'media';
    $data['functionz'] = 'media';
    $data['labelz'] = 'Ruang Media';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("media", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function media_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("media", array("is_delete"=> 1));
			}
		}
	}
  
  function media_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    $post = $this->input->post();
    $post['slug'] = url_title($post['title']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date'] = date("Y-m-d H:i:s");
		if(!isset($post['is_publish'])) $post['is_publish']=0;
		if(!isset($post['is_featured'])) $post['is_featured']=0;
		
		//File
		$flz = array("file","file_mobile");
		foreach($flz as $key) {
			$file_up = date("YmdHis").".".$_FILES[$key]['name'];
			$myfile_up	= $_FILES[$key]['tmp_name'];
			$ukuranfile_up = $_FILES[$key]['size'];
			$up_file = "../uploads/".$file_up;
			if($_FILES[$key]['name']) {
				//unlink("../uploads/".$file_up);
				if(copy($myfile_up, $up_file)) {
					$post[$key] = $file_up;
				}
			}
		}
		
		$cek_id = GetValue("id","media",array("id"=> "where/".$post['id']));
		if(!$cek_id) {
    	$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("media", $post)) $this->session->set_flashdata("message", "success-Add Success");
    	else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
    	$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			$this->db->where("id", $post['id']);
    	if($this->db->update("media", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    redirect(site_url('media'));
  }
  
  function media_import($survei_id=NULL)
  {
  	ini_set("memory_limit", -1);
		set_time_limit(0);
    $idz=permission();
    $data = GetHeaderFooter();
    $data['main'] = 'media_import';
    $data['labelz'] = 'Import Ruang Media';
    $xls = "";$i=0;
    $key="file";
    if(isset($_FILES[$key]['name'])) {
    	$file_up = $_FILES[$key]['name'];
    	$type_file = substr($file_up,-3);							
			$myfile_up	= $_FILES[$key]['tmp_name'];
			$ukuranfile_up = $_FILES[$key]['size'];
			$up_file = "./uploads/".date("YmdHis")."_".$file_up;
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
						$upd['id_media_cat'] = $exl->getCell('B'.$b)->getValue();
						$upd['title'] = $exl->getCell('C'.$b)->getValue();
						if($upd['id_media_cat'] && $upd['title']) {
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
							$cek = GetValue("id","media",array("id_media_cat"=> "where/".$upd['id_media_cat'], "title"=> "where/".$upd['title']));
							//print_mz($upd);
							if($cek) {
								$this->db->where("id", $cek);
								$this->db->update("media", $upd);
							} else $this->db->insert("media", $upd);
						}
					}
					if($jum) $xls = $jum." Ruang Media berhasil di Import";
					else $xls = "Tidak ada Ruang Media yang di Import";
				}
			}
    }
    $data['msg'] = $xls;
    $this->load->view('template', $data);
  }
  
  function media_cat()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'media_cat';
    $data['filez'] = 'media';
    $data['functionz'] = 'media_cat';
    $data['labelz'] = 'Ruang Media Category';
    $this->load->view('template', $data);
	}
  
  function media_cat_list($trash=0)
  {
  	ini_set('memory_limit', -1);
  	$where=1;
  	$kolom = array("","title");
  	if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
  	else $ord = " id asc ";
		
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
		
		$query_no_limit = "SELECT * FROM kg_media_cat WHERE is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_media_cat WHERE is_delete=0 AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('media/media_cat_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $data[] = array($no, $r['title'], $check);
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
  
  function media_cat_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'media_cat_detail';
    $data['filez'] = 'media';
    $data['functionz'] = 'media_cat';
    $data['labelz'] = 'Ruang Media Category';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("media_cat", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function media_cat_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("media_cat", array("is_delete"=> 1));
			}
		}
	}
  
  function media_cat_add()
  {
  	ini_set('memory_limit', -1);
    $admin_id=permission();
    $post = $this->input->post();
		if(!isset($post['is_publish'])) $post['is_publish']=0;
		
		$cek_id = GetValue("id","media_cat",array("id"=> "where/".$post['id']));
		if(!$cek_id) {
    	$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("media_cat", $post)) $this->session->set_flashdata("message", "success-Add Success");
    	else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
    	$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			$this->db->where("id", $post['id']);
    	if($this->db->update("media_cat", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    redirect(site_url('media/media_cat'));
  }
}
