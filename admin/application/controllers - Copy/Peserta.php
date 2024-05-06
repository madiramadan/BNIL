<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
  
	public function main($trash=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'peserta';
    $data['trash'] = $trash;
    $this->load->view('template', $data);
	}
    
  function peserta_list($trash=0,$id_lomba="")
  {
  	ini_set('memory_limit', -1);
  	if(!$id_lomba) {
  		if($this->session->userdata("c_agt")) $id_lomba = $this->session->userdata("c_agt");
  		else $id_lomba=1;
  	}
  	$this->session->set_userdata("c_agt",$id_lomba);
  	$opt_tim=$opt_kat=array();
  	$q=GetAll("peserta_lomba");
  	foreach($q->result_array() as $r) {
  		$opt_tim[$r['idea_unix']] = $r['nm_tim'];
  	}
  	$q=GetAll("lomba_kategori");
  	foreach($q->result_array() as $r) {
  		$opt_kat[$r['id']] = $r['title'];
  	}
  	$where=1;
  	$kolom = array("","nm_anggota","email","","ftprofil");
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
		
		$del = $trash ? "is_delete > 0" : "is_delete=0";
		$query_no_limit = "SELECT * FROM idn_peserta_lomba_member WHERE id_lomba='".$id_lomba."' AND ".$del." AND ".$where." ORDER BY ".$ord;
		$query = "SELECT * FROM idn_peserta_lomba_member WHERE id_lomba='".$id_lomba."' AND ".$del." AND ".$where." ORDER BY ".$ord." LIMIT ".$_POST['start'].",".$_POST['length'];
  	$list = $this->db->query($query);
  	$data = array();
	  $no = $_POST['start'];
	  foreach ($list->result_array() as $r) {
	  	$no++;
	  	$chk = "<input type='checkbox' value='1' name='chk[".$r['id']."]' class='chk'>";
	  	$lengkap = $r['ftprofil'] ? "Lengkap" : "Belum";
	  	$lead = $r['is_lead'] ? "(Leader)" : "";
		  if($trash) {
		  	$check = "<a href='#'><i class='akt icon icon-restore' rel='".$r['id']."' zz='3'></i></a>";
		  	$check .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='4'></i></a>";
		  } else {
		  	if($r['is_lead']==1) $check = "<a href='#'><i class='editagt icon icon-pencil' rel='".$r['idea_unix']."/".$r['id']."'></i></a>";
		  	else $check = "<a href='#'><i class='editagt icon icon-pencil' rel='".$r['idea_unix']."/".$r['id']."'></i></a>";
		  	//else $check = "<a href='#'><i class='editagt icon icon-pencil' rel='".$r['idea_unix']."/".$r['id']."'></i></a>&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
		  }
		  $data[] = array($chk, "<a href='".site_url('peserta/peserta_view/'.$r['id'])."'>".$r['nm_anggota']."</a> ".$lead, $r['email'], $opt_tim[$r['idea_unix']], $opt_kat[$r['id_kat_lomba']], $lengkap, $check);
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
  
  function peserta_detail($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'peserta_detail';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("peserta_lomba_member", array("id"=> "where/".$id))->result_array()[0];
    	$data['val'] = $q;
    } else $data['val'] = array();
    $this->load->view('template', $data);
	}
	
	function peserta_view($id=0)
	{
		permission();
    $data = GetHeaderFooter();
    $data['main'] = 'peserta_view';
    $data['id'] = $id;
    if($id) {
    	$q = GetAll("peserta_lomba_member", array("id"=> "where/".$id))->result_array()[0];
    	$data['idn'] = $q;
    } else redirect(site_url('peserta'));
    $this->load->view('template', $data);
	}
  
  function peserta_aktif()
	{
		$idz = $this->input->post("idz");
		$flag=1;
		if($idz) {
			$idea_unix = GetValue("idea_unix","peserta_lomba_member",array("id"=> "where/".$idz));
			//Cek Tim Apakah sudah dihapus apa belum
			$cek_tim = GetValue("is_delete","peserta_lomba",array("idea_unix"=> "where/".$idea_unix));				
			if($this->input->post("akt")==2) {
				if(!$cek_tim) {
					$this->db->where("id", $idz);
					$this->db->update("peserta_lomba_member", array("is_delete"=> 1));
					$jum_anggota = GetValue("jum_anggota", "peserta_lomba", array("idea_unix"=> "where/".$idea_unix));
					$this->db->where("idea_unix", $idea_unix);
					$this->db->update("peserta_lomba", array("jum_anggota"=> ($jum_anggota-1)));
				} else $flag=2;
			} else if($this->input->post("akt")==3) {
				if(!$cek_tim) {
					$this->db->where("id", $idz);
					$this->db->update("peserta_lomba_member", array("is_delete"=> 0));
					$idea_unix = GetValue("idea_unix","peserta_lomba_member",array("id"=> "where/".$idz));
					$jum_anggota = GetValue("jum_anggota", "peserta_lomba", array("idea_unix"=> "where/".$idea_unix));
					$this->db->where("idea_unix", $idea_unix);
					$this->db->update("peserta_lomba", array("jum_anggota"=> ($jum_anggota+1)));
				} else $flag=2;
			} else if($this->input->post("akt")==4) {
				$q = GetAll("peserta_lomba_member", array("id"=> "where/".$idz))->result_array()[0];
	  		if($this->db->insert("peserta_lomba_member_delete", $q)) {
	  			$this->db->where("id", $idz);
	  			$this->db->delete("peserta_lomba_member");
	  		}
			} else {
				if(!$cek_tim) {
					$akt = $this->input->post("akt")==1 ? 0 : 1;
					$this->db->where("id", $idz);
					$this->db->update("peserta_lomba_member", array("is_active"=> $akt));
				}
			}
		}
		echo $flag;
	}
  
  function peserta_add()
  {
    $peserta_id=permission();
    $post = $this->input->post();
		$post['modify_date'] = date("Y-m-d H:i:s");
		if($post['password'] != $post['password_old']) $post['password'] = md5($post['password']);
		unset($post['password_old']);
		if(!$post['id']) {
    	if($this->db->insert("peserta_lomba_member", $post)) $this->session->set_flashdata("message", "success-Add Success");
    	else $this->session->set_flashdata("message", "danger-Add Failed");
    } else {
    	$this->db->where("id", $post['id']);
    	if($this->db->update("peserta_lomba_member", $post)) $this->session->set_flashdata("message", "success-Edit Success");
    	else $this->session->set_flashdata("message", "danger-Edit Failed");
    }
    redirect(site_url('peserta/main'));
  }
  
  function peserta_hapus()
  {
  	$post = $this->input->post("chk");
  	foreach($post as $key=> $val) {
  		$idea_unix = GetValue("idea_unix","peserta_lomba_member",array("id"=> "where/".$key));
			$lead = GetValue("is_lead","peserta_lomba_member",array("idea_unix"=> "where/".$key));
			$jum_anggota = GetValue("jum_anggota", "peserta_lomba", array("idea_unix"=> "where/".$idea_unix));
			$cek_tim = GetValue("is_delete","peserta_lomba",array("idea_unix"=> "where/".$idea_unix));
			if(!$lead) {
				if($this->input->post("del_res")==1) {
					//Cek Tim Apakah sudah dihapus apa belum
					if(!$cek_tim) {
						$this->db->where("id", $key);
						$this->db->update("peserta_lomba_member", array("is_delete"=> 0));
						
						$this->db->where("idea_unix", $idea_unix);
						$this->db->update("peserta_lomba", array("jum_anggota"=> ($jum_anggota+1)));
					}
				} else {
					//Cek Tim Apakah sudah dihapus apa belum
					if(!$cek_tim) {
						$this->db->where("id", $key);
						$this->db->update("peserta_lomba_member", array("is_delete"=> 1));
					
						$this->db->where("idea_unix", $idea_unix);
						$this->db->update("peserta_lomba", array("jum_anggota"=> ($jum_anggota-1)));
					}
				}
			}
  	}
  	
  	if($this->input->post("del_res")==1) redirect(site_url('peserta/main/1'));
  	else redirect(site_url('peserta/main'));
  }
  
  function peserta_hapus_permanen()
  {
  	$post = $this->input->post("chk");
  	foreach($post as $key=> $val) {
  		$idea_unix = GetValue("idea_unix","peserta_lomba_member",array("id"=> "where/".$key));
			$lead = GetValue("is_lead","peserta_lomba_member",array("id"=> "where/".$key));
  		$q = GetAll("peserta_lomba_member", array("id"=> "where/".$key))->result_array()[0];
  		if($this->db->insert("peserta_lomba_member_delete", $q)) {
  			$this->db->where("id", $key);
  			$this->db->delete("peserta_lomba_member");
  		}
  		
  		if($lead) {
	  		$q = GetAll("peserta_lomba", array("idea_unix"=> "where/".$idea_unix))->result_array()[0];
	  		if($this->db->insert("peserta_lomba_delete", $q)) {
	  			$this->db->where("idea_unix", $idea_unix);
	  			$this->db->delete("peserta_lomba");
	  			
	  			$xx = GetAll("peserta_lomba_member", array("idea_unix"=> "where/".$idea_unix));
	  			foreach($xx->result_array() as $r) {
		  			$q = GetAll("peserta_lomba_member", array("id"=> "where/".$r['id']))->result_array()[0];
			  		if($this->db->insert("peserta_lomba_member_delete", $q)) {
			  			$this->db->where("id", $r['id']);
			  			$this->db->delete("peserta_lomba_member");
			  		}
			  	}
	  		}
	  	}
  	}
  	
  	redirect(site_url('peserta/main/1'));
  }
	
	function kirim_aktivasi($idz)
	{
		if($idz) {
			$q = GetAll("peserta_lomba_member", array("id"=> "where/".$idz));
			if($q->num_rows() > 0) {
				foreach($q->result_array() as $r) {
					$nama = $r['nama'];
					$email = $r['email'];
					$code = randPassword().$idz;
					$pin = $r['code'];
					$message = "Dear ".ucfirst($nama).",<br><br>
	Kamu hampir selesai. Mohon masukan kode angka di bawah untuk mengaktifkan akun kamu. Ketika akun kamu sudah aktif, kamu bisa masuk ke dalam akunmu.<br><br>
	<font size='6'><b>".$pin."</b></font><br><br>
	Silahkan klik link di bawah ini, atau salin dan tempel di browser kamu<br>
	<a href='".str_replace("pagepeserta/","",site_url('login/activation/'.$code))."'>".str_replace("pagepeserta/","",site_url('login/activation/'.$code))."</a><br><br>
	Dengan memastikan bahwa ini adalah akun kamu, seluruh informasi terkait Ideanation akan dikirim ke alamat e-mail ini.<br><br>
	Salam inovasi,<br>
	peserta Ideanation";
					//echo 
					KirimEmail('Verifikasi Email Anda', $email, $message);
				}
			}			
		}
	}
}
