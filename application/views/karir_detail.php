
        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(7);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $val['title'.getLang()];?></div>
                      <!--<div class="info"><?php echo $val['cities'];?></div>-->
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul text-center"><?php echo $val['title'.getLang()];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(7);?>" width="100%">
          </div>
        </section>

        <section class="you-can-help section-bottom karir_detail">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left">
                          <div class="row blog_detailz">
			                  	  <div class="col-md-12">
				                    	<?php echo $val['contents'.getLang()];?>
				                    </div>
                  				</div>
                      </div>
                  </div>
              </div>
          </div>
        </section>