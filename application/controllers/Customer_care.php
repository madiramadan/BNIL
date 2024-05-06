<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_care extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		$data = GetHeaderFooter();
    $data['main'] = 'customer_care';
    $data['bhs'] = GetBahasa("customercare");
    // recaptcha
    $this->load->library('recaptcha');
		$data['recaptcha'] = $this->recaptcha->getWidget();
		$this->load->view('template', $data);
	}
	
	function submit()
	{
		$post = $this->input->post();
		$ins = array("nama"=> $post['c_nama'], "email"=> $post['c_email'], "no_hp"=> $post['c_hp'], "lokasi"=> $post['c_kota'], "usia"=> $post['c_usia'], 
		"subjek"=> $post['c_judul'], "pesan"=> $post['c_pesan'], "create_user_id"=> 0);
		if($this->db->insert("customer_care", $ins)) {
			$this->load->library('email');
			$config['wordwrap'] = TRUE;
			$config['mailtype'] = "text";
			$config['protocol'] = "smtp";
			$config['smtp_host'] = "BLPROWMBX01.bni-life.co.id";
		  $config['smtp_port'] = "25";
	    $config['newline']  = "\r\n";
			$config['crlf']     = "\n";
			$this->email->initialize($config); 
	
			$this->email->from('website@bni-life.co.id');
			$to = GetValue("to_email","email_recipient",array("id"=> "where/1"));
			$this->email->to($to);
			//$this->email->bcc("mazhtersevents@gmail.com");
			$this->email->subject('Contact - Website BNI LIfe');
			$message = "Nama : ".$post['c_nama']."\n\r";
			$message .= "Email : ".$post['c_email']."\n\r";
			$message .= "No HP : ".$post['c_hp']."\n\r";
			$message .= "Usia : ".$post['c_usia']."\n\r";
			$message .= "Lokasi : ".$post['c_kota']."\n\r";
			$message .= "Subject : ".$post['c_judul']."\n\r";
			$message .= "Pesan : ".$post['c_pesan']."\n\r";
			$this->email->message($message);
			$this->email->send();
			$this->session->set_flashdata("pesan", "Pesan Anda sudah terikirim");
		} else $this->session->set_flashdata("pesan", "Pesan Anda GAGAL terikirim, silahkan coba lagi");
		redirect(lang_url('customer_care'));
	}
}
