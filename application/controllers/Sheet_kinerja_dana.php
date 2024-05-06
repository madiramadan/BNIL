<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sheet_kinerja_dana extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'sheet_kinerja_dana';
    $data['bhs'] = GetBahasa("kinerja");
		$this->load->view('template', $data);
	}
	
	function grafik($cat, $tgl_s=NULL, $tgl_e=NULL) {
		$list=array();
		$where = array("fund_product_id"=> "where/".$cat);
		$wh = "fund_product_id='".$cat."'";
		if($tgl_s) {$where['entry_date >='] = "where/".$tgl_s;$wh .= " AND entry_date >= '".$tgl_s."' ";}
		if($tgl_e) {$where['entry_date <='] = "where/".$tgl_e;$wh .= " AND entry_date <= '".$tgl_e."' ";}
		$where['entry_date'] = "order/asc";
		$q = $this->db->query("select * from fund_product_nabs where ".$wh." order by entry_date asc");
		//GetAll("fun_nab", $where);
		foreach($q->result_array() as $r) {
			$list[] = array(strtotime($r['entry_date'])*1000, str_replace("\"","",$r['value']));
		}
		echo str_replace("\"","",json_encode($list));
	}
	
	
	function get_kategori_dana() {
		$id = $this->input->post("param");
		$opt=array(""=> " Kategori Subdana ");
		//$q = GetAll("fun_product_cat", array("id_unit_link"=> "where/".$id));
		//foreach($q->result_array() as $r) {
			$qq = GetAll("fun_product_cat", array("id_unit_link"=> "where/".$id,"title"=>"order/asc"));
			foreach($qq->result_array() as $rr) {
				$opt[$rr['id']] = $rr['title'];
			}
		//}
		echo form_dropdown("l_unit_link", $opt, "", "id='l_unit_link' class='form-control'");
	}

	function get_kategori_dana_eng() {
		$id = $this->input->post("param");
		$opt=array(""=> " Sub-Fund Category ");
		//$q = GetAll("fun_product_cat", array("id_unit_link"=> "where/".$id));
		//foreach($q->result_array() as $r) {
			$qq = GetAll("fun_product_cat", array("id_unit_link"=> "where/".$id,"title"=>"order/asc"));
			foreach($qq->result_array() as $rr) {
				$opt[$rr['id']] = $rr['title_ENG'];
			}
		//}
		echo form_dropdown("l_unit_link", $opt, "", "id='l_unit_link' class='form-control'");
	}

	function get_tipe_dana() {
		$id = $this->input->post("param");
		$opt=array(""=> " Subdana ");
		$q = GetAll("fun_product_cat", array("id_parent"=> "where/".$id));
		foreach($q->result_array() as $r) {
			$qq = GetAll("fun_product", array("id_category"=> "where/".$r['id']));
			foreach($qq->result_array() as $rr) {
				$opt[$rr['id']] = $rr['title'];
			}
		}
		echo form_dropdown("l_tipe_dana", $opt, "", "id='l_tipe_dana' class='form-control'");
	}

	function get_tipe_dana_eng() {
		$id = $this->input->post("param");
		$opt=array(""=> " Sub-Fund ");
		$q = GetAll("fun_product_cat", array("id_parent"=> "where/".$id));
		foreach($q->result_array() as $r) {
			$qq = GetAll("fun_product", array("id_category"=> "where/".$r['id']));
			foreach($qq->result_array() as $rr) {
				$opt[$rr['id']] = $rr['title'];
			}
		}
		echo form_dropdown("l_tipe_dana", $opt, "", "id='l_tipe_dana' class='form-control'");
	}
	
	function get_tahun() {
		$id = $this->input->post("param");
		$opt=array(""=> " Tahun ");
		$temp=0;
		$q = GetAll("kinerja_bulanan", array("id_product"=> "where/".$id));
		foreach($q->result_array() as $r) {
			$tahun = substr($r['periode'],0,4);
			if($temp != $tahun) {
				$opt[$tahun] = $tahun;
				$temp=$tahun;
			}
		}
		echo form_dropdown("l_tahun", $opt, "", "id='l_tahun' class='form-control'");
	}

	function get_tahun_eng() {
		$id = $this->input->post("param");
		$opt=array(""=> " Year ");
		$temp=0;
		$q = GetAll("kinerja_bulanan", array("id_product"=> "where/".$id));
		foreach($q->result_array() as $r) {
			$tahun = substr($r['periode'],0,4);
			if($temp != $tahun) {
				$opt[$tahun] = $tahun;
				$temp=$tahun;
			}
		}
		echo form_dropdown("l_tahun", $opt, "", "id='l_tahun' class='form-control'");
	}
	
	function get_bulan() {
		$id = $this->input->post("param");
		$tahun = $this->input->post("param2");
		$opt=array(""=> " Bulan ");
		$temp=0;
		//$q = GetAll("kinerja_bulanan", array("id_product"=> "where/".$id, "periode"=> "like/".$tahun));
		$q = $this->db->query("select * from kg_kinerja_bulanan where id_product='".$id."' AND periode like '%".$tahun."%' ORDER BY periode asc");
		foreach($q->result_array() as $r) {
			$bulan = substr($r['periode'],5,2);
			if($temp != $bulan) {
				$opt[$bulan] = GetMonthFull(intval($bulan));
				$temp=$tahun;
			}
		}
		echo form_dropdown("l_bulan", $opt, "", "id='l_bulan' class='form-control'");
	}

	function get_bulan_eng() {
		$id = $this->input->post("param");
		$tahun = $this->input->post("param2");
		$opt=array(""=> " Month ");
		$temp=0;
		//$q = GetAll("kinerja_bulanan", array("id_product"=> "where/".$id, "periode"=> "like/".$tahun));
		$q = $this->db->query("select * from kg_kinerja_bulanan where id_product='".$id."' AND periode like '%".$tahun."%' ORDER BY periode asc");
		foreach($q->result_array() as $r) {
			$bulan = substr($r['periode'],5,2);
			if($temp != $bulan) {
				$opt[$bulan] = GetMonthFulleng(intval($bulan));
				$temp=$tahun;
			}
		}
		echo form_dropdown("l_bulan", $opt, "", "id='l_bulan' class='form-control'");
	}
	
	function unduh() {
		$id = $this->input->post("param");
		$tahun = $this->input->post("param2");
		$bulan = $this->input->post("param3");
		$file = GetValue("file", "kinerja_bulanan", array("id_product"=> "where/".$id, "periode"=> "like/".$tahun."-".$bulan, "limit"=> "0/1"));
		echo $file;
	}
}
