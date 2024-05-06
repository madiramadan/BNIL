        <!-- Promo -->
        <?php
        $clsother='section-top';
        $style="";
        $q=GetAll("promo",array("is_publish"=> "where/1", "is_delete"=> "where/0", "id_media_cat"=> "where/1", "publish_date"=> "order/desc", "limit"=> "0/3"));
        if($q->num_rows()>0){
            $style='style="padding-top:0px;"';
            $clsother='section-bottom';
        ?>

        <section class="section-top">
        		<div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
    "effect": "slide",
    "pagination": {
        "el": "#main-slider-pagination",
        "type": "bullets",
        "clickable": true
      },
    "navigation": {
        "nextEl": ".main-slider-button-next",
        "prevEl": ".main-slider-button-prev",
        "clickable": true
    },
    "autoplay": {
        "delay": 80000
    }}'>
                <div class="swiper-wrapper">
                	<?php
                	foreach($q->result_array() as $r) {?>
                    <div class="swiper-slide">
                        <!--<div class="image-layer desktop" title="<?php echo $r['title_image'];?>" style="background-image: url(<?php echo base_url()."uploads/promo/".$r['image'];?>);"></div>
                        <div class="image-layer mobile" title="<?php echo $r['title_image_mobile'];?>" style="background-image: url(<?php echo base_url()."uploads/promo/".$r['image_mobile'];?>);"></div>-->
                        <div class="container_full">
                            <div class="swiper-slide__inner" style="padding-top:0px;padding-bottom:0px;">
                                <div class="row">
                                    <div class="col-xl-12 text-center">
                                       <img class="desktop" src="<?php echo base_url()."uploads/promo/".$r['image'];?>" width="100%">
                                       <img class="mobile" src="<?php echo base_url()."uploads/promo/".$r['image_mobile'];?>" width="100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php }
                  ?>
                </div>
                <div class="main-slider-nav nav-banner">
                    <div class="main-slider-button-prev"><i class="fa fa-angle-right"></i></div>
                    <div class="main-slider-button-next"><i class="fa fa-angle-right"></i> </div>
                </div>
            </div>
        </section>
        <?php }?>
        <section class="you-can-help <?php echo $clsother?>" $style>
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left">
                          <div class="row">
								            <div class="col-md-12 text-center">
								            	<div class="block-title text-center">
									            	<h1 style="color:#1C1C1C;">Promo</h1>
									            </div>
				                    </div>
				                  </div>
				                  <div class="row promo_other">
				                  	<?php
					                	$q=GetAll("promo",array( "id_media_cat"=> "where/1", "is_delete"=> "where/0", "publish_date"=> "order/desc",'limit'=>'0/3'));
					                	foreach($q->result_array() as $r) {?>
					                    <div class="col-md-4 col-xs-12" style="padding-bottom:30px;">
					                    	<div class="promoz">
						                    	<img src="<?php echo base_url()."uploads/promo/".$r['image'];?>" width="100%" alt="<?php echo $r['title_image'];?>" title="<?php echo $r['title_image'];?>">
						                    	<div class="box-promo">
							                    	<div class="tgl">
			                            		<?php echo FormatTanggalShort(substr($r['publish_date'],0,10));?>
			                            	</div>
			                            	<div class="judul" style="line-height:28px;">
			                            		<?php echo $r['title'.getLang()];?>
			                            		<span style="font-size:14px;"><br>
			                            			<?php echo strip_tags(word_limiter($r['contents'.getLang()],12));?>
			                            		</span>
			                            	</div>
			                            	<a href="<?php echo lang_url('promo/'.$r['slug']);?>"><?php echo getLang() ? "Check Promo" : "Cek Promo";?></a>
			                            </div>
		                            </div>
					                    </div>
					                  <?php }
					                  ?>
                  				</div>
							    				<div class="col-md-12 text-center" style="padding-bottom:80px;"><br>
							  						<a class="btn-color muat_lebih" rel="3" style="cursor:pointer;"><?php echo getLang() ? "Other Promo" : "Muat Lebih";?></a>
							  					</div>
                      </div>
                  </div>
              </div>
          </div>
        </section>
        <script>
        $(".muat_lebih").click(function(){
        	var limit = $(".muat_lebih").attr("rel");
        	$.post("<?php echo site_url('promo/muat_lebih/"+limit+"');?>", {id:1,langz: "<?php echo getLang();?>"},  function(response) {
						$(".promo_other").append(response);
						var new_limit = parseInt(limit) + 3;
						$(".muat_lebih").attr("rel", new_limit);
					});
        });
        </script>