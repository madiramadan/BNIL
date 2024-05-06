        <section class="section-top">
        	<div class="bg-top-perlindungan" style="background-image:url('<?php echo base_url();?>uploads/bg-perlindungan.png');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="perlindungan-head text-center wow fadeInUp" data-wow-delay="100ms">
                      <div class="judul">Temukan Perlindungan Yang Tepat Untuk Segala Kebutuhan</div>
                      <!--<div class="info">Kami berperan aktif dalam pengembangan keuangan berkelanjutan dan bersinergi dengan PT Bank Negara Indonesia (Persero) Tbk untuk mendukung terlaksananya penerapan keuangan berkelanjutan.</div>-->
                    </div>
                </div>
            </div>
          </div>
        </section>
        <!-- Welcome Two End -->

        <section class="you-can-help perlindungan">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left">
	                      	<div class="tab text-center">
                        		<a href="<?php echo lang_url('perlindungan/main/individu');?>" class="linktab <?php echo $id_kat==1 ? "aktif":"";?>" rel="1">Individu</a>
                        		<a href="<?php echo lang_url('perlindungan/main/kumpulan');?>" class="linktab <?php echo $id_kat==2 ? "aktif":"";?>" rel="2">Kumpulan</a>
                        		<a href="<?php echo lang_url('perlindungan/main/syariah');?>" class="linktab <?php echo $id_kat==3 ? "aktif":"";?>" rel="3">Syariah</a>
                        	</div>
                          <div class="row">
                  					<div class="col-md-4">
                  						<?php
                  						$q = GetAll("product_cat",array("id_parent"=> "where/".$id_kat, "id"=> "order/asc"));
                  						foreach($q->result_array() as $k=> $r) {
                  							if($k==0) {
                  								$label = $r['title'.getLang()];
                  								$ket = $r['description'.getLang()];
                  							}
                  							?>
	                  						<div class="row csrz rsc<?php echo $r['id'];?> <?php echo $k==0 ? "aktif":"";?>" rel="<?php echo $r['id'];?>" info="<?php echo $r['description'.getLang()];?>" title="<?php echo $r['title'.getLang()];?>" alt="<?php echo $r['title'.getLang()];?>">
								                	<div class="col-md-2 col-xs-2">
								                		<img class="img1 img" src="<?php echo base_url();?>assets/images/vector_csr.png">
								                	</div>
								                	<div class="col-md-9 col-xs-9">
								                		<div class="title_csr"><?php echo $r['title'.getLang()];?></div>
								                	</div>
								                </div>
								              <?php }
								              ?>
                  					</div>
                  					<div class="col-md-8 csr-kanan">
                  						<h1 class="title-perlindungan"><?php echo $label;?></h1>
				                    	<div class="produk_info">
				                    		<?php echo $ket;?>
				                    	</div>
				                    	<!--<div class="tab text-left">
	                          		<a class="linklayanan aktif" rel="1">Non Syariah</a>
	                          		<a class="linklayanan" rel="2">Syariah</a>
	                          	</div>-->
							                <div class="row perlindungz perlindung1">
							                    <div class="col-xl-12 col-xs-6">
							                        <div class="popular-causes__carousel owl-theme owl-carousel">
							                            <div class="popular-causes__sinlged">
							                                <div class="popular-causes__imgd">
							                                    <img src="<?php echo base_url();?>uploads/perlindungan1.png" width="100%">
							                                    <div class="label-perlindungan">
							                                        <p>BNI LIFE PERISAI PLUS</p>
							                                    </div>
							                                </div>
							                            </div>
							                            <div class="popular-causes__sinlged">
							                                <div class="popular-causes__imgd">
							                                    <img src="<?php echo base_url();?>uploads/perlindungan2.png" width="100%">
							                                    <div class="label-perlindungan">
							                                        <p>BNI LIFE DIGI MICRO PROTECTION</p>
							                                    </div>
							                                </div>
							                            </div>
							                            <div class="popular-causes__sinlged">
							                                <div class="popular-causes__imgd">
							                                    <img src="<?php echo base_url();?>uploads/perlindungan3.png" width="100%">
							                                    <div class="label-perlindungan">
							                                        <p>BNI LIFE DOUBLE PROTECTION</p>
							                                    </div>
							                                </div>
							                            </div>
							                            <div class="popular-causes__sinlged">
							                                <div class="popular-causes__imgd">
							                                    <img src="<?php echo base_url();?>uploads/perlindungan1.png" width="100%">
							                                    <div class="label-perlindungan">
							                                        <p>BNI LIFE PERISAI PLUS</p>
							                                    </div>
							                                </div>
							                            </div>
							                        </div>
							                    </div>
							                </div>
							                <!--<div class="row perlindungz perlindung2" style="display:none;">
							                    <div class="col-xl-12 col-xs-6">
							                        <div class="popular-causes__carousel owl-theme owl-carousel">
							                            <div class="popular-causes__sinlged">
							                                <div class="popular-causes__imgd">
							                                    <img src="<?php echo base_url();?>uploads/perlindungan3.png" width="100%">
							                                    <div class="label-perlindungan">
							                                        <p>BNI LIFE PERISAI PLUS</p>
							                                    </div>
							                                </div>
							                            </div>
							                            <div class="popular-causes__sinlged">
							                                <div class="popular-causes__imgd">
							                                    <img src="<?php echo base_url();?>uploads/perlindungan1.png" width="100%">
							                                    <div class="label-perlindungan">
							                                        <p>BNI LIFE DIGI MICRO PROTECTION</p>
							                                    </div>
							                                </div>
							                            </div>
							                            <div class="popular-causes__sinlged">
							                                <div class="popular-causes__imgd">
							                                    <img src="<?php echo base_url();?>uploads/perlindungan2.png" width="100%">
							                                    <div class="label-perlindungan">
							                                        <p>BNI LIFE DOUBLE PROTECTION</p>
							                                    </div>
							                                </div>
							                            </div>
							                            <div class="popular-causes__sinlged">
							                                <div class="popular-causes__imgd">
							                                    <img src="<?php echo base_url();?>uploads/perlindungan3.png" width="100%">
							                                    <div class="label-perlindungan">
							                                        <p>BNI LIFE PERISAI PLUS</p>
							                                    </div>
							                                </div>
							                            </div>
							                        </div>
							                    </div>
							                </div>-->
				                    </div>
                  				</div>
                      </div>
                  </div>
              </div>
          </div>
        </section>
        
        <section class="perlindungan">
            <div class="container">
                <div class="row">
                		<div class="col-md-4 col-xs-5"><img class="right" src="<?php echo base_url();?>assets/images/billa.png"></div>
                    <div class="col-md-8 col-xs-7 lindungi">
                      <div class="judul">Yang Kamu Cari Tidak Ada?<br>Tanyakan Langsung Ke Billa.</div>
                      <a href="#" class="btn-color">Tanya Billa</a>
                    </div>
                </div>
            </div>
        </section>
        
        <script>
        $(document).ready(function(){	
        	$(".csrz").click(function(){
        		var rel=$(this).attr("rel");
        		var alt=$(this).attr("alt");
        		var info=$(this).attr("info");
        		$(".csrz").removeClass("aktif");
        		$(".rsc"+rel).addClass("aktif");
        		$(".title-perlindungan").html(alt);
        		$(".produk_info").html(info);
        		$(".csr-kanan").hide();
        		$(".csr-kanan").fadeIn(300);
        	});
        	
        	$(".linklayanan").click(function(){
						$(".linklayanan").removeClass("aktif");
						$(this).addClass("aktif");
						var rel=$(this).attr("rel");
						$(".perlindungz").fadeOut();
						$(".perlindung"+rel).fadeIn(800);
					});
				});
				</script>