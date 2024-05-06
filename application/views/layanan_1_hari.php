<style>
.sh-left{font-size:16px !important;}
.sh-left div{padding:10px;line-height:20px;}
.sh-left li{line-height:32px;}
.sh-right{padding-top:80px;font-size:16px !important;}
</style>
        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(21);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[149];?></div>
                      <div class="info"><?php echo $bhs[150];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul2"><?php echo $bhs[149];?></div>
			      <div class="info2"><?php echo $bhs[150];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(21);?>" width="100%">
          </div>
        </section>        
        <section class="you-can-help" id="section1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="you-can-help__left klaim" style="padding-top:0px;">
                        		<div class="tab text-center" style="width:100%;float:left;margin-bottom:50px;">
                            	<div style="width:80%;margin:auto;">
                            		<?php 
                            		$opt_klaim=array("1"=> "Klaim 25 menit", "2"=> "Layanan 1 hari");
                            		echo form_dropdown("klaim",$opt_klaim, 2, "class='klaim form-controls mobile dropdown_mobile'");
                            		?>
                            		<div class="desktop">
		                          		<a href="<?php echo lang_url('klaim');?>" class="linktab" rel="1"><?php echo $bhs[74];?></a>
		                          		<a href="<?php echo lang_url('layanan-1-hari');?>" class="linktab aktif" rel="2"><?php echo getLang() ? "1 Day Service" : "Layanan 1 hari";?></a>
		                          	</div>
	                          	</div>
                          	</div>
                            <div class="row">
							                <div class="col-xl-12 text-center wow zoomIn" data-wow-delay="150ms">
							                	<h1><?php echo $bhs[76];?></h1>
							                	<div class="row text-center stepz">
							                		<?php
		                            	$q = GetAll("beragam_kemudahan", array("id"=> "order/asc", "is_publish"=> "where/1", "limit"=> "0/3"));
		                            	foreach($q->result_array() as $k=> $r) {
		                            		?>
			                    					<div class="proteksi col-xl-4 col-lg-4">
			                    						<div>
			                    							<img src="<?php echo base_url()."uploads/".$r['file'];?>">
			                    						</div>
				                    					<div>
				                    						<h2><?php echo $r['title'.getLang()];?></h2>
				                    						<p class="ket"><?php echo $bhs[162+$k];?></p>
				                    					</div>
			                    					</div>
			                    					<?php
		                    					}
		                    					?>
		                    					<div class="col-md-12 stepz">
		                    						<p class="ket"><?php echo $bhs[151];?></p>
		                    					</div>
		                    				</div>
							                </div>
							            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="you-can-help">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="klaim" style="padding-top:0px;">
                          <div class="row">
                          	<div class="col-md-12 text-center wow fadeInDown" data-wow-delay="150ms">
                          		<h1><?php echo $bhs[152];?></h1><br>
                          	</div>
                  				</div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
          		<div class="text-left col-md-1 desktop wow fadeInLeftBig" data-wow-delay="80ms"></div>
              <div class="text-left col-md-5 col-xs-12 wow fadeInLeftBig sh-left" data-wow-delay="80ms">
              	<?php echo $val['contents'.getLang()];?>
              </div>
              <div class="col-md-6 col-xs-12 misi-right wow fadeInRightBig" data-wow-delay="80ms">
              	<img src="<?php echo base_url()."uploads/".$val['file'];?>" width="100%">
              </div>
          </div>
        </section>
        
        <section class="you-can-help klaim-detail" style="background:#fff !important;padding-top:0px;">
        	<div class="container">
            <div class="row">
            	<div class="col-md-1 desktop wow fadeInLeftBig" data-wow-delay="80ms"></div>
              <div class="col-md-4 desktop col-xs-12 text-center wow fadeInLeft" data-wow-delay="250ms">
              	<img src="<?php echo base_url()."uploads/".$val['file2'];?>" width="100%">
              </div>
              <div class="col-md-1 desktop wow fadeInLeftBig" data-wow-delay="80ms"></div>
              <div class="text-center col-md-6 col-xs-12 wow fadeInRight sh-right" data-wow-delay="250ms">
              	<h2 class="judul"><?php echo $bhs[153];?></h2>
              	<p><?php echo $bhs[154];?></p>
              	<ul class="text-left" style="padding-left:30px;padding-top:40px;">
              		<?php
              		for($i=1;$i<=7;$i++){?>
              		<li><i class="fa fa-check-circle"></i> <?php echo $bhs[154+$i];?></li>
              		<?php }?>
              	</ul>
              	<br>
              	<a class="btn-color-blue" href="<?php echo lang_url('formulir');?>" target="_blank"><?php echo getLang() ? "Download Form" : "Download Formulir";?></a>
              </div>
            </div>
          </div>
        </section>
        
<script>
$(".klaim").change(function(){
	var rel=$(this).val();
	if(rel==2) window.location="<?php echo lang_url('layanan-1-hari');?>";
	else window.location="<?php echo lang_url('klaim');?>";
});
</script>