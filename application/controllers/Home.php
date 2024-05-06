<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function index()
  {
    $this->main();
  }
  
	public function main()
	{
		if($this->uri->segment(1)=="") redirect(lang_url('home'));
    $data = GetHeaderFooter();
    $useragent=$_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
			$data['main'] = 'home_mobile';
		} else $data['main'] = 'home';
    $bahasa=array();
    $q = GetAll("translation_manager",array("grup"=> "where/home"));
    foreach($q->result_array() as $r) {
    	$bahasa[$r['id']] = nl2br($r['text'.GetLang()]);
    }
    $data['bahasa'] = $bahasa;
		$this->load->view('template', $data);
	}
	
	public function mobile()
	{
		if($this->uri->segment(1)=="") redirect(lang_url('home'));
    $data = GetHeaderFooter();
		$data['main'] = 'home_mobile';
		$bahasa=array();
    $q = GetAll("translation_manager",array("grup"=> "where/home"));
    foreach($q->result_array() as $r) {
    	$bahasa[$r['id']] = nl2br($r['text'.GetLang()]);
    }
    $data['bahasa'] = $bahasa;
		$this->load->view('template', $data);
	}
	
	function cekHP($w=NULL) {
		if($w < 800) return 1;
		else return 0;
		/*
		$uri_string = site_url(uri_string())."/";
		if(!$w) {
			echo "<script type='text/javascript' language='JavaScript'>
			window.location=\"$uri_string\"+screen.width;
			</script>";
		} else if($w < 800) return 1;*/
		
	}
	
	function welcome()
	{
		redirect(lang_url(""));
	}
	
	function video() {
		$flag=0;
		$xx = json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/search?key=AIzaSyDcJN5e_tt-LFOigqgPFsg9mLEq6GnC7yw&channelId=UCFBKohX52ePqnFRMwm56saQ&part=snippet,id&order=date&maxResults=10"));
    foreach($xx->items as $yy) {
    	//Cek Video
    	$cek = GetValue("id","video",array("link"=> "like/".$yy->id->videoId));
    	if(!$cek) {
    		$flag=1;
    		$id = GetValue("id","video",array("id"=> "order/desc", "limit"=> "0/1"))+1;
      	$ins = array("id"=> $id, "contents"=> "", "file"=> "", "is_featured"=> 0, "create_user_id"=> 0, "modify_user_id"=> 0, "id_video_cat"=> 1, "is_publish"=> 1, "link"=> "https://www.youtube.com/embed/".$yy->id->videoId, "title"=> $yy->snippet->title, "title_eng"=> $yy->snippet->title, "headline"=> $yy->snippet->description,
      	"headline_eng"=> $yy->snippet->description, "seo_title"=> $yy->snippet->title, "seo_title_eng"=> $yy->snippet->title, "seo_desc"=> $yy->snippet->description, "seo_desc_eng"=> $yy->snippet->description,
      	"slug"=> url_title($yy->snippet->title), "publish_date"=> date("Y-m-d H:i:s"), "create_date"=> date("Y-m-d H:i:s"), "is_delete"=> 0);
      	if($this->db->insert("video", $ins)) echo "Tambah Video Berhasil ".$yy->id->videoId."<br>";
      	else echo "Tambah Video GAGAL ".$yy->id->videoId."<br>";
      }
    }
    if(!$flag) echo "Tidak ada video baru";
    echo "<br>Waktu : ".date("Y-m-d H:i:s");
	}
}
