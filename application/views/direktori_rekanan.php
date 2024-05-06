<style>
.box-direktori{min-height:235px;}
</style>
        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(14);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[63];?></div>
                      <div class="info"><?php echo $bhs[64];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul2"><?php echo $bhs[63];?></div>
			      <div class="info2"><?php echo $bhs[64];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(14);?>" width="100%">
          </div>
        </section>

        <section class="you-can-help">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
			                	<div class="row">
						                <div class="col-md-12 tab_media row text-center" style="margin-bottom:20px;">
								        			<div class="col-md-2"></div>
								        			<div class="col-md-8">
								        				<div class="col-md-4 col-xs-4">
								        					<a href="<?php echo lang_url('direktori_rekanan');?>" class="<?php echo !$cat ? "aktif" : "";?>"><?php echo !getLang() ? "Semua" : "All";?></a>
								        				</div>
								        				<div class="col-md-4 col-xs-4">
								        					<a href="<?php echo lang_url('direktori_rekanan/main/?cat=1');?>" class="<?php echo $cat==1 ? "aktif" : "";?>"><?php echo GetValue("title".getLang(), "directory_category", array("id"=> "where/1"));?></a>
								        				</div>
								        				<div class="col-md-4 col-xs-4">
								        					<a href="<?php echo lang_url('direktori_rekanan/main/?cat=2');?>" class="<?php echo $cat==2 ? "aktif" : "";?>"><?php echo GetValue("title".getLang(), "directory_category", array("id"=> "where/2"));?></a>
								        				</div>
								        			</div>
								        			<div class="col-md-2"></div>
								          	</div>
						                <div class="col-md-12 col-xs-12" style="padding:15px 0px;">
						                	<form method="GET" action="<?php echo !getLang() ? site_url('id/direktori_rekanan/main') : site_url('en/direktori_rekanan/main');?>">
						                		<input type="hidden" name="cat" value="<?php echo $cat;?>">
	                          		<div class="col-md-3 col-xs-12">
	                          			<select id="id_prov" name="id_prov" class="ganti form-control">
	                          			<option value=""><?php echo !getLang() ? "- Provinsi -" : "- Province -"?></option>
	                          			<?php
	                          			$lbl="";$opt_lbl=array();
		                  						$q = GetAll("provinsi");

												if(!getLang())
												{
													foreach($q->result_array() as $k=> $r) {
														$slc = $r['id']==$id_prov ? "selected" : "";
														echo "<option value='".$r['id']."' ".$slc.">".$r['provinsi']."</option>";
													}
												}
												else
												{
													foreach($q->result_array() as $k=> $r) {
														$slc = $r['id']==$id_prov ? "selected" : "";
														echo "<option value='".$r['id']."' ".$slc.">".$r['provinsi_eng']."</option>";
													}
												}
		                  						
		                  						?>
	                          			</select>
	                          		</div>
	                          		<div class="col-md-2 col-xs-12">
	                          			<select name="id_type" class="ganti form-control">
	                          			<option value=""><?php echo !getLang() ? "- Tipe Rekanan -" : "- Partner Type -"?></option>
	                          			<?php
	                          			$lbl="";$opt_lbl=array();
		                  						$q = GetAll("directory_type");
		                  						foreach($q->result_array() as $k=> $r) {
		                  							$slc = $r['id']==$id_type ? "selected" : "";
		                  							echo "<option value='".$r['id']."' ".$slc.">".$r['title'.getLang()]."</option>";
		                  						}
		                  						?>
	                          			</select>
	                          		</div>
	                          		<div class="col-md-2 col-xs-12">
	                          			<select name="id_tags" class="ganti form-control">
	                          			<option value=""><?php echo !getLang() ? "- Tipe Kartu -" : "- Card Type -"?></option>
	                          			<?php
	                          			$lbl="";$opt_lbl=array();
		                  						$q = GetAll("directory_tags");
		                  						foreach($q->result_array() as $k=> $r) {
		                  							$slc = $r['id']==$id_tags ? "selected" : "";
		                  							echo "<option value='".$r['id']."' ".$slc.">".$r['title']."</option>";
		                  						}
		                  						?>
	                          			</select>
	                          		</div>
	                          		<div class="col-md-3 col-xs-12">
	                          			<input class="form-control" name="s_kunci" placeholder="<?php echo !getLang() ? "Ketik kata kunci..." : "Type in keywords ..."?>" value="<?php echo $s_kunci ? $s_kunci : "";?>">
	                          		</div>
	                          		<div class="col-md-2 col-xs-12 desktop">
	                          			<input type="submit" class="btn-selengkapnya" value="<?php echo !getLang() ? "Cari" : "Search"?>" style="padding:2px 16px !important;">
	                          		</div>
	                          		<div class="col-md-2 col-xs-12 mobile text-center">
	                          			<input type="submit" class="btn-selengkapnya" value="<?php echo !getLang() ? "Cari" : "Search"?>" style="padding:2px 16px !important;">
	                          		</div>
	                          	</form>
								  					</div>
						            </div>
								    </div>
								</div>
          	</div>
        </section>
        
        <?php
        $where="";
    		if($id_prov) $where .= " AND id_province='".$id_prov."'";
    		if($cat) $where .= " AND id_category='".$cat."'";
    		if($id_type) $where .= " AND id_type='".$id_type."'";
    		if($id_tags) $where .= " AND id_tags='".$id_tags."'";
    		if($s_kunci) $where .= " AND (nama like '%".$s_kunci."%' OR address like '%".$s_kunci."%')";
    		//$q = $this->db->query("select * from kg_directory WHERE is_delete=0 ".$where." LIMIT 0,9");
    		$q = $this->db->query("select TOP 12 * from kg_directory WHERE is_delete=0 ".$where." ");
			  if($q->num_rows() > 0) {?>
        <section class="section-bottom" style="padding-bottom:20px;">
        	<iframe id="mapframe" src="<?php echo site_url('maps/direktori/?cat='.$cat.'&id_prov='.$id_prov.'&id_type='.$id_type.'&id_tags='.$id_tags.'&s_kunci='.$s_kunci);?>" height="450" width="100%" frameborder="no" scrolling="no"></iframe>
        </section>
      	<?php }?>
      	
        <section class="section-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
			                	<div class="row desktop">
			                		<?php
			                		if($q->num_rows() > 0) {
				                		foreach($q->result_array() as $r) {
				                			$lokasi = $r['latitude'] ? " | " : "";
				                			?>
				                    <div class="col-md-4 col-xs-12">
				                    	<div class="box-direktori">
			                            <div class="judul-direktori">
			                            	<?php 
			                            	if($r['latitude']) echo "<a target='_blank' href='https://www.google.com/maps/dir/?api=1&destination=".$r['latitude'].",".$r['longitude']."'>".$r['nama']."</a>";
			                            	else echo $r['nama'];
			                            	?>
			                            </div>
			                            <div class="direktori-tgl">
			                            	<?php echo $r['address']."<br>".$r['phone'].$lokasi;?>
			                            </div>
			                            <div class="col-md-12 col-xs-12 nop-all">
			                            	<div class="inap">
			                            		<?php echo ucwords($r['tags']);?>
			                            	</div>
			                            	<?php 
			                            	if($r['is_optik']){
			                            	 	echo !getLang() ? "<div class='inap'>Optik</div>" : "<div class='inap'>Optical</div>";
			                            	}
			                            	if($r['is_rawat_inap']){
												echo !getLang() ? "<div class='inap'>Rawat Inap</div>" : "<div class='inap'>Inpatient</div>";
			                            	}
			                            	if($r['is_rawat_jalan']){
												echo !getLang() ? "<div class='inap'>Rawat Jalan</div>" : "<div class='inap'>Outpatient</div>";
			                            	}
			                            	if($r['is_medical_checkup']){
			                            		echo "<div class='inap'>Medical Checkup</div>";
			                            	}
			                            	?>
			                            </div>
			                        </div>
				                    </div>
				                  	<?php }
				                  } else {?>
				                  	<div class="col-md-12 col-xs-12 text-center">
				                    	<div class="box-direktori">
				                    		Data Tidak Ditemukan
				                    	</div>
				                    </div>
				                	<?php }
				                	?>
			                  </div>
			                  <!-- Mobile -->
						          	<div class="mobile swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
							    "effect": "slide",
							    "pagination": {
							        "el": "#awards-slider-pagination",
							        "type": "bullets",
							        "clickable": true
							      },
							    "autoplay": {
							        "delay": 4000
							    }}'>
							              <div class="swiper-wrapper">
							              	<?php
					                		foreach($q->result_array() as $r) {
					                			?>
							                  <div class="swiper-slide">
							                      <div class="container">
							                          <div class="swiper-slide__inner">
							                              <div class="row">
							                                  <div class="col-md-4 col-xs-12">
														                    	<div class="box-direktori">
													                            <div class="judul-direktori">
													                            	<?php 
													                            	if($r['latitude']) echo "<a target='_blank' href='https://www.google.com/maps/dir/?api=1&destination=".$r['latitude'].",".$r['longitude']."'>".$r['nama']."</a>";
													                            	else echo $r['nama'];
													                            	?>
													                            </div>
													                            <div class="direktori-tgl">
													                            	<?php echo $r['address']."<br>".$r['phone'].$lokasi;?>
													                            </div>
													                            <div class="col-md-12 col-xs-12 nop-all">
													                            	<div class="inap">
													                            		<?php echo ucwords($r['tags']);?>
													                            	</div>
													                            	<?php 
													                            	
																					if($r['is_optik']){
																						echo !getLang() ? "<div class='inap'>Optik</div>" : "<div class='inap'>Optical</div>";
																				    }
																				    if($r['is_rawat_inap']){
																					   echo !getLang() ? "<div class='inap'>Rawat Inap</div>" : "<div class='inap'>Inpatient</div>";
																				    }
																				    if($r['is_rawat_jalan']){
																					   echo !getLang() ? "<div class='inap'>Rawat Jalan</div>" : "<div class='inap'>Outpatient</div>";
																				    }
													                            	if($r['is_medical_checkup']){
													                            		echo "<div class='inap'>Medical Checkup</div>";
													                            	}
													                            	?>
													                            </div>
													                        </div>
														                    </div>
							                              </div>
							                          </div>
							                      </div>
							                  </div>
					                  		<?php }
						                  ?>
							              </div>
							              <div class="swiper-pagination" id="awards-slider-pagination" style="bottom:0px !important;"></div>
							          </div>
								    </div>
								</div>
          	</div>
        </section>
        
        <script>
        $(".lokasi").click(function(){
					$(".lokasi").removeClass("aktif");
					$(this).addClass("aktif");
					var rel=$(this).attr("rel");
					$("#mapframe").attr("src", "<?php echo site_url('maps/main/"+rel+"');?>");
				});
				/*
				var lennawebchat1 = document.createElement('script'); 
				lennawebchat1.src = "https://livechat.bni-life.co.id:444/webchat/lenna-init.js";
				var app1 = document.createElement('script');
				app1.src = "https://livechat.bni-life.co.id:444/webchat/app.js";
				document.head.prepend(lennawebchat1);
				document.head.prepend(app1);
				lennawebchat1.onload = function () {
				LennaWebchatInit('mbk5ez','penRe7')
				};
				*/
				</script>