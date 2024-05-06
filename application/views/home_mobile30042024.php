<style>
@keyframes autopopup {from {opacity: 0;margin-top:-200px;}to {opacity: 1;}}
#close {background-color: rgba(0, 0, 0, 0.7);position: fixed;top:0;left:0;right:0;bottom:0;z-index:10000;display:none;}
#close:target {-webkit-transition:all 1s;-moz-transition:all 1s;transition:all 1s;opacity: 0;visibility: hidden;}
.container-popup {position: relative;margin: 40% auto;padding: 4px 3px;background-color: #e1fff5;color: #333;border-radius: 8px;width:90%;/*right:15px;bottom:220px;*/}
.closepop {position: absolute;top:-10px;right:-12px;background-color: #fff;border-radius:50%;padding:7px 10px;font-size: 15px;text-decoration: none;line-height: 1;color:#fff;cursor:pointer;}
.btn-selengkapnya1 {
    font-size: 16px;
    color: #006885 !important;
    background:  #ffffff !important;
    border-radius: 6px;
    padding: 14px 14px !important;
    line-height: 14px;
}
.btn-selengkapnya2 {
    font-size: 16px;
    color: #F15922 !important;
    background:  #ffffff !important;
    border-radius: 6px;
    padding: 14px 14px !important;
    line-height: 14px;
}
.btn-selengkapnya3 {
    font-size: 16px;
    color: #ffffff !important;
    background:  #006885 !important;
    border-radius: 6px;
    padding: 14px 14px !important;
    line-height: 14px;
}
.btn-selengkapnya4 {
    font-size: 16px;
    color: #ffffff !important;
    background:  #F15922 !important;
    border-radius: 6px;
    padding: 14px 14px !important;
    line-height: 14px;
}
.btn-selengkapnya5 {
    font-size: 16px;
    color: #ffffff !important;
    background:  #F7941E !important;
    border-radius: 6px;
    padding: 14px 14px !important;
    line-height: 14px;
}
</style>
<script>
$(document).ready(function() {
		const d = new Date();
		var hour = d.getHours();
		if(localStorage.getItem('popState') != hour){
    		$("#close").delay(1000).fadeIn();
        localStorage.setItem('popState',hour);
    }    
    $('.closepop').click(function(e) {
    	$('#close').fadeOut(); // Now the pop up is hiden.
    	$('#close').html("");
    });
});
</script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom_mobile.css">
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
                		$q = GetAll("banner", array("is_publish"=> "where/1","is_delete"=> "where/0", "urutan"=> "order/asc"));
		                foreach($q->result_array() as $r) {
		                	$clr=$r['warna_head']=="#f7f7f7" ? "color:#F15922;" : "";?>
	                    <div class="swiper-slide">
	                        <div class="container">
	                            <div class="swiper-slide__inner swiper-slide__inner-home">
	                                <div class="row">
	                                    <div class="col-xl-12 text-left mb-slider">
	                                    		<?php if(!preg_match("/Bella/",$r['title'.getLang()])) {?>
	                                        <!--<p style="background:<?php echo $r['warna_head'].";".$clr;?>"><?php echo $r['title'.getLang()];?></p>-->
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
	                                        
	                                        if($r['contents'.getLang()] != "-" && $r['contents'.getLang()] && $r['link']) {
	                                        ?>
	                                        <!-- <a style="margin-top:86%; margin-left:50% !important; width:100% !important; " href="<?php echo $r['link']?>" class="<?php echo is_numeric(substr($r['title'], 0, 1)) == true ? 'thm-btn btn-selengkapnya'.substr($r['title'], 0, 1) .$bil : 'thm-btn' .$bil ?>"> <?php echo $r['contents'.getLang()];?></a>
	                                         -->
											<a style="margin-top:265% !important; margin-left:50% !important; width:100% !important; " href="<?php echo $r['link']?>" class="<?php echo is_numeric(substr($r['title'], 0, 1)) == true ? 'thm-btn btn-selengkapnya'.substr($r['title'], 0, 1) .$bil : 'thm-btn' .$bil ?>"> <?php echo $r['contents'.getLang()];?></a>
	                                        <?php } 
	                                        ?>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="image-banner"><img src="<?php echo base_url()."uploads/".$r['file_mobile'];?>" width="100%"></div>
	                    </div>
	                   <?php }
	                   ?>
                </div>
                <div class="swiper-pagination" id="main-slider-pagination"></div>
                <div class="main-slider-nav">
                    <div class="main-slider-button-prev-utama"><i class="fa fa-angle-right"></i></div>
                    <div class="main-slider-button-next-utama"><i class="fa fa-angle-right"></i></div>
                </div>
            </div>
        </section>
        
        <!-- Yang Ingin -->
        <section>
        	<div class="container-ingin">
              <div class="block-title text-center title-ingin">
                  <h1 class="biru-utama"><?php echo $bahasa[5];?></h2>
              </div>
          </div>
        </section>
		    <section class="main-slider you-can-help" style="padding-top:0px !important;">
        	<div class="inginhome">
        		<div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
    "effect": "slide",
    "pagination": {
        "el": "#ingin-slider-pagination",
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
                	$q=GetAll("tahapan",array("is_publish"=> "where/1", "id"=> "order/asc"));
                	foreach($q->result_array() as $r) {?>
                    <div class="swiper-slide">
                        <div class="swiper-slide">
		                        <div class="container">
		                            <div class="row untuk-kamu">
								                	<div class="col-md-2 col-xs-2">
								                		<img src="<?php echo base_url();?>assets/images/<?php echo $r['icon'];?>" style="width:105% !important;">
								                	</div>
								                	<div class="col-md-10 col-xs-10 label-ingin">
								                		<div class="showz"><?php echo $r['title'.getLang()];?>
								                		</div>
								                	</div>
								                </div>
		                        </div>
		                        <div class="image-banner"><img src="<?php echo base_url()."uploads/".$r['file_mobile'];?>" width="100%"></div>
		                        <div class="info-ingin"><?php echo $r['headline'.getLang()];?></div>
		                        
		                        <div class="col-md-4 perlindunganjiwa perlindunganjiwahome">
						                	<!-- Desktop -->
						                	<div class="rowx">
						                		<?php
						                		$urut_produk=0;
						                		if($r['id']==1) $idl=$r['id']+4;
						                		else $idl=$r['id']+5;
						                		$q = GetAll("lifestage",array("id"=>"where/".$idl));
						                		foreach($q->result_array() as $r) {
						                			echo "<div class='row'>";
						                			$ot = GetAll("product",array("id_lifestage"=> "like/-".$r['id']."-", "is_champions"=> "order/desc", "publish_date"=> "order/desc", "limit"=> "0/2"));
						                			foreach($ot->result_array() as $or) {
						                				if(strtoupper($or['title'])=="BNI LIFE SOLUSI DANA KESEHATAN") $padt=28;
						                				else if(strtoupper($or['title'])=="BNI LIFE SOLUSI DANA KESEHATAN") $padt=28;
						                				else if(strtoupper($or['title'])=="BLIFE PLAN MULTI PROTECTION PLUS") $padt=28;
						                				else if(strtoupper($or['title'])=="HY-END PRO") $padt=36;
						                				else if(strtoupper($or['title'])=="SOLUSI PINTAR") $padt=36;
						                				else if(strtoupper($or['title'])=="BNI LIFE WADI'AH GOLD CENDEKIA") $padt=28;
						                				else if(strlen($or['title'.getLang()]) < 20) $padt=30;
						                				else if(strlen($or['title'.getLang()]) <= 26) $padt=28;
						                				else if(strlen($or['title'.getLang()]) < 30) $padt=28;
						                				else if(strlen($or['title'.getLang()]) <= 32) $padt=16;
						                				else if(strlen($or['title'.getLang()]) < 36) $padt=20;
						                				else $padt=16;
							                			?>
									                	<div class="col-md-4 col-xs-4" style="padding-right:0px;">
										                	<div class="label-perlindungan" style="padding-top:<?php echo $padt;?>px !important;">
			                                    <a href="<?php echo lang_url("perlindungan/detail/".$or['slug']);?>" style="color:#fff;"><p><?php echo strtoupper($or['title'.GetLang()]);?></p></a>
			                                </div>
							                      </div>
							                      <?php
							                    }
							                    ?>
							                    <!-- Perlindungan Lainnya -->
							                    <div class="col-md-4 col-xs-4">
									                	<div class="popular-causes__sinlged">
						                            <div class="popular-causes__imgd">
					                            		<div class="label-perlindungan" style="padding-top:28px !important;">
					                                    <a href="<?php echo lang_url("perlindungan");?>"><p><?php echo getLang() ? "Other<br>Protection" : "Perlindungan<br>Lainnya";?> ></p></a>
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
                  <?php }
                  ?>
                </div>
                <div class="ingin-slider-nav">
                    <div class="main-slider-button-prev"><i class="fa fa-angle-right"></i></div>
                    <div class="main-slider-button-next"><i class="fa fa-angle-right"></i> </div>
                </div>
            </div>
          </div>
        </section>
        
        <!-- Proteksi Tepat -->
        <section class="you-can-help" style="padding-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="you-can-help__left">
                            <div class="block-title text-center wow zoomIn" data-wow-delay="200ms">
                                <h2 class="biru-utama"><?php echo $bahasa[6];?></h2>
                                <p style="color:#585757;font-size:14px;"><?php echo $bahasa[7];?></p>
                            </div>
                            <div class="row">
                            	<div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
														    "effect": "slide",
														    "pagination": {
														        "el": "#ingin-slider-pagination",
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
								                		$q = GetAll("proteksi_tepat", array("id"=> "order/asc", "is_publish"=> "where/1"));
								                		$jum = $q->num_rows();
								                		$no=0;
								                		foreach($q->result_array() as $r) {?>
									                    <div class="swiper-slide">
									                        <div class="swiper-slide">
										                        <div class="proteksi col-xl-4 col-lg-4 text-center">
												                			<a href="<?php echo lang_url('perlindungan/main/'.strtolower($r['title']));?>">
													                			<div>
								                    							<img src="<?php echo base_url()."uploads/".$r['file'];?>">
								                    						</div>
									                    					<div>
									                    						<h2><?php echo $r['title'.getLang()];?></h2>
									                    						<p class="ket" style="font-weight:normal;"><?php echo $r['headline'.getLang()];?></p>
									                    					</div>
									                    				</a>
								                    				</div>
											                    </div>
									                    </div>
									                  <?php }
									                  ?>
									                </div>
									                <div class="ingin-slider-nav" style="top:40%;">
									                    <div class="main-slider-button-prev"><i class="fa fa-angle-right" style="color:#F7941D;"></i></div>
									                    <div class="main-slider-button-next"><i class="fa fa-angle-right" style="color:#F7941D;"></i> </div>
									                </div>
									            </div>
                    				</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Bella -->
        <?php
        $q=GetAll("promo",array("is_publish"=> "where/1", "id_media_cat"=> "where/2", "publish_date"=> "order/desc"));
        if($q->num_rows() > 0) {?>
        <section class="main-slider you-can-help" style="padding-top:80px;" id="section3">
        	<div class="bellahome" style="background-image:url('<?php echo base_url();?>uploads/bg_ngobrol_bella_new_final.jpg');background-repeat:no-repeat;background-size:contain;background-color:#6fc1d9;">
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
                	foreach($q->result_array() as $r) {?>
                    <div class="swiper-slide">
                        <div class="swiper-slide">
		                        <div class="container">
		                            <div class="row">
								                		<div class="col-xs-4"></div>
								                    <div class="col-xs-8 lindungi wow zoomIn" data-wow-delay="200ms">
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
                <!--<div class="main-slider-nav nav-banner nav-billa">
                    <div class="main-slider-button-prev"><i class="fa fa-angle-right"></i></div>
                    <div class="main-slider-button-next"><i class="fa fa-angle-right"></i> </div>
                </div>-->
            </div>
          </div>
        </section>
      	<?php }?>

				<!-- Layanan Mudah -->
        <section class="you-can-help">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="you-can-help__left">
                            <div class="block-title text-center wow fadeInRightBig" data-wow-delay="200ms">
                                <h2 class="biru-utama" style="line-height:26px !important;"><?php echo $bahasa[8];?></h2>
                            </div>
                            <div class="tabz_new marbot25">
							        				<div class="col-md-4 col-xs-4 nop-all">
							        					<a class="linklayanan aktif wow zoomIn" data-wow-delay="100ms" rel="1"><?php echo $bahasa[20];?></a>
							        				</div>
							        				<div class="col-md-4 col-xs-4 nop-all">
							        					<a class="linklayanan wow zoomIn" data-wow-delay="300ms" rel="2"><?php echo $bahasa[21];?></a>
							        				</div>
							        				<div class="col-md-4 col-xs-4 nop-all">
							        					<a class="linklayanan wow zoomIn" data-wow-delay="500ms" rel="3"><?php echo $bahasa[22];?></a>
							        				</div>
							        			</div>
							        			<div class="clear"></div>
                          	<div class="layananz layanan1 container">
								            	<div class="row">
									                <div class="col-xl-12 text-center" style="padding:0px;">
									                	<h4><?php echo $bahasa[23];?></h4>
									                	<p class="ket"><?php echo $bahasa[24];?></p>
									                	<div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
																	    "effect": "slide",
																	    "pagination": {
																	        "el": "#ingin-slider-pagination",
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
											                		$q = GetAll("beragam_kemudahan", array("id"=> "order/asc", "is_publish"=> "where/1", "limit"=> "0/3"));
											                		$no=0;
											                		foreach($q->result_array() as $r) {?>
												                    <div class="swiper-slide">
												                        <div class="swiper-slide">
													                        <div class="proteksi col-xl-4 col-lg-4 text-center">
															                			<a href="<?php echo lang_url('perlindungan/main/'.strtolower($r['title']));?>">
																                			<div>
											                    							<img src="<?php echo base_url()."uploads/".$r['file'];?>">
											                    						</div>
												                    					<div>
												                    						<h2><?php echo $r['title'.getLang()];?></h2>
						                    												<p class="ket" style="font-weight:normal;"><?php echo $r['headline'.getLang()];?></p>
												                    					</div>
												                    				</a>
											                    				</div>
														                    </div>
												                    </div>
												                  <?php }
												                  ?>
												                </div>
												                <div class="col-md-12 stepz">
					                    						<p class="ket"><?php echo $bahasa[25];?></p>
					                    						<a href="<?php echo lang_url('klaim');?>" class="btn-color"><?php echo $bahasa[26];?></a>
					                    					</div>
												                <div class="ingin-slider-nav" style="top:40%;">
												                    <div class="main-slider-button-prev"><i class="fa fa-angle-right" style="color:#F7941D;"></i></div>
												                    <div class="main-slider-button-next"><i class="fa fa-angle-right" style="color:#F7941D;"></i> </div>
												                </div>
												            </div>
									                	<!--<div class="row text-center stepz">
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
				                    				</div>-->
									                </div>
									            </div>
									          </div>
									          <div class="layananz layanan2 container" style="display:none;">
								            	<div class="row">
									                <div class="col-xl-12 text-center">
									                	<img src="<?php echo base_url()."uploads/hp_mobile.png";?>" width="70%">
									                	<?php
			                            	$img_mobile=array();
														      	$q = GetAll("bnimobile", array("id"=> "order/asc", "is_publish"=> "where/1"));
														      	foreach($q->result_array() as $key=> $r) {
														      		$img_mobile[$key] = $r['file'];
																		}
			                    					?>
			                    					<div class="banner2-title" style="padding-top:0px;"><?php echo $bahasa[148];?></div>
			                    					<div class="banner2-img">
									                		<a href="https://apps.apple.com/us/app/bni-life-mobile/id1494865291" target="_blank"><img src="<?php echo base_url().'uploads/'.$img_mobile[2];?>" width="125"></a>
									                		<a href="https://play.google.com/store/apps/details?id=com.invent.bnilife.insurance" target="_blank"><img src="<?php echo base_url().'uploads/'.$img_mobile[3];?>" width="125"></a>
									                	</div>
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
									                		$temp_id=0;$opt_lokasi=array();
									                		foreach($q->result_array() as $key=> $r) {
									                			if($temp_id != $r['id_province']) {
									                				$temp_id=$r['id_province'];
										                			//if($key==0) echo "<a class='lokasi aktif' rel='".$r['id_province']."'>".$r['nama']."</a>";
										                			//else echo "<a class='lokasi' rel='".$r['id_province']."'>".$r['nama']."</a>";
										                			$opt_lokasi[$r['id_province']] = $r['nama'];
										                		}
									                		}
									                		echo form_dropdown("lokasiz",$opt_lokasi,"","class='lokasi form-controls'");
									                		?>
				                          	</div>
									                	<iframe id="mapframe" src="<?php echo site_url('maps');?>" height="450" width="100%" frameborder="no" scrolling="no"></iframe>
									                	<div class="col-md-12 text-center">
												  						<a href="https://www.bni.co.id/id-id/kontak/lokator/cabang" target="_blank" class="btn-color" style="cursor:pointer;"><?php echo !getLang() ? "Cabang Lainnya" : "Others Branch";?></a>
												  						<br><br>
												  					</div>
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
        "clickable": false
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
                <div class="swiper-pagination" id="main-slider-pagination2"></div>
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
                          <div class="block-title video text-center">
                              <h2 class="biru-utama"><?php echo $bahasa[9];?></h2>
                              <p style="color:#585757;font-size:14px;padding:0px 20px;"><?php echo $bahasa[10];?></p>
                          </div>
                          <div class="row">
                  					<div class="col-md-6">
                  						<?php
                  						/*$xx = json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/search?key=AIzaSyDcJN5e_tt-LFOigqgPFsg9mLEq6GnC7yw&channelId=UCFBKohX52ePqnFRMwm56saQ&part=snippet,id&order=date&maxResults=10"));
											        foreach($xx->items as $yy) {
											        	//Cek Video
											        	$cek = GetValue("id","video",array("link"=> "like/".$yy->id->videoId));
											        	if(!$cek) {
											        		$id = GetValue("id","video",array("id"=> "order/desc", "limit"=> "0/1"));
												        	$ins = array("id"=> $id, "contents"=> "", "file"=> "", "is_featured"=> 0, "create_user_id"=> 0, "modify_user_id"=> 0, "id_video_cat"=> 1, "is_publish"=> 1, "link"=> "https://www.youtube.com/embed/".$yy->id->videoId, "title"=> $yy->snippet->title, "title_eng"=> $yy->snippet->title, "headline"=> $yy->snippet->description,
												        	"headline_eng"=> $yy->snippet->description, "seo_title"=> $yy->snippet->title, "seo_title_eng"=> $yy->snippet->title, "seo_desc"=> $yy->snippet->description, "seo_desc_eng"=> $yy->snippet->description,
												        	"slug"=> url_title($yy->snippet->title), "publish_date"=> date("Y-m-d H:i:s"), "create_date"=> date("Y-m-d H:i:s"), "is_delete"=> 0);
												        	$this->db->insert("video", $ins);
												        }
											        }
											        $wof="";*/
                  						$q = GetAll("video", array("is_publish"=> "where/1", "is_delete"=> "where/0", "publish_date"=> "order/desc", "limit"=> "0/4"));
                  						foreach($q->result_array() as $k=> $r) {
                  							if(strlen($r['title']) > 30) $padtop=8;
                  							else if(strlen($r['title']) > 80) $padtop=0;
                  							else $padtop=18;
                  							?>
	                  						<div class="row videoz <?php echo $k==0 ? "aktif" : "";?>" rel="<?php echo $r['id'];?>" alt="<?php echo $r['link'];?>">
								                	<div class="col-xs-12 playbutton">
								                		<img align="left" class="img<?php echo $r['id'];?> img" src="<?php echo $k==0 ? base_url()."assets/images/video_play_new.png" : base_url()."assets/images/video_dis_new.png";?>">
								                		<div class="title_video" style="padding-top:<?php echo $padtop;?>px"><!--<a href="<?php echo $r['link'];?>" target="_blank">--><?php echo $r['title'.getLang()];?><!--</a>--></div>
								                	</div>
								                </div>
								                <?php
								                if($k==0) {
								                	$wof = $r['link'];
								                	$id_yt = str_replace("https://www.youtube.com/embed/","",$wof);
								                	?>
								                	<iframe class="ytplayer ytp<?php echo $r['id'];?>" width="100%" height="300" src="<?php echo $wof;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								                <?php 
								                } else {?>
								                	<iframe style="display:none;" class="ytplayer ytp<?php echo $r['id'];?>" width="100%" height="300" src="<?php echo $r['link'];?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								                <?php }
								              }
								              ?>
                  					</div>
                  				</div>
                      </div>
                  </div>
              </div>
          </div>
        </section>
        
        <script>
				var tag = document.createElement('script');
				tag.src = "https://www.youtube.com/iframe_api";
				var firstScriptTag = document.getElementsByTagName('script')[0];
				firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
				var player;
				
				function onYouTubeIframeAPIReady() {
				  player = new YT.Player('player', {
				    height: '250',
	          width: '100%',
	          videoId: '<?php echo $id_yt;?>',
				    events: {
				      'onReady': onPlayerReady,
				    }
				  });
				}
				
				function onPlayerReady(event) {
				  event.target.mute();
				  event.target.playVideo();
				}
				</script>

        <!-- POPUP Video -->
        <div id="close">
					<div class="container-popup">
						<div id="player"></div>
						<a class="closepop"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<!-- END POPUP Video -->
        
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
                        <div class="image-layer image-layer-testi mobile" style="background-size:cover;background-image: url(<?php echo base_url().'uploads/testimoni/'.$r['image_mobile'];?>)"></div>
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
      		$img_mobile[$key] = $r['file_mobile'];
				}
				?>
        <section class="you-can-help">
        	<div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 text-center">
                	<!--<img src="<?php echo base_url();?>assets/images/banner2-kiri.jpg" width="100%">-->
                	<div class="hp1 wow fadeInLeft" data-wow-delay="100ms">
                		<img src="<?php echo base_url().'uploads/'.$img_mobile[0];?>" width="50%">
                	</div>
                	<div class="hp2 wow fadeInLeft" data-wow-delay="300ms">
                		<img src="<?php echo base_url().'uploads/'.$img_mobile[1];?>" width="50%">
                	</div>
                </div>
                <div class="col-md-1 desktop"></div>
                <div class="col-md-4 col-xs-12 text-center wow fadeInRight" data-wow-delay="300ms">
                	<div class="banner2-title"><?php echo $bahasa[11];?></div>
                	<div class="banner2-img">
                		<a href="https://apps.apple.com/us/app/bni-life-mobile/id1494865291" target="_blank"><img src="<?php echo base_url().'uploads/'.$img_mobile[2];?>" style="width:120px;"></a>
                		<a href="https://play.google.com/store/apps/details?id=com.invent.bnilife.insurance" target="_blank"><img src="<?php echo base_url().'uploads/'.$img_mobile[3];?>" style="width:120px;"></a>
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
                          <div class="block-title text-center">
                              <h2><?php echo $bahasa[13];?></h2>
                          </div>
                        	<div class="tab text-center">
                        		<a class="linkartikel aktif" rel="1"><?php echo $bahasa[14];?></a>
                        		<a class="linkartikel" rel="2"><?php echo $bahasa[15];?></a>
                        		<a class="linkartikel" rel="3"><?php echo $bahasa[16];?></a>
                        	</div>
							            <div class="artikelz artikel1 container">
							            	<div class="row">
								                <div class="col-xl-12">
								                	<div class="row">
								                		<?php
								                		$img = base_url().'uploads/blog/';
								                		$imgz = base_url().'uploads/blog/';
																		$img2 = base_url().'uploads/articles/';
								                		$q = GetAll("blog",array("is_publish"=> "where/1", "publish_date"=> "order/desc", "limit"=> "0/1"));
								                		foreach($q->result_array() as $k=> $r) {
								                			if(file_exists("./uploads/articles/".$r['image'])) $img=$img2;
								                			else $img=$imgz;
								                			?>
									                    <div class="col-md-6 col-xs-12">
									                    	<div class="gallery-tow__single">
								                            <div class="gallery-tow__img">
							                                <a href="<?php echo lang_url('lifeblog/'.$r['slug']);?>">
							                                	<img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
							                                </a>
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog"><a href="<?php echo lang_url('lifeblog/'.$r['slug']);?>"><?php echo $r['title'.getLang()];?></a></div>
				                                    <p class="ket"><?php echo $r['headline'.getLang()];?></p>
								                        </div>
									                    </div>
									                  <?php }
									                  ?>
									                  
									                  <div class="col-md-3 nop_r col-xs-6">
									                  <?php
								                		$q = GetAll("blog",array("is_publish"=> "where/1", "publish_date"=> "order/desc", "limit"=> "1/2"));
								                		foreach($q->result_array() as $k=> $r) {
								                			if(file_exists("./uploads/articles/".$r['image'])) $img=$img2;
								                			else $img=$imgz;
								                			?>
								                        <div class="gallery-tow__single">
								                            <div class="gallery-tow__img h_img">
								                            	<a href="<?php echo lang_url('lifeblog/'.$r['slug']);?>">
								                                <img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
								                              </a>
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog-2"><a href="<?php echo lang_url('lifeblog/'.$r['slug']);?>"><?php echo $r['title'.getLang()];?></a></div>
				                                    <!--<p class="ket"><?php echo $r['headline'.getLang()];?></p>-->
								                        </div>
								                      <?php 
								                      }
								                    ?>
								                    </div>
								                    <div class="col-md-3 nop_l col-xs-6">
									                  <?php
								                		$q = GetAll("blog",array("is_publish"=> "where/1", "publish_date"=> "order/desc", "limit"=> "3/2"));
								                		foreach($q->result_array() as $k=> $r) {
								                			if(file_exists("./uploads/articles/".$r['image'])) $img=$img2;
								                			else $img=$imgz;
								                			?>
								                        <div class="gallery-tow__single">
								                            <div class="gallery-tow__img h_img">
							                                <a href="<?php echo lang_url('lifeblog/'.$r['slug']);?>">
							                                	<img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>">
							                                </a>
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['publish_date'],0,10));?></div>
				                                    <div class="judul-blog-2"><a href="<?php echo lang_url('lifeblog/'.$r['slug']);?>"><?php echo $r['title'.getLang()];?></a></div>
				                                    <!--<p class="ket"><?php echo $r['headline'.getLang()];?></p>-->
								                        </div>
								                      <?php 
								                      }
								                    ?>
								                    </div>
								                  </div>
								                </div>
								                <div class="col-md-12 text-center"><br>
										  						<a href="<?php echo lang_url('lifeblog');?>" class="btn-color" style="cursor:pointer;"><?php echo !getLang() ? "Artikel Lainnya" : "Other Articles";?></a>
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
								                		$imgz = base_url().'uploads/media/';
																		$img2 = base_url().'uploads/medias/';
								                		$q = GetAll("media",array("is_publish"=> "where/1", "id_media_cat"=> "where/2", "publish_date"=> "order/desc", "limit"=> "0/1"));
								                		foreach($q->result_array() as $k=> $r) {
								                			if(file_exists("./uploads/medias/".$r['image'])) $img=$img2;
								                			else $img=$imgz;
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
								                			if(file_exists("./uploads/medias/".$r['image'])) $img=$img2;
								                			else $img=$imgz;
								                			?>
								                        <div class="gallery-tow__single">
								                            <div class="gallery-tow__img h_img">
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
								                			if(file_exists("./uploads/medias/".$r['image'])) $img=$img2;
								                			else $img=$imgz;
								                			?>
								                        <div class="gallery-tow__single">
								                            <div class="gallery-tow__img h_img">
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
								                		$imgz = base_url().'uploads/award/';
																		$img2 = base_url().'uploads/awards/';
								                		$q = GetAll("award",array("date"=> "order/desc", "is_delete"=> "where/0", "limit"=> "0/4"));
								                		foreach($q->result_array() as $k=> $r) {
								                			if(file_exists("./uploads/awards/".$r['image'])) $img=$img2;
								                			else $img=$imgz;
								                			?>
									                    <div class="col-md-3 col-xs-12">
									                    	<div class="gallery-tow__single">
								                            <div class="gallery-tow__img h_img">
								                            	<img src="<?php echo $img.$r['image'];?>" title="<?php echo $r['title_image'];?>" width="300" height="300">
								                            </div>
				                                    <div class="tgl-blog"><?php echo FormatTanggal(substr($r['modify_date'],0,10));?></div>
				                                    <div class="judul-blog-2" style="font-size:18px;line-height:26px;"><?php echo $r['description'.getLang()];?></div>
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
        <section class="you-can-help" style="padding-top:0px !important;">
	        	<div class="container" style="max-width:1265px;">
	            <div class="row">
	              <div class="col-xl-12">
	              	<div class="block-title text-center" style="margin-bottom:30px !important;">
	                    <h2 style="color:#F15922;"><?php echo $bahasa[17];?></h2>
	                    <p style="color:#585757;"><?php echo $bahasa[18];?></p>
	                </div>
			            <div class="brand-one__container">
			                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"loop": true, "spaceBetween": 0, "slidesPerView": 6, "autoplay": { "delay": 5000 }, "breakpoints": {
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
			                            	<?php if($r['link']) {?>
			                            	<a href="<?php echo $r['link'];?>" target="_blank">
			                                <img src="<?php echo base_url().'uploads/company_group/'.$r['image'];?>" title="<?php echo $r['title_image'];?>" alt="<?php echo $r['title_image'];?>">
			                              </a>
			                              <?php } else {?>
			                            	<img src="<?php echo base_url().'uploads/company_group/'.$r['image'];?>" title="<?php echo $r['title_image'];?>" alt="<?php echo $r['title_image'];?>">
			                            	<?php }?>
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
						var rel=$(this).val();
						$("#mapframe").attr("src", "<?php echo site_url('maps/main/"+rel+"');?>");
					});
					
					$(".videoz").click(function(){
						$(".videoz").removeClass("aktif");
						$(this).addClass("aktif");
						var rel=$(this).attr("rel");
						$(".img").attr("src","<?php echo base_url();?>assets/images/video_dis_new.png");
						$(".img"+rel).attr("src","<?php echo base_url();?>assets/images/video_play_new.png");
						//$(".ytplayer").attr("src",$(this).attr("alt")+"?autoplay=0");
						$(".ytplayer").hide();
						$(".ytp"+rel).show();
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
