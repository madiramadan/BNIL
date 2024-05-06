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
	                        <div class="image-layer desktop" style="background-image: url('<?php echo base_url()."uploads/".$r['file'];?>');"></div>
	                        <div class="image-layer mobile" style="background-image: url('<?php echo base_url()."uploads/".$r['file_mobile'];?>');"></div>
	                        <div class="container">
	                            <div class="swiper-slide__inner swiper-slide__inner-home">
	                                <div class="row">
	                                    <div class="col-xl-12 text-left">
	                                        <p style="background:<?php echo $r['warna_head'].";".$clr;?>"><?php echo $r['title'.getLang()];?></p>
	                                        <h2 style="color:<?php echo $r['warna_caption'];?>"><?php echo nl2br($r['headline'.getLang()]);?></h2>
	                                        <a href="#" class="thm-btn btn-selengkapnya"><?php echo $r['contents'.getLang()];?>&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right"></i> </a>
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
		    $bg_awal = GetValue("file", "tahapan", array("is_publish"=> "where/1", "limit"=> "0/1"));
		    ?>
        <section style="padding-top:20px;padding-bottom:20px;" id="section1">
        	<!--<div class="bg-ingin" style="background-image:linear-gradient(to bottom, #fff 10%, rgba(255, 255, 255, 0) 15%), url('<?php echo base_url()."uploads/".$bg_awal;?>');background-size:cover; background-repeat:no-repeat;">-->
        	<div class="bg-ingin" style="background-image:url('<?php echo base_url()."uploads/".$bg_awal;?>');background-size:cover; background-repeat:no-repeat;">
        		<!--<div style="background:linear-gradient(180deg, #fff 10%, rgba(255, 255, 255, 0) 90%, #fff 100%);height:200px;"></div>-->
        	</div>
        	<div class="container-ingin">
              <div class="block-title text-center title-ingin wow bounceInDown" data-wow-delay="200ms">
                  <h1 style="color:#F15922;">Untuk Kamu Yang Ingin</h2>
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
				                		<img src="<?php echo base_url();?>assets/images/<?php echo $r['icon'];?>">
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
		                <div class="col-md-6 perlindunganjiwa">
		                	<div class="row">
			                	<div class="col-md-4 col-xs-6">
				                	<div class="popular-causes__sinlged">
	                            <div class="popular-causes__imgd">
	                            		<div class="judul-perlindungan">PERLINDUNGAN JIWA</div>
	                                <img src="<?php echo base_url();?>uploads/bg_perlindungan1.jpg" width="100%" style="border-radius:8px;box-shadow: 2px 10px 20px #888888;">
	                                <div class="label-perlindungan label-perlindungan-2">
	                                    <a href="<?php echo lang_url("perlindungan");?>"><p>BNI LIFE<br>PERISAI PLUS</p></a>
	                                </div>
	                            </div>
	                        </div>
	                      </div>
	                      <div class="col-md-4 col-xs-6">
				                	<div class="popular-causes__sinlged">
	                            <div class="popular-causes__imgd">
	                            		<div class="judul-perlindungan">PERLINDUNGAN JIWA</div>
	                                <img src="<?php echo base_url();?>uploads/bg_perlindungan2.jpg" width="100%" style="border-radius:8px;box-shadow: 2px 10px 20px #888888;">
	                                <div class="label-perlindungan">
	                                    <a href="<?php echo lang_url("perlindungan");?>"><p>BNI LIFE DIGI MICRO PROTECTION</p></a>
	                                </div>
	                            </div>
	                        </div>
	                      </div>
	                      <div class="col-md-4 col-xs-4 desktop">
				                	<div class="popular-causes__sinlged">
	                            <div class="popular-causes__imgd">
	                            		<div class="judul-perlindungan">
	                            			<div class="border-bulet">
	                            				<a href="<?php echo lang_url("perlindungan");?>"><i class="fa fa-angle-right"></i></a>
	                            			</div>
	                            		</div>
	                            		<img src="<?php echo base_url();?>uploads/bg_perlindungan3.jpg" width="100%" style="border-radius:8px;box-shadow: 2px 10px 20px #888888;">
	                                <div class="label-perlindungan">
	                                    <a href="<?php echo lang_url("perlindungan");?>"><p>Cek Perlindungan Lainnya</p></a>
	                                </div>
	                            </div>
	                        </div>
	                      </div>
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
                                <h2 style="color:#F15922;">Proteksi Tepat</h2>
                                <p style="color:#585757;">Kita hadir memberikan proteksi untuk segala kebutuhanmu.</p>
                            </div>
                            <div class="row">
                    					<div class="proteksi col-xl-4 col-lg-4 text-center">
                    						<div class="three-boxes__single wow fadeInLeft animated" data-wow-delay="100ms">
	                    						<div>
	                    							<img src="<?php echo base_url();?>assets/images/vector_individu_new.png">
	                    						</div>
		                    					<div>
		                    						<h2>Individu</h2>
		                    						<p class="ket">Perlindungan tepat buat kamu dan orang tersayang.</p>
		                    						<a href="<?php echo lang_url('perlindungan');?>">Pelajari lebih lanjut</a>
		                    					</div>
		                    				</div>
                    					</div>
                    					<div class="proteksi col-xl-4 col-lg-4 text-center">
                    						<div class="three-boxes__single wow fadeInLeft animated" data-wow-delay="200ms">
	                    						<div>
	                    							<img src="<?php echo base_url();?>assets/images/vector_kumpulan_new.png">
	                    						</div>
		                    					<div>
		                    						<h2>Kumpulan</h2>
		                    						<p class="ket">Buat karyawan merasa aman dan nyaman saat bekerja.</p>
		                    						<a href="<?php echo lang_url('perlindungan');?>">Pelajari lebih lanjut</a>
		                    					</div>
		                    				</div>
                    					</div>
                    					<div class="proteksi col-xl-4 col-lg-4 text-center">
                    						<div class="three-boxes__single wow fadeInLeft animated" data-wow-delay="300ms">
	                    						<div>
	                    							<img src="<?php echo base_url();?>assets/images/vector_syariah_new.png">
	                    						</div>
		                    					<div>
		                    						<h2>Syariah</h2>
		                    						<p class="ket">Proteksi optimal sesuai dengan prinsip syariah.</p>
		                    						<a href="<?php echo lang_url('perlindungan');?>">Pelajari lebih lanjut</a>
		                    					</div>
		                    				</div>
                    					</div>
                    				</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Billa -->
        <section class="main-slider you-can-help" style="padding-top:80px;" id="section3">
        	<div style="background-image:url('<?php echo base_url();?>uploads/bg_ngobrol_bareng_bella.jpg');background-size:cover;background-repeat:no-repeat;">
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
								                		<div class="col-md-4"></div>
								                    <div class="col-md-8 lindungi wow zoomIn" data-wow-delay="200ms">
								                      <div class="judul"><?php echo $r['title'.getLang()];?></div>
								                      <a href="#" class="btn-color-white"><?php echo $r['headline'.getLang()];?></a>
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
          </div>
        </section>
        <!--<section class="you-can-help" id="section3" >
        	<div class="bg-billa" style="background-image:url('<?php echo base_url();?>uploads/bg_ngobrol_bareng_bella.jpg');background-size:cover;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                		<div class="col-md-4"></div>
                    <div class="col-md-8 lindungi wow zoomIn" data-wow-delay="200ms">
                      <div class="judul">Lindungi Karyawanmu Tanpa Harus Ribet</div>
                      <a href="#" class="btn-color-white">Ngobrol Bareng Billa Yuk!</a>
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
                                <h2>Beragam Kemudahan Untuk<br>Kamu Yang Produktif & Dinamis</h2>
                            </div>
                          	<div class="tab text-center">
                          		<a class="linklayanan aktif wow zoomIn" data-wow-delay="100ms" rel="1">Layanan Cepat</a>
                          		<a class="linklayanan wow zoomIn" data-wow-delay="300ms" rel="2">Layanan Mudah</a>
                          		<a class="linklayanan wow zoomIn" data-wow-delay="500ms" rel="3">Akses Dekat</a>
                          	</div>
                          	<div class="layananz layanan1 container">
								            	<div class="row">
									                <div class="col-xl-12 text-center">
									                	<h4>Cuma 25 Menit</h4>
									                	<p class="ket">Tahukah Kamu kalau proses klaim di BNI Life cuma butuh 25 menit aja!<br>Kamu bisa klaim dengan nominal sampai 10 juta rupiah.</p>
									                	<div class="row text-center stepz">
									                		<div class="proteksi col-xl-4 col-lg-4">
				                    						<div>
				                    							<img src="<?php echo base_url();?>assets/images/icon_upload_dokumen_new.png">
				                    						</div>
					                    					<div>
					                    						<h2>Upload Dokumen</h2>
					                    						<p class="ket">Isi dokumen lengkap sesuai persyaratan klaim BNI Life.</p>
					                    					</div>
				                    					</div>
				                    					<div class="proteksi col-xl-4 col-lg-4">
				                    						<div>
				                    							<img src="<?php echo base_url();?>assets/images/icon_verifikasi_new.png">
				                    						</div>
					                    					<div>
					                    						<h2>Verifikasi</h2>
					                    						<p class="ket">Tim kami akan melakukan verifikasi dokumen pengajuan klaim kamu.</p>
					                    					</div>
				                    					</div>
				                    					<div class="proteksi col-xl-4 col-lg-4">
				                    						<div>
				                    							<img src="<?php echo base_url();?>assets/images/icon_proses_new.png">
				                    						</div>
					                    					<div>
					                    						<h2>Proses</h2>
					                    						<p class="ket">Dalam 25 menit klaim akan segera dicairkan ke rekening kamu. Mudah kan?</p>
					                    					</div>
				                    					</div>
				                    					<div class="col-md-12 stepz">
				                    						<p class="ket">*Disclaimer: Dalam Klaim 25 Menit, Pengajuan dengan nominal Rp10.000.000 dana akan diterima langsung dari BNI Life.</p>
				                    						<a href="<?php echo lang_url('klaim');?>" class="btn-color">Pelajari lebih lanjut</a>
				                    					</div>
				                    				</div>
									                </div>
									            </div>
									          </div>
									          <div class="layananz layanan2 container" style="display:none;">
								            	<div class="row">
									                <div class="col-xl-12 text-center">
									                	<img src="<?php echo base_url();?>uploads/layanan_mudah.png" width="100%">
									                </div>
									            </div>
									          </div>
									          <div class="layananz layanan3 container" style="display:none;">
								            	<div class="row">
									                <div class="col-xl-12 text-center">
									                	<div class="tab2 text-center">
									                		<?php
									                		//$q = GetAll("contact_view",array("id_contact"=> "where/2", "province"=> "group", "id_province"=> "order/asc"));
									                		$q = GetAll("contact_view",array("id_contact"=> "where/2", "id_province"=> "order/asc"));
									                		$temp_id=0;
									                		foreach($q->result_array() as $key=> $r) {
									                			if($temp_id != $r['id_province']) {
									                				$temp_id=$r['id_province'];
										                			if($key==0) echo "<a class='lokasi aktif' rel='".$r['id_province']."'>".$r['nama']."</a>";
										                			else echo "<a class='lokasi' rel='".$r['id_province']."'>".$r['nama']."</a>";
										                		}
									                		}
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
        <section class="you-can-help">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left">
                          <div class="block-title text-center wow zoomIn" data-wow-delay="100ms">
                              <h2 style="color:#F15922;">BNI Life Video</h2>
                              <p style="color:#585757;">Temukan video-video inspiratif dari kanal youtube BNI Life.</p>
                          </div>
                          <div class="row">
                  					<div class="col-md-6">
                  						<?php
                  						$wof="";
                  						$q = GetAll("video", array("is_publish"=> "where/1", "publish_date"=> "order/desc"));
                  						foreach($q->result_array() as $k=> $r) {
                  							if($k==0) $wof = $r['link'];?>
	                  						<div class="row videoz <?php echo $k==0 ? "aktif" : "";?> wow fadeInDown" data-wow-delay="100ms" rel="<?php echo $r['id'];?>" alt="<?php echo $r['link'];?>">
								                	<div class="col-md-2 col-xs-3 playbutton">
								                		<img class="img<?php echo $r['id'];?> img" src="<?php echo $k==0 ? base_url()."assets/images/video_play.png" : base_url()."assets/images/video_dis.png";?>">
								                	</div>
								                	<div class="col-md-9 col-xs-9">
								                		<div class="title_video"><?php echo $r['title'.getLang()];?></div>
								                		<div class="cat_video"><?php echo GetValue("title".getLang(), "video_cat", array("is_publish"=> "where/1"));?></div>
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
      						$q = GetAll("testimoni", array("is_publish"=> "where/1", "publish_date"=> "order/desc"));
      						foreach($q->result_array() as $k=> $r) {?>
                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url(<?php echo base_url();?>uploads/bg-testi.jpg);"></div>
                        <div class="container">
                            <div class="swiper-slide__inner">
                                <div class="row">
                                    <div class="col-xl-12 box-testi">
                                    	<div class="quote-testi"><i class="fa fa-quote-right"></i></div>
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
        <section class="you-can-help">
        	<div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                	<!--<img src="<?php echo base_url();?>assets/images/banner2-kiri.jpg" width="100%">-->
                	<div class="hp1 wow fadeInLeft" data-wow-delay="100ms">
                		<img src="<?php echo base_url();?>uploads/hp1.png" width="100%">
                	</div>
                	<div class="hp2 wow fadeInLeft" data-wow-delay="300ms">
                		<img src="<?php echo base_url();?>uploads/hp2.png" width="100%">
                	</div>
                </div>
                <div class="col-md-1 desktop"></div>
                <div class="col-md-4 col-xs-12 wow fadeInRight" data-wow-delay="300ms">
                	<div class="banner2-title">Belum punya BNI Life Mobile?<br>Yuk, unduh sekarang juga.</div>
                	<div class="banner2-img">
                		<img src="<?php echo base_url();?>uploads/appstore.png">
                		<img src="<?php echo base_url();?>assets/images/playstore.png">
                	</div>
                	<div class="banner2-ket">*hanya untuk nasabah kumpulan</div>
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
                              <h2>Kumpulan Artikel</h2>
                          </div>
                        	<div class="tab text-center">
                        		<a class="linkartikel aktif wow zoomIn" data-wow-delay="100ms" rel="1">Blog</a>
                        		<a class="linkartikel wow zoomIn" data-wow-delay="300ms" rel="2">Berita</a>
                        		<a class="linkartikel wow zoomIn" data-wow-delay="500ms" rel="3">Penghargaan</a>
                        	</div>
							            <div class="artikelz artikel1 container">
							            	<div class="row">
								                <div class="col-xl-12">
								                	<div class="row">
								                		<?php
								                		$img = base_url().'uploads/blog/';
																		$img = "https://www.bni-life.co.id/storage/articles/";
								                		$q = GetAll("blog",array("is_publish"=> "where/1", "publish_date"=> "order/desc", "limit"=> "0/1"));
								                		foreach($q->result_array() as $k=> $r) {
								                			?>
									                    <div class="col-md-6 col-xs-12">
									                    	<div class="gallery-tow__single">
								                            <div class="gallery-tow__img">
								                                <img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog"><?php echo $r['title'.getLang()];?></div>
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
								                                <img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog-2"><?php echo $r['title'.getLang()];?></div>
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
								                                <img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog-2"><?php echo $r['title'.getLang()];?></div>
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
																		$img = "https://www.bni-life.co.id/storage/medias/";
								                		$q = GetAll("media",array("is_publish"=> "where/1", "id_media_cat"=> "where/2", "publish_date"=> "order/desc", "limit"=> "0/1"));
								                		foreach($q->result_array() as $k=> $r) {
								                			?>
									                    <div class="col-md-6 col-xs-12">
									                    	<div class="gallery-tow__single">
								                            <div class="gallery-tow__img">
								                                <img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog"><?php echo $r['title'.getLang()];?></div>
				                                    <!--<p class="ket"><?php echo $r['headline'.getLang()];?></p>-->
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
								                                <img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog-2"><?php echo $r['title'.getLang()];?></div>
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
								                                <img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog-2"><?php echo $r['title'.getLang()];?></div>
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
																		$img = "https://www.bni-life.co.id/storage/awards/";
								                		$q = GetAll("award",array("date"=> "order/desc", "limit"=> "0/9"));
								                		foreach($q->result_array() as $k=> $r) {
								                			?>
									                    <div class="col-md-4 col-xs-6">
									                    	<div class="gallery-tow__single">
								                            <div class="gallery-tow__img">
								                            	<img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>" width="300" height="300">
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['modify_date'],0,10));?></div>
				                                    <div class="judul-blog-2"><?php echo $r['description'.getLang()];?></div>
								                        </div>
									                    </div>
									                    <?php }
									                  ?>
								                  </div>
								                </div>
								                <div class="col-md-12 text-center"><br>
										  						<a href="<?php echo lang_url('awards');?>" class="btn-color" style="cursor:pointer;"><?php echo !getLang() ? "Penghargaan Lainnya" : "Other Awards";?></a>
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
	                    <h2 style="color:#F15922;">Group Perusahaan</h2>
	                    <p style="color:#585757;">BNI Life merupakan bagian atau anak perusahaan dari BNI.</p>
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
        
        <img src="<?php echo base_url();?>assets/images/LiveChatSmall.png" class="livechat">
        <div id="BoxLiveChat">
        	<div class="BoxLiveChatFrame">
        		<iframe frameborder="0" width="100%" height="100%" class="egain" src="https://a1.mylivechat.com/livechat2/"></iframe>
        		<!--https://chategain.bni-life.co.id/system/templates/chat/sunburst/chat.html?entryPointId=1001&templateName=sunburst&languageCode=en&countryCode=US&ver=v11"></iframe>-->
        	</div>
        	<div class="closez"><i class="fa fa-times"></i></div>
        </div>
        
        <!-- Chat bot -->
        <style>
        	.brand-one{background:#f15a22;}
        	.lenna-credit{display:none !important;}
        	.lenna-main-window{bottom:0px !important;width:75% !important;background:url('<?php echo base_url();?>uploads/bg-chat-n.png') no-repeat;background-size:cover;margin-bottom:0px !important;}
        	.lenna-chat-header,.lenna-register-main,.lenna-credit,.lenna-chat-body,.lenna-footer-container{width:600px !important;margin:auto;position:unset !important;}
        	.lenna-footer-container{width:100% !important;border-radius:0px !important;}
        	.lenna-register-main{height:400px !important;}
        	.lenna-main-window.lenna-rounded-border[data-v-3fa28b9c]{border-radius:10px 10px 0px 0px !important;right:14% !important;}
        	.lenna-footer-container.lenna-rounded-border[data-v-3fa28b9c]{border-radius:0px !important;}
        	.lenna-chat-footer{border-radius:0px !important;width:600px;margin:auto;}
        	.lenna-chat-header{display:none !important;}
        	.lenna-others .lenna-message-container{left: 38px;position: relative;top: -44px;}
        	#chatBody,.lenna-register-main{background:rgb(0, 104, 133, 0) !important;height:80vh !important;scrollbar-width: none;}
        	#lenna-webchat #logo{position:absolute;margin:14px;color:#fff;}
        	#lenna-webchat #billa{position:absolute;right:0;margin:14px;text-align:right;color:#fff;}
        	.lenna-message-footer{margin-top:15px !important;}
        	.lenna-message-footer small,.lenna-message-footer.lenna-self small[data-v-eb5a4950]{color:#fff !important;}
        	.lenna-message-footer.lenna-self div[data-v-eb5a4950]{display:none;}
        	.lenna-message-head{display:none !important;}
        	.sc-closed-icon{z-index:100;}
        	.lenna-footer-container, .lenna-text-input, .lenna-bg-white{background:#fff !important;}
        	.lenna-chat-action{display:none;}
        	#lenna-webchat {
					  scrollbar-width: thin;          /* #f7941e "auto" or "thin" */
					  scrollbar-color: #006885 #006885;   /* scroll thumb and track */ 
					  scrollbar-color: transparent;   /* scroll thumb and track */ 
					}
					.lenna-message.lenna-d-flex.lenna-flex-wrap.lenna-self{display:block !important;}
					.lenna-quickbutton-wrapper{width:40% !important;margin-left:32px !important;}
					@media (max-width: 799px) {
						#chatBody,.lenna-register-main{background:#006885 !important;height:70vh !important;}
						.lenna-chat-header,.lenna-register-main,.lenna-credit,.lenna-chat-body,.lenna-footer-container{width:112% !important;margin:auto;position:unset !important;}
						.lenna-chat-footer{width:100% !important;}
						.sc-closed-icon{transform:unset;border-radius: 50px !important;width: 30px !important;height: 30px !important;right:30px !important;bottom:78vh !important;padding:0px !important;}
					}
					::-webkit-scrollbar {
					  width: 0px;
					  scrollbar-width: none;
					  background: transparent; 
					}
					::-webkit-scrollbar-track {
					  width: 0px;
					  background: transparent !important; 
					  scrollbar-width: none;
					}					
					::-webkit-scrollbar-thumb {
					  border-radius: 0px;       /* roundness of the scroll thumb */
					  border: 0px solid #006885;
					  width: 0px;
					  background: transparent !important; 
					  scrollbar-width: none;
					}
					.sc-launcher.custom-open-icon.open-image.close-color[data-v-e17244fe]{bottom:70px !important;}
					.sc-closed-icon.custom-open-icon.open-image.close-color[data-v-e17244fe]{bottom:70px !important;}
					.lenna-others .lenna-message-content[data-v-3597b335] {
					    border-radius: 0px 20px 20px 20px !important;
					    box-shadow: 5px 5px 20px 0px #2d7f9c;
					    background: white !important;
					}
					.lenna-others:first-child .lenna-message-content[data-v-3597b335]::after{border-right:15px solid #fff;}
					.lenna-others .lenna-message-content[data-v-3597b335]{max-width:370px !important;}
        </style>
        <script>
      	/* Chat Bot */
	    	var lennawebchat = document.createElement('script'); 
	    	lennawebchat.src = "https://app.lenna.ai/webchat/lenna-init.js";
	    	var app = document.createElement('script');
	    	app.src = "https://app.lenna.ai/webchat/app.js";
	    	document.head.prepend(lennawebchat);
	    	document.head.prepend(app);
	    	lennawebchat.onload = function () {
	    		LennaWebchatInit('rb2Gjd');
	    		document.addEventListener("DOMContentLoaded", ready());
	    	};
	    	/* End Chat Bot */
		    	
		    var temp_ingin_awal=1;
				$(document).ready(function(){
					$(".livechat").click(function(){
						$(this).hide();
						$("#BoxLiveChat").show();
					});
					$(".closez").click(function(){
						$("#BoxLiveChat").hide();
						$(".livechat").show();
					});
		    	$("#saham").load("<?php echo site_url('saham');?>");
		    	$(".inginz").click(function(){
						clearInterval(myVar);
						var rel = $(this).attr("rel");
						var backg = $(this).attr("backg");
						$(".inginz").removeClass("showz");
						$(".ing"+rel).addClass("showz");
						$(".det"+temp_ingin_awal).slideUp();
						$(".det"+temp_ingin).slideUp();
						$(".det"+rel).slideDown(400);
						$(".bg-ingin").fadeOut(0);
						$(".bg-ingin").attr("style","background-image:url('<?php echo base_url();?>uploads/"+backg+"');background-size:cover; background-repeat:no-repeat;").fadeIn(10);
			    	//$(".kanan-ingin"+temp_ingin).hide();
						//$(".kanan-ingin"+rel).fadeIn(400);
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
					
					$(".lokasi").click(function(){
						$(".lokasi").removeClass("aktif");
						$(this).addClass("aktif");
						var rel=$(this).attr("rel");
						$("#mapframe").attr("src", "<?php echo site_url('maps/main/"+rel+"');?>");
					});
					
					$(".videoz").click(function(){
						$(".videoz").removeClass("aktif");
						$(this).addClass("aktif");
						var rel=$(this).attr("rel");
						$(".img").attr("src","<?php echo base_url();?>assets/images/video_dis.png");
						$(".img"+rel).attr("src","<?php echo base_url();?>assets/images/video_play.png");
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
				var myVar, myChat, transisi = false;
				myVar = setInterval(inginxx, 6000);
				function inginxx() {
					var rel=temp_ingin;
					if(rel==7) temp_ingin=0;
					temp_ingin=parseInt(temp_ingin)+1;
					var backg = $(".ing"+temp_ingin).attr("backg");
					$(".inginz").removeClass("showz");
					$(".ing"+temp_ingin).addClass("showz");
					$(".det"+rel).slideUp();
					$(".det"+temp_ingin).slideDown(400);
					$(".bg-ingin").fadeOut(0);
					//$(".bg-ingin").fadeIn("3000", function () {
					//alert("sini");
						$(".bg-ingin").attr("style","background-image:url('<?php echo base_url();?>uploads/"+backg+"');background-size:cover; background-repeat:no-repeat;").fadeIn(10);
			    //});
					
						
					//$(".kanan-ingin"+rel).hide();
					//$(".kanan-ingin"+temp_ingin).fadeIn(400);
				}
				
				myChat = setInterval(chatxx, 500);
				var logoz = "<?php echo base_url();?>assets/images/footer-logo.png";
				var logo_billa = "<?php echo base_url();?>assets/images/billa_chat.png";
				function chatxx() {
					if($(".sc-launcher").length == 0) {
						//alert("S");
					} else {
						$(".sc-launcher").click(function(){
							//alert("SS");
							if($("#box-chat-overlay").length == 0) {
								$("#lenna-webchat").append("<div id='box-chat-overlay' style='width:100%;height:"+$(document).height()+"px;top:0;background:rgba(0,0,0,0.8);position:absolute;'></div>");
								$(".lenna-main-window").append("<div id='billa' class='desktop'><img src='"+logoz+"' width='100'></div>");
								$(".lenna-main-window").append("<div id='logo' class='desktop'><img src='"+logo_billa+"' width='70'><br>Personal Insurance Advisor</div>");
								$(".lenna-icon-mic").parent().attr("style","display:none;");
								$(".lenna-icon-send").parent().attr("style","display:none;");
								$(".lenna-text-input").attr("style","background:#fff !important;");
							} else $("#box-chat-overlay").attr("style","width:100%;height:"+$(document).height()+"px;top:0;background:rgba(0,0,0,0.8);position:absolute;");
							$(".header-navigation").attr("style","opacity:0 !important;");
							$("section").attr("style","opacity:0.5 !important;");
						});
						$(".sc-closed-icon").click(function(){
							//alert("Sd");
							$("#box-chat-overlay").attr("style","background:none;");
							$(".header-navigation").attr("style","opacity:1 !important;");
							$("section").attr("style","opacity:1 !important;");
						});
						clearInterval(myChat);
					}
				}
				</script>