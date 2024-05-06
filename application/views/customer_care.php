<style>
.step_cc2{margin-top:20px;}
.garis_cc{border-bottom:1px solid #006885;width:100%;position:absolute;top:30px;}
.cs1{width:25%;text-align:center;float:left;}
.cs1 img{z-index:10000;}
</style>
        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(10);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[51];?></div>
                      <div class="info"><?php echo $bhs[52];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul"><?php echo $bhs[51];?></div>
			      <div class="info"><?php echo $bhs[52];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(10);?>" width="100%">
          </div>
        </section>

        <section class="you-can-help">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
			                	<div class="row">
			                			<div class="col-xl-12 text-center">
				                			<div class="block-title text-center">
			                            <h2 style="color:#F15922;font-weight:bold;"><?php echo $bhs[137];?></h2>
			                            <span><?php echo $bhs[138];?></span>
			                        </div>
			                      </div>
						                <div class="col-xl-12 step_cc">
							                <div class="col-md-3 col-xl-3">
							                	<div class="nomer">
							                		<div class="num">1</div>
							                		<div class="panah"><i class="fa fa-arrow-right"></i></div>
							                	</div>
							                	<div class="clear"></div>
							                	<div class="info">
							                	<?php echo $bhs[139];?>
							                	</div>
							                </div>
							                <div class="col-md-3 col-xl-3">
							                	<div class="nomer">
							                		<div class="num">2</div>
							                		<div class="panah"><i class="fa fa-arrow-right"></i></div>
							                	</div>
							                	<div class="clear"></div>
							                	<div class="info">
							                	<?php echo $bhs[140];?>
							                	</div>
							                </div>
							                <div class="col-md-3 col-xl-3">
							                	<div class="nomer">
							                		<div class="num">3</div>
							                		<div class="panah"><i class="fa fa-arrow-right"></i></div>
							                	</div>
							                	<div class="clear"></div>
							                	<div class="info">
							                	<?php echo $bhs[141];?>
							                	</div>
							                </div>
							                <div class="col-md-3 col-xl-3">
							                	<div class="nomer">
							                		<div class="num">4</div>
							                		<div class="panah"><i class="fa fa-flag"></i></div>
							                	</div>
							                	<div class="clear"></div>
							                	<div class="info">
							                	<?php echo $bhs[142];?>
							                	</div>
							                </div>
						                </div>
						                <div class="col-xl-12 desktop">
						                	<div class="col-xl-12 step_cc2">
						                		<img src="<?php echo base_url();?>assets/images/line_cc.png" width="100%">
							                </div>
						                </div>
						            </div>
								    </div>
								</div>
          	</div>
        </section>
        
        <section class="you-can-help">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
			                	<div class="row">
			                			<div class="col-xl-12 text-center">
				                			<div class="block-title text-center">
			                            <h2 style="color:#F15922;font-weight:bold;"><?php echo getLang() ? "Contact Us" : "Hubungi ";?></h2>
			                        </div>
			                      </div>
			                      <?php
			                      $pesan = $this->session->flashdata("pesan");
			                      if($pesan) echo "<div class='col-md-12 col-xs-12 text-center'>".$pesan."</div>";
			                      ?>
						                <div class="col-md-2 desktop"></div>
						                <div class="col-md-8 col-xs-12">
						                	<form method="POST" action="<?php echo lang_url('customer_care/submit');?>" class="formz">
								                <div class="col-md-6 col-xs-12">
								                	<input name="c_nama" placeholder="<?php echo getLang() ? "Name" : "Nama";?>" class="form-control" required>
								                </div>
								                <div class="col-md-6 col-xs-12">
								                	<input name="c_email" placeholder="Email" class="form-control" required>
								                </div>
								                <div class="col-md-6 col-xs-12">
								                	<input name="c_hp" placeholder="<?php echo getLang() ? "Phone Number" : "No Hp";?>" class="form-control" required>
								                </div>
								                <div class="col-md-6 col-xs-12">
								                	<input name="c_usia" placeholder="<?php echo getLang() ? "Age" : "Usia";?>" class="form-control" required>
								                </div>
								                <div class="clear"></div>
								                <div class="col-md-12 col-xs-12">
								                	<input name="c_kota" placeholder="<?php echo getLang() ? "City / County" : "Kota / Kabupaten";?>" class="form-control" required>
								                </div>
								                <div class="clear"></div>
								                <div class="col-md-12 col-xs-12">
								                	<input name="c_judul" placeholder="Subject" class="form-control" required>
								                </div>
								                <div class="col-md-12 col-xs-12">
								                	<textarea name="c_pesan" rows="6" placeholder="<?php echo getLang() ? "Message" : "Pesan";?>" class="form-control" required></textarea>
								                </div>
								                <div class="col-md-12 col-xs-12">
									                <?php echo $recaptcha; ?>
									              </div>
								                <div class="col-md-12 col-xs-12 text-center">
								                	<br>
								                	<input type="submit" value="Submit" class="btn-blue">
								                </div>
								              </form>
						                </div>
						                <div class="col-md-2 desktop"></div>
						                
						                <!--<div class="col-xl-12 info_alamat">
						                	<div class="col-md-3 col-xs-12 text-center">
						                		<i class="fa fa-map-marker-alt"></i>
						                		<div>Centennial Tower, Lantai 9<br>Jl. Gatot Subroto Kav 24-25,<br>Jakarta 12930, Indonesia.</div>
						                	</div>
						                	<div class="col-md-3 col-xs-12 text-center">
						                		<i class="fa fa-envelope"></i>
						                		<div><a href="mailto:care@bni-life.co.id">care@bni-life.co.id</a></div>
						                	</div>
						                	<div class="col-md-3 col-xs-12 text-center">
						                		<i class="fa fa-phone"></i>
						                		<div><a href="tel:1500045">1-500-045</a></div>
						                	</div>
						                	<div class="col-md-3 col-xs-12 text-center">
						                		Ikuti Kami
						                		<div>
		                              <a href="https://www.facebook.com/BNILifeID/" target="_blank"><i class="fab fa-facebook-square"></i></a>
		                              <a href="https://www.instagram.com/bnilifeid/" target="_blank"><i class="fab fa-instagram"></i></a>
		                              <a href="https://twitter.com/bnilifeid" target="_blank"><i class="fab fa-twitter"></i></a>
		                              <a href="https://www.youtube.com/channel/UCFBKohX52ePqnFRMwm56saQ" target="_blank"><i class="fab fa-youtube"></i></a>
		                              <a href="https://www.linkedin.com/company/bni-life/mycompany/" target="_blank"><i class="fab fa-linkedin"></i></a>
		                            </div>
						                	</div>
						                </div>-->
						            </div>
								    </div>
								</div>
          	</div>
        </section>
        
        <section class="you-can-help">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
			                	<div class="row">
						                <div class="col-xl-12 text-center">
						                	<div class="block-title text-center wow fadeInLeft" data-wow-delay="50ms">
			                            <h2 style="color:#F15922;font-weight:bold;">Customer Care</h2>
			                        </div>
							                <div class="tab2 text-center">
						                		<?php
						                		//$q = GetAll("contact_view",array("id_contact"=> "where/2", "province"=> "group", "id_province"=> "order/asc"));
						                		$q = GetAll("contact_view",array("id_contact"=> "where/2", "city"=> "order/asc"));
						                		$temp_id=0;$opt_lokasi=array();
						                		foreach($q->result_array() as $key=> $r) {
						                			if($temp_id != $r['id_province']) {
						                				$temp_id=$r['id_province'];
							                			//if($key==0) echo "<a class='lokasi aktif' rel='".$r['id_province']."'>".$r['nama']."</a>";
							                			//else echo "<a class='lokasi' rel='".$r['id_province']."'>".$r['nama']."</a>";
							                			$opt_lokasi[$r['id_province']] = $r['nama'];
							                		}
						                		}
						                		echo form_dropdown("lokasiz",$opt_lokasi,31,"class='lokasi form-controls'");
						                		?>
	                          	</div>
						                </div>
						            </div>
								    </div>
								</div>
          	</div>
        </section>
        
        <section class="section-bottom" style="padding-bottom:20px;">
        	<div class="container">
	        	<div class="row">
							<div class="col-xl-12 text-center" id="petaz">
	        			<!--<iframe id="mapframe" src="<?php echo site_url('maps');?>" height="450" width="100%" frameborder="no" scrolling="no"></iframe>-->
	        		</div>
	        	</div>
	        </div>
        </section>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script>
        $("#petaz").load("<?php echo site_url('maps');?>");
        $(".lokasi").change(function(){
					//$(".lokasi").removeClass("aktif");
					//$(this).addClass("aktif");
					var rel=$(this).val();//attr("rel");
					$("#petaz").load("<?php echo site_url('maps/main/"+rel+"');?>");
					//$("#mapframe").attr("src", "<?php echo site_url('maps/main/"+rel+"');?>");
				});
				</script>