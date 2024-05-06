<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	
	function index()
  {
      $this->main();
  }
  
	public function main($tgl=NULL,$bln=NULL,$thn=NULL,$limit=NULL)
	{
		permission();
    $data = GetHeaderFooter();
    if(!$tgl) $tgl=date("d-m-Y");
		else $tgl = $tgl."-".$bln."-".$thn;
    $data['main'] = 'report';
    $data['tanggal'] = $tgl;
    $data['tgl'] = substr($tgl,0,2);
    $data['bulan'] = substr($tgl,3,2);
    $data['tahun'] = substr($tgl,6,4);
    $data['limit'] = intval($limit);
		$this->load->view('template', $data);
	}
	
	function export_xls()
	{
		$userid=permission();
		$post = $param = $this->input->post();
unset($post['id']);
		$where=array("create_date"=> "order/desc");
		if(isset($post["daterange"])) {
			$range = explode(" - ", $post["daterange"]);
			$awal = substr($range[0],3,2)."-".substr($range[0],0,2)."-".substr($range[0],6,4);
			$awal = substr($range[0],6,4)."-".substr($range[0],0,2)."-".substr($range[0],3,2);
			$akhir = substr($range[1],3,2)."-".substr($range[1],0,2)."-".substr($range[1],6,4);
			$akhir = substr($range[1],6,4)."-".substr($range[1],0,2)."-".substr($range[1],3,2);
			//$post['q'] = $this->db->query("select a.*,b.*,CONCAT(SUBSTR(b.tgl_ass,7,4),'-',SUBSTR(b.tgl_ass,4,2),'-',SUBSTR(b.tgl_ass,1,2)) as ass_tgl from mz_ot a inner join mz_ot_ass b on b.kode_ot=a.kode_ot where 1 HAVING ass_tgl >= '".$awal."' AND ass_tgl <= '".$akhir."' ORDER BY b.tgl_ass asc");
		} else {
			$tbl="_short";
			if($post['kom']=="Signup") {
				$q=GetAll("member", $where);
			} else if($post['kom']=="Annual") {
				$tbl="";
				$kat=GetOptAll("ref_kat_lomba");
				$q=GetAll("peserta", $where);
			} else if($post['kom']=="ICS") {
				$ics=GetOptAll("ics");
				$kat=GetOptAll("ics_category");
				if($post['seri']==1) $tbl="_seri1";
				else $tbl="";
				$q=GetAll("peserta_ics".$tbl, $where);
			} else $q=GetAll("peserta_short", $where);
			//} else $q=GetAll("peserta_short", array("com_loc"=> "where/".$post['kom']));
		}
		
		if($post['kom'] == "Signup") {
			$html="<table border='1'>";
			$html .= "<tr>";
			$html .= "<th>No</th>";
			$html .= "<th>Nama</th>";
			$html .= "<th>Username</th>";
			$html .= "<th>Email</th>";
			$html .= "<th>HP</th>";
			$html .= "<th>Status</th>";
			$html .= "</tr>";
			$no=0;
			foreach($q->result_array() as $r) {
				$no++;
				$status = $r['is_active'] ? "Active" : "InActive";
				$html .= "<tr>";
				$html .= "<td>".$no."</td>";
				$html .= "<td>".$r['nama']."</td>";
				$html .= "<td>".$r['username']."</td>";
				$html .= "<td>".$r['email']."</td>";
				$html .= "<td>".$r['hp']."</td>";
				$html .= "<td>".$status."</td>";
				$html .= "</tr>";
			}
		} elseif($post['kom'] == "ICS") {
			$html="<table border='1'>";
			$html .= "<tr>";
			$html .= "<th rowspan='2'>No</th>";
			$html .= "<th rowspan='2'>Team name</th>";
			$html .= "<th rowspan='2'>Team e-mail</th>";
			$html .= "<th rowspan='2'>City of origin</th>";
			$html .= "<th rowspan='2'>Representative</th>";
			$html .= "<th rowspan='2'>Seri</th>";
			$html .= "<th rowspan='2'>Proyek</th>";
			$html .= "<th rowspan='2'>Title of karya</th>";
			$html .= "<th rowspan='2'>File proyek</th>";
			$html .= "<th rowspan='2'>Number of member</th>";
			$html .= "<th colspan='11'>List of member</th>";
			$html .= "</tr>";
			$html .= "<tr>";
			$html .= "<th>Name</th>";
			$html .= "<th>Email</th>";
			$html .= "<th>WhatsApp</th>";
			$html .= "<th>NIK/SIM</th>";
			$html .= "<th>Gender</th>";
			$html .= "<th>City of birth</th>";
			$html .= "<th>DOB</th>";
			$html .= "<th>City of origin</th>";
			$html .= "<th>Academic level</th>";
			$html .= "<th>University</th>";
			$html .= "<th>Major</th>";
			$html .= "</tr>";
			
			$no=0;
			foreach($q->result_array() as $r) {
				$no++;
				$jum=$r['jum_anggota'];
				$html .= "<tr>";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$no."</td>";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['nm_tim']."</td>";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['email_tim']."</td>";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['kota_asal']."</td>";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['kat_peserta']."</td>";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$ics[$r['com_loc']]."</td>";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$kat[$r['id_kat_lomba']]."</td>";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['judul_proposal']."</td>";
				$q_f = GetAll("peserta_file_ics".$tbl,array("idea_unix"=> "where/".$r['idea_unix'], "id_kat_lomba"=> "where/".$r['id_kat_lomba']));
				$prop="";
				if($q_f->num_rows() > 0) {
					foreach($q_f->result_array() as $f) {
						$prop .= "<a href='https://ideanation.id/uploads/proposal/".$f['proposal']."'>Download</a><br>";
					}
				}
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$prop."</td>";
				$html .= "<td rowspan='".$jum."' style='text-align:center;vertical-align:middle;'>".$jum."</td>";
				$qq = GetAll("peserta_member_ics".$tbl, array("idea_unix"=> "where/".$r['idea_unix'], "is_delete"=> "where/0"));
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
		} else {
			$html="<table border='1'>";
			$html .= "<tr>";
			$html .= "<th rowspan='2'>No</th>";
			$html .= "<th rowspan='2'>Team name</th>";
			$html .= "<th rowspan='2'>Team e-mail</th>";
			$html .= "<th rowspan='2'>City of origin</th>";
			$html .= "<th rowspan='2'>Representative</th>";
			if($post['kom']=="Annual") $html .= "<th rowspan='2'>Category</th>";
			$html .= "<th rowspan='2'>Title of proposal</th>";
			$html .= "<th rowspan='2'>PDF</th>";
			if($post['kom']!="Annual") {
				$html .= "<th rowspan='2'>PPT</th>";
				$html .= "<th rowspan='2'>Video</th>";
			} else $html .= "<th rowspan='2'>Word</th>";
			$html .= "<th rowspan='2'>Number of member</th>";
			$html .= "<th colspan='11'>List of member</th>";
			$html .= "</tr>";
			$html .= "<tr>";
			$html .= "<th>Name</th>";
			$html .= "<th>Email</th>";
			$html .= "<th>WhatsApp</th>";
			$html .= "<th>NIK/SIM</th>";
			$html .= "<th>Gender</th>";
			$html .= "<th>City of birth</th>";
			$html .= "<th>DOB</th>";
			$html .= "<th>City of origin</th>";
			$html .= "<th>Academic level</th>";
			$html .= "<th>University</th>";
			$html .= "<th>Major</th>";
			$html .= "</tr>";
			
			$no=0;
			foreach($q->result_array() as $r) {
				$no++;
				$jum=$r['jum_anggota'];
				$html .= "<tr>";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$no."</td>";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['nm_tim']."</td>";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['email_tim']."</td>";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['kota_asal']."</td>";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['kat_peserta']."</td>";
				if($post['kom']=="Annual") $html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$kat[$r['id_kat_lomba']]."</td>";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$r['judul_proposal']."</td>";
				$prop1 = $r['proposal'] ? "<a href='https://ideanation.id/uploads/proposal/".$r['proposal']."'>Download</a>" : "-";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$prop1."</td>";
				$prop2 = $r['proposal2'] ? "<a href='https://ideanation.id/uploads/proposal/".$r['proposal2']."'>Download</a>" : "-";
				$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$prop2."</td>";
				if($post['kom']!="Annual") {
					$link = $r['video'] ? "<a href='".$r['video']."'>Video</a>" : "-";
					$html .= "<td rowspan='".$jum."' style='vertical-align:middle;'>".$link."</td>";
				}
				$html .= "<td rowspan='".$jum."' style='text-align:center;vertical-align:middle;'>".$jum."</td>";
				$qq = GetAll("peserta_member".$tbl, array("idea_unix"=> "where/".$r['idea_unix'], "is_delete"=> "where/0"));
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
		}
		//die($html);
		to_excel($html,'Report_Ideanation_'.$post['kom'].'_'.date("YmdHis"));
	}
}
