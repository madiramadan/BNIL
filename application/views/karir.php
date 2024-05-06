        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(7);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[42];?></div>
                      <div class="info"><?php echo $bhs[43];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul"><?php echo $bhs[42];?></div>
			      <div class="info"><?php echo $bhs[43];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(7);?>" width="100%">
          </div>
        </section>

        <section class="you-can-help section-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
			                	<div class="row">
			                			<div class="col-xl-12 text-center">
				                			<div class="block-title text-center wow zoomIn" data-wow-delay="50ms">
			                            <h2 style="color:#000;font-weight:bold;"><?php echo $bhs[44];?></h2>
			                            <span><?php echo $bhs[45];?></span>
			                        </div>
			                      </div>
						                <div class="col-xl-12 karir">
						                	<?php
						                	$q = GetAll("career", array("closed_date"=> "order/desc"));
						                	foreach($q->result_array() as $r) {?>
								                <div class="col-md-6 col-xl-12">
								                	<div class="box-karir">
									                	<div class="nomer">
									                		<div class="num" style="width:100%;color:#006885;"><?php echo $r['title'.getLang()];?></div>
									                	</div>
									                	<div class="clear"></div>
									                	<div class="info"><?php echo $r['category'];?></div>
									                	<!--<div class="lokasiz"><i class="fa fa-map-marker-alt"></i> <?php echo $r['cities'];?></div>-->
									                	<!--<div class="fulltime"><i class="far fa-clock"></i> Full Time</div>-->
									                	<div class="panah text-right"><a href="<?php echo lang_url('karir/'.$r['slug']);?>"><?php echo !getLang() ? "Selengkapnya" : "Detail";?></a></div>
									                	<div class="clear"></div>
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