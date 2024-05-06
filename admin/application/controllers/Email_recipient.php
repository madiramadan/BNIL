<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_recipient extends CI_Controller {
	
	function index()
  	{
      $this->main();
  	}
	
	function main()
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'email_recipient';
		$data['filez'] 		= 'email_recipient';
		$data['functionz'] 	= 'email_recipient';
		$data['labelz'] 	= 'Email Recipient';
		$this->load->view('template', $data);
	}
	
	function email_recipient_list($trash=0)
	{
		ini_set('memory_limit', -1);
		$where = "1=1";
		$kolom = array("","form_name","to_email","cc_email");
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
		}
			
		$query_no_limit = "SELECT * FROM kg_email_recipient WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord;
		$query 	= "SELECT * FROM kg_email_recipient WHERE is_delete = 0 AND ".$where." ORDER BY ".$ord." OFFSET ".$_POST['start']." ROWS FETCH NEXT ".$_POST['length']." ROWS ONLY";;
		$list 	= $this->db->query($query);
		$data 	= array();
		$no 	= $_POST['start'];
		foreach ($list->result_array() as $r) {
			$no++;
			$check 		= "<a href='".site_url('email_recipient/email_recipient_detail/'.$r['id'])."'><i class='icon icon-pencil'></i></a>";
			//$check 	    .= "&nbsp;&nbsp;<a href=''><i class='akt icon icon-trash' rel='".$r['id']."' zz='2'></i></a>";
			$data[] 	= array($no, $r['form_name'], $r['to_email'], $r['cc_email'], $check);
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
  
  	function email_recipient_detail($id=0)
	{
		permission();
		$data = GetHeaderFooter();
		$data['main'] 		= 'email_recipient_detail';
		$data['filez'] 		= 'email_recipient';
		$data['functionz'] 	= 'email_recipient';
		$data['id'] 		= $id;
		if($id) {
			$q = GetAll("email_recipient", array("id" => "where/".$id))->result_array()[0];
			$data['labelz'] = 'Update Email Recipient';
			$data['val'] 	= $q;
		} else {
			$data['labelz'] = 'Insert a New Email Recipient';
			$data['val'] 	= array();
		}
		$this->load->view('template', $data);
	}
  
	function email_recipient_add()
	{
		ini_set('memory_limit', -1);
		$admin_id 	= permission();
		$post = $param = $this->input->post();
		unset($post['id']);
		$post['modify_user_id'] = $admin_id;
		$post['modify_date']    = date("Y-m-d H:i:s");
		$post['is_delete']=0;
		if(!$param['id']) {
			$post['id'] = GetValue("id","promo",array("limit"=> "0/1", "id"=> "order/desc")) + 1;
		}
		$cek_id = GetValue("id","email_recipient",array("id"=> "where/".$param['id']));
		if(!$cek_id) {
			$post['create_user_id'] = $admin_id;
			$post['create_date'] = date("Y-m-d H:i:s");
			$post['modify_user_id'] = $admin_id;
			$post['modify_date'] = date("Y-m-d H:i:s");
			if($this->db->insert("email_recipient", $post)) $this->session->set_flashdata("message", "success-Add Success");
			else $this->session->set_flashdata("message", "danger-Add Failed");
		} else {
			$post['modify_user_id'] = $admin_id;
			$post['modify_date']    = date("Y-m-d H:i:s");
			$this->db->where("id", $param['id']);
			if($this->db->update("email_recipient", $post)) $this->session->set_flashdata("message", "success-Edit Success");
			else $this->session->set_flashdata("message", "danger-Edit Failed");
		}
		redirect(site_url('email_recipient'));
  	}
	
	function email_recipient_aktif()
	{
		$idz = $this->input->post("idz");
		if($idz) {
			if($this->input->post("akt")==2) {
				$this->db->where("id", $idz);
				$this->db->update("email_recipient", array("is_delete"=> 1));
			}
		}
	}
	
	function test()
	{
		$this->load->library('email');
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = "text";
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "BLPROWMBX01.bni-life.co.id";
	  $config['smtp_port'] = "25";
    $config['newline']  = "\r\n";
		$config['crlf']     = "\n";
		$this->email->initialize($config); 
		$post['c_nama'] = "Test";
		$post['c_email'] = "test@gmail.com";
		$post['c_hp'] = "123123123";
		$post['c_usia'] = "33";
		$post['c_kota'] = "Jakarta";
		$post['c_judul'] = "Test Subject";
		$post['c_pesan'] = "Test Pesan Test Pesan";
		$this->email->from('website@bni-life.co.id');
		$to = GetValue("to_email","email_recipient",array("id"=> "where/1"));
		$this->email->to($to);
		$this->email->subject('Contact - Website BNI LIfe');
		$message = "<table><tr><td>Nama</td><td>:</td><td>".$post['c_nama']."</td></tr>";
		//$message .= "<tr><td>Email</td><td>:</td><td>".base64_decode($post['c_email'])."</td></tr>";
		//$message .= "<tr><td>No HP</td><td>:</td><td>".$post['c_hp']."</td></tr>";
		$message .= "<tr><td>Usia</td><td>:</td><td>".$post['c_usia']."</td></tr>";
		$message .= "<tr><td>Lokasi</td><td>:</td><td>".$post['c_kota']."</td></tr>";
		$message .= "<tr><td>Subject</td><td>:</td><td>".$post['c_judul']."</td></tr>";
		$message .= "<tr><td>Isi Pesan</td><td>:</td><td>".$post['c_pesan']."</td></tr></table>";
		$message = html_entity_decode($message);
		
		$message = "Nama : ".$post['c_nama']."\n\r";
		$message .= "Email : ".$post['c_email']."\n\r";
		$message .= "No HP : ".$post['c_hp']."\n\r";
		$message .= "Usia : ".$post['c_usia']."\n\r";
		$message .= "Lokasi : ".$post['c_kota']."\n\r";
		$message .= "Subject : ".$post['c_judul']."\n\r";
		$message .= "Pesan : ".$post['c_pesan']."\n\r";
		//die($message);
		$this->email->message($message);
		print_mz($this->email);
		if($this->email->send()) die("OK");
		else print_mz($this->email->print_debugger());
		die("EMAIL");
	}
}
