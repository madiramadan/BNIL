				<section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(5);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[31];?></div>
                      <div class="info"><?php echo $bhs[32];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul2"><?php echo $bhs[31];?></div>
			      <div class="info"><?php echo $bhs[32];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(5);?>" width="100%">
          </div>
        </section>
        
        <section class="you-can-help">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="you-can-help__left laporan">
                            <div class="tab text-center">
                          		<?php 
                          		$opt_lap=array("1"=> $bhs[33], "2"=> $bhs[35], "3"=> $bhs[37]);
                          		echo form_dropdown("laporan_perusahaan",$opt_lap,"", "class='laporan_c form-controls mobile dropdown_mobile'");
                          		?>
                          		<div class="desktop">
                          			<a class="linktab aktif" rel="1"><?php echo $bhs[33];?></a>
	                          		<a class="linktab" rel="2"><?php echo $bhs[35];?></a>
	                          		<a class="linktab" rel="3"><?php echo $bhs[37];?></a>
	                          	</div>
                          	</div>
                          	<div class="tabz tab1 container">
								            	<div class="block-title text-center">
	                                <h1 class="desktop"><?php echo $bhs[33];?></h1>
	                                <h4><?php echo $bhs[34];?></h4>
	                            </div>
	                          	<div class="row financial_report_other">
							                	<?php
						                		$img = base_url().'uploads/financial_report/';
						                		$img2 = base_url().'uploads/financial_reports/';
																$q = GetAll("financial_report", array("file >"=> "where/0", "year"=> "order/desc", "create_date"=> "order/desc", "is_delete"=> "where/0", "limit"=> "0/8"));
			                					foreach($q->result_array() as $r) {
			                						if(file_exists("./uploads/financial_reports/".$r['file'])) $img=$img2;
			                						?>
							                    <div class="col-md-3 col-xs-6">
							                    	<div class="box-lelang box-lelang90">
						                            <div class="judul-lelang"><?php echo ($r['title'.getLang()]);?></div>
						                            <div class="tgl-lelang">
						                            	<div class="download-lelang">
						                            		<a href="<?php echo $img.$r['file'];?>" target="_blank">
						                            			<img src="<?php echo base_url();?>assets/images/download_biru.png" style="width:40px;">
						                            		</a>
						                            	</div>
						                            </div>
						                        </div>
							                    </div>
						                  	<?php }
						                  	?>
									            </div>
															<div class="col-md-12 text-center stepz2">
																<?php
																$label = !getLang() ? "Laporan lainnya" : "Others reports";
																echo "<a class='btn-nocolor muat_lebih' rel='8' style='cursor:pointer;'>".$label."</a>";
																?>									
							      					</div>
									          </div>
									          <div class="tabz tab2 container" style="display:none;">
								            	<div class="block-title text-center">
	                                <h1 class="desktop"><?php echo $bhs[35];?></h1>
	                                <h4><?php echo $bhs[36];?></h4>
	                            </div>
	                          	<div class="row annual_report_other">
							                	<?php
						                		$img = base_url().'uploads/annual_report/';
						                		$img2 = base_url().'uploads/annual_reports/';
																$q = GetAll("annual_report", array("file >"=> "where/0", "year"=> "order/desc", "create_date"=> "order/desc", "is_delete"=> "where/0", "limit"=> "0/8"));
			                					foreach($q->result_array() as $r) {
			                						if(file_exists("./uploads/annual_reports/".$r['file'])) $img=$img2;
			                						?>
						                    <div class="col-md-3 col-xs-6">
						                    	<div class="box-lelang">
					                            <div class="judul-lelang"><?php echo ($r['title'.getLang()]);?></div>
					                            <div class="tgl-lelang">
					                            	<div class="download-lelang">
					                            		<a href="<?php echo $img.$r['file'];?>" target="_blank">
					                            			<img src="<?php echo base_url();?>assets/images/download_biru.png" style="width:40px;">
					                            		</a>
					                            	</div>
					                            </div>
					                        </div>
						                    </div>
						                  	<?php }
						                  	?>
									            </div>									            
															<div class="col-md-12 text-center stepz2">
																<?php
																$label = !getLang() ? "Laporan lainnya" : "Others reports";
																echo "<a class='btn-nocolor muat_lebih2' rel='8' style='cursor:pointer;'>".$label."</a>";
																?>									
							      					</div>
									          </div>
									          <div class="tabz tab3 container" style="display:none;">
								            	<div class="block-title text-center">
	                                <h1 class="desktop"><?php echo $bhs[37];?></h1>
	                                <h4><?php echo $bhs[38];?></h4>
	                            </div>
	                          	<div class="row">
	                          		<?php
						                		$img = base_url().'uploads/lanjut_report/';
																$q = GetAll("lanjut_report", array("file >"=> "where/0", "year"=> "order/desc", "create_date"=> "order/desc", "is_delete"=> "where/0", "limit"=> "0/16"));
			                					foreach($q->result_array() as $r) {?>
						                    <div class="col-md-3 col-xs-6">
						                    	<div class="box-lelang">
					                            <div class="judul-lelang"><?php echo ($r['title'.getLang()]);?></div>
					                            <div class="tgl-lelang">
					                            	<div class="download-lelang">
					                            		<a href="<?php echo $img.$r['file'];?>" target="_blank">
					                            			<img src="<?php echo base_url();?>assets/images/download_biru.png" style="width:40px;">
					                            		</a>
					                            	</div>
					                            </div>
					                        </div>
						                    </div>
						                  	<?php }
						                  	?>
									            </div>
									          </div>
                        </div>
                    </div>
                </div>
								<div class="col-md-12 text-center stepz2">
									<?php
									//echo "<a class='btn-nocolor muat_lebih' rel='8' style='cursor:pointer;'>Lihat laporan lainnya</a>";
									?>									
      					</div>
            </div>
        </section>
        
        <script>
		    $(document).ready(function(){
		    	$(".linktab").click(function(){
						$(".linktab").removeClass("aktif");
						$(this).addClass("aktif");
						var rel=$(this).attr("rel");
						$(".tabz").fadeOut();
						$(".tab"+rel).fadeIn(800);
					});
					
					$(".laporan_c").change(function(){
						var rel=$(this).val();
						$(".tabz").hide();
						$(".tab"+rel).show();
					});
					
	        $(".muat_lebih").click(function(){
	        	var limit = $(".muat_lebih").attr("rel");
	        	$.post("<?php echo site_url('laporan_perusahaan/muat_lebih/"+limit+"');?>", {langz: "<?php echo getLang();?>"},  function(response) {
							$(".financial_report_other").append(response);
							var new_limit = parseInt(limit) + 8;
							$(".muat_lebih").attr("rel", new_limit);
						});
	        });
	        
	        $(".muat_lebih2").click(function(){
	        	var limit = $(".muat_lebih2").attr("rel");
	        	$.post("<?php echo site_url('laporan_perusahaan/muat_lebih2/"+limit+"');?>", {langz: "<?php echo getLang();?>"},  function(response) {
							$(".annual_report_other").append(response);
							var new_limit = parseInt(limit) + 8;
							$(".muat_lebih2").attr("rel", new_limit);
						});
	        });
        });
				</script>