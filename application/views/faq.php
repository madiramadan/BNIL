<style>
.faq-one-main-utama .accrodion-title{padding-right:40px;text-align:justify;}
.faq-one-main-utama .accrodion .accrodion-title h4::before{right:-40px;}
/*.faq-one-accrodion .accrodion.active .accrodion-title h4::before{right:-40px;}*/
.faq .title_csr{padding-right:20px;}
.faq .title_csr i{right: 20px;position: absolute;top:6px;}
.faq-one-main-utama .accrodion-content{padding-right:40px;text-align:justify;}
</style>
        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(15);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[65];?></div>
                      <div class="info"><?php echo $bhs[66];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul2"><?php echo $bhs[65];?></div>
			      <div class="info2"><?php echo $bhs[66];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(15);?>" width="100%">
          </div>
        </section>
        <!-- Welcome Two End -->

        <section id="faqz" class="you-can-help">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left faq">
                          <div class="row">
                  					<div class="col-md-4">
                  						<?php
                  						$q = GetAll("faq", array("urutan"=> "order/asc","is_delete"=> "where/0"));
                  						foreach($q->result_array() as $k=> $r) {
                  							$opt_for[$r['urutan']] = $r['nama'.getLang()];
                  						}
                          		echo form_dropdown("faq",$opt_for,"", "class='faq_c form-controls mobile dropdown_mobile'");
                          		?>
                          		<div class="desktop">
	                          		<?php
                  							foreach($q->result_array() as $key=> $r) {?>
	                  						<div class="row csrz csr<?php echo $r['urutan'];?> <?php echo $key==0 ? "aktif" : "";?>" rel="<?php echo $r['urutan'];?>">
								                	<div class="col-md-10 col-xs-12">
								                		<div class="title_csr"><?php echo $r['nama'.getLang()];?>
								                		<i class="fa fa-angle-right"></i>
								                		</div>
								                	</div>
								                </div>
								              <?php }
								              ?>
								            	</div>
                  					</div>
                  					<?php 
                  					foreach($q->result_array() as $key=> $r) {?>
	                  					<div id="faq-info<?php echo $r['urutan'];?>" class="col-md-8 csr-kanan csr-info<?php echo $r['urutan'];?>" style="<?php echo $key==0 ? "" : "display:none;";?>">
	                  						<h2 class="text-center"><?php echo $r['nama'.getLang()];?></h2>
	                  						<div class="row">
	                  							<div class="accrodion-grp faq-one-accrodion faq-one-main-utama" data-grp-name="faq-one-accrodion">
	                  								<?php
	                  								$qq = GetAll("faq_view", array("id_faq"=> "where/".$r['id'], "urutan"=> "order/asc","is_delete"=> "where/0"));
	                  								foreach($qq->result_array() as $ky=> $rr) {?>
	                                  <div class="accrodion <?php echo $ky==0 ? "active" : "";?>">
	                                      <div class="accrodion-title">
	                                         <h4><?php echo $rr['question'.getLang()];?></h4>
	                                      </div>
	                                      <div class="accrodion-content" style="<?php echo $ky==0 ? "" : "display:none;";?>">
                                          <div class="inner">
                                              <?php echo $rr['answer'.getLang()];?>
                                          </div>
	                                      </div>
	                                  </div>
		                                <?php }
		                                ?>
	                                </div>
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
        		//window.location.hash = "faqz";
        		topFunction();
        	});
        	$(".faq_c").change(function(){
						var rel=$(this).val();
						$(".csrz").removeClass("aktif");
        		$(".csr"+rel).addClass("aktif");
        		$(".csr-kanan").hide();
        		$(".csr-info"+rel).fadeIn(300);
					});
				});
				function topFunction() {
				  document.body.scrollTop = 600; // For Safari
				  document.documentElement.scrollTop = 600; // For Chrome, Firefox, IE and Opera
				}
				</script>