<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
	
	function main()
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'promo';
    $data['filez'] = 'promo';
    $data['functionz'] = 'promo';
    $data['labelz'] = 'Ruang Promo';
    $this->load->view('template', $data);
	}
	
	function promo_new()
	{
		permission();
    $data = array();
    $data['filez'] = 'promo';
    $data['functionz'] = 'promo';
    $data['labelz'] = 'Ruang Promo';
    $this->load->view('promo_new', $data);
	}
	
	function promo_list($trash=0)
  {
  	ini_set('memory_limit', -1);
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
		
		$query_no_limit = "SELECT * FROM kg_promo WHERE id_media_cat=1 AND is_delete=0 AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM kg_promo WHERE id_media_cat=1 AND is_delete=0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	//$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $check = "<a href='".site_url('promo/promo_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  $check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  $publish = $r['is_publish'] ? "Published" : "Draft";
		  $featured = $r['is_featured'] ? "Yes (".$r['is_featured'].")" : "No";
		  $data[] = array($no, $r['title'], $r['publish_date'], $publish, $check);
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
  
  function promo_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'promo_detail';
    $data['filez'] = 'promo';
    $data['functionz'] = 'promo';
    $data['labelz'] = 'Ruang Promo';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("promo", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function promo_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("promo", array("is_delete"=> 1));
				//lastq();
			}
		}
	}
  
  function promo_add()
  {
  	ini_set('memory_limit', -1);
		$admin_id = permission();
		$post = $param = $this->input->post();
		unset($post['id']);
    $post['slug']           = url_title($post['title']);
    $post['modify_user_id'] = $admin_id;
    $post['modify_date']    = date("Y-m-d H:i:s");
    $post['id_media_cat']=1;
    if (!isset($post['is_publish'])) $post['is_publish']   = 0;
    if (!isset($post['is_featured'])) $post['is_featured'] = 0;
		if(!isset($post['is_delete'])) $post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","promo",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		
	// upload file
	$config ['upload_path']   = '../uploads/promo';
	$config ['allowed_types'] = 'jpg|png|jpeg';
	$config ['max_size']      = 50000;
	#$config['max_width']     = 1024;
	#$config['max_height']    = 768;
	$this->load->library('upload', $config);
	// end
	
	$cek_id = GetValue("id","promo",array("id"=> "where/".$param['id']));
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
		if($this->db->insert("promo", $post)) $this->session->set_flashdata("message", "success-Add Success");
    	else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
		$record = GetAll('promo',array('id'=>'where/'.$cek_id))->row_array();
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
    	$post['modify_user_id'] 	= $admin_id;
    	$post['modify_date']    	= date("Y-m-d H:i:s");
		$this->db->where("id", $param['id']);
    	if($this->db->update("promo", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    redirect(site_url('promo'));
  }
  
  function promo_import($survei_id=NULL)
  {
  	ini_set("memory_limit", -1);
		set_time_limit(0);
    $idz=permission();
    $data = GetHeaderFooter();
    $data['main'] = 'promo_import';
    $data['labelz'] = 'Import Ruang Promo';
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
						$upd['id_promo_cat'] = $exl->getCell('B'.$b)->getValue();
						$upd['title'] = $exl->getCell('C'.$b)->getValue();
						if($upd['id_promo_cat'] && $upd['title']) {
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
							$cek = GetValue("id","promo",array("id_promo_cat"=> "where/".$upd['id_promo_cat'], "title"=> "where/".$upd['title']));
							//print_mz($upd);
							if($cek) {
								$this->db->where("id", $cek);
								$this->db->update("promo", $upd);
							} else $this->db->insert("promo", $upd);
						}
					}
					if($jum) $xls = $jum." Ruang Promo berhasil di Import";
					else $xls = "Tidak ada Ruang Promo yang di Import";
				}
			}
    }
    $data['msg'] = $xls;
    $this->load->view('template', $data);
  }
}
