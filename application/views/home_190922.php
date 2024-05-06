<style>
.proteksi_hover:hover{-o-transition:.5s;-ms-transition:.5s;-moz-transition:.5s;-webkit-transition:.5s;transition:.5s;transform: scale(1.22);}
</style>
        <section class="main-slider main-slider-three" style="margin-top:0px;">
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
    "effect": "slide",
    "pagination": {
        "el": "#main-slider-pagination",
        "type": "bullets",
        "clickable": true
      },
    "navigation": {
        "nextEl": ".main-slider-button-next-utama",
        "prevEl": ".main-slider-button-prev-utama",
        "clickable": true
    },
    "autoplay": {
        "delay": 8000
    }}'>
                <div class="swiper-wrapper">
                		<?php
                		$q = GetAll("banner", array("is_publish"=> "where/1", "urutan"=> "order/asc"));
		                foreach($q->result_array() as $r) {
		                	$clr=$r['warna_head']=="#f7f7f7" ? "color:#F15922;" : "";?>
	                    <div class="swiper-slide">
	                        <div class="image-layer" style="background-image: url('<?php echo base_url()."uploads/".$r['file'];?>');"></div>
	                        <div class="container">
	                            <div class="swiper-slide__inner swiper-slide__inner-home">
	                                <div class="row">
	                                    <div class="col-xl-12 text-left mb-slider">
	                                    		<?php if(!preg_match("/Bella/",$r['contents'.getLang()])) {?>
	                                        <p style="background:<?php echo $r['warna_head'].";".$clr;?>"><?php echo $r['title'.getLang()];?></p>
	                                      	<?php }?>
	                                        <h2 style="text-shadow:2px 2px 1px #fff;color:<?php echo $r['warna_caption'];?>">
	                                        	<?php 
	                                        	$headline = $r['headline'.getLang()];
	                                        	$headline = str_replace("Bella","<span class='font_bella'>Bella</span>",$headline);
	                                        	echo nl2br($headline);?>
	                                        </h2>
	                                        <?php
	                                        if(preg_match("/Bella/",$r['contents'.getLang()])) $bil="ngobrol_billa";
	                                        else $bil="";
	                                        
	                                        if($r['contents'.getLang()] != "-" && $r['contents'.getLang()]) {
	                                        ?>
	                                        <!--<a href="#" class="thm-btn btn-selengkapnya <?php echo $bil;?>"><?php echo $r['contents'.getLang()];?>&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right"></i> </a>-->
	                                        <?php } ?>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                   <?php }
	                   ?>
                </div>
                <div class="swiper-pagination" id="main-slider-pagination"></div>
                <div class="main-slider-nav">
                    <div class="main-slider-button-prev-utama"><i class="fa fa-angle-right"></i></div>
                    <div class="main-slider-button-next-utama"><i class="fa fa-angle-right"></i></div>
                </div>
                <div class="info_slider">
                	<div class="infoz">
                		<?php
		                $q = GetAll("banner_info", array("is_publish"=> "where/1", "urutan"=> "order/asc", "limit"=> "0/4"));
		                foreach($q->result_array() as $r) {?>
			                <div class="box_info">
			                	<div class="info_box">
		                			<a href="#section<?php echo $r['urutan'];?>">
				                		<h4 style="color:<?php echo $r['warna_head'];?>"><?php echo strtoupper($r['title'.getLang()]);?></h4>
				                		<p style="color:<?php echo $r['warna_caption'];?>"><?php echo $r['headline'.getLang()];?></p>
				                	</a>
				                </div>
		                	</div>
		                <?php }
		                ?>
                	</div>
                </div>
            </div>
        </section>
        
        <!-- Yang Ingin -->
        <?php
        $bg_awal = GetValue("file", "tahapan", array("is_publish"=> "where/1", "limit"=> "0/1", "id"=> "order/asc"));
		    ?>
        <section style="padding-top:20px;padding-bottom:20px;" id="section1">
        	<!--<div class="bg-ingin" style="background-image:linear-gradient(to bottom, #fff 10%, rgba(255, 255, 255, 0) 15%), url('<?php echo base_url()."uploads/".$bg_awal;?>');background-size:cover; background-repeat:no-repeat;">-->
        	<div class="bg-ingin bg-ing-1" style="min-height:800px;background-image:url('<?php echo base_url()."uploads/".$bg_awal;?>');background-position:right;background-size:contain;background-repeat:no-repeat;"></div>
        	<div class="bg-ingin bg-ing-2"></div>
        	<div class="container-ingin">
              <div class="block-title text-center title-ingin wow bounceInDown" data-wow-delay="200ms" style="margin-top:50px;">
                  <h1 style="color:#F15922;"><?php echo $bahasa[5];?></h2>
              </div>
              <div class="row">
              	<div class="col-md-12">
              		<div class="row">
		                <div class="col-md-6 ingin-left">
		                	<?php
		                	$urut_tahapan=0;
			                $q = GetAll("tahapan", array("is_publish"=> "where/1", "id"=> "order/asc"));
			                foreach($q->result_array() as $r) {
			                	$urut_tahapan++;
			                	?>
			                	<div class="row untuk-kamu">
				                	<div class="col-md-2 col-xs-2">
				                		<img src="<?php echo base_url();?>assets/images/<?php echo $r['icon'];?>" style="width:105% !important;">
				                	</div>
				                	<div class="col-md-9 col-xs-9 label-ingin">
				                		<div class="inginz ing<?php echo $urut_tahapan;?> showz" rel="<?php echo $urut_tahapan;?>" backg="<?php echo $r['file'];?>"><?php echo $r['title'.getLang()];?>
				                		</div>
				                		<div class="detail-ingin det<?php echo $urut_tahapan;?>" style="<?php echo $urut_tahapan==1 ? "display:block;" : "";?>">
				                			<div class="info-ingin"><?php echo $r['headline'.getLang()];?></div>
					                	</div>
				                	</div>
				                </div>
				              <?php }
				              ?>
		                </div>
		                <div class="col-md-5 perlindunganjiwa perlindunganjiwahome">
		                	<!-- Desktop -->
		                	<div class="rowx desktop">
		                		<?php
		                		$urut_produk=0;
		                		$q = GetAll("lifestage",array("id_parent"=>"where/4","id"=>"order/asc"));
		                		foreach($q->result_array() as $r) {
		                			$urut_produk++;
		                			$dis_produk = $urut_produk==1 ? "" : "display:none;";
		                			echo "<div class='row other_produk other_produk".$urut_produk."' style='".$dis_produk."'>";
		                			$ot = GetAll("product",array("id_lifestage"=> "like/-".$r['id']."-", "is_champions"=> "order/desc", "publish_date"=> "order/desc", "limit"=> "0/2"));
		                			foreach($ot->result_array() as $or) {
		                				$size = "";//strlen($or['title'.GetLang()]) > 28 ? "font-size:12px;":"";
			                			?>
					                	<div class="col-md-4 col-xs-12" style="padding-left:0px;padding-right:50px;">
						                	<div class="popular-causes__sinlged">
			                            <div class="popular-causes__imgd">
			                                <div class="label-perlindungan label-perlindungan-2" style="background:#006885;padding-top:20px;border-radius:8px;min-height:75px;box-shadow: 2px 4px 10px #888888;">
			                                    <a href="<?php echo lang_url("perlindungan/detail/".$or['slug']);?>" style="color:#fff;<?php echo $size;?>"><p><?php echo strtoupper($or['title'.GetLang()]);?></p></a>
			                                </div>
			                            </div>
			                        </div>
			                      </div>
			                      <?php
			                    }
			                    ?>
			                    <!-- Perlindungan Lainnya -->
			                    <div class="col-md-4 col-xs-12" style="padding-left:0px;">
					                	<div class="popular-causes__sinlged">
		                            <div class="popular-causes__imgd">
		                            		<div class="border-bulet" style="z-index:1000;right:0px;position:relative;top:-30px;left:77%;border:1px solid #fff;width:25px;height:25px;padding-left:8px;line-height:28px;">
	                            				<a href="<?php echo lang_url("perlindungan");?>"><i class="fa fa-angle-right" style="color:#fff;"></i></a>
	                            			</div>
		                            		<div class="label-perlindungan" style="background:#006885;padding-top:20px;border-radius:8px;min-height:75px;box-shadow: 2px 4px 10px #888888;">
		                                    <a href="<?php echo lang_url("perlindungan");?>" style="color:#fff;"><p>Cek Perlindungan Lainnya</p></a>	                                    
		                                </div>
		                            </div>
		                        </div>
		                      </div>
		                      <?php
			                    echo "</div>";
		                    }
		                    ?>
	                    </div>
		                </div>
		              </div>
		            </div>
		          </div>
          </div>
        </section>
        
        <!-- Proteksi Tepat -->
        <div id="section2"></div>
        <section class="you-can-help" style="padding-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="you-can-help__left">
                            <div class="block-title text-center wow zoomIn" data-wow-delay="200ms">
                                <h2 style="color:#F15922;"><?php echo $bahasa[6];?></h2>
                                <p style="color:#585757;"><?php echo $bahasa[7];?></p>
                            </div>
                            <div class="row">
                            	<?php
                            	$q = GetAll("proteksi_tepat", array("id"=> "order/asc", "is_publish"=> "where/1"));
                            	foreach($q->result_array() as $r) {
                            		?>
	                    					<div class="proteksi col-xl-4 col-lg-4 text-center">
	                    						<div class="three-boxes__single wow fadeInLeft animated" data-wow-delay="100ms">
		                    						<a href="<?php echo lang_url('perlindungan/main/'.strtolower($r['title']));?>">
		                    						<div class="proteksi_hover">
		                    							<img src="<?php echo base_url()."uploads/".$r['file'];?>">
		                    							<h2><?php echo $r['title'.getLang()];?></h2>
		                    						</div>
			                    					<div>
			                    						<p class="ket" style="font-weight:normal;"><?php echo $r['headline'.getLang()];?></p>
			                    						<!--<a href="<?php echo lang_url('perlindungan');?>">Pelajari lebih lanjut</a>-->
			                    					</div>
			                    					</a>
			                    				</div>
	                    					</div>
	                    					<?php
                    					}
                    					?>
                    				</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Bella -->
        <section class="main-slider you-can-help" style="padding-top:80px;" id="section3">
        	<div class="bellahome" style="background-image:url('<?php echo base_url();?>uploads/bg_ngobrol_bareng_billa_biru<?php echo MB_VER;?>.jpg');background-repeat:no-repeat;">
        		<div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
    "effect": "slide",
    "pagination": {
        "el": "#main-slider-pagination2",
        "type": "bullets",
        "clickable": true
      },
    "navigation": {
        "nextEl": ".main-slider-button-next",
        "prevEl": ".main-slider-button-prev",
        "clickable": true
    },
    "autoplay": {
        "delay": 8000
    }}'>
                <div class="swiper-wrapper">
                	<?php
                	$q=GetAll("promo",array("is_publish"=> "where/1", "id_media_cat"=> "where/2", "publish_date"=> "order/desc"));
                	foreach($q->result_array() as $r) {?>
                    <div class="swiper-slide">
                        <!--<div class="image-layer desktop" title="<?php echo $r['title_image'];?>" style="background-image: url(<?php echo base_url()."uploads/promo/".$r['image'];?>);"></div>
                        <div class="image-layer mobile" title="<?php echo $r['title_image_mobile'];?>" style="background-image: url(<?php echo base_url()."uploads/promo/".$r['image_mobile'];?>);"></div>-->
                        <div class="swiper-slide">
		                        <!--<div class="image-layer desktop" style="background-image: url(<?php echo base_url()."uploads/promo/".$r['image'];?>);"></div>
		                        <div class="image-layer mobile" style="background-image: url(<?php echo base_url()."uploads/promo/".$r['image_mobile'];?>);"></div>-->
		                        <div class="container">
		                            <div class="row">
								                		<div class="col-md-4 bella_res"></div>
								                    <div class="col-md-8 bella_res2 lindungi wow zoomIn" data-wow-delay="200ms">
								                      <div class="judul"><?php echo $r['title'.getLang()];?></div>
								                      <a class="btn-color-white ngobrol_billa"><?php echo $r['headline'.getLang()];?></a>
								                    </div>
								                </div>
		                        </div>
		                    </div>
                    </div>
                  <?php }
                  ?>
                </div>
                <div class="main-slider-nav nav-banner nav-billa">
                    <div class="main-slider-button-prev"><i class="fa fa-angle-right"></i></div>
                    <div class="main-slider-button-next"><i class="fa fa-angle-right"></i> </div>
                </div>
            </div>
          </div>
        </section>
        <!--<section class="you-can-help" id="section3" >
        	<div class="bg-billa" style="background-image:url('<?php echo base_url();?>uploads/bg_ngobrol_bareng_bella.jpg');background-size:cover;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                		<div class="col-md-4"></div>
                    <div class="col-md-8 lindungi wow zoomIn" data-wow-delay="200ms">
                      <div class="judul">Lindungi Karyawanmu Tanpa Harus Ribet</div>
                      <a href="#" class="btn-color-white">Ngobrol Bareng Bella Yuk!</a>
                    </div>
                </div>
            </div>
          </div>
        </section>-->

				<!-- Layanan Mudah -->
        <section class="you-can-help">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="you-can-help__left">
                            <div class="block-title text-center wow fadeInRightBig" data-wow-delay="200ms">
                                <h2><?php echo $bahasa[8];?></h2>
                            </div>
                          	<div class="tab text-center">
                          		<a class="linklayanan aktif wow zoomIn" data-wow-delay="100ms" rel="1"><?php echo $bahasa[20];?></a>
                          		<a class="linklayanan wow zoomIn" data-wow-delay="300ms" rel="2"><?php echo $bahasa[21];?></a>
                          		<a class="linklayanan wow zoomIn" data-wow-delay="500ms" rel="3"><?php echo $bahasa[22];?></a>
                          	</div>
                          	<div class="layananz layanan1 container">
								            	<div class="row">
									                <div class="col-xl-12 text-center">
									                	<h4><?php echo $bahasa[23];?></h4>
									                	<p class="ket"><?php echo $bahasa[24];?></p>
									                	<div class="row text-center stepz">
									                		<?php
				                            	$q = GetAll("beragam_kemudahan", array("id"=> "order/asc", "is_publish"=> "where/1", "limit"=> "0/3"));
				                            	foreach($q->result_array() as $r) {
				                            		?>
					                    					<div class="proteksi col-xl-4 col-lg-4">
					                    						<div>
					                    							<img src="<?php echo base_url()."uploads/".$r['file'];?>">
					                    						</div>
						                    					<div>
						                    						<h2><?php echo $r['title'.getLang()];?></h2>
						                    						<p class="ket"><?php echo $r['headline'.getLang()];?></p>
						                    					</div>
					                    					</div>
					                    					<?php
				                    					}
				                    					?>
				                    					<div class="col-md-12 stepz">
				                    						<p class="ket"><?php echo $bahasa[25];?></p>
				                    						<a href="<?php echo lang_url('klaim');?>" class="btn-color"><?php echo $bahasa[26];?></a>
				                    					</div>
				                    				</div>
									                </div>
									            </div>
									          </div>
									          <div class="layananz layanan2 container" style="display:none;">
								            	<div class="row">
									                <div class="col-xl-12 text-center">
									                	<?php
			                            	$q = GetAll("beragam_kemudahan", array("id"=> "order/asc", "is_publish"=> "where/1", "limit"=> "3/1"));
			                            	foreach($q->result_array() as $r) {
			                            		?>
				                    					<img src="<?php echo base_url()."uploads/".$r['file'];?>">
				                    					<?php
			                    					}
			                    					?>
									                </div>
									            </div>
									          </div>
									          <div class="layananz layanan3 container" style="display:none;">
								            	<div class="row">
									                <div class="col-xl-12 text-center">
									                	<div class="tab2 text-center">
									                		<?php
									                		//$q = GetAll("contact_view",array("id_contact"=> "where/2", "province"=> "group", "id_province"=> "order/asc"));
									                		$q = GetAll("contact_view",array("id_contact"=> "where/2", "city"=> "order/asc"));
									                		$temp_id=0;$opt_lokasi=array();
									                		foreach($q->result_array() as $key=> $r) {
									                			if($temp_id != $r['id_province']) {
									                				$temp_id=$r['id_province'];
										                			//if($key==0) echo "<a class='lokasi aktif' rel='".$r['id_province']."'>".$r['nama']."</a>";
										                			//else echo "<a class='lokasi' rel='".$r['id_province']."'>".$r['nama']."</a>";
										                			$opt_lokasi[$r['id_province']] = $r['nama'];
										                		}
									                		}
									                		echo form_dropdown("lokasiz",$opt_lokasi,31,"class='lokasi form-controls'");
									                		?>
				                          	</div>
									                	<iframe id="mapframe" src="<?php echo site_url('maps');?>" height="450" width="100%" frameborder="no" scrolling="no"></iframe>
									                </div>
									            </div>
									          </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <!-- Promo -->
        <section class="main-slider you-can-help" style="padding-top:80px;" id="section4">
        		<div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
    "effect": "slide",
    "pagination": {
        "el": "#main-slider-pagination2",
        "type": "bullets",
        "clickable": true
      },
    "navigation": {
        "nextEl": ".main-slider-button-next",
        "prevEl": ".main-slider-button-prev",
        "clickable": true
    },
    "autoplay": {
        "delay": 8000
    }}'>
                <div class="swiper-wrapper">
                	<?php
                	$q=GetAll("promo",array("is_publish"=> "where/1", "id_media_cat"=> "where/1", "publish_date"=> "order/desc"));
                	foreach($q->result_array() as $r) {?>
                    <div class="swiper-slide">
                        <!--<div class="image-layer desktop" title="<?php echo $r['title_image'];?>" style="background-image: url(<?php echo base_url()."uploads/promo/".$r['image'];?>);"></div>
                        <div class="image-layer mobile" title="<?php echo $r['title_image_mobile'];?>" style="background-image: url(<?php echo base_url()."uploads/promo/".$r['image_mobile'];?>);"></div>-->
                        <div class="container_full">
                            <div class="swiper-slide__inner" style="padding-top:0px;padding-bottom:0px;">
                                <div class="row">
                                    <div class="col-xl-12 text-center">
                                       <a href="<?php echo lang_url("promo");?>">
	                                       <img class="desktop" src="<?php echo base_url()."uploads/promo/".$r['image'];?>" width="100%">
	                                       <img class="mobile" src="<?php echo base_url()."uploads/promo/".$r['image_mobile'];?>" width="100%">
	                                      </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php }
                  ?>
                </div>
                <div class="main-slider-nav nav-banner">
                    <div class="main-slider-button-prev"><i class="fa fa-angle-right"></i></div>
                    <div class="main-slider-button-next"><i class="fa fa-angle-right"></i> </div>
                </div>
            </div>
        </section>
        <!--<section class="you-can-help">
        	<img src="<?php echo base_url();?>assets/images/banner.jpg" width="100%">
        </section>-->
        
        <!-- Video -->
        <section class="you-can-help" style="padding-top:0px;">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left">
                          <div class="block-title text-center wow zoomIn" data-wow-delay="100ms">
                              <h2 style="color:#F15922;"><?php echo $bahasa[9];?></h2>
                              <p style="color:#585757;"><?php echo $bahasa[10];?></p>
                          </div>
                          <div class="row">
                  					<div class="col-md-6">
                  						<?php
                  						/*$xx = json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/search?key=AIzaSyDcJN5e_tt-LFOigqgPFsg9mLEq6GnC7yw&channelId=UCFBKohX52ePqnFRMwm56saQ&part=snippet,id&order=date&maxResults=10"));
											        foreach($xx->items as $yy) {
											        	//Cek Video
											        	$cek = GetValue("id","video",array("link"=> "like/".$yy->id->videoId));
											        	if(!$cek) {
											        		$id = GetValue("id","video",array("id"=> "order/desc", "limit"=> "0/1"))+1;
												        	$ins = array("id"=> $id, "contents"=> "", "file"=> "", "is_featured"=> 0, "create_user_id"=> 0, "modify_user_id"=> 0, "id_video_cat"=> 1, "is_publish"=> 1, "link"=> "https://www.youtube.com/embed/".$yy->id->videoId, "title"=> $yy->snippet->title, "title_eng"=> $yy->snippet->title, "headline"=> $yy->snippet->description,
												        	"headline_eng"=> $yy->snippet->description, "seo_title"=> $yy->snippet->title, "seo_title_eng"=> $yy->snippet->title, "seo_desc"=> $yy->snippet->description, "seo_desc_eng"=> $yy->snippet->description,
												        	"slug"=> url_title($yy->snippet->title), "publish_date"=> date("Y-m-d H:i:s"), "create_date"=> date("Y-m-d H:i:s"), "is_delete"=> 0);
												        	$this->db->insert("video", $ins);
												        }
											        }*/
											        $wof="";
                  						$q = GetAll("video", array("is_publish"=> "where/1", "publish_date"=> "order/desc", "is_delete"=> "where/0", "limit"=> "0/4"));
                  						foreach($q->result_array() as $k=> $r) {
                  							if($k==0) $wof = $r['link'];?>
	                  						<div class="row videoz <?php echo $k==0 ? "aktif" : "";?> wow fadeInDown" data-wow-delay="100ms" rel="<?php echo $r['id'];?>" alt="<?php echo $r['link'];?>">
								                	<div class="col-md-2 col-xs-3 playbutton">
								                		<img class="img<?php echo $r['id'];?> img" src="<?php echo $k==0 ? base_url()."assets/images/video_play_new.png" : base_url()."assets/images/video_dis_new.png";?>">
								                	</div>
								                	<div class="col-md-9 col-xs-9">
								                		<div class="title_video"><?php echo $r['title'.getLang()];?></div>
								                		<!--<div class="cat_video"><?php echo GetValue("title".getLang(), "video_cat", array("id"=> "where/".$r['id_video_cat']));?></div>-->
								                	</div>
								                </div>
								              <?php }
								              ?>
                  					</div>
                  					<div class="col-md-6 wow fadeInRight" data-wow-delay="300ms">
                  						<iframe class="ytplayer" width="100%" height="400" src="<?php echo $wof;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  					</div>
                  				</div>
                      </div>
                  </div>
              </div>
          </div>
        </section>
        
        <!-- Testimoni -->
        <section class="main-slider you-can-help" style="padding-top:120px;">
        		<div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
    "effect": "slide",
    "pagination": {
        "el": "#testi-slider-pagination",
        "type": "bullets",
        "clickable": true
      },
    "autoplay": {
        "delay": 4000
    }}'>
                <div class="swiper-wrapper">
                	<?php
      						$q = GetAll("testimoni", array("is_publish"=> "where/1", "urutan"=> "order/asc"));
      						foreach($q->result_array() as $k=> $r) {?>
                    <div class="swiper-slide">
                        <div class="image-layer desktop" style="background-image: linear-gradient(to left, <?php echo "rgba(".$r['warna_head'].", 0)";?>, <?php echo "rgba(".$r['warna_head'].", 0)";?>, <?php echo "rgba(".$r['warna_head'].", 1)";?>, <?php echo "rgba(".$r['warna_head'].", 1)";?>, <?php echo "rgba(".$r['warna_head'].", 1)";?>), url(<?php echo base_url().'uploads/testimoni/'.$r['image'];?>)"></div>
                        <div class="container">
                            <div class="swiper-slide__inner">
                                <div class="row">
                                    <div class="col-xl-12 box-testi">
                                    	<!--<div class="quote-testi"><i class="fa fa-quote-right"></i></div>-->
                                    	<div class="isi-testi">
                                       	<?php echo $r['contents'.getLang()];?>
                                      </div>
                                      <div class="nama-testi"><?php echo $r['title'.getLang()];?></div>
                                      <div class="umur-testi"><?php echo $r['headline'.getLang()];?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php }
                  ?>
                </div>
                <div class="swiper-pagination" id="testi-slider-pagination"></div>
            </div>
        </section>
        
        <!-- Promo 2 -->
        <?php
        $img_mobile=array();
      	$q = GetAll("bnimobile", array("id"=> "order/asc", "is_publish"=> "where/1"));
      	foreach($q->result_array() as $key=> $r) {
      		$img_mobile[$key] = $r['file'];
				}
				?>
        <section class="you-can-help">
        	<div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                	<!--<img src="<?php echo base_url();?>assets/images/banner2-kiri.jpg" width="100%">-->
                	<div class="hp1 wow fadeInLeft" data-wow-delay="100ms">
                		<img src="<?php echo base_url().'uploads/'.$img_mobile[0];?>" width="100%">
                	</div>
                	<div class="hp2 wow fadeInLeft" data-wow-delay="300ms">
                		<img src="<?php echo base_url().'uploads/'.$img_mobile[1];?>" width="100%">
                	</div>
                </div>
                <div class="col-md-1 desktop"></div>
                <div class="col-md-4 col-xs-12 wow fadeInRight" data-wow-delay="300ms">
                	<div class="banner2-title"><?php echo $bahasa[11];?></div>
                	<div class="banner2-img">
                		<img src="<?php echo base_url().'uploads/'.$img_mobile[2];?>">
                		<img src="<?php echo base_url().'uploads/'.$img_mobile[3];?>">
                	</div>
                	<div class="banner2-ket"><?php echo $bahasa[12];?></div>
                </div>
            </div>
          </div>
        </section>
        
        <!-- Life Blog -->
        <section class="you-can-help">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="you-can-help__left">
                          <div class="block-title text-center wow fadeInRightBig" data-wow-delay="100ms">
                              <h2><?php echo $bahasa[13];?></h2>
                          </div>
                        	<div class="tab text-center">
                        		<a class="linkartikel aktif wow zoomIn" data-wow-delay="100ms" rel="1"><?php echo $bahasa[14];?></a>
                        		<a class="linkartikel wow zoomIn" data-wow-delay="300ms" rel="2"><?php echo $bahasa[15];?></a>
                        		<a class="linkartikel wow zoomIn" data-wow-delay="500ms" rel="3"><?php echo $bahasa[16];?></a>
                        	</div>
							            <div class="artikelz artikel1 container">
							            	<div class="row">
								                <div class="col-xl-12">
								                	<div class="row">
								                		<?php
								                		$img = base_url().'uploads/blog/';
								                		$img2 = base_url().'uploads/articles/';
								                		//$img = "https://www.bni-life.co.id/storage/articles/";
								                		$q = GetAll("blog",array("is_publish"=> "where/1", "publish_date"=> "order/desc", "limit"=> "0/1"));
								                		foreach($q->result_array() as $k=> $r) {
								                			if(file_exists("./uploads/articles/".$r['image'])) $img=$img2;
								                			?>
									                    <div class="col-md-6 col-xs-12">
									                    	<div class="gallery-tow__single">
								                            <div class="gallery-tow__img">
							                                <a href="<?php echo lang_url('blog/detail/'.$r['id']);?>">
							                                	<img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
							                                </a>
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog"><a href="<?php echo lang_url('blog/detail/'.$r['id']);?>"><?php echo $r['title'.getLang()];?></a></div>
				                                    <p class="ket"><?php echo $r['headline'.getLang()];?></p>
								                        </div>
									                    </div>
									                  <?php }
									                  ?>
									                  
									                  <div class="col-md-3 col-xs-6">
									                  <?php
								                		$q = GetAll("blog",array("is_publish"=> "where/1", "publish_date"=> "order/desc", "limit"=> "1/2"));
								                		foreach($q->result_array() as $k=> $r) {
								                			?>
								                        <div class="gallery-tow__single">
								                            <div class="gallery-tow__img">
								                            	<a href="<?php echo lang_url('blog/detail/'.$r['id']);?>">
								                                <img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
								                              </a>
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog-2"><a href="<?php echo lang_url('blog/detail/'.$r['id']);?>"><?php echo $r['title'.getLang()];?></a></div>
				                                    <!--<p class="ket"><?php echo $r['headline'.getLang()];?></p>-->
								                        </div>
								                      <?php 
								                      }
								                    ?>
								                    </div>
								                    <div class="col-md-3 col-xs-6">
									                  <?php
								                		$q = GetAll("blog",array("is_publish"=> "where/1", "publish_date"=> "order/desc", "limit"=> "3/2"));
								                		foreach($q->result_array() as $k=> $r) {
								                			?>
								                        <div class="gallery-tow__single">
								                            <div class="gallery-tow__img">
							                                <a href="<?php echo lang_url('blog/detail/'.$r['id']);?>">
							                                	<img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
							                                </a>
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog-2"><a href="<?php echo lang_url('blog/detail/'.$r['id']);?>"><?php echo $r['title'.getLang()];?></a></div>
				                                    <!--<p class="ket"><?php echo $r['headline'.getLang()];?></p>-->
								                        </div>
								                      <?php 
								                      }
								                    ?>
								                    </div>
								                  </div>
								                </div>
								                <div class="col-md-12 text-center"><br>
										  						<a href="<?php echo lang_url('blog');?>" class="btn-color" style="cursor:pointer;"><?php echo !getLang() ? "Artikel Lainnya" : "Other Articles";?></a>
										  						<br><br>
										  					</div>
								            </div>
								          </div>
								          <div class="artikelz artikel2 container" style="display:none;">
							            	<div class="row">
								                <div class="col-xl-12">
								                	<div class="row">
								                		<?php
								                		$img = base_url().'uploads/media/';
																		$img2 = base_url().'uploads/medias/';
								                		$q = GetAll("media",array("is_publish"=> "where/1", "id_media_cat"=> "where/2", "publish_date"=> "order/desc", "limit"=> "0/1"));
								                		foreach($q->result_array() as $k=> $r) {
								                			if(file_exists("./uploads/medias/".$r['image'])) $img=$img2;
								                			?>
									                    <div class="col-md-6 col-xs-12">
									                    	<div class="gallery-tow__single">
								                            <div class="gallery-tow__img">
								                            	<a href="<?php echo lang_url('ruangmedia/detail/'.$r['id']);?>">
								                                <img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
								                              </a>
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog"><a href="<?php echo lang_url('ruangmedia/detail/'.$r['id']);?>"><?php echo $r['title'.getLang()];?></a></div>
				                                    <p class="ket"><?php echo $r['headline'.getLang()];?></p>
								                        </div>
									                    </div>
									                  <?php }
									                  ?>
									                  
									                  <div class="col-md-3 col-xs-6">
									                  <?php
								                		$q = GetAll("media",array("is_publish"=> "where/1", "id_media_cat"=> "where/2", "publish_date"=> "order/desc", "limit"=> "1/2"));
								                		foreach($q->result_array() as $k=> $r) {
								                			?>
								                        <div class="gallery-tow__single">
								                            <div class="gallery-tow__img">
								                            	<a href="<?php echo lang_url('ruangmedia/detail/'.$r['id']);?>">
								                                <img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
								                              </a>
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog-2"><a href="<?php echo lang_url('ruangmedia/detail/'.$r['id']);?>"><?php echo $r['title'.getLang()];?></a></div>
				                                    <!--<p class="ket"><?php echo $r['headline'.getLang()];?></p>-->
								                        </div>
								                      <?php 
								                      }
								                    ?>
								                    </div>
								                    <div class="col-md-3 col-xs-6">
									                  <?php
								                		$q = GetAll("media",array("is_publish"=> "where/1", "id_media_cat"=> "where/2", "publish_date"=> "order/desc", "limit"=> "3/2"));
								                		foreach($q->result_array() as $k=> $r) {
								                			?>
								                        <div class="gallery-tow__single">
								                            <div class="gallery-tow__img">
								                            	<a href="<?php echo lang_url('ruangmedia/detail/'.$r['id']);?>">
								                                <img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
								                              </a>
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog-2"><a href="<?php echo lang_url('ruangmedia/detail/'.$r['id']);?>"><?php echo $r['title'.getLang()];?></a></div>
				                                    <!--<p class="ket"><?php echo $r['headline'.getLang()];?></p>-->
								                        </div>
								                      <?php 
								                      }
								                    ?>
								                    </div>
								                  </div>
								                </div>
								                <div class="col-md-12 text-center"><br>
										  						<a href="<?php echo lang_url('ruangmedia');?>" class="btn-color" style="cursor:pointer;"><?php echo !getLang() ? "Berita Lainnya" : "Other News";?></a>
										  						<br><br>
										  					</div>
								            </div>
								          </div>
								          <div class="artikelz artikel3 container" style="display:none;">
							            	<div class="row">
								                <div class="col-xl-12">
								                	<div class="row">
								                		<?php
								                		$img = base_url().'uploads/award/';
								                		$img2 = base_url().'uploads/awards/';
								                		$q = GetAll("award",array("date"=> "order/desc", "limit"=> "0/8"));
								                		foreach($q->result_array() as $k=> $r) {
								                			if(file_exists("./uploads/awards/".$r['image'])) $img=$img2;
								                			?>
									                    <div class="col-xs-6 col-lg-3 box_blog_lain box_media_lain">
												              	<div class="box_image">
													              	<img src="<?php echo $img.$r['image'];?>" alt="<?php echo $r['title_image'];?>" title="<?php echo $r['title_image'];?>">
													              </div>
																	      <div class="tgl"><?php echo FormatTanggalShort(substr($r['date'],0,10));?></div>
													              <div class="judul"><?php echo $r['description'.getLang()];?></div>
														          </div>
									                    <?php }
									                  ?>
								                  </div>
								                </div>
								                <div class="col-md-12 text-center"><br>
										  						<a href="<?php echo lang_url('penghargaan');?>" class="btn-color" style="cursor:pointer;"><?php echo !getLang() ? "Penghargaan Lainnya" : "Other Awards";?></a>
										  						<br><br>
										  					</div>
								            </div>
								          </div>
								        </div>
								    </div>
								</div>
          	</div>
        </section>
        
        <!-- Company Group -->
        <section class="you-can-help">
	        	<div class="container" style="max-width:1265px;">
	            <div class="row">
	              <div class="col-xl-12">
	              	<div class="block-title text-center wow bounceInDown" data-wow-delay="200ms">
	                    <h2 style="color:#F15922;"><?php echo $bahasa[17];?></h2>
	                    <p style="color:#585757;"><?php echo $bahasa[18];?></p>
	                </div>
			            <div class="brand-one__container">
			                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"loop": false, "spaceBetween": 0, "slidesPerView": 6, "autoplay": { "delay": 5000 }, "breakpoints": {
			                    "0": {
			                        "slidesPerView": 2
			                    },
			                    "375": {
			                        "slidesPerView": 2
			                    },
			                    "575": {
			                        "slidesPerView": 3
			                    },
			                    "767": {
			                        "slidesPerView": 4
			                    },
			                    "991": {
			                        "slidesPerView": 5
			                    },
			                    "1199": {
			                        "slidesPerView": 6
			                    }
			                }}'>
			                    <div class="swiper-wrapper">
			                    	<?php
			                    	$q = GetAll("company_group", array("is_publish"=> "where/1", "is_delete"=> "where/0", "urutan"=> "order/asc"));
			                    	foreach($q->result_array() as $r) {?>			                    	
			                        <div class="swiper-slide">
			                            <div class="brand-one__img">
			                            	<a href="<?php echo $r['link'];?>" target="_blank">
			                                <img src="<?php echo base_url().'uploads/company_group/'.$r['image'];?>" title="<?php echo $r['title_image'];?>" alt="<?php echo $r['title_image'];?>">
			                              </a>
			                            </div>
			                        </div>
			                      <?php }
			                      ?>
			                    </div>
			                </div>
			            </div>
			          </div>
			        </div>
			      </div>
        </section>
        
        <!-- Saham -->
        <section class="brand-one">
            <div class="container">
							<div id="saham"></div>
						</div>
        </section>
        
        <script>
		    var temp_ingin_awal=1;
				$(document).ready(function(){
					//$(".mylivechat_inline").hide();
					/*$(".livechat").click(function(){
						$(this).hide();
						$("#BoxLiveChat").show();
					});*/
					$("#saham").load("<?php echo site_url('saham');?>");
		    	$(".inginz").click(function(){
						clearInterval(myVar);
						var rel = $(this).attr("rel");
						var backg = $(this).attr("backg");
						$(".inginz").removeClass("showz");
						$(".ing"+rel).addClass("showz");
						$(".other_produk").hide();
						$(".other_produk"+rel).show();
						$(".det"+temp_ingin_awal).slideUp();
						$(".det"+temp_ingin).slideUp();
						$(".det"+rel).slideDown(400);
						
						var flag2 = parseInt(flag)+1;
						if(flag2==3) flag2=1;
						$(".bg-ing-"+flag).fadeOut(1000);
						$(".bg-ing-"+flag2).attr("style","min-height:800px;display:none;background-image:url('<?php echo base_url();?>uploads/"+backg+"');background-position:right;background-size:contain;background-repeat:no-repeat;");
						$(".bg-ing-"+flag2).fadeIn(2000);
						
						flag=flag2;
						temp_ingin_awal=rel;
						temp_ingin=rel;
					});
					
					$(".linklayanan").click(function(){
						$(".linklayanan").removeClass("aktif");
						$(this).addClass("aktif");
						var rel=$(this).attr("rel");
						$(".layananz").fadeOut();
						$(".layanan"+rel).fadeIn(800);
					});
					
					$(".lokasi").change(function(){
						//$(".lokasi").removeClass("aktif");
						//$(this).addClass("aktif");
						//var rel=$(this).attr("rel");
						var rel=$(this).val();;
						$("#mapframe").attr("src", "<?php echo site_url('maps/main/"+rel+"');?>");
					});
					
					$(".videoz").click(function(){
						$(".videoz").removeClass("aktif");
						$(this).addClass("aktif");
						var rel=$(this).attr("rel");
						$(".img").attr("src","<?php echo base_url();?>assets/images/video_dis_new.png");
						$(".img"+rel).attr("src","<?php echo base_url();?>assets/images/video_play_new.png");
						$(".ytplayer").attr("src",$(this).attr("alt")+"?autoplay=0");
					});
					
					$(".linkartikel").click(function(){
						$(".linkartikel").removeClass("aktif");
						$(this).addClass("aktif");
						var rel=$(this).attr("rel");
						$(".artikelz").fadeOut();
						$(".artikel"+rel).fadeIn(800);
					});
					
					$(".halaman li").click(function(){
						$(".halaman li").removeClass("aktif");
						$(this).addClass("aktif");
						var rel=$(this).attr("rel");
						$(".pgtes").fadeOut(0);
						$(".pgtes"+rel).fadeIn(500);
					});
					var temp_tahapan=0;
					$(".main-slider-button-next").click(function(){
						//var vl = $("#temp_tahapan").val();
						var th = parseInt(temp_tahapan) + 1;
						if(th <= 5) {
							$("#tahapan_bg").html("<img src='assets/images/tahapan_"+th+".png'>");
							//$("#temp_tahapan").val(th);
							temp_tahapan=th;
						}
					});
					$(".main-slider-button-prev").click(function(){
						//var vl = $("#temp_tahapan").val();
						var th = parseInt(temp_tahapan) - 1;
						if(th >= 0) {
							$("#tahapan_bg").html("<img src='assets/images/tahapan_"+th+".png'>");
							//$("#temp_tahapan").val(th);
							temp_tahapan=th;
						}
					});
				});
				
				var temp_ingin=1;
				var flag=1;
				var flag2;
				var myVar, myChat, transisi = false;
				myVar = setInterval(inginxx, 6000);
				function inginxx() {
					var rel=temp_ingin;
					var flag2 = parseInt(flag)+1;
					if(flag2==3) flag2=1;
					if(rel==7) temp_ingin=0;
					temp_ingin=parseInt(temp_ingin)+1;
					var backg = $(".ing"+temp_ingin).attr("backg");
					$(".inginz").removeClass("showz");
					$(".ing"+temp_ingin).addClass("showz");
					$(".other_produk").hide();
					$(".other_produk"+temp_ingin).show();
					$(".det"+rel).slideUp();
					$(".det"+temp_ingin).slideDown(400);
					$(".bg-ing-"+flag).fadeOut(1000);
					$(".bg-ing-"+flag2).attr("style","display:none;min-height:800px;background-image:url('<?php echo base_url();?>uploads/"+backg+"');background-position:right;background-size:contain;background-repeat:no-repeat;");
					$(".bg-ing-"+flag2).fadeIn(3000);
					flag=flag2;
				}
				</script>
