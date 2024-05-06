
        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(19);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[67];?></div>
                      <div class="info"><?php echo $bhs[68];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul"><?php echo $bhs[67];?></div>
			      <div class="info"><?php echo $bhs[68];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(19);?>" width="100%">
          </div>
        </section>

        <section class="you-can-help">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left unit_link">
                          <div class="row">
                  					<div class="col-md-4">
                  						<?php
                  						$q = GetAll("fun_product_cat", array("id_parent"=> "where/0",'is_delete'=>'where/0'));
                  						foreach($q->result_array() as $k=> $r) {
											if(getLang())
											{
												$opt_unit[$r['id']] = $r['title_ENG'];
											}
											else
											{
												$opt_unit[$r['id']] = $r['title'];
											}
                  						}
                          		echo form_dropdown("unitlink",$opt_unit,"", "class='unitlink_c form-controls mobile dropdown_mobile'");
                          		?>
                          		<div class="desktop">
	                          		<?php
	                          		foreach($q->result_array() as $k=> $r) {?>
	                  						<div class="row csrz csr<?php echo $r['id'];?> <?php echo $k==0 ? "aktif" : "";?>" rel="<?php echo $r['id'];?>">
								                	<div class="col-md-10 col-xs-12">
								                		<div class="title_csr"><?php echo getLang() ? $r['title_ENG'] : $r['title'];?></div>
								                	</div>
								                </div>
								              <?php }
								              ?>
								              </div>
                  					</div>
                  					
                  					<?php
                  					foreach($q->result_array() as $k=> $r) {?>
                  					<div class="blog_detailz col-md-8 csr-kanan csr-info<?php echo $r['id'];?>" style="<?php echo $k==0 ? "" : "display:none;";?>">
                  						<h2><?php echo getLang() ? $r['title_ENG'] : $r['title'];?></h2>
                  						<p><?php echo getLang() ? $r['description_ENG'] : $r['description'];?></p>
                  						<div class="tab text-left unit-link">
                  							<?php
                  							$qq = GetAll("fun_product_cat", array("id_parent"=> "where/".$r['id'],'is_delete'=>'where/0'));
                  							foreach($qq->result_array() as $kk=> $rr) {
                  								$akt = $kk==0 ? "aktif" : "";
	                          			echo getLang() ? "<a class='linklayanan ".$akt." tabzz".$kk."' rel='".$kk."'>".$rr['title_ENG']."</a>" : "<a class='linklayanan ".$akt." tabzz".$kk."' rel='".$kk."'>".$rr['title']."</a>";
	                          		}
	                          		?>
	                          	</div>
	                          	
	                          	<?php
                							foreach($qq->result_array() as $kk=> $rr) {?>
		                          	<div class="row perlindungz perlindung<?php echo $kk;?>" style="<?php echo $kk==0 ? "" : "display:none;";?>">
	                  							<div class="accrodion-grp faq-one-accrodion faq-one-main" data-grp-name="faq-one-accrodion">
	                  								<?php
			                							$qqq = GetAll("fun_product", array("id_category"=> "where/".$rr['id'],'is_delete'=>'where/0','id'=>'order/asc'));
			                							foreach($qqq->result_array() as $kkk=> $rrr) {?>
	                  								<div class="accrodion <?php echo $kkk==0 ? "active" : "";?>">
	                                      <div class="accrodion-title">
	                                         <h4><?php echo getLang() ? $rrr['title'] : $rrr['title'];?></h4>
	                                      </div>
	                                      <div class="accrodion-content">
	                                        <div class="inner">
	                                        	<?php echo getLang() ? $rrr['content_ENG'] : $rrr['content'];?>
	                                        </div>
	                                      </div>
	                                  </div>
		                                <?php }
		                                ?>
	                                </div>
							                  </div>
							                <?php }
							                ?>
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
        	
        	$(".linklayanan").click(function(){
						$(".linklayanan").removeClass("aktif");
						//$(this).addClass("aktif");
						var rel=$(this).attr("rel");
						$(".tabzz"+rel).addClass("aktif");
						$(".perlindungz").hide();
						$(".perlindung"+rel).show();
					});
					
					$(".unitlink_c").change(function(){
						var rel=$(this).val();
						$(".csrz").removeClass("aktif");
        		$(".csr"+rel).addClass("aktif");
        		$(".csr-kanan").hide();
        		$(".csr-info"+rel).fadeIn(300);
					});
				});
				</script>