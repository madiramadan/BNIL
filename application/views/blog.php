        <?php
        $imgz = base_url().'uploads/blog/';
        $img2 = base_url().'uploads/articles/';
				?>
        <section class="section-top">
	          <div class="container">
	          	<div class="row">
	              <div class="col-xl-12 col-lg-12">
	              	<?php
	              	$q = GetAll("blog_cat", array("id"=> "order/asc"));
	              	$opt_blog[] = getLang() ? "All" : "Semua";
	              	foreach($q->result_array() as $r) {
	              		$opt_blog[$r['id']] = $r['title'.getLang()];
	              	}
	            		echo form_dropdown("blogz",$opt_blog,$id_blog_cat, "class='blog_catz form-controls mobile dropdown_mobile' style='margin-top:20px;'");
	            		?>
	            		<div class="desktop">
			              <ul class="cat_blog">
			              	<li class="<?php echo !$id_blog_cat ? "aktif" : "";?> fil" rel="0" alt=""><?php echo !getLang() ? "Semua Artikel" : "All Articles";?></li>
			              	<?php
			              	$q = GetAll("blog_cat", array("id"=> "order/asc"));
			              	foreach($q->result_array() as $r) {
			              		$akt = $id_blog_cat==$r['id'] ? "aktif" : "";
			              		echo "<li class='".$akt." fil' rel='".$r['id']."' alt='".url_title(strtolower($r['title']))."'>".$r['title'.getLang()]."</li>";
			              	}
			              	?>
			              </ul>
			            </div>
			          </div>
	            </div>
	          </div>
        </section>
        
        <section class="you-can-help section-bottom" style="padding-top:20px;">
        	<div class="container">
        		<div class="row desktop">
        			<?php
        			if($id_blog_cat) $q = GetAll("blog", array("id_blog_cat"=> "where/".$id_blog_cat, "is_publish"=> "where/1", "is_featured"=> "where/0", "publish_date"=> "order/desc", "limit"=> "0/2"));
        			else $q = GetAll("blog", array("is_publish"=> "where/1", "is_featured"=> "where/0", "publish_date"=> "order/desc", "limit"=> "0/2"));
	            foreach($q->result_array() as $r) {
	            	if(file_exists("./uploads/articles/".$r['image'])) $img=$img2;
	            	else $img=$imgz;
	            	?>
	            	<div class="col-md-6 col-xs-12">
		              <div class="col-xs-12 col-lg-12 box_blog_2" style="background:url('<?php echo $img.$r['image'];?>');background-size:cover;background-position:center;">
			              <div class="box_cat"><span class="cat"><?php echo GetValue("title".getLang(), "blog_cat", array("id"=> "where/".$r['id_blog_cat']));?></span></div>
			              <div class="shadow_blog">
				              <div class="tgl"><?php echo FormatTanggalShort(substr($r['publish_date'],0,10));?></div>
				              <div class="judul"><a href="<?php echo lang_url('lifeblog/'.$r['slug']);?>"><?php echo $r['title'.getLang()];?></a></div>
				            </div>
				          </div>
				        </div>
			        <?php }
			        ?>
            </div>
            <!-- Mobile -->
            <div class="row mobile">
        			<?php
        			if($id_blog_cat) $q = GetAll("blog", array("id_blog_cat"=> "where/".$id_blog_cat, "is_publish"=> "where/1", "is_featured"=> "where/0", "publish_date"=> "order/desc", "limit"=> "0/1"));
        			else $q = GetAll("blog", array("is_publish"=> "where/1", "is_featured"=> "where/0", "publish_date"=> "order/desc", "limit"=> "0/1"));
	            foreach($q->result_array() as $r) {
	            	if(file_exists("./uploads/articles/".$r['image'])) $img=$img2;
	            	else $img=$imgz;
	            	?>
				        <div class="col-md-6 col-xs-12">
		              <div class="col-xs-12 col-lg-12 box_blog_2" style="background:url('<?php echo $img.$r['image'];?>');background-size:cover;background-position:center;">
			              <div class="shadow_blog">
				              <div class="tgl text-center"><?php echo GetValue("title".getLang(), "blog_cat", array("id"=> "where/".$r['id_blog_cat']));?></div>
				              <div class="judul text-center"><a href="<?php echo lang_url('lifeblog/'.$r['slug']);?>"><?php echo $r['title'.getLang()];?></a></div>
				              <div class="tgl text-center"><?php echo FormatTanggalShort(substr($r['publish_date'],0,10));?></div>
				            </div>
				          </div>
				        </div>
			        <?php }
			        ?>
            </div>
            
	            <div class="row">
        			<?php
        			if($id_blog_cat) $q = GetAll("blog", array("id_blog_cat"=> "where/".$id_blog_cat, "is_publish"=> "where/1", "is_featured >"=> "where/0", "is_featured"=> "order/asc", "limit"=> "0/4"));
        			else $q = GetAll("blog", array("is_publish"=> "where/1", "is_featured >"=> "where/0", "is_featured"=> "order/asc", "limit"=> "0/4"));
					//lastq();
	            foreach($q->result_array() as $r) {
	            	if(file_exists("./uploads/articles/".$r['image'])) $img=$img2;
	            	else $img=$imgz;
	            	?>
	              <div class="col-xs-12 col-lg-3 box_blog_utama">
	              	<div class="box_image">
		              	<img src="<?php echo $img.$r['image'];?>" width="100%" alt="<?php echo $r['title_image'];?>" title="<?php echo $r['title_image'];?>" style="object-fit:cover">
		              </div>
						      <div class="tgl"><?php echo FormatTanggalShort(substr($r['publish_date'],0,10));?></div>
		              <div class="judul"><a href="<?php echo lang_url('lifeblog/'.$r['slug']);?>"><?php echo $r['title'.getLang()];?></a></div>
			          </div>
			        <?php }
			        ?>
            	</div>
            	<div class="row blog_other">
            	<?php
        			//$q = GetAll("blog", array("is_publish"=> "where/1", "is_featured"=> "where/0", "publish_date"=> "order/desc", "limit"=> "2/5"));
        			if($id_blog_cat) $q = GetAll("blog", array("id_blog_cat"=> "where/".$id_blog_cat, "is_publish"=> "where/1", "publish_date"=> "order/desc", "limit"=> "2/5"));
        			else $q = GetAll("blog", array("is_publish"=> "where/1", "publish_date"=> "order/desc", "limit"=> "2/5"));
	            foreach($q->result_array() as $r) {?>
            	<div class="col-md-12 col-xs-12">
	            	<div class="col-md-3 col-xs-12 cat_lain blog_cat_lain desktop">
            			<?php echo GetValue("title".getLang(), "blog_cat", array("id"=> "where/".$r['id_blog_cat']));?><br>
            			<div class="tgl"><?php echo FormatTanggalShort(substr($r['publish_date'],0,10));?></div>
	            	</div>
	            	<div class="col-md-3 col-xs-12 cat_lain blog_cat_lain mobile">
						<span style="font-size:9pt">
            			<?php echo GetValue("title".getLang(), "blog_cat", array("id"=> "where/".$r['id_blog_cat']));?>
						</span>
						<br>
            			<div class="tgl"><?php echo FormatTanggalShort(substr($r['publish_date'],0,10));?></div>
	            	</div>
	            	<div class="col-md-9 col-xs-12 cat_lain blog_cat_lain">
	            		<div class="judul"><a href="<?php echo lang_url('lifeblog/'.$r['slug']);?>"><?php echo $r['title'.getLang()];?></a></div>
	            		<div class="headline"><?php echo $r['headline'.getLang()];?></div>
	            	</div>
	            </div>
	            <?php }
			        ?>
	          	</div>
	          <div class="col-md-12 text-center"><br>
  						<a class="btn-color muat_lebih" rel="7" style="cursor:pointer;"><?php echo !getLang() ? "Muat Lebih" : "Others";?></a>
  					</div>
          </div>
        </section>
        
        <script>
        $(".fil").click(function(){
        	var rel = $(this).attr("rel");
        	if(rel==0) window.location="<?php echo lang_url('lifeblog');?>";
        	else {
        		var tla = $(this).attr("alt");
        		window.location="<?php echo lang_url('lifeblog/"+tla+"');?>";
        	}
        });
        $(".muat_lebih").click(function(){
        	var limit = $(".muat_lebih").attr("rel");
        	$.post("<?php echo site_url('blog/muat_lebih/"+limit+"');?>", {langz: "<?php echo getLang();?>", catz: <?php echo $id_blog_cat ? $id_blog_cat : 0;?>},  function(response) {
						$(".blog_other").append(response);
						var new_limit = parseInt(limit) + 5;
						$(".muat_lebih").attr("rel", new_limit);
					});
        });
        $(".blog_catz").change(function(){
					var rel=$(this).val();
					window.location="<?php echo site_url('blog/main/"+rel+"');?>";
				});
        </script>