<style>
.stepz{margin-top:0px;}
.you-can-help__left{padding-top:60px;}
#testi-slider-pagination .swiper-pagination-bullet-active{background-color:#F15922 !important;}
@media only screen and (max-width: 799px) {
	.box_media_lain .box_image{height:100px;}
	.box_media_lain .judul{font-size: 14px;line-height: 20px;}
}
</style>
        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(1);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[27];?></div>
                      <div class="info"><?php echo $bhs[28];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>        
        <section class="section-top mobile">
        	<div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(1);?>" width="100%">
          </div>
          <div class="col-xs-12">
	          <div class="text-center" style="margin-top:20px;">
		          <div class="judul jdl_mobile"><?php echo $bhs[27];?></div>
			        <div class="info"><?php echo $bhs[28];?></div>
			      </div>
			    </div>
        </section>

        <section class="you-can-help">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 kisah-left wow fadeInLeftBig" data-wow-delay="80ms">
                    	 <video width="100%" height="350" controls style="border-radius:5px !important;">
											 	<source src="<?php echo base_url()."uploads/".$val['file'];?>" type="video/mp4">
											 </video>
                    </div>
                    <div class="col-md-6 kisah-right wow fadeInRightBig padtop20" data-wow-delay="80ms">
                    	<?php echo $val['headline'.getLang()];?>
                    </div>
                </div> 
            </div>
        </section>
        
        <section class="you-can-help">
        	<div class="container desktop">
			<?php echo $val['contents'.getLang()];?>
            	<!--<div class="layananz layanan1 container stepz">
	            	<div class="row">
		                <div class="col-xl-12 text-center">
		                	<div class="block-title text-center wow zoomIn" data-wow-delay="50ms">
                          <h3 style="color:#F15922;font-weight:bold;">BNI Life Hadir Melalui 4 Saluran Distribusi</h3>
                      </div>
		                	<div class="row text-center stepz">
		                		<div class="proteksi col-xl-3 col-lg-3 wow fadeInLeft" data-wow-delay="100ms">
              						<div>
                						<h2>Agency</h2>
                						<p class="ket">Disediakan melalui agen-agen yang memasarkan produk individu.</p>
                					</div>
              					</div>
              					<div class="proteksi col-xl-3 col-lg-3 wow fadeInLeft" data-wow-delay="200ms">
              						<div>
                						<h2>Bancassurance</h2>
                						<p class="ket">Tersedia melalui jaringan BNI di seluruh Indonesia.</p>
                					</div>
              					</div>
              					<div class="proteksi col-xl-3 col-lg-3 wow fadeInRight" data-wow-delay="200ms">
              						<div>
                						<h2>Employee Benefits</h2>
                						<p class="ket">Dikhususkan bagi produk asuransi kumpulan perusahaan.</p>
                					</div>
              					</div>
              					<div class="proteksi col-xl-3 col-lg-3 wow fadeInRight" data-wow-delay="100ms">
              						<div>
                						<h2>Syariah</h2>
                						<p class="ket">Menyediakan produk asuransi berdasarkan prinsip syariah.</p>
                					</div>
              					</div>
              				</div>
		                </div>
		            </div>
		          </div>
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left style="padding-top:60px;">
                          <div class="row">
                          	<div class="col-md-2"></div>
                  					<div class="col-md-8">
                  						<div class="row sejarah wow fadeInDown" data-wow-delay="80ms">
							                	<div class="col-md-2 col-xs-2">
							                		<div class="no_1">1</div>
								                	<div class="garis"></div>
							                	</div>
							                	<div class="col-md-9 col-xs-10">
							                		<div class="tgl_sejarah">11 Maret 2014</div>
							                		<div class="info_sejarah">Otoritas Jasa Keuangan (OJK) memberikan persetujuan perubahan kepemilikan saham PT BNI Life Insurance (BNI Life).</div>
							                	</div>
							                </div>
							                <div class="row sejarah wow fadeInDown" data-wow-delay="80ms">
							                	<div class="col-md-2 col-xs-2">
							                		<div class="no_1">2</div>
							                		<div class="garis"></div>
							                	</div>
							                	<div class="col-md-9 col-xs-10">
							                		<div class="tgl_sejarah">21 Maret 2014</div>
							                		<div class="info_sejarah">BNI Life menyelenggarakan RUPSLB dengan agenda penerbitan saham baru sebanyak 120.279.633 lembar yang diambil seluruhnya oleh Sumimoto Life Insurance Company.</div>
							                	</div>
							                </div>
							                <div class="row sejarah wow fadeInDown" data-wow-delay="80ms">
							                	<div class="col-md-2 col-xs-2">
							                		<div class="no_1">3</div>
							                	</div>
							                	<div class="col-md-9 col-xs-10">
							                		<div class="tgl_sejarah">9 Mei 2014</div>
							                		<div class="info_sejarah">BNI Life menjadi perusahaan asuransi kehidupan (jiwa) Joint Venture dengan porsi kepemilikan saham :<br><br>
																		PT Bank Negara Indonesia (Persero) Tbk - 60.000000%<br>
																		Sumimoto Life Insurance Company - 39.999993%<br>
																		Yayasan Kesejahteraan Karyawan (YKP) BNI - 0.000003%<br>
																		Yayasan Danar Dana Swardharma (YDD) - 0.000003%<br></div>
							                	</div>
							                </div>
                  					</div>
                  					<div class="col-md-2"></div>
                  				</div>
                      </div>
                  </div>
              </div>-->
          </div>
          <div class="container mobile">
          	<div class="block-title text-center" style="visibility: visible; animation-delay: 50ms; animation-name: zoomIn;">
	              <h3 style="color:#F15922;font-weight:bold;"><?php echo getLang() ? "BNI Life Presents Through 4 Distribution Channels":"BNI Life Hadir Melalui 4 Saluran Distribusi";?></h3>
	          </div>
	          <div class="mobile swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
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
	                  <div class="swiper-slide">
	                      <div class="container">
	                          <div class="swiper-slide__inner">
	                              <div class="row">
	                                  <div class="col-xl-12">
	                                  	<div class="text-center biru-utama tebal">
	                                     	Bancassurance
	                                    </div>
	                                    <div class="text-center umur-testi padbot35 padtop10" style="padding-left:0px;">
	                                    	<?php echo getLang() ? "Available through BNI branch offices throughout Indonesia." : "Tersedia melalui jaringan BNI di seluruh Indonesia.";?>
	                                    </div>
	                                  </div>
	                              </div>
	                          </div>
	                      </div>
	                  </div>
	                  <div class="swiper-slide">
	                      <div class="container">
	                          <div class="swiper-slide__inner">
	                              <div class="row">
	                                  <div class="col-xl-12">
	                                  	<div class="text-center biru-utama tebal">
	                                     	Employee Benefits
	                                    </div>
	                                    <div class="text-center umur-testi padbot35 padtop10" style="padding-left:0px;">
	                                    	<?php echo getLang() ? "Group insurance products for companies marketed through our consultants." : "Dikhususkan bagi produk asuransi kumpulan perusahaan.";?>
	                                    </div>
	                                  </div>
	                              </div>
	                          </div>
	                      </div>
	                  </div>
	                  <div class="swiper-slide">
	                      <div class="container">
	                          <div class="swiper-slide__inner">
	                              <div class="row">
	                                  <div class="col-xl-12">
	                                  	<div class="text-center biru-utama tebal">
	                                     	Agency
	                                    </div>
	                                    <div class="text-center umur-testi padbot35 padtop10" style="padding-left:0px;">
	                                    	<?php echo getLang() ? "BNI Life agents are ready to help you get the right protection." : "Disediakan melalui agen-agen yang memasarkan produk individu.";?>
	                                    </div>
	                                  </div>
	                              </div>
	                          </div>
	                      </div>
	                  </div>
	                  <div class="swiper-slide">
	                      <div class="container">
	                          <div class="swiper-slide__inner">
	                              <div class="row">
	                                  <div class="col-xl-12">
	                                  	<div class="text-center biru-utama tebal">
	                                     	<?php echo getLang() ? "Sharia" : "Syariah";?>
	                                    </div>
	                                    <div class="text-center umur-testi padbot35 padtop10" style="padding-left:0px;">
	                                    	<?php echo getLang() ? "A trusted insurance product based on sharia principles." : "Menyediakan produk asuransi berdasarkan prinsip syariah.";?>
	                                    </div>
	                                  </div>
	                              </div>
	                          </div>
	                      </div>
	                  </div>
	              </div>
	              <div class="swiper-pagination" id="testi-slider-pagination" style="bottom:0px !important;"></div>
	          </div>
	          <div class="mobile row">
              <div class="col-xl-12 col-lg-12">
                  <div class="you-can-help__left" style="padding-top:40px;">
                      <div class="row">
                      	<div class="col-md-2"></div>
              					<div class="col-md-8">
              						<div class="row sejarah wow fadeInDown" data-wow-delay="80ms">
					                	<div class="col-md-2 col-xs-2">
					                		<div class="no_1">1</div>
						                	<div class="garis" style="height:80px;"></div>
					                	</div>
					                	<div class="col-md-9 col-xs-10">
					                		<div class="tgl_sejarah"><?php echo getLang() ? "11 March 2014":"11 Maret 2014";?></div>
					                		<div class="info_sejarah"><?php echo !getLang() ? "Otoritas Jasa Keuangan (OJK) memberikan persetujuan perubahan kepemilikan saham PT BNI Life Insurance (BNI Life).":"The Financial Services Authority (OJK) has approved the change in share ownership of PT BNI Life Insurance (BNI Life).";?></div>
					                	</div>
					                </div>
					                <div class="row sejarah wow fadeInDown" data-wow-delay="80ms">
					                	<div class="col-md-2 col-xs-2">
					                		<div class="no_1">2</div>
					                		<div class="garis"></div>
					                	</div>
					                	<div class="col-md-9 col-xs-10">
					                		<div class="tgl_sejarah"><?php echo getLang() ? "21 March 2014":"21 Maret 2014";?></div>
					                		<div class="info_sejarah"><?php echo !getLang() ? "BNI Life menyelenggarakan RUPSLB dengan agenda penerbitan saham baru sebanyak 120.279.633 lembar yang diambil seluruhnya oleh Sumimoto Life Insurance Company.":"BNI Life held an EGMS (Extraordinary General Meeting of Shareholders) with the agenda of issuing 120,279,633 new shares which were taken entirely by Sumimoto Life Insurance Company.";?></div>
					                	</div>
					                </div>
					                <div class="row sejarah wow fadeInDown" data-wow-delay="80ms">
					                	<div class="col-md-2 col-xs-2">
					                		<div class="no_1">3</div>
					                	</div>
					                	<div class="col-md-9 col-xs-10">
					                		<div class="tgl_sejarah"><?php echo getLang() ? "9 May 2014":"9 Mei 2014";?></div>
					                		<div class="info_sejarah">
					                			<?php
					                			if(!getLang()) {echo "BNI Life menjadi perusahaan asuransi kehidupan (JIWA) Joint Venture dengan porsi kepemilikan saham:<br>
																<span class='padtop10'>PT Bank Negara Indonesia (Persero) Tbk - 60.000000%<br>
																Sumimoto Life Insurance Company - 39.999993%<br>
																Yayasan Kesejahteraan Karyawan (YKP) BNI - 0.000003%<br>
																Yayasan Danar Dana Swardharma (YDD) - 0.000003%<br></span>";}
																else {echo "BNI Life is a Joint Venture life insurance company with the following share ownership:<br>
																<span class='padtop10'>PT Bank Negara Indonesia (Persero) Tbk - 60.000000%
																Sumimoto Life Insurance Company - 39.999993%<br>
																Yayasan Kesejahteraan Karyawan (YKP) BNI - 0.000003%<br>
																Yayasan Danar Dana Swardharma (YDD) - 0.000003%<br></span>";}
																?>
															</div>
					                	</div>
					                </div>
              					</div>
              					<div class="col-md-2"></div>
              				</div>
                  </div>
              </div>
	          </div>
	        </div>
          <div class="row stepz1">
                <div class="mobile col-md-6 visi-right wow fadeInRightBig" data-wow-delay="80ms">
                	<?php echo $val['headline'.getLang().'2'];?>
                </div>
                <div class="col-md-6 visi-left wow fadeInLeftBig" data-wow-delay="80ms">
                	<img src="<?php echo base_url()."uploads/".$val['file2'];?>" width="100%">
                </div>
                <div class="desktop col-md-6 visi-right wow fadeInRightBig" data-wow-delay="80ms">
                	<?php echo $val['headline'.getLang().'2'];?>
                </div>
          </div>
          <div class="row">
              <div class="col-md-6 misi-left wow fadeInLeftBig" data-wow-delay="80ms">
              	<?php echo $val['headline'.getLang().'3'];?>
              </div>
              <div class="col-md-6 misi-right wow fadeInRightBig" data-wow-delay="80ms">
              	<img src="<?php echo base_url()."uploads/".$val['file3'];?>" width="100%">
              </div>
          </div>
        </section>
                
        <section class="you-can-help section-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="you-can-help__left padtop20">
                          <div class="block-title text-center wow zoomIn" data-wow-delay="80ms">
                              <h1><?php echo !getLang() ? "Penghargaan" : "Awards";?></h1>
                          </div>
							            <div class="container desktop">
							            	<div class="row">
								                <div class="col-xl-12">
								                	<div class="row">
								                		<?php
								                		$q = GetAll("award",array("date"=> "order/desc", "is_delete"=> "where/0", "limit"=> "0/8"));
								                		foreach($q->result_array() as $k=> $r) {
								                			if(file_exists("./uploads/awards/".$r['image'])) $img = base_url().'uploads/awards/';
								                			else $img = base_url().'uploads/award/';
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
								            </div>
								          </div>
								          <!-- Mobile -->
							          	<div class="mobile swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
								    "effect": "slide",
								    "pagination": {
								        "el": "#awards-slider-pagination",
								        "type": "bullets",
								        "clickable": true
								      },
								    "autoplay": {
								        "delay": 4000
								    }}'>
								              <div class="swiper-wrapper">
								              	<?php
						                		$q = GetAll("award",array("date"=> "order/desc", "is_delete"=> "where/0", "limit"=> "0/5"));
						                		foreach($q->result_array() as $k=> $r) {
						                			if(file_exists("./uploads/awards/".$r['image'])) $img = base_url().'uploads/awards/';
						                			else $img = base_url().'uploads/award/';
						                			?>
								                  <div class="swiper-slide">
								                      <div class="container">
								                          <div class="swiper-slide__inner">
								                              <div class="row">
								                                  <div class="col-xs-12 box_blog_lain box_media_lain padbot25" style="margin-top:0px;">
																		              	<div class="box_image" style="height:200px;">
																			              	<img src="<?php echo $img.$r['image'];?>" alt="<?php echo $r['title_image'];?>" title="<?php echo $r['title_image'];?>">
																			              </div>
																							      <div class="judul text-center"><?php echo $r['description'.getLang()];?></div>
																							      <div class="tgl text-center"><?php echo FormatTanggalShort(substr($r['date'],0,10));?></div>
																				          </div>
								                              </div>
								                          </div>
								                      </div>
								                  </div>
						                  		<?php }
							                  ?>
								              </div>
								              <div class="swiper-pagination" id="awards-slider-pagination" style="bottom:0px !important;"></div>
								          </div>
								        </div>
								    </div>
								</div>
								<div class="col-md-12 desktop text-center stepz2">
      						<a href="<?php echo lang_url('penghargaan');?>" class="btn-color" style="cursor:pointer;"><?php echo !getLang() ? "Penghargaan Lainnya" : "Other Awards";?></a>
      					</div>
          	</div>
        </section>