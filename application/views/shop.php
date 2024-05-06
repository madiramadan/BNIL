<style>
.cariz input{border:1px solid #ccc;}
.btn-cari{width:80px;background:#F15922;color:#fff;}
.cari_shop{color:#fff !important;}
</style>
        <!-- Shop -->
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
        "delay": 8000
    }}'>
                <div class="swiper-wrapper" style="max-height:500px !important;">
                	<?php
                	$q=GetAll("merchandise_ban",array("is_publish"=> "where/1", "urutan"=> "order/asc"));
                	foreach($q->result_array() as $r) {?>
                    <div class="swiper-slide">
                        <!--<div class="image-layer desktop" title="<?php echo $r['title_image'];?>" style="background-image: url(<?php echo base_url()."uploads/promo/".$r['image'];?>);"></div>
                        <div class="image-layer mobile" title="<?php echo $r['title_image_mobile'];?>" style="background-image: url(<?php echo base_url()."uploads/promo/".$r['image_mobile'];?>);"></div>-->
                        <div class="container_full">
                            <div class="swiper-slide__inner" style="padding-top:0px;padding-bottom:0px;">
                                <div class="row">
                                    <div class="col-xl-12 text-center">
                                       <img class="desktops" src="<?php echo base_url()."uploads/merchandise_ban/".$r['image'];?>" width="100%">
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
        
        <section class="you-can-help">
        	<div class="container block-title">
        		<div class="row">
        			<div class="col-md-4"><h1><?php echo $bhs[105];?></h1></div>
        			<div class="col-md-8 text-right">
        				<form method="POST" class="cariz" action="<?php echo site_url('shop');?>">
        					<input name="s_shop" class="s_shop" value="<?php echo $cari ? $cari : "";?>" placeholder="<?php echo $bhs[106];?>">
        					<button type="submit" class="btn" style="background: #F15922;padding: 8px 15px;font-size: 20px;">
										<i class="icon-magnifying-glass cari_shop"></i>
									</button>
        				</form>
        			</div>
        		</div>
        		<div class="row">
        			<?php
        			if($cari) $q = GetAll("merchandise_prod", array("nama"=> "like/".$cari, "is_publish"=> "where/1", "create_date"=> "order/desc", "limit"=> "0/8"));
        			else $q = GetAll("merchandise_prod", array("is_publish"=> "where/1", "create_date"=> "order/desc", "limit"=> "0/8"));
	            foreach($q->result_array() as $r) {?>
	            	<div class="col-xs-6 col-lg-3 box_shop_lain text-center">
	              	<a href="<?php echo lang_url('shop/detail/'.$r['id']);?>">
	              		<div class="box_image">
			              	<img src="<?php echo base_url()."uploads/merchandise_prod/".$r['image1'];?>" alt="<?php echo $r['title_image1'];?>" title="<?php echo $r['title_image1'];?>">
			              </div>
							      <!--<div class="tgl"><?php echo $r['category'];?></div>-->
			              <div class="judul" style="color:#1C1C1C;"><?php echo $r['nama'.getLang()];?></div>
			              <div class="harga" style="color:#5c5b5b;font-weight:normal;"><?php echo getLang() ? Rupiah_ENG($r['price']) :  Rupiah($r['price']);?></div>
			            </a>
			          </div>
			        <?php }
			        ?>
            </div>
          </div>
        </section>
        
        <section class="you-can-help" style="padding-top:20px;">
        	<div class="container">
        		<div class="row cara_belanja">
        			<div class="col-md-4 col-xs-12">
        				<h2><?php echo $bhs[107];?></h2>
        				<p><?php echo $bhs[108];?></p>
        			</div>
        			<div class="col-md-4 col-xs-12">
        				<h4><?php echo $bhs[109];?></h4>
        				<p><?php echo $bhs[110];?></p>
        				<h4><?php echo $bhs[113];?></h4>
        				<p><?php echo $bhs[114];?></p>
        				<h4><?php echo $bhs[117];?></h4>
        				<p><?php echo $bhs[118];?></p>
        			</div>
        			<div class="col-md-4 col-xs-12">
        				<h4><?php echo $bhs[111];?></h4>
        				<p><?php echo $bhs[112];?></p>
        				<h4><?php echo $bhs[115];?></h4>
        				<p><?php echo $bhs[116];?></p>
        			</div>
        		</div>
        	</div>
        </section>
        
        
        <section class="you-can-help">
        	<div class="container">
        		<div class="block-title">
        			<h2 class="text-center">FAQ</h2>
        		</div>
        		<div class="row">
        			<div class="col-md-1 desktop"></div>
        			<div class="col-md-10 col-xs-12">
	        			<div class="accrodion-grp faq-one-accrodion faq-one-main" data-grp-name="faq-one-accrodion">
									<div class="accrodion active">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[119];?></h4>
                    </div>
                    <div class="accrodion-content">
                      <div class="inner">
                      	<p><?php echo $bhs[120];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[121];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[122];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[123];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[124];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[125];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[126];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[127];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[128];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[129];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[130];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[131];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[132];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[133];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[134];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[135];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[136];?></p>
                      </div>
                    </div>
	                </div>
	              </div>
	            </div>
	            <div class="col-md-1 desktop"></div>
            </div>
          </div>
        </section>