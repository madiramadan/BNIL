<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perlindungan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	function index()
  {
    $this->main();
  }
  
	public function main($slug="individu",$tab="")
	{
		$data = GetHeaderFooter();
    $data['main'] = 'perlindungan';
    if($slug=="individu") $data['flag'] = 4;
    else if($slug=="kumpulan") $data['flag'] = 14;
    else if($slug=="syariah") $data['flag'] = 12;
    if($tab) $data['flag'] = GetValue("id","product_cat",array("slug"=> "where/".$tab));
    $data['bhs'] = GetBahasa("perlindungan");
    $data['id_kat'] = GetValue("id","product_cat",array("slug"=> "where/".$slug));
		$this->load->view('template', $data);
	}
	
	public function detail($slug=NULL)
	{
		$data = GetHeaderFooter();
    $data['main'] = 'perlindungan_detail';
    $q = GetAll("product",array("slug"=> "where/".$slug, "is_publish"=> "where/1", "is_delete"=> "where/0"));
    if($q->num_rows()==0) $q = GetAll("product",array("slug_eng"=> "where/".$slug, "is_publish"=> "where/1", "is_delete"=> "where/0"));
    if($q->num_rows() > 0) {
    	$data['val'] = $q->result_array()[0];
    } else redirect(lang_url('perlindungan'));
    // recaptcha
    $this->load->library('recaptcha');
    $data['bhs'] = GetBahasa("perlindungan");
		$data['recaptcha'] = $this->recaptcha->getWidget();
		$this->load->view('template', $data);
	}
	
	function submit()
	{
		$post = $this->input->post();
		$linksumber = $post['linksumber'];
		$sumber = "";
		
		if($post['c_sumber'] == "bnilife")
		{
			$sumber = "Website BNI Life";
		}
		else
		{
			$sumber = $post['c_sumber'];
		}
		
		$ins = array("nama"=> $post['c_nama'], "email"=> $post['c_email'], "no_hp"=> $post['c_hp'], "lokasi"=> $post['c_kota'], "usia"=> $post['c_usia'], 
		"subjek"=> $post['c_judul'], "pesan"=> $post['c_pesan'],"sumber"=> $sumber, "create_user_id"=> $post['id_produk']);
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
			$to = GetValue("to_email","email_recipient",array("id"=> "where/2"));
			$this->email->to($to);
			//$this->email->bcc("mazhtersevents@gmail.com");
			$this->email->subject('Contact - Website BNI LIfe');
			$produk = GetValue("title","product",array("id"=> "where/".$post['id_produk']));
			$message = "Produk : ".$produk."\n\r";
			$message .= "Nama : ".$post['c_nama']."\n\r";
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
		$slug = GetValue("slug","product",array("id"=> "where/".$post['id_produk'], "is_publish"=> "where/1", "is_delete"=> "where/0"));
		//redirect(lang_url('perlindungan/detail/'.$slug));
		redirect(lang_url('thankyoupage/'.$linksumber));
	}
}
