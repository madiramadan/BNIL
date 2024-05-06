
        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".$val['file'];?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $val['title'.getLang()];?></div>
                      <div class="info"><?php echo $val['headline'.getLang()];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".$val['file_mobile'];?>" width="100%">
          </div>
          <div class="col-xs-12">
	          <div class="text-center" style="margin-top:20px;">
		          <div class="judul" style="font-size:24px;line-height:26px;color:#F7941E;font-weight:bold;margin-bottom:20px;text-shadow:none;"><?php echo $val['title'.getLang()];?></div>
			        <div class="info"><?php echo $val['headline'.getLang()];?></div>
			      </div>
			    </div>
        </section>

        <section class="you-can-help section-bottom">
        	<div class="container">
              <div class="row blog_detailz">
                  <div class="col-xl-12 col-lg-12 contentz">
                      <?php echo $val['contents'.getLang()];?>
                  </div>
              </div>
          </div>
        </section>