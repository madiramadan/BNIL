<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main($id_prov=31)
	{
		$data=$ma=array();
		$q = GetAll("contact_view", array("id_province"=> "where/".$id_prov));
		foreach($q->result_array() as $key=> $r) {
			if($key==0) {
				$data['def_lat'] = $r['latitude'];
				$data['def_long'] = $r['longitude'];
			}
			$ma[] = "['',".$r['latitude'].", ".$r['longitude'].", ".$r['id'].", '".str_replace("\r\n"," ",$r['address'])."<br>".$r['kantor_layanan']."', 'image1']";
		}
		$data['ma'] = join(",",$ma);
		$icon = "var image1 = {url: '".base_url()."assets/images/pin.png',size: new google.maps.Size(60, 60)};";
	  $data['icon'] = $icon;
	  $data['zoom'] = 10;
		$this->load->view('maps', $data);
	}
	
	public function direktori($id_prov=31)
	{
		$data=$ma=array();
		$data['cat'] = $this->input->get("cat");
    $data['id_prov'] = $this->input->get("id_prov");
    $data['id_type'] = $this->input->get("id_type");
    $data['id_tags'] = $this->input->get("id_tags");
    $data['s_kunci'] = $this->input->get("s_kunci");
		$where=$data['def_lat']="";
		if($data['id_prov']) $where .= " AND id_province='".$data['id_prov']."'";
		if($data['id_type']) $where .= " AND id_type='".$data['id_type']."'";
		if($data['cat']) $where .= " AND id_category='".$data['cat']."'";
		if($data['id_tags']) $where .= " AND id_tags='".$data['id_tags']."'";
		if($data['s_kunci']) $where .= " AND (nama like '%".$data['s_kunci']."%' OR address like '%".$data['s_kunci']."%')";
		//$q = $this->db->query("select * from kg_directory WHERE is_delete=0 AND latitude != '-' AND longitude != '-' ".$where." LIMIT 0,9");
		$q = $this->db->query("select TOP 12 * from kg_directory WHERE is_delete=0 AND latitude != '-' AND longitude != '-' ".$where." ");
		foreach($q->result_array() as $key=> $r) {
			if($r['latitude'] && $r['longitude']) {
				if(!$data['def_lat']) {
					$data['def_lat'] = $r['latitude'];
					$data['def_long'] = $r['longitude'];
				}
				$ma[] = "['',".$r['latitude'].", ".$r['longitude'].", ".$r['id'].", '".str_replace("\r\n"," ",$r['address'])."<br>".$r['phone']."', 'image1']";
			}
		}
		$data['ma'] = join(",",$ma);
		$icon = "var image1 = {url: '".base_url()."assets/images/pin.png',size: new google.maps.Size(60, 60)};";
	  $data['icon'] = $icon;
	  $data['zoom'] = 7;
		$this->load->view('maps', $data);
	}
}
