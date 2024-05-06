<style>
.promoz-detail ul{margin-left:50px;}
</style>
        <!-- Promo -->
        <section class="section-top">
	          <div class="row">
              <div class="col-xl-12 col-lg-12">
	              <img class="desktop" width="100%" src="<?php echo base_url()."uploads/promo/".$val['image'];?>" alt="<?php echo $val['title_image'];?>" title="<?php echo $val['title_image'];?>">
	              <img class="mobile" width="100%" src="<?php echo base_url()."uploads/promo/".$val['image_mobile'];?>" alt="<?php echo $val['title_image_mobile'];?>" title="<?php echo $val['title_image_mobile'];?>">
		           </div>
            </div>
        </section>
        
        <section class="you-can-help">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left">
                          <div class="row">
			                  	  <div class="col-md-12">
				                    	<div class="promoz-detail">
					                    	<div class="tgl">
	                            		<span>Promo</span> <?php echo FormatTanggalShort(substr($val['publish_date'],0,10));?>
	                            	</div>
	                            	<div class="judul">
	                            		<?php echo $val['title'.getLang()];?>
	                            	</div>
	                            	<?php echo $val['contents'.getLang()];?>
	                            </div>
				                    </div>
                  				</div>
                      </div>
                  </div>
              </div>
          </div>
        </section>
        
        <section class="you-can-help section-bottom">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left">
                          <?php
					                $q=GetAll("promo",array("id_media_cat"=> "where/1", "is_publish"=> "where/1", "id !="=> "where/".$val['id'], "limit"=> "0/3", "publish_date"=> "order/desc"));
					                if($q->num_rows() > 0) {?>	
                          <div class="row">
								            <div class="col-md-12">
								            	<div class="sub-title">
									            	<h4 style="color:#1C1C1C;"><b><?php echo getLang() ? "Other Promo" : "Promo Lainnya";?></b></h4>
									            </div>
				                    </div>
				                  </div>
				                  <div class="row">
				                  	<?php
					                	foreach($q->result_array() as $r) {?>
					                    <div class="col-md-4">
					                    	<div class="promoz">
						                    	<img src="<?php echo base_url()."uploads/promo/".$r['image'];?>" width="100%" alt="<?php echo $r['title_image'];?>" title="<?php echo $r['title_image'];?>">
						                    	<div class="box-promo">
							                    	<div class="tgl">
			                            		<?php echo FormatTanggalShort(substr($r['publish_date'],0,10));?>
			                            	</div>
			                            	<div class="judul">
			                            		<?php echo $r['title'.getLang()];?>
			                            	</div>
			                            	<a href="<?php echo lang_url('promo/'.$r['slug']);?>"><?php echo getLang() ? "Check Promo" : "Cek Promo";?></a>
			                            </div>
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
        </section>