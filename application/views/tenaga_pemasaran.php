        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(11);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[53];?></div>
                      <div class="info"><?php echo $bhs[54];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul"><?php echo $bhs[53];?></div>
			      <div class="info"><?php echo $bhs[54];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(11);?>" width="100%">
          </div>
        </section>
        
        <section class="you-can-help pemasaran">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
			                	<div class="row">
			                		<div class="col-md-12">
							            	<div class="block-title text-center">
	                              <h1 class="desktop"><?php echo $bhs[55];?></h1>
	                              <span><?php echo $bhs[56];?></span>
	                          </div>
	                        </div>
	                        <div class="col-md-12">
		                        <?php
				                		$q = GetAll("tenaga_pemasar", array("file >"=> "where/0", "is_delete"=> "where/0", "limit"=> "0/10"));
				                		foreach($q->result_array() as $r) {?>
				                    <div class="col-md-3 col-xs-6 tenaga_pemasar_5">
				                    	<div class="box-lelang">
			                            <div class="judul-lelang"><?php echo $r['title'];?></div>
			                            <div class="tgl-lelang">
			                            	<div class="download-lelang">
			                            		<a href="<?php echo base_url().'uploads/tenaga_pemasar/'.$r['file'];?>" target="_blank">
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
								</div>
          	</div>
        </section>