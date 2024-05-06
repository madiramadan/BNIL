<style>
.box-lelang{min-height:150px;padding:15px;}
.formulir .box-lelang .judul-lelang{padding-bottom:0px;font-size:14px;}
.download-lelang{position:absolute;bottom:22px;right:30px;}
</style>
        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(12);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[59];?></div>
                      <div class="info"><?php echo $bhs[60];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>        
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul"><?php echo $bhs[59];?></div>
			      <div class="info"><?php echo $bhs[60];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(12);?>" width="100%">
          </div>
        </section>

        <section class="you-can-help section-bottom">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left formulir">
                          <div class="row">
                  					<div class="col-md-4">
                  						<?php
                  						$q = GetAll("formulir",array("id"=> "order/desc"));
                  						foreach($q->result_array() as $k=> $r) {
                  							$opt_for[$r['id']] = $r['nama'.getLang()];
                  						}
                          		echo form_dropdown("formulir",$opt_for,"", "class='laporan_c form-controls mobile dropdown_mobile'");
                          		?>
                          		<div class="desktop">
	                          		<?php
	                  						foreach($q->result_array() as $k=> $r) {?>
		                  						<div class="row csrz csr<?php echo $r['id'];?> <?php echo $k==0 ? "aktif":"";?>" rel="<?php echo $r['id'];?>">
									                	<div class="col-md-9 col-xs-9">
									                		<div class="title_csr"><?php echo $r['nama'.getLang()];?></div>
									                	</div>
									                </div>
									              <?php }?>
									            </div>
                  					</div>
                  					
                  					<?php
                  					$link = base_url().'uploads/formulir/';
                  					$link2 = base_url().'uploads/formulirs/';
                  					$q = GetAll("formulir",array("id"=> "order/desc"));
                						foreach($q->result_array() as $k=> $r) {?>
                  					<div class="col-md-8 csr-kanan csr-info<?php echo $r['id'];?>" <?php echo $k==0 ? "" : "style='display:none;'";?>>
                  						<h1 class="text-center"><?php echo $r['nama'.getLang()];?></h1><br>
                  						<div class="row">
                  							<?php
                  							$qq = GetAll("formulir_view",array("id_formulir"=> "where/".$r['id'], "is_delete"=> "where/0", "id"=> "order/desc"));
                								foreach($qq->result_array() as $rr) {
                									if(file_exists("./uploads/formulirs/".$rr['file'])) {
														$l=$link2;
													}else{
														$l=$link;
													}
                									?>
	                  							<div class="col-md-4 col-xs-12">
							                    	<div class="box-lelang">
						                            <div class="judul-lelang"><?php echo $rr['nama'.getLang()];?></div>
						                            <div class="tgl-lelang">
						                            	<div class="download-lelang">
						                            		<a href="<?php echo $l.$rr['file'];?>" target="_blank">
						                            			<img src="<?php echo base_url();?>assets/images/download_biru.png" style="width:40px;">
						                            		</a>
						                            	</div>
						                            </div>
						                        </div>
							                    </div>
						                  	<?php 
											}
						                  	?>
						                  </div>
						                </div>
						                <?php }
						                ?>
                  				</div>
                      </div>
                  </div>
              </div>
          </div>
        </section>
        
        <script>
        $(document).ready(function(){	
        	$(".csrz").click(function(){
        		var rel=$(this).attr("rel");
        		$(".csrz").removeClass("aktif");
        		$(".csr"+rel).addClass("aktif");
        		$(".csr-kanan").hide();
        		$(".csr-info"+rel).fadeIn(300);
        	});
        	$(".laporan_c").change(function(){
						var rel=$(this).val();
						$(".csrz").removeClass("aktif");
        		$(".csr"+rel).addClass("aktif");
        		$(".csr-kanan").hide();
        		$(".csr-info"+rel).fadeIn(300);
					});
					
				});
				</script>