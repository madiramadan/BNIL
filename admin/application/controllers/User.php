<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
  
	public function main($trash=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'user';
    $data['trash'] = $trash;
    $this->load->view('template', $data);
	}
    
  function user_list($trash=0,$tahun="")
  {
  	ini_set('memory_limit', -1);
  	if(!$tahun) {
  		if($this->session->userdata("c_tahun")) $tahun = $this->session->userdata("c_tahun");
  		else $tahun=date("Y");
  	}
  	$this->session->set_userdata("c_tahun",$tahun);
  	$opt_grup=GetOptGrup();
  	$where="1=1";
  	$kolom = array("","nama","email","hp","create_date");
  	if(isset($_POST['order'][0]['column'])) $ord = $kolom[$_POST['order'][0]['column']]." ".$_POST['order'][0]['dir'];
  	else $ord = " id desc ";
		
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
		
		$query_no_limit = "SELECT * FROM idn_member WHERE create_date like '%".$tahun."%' AND is_delete=".$trash." AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM idn_member WHERE create_date like '%".$tahun."%' AND is_delete=".$trash." AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
		  $aktif = $r['is_active'] ? "Aktif" : "Belum";
		  if($trash) {
		  	$check = "<a href=''><i class='akt icon icon-restore' rel='".$r['id']."' zz='3'></i></a>";
		  	$check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='4'></i></a>";
		  } else {
		  	$check = $r['is_active'] ? "<i class='akt icon icon-times-circle' rel='".$r['id']."' zz='1'></i>" : "<i class='akt icon icon-check-circle' rel='".$r['id']."' zz='0'></i>";
		  	$check .= $r['is_active'] ? "&nbsp;&nbsp;<i class='icon icon-envelope' style='color:#ccc !important;'></i>" : "&nbsp;&nbsp;<a href=''><i class='akt icon icon-envelope' rel='".$r['id']."' zz='5'></i></a>";
		  	//$check .= "&nbsp;&nbsp;<a href='".site_url('user/user_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  	$check .= "&nbsp;&nbsp;<a href='".site_url('user/user_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
		  }
		  $data[] = array($chk, $r['nama'], $r['email'], $r['hp'], FormatTanggalShort(substr($r['create_date'],0,10)), $aktif, $check);
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
  
  function user_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'user_detail';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("member", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
  
  function user_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==5) {
				$this->kirim_aktivasi($idz);
			} else if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("member", array("is_delete"=> 1));
			} else if($this->input->post("akt")==3) {
				$this->db->where("id", $idz);
				$this->db->update("member", array("is_delete"=> 0));
			} else if($this->input->post("akt")==4) {
				$q = GetAll("member", array("id"=> "where/".$idz))->result_array()[0];
	  		if($this->db->insert("member_delete", $q)) {
	  			$this->db->where("id", $idz);
	  			$this->db->delete("member");
	  		}
			} else {
				$akt = $this->input->post("akt")==1 ? 0 : 1;
				$this->db->where("id", $idz);
				$this->db->update("member", array("is_active"=> $akt));
			}
		}
	}
  
  function user_add()
  {
    $user_id=permission();
    $post = $param = $this->input->post();
unset($post['id']);
		$post['modify_date'] = date("Y-m-d H:i:s");
		if($post['password'] != $post['password_old']) $post['password'] = md5($post['password']);
		unset($post['password_old']);
		if(!$post['is_active']) $post['is_active']=0;
		if(!$param['id']) {
			$post['create_date'] = date("Y-m-d H:i:s");
$post['modify_user_id'] = $admin_id;
$post['modify_date'] = date("Y-m-d H:i:s");
    	if($this->db->insert("member", $post)) $this->session->set_flashdata("message", "success-Add Success");
    	else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
    	$this->db->where("id", $param['id']);
    	if($this->db->update("member", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    
    redirect(site_url('user/main'));
  }
  
  function user_hapus()
  {
  	$post = $this->input->post("chk");
  	foreach($post as $key=> $val) {
  		$this->db->where("id", $key);
			if($this->input->post("del_res")==1) $this->db->update("member", array("is_delete"=> 0));
			else $this->db->update("member", array("is_delete"=> 1));
  	}
  	
  	if($this->input->post("del_res")==1) redirect(site_url('user/main/1'));
  	else redirect(site_url('user/main'));
  }
  
  function user_hapus_permanen()
  {
  	$post = $this->input->post("chk");
  	foreach($post as $key=> $val) {
  		$q = GetAll("member", array("id"=> "where/".$key))->result_array()[0];
  		if($this->db->insert("member_delete", $q)) {
  			$this->db->where("id", $key);
  			$this->db->delete("member");
  		}
  	}
  	
  	redirect(site_url('user/main/1'));
  }
  
  function user_akt()
  {
  	$post = $this->input->post("chk");
  	foreach($post as $key=> $val) {
  		$this->db->where("id", $key);
			if($this->input->post("del_res")==1) $this->db->update("member", array("is_active"=> 0));
			else $this->db->update("member", array("is_active"=> 1));
  	}
  	
  	if($this->input->post("del_res")==1) redirect(site_url('user/main/1'));
  	else redirect(site_url('user/main'));
  }
	
	function kirim_aktivasi($idz)
	{
		if($idz) {
			$q = GetAll("member", array("id"=> "where/".$idz));
			if($q->num_rows() > 0) {
				foreach($q->result_array() as $r) {
					$nama = $r['nama'];
					$email = $r['email'];
					$code = randPassword().$idz;
					$pin = $r['code'];
					if(!$pin) {
						$pin = $this->randPIN();
						$this->db->where("id", $idz);
						$this->db->update("member", array("code"=> $pin));
					}
					$message = "Dear ".ucfirst($nama).",<br><br>
	Kamu hampir selesai. Mohon masukan kode angka di bawah untuk mengaktifkan akun kamu. Ketika akun kamu sudah aktif, kamu bisa masuk ke dalam akunmu.<br><br>
	<font size='6'><b>".$pin."</b></font><br><br>
	Silahkan klik link di bawah ini, atau salin dan tempel di browser kamu<br>
	<a href='".str_replace("admin/","",site_url('login/activation/'.$code))."'>".str_replace("admin/","",site_url('login/activation/'.$code))."</a><br><br>
	Dengan memastikan bahwa ini adalah akun kamu, seluruh informasi terkait Ideanation akan dikirim ke alamat e-mail ini.<br><br>
	Salam inovasi,<br>
	Tim Ideanation";
					//echo 
					KirimEmail('Verifikasi Email Anda', $email, $message);
				}
			}			
		}
	}
	
	function randPIN()
	{
		$pass = "";
		//Angka
		$angka = "1234567890";
		for($i=1;$i<=6;$i++) {
			$pass .= substr($angka,rand(0,9),1);
		}
		
		return $pass;
	}
}
