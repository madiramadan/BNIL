				<section class="section-top">
	          <div class="container">
	          	<div class="row">
	              <!--<div class="col-xl-12 col-lg-12">
	              	<?php
	              	$type=isset($_GET['category']) ? $_GET['category'] : "semua";
	              	$cari=$_GET['cari'];
	              	$opt_cari = array("semua"=> "Semua", "produk"=> "Produk", "formulir"=> "Formulir", "lifeblog"=> "Lifeblog", "berita"=> "Berita", "karir"=> "Karir", "lelang"=> "Lelang");
	              	echo form_dropdown("blogz",$opt_cari,"", "class='laporan_c form-controls mobile dropdown_mobile' style='margin-top:10px;'");
	            		?>
	            		<div class="desktop">
			              <ul class="cat_blog">
			              	<?php
			              	foreach($opt_cari as $k=> $r) {
			              		$akt = $type==$k ? "#F15922" : "#585757";
			              		echo "<li class='fil'><a style='color:".$akt.";' href='".site_url('search?cari='.$cari.'&category='.$k)."'>".$r."</a></li>";
			              	}
			              	?>
			              </ul>
			            </div>
			          </div>-->
	            </div>
	          </div>
        </section>
        
				<section class="you-can-help" style="padding-top:40px;">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left">
                          <div class="row blog_other">
                          <?php
                          $flag=0;
						            	//Produk
						        			$q = $this->db->query("select TOP 10 * from kg_product where (title like '%".$cari."%' OR title_eng like '%".$cari."%' OR description like '%".$cari."%' OR description_eng like '%".$cari."%') AND is_publish=1 ORDER BY modify_date desc");
						        			foreach($q->result_array() as $r) {$flag=1;?>
						            	<div class="col-md-12 col-xs-12">
							            	<div class="col-md-12 col-xs-12 cat_lain" style="padding-bottom:30px;margin-bottom:30px;margin-top:0px;border-bottom:1px solid #ccc;">
							            		<div style="color:#006785;font-size:14px;">Produk</div>
							            		<div class="judul"><a href="<?php echo lang_url('perlindungan/'.strtolower(url_title($r['title'])).'/'.$r['slug']);?>" style="color:#F15922;font-weight:normal;"><?php echo $r['title'.getLang()];?></a></div>
							            		<div class="headline"><?php echo $r['description'.getLang()];?></div>
							            	</div>
							            </div>
							            <?php }
									        ?>
						            	<?php
						            	//Blog
						        			$q = $this->db->query("select TOP 10 * from kg_blog where (title like '%".$cari."%' OR title_eng like '%".$cari."%' OR contents like '%".$cari."%' OR contents_eng like '%".$cari."%') AND is_publish=1 ORDER BY publish_date desc");
						        			foreach($q->result_array() as $r) {$flag=1;?>
						            	<div class="col-md-12 col-xs-12">
							            	<div class="col-md-12 col-xs-12 cat_lain" style="padding-bottom:30px;margin-bottom:30px;margin-top:0px;border-bottom:1px solid #ccc;">
							            		<div style="color:#006785;font-size:14px;">Blog</div>
							            		<div class="judul"><a href="<?php echo lang_url('lifeblog/'.$r['slug']);?>" style="color:#F15922;font-weight:normal;"><?php echo $r['title'.getLang()];?></a></div>
							            		<div class="headline"><?php echo $r['headline'.getLang()];?></div>
							            	</div>
							            </div>
							            <?php }
									        ?>
									        
									        <?php
									        //Jika tidak ada data
									        if(!$flag) {?>
									        	<div class="col-md-12 col-xs-12">
								            	<div class="col-md-12 col-xs-12 cat_lain" style="padding-bottom:30px;margin-bottom:30px;margin-top:0px;border-bottom:1px solid #ccc;">
								            		<div style="color:#006785;font-size:14px;">Pencarian "<?php echo $cari;?>"</div>
								            		<div class="judul">Data tidak ditemukan</div>
								            		<br><br><br><br><br><br>
								            		<!--<div class="headline"><?php echo $r['description'.getLang()];?></div>-->
								            	</div>
								            </div>
								            <?php
									        }
									        ?>
									        
							          	</div>
                      </div>
                  </div>
              </div>
          </div>
        </section>