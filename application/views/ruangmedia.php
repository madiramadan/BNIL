        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(8);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[46];?></div>
                      <div class="info"><?php echo $bhs[47];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul"><?php echo $bhs[46];?></div>
			      <div class="info"><?php echo $bhs[47];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(8);?>" width="100%">
          </div>
          <!--<div class="col-xs-12">
	          <div class="text-center" style="margin-top:20px;">
	          	<div class="judul" style="font-size:24px;line-height:26px;color:#F7941E;font-weight:bold;margin-bottom:20px;text-shadow:none;"><?php echo $bhs[46];?></div>
	          	<div class="info"><?php echo $bhs[47];?></div>
          	</div>
          </div>-->
        </section>
        
        <section class="you-can-help section-bottom">
        	<div class="container">
        		<div class="tab_media row text-center marbot5">
        			<div class="col-md-2"></div>
        			<div class="col-md-8 nop-all">
        				<?php 
            		//$opt_berita=array("0"=> "Semua", "1"=> GetValue("title".getLang(), "media_cat", array("id"=> "where/1")), "2"=> GetValue("title".getLang(), "media_cat", array("id"=> "where/2")));
            		//echo form_dropdown("direksi",$opt_berita,$cat, "class='beritaz form-controls mobile dropdown_mobile'");
            		?>
            		<div class="mobile tabz_new">
	        				<div class="col-md-4 col-xs-4 nop-all">
	        					<a href="<?php echo lang_url('ruangmedia');?>" class="<?php echo !$cat ? "aktif" : "";?>"><?php echo !getLang() ? "Semua" : "All";?></a>
	        				</div>
	        				<div class="col-md-4 col-xs-4 nop-all">
	        					<a href="<?php echo lang_url('ruangmedia/berita-perusahaan');?>" class="<?php echo $cat==1 ? "aktif" : "";?>"><?php echo GetValue("title".getLang(), "media_cat", array("id"=> "where/1"));?></a>
	        				</div>
	        				<div class="col-md-4 col-xs-4 nop-all">
	        					<a href="<?php echo lang_url('ruangmedia/siaran-pers');?>" class="<?php echo $cat==2 ? "aktif" : "";?>"><?php echo GetValue("title".getLang(), "media_cat", array("id"=> "where/2"));?></a>
	        				</div>
	        			</div>
            		<div class="desktop">
	        				<div class="col-md-4 col-xs-12">
	        					<a href="<?php echo lang_url('ruangmedia');?>" class="<?php echo !$cat ? "aktif" : "";?>"><?php echo !getLang() ? "Semua" : "All";?></a>
	        				</div>
	        				<div class="col-md-4 col-xs-12">
	        					<a href="<?php echo lang_url('ruangmedia/berita-perusahaan');?>" class="<?php echo $cat==1 ? "aktif" : "";?>"><?php echo GetValue("title".getLang(), "media_cat", array("id"=> "where/1"));?></a>
	        				</div>
	        				<div class="col-md-4 col-xs-12">
	        					<a href="<?php echo lang_url('ruangmedia/siaran-pers');?>" class="<?php echo $cat==2 ? "aktif" : "";?>"><?php echo GetValue("title".getLang(), "media_cat", array("id"=> "where/2"));?></a>
	        				</div>
	        			</div>
        			</div>
        			<div class="col-md-2"></div>
          	</div>
        		<div class="row desktop">
        			<?php
        			if($cat) $q = GetAll("media", array("is_publish"=> "where/1", "is_delete"=> "where/0", "id_media_cat"=> "where/".$cat, "publish_date"=> "order/desc", "limit"=> "0/2"));
        			else $q = GetAll("media", array("is_publish"=> "where/1", "is_delete"=> "where/0", "id_media_cat !="=> "where/5", "publish_date"=> "order/desc", "limit"=> "0/2"));
	            foreach($q->result_array() as $r) {
	            	$img = base_url().'uploads/media/';
								$img2 = base_url().'uploads/medias/';
								if(file_exists("./uploads/medias/".$r['image'])) $img=$img2;
								?>
	            	<div class="col-md-6 col-xs-12">
		              <div class="col-xs-12 col-lg-12 box_blog_2" style="background:url('<?php echo $img.$r['image'];?>');background-size:cover;background-position:center;">
			              <div class="box_cat"><span class="cat"><?php echo GetValue("title".getLang(), "media_cat", array("id"=> "where/".$r['id_media_cat']));?></span></div>
			              <div class="shadow_blog">
				              <div class="tgl"><?php echo FormatTanggalShort(substr($r['publish_date'],0,10));?></div>
				              <div class="judul"><a href="<?php echo lang_url('ruangmedia/'.$r['slug']);?>"><?php echo $r['title'.getLang()];?></a></div>
				            </div>
				          </div>
				        </div>
			        <?php }
			        ?>
            </div>
            <div class="row mobile">
            	<?php
            	if($cat) $q = GetAll("media", array("is_publish"=> "where/1", "is_delete"=> "where/0", "id_media_cat"=> "where/".$cat, "publish_date"=> "order/desc", "limit"=> "0/2"));
        			else $q = GetAll("media", array("is_publish"=> "where/1", "is_delete"=> "where/0", "id_media_cat !="=> "where/5", "publish_date"=> "order/desc", "limit"=> "0/2"));
	            foreach($q->result_array() as $r) {
            		$img = base_url().'uploads/media/';
								$img2 = base_url().'uploads/medias/';
								if(file_exists("./uploads/medias/".$r['image'])) $img=$img2;
								?>
                <div class="col-xs-12 box_blog_lain box_media_lain">
	              	<div class="box_image" style="height:200px;">
		              	<img src="<?php echo $img.$r['image'];?>" alt="<?php echo $r['title_image'];?>" title="<?php echo $r['title_image'];?>">
		              </div>
						      <div class="tgl"><?php echo FormatTanggalShort(substr($r['publish_date'],0,10));?></div>
		              <div class="judul"><a href="<?php echo lang_url('ruangmedia/'.$r['slug']);?>"><?php echo $r['title'.getLang()];?></a></div>
			          </div>
              <?php }
              ?>
    				</div>
    				<div class="row media_other">
            	<?php
            	if($cat) $q=GetAll("media",array("is_publish"=> "where/1", "is_delete"=> "where/0", "id_media_cat"=> "where/".$cat, "publish_date"=> "order/desc", "limit"=> "2/8"));
        			else $q=GetAll("media",array("is_publish"=> "where/1", "is_delete"=> "where/0", "id_media_cat !="=> "where/5", "publish_date"=> "order/desc", "limit"=> "2/8"));
            	foreach($q->result_array() as $r) {
            		$img = base_url().'uploads/media/';
								$img2 = base_url().'uploads/medias/';
								if(file_exists("./uploads/medias/".$r['image'])) $img=$img2;
								?>
                <div class="col-xs-6 col-lg-3 box_blog_lain box_media_lain">
	              	<div class="box_image">
		              	<img src="<?php echo $img.$r['image'];?>" alt="<?php echo $r['title_image'];?>" title="<?php echo $r['title_image'];?>">
		              </div>
						      <div class="tgl"><?php echo FormatTanggalShort(substr($r['publish_date'],0,10));?></div>
		              <div class="judul"><a href="<?php echo lang_url('ruangmedia/'.$r['slug']);?>"><?php echo $r['title'.getLang()];?></a></div>
			          </div>
              <?php }
              ?>
    				</div>
    				<div class="col-md-12 text-center"><br>
  						<a class="btn-color muat_lebih" rel="10" style="cursor:pointer;"><?php echo !getLang() ? "Muat Lebih" : "Others";?></a>
  					</div>
          </div>
        </section>
        
        <script>
        $(".muat_lebih").click(function(){
        	var limit = $(".muat_lebih").attr("rel");
        	$.post("<?php echo site_url('ruangmedia/muat_lebih/"+limit+"');?>", {langz: "<?php echo getLang();?>", catz: <?php echo $cat ? $cat : 0;?>},  function(response) {
						$(".media_other").append(response);
						var new_limit = parseInt(limit) + 8;
						$(".muat_lebih").attr("rel", new_limit);
					});
        });
        $(".beritaz").change(function(){
					var rel=$(this).val();
					window.location="<?php echo site_url('ruangmedia/main/"+rel+"');?>";
				});
        </script>