<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead_form extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$post = $this->input->post();
		$tombol = $this->input->post("tombol");
		if(isset($tombol) && $tombol=="Export") {
			$where="";
			if($post['t_awal'] && $post['t_akhir']) $where .= " AND create_date >= '".$post['t_awal']." 00:00:00' AND create_date <= '".$post['t_akhir']." 23:59:59' ";
			else if($post['t_awal']) $where .= " AND create_date >= '".$post['t_awal']." 00:00:00' AND create_date <= '".$post['t_awal']." 23:59:59' ";
			else if($post['t_akhir']) $where .= " AND create_date >= '".$post['t_akhir']." 00:00:00' AND create_date <= '".$post['t_akhir']." 23:59:59' ";
			
			$id_proz=array();
			//User Akses
			//Grup : 2 In Branch, 3 Agency, 4 Tele, 5 Syariah, 6 Kumpulan/EB
			if(GetUserGrup()==2) {$kat=2;$id_proz=array(95,96,51,59,93,94,66,37,64,90);}
			else if(GetUserGrup()==3) {$kat=2;$id_proz=array(57,75,87,91,60);}
			else if(GetUserGrup()==4) {$kat=2;$id_proz=array(95,96,51,59,93,94,66,37,64,90);}
			else if(GetUserGrup()==5) $kat=4;
			else if(GetUserGrup()==6) $kat=3;
			if($post['kat']) {
				$kat=$post['kat'];
				if($post['kat'] == 1) $where .= " AND create_user_id=0 ";
				else if($kat <= 4) {
					$where_prod=array();
					$where .= " AND ";
					if(count($id_proz) > 1) {
						foreach($id_proz as $idp) {
							$where_prod[] = " create_user_id='".$idp."' ";
						}
					} else {
						$q = GetAll("kg_product_cat", array("id_parent"=> "where/".($kat-1)));
						foreach($q->result_array() as $r) {
							$qq = GetAll("kg_product", array("id_category"=> "where/-".$r['id']."-"));
							foreach($qq->result_array() as $rr) {
								$where_prod[] = " create_user_id='".$rr['id']."' ";
							}
						}
					}
					$where .= "(".join(" OR ", $where_prod).")";
				}
			}
			
			$html = "<table border='1'>";
			$html .= "<tr>";
				$html .= "<th>NO</th>";
				$html .= "<th>PRODUK</th>";
				$html .= "<th>NAMA</th>";
				$html .= "<th>EMAIL</th>";
				$html .= "<th>NO HP</th>";
				$html .= "<th>USIA</th>";
				$html .= "<th>LOKASI</th>";
				$html .= "<th>SUBJECT</th>";
				$html .= "<th>PESAN</th>";
				$html .= "<th>SUMBER</th>";
				$html .= "<th>TANGGAL</th>";
			$html .= "</tr>";
			$q = $this->db->query("SELECT * FROM kg_customer_care WHERE is_delete = 0 ".$where);
			$no=0;
			foreach($q->result_array() as $r) {
				$no++;
				$html .= "<tr>";
					$html .= "<td>".$no."</td>";
					$produk = $r['create_user_id'] ? GetValue("title","product",array("id"=> "where/".$r['create_user_id'])) : "Customer Care";
					$html .= "<td>".$produk."</td>";
					$html .= "<td>".$r['nama']."</td>";
					$html .= "<td>".$r['email']."</td>";
					$html .= "<td>'".$r['no_hp']."</td>";
					$html .= "<td>".$r['usia']."</td>";
					$html .= "<td>".$r['lokasi']."</td>";
					$html .= "<td>".$r['subjek']."</td>";
					$html .= "<td>".$r['pesan']."</td>";
					$html .= "<td>".$r['sumber']."</td>";
					$html .= "<td>".$r['create_date']."</td>";
				$html .= "</tr>";
			}
			$html .= "</table>";
			//die($html);
			to_excel($html, "Report_Leads_Form_".date("YmdHis"));
		} else {
			$data = GetHeaderFooter();
			$data['t_awal'] = isset($post['t_awal']) ? $post['t_awal']:"";
			$data['t_akhir'] = isset($post['t_akhir']) ? $post['t_akhir']:"";
			$data['kat'] = isset($post['kat']) ? $post['kat']:"";
			$awal = $data['t_awal'] ? $data['t_awal'] : 0;
			$akhir = $data['t_akhir'] ? $data['t_akhir'] : 0;
			$kat = $data['kat'] ? $data['kat'] : 0;
			$data['param'] = $awal."/".$akhir."/".$kat;
			$data['main'] 		= 'lead_form';
			$data['filez'] 		= 'lead_form';
			$data['functionz'] 	= 'lead_form';
			$data['labelz'] 	= 'Leads Form';
			$this->load->view('template', $data);
		}
	}
	
	function lead_form_list($t_awal=0,$t_akhir=0,$kat=0)
	{
		ini_set('memory_limit', -1);
		$where = "";
		$ord = "id desc";
		/*$kolom = array("","nama","email","no_hp","lokasi","subjek","pesan","create_date");
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
		}*/
		if($t_awal && $t_akhir) $where .= " AND create_date >= '".$t_awal." 00:00:00' AND create_date <= '".$t_akhir." 23:59:59' ";
		else if($t_awal) $where .= " AND create_date >= '".$t_awal." 00:00:00' AND create_date <= '".$t_awal." 23:59:59' ";
		else if($t_akhir) $where .= " AND create_date >= '".$t_akhir." 00:00:00' AND create_date <= '".$t_akhir." 23:59:59' ";
		
		$id_proz=array();
		//User Akses
		//Grup : 2 In Branch, 3 Agency, 4 Tele, 5 Syariah, 6 Kumpulan/EB
		if(GetUserGrup()==2) {$kat=2;$id_proz=array(95,96,51,59,93,94,66,37,64,90);}
		else if(GetUserGrup()==3) {$kat=2;$id_proz=array(57,75,87,91,60);}
		else if(GetUserGrup()==4) {$kat=2;$id_proz=array(95,96,51,59,93,94,66,37,64,90);}
		else if(GetUserGrup()==5) $kat=4;
		else if(GetUserGrup()==6) $kat=3;
		if($kat) {
			if($kat == 1) $where .= " AND create_user_id=0 ";
			else if($kat <= 4) {
				$where_prod=array();
				$where .= " AND ";
				if(count($id_proz) > 1) {
					foreach($id_proz as $idp) {
						$where_prod[] = " create_user_id='".$idp."' ";
					}
				} else {
					$q = GetAll("kg_product_cat", array("id_parent"=> "where/".($kat-1)));
					foreach($q->result_array() as $r) {
						$qq = GetAll("kg_product", array("id_category"=> "where/-".$r['id']."-"));
						foreach($qq->result_array() as $rr) {
							$where_prod[] = " create_user_id='".$rr['id']."' ";
						}
					}
				}
				$where .= "(".join(" OR ", $where_prod).")";
			}
		}
		
		$query_no_limit = "SELECT * FROM kg_customer_care WHERE is_delete = 0 ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_customer_care WHERE is_delete = 0 ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			// $check 		= "<a href='".site_url('lead_form/lead_form_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			$check 	    = "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$produk = $r['create_user_id'] ? GetValue("title","product",array("id"=> "where/".$r['create_user_id'])) : "Customer Care";
			$data[] 	= array($no, $produk, $r['nama'], $r['email'], $r['no_hp'], $r['lokasi'], $r['usia'], $r['subjek'], $r['sumber'], $r['create_date'], $check);
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
	
	function lead_form_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("customer_care", array("is_delete"=> 1));
			}
		}
	}
	
	function export()
	{
		$html = "<table border='1'>";
			$html .= "<tr>";
				$html .= "<th>NO</th>";
				$html .= "<th>PRODUK</th>";
				$html .= "<th>NAMA</th>";
				$html .= "<th>EMAIL</th>";
				$html .= "<th>NO HP</th>";
				$html .= "<th>USIA</th>";
				$html .= "<th>LOKASI</th>";
				$html .= "<th>SUBJECT</th>";
				$html .= "<th>PESAN</th>";
				$html .= "<th>SUMBER</th>";
				$html .= "<th>TANGGAL</th>";
			$html .= "</tr>";
		$q = $this->db->query("SELECT * FROM kg_customer_care WHERE is_delete = 0");
		$no=0;
		foreach($q->result_array() as $r) {
			$no++;
			$html .= "<tr>";
				$html .= "<td>".$no."</td>";
				$produk = $r['create_user_id'] ? GetValue("title","product",array("id"=> "where/".$r['create_user_id'])) : "Customer Care";
				$html .= "<td>".$produk."</td>";
				$html .= "<td>".$r['nama']."</td>";
				$html .= "<td>".$r['email']."</td>";
				$html .= "<td>'".$r['no_hp']."</td>";
				$html .= "<td>".$r['usia']."</td>";
				$html .= "<td>".$r['lokasi']."</td>";
				$html .= "<td>".$r['subjek']."</td>";
				$html .= "<td>".$r['pesan']."</td>";
				$html .= "<td>".$r['sumber']."</td>";
				$html .= "<td>".$r['create_date']."</td>";
			$html .= "</tr>";
		}
		$html .= "</table>";
		//die($html);
		to_excel($html, "Report_Leads_Form_".date("YmdHis"));
	}
  
}
