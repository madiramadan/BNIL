<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a0c0e56fc70c251"></script> 
<style>
@media (min-width: 1200px) {
    .container {
        max-width: 1160px;
    }
}
</style>
				<?php
        $imgz = base_url().'uploads/blog/';
        $img2 = base_url().'uploads/articles/';
				if(file_exists("./uploads/articles/".$val['image'])) $img=$img2;
	      else $img=$imgz;
				?>
        <section class="section-top desktop">
        	<div class="bg-top-blog-detail" style="background-image:url('<?php echo $img.$val['image'];?>');">
        		<div class="blog-detail-head">
	            <div class="container">
	                <div class="row">
	                    <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="100ms">
	                      <div class="box_cat"><span class="cat"><?php echo GetValue("title".getLang(), "blog_cat", array("id"=> "where/".$val['id_blog_cat']));?></span></div>
	                      <div class="judul"><?php echo $val['title'.getLang()];?></div>
	                      <div class="info"><?php echo FormatTanggalShort(substr($val['publish_date'],0,10));?></div>
	                    </div>
	                </div>
	            </div>
	          </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="bg-top-managemen">
        		<img src="<?php echo $img.$val['image_mobile'];?>" width="100%">
          </div>
          <div class="col-xs-12">
	          <div class="text-center" style="margin-top:20px;">
		          <div class="judul orange-utama" style="font-size:24px;line-height:26px;font-weight:bold;margin-bottom:20px;text-shadow:none;"><?php echo $val['title'.getLang()];?></div>
			        <div class="info"><?php echo FormatTanggalShort(substr($val['publish_date'],0,10));?></div>
			      </div>
			    </div>
        </section>

        <section class="you-can-help blog_detailz">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left">
                          <div class="row">
			                  	  <div class="col-md-12">
				                    	<?php echo $val['contents'.getLang()];?>
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
                          <div class="row">
								            <div class="col-md-12 text-center">
								            	<div class="block-title text-center">
									            	<h1 style="color:#1C1C1C;"><?php echo !getLang() ? "Artikel Lainnya" : "Others Articles";?></h1>
									            </div>
				                    </div>
				                  </div>
				                  <div class="row">
				                  	<?php
					                	$q=GetAll("blog",array("is_publish"=> "where/1", "publish_date"=> "order/desc", "limit"=> "0/4"));
					                	foreach($q->result_array() as $r) {
					                		if(file_exists("./uploads/articles/".$r['image'])) $img=$img2;
					                		else $img=$imgz;
					                		?>
					                    <div class="col-xs-6 col-lg-3 box_blog_utama">
								              	<div class="box_image">
									              	<img src="<?php echo $img.$r['image'];?>" width="100%" alt="<?php echo $r['title_image'];?>" title="<?php echo $r['title_image'];?>">
									              </div>
													      <div class="tgl"><?php echo FormatTanggalShort(substr($r['publish_date'],0,10));?></div>
									              <div class="judul"><a href="<?php echo lang_url('lifeblog/'.$r['slug']);?>"><?php echo $r['title'.getLang()];?></a></div>
										          </div>
					                  <?php }
					                  ?>
                  				</div>
                      </div>
                  </div>
              </div>
          </div>
        </section>