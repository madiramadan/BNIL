<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrasi extends CI_Controller {
	
	function blog()
	{
		ini_set('set_time_limit','0');
		ini_set('memory_limit','256M'); // This also needs to be increased in some cases. Can be changed to a higher value as per need)
		ini_set('sqlsrv.ClientBufferMaxKBSize','524288'); // Setting to 512M
		ini_set('pdo_sqlsrv.client_buffer_max_kb_size','524288');
		//die();
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$trans = array("title_translation","slug_translation","excerpt_translation","content_translation","meta_title_translation","meta_description_translation");
		$new_trans = array("title","slug","headline","contents","seo_title","seo_desc");
		$cat = array("3"=> 6, "4"=> 5, "5"=> 4, "6"=> 3, "7"=> 2, "8"=> 1);
		$lang_trans=array();
		$q = GetJoin("articles a","article_category_relations b","b.article_id=a.id AND a.create_date > '2022-08-31 01:00:00'","inner","a.*,b.article_category_id");
		lastq();
		$temp=0;
		//$q = $this->db->query("SELECT * from articles");//a.*, b.article_category_id FROM articles a INNER JOIN article_category_relations b ON b.article_id=a.id");
		foreach($q->result_array() as $r) {
			if($r['id']!=$temp) {
				$temp=$r['id'];
				foreach($trans as $k=> $t) {
					$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
					$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
					if($t != "slug_translation") $ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
				}
				//print_mz($lang_trans);
				
				$ins['id_blog_cat'] = $cat[$r['article_category_id']];
				$ins['image'] = $r['image'];
				$ins['image_mobile'] = $r['image_mobile'] ? $r['image_mobile'] : $r['image'];
				$ins['is_publish'] = $r['published'];
				$ins['create_date'] = $ins['publish_date'] = $r['created_at'];
				$ins['modify_date'] = $r['updated_at'];
				$ins['modify_user_id'] = 0;
				$ins['create_user_id'] = 0;
				$ins['title_image'] = "";
				$ins['title_image_mobile'] = "";
				//lastq();
				//print_mz($ins);
				$db2->insert("blog", $ins);
				//die($db2->last_query());
			}
		}
		die("DONE");
		
	}
	
	function media()
	{
		//die();
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$trans = array("title_translation","slug_translation","excerpt_translation","content_translation","meta_title_translation","meta_description_translation");
		$new_trans = array("title","slug","headline","contents","seo_title","seo_desc");
		$lang_trans=array();
		$q = GetAll("medias");
		foreach($q->result_array() as $r) {
			foreach($trans as $k=> $t) {
				$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
				$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
				if($t != "slug_translation") $ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
			}
			//print_mz($lang_trans);
			
			$ins['id_media_cat'] = $r['media_category_id'];
			$ins['image'] = $r['image'];
			$ins['image_mobile'] = $r['image_mobile'] ? $r['image_mobile'] : $r['image'];
			$ins['is_publish'] = $r['published'];
			$ins['create_date'] = $ins['publish_date'] = $r['created_at'];
			$ins['modify_date'] = $r['updated_at'];
			$ins['modify_user_id'] = 0;
			$ins['create_user_id'] = 0;
			$ins['title_image'] = "";
			$ins['title_image_mobile'] = "";
			//lastq();
			//print_mz($ins);
			$db2->insert("media", $ins);
			//die($db2->last_query());
		}
		die("DONE");
		
	}
	
	function awards()
	{
		//die();
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$trans = array("description_translation");
		$new_trans = array("description");
		$lang_trans=array();
		$q = GetAll("awards");
		foreach($q->result_array() as $r) {
			foreach($trans as $k=> $t) {
				$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
				$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
				if($t != "slug_translation") $ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
			}
			$ins['image'] = $r['image'];
			$ins['awarder_name'] = $r['kepada'];
			$ins['date'] = $r['date'];
			$ins['create_date'] = $r['created_at'];
			$ins['modify_date'] = $r['updated_at'];
			$ins['modify_user_id'] = 0;
			$ins['create_user_id'] = 0;
			$ins['title_image'] = "";
			//print_mz($ins);
			$db2->insert("award", $ins);
		}
		die("DONE");
		
	}
	
	function manajemen()
	{
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$trans = array("description_translation");
		$new_trans = array("description");
		$lang_trans=array();
		$q = GetAll("bni_managements");
		foreach($q->result_array() as $r) {
			foreach($trans as $k=> $t) {
				$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
				$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
				if($t != "slug_translation") $ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
			}
			echo $r['name']."<br><br>";
			echo nl2br($ins['description'])."<br><br>";
			echo nl2br($ins['description_eng'])."<br>";
			echo "<br><br><br>";
		}
		die("DONE");
		
	}
	
	function direktori()
	{
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		//$db2->query("delete from kg_directory where id='2809'");
		//lastq();
		$q = GetAll("rekanans", array("created_at >"=> "where/2020-12-16 02:59:00", "created_at"=> "order/asc"));
		lastq();
		foreach($q->result_array() as $r) {
			$ins['nama'] = $r['name'];
			$ins['phone'] = $r['phone'];
			$ins['address'] = $r['address'];
			$exp = explode(",",$r['latlong']);
			if(isset($exp[1])) {
				$ins['latitude'] = str_replace(" ","",$exp[0]);
				$ins['longitude'] = str_replace(" ","",$exp[1]);
			} else $ins['latitude']=$ins['longitude']="";
			$ins['is_delete'] = 0;
			$ins['id_category'] = GetValue("rekanan_category_id","rekanan_category_relations",array("rekanan_id"=> "where/".$r['id']));
			$ins['category'] = $db2->query("select title from kg_directory_category where id='".$ins['id_category']."'")->result_array()[0]['title'];
			$ins['province'] = strtoupper(GetValue("name","locations",array("id"=> "where/".$r['province'])));
			$ins['id_province'] = $db2->query("select id from kg_provinsi where provinsi='".$ins['province']."'")->result_array()[0]['id'];
			$ins['city'] = str_replace("KAB.","KABUPATEN",strtoupper(GetValue("name","locations",array("id"=> "where/".$r['city']))));
			$ins['id_city'] = $db2->query("select id from kg_kota where kabupaten='".$ins['city']."'")->result_array()[0]['id'];
			$ins['id_type'] = $r['rekanan_jenis_id'];
			$ins['type'] = $db2->query("select title from kg_directory_type where id='".$ins['id_type']."'")->result_array()[0]['title'];
			$ins['id_tags'] = GetValue("rekanan_tag_id","rekanan_tag_relations",array("rekanan_id"=> "where/".$r['id']));
			$ins['tags'] = $db2->query("select title from kg_directory_tags where id='".$ins['id_tags']."'")->result_array()[0]['title'];
			$ins['is_rawat_inap'] = $r['ri'];
			$ins['is_rawat_jalan'] = $r['rj'];
			$ins['is_medical_checkup'] = $r['mcu'];
			$ins['is_optik'] = $r['optik'];
			
			$ins['create_date'] = $r['updated_at'];
			$ins['modify_date'] = $r['updated_at'];
			$ins['modify_user_id'] = $ins['create_user_id'] = 1;
			//lastq();
			$ins['id'] = $db2->query("select TOP(1) id from kg_directory order by id desc")->result_array()[0]['id']+1;
			//print_mz($ins);
			
			$db2->insert("directory", $ins);
		}
		die("DONE");
		
	}
	
	function lelang()
	{
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$q = GetAll("lelangs");
		foreach($q->result_array() as $r) {
			$ins['title'] = $r['title'];
			$ins['file'] = $r['file'];
			$ins['periode'] = $r['periode'];
			$ins['create_date'] = $r['updated_at'];
			$ins['modify_date'] = $r['updated_at'];
			$ins['modify_user_id'] = 0;
			$ins['create_user_id'] = 0;
			//print_mz($ins);
			$db2->insert("lelang", $ins);
			//die($db2->last_query());
		}
		die("DONE");
		
	}
	
	function formulir()
	{
		//die();
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$trans = array("name_translation");
		$new_trans = array("nama");
		$lang_trans=array();
		$q = GetAll("formulirs");
		foreach($q->result_array() as $r) {
			foreach($trans as $k=> $t) {
				$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
				$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
				if($t != "slug_translation") $ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
			}
			$ins['id_formulir'] = $r['formulir_category_id'];
			$ins['from_html'] = $r['html_form'];
			$ins['file'] = $r['file'];
			$ins['create_date'] = $r['created_at'];
			$ins['modify_date'] = $r['updated_at'];
			$ins['modify_user_id'] = 0;
			$ins['create_user_id'] = 0;
			$db2->insert("formulir_view", $ins);
			//die($db2->last_query());lastq();
		}
		die("DONE");
		
	}
	
	function formulir_cat()
	{
		die();
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$trans = array("name_translation","slug_translation");
		$new_trans = array("nama","slug");
		$lang_trans=array();
		$q = GetAll("formulir_categories");
		foreach($q->result_array() as $r) {
			foreach($trans as $k=> $t) {
				$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
				$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
				$ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
			}
			$ins['icon_text'] = $r['icon_text'];
			$ins['create_date'] = $r['created_at'];
			$ins['modify_date'] = $r['updated_at'];
			$db2->insert("formulir", $ins);
			//print_mz($ins);
			
		}
		die("DONE");
	}
	
	function produk()
	{
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$q = GetAll("products");
		foreach($q->result_array() as $r) {
			$db2->where("slug", $r['slug']);
			$db2->update("product", array("brosur"=> $r['brosur']));
			//lastq();
		}
		die();
		$trans = array("title_translation","slug_translation","caption_translation","content_translation","meta_title_translation","meta_description_translation","additional_translation");
		$new_trans = array("title","slug","caption","description","seo","seo_description","informasi");
		//$cat = array("3"=> 6, "4"=> 5, "5"=> 4, "6"=> 3, "7"=> 2, "8"=> 1);
		$lang_trans=array();
		$q = GetJoin("products a","product_category_relations b","b.product_id=a.id","inner","a.*,b.product_category_id");
		$temp=0;
		foreach($q->result_array() as $r) {
			if($r['id']!=$temp) {
				$temp=$r['id'];
				foreach($trans as $k=> $t) {
					$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
					$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
					$ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
				}
				//print_mz($ins);
				$ins['id_category'] = $r['product_category_id'];
				$ins['category'] = GetValue("name","product_categories",array("id"=> "where/".$r['product_category_id']));
				$ins['brosur'] = $r['brosur'];
				$ins['image'] = $r['image'];
				$ins['image_mobile'] = $r['image_mobile'] ? $r['image_mobile'] : $r['image'];
				$ins['is_publish'] = $r['published'];
				$ins['is_champions'] = $r['champion'];
				$ins['create_date'] = $ins['publish_date'] = $r['created_at'];
				$ins['modify_date'] = $r['updated_at'];
				$ins['id_lifestage'] = 0;
				$ins['lifestage'] = "";
				$ins['title_image'] = $ins['brosur'] = "";
				$ins['title_image_mobile'] = "";
				$ins['modify_user_id'] = 0;
				$ins['create_user_id'] = 0;
				//print_mz($ins);
				$db2->insert("product", $ins);
				//lastq();
				//print_mz($ins);
			}
		}
		die("DONE");
		
	}
	
	function produk_cat()
	{
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$trans = array("name_translation","slug_translation","content_translation","meta_title_translation","meta_description_translation","caption_translation");
		$new_trans = array("title","slug","description","seo","seo_description","caption");
		//$cat = array("3"=> 6, "4"=> 5, "5"=> 4, "6"=> 3, "7"=> 2, "8"=> 1);
		$lang_trans=array();
		$q = GetAll("product_categories");
		foreach($q->result_array() as $r) {
			foreach($trans as $k=> $t) {
				$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
				$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
				$ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
			}
			//print_mz($ins);
			$ins['id_parent'] = $r['parent'];
			$ins['image'] = $r['image'];
			$ins['image_mobile'] = $r['image_mobile'] ? $r['image_mobile'] : $r['image'];
			$ins['is_publish'] = $r['published'];
			$ins['create_date'] = $r['created_at'];
			$ins['modify_date'] = $r['updated_at'];
			//print_mz($ins);
			$db2->insert("product_cat", $ins);
			//lastq();
			//print_mz($ins);
		}
		die("DONE");		
	}
	
	function produk_manfaat()
	{
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$trans = array("title_translation","description_translation");
		$new_trans = array("title","description");
		//$cat = array("3"=> 6, "4"=> 5, "5"=> 4, "6"=> 3, "7"=> 2, "8"=> 1);
		$lang_trans=array();
		$q = GetAll("product_manfaats");
		foreach($q->result_array() as $r) {
			foreach($trans as $k=> $t) {
				$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
				$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
				$ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
			}
			$produk = GetValue("title","products",array("id"=> "where/".$r['product_id']));
			$id_produk = $db2->query("select id from kg_product where title='".$produk."'")->result_array()[0]['id'];
			if($id_produk) {
				$ins['id_product'] = $id_produk;
				$ins['slug'] = url_title($ins['title']);
				$ins['slug_eng'] = url_title($ins['title_eng']);
				$ins['image'] = $r['image'];
				$ins['image_mobile'] = $r['image'];
				$ins['is_publish'] = $r['published'];
				$ins['create_date'] = $r['created_at'];
				$ins['modify_date'] = $r['updated_at'];
				$ins['seo']=$ins['seo_eng']=$ins['seo_description']=$ins['seo_description_eng']="";
				$ins['title_image']=$ins['title_image_mobile']="";
				$ins['modify_user_id']=0;
				$ins['create_user_id']=0;
				$ins['publish_date']=date("Y-m-d H:i:s");
				//print_mz($ins);
				$db2->insert("product_manfaat", $ins);
			}
		}
		die("DONE");
	}
	
	function produk_unggulan()
	{
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$trans = array("title_translation","description_translation");
		$new_trans = array("title","description");
		//$cat = array("3"=> 6, "4"=> 5, "5"=> 4, "6"=> 3, "7"=> 2, "8"=> 1);
		$lang_trans=array();
		$q = GetAll("product_unggulans");
		foreach($q->result_array() as $r) {
			foreach($trans as $k=> $t) {
				$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
				$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
				$ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
			}
			$produk = GetValue("title","products",array("id"=> "where/".$r['product_id']));
			$id_produk = $db2->query("select id from kg_product where title='".$produk."'")->result_array()[0]['id'];
			if($id_produk) {
				//die($produk."S");
				$ins['id_product'] = $id_produk;
				$ins['slug'] = url_title($ins['title']);
				$ins['slug_eng'] = url_title($ins['title_eng']);
				$ins['image'] = $r['image'];
				$ins['image_mobile'] = $r['image'];
				$ins['is_publish'] = $r['published'];
				$ins['create_date'] = $r['created_at'];
				$ins['modify_date'] = $r['updated_at'];
				$ins['seo']=$ins['seo_eng']=$ins['seo_description']=$ins['seo_description_eng']="";
				$ins['title_image']=$ins['title_image_mobile']="";
				$ins['modify_user_id']=0;
				$ins['create_user_id']=0;
				$ins['publish_date']=date("Y-m-d H:i:s");
				//print_mz($ins);
				$db2->insert("product_unggulan", $ins);
				//die($db2->last_query());
				//print_mz($ins);
			}
		}
		die("DONE");
	}
	
	function produk_syarat()
	{
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$trans = array("title_translation","description_translation");
		$new_trans = array("title","description");
		//$cat = array("3"=> 6, "4"=> 5, "5"=> 4, "6"=> 3, "7"=> 2, "8"=> 1);
		$lang_trans=array();
		$q = GetAll("product_syarats");
		foreach($q->result_array() as $r) {
			foreach($trans as $k=> $t) {
				$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
				$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
				$ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
			}
			$produk = GetValue("title","products",array("id"=> "where/".$r['product_id']));
			$id_produk = $db2->query("select id from kg_product where title='".$produk."'")->result_array()[0]['id'];
			if($id_produk) {
				$ins['id_product'] = $id_produk;
				$ins['slug'] = url_title($ins['title']);
				$ins['slug_eng'] = url_title($ins['title_eng']);
				$ins['image'] = $r['image'];
				$ins['image_mobile'] = $r['image'];
				$ins['is_publish'] = $r['published'];
				$ins['create_date'] = $r['created_at'];
				$ins['modify_date'] = $r['updated_at'];
				$ins['seo']=$ins['seo_eng']=$ins['seo_description']=$ins['seo_description_eng']="";
				$ins['title_image']=$ins['title_image_mobile']="";
				$ins['modify_user_id']=0;
				$ins['create_user_id']=0;
				$ins['publish_date']=date("Y-m-d H:i:s");
				//print_mz($ins);
				$db2->insert("product_syarat", $ins);
				//die($db2->last_query());
			}
		}
		die("DONE");
	}
	
	
	function laporan_keuangan()
	{
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$trans = array("name_translation");
		$new_trans = array("title");
		$q = GetAll("laporan_keuangans");
		foreach($q->result_array() as $r) {
			foreach($trans as $k=> $t) {
				$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
				$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
				$ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
			}
			$ins['year'] = $r['years'];
			$ins['file'] = $r['file'];
			$ins['create_date'] = $r['created_at'];
			$ins['modify_date'] = $r['updated_at'];
			$ins['modify_user_id'] = 0;
			$ins['create_user_id'] = 0;
			$db2->insert("financial_report", $ins);
			//print_mz($ins);
		}
		die("DONE");		
	}
	
	function laporan_tahunan()
	{
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$trans = array("title_translation","content_translation");
		$new_trans = array("title","content");
		$q = GetAll("laporan_tahunans");
		foreach($q->result_array() as $r) {
			foreach($trans as $k=> $t) {
				$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
				$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
				$ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
			}
			$ins['year'] = $r['years'];
			$ins['file'] = $r['file'];
			$ins['image'] = $r['image'];
			$ins['title_image'] = $r['title'];
			$ins['create_date'] = $r['created_at'];
			$ins['modify_date'] = $r['updated_at'];
			$ins['modify_user_id'] = 0;
			$ins['create_user_id'] = 0;
			$db2->insert("annual_report", $ins);
			//print_mz($ins);
		}
		die("DONE");		
	}
	
	function faq()
	{
		//die();
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$trans = array("name_translation");
		$new_trans = array("nama");
		$lang_trans=array();
		$q = GetAll("faq_categories");
		foreach($q->result_array() as $r) {
			foreach($trans as $k=> $t) {
				$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
				$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
				if($t != "slug_translation") $ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
			}
			$ins['urutan'] = $r['order'];
			$ins['create_date'] = $r['created_at'];
			$ins['modify_date'] = $r['updated_at'];
			$ins['modify_user_id'] = 0;
			$ins['create_user_id'] = 0;
			//print_mz($ins);
			$db2->insert("faq", $ins);
		}
		die("DONE");
		
	}
	
	function faq_view()
	{
		//die();
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$trans = array("question_translation", "answer_translation");
		$new_trans = array("question","answer");
		$lang_trans=array();
		$q = GetAll("faqs");
		foreach($q->result_array() as $r) {
			foreach($trans as $k=> $t) {
				$lang_trans[$t] = str_replace("translatable.","",$r[$t]);
				$ins[$new_trans[$k]] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/id"));
				if($t != "slug_translation") $ins[$new_trans[$k]."_eng"] = GetValue("text","translator_translations",array("item"=> "where/".$lang_trans[$t], "locale"=> "where/en"));
			}
			$id_faq = $r['faq_category_id'] < 17 ? $r['faq_category_id']-3 : $r['faq_category_id']-4;
			$ins['id_faq'] = $id_faq;
			$ins['urutan'] = $r['order'];
			$ins['create_date'] = $r['created_at'];
			$ins['modify_date'] = $r['updated_at'];
			$ins['modify_user_id'] = 0;
			$ins['create_user_id'] = 0;
			$db2->insert("faq_view", $ins);
			//die($db2->last_query());
		}
		die("DONE");
		
	}
	
	function kinerja_dana()
	{
		//die();
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$lang_trans=array();
		$q = GetAll("fund_product_kinerjas", array("created_at >"=> "where/2022-08-16 07:40:14"));
		lastq();
		foreach($q->result_array() as $r) {
			if($r['file']) {
				$ins['is_delete'] =0;
				$ins['id_product'] = $r['fund_product_id'];
				$ins['product'] = GetValue("title","fund_products",array("id"=> "where/".$r['fund_product_id']));
				$ins['periode'] = $r['periode'];
				if(!$r['file']) $ins['file']="";
				else $ins['file'] = $r['file'];
				$ins['create_date'] = $r['created_at'];
				$ins['modify_date'] = $r['updated_at'];
				$ins['modify_user_id'] = 0;
				$ins['create_user_id'] = 0;
				$ins['tinjauan_makro']=$ins['tabel_indikator']=$ins['pembanding']=$ins['grafik_portofolio']=$ins['grafik_bulanan']=$ins['alokasi_asset1']=$ins['alokasi_asset2']=$ins['alokasi_asset3']="";
				$ins['aum']="";
				$ins['id'] = $db2->query("select TOP(1) id from kg_kinerja_bulanan order by id desc")->result_array()[0]['id']+1;
				$db2->insert("kinerja_bulanan", $ins);
				//die($db2->last_query());
			}
		}
		die("DONE");
		
	}
	
	function fun_product()
	{
		die();
		$this->db = $this->load->database('sql_server', TRUE);
		$db2 = $this->load->database('default', TRUE);
		$lang_trans=array();
		$q = GetAll("fund_products");
		foreach($q->result_array() as $r) {
			//if($r['file']) {
				$ins['id_category'] = $r['category_id'];
				$parent = GetValue("parent","fund_product_categories",array("id"=> "where/".$r['category_id']));
				$cat = GetValue("name","fund_product_categories",array("id"=> "where/".$parent));
				$cat .= " > ".GetValue("name","fund_product_categories",array("id"=> "where/".$r['category_id']));
				$ins['category'] = $cat;
				$ins['title'] = $r['title'];
				$ins['content'] = $r['content'];
				if($r['table_column']) $ins['column_nab'] = $r['table_column'];
				else $ins['column_nab'] = "";
				$ins['create_date'] = $r['created_at'];
				$ins['modify_date'] = $r['updated_at'];
				$ins['modify_user_id'] = 0;
				$ins['is_delete'] = 0;
				$db2->insert("fun_product", $ins);
				//die($db2->last_query());
			//}
		}
		die("DONE");
	}
}
