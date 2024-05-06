<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller
{
		function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->main();
    }

    function main($trash=0)
    {
	    permission();
	    $data = GetHeaderFooter();
	    $data['main'] = 'laporan';
	    $data['trash'] = $trash;
	    $this->load->view('template', $data);
    }
    
    function laporan_list($trash=0,$tahun="")
	  {
	  	ini_set('memory_limit', -1);
	  	if(!$tahun) {
	  		if($this->session->userdata("c_tahun")) $tahun = $this->session->userdata("c_tahun");
	  		else $tahun=date("Y");
	  	}
	  	$this->session->set_userdata("c_tahun",$tahun);
	  	$data = array();
	  	$q = GetAll("lomba",array("is_delete"=> "where/0", "periode_end"=> "like/".$tahun));
	  	foreach($q->result_array() as $r) {
	  		if(strtoupper($r['alias'])=="KOIN" && $tahun==2020) $check = "<a href='".site_url('laporan/laporan_export/'.$tahun.'/koin')."'><i class='icon icon-cloud-download3'></i></a>";
	  		else if(strtoupper($r['alias'])=="KOMPETISI TAHUNAN" && $tahun==2020) $check = "<a href='".site_url('laporan/laporan_export/'.$tahun.'/annual')."'><i class='icon icon-cloud-download3'></i></a>";
	  		else $check = "<a href='".site_url('laporan/laporan_export/'.$tahun.'/lomba/'.$r['id'])."'><i class='icon icon-cloud-download3'></i></a>";
		  	$data[] = array(strtoupper($r['alias'])." ".$tahun, $check);
		  }
		  $jum=$q->num_rows();
		  /*$check = "<a href='".site_url('laporan/laporan_export/'.$tahun.'/tim')."'><i class='icon icon-cloud-download3'></i></a>";
		  $data[] = array("Tim", $check);
		  $check = "<a href='".site_url('laporan/laporan_export/'.$tahun.'/anggota')."'><i class='icon icon-cloud-download3'></i></a>";
		  $data[] = array("Anggota", $check);*/
		  $check = "<a href='".site_url('laporan/laporan_export/'.$tahun.'/user')."'><i class='icon icon-cloud-download3'></i></a>";
		  $data[] = array("USER ".$tahun, $check);
		  $output = array(
		                  "draw" => $_POST['draw'],
		                  "recordsTotal" => $jum,
		                  "recordsFiltered" => $jum,
		                  "data" => $data
		                 );
		  //output to json format
		  echo json_encode($output);
	  }
	  
	  function laporan_detail($id=0)
		{
			permission();
	    $data = GetHeaderFooter();
	    $data['main'] = 'laporan_detail';
	    $data['id'] = $id;
	    if($id) {
	    	$q = GetAll("laporan", array("id"=> "where/".$id))->result_array()[0];
	    	$data['val'] = $q;
	    } else $data['val'] = array();
	    $this->load->view('template', $data);
		}
	  
	  function laporan_aktif()
		{
			$idz = $this->input->post("idz");
			if($idz) {
				if($this->input->post("akt")==2) {
					$this->db->where("id", $idz);
					$this->db->update("laporan", array("is_delete"=> 1));
				} else if($this->input->post("akt")==3) {
					$this->db->where("id", $idz);
					$this->db->update("laporan", array("is_delete"=> 0));
				} else {
					$akt = $this->input->post("akt")==1 ? 0 : 1;
					$this->db->where("id", $idz);
					$this->db->update("laporan", array("is_active"=> $akt));
				}
			}
		}
	  
	  function laporan_add()
	  {
	    $laporan_id=permission();
	    $post = $this->input->post();
			$post['modify_user_id'] = $laporan_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			
			//File
			$key="file";
			$file_up = $_FILES[$key]['name'];
			$myfile_up	= $_FILES[$key]['tmp_name'];
			$ukuranfile_up = $_FILES[$key]['size'];
			$up_file = "../idea/uploads/".$file_up;
			//$up_file = "../uploads/".$file_up;
			if($_FILES[$key]['name']) {
				//if($ukuranfile_up < (1024 * 1024 * 15)) {
				//die($myfile_up."S".$up_file);
					//unlink("../uploads/".$file_up);
					if(copy($myfile_up, $up_file)) {
						$post['file'] = $post['file_old'] = $file_up;
					}
				//}
			}
			$post['link'] = "https://ideanation/uploads/".$post['file_old'];
			unset($post['file_old']);
	    if(!$post['id']) {
	    	if($this->db->insert("laporan", $post)) $this->session->set_flashdata("message", "success-Add Success");
	    	else $this->session->set_flashdata("message", "danger-Add Failed");
	    } else {
	    	$this->db->where("id", $post['id']);
	    	if($this->db->update("laporan", $post)) $this->session->set_flashdata("message", "success-Edit Success");
	    	else $this->session->set_flashdata("message", "danger-Edit Failed");
	    }
	    redirect(site_url('laporan/main'));
	  }
	  
	  function laporan_hapus()
	  {
	  	$post = $this->input->post("chk");
	  	foreach($post as $key=> $val) {
	  		$this->db->where("id", $key);
				if($this->input->post("del_res")==1) $this->db->update("laporan", array("is_delete"=> 0));
				else $this->db->update("laporan", array("is_delete"=> 1));
	  	}
	  	
	  	if($this->input->post("del_res")==1) redirect(site_url('laporan/main/1'));
	  	else redirect(site_url('laporan/main'));
	  }
	  
	  function laporan_export($tahun=2021,$kat="",$id_lomba="")
	  {
	  	if($id_lomba && $tahun >= 2021) {
	  		$html="<table border='1'>";
				$html .= "<tr>";
				$html .= "<th rowspan='2'>No</th>";
				$html .= "<th rowspan='2'>Nama Tim</th>";
				$html .= "<th rowspan='2'>Email Tim</th>";
				$html .= "<th rowspan='2'>Kota Asal</th>";
				$html .= "<th rowspan='2'>Mewakili</th>";
				$html .= "<th rowspan='2'>Kompetisi</th>";
				$html .= "<th rowspan='2'>Kategori</th>";
				$html .= "<th rowspan='2'>Judul Proposal</th>";
				$html .= "<th rowspan='2'>File</th>";
				$html .= "<th rowspan='2'>Jumlah Anggota</th>";
				$html .= "<th colspan='11'>Daftar Anggota</th>";
				$html .= "</tr>";
				$html .= "<tr>";
				$html .= "<th>Nama</th>";
				$html .= "<th>Email</th>";
				$html .= "<th>WhatsApp</th>";
				$html .= "<th>NIK/SIM</th>";
				$html .= "<th>Jenis Kelamin</th>";
				$html .= "<th>Tempat Lahir</th>";
				$html .= "<th>Tanggal Lahir</th>";
				$html .= "<th>Kota Asal</th>";
				$html .= "<th>Jenjang Pendidikan</th>";
				$html .= "<th>Universitas</th>";
				$html .= "<th>Jurusan</th>";
				$html .= "</tr>";
				$no=0;
				$lomba = GetValue("title","lomba",array("id"=> "where/".$id_lomba));
	  		$kat=GetOptAll("lomba_kategori");
		  	$q = GetAll("peserta_lomba",array("id_lomba"=> "where/".$id_lomba, "create_date"=> "like/".$tahun));
				foreach($q->result_array() as $r) {
					$no++;
					$jum=$r['jum_anggota'];
					$html .= "<tr>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$no."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['nm_tim']."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['email_tim']."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['kota_asal']."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['kat_peserta']."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$lomba."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$kat[$r['id_kat_lomba']]."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['judul_proposal']."</td>";
					$q_f = GetAll("peserta_lomba_file",array("idea_unix"=> "where/".$r['idea_unix'], "id_kat_lomba"=> "where/".$r['id_kat_lomba']));
					$prop="";
					if($q_f->num_rows() > 0) {
						foreach($q_f->result_array() as $f) {
							$prop .= "<a href='https://ideanation.id/uploads/proposal/".$f['proposal']."'>Download</a><br>";
						}
					}
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$prop."</td>";
					$html .= "<td rowspan='".$jum."' style='text-align:center;vertical-align:middle;'>".$jum."</td>";
					$flag_jum=0;
					$qq = GetAll("peserta_lomba_member", array("idea_unix"=> "where/".$r['idea_unix'], "is_delete"=> "where/0"));
					foreach($qq->result_array() as $key=> $rr) {
						$flag_jum++;
						if($key < $jum) {
							if($key==0) {
								$html .= "<td>".$rr['nm_anggota']."</td>";
								$html .= "<td>".$rr['email']."</td>";
								$html .= "<td>".$rr['wa']."</td>";
								$html .= "<td>'".$rr['ktp']."</td>";
								$html .= "<td>".$rr['gender']."</td>";
								$html .= "<td>".$rr['dob_place']."</td>";
								$html .= "<td>".$rr['dob']."</td>";
								$html .= "<td>".strtoupper($rr['kota'])."</td>";
								$html .= "<td>".$rr['strata']."</td>";
								$html .= "<td>".$rr['univ']."</td>";
								$html .= "<td>".$rr['major']."</td>";
								$html .= "</tr>";
							} else {
								$html .= "<tr>";
								$html .= "<td>".$rr['nm_anggota']."</td>";
								$html .= "<td>".$rr['email']."</td>";
								$html .= "<td>".$rr['wa']."</td>";
								$html .= "<td>'".$rr['ktp']."</td>";
								$html .= "<td>".$rr['gender']."</td>";
								$html .= "<td>".$rr['dob_place']."</td>";
								$html .= "<td>".$rr['dob']."</td>";
								$html .= "<td>".strtoupper($rr['kota'])."</td>";
								$html .= "<td>".$rr['strata']."</td>";
								$html .= "<td>".$rr['univ']."</td>";
								$html .= "<td>".$rr['major']."</td>";
								$html .= "</tr>";
							}
						}
					}
					
					if($flag_jum < $jum) {
						for($k=1;$k<=($jum-$flag_jum);$k++) {
							$html .= "<tr>";
							$html .= "<td>-</td>";
							$html .= "<td>-</td>";
							$html .= "<td>-</td>";
							$html .= "<td>-</td>";
							$html .= "<td>-</td>";
							$html .= "<td>-</td>";
							$html .= "<td>-</td>";
							$html .= "<td>-</td>";
							$html .= "<td>-</td>";
							$html .= "<td>-</td>";
							$html .= "<td>-</td>";
							$html .= "</tr>";
						}
					}
				}
			} else if($kat=="user") {
				$lomba="User";
				$html="<table border='1'>";
				$html .= "<tr>";
				$html .= "<th>No</th>";
				$html .= "<th>Nama</th>";
				$html .= "<th>Username</th>";
				$html .= "<th>Email</th>";
				$html .= "<th>HP</th>";
				$html .= "<th>Tanggal Daftar</th>";
				$html .= "<th>Status</th>";
				$html .= "</tr>";
				$no=0;
				$q=GetAll("member", array("create_date "=> "order/desc", "create_date"=> "like/".$tahun));
				foreach($q->result_array() as $r) {
					if($r['nama']) {
						$no++;
						$status = $r['is_active'] ? "Active" : "InActive";
						$html .= "<tr>";
						$html .= "<td>".$no."</td>";
						$html .= "<td>".$r['nama']."</td>";
						$html .= "<td>".$r['username']."</td>";
						$html .= "<td>".$r['email']."</td>";
						$html .= "<td>".$r['hp']."</td>";
						$html .= "<td>".$r['create_date']."</td>";
						$html .= "<td>".$status."</td>";
						$html .= "</tr>";
					}
				}
			} else if($kat=="koin") {
				$html="<table border='1'>";
				$html .= "<tr>";
				$html .= "<th rowspan='2'>No</th>";
				$html .= "<th rowspan='2'>Nama Tim</th>";
				$html .= "<th rowspan='2'>Email Tim</th>";
				$html .= "<th rowspan='2'>Kota Asal</th>";
				$html .= "<th rowspan='2'>Mewakili</th>";
				$html .= "<th rowspan='2'>Judul Proposal</th>";
				$html .= "<th rowspan='2'>PDF</th>";
				$html .= "<th rowspan='2'>PPT</th>";
				$html .= "<th rowspan='2'>Video</th>";
				$html .= "<th rowspan='2'>Jumlah Anggota</th>";
				$html .= "<th colspan='11'>Daftar Anggota</th>";
				$html .= "</tr>";
				$html .= "<tr>";
				$html .= "<th>Nama</th>";
				$html .= "<th>Email</th>";
				$html .= "<th>WhatsApp</th>";
				$html .= "<th>NIK/SIM</th>";
				$html .= "<th>Jenis Kelamin</th>";
				$html .= "<th>Tempat Lahir</th>";
				$html .= "<th>Tanggal Lahir</th>";
				$html .= "<th>Kota Asal</th>";
				$html .= "<th>Jenjang Pendidikan</th>";
				$html .= "<th>Universitas</th>";
				$html .= "<th>Jurusan</th>";
				$html .= "</tr>";
				$no=0;
				$q=GetAll("peserta_short", array("create_date "=> "order/desc", "create_date"=> "like/".$tahun));
				foreach($q->result_array() as $r) {
					$no++;
					$jum=$r['jum_anggota'];
					$html .= "<tr>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$no."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['nm_tim']."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['email_tim']."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['kota_asal']."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['kat_peserta']."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['judul_proposal']."</td>";
					$prop1 = $r['proposal'] ? "<a href='https://ideanation.id/uploads/proposal/".$r['proposal']."'>Download</a>" : "-";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$prop1."</td>";
					$prop2 = $r['proposal2'] ? "<a href='https://ideanation.id/uploads/proposal/".$r['proposal2']."'>Download</a>" : "-";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$prop2."</td>";
					$link = $r['video'] ? "<a href='".$r['video']."'>Video</a>" : "-";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$link."</td>";
					$html .= "<td rowspan='".$jum."' style='text-align:center;vertical-align:middle;'>".$jum."</td>";
					$qq = GetAll("peserta_member_short", array("idea_unix"=> "where/".$r['idea_unix'], "is_delete"=> "where/0"));
					foreach($qq->result_array() as $key=> $rr) {
						if($key < $jum) {
							if($key==0) {
								$html .= "<td>".$rr['nm_anggota']."</td>";
								$html .= "<td>".$rr['email']."</td>";
								$html .= "<td>".$rr['wa']."</td>";
								$html .= "<td>'".$rr['ktp']."</td>";
								$html .= "<td>".$rr['gender']."</td>";
								$html .= "<td>".$rr['dob_place']."</td>";
								$html .= "<td>".$rr['dob']."</td>";
								$html .= "<td>".strtoupper($rr['kota'])."</td>";
								$html .= "<td>".$rr['strata']."</td>";
								$html .= "<td>".$rr['univ']."</td>";
								$html .= "<td>".$rr['major']."</td>";
								$html .= "</tr>";
							} else {
								$html .= "<tr>";
								$html .= "<td>".$rr['nm_anggota']."</td>";
								$html .= "<td>".$rr['email']."</td>";
								$html .= "<td>".$rr['wa']."</td>";
								$html .= "<td>'".$rr['ktp']."</td>";
								$html .= "<td>".$rr['gender']."</td>";
								$html .= "<td>".$rr['dob_place']."</td>";
								$html .= "<td>".$rr['dob']."</td>";
								$html .= "<td>".strtoupper($rr['kota'])."</td>";
								$html .= "<td>".$rr['strata']."</td>";
								$html .= "<td>".$rr['univ']."</td>";
								$html .= "<td>".$rr['major']."</td>";
								$html .= "</tr>";
							}
						}
					}
					
				}
			} else if($kat=="annual") {
				$lomba="KOIN";
				$html="<table border='1'>";
				$html .= "<tr>";
				$html .= "<th rowspan='2'>No</th>";
				$html .= "<th rowspan='2'>Nama Tim</th>";
				$html .= "<th rowspan='2'>Email Tim</th>";
				$html .= "<th rowspan='2'>Kota Asal</th>";
				$html .= "<th rowspan='2'>Mewakili</th>";
				$html .= "<th rowspan='2'>Kategori</th>";
				$html .= "<th rowspan='2'>Judul Proposal</th>";
				$html .= "<th rowspan='2'>PDF</th>";
				$html .= "<th rowspan='2'>Word</th>";
				$html .= "<th rowspan='2'>Jumlah Anggota</th>";
				$html .= "<th colspan='11'>Daftar Anggota</th>";
				$html .= "</tr>";
				$html .= "<tr>";
				$html .= "<th>Nama</th>";
				$html .= "<th>Email</th>";
				$html .= "<th>WhatsApp</th>";
				$html .= "<th>NIK/SIM</th>";
				$html .= "<th>Jenis Kelamin</th>";
				$html .= "<th>Tempat Lahir</th>";
				$html .= "<th>Tanggal Lahir</th>";
				$html .= "<th>Kota Asal</th>";
				$html .= "<th>Jenjang Pendidikan</th>";
				$html .= "<th>Universitas</th>";
				$html .= "<th>Jurusan</th>";
				$html .= "</tr>";
				$no=0;
				$kat=GetOptAll("ref_kat_lomba");
				$kat[''] = "";
				$q=GetAll("peserta", array("create_date "=> "order/desc", "create_date"=> "like/".$tahun));
				foreach($q->result_array() as $r) {
					$no++;
					$jum=$r['jum_anggota'];
					$html .= "<tr>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$no."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['nm_tim']."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['email_tim']."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['kota_asal']."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['kat_peserta']."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$kat[$r['id_kat_lomba']]."</td>";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['judul_proposal']."</td>";
					$prop1 = $r['proposal'] ? "<a href='https://ideanation.id/uploads/proposal/".$r['proposal']."'>Download</a>" : "-";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$prop1."</td>";
					$prop2 = $r['proposal2'] ? "<a href='https://ideanation.id/uploads/proposal/".$r['proposal2']."'>Download</a>" : "-";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$prop2."</td>";
					$html .= "<td rowspan='".$jum."' style='text-align:center;vertical-align:middle;'>".$jum."</td>";
					$qq = GetAll("peserta_member", array("idea_unix"=> "where/".$r['idea_unix'], "is_delete"=> "where/0"));
					if($qq->num_rows() > 0) {
						foreach($qq->result_array() as $key=> $rr) {
							if($key < $jum) {
								if($key==0) {
									$html .= "<td>".$rr['nm_anggota']."</td>";
									$html .= "<td>".$rr['email']."</td>";
									$html .= "<td>".$rr['wa']."</td>";
									$html .= "<td>'".$rr['ktp']."</td>";
									$html .= "<td>".$rr['gender']."</td>";
									$html .= "<td>".$rr['dob_place']."</td>";
									$html .= "<td>".$rr['dob']."</td>";
									$html .= "<td>".strtoupper($rr['kota'])."</td>";
									$html .= "<td>".$rr['strata']."</td>";
									$html .= "<td>".$rr['univ']."</td>";
									$html .= "<td>".$rr['major']."</td>";
									$html .= "</tr>";
								} else {
									$html .= "<tr>";
									$html .= "<td>".$rr['nm_anggota']."</td>";
									$html .= "<td>".$rr['email']."</td>";
									$html .= "<td>".$rr['wa']."</td>";
									$html .= "<td>'".$rr['ktp']."</td>";
									$html .= "<td>".$rr['gender']."</td>";
									$html .= "<td>".$rr['dob_place']."</td>";
									$html .= "<td>".$rr['dob']."</td>";
									$html .= "<td>".strtoupper($rr['kota'])."</td>";
									$html .= "<td>".$rr['strata']."</td>";
									$html .= "<td>".$rr['univ']."</td>";
									$html .= "<td>".$rr['major']."</td>";
									$html .= "</tr>";
								}
							}
						}
					} else {
						for($z=1;$z<=$jum;$z++) {
							if($z > 1) {
								$html .= "<tr>";
							}
							$html .= "<td></td>";
							$html .= "<td></td>";
							$html .= "<td></td>";
							$html .= "<td></td>";
							$html .= "<td></td>";
							$html .= "<td></td>";
							$html .= "<td></td>";
							$html .= "<td></td>";
							$html .= "<td></td>";
							$html .= "<td></td>";
							$html .= "<td></td>";
							$html .= "</tr>";
						}
					}					
				}
			}
			//die($html);
			to_excel($html,'Report_Ideanation_'.$lomba.'_'.date("YmdHis"));
	  }
}

?>