				<?php
        $img = base_url().'uploads/lelang/';
        //$xx = strlen("Informasi Pelelangan Terbuka Pengadaan Third Party Administration (TPA) Penyedia Jasa Layanan Administrasi Kesehatan Bagi Klien Produk Asuransi Kesehatan BNI Life");
        //die($xx."S");
				?>
        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(6);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[39];?></div>
                      <div class="info"><?php echo $bhs[40];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul"><?php echo $bhs[39];?></div>
			      <div class="info"><?php echo $bhs[40];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(6);?>" width="100%">
          </div>
        </section>

        <section class="you-can-help">
            <div class="container">
                <div class="row lelang_other">
                    <div class="col-xl-12 col-lg-12">
			                	<div class="row">
							            <div class="col-md-9 col-xs-12">
							            	<div class="desktop">
							            		<div class="lelang_info" style="padding-top:4px;"><?php echo $bhs[41];?> <a href="<?php echo lang_url('lelang/syarat');?>"><?php echo !getLang() ? "disini" : "here";?></a></div>
								            </div>
								            <div class="mobile text-center">
							            		<div class="lelang_info"><?php echo $bhs[41];?> <a href="<?php echo lang_url('lelang/syarat');?>"><?php echo !getLang() ? "disini" : "here";?></a></div>
								            </div>
			                    </div>
			                    <div class="desktop btn-unduh col-md-3 col-xs-12 text-right">
			                    	<a href="https://eproc.bni-life.co.id/pm" target="_blank" class="btn-color2"><?php echo !getLang() ? "Daftar Rekanan" : "List Partners";?></a>
			                    </div>
			                    <div class="mobile btn-unduh col-md-3 col-xs-12 text-center">
			                    	<a href="https://eproc.bni-life.co.id/pm" target="_blank" class="btn-color2"><?php echo !getLang() ? "Daftar Rekanan" : "List Partners";?></a>
			                    </div>
                				</div>
                				
			                	<div class="row padtop10" style="padding-top:20px;">
			                		<?php
			                		$q = GetAll("lelang", array("file >"=> "where/0", "periode"=> "order/desc", "is_delete"=> "where/0", "limit"=> "0/8"));
			                		foreach($q->result_array() as $r) {?>
			                    <div class="col-md-3 col-xs-12">
			                    	<div class="box-lelang">
		                            <div class="judul-lelang">
		                            	<?php echo !getLang() ? JudulTitik($r['title']) : JudulTitik($r['title_eng']);?>
		                            	<div class="lelang-tgl"><?php echo FormatTanggalShort(substr($r['periode'],0,10));?></div>
		                            </div>
		                            <div class="tgl-lelang">
		                            	<div class="download-lelang">
		                            		<a href="<?php echo $img.$r['file'];?>" target="_blank">
		                            			<img src="<?php echo base_url();?>assets/images/download_biru.png" style="width:40px;">
		                            		</a>
		                            	</div>
		                            </div>
		                        </div>
			                    </div>
			                  	<?php }
			                  	?>
			                  </div>
								    </div>
								</div>
								<div class="col-md-12 text-center stepz2">
									<?php
									$q = GetAll("lelang", array("file >"=> "where/0"));
									if($q->num_rows() > 8) {
										$label = !getLang() ? "Lihat lelang lainnya" : "Others Auctions";
										echo "<a class='btn-nocolor muat_lebih' rel='8' style='cursor:pointer;'>".$label."</a>";
									}
									?>									
      							</div>
          	</div>
        </section>
        
        <script>
        $(".muat_lebih").click(function(){
        	var limit = $(".muat_lebih").attr("rel");
        	$.post("<?php echo site_url('lelang/muat_lebih/"+limit+"/');?>", {langz: "<?php echo getLang();?>"},  function(response) {
						$(".lelang_other").append(response);
						var new_limit = parseInt(limit) + 8;
						$(".muat_lebih").attr("rel", new_limit);
					});
        });
        </script>