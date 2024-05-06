        <style>
			#caption_modal{
				overflow-y: scroll; 
				
  				scrollbar-width: thin!important;
			}
			#caption_modal::-webkit-scrollbar {
  				width: 12px;
			}
			/* width */
			::-webkit-scrollbar {
			width: 20px;
			}

			/* Track */
			#caption_modal::-webkit-scrollbar-track {
			box-shadow: inset 0 0 5px grey; 
			border-radius: 10px;
			}
			
			/* Handle */
			#caption_modal::-webkit-scrollbar-thumb {
			background-color: #bfbebb!important; 
			border-radius: 10px!important;
			}

			/* Handle on hover */
			#caption_modal::-webkit-scrollbar-thumb:hover {
			background: grey!important; 
			}
		</style>
		<?php
        if($id_kat==4) $id_hero = 2;
        else if($id_kat==3) $id_hero = 3;
        else if($id_kat==2) $id_hero = 4;
        ?>
        <section class="section-top desktop">
        	<div class="bg-top-managemen" style="background-image:url('<?php echo base_url()."uploads/".GetHero($id_hero);?>');">
            <div class="container">
                <div class="row">
                	<div class="csr text-center">
	                    <div class="judul"><?php echo $bhs[29];?></div>
	                    <div class="info"><?php echo $bhs[30];?></div>
                  </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul2"><?php echo $bhs[29];?></div>
			      <div class="info2"><?php echo $bhs[30];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile($id_hero);?>" width="100%">
          </div>
        </section>
        <!-- Welcome Two End -->
        
        <section class="you-can-help">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="you-can-help__left managemen">
                            <div class="tab text-center marbot10" style="width:100%;float:left;">
                            	<div style="width:80%;margin:auto;">
                            		<?php 
                            		for($i=1;$i<=4;$i++) {
                            			$dir[$i] = GetValue("management_category".getLang(),"management_category",array("id"=> "where/".$i));
                            		}
                            		$opt_direksi=array("4"=> $dir[4], "3"=> $dir[3], "2"=> $dir[2]);
                            		echo form_dropdown("direksi",$opt_direksi,$id_kat, "class='direksi form-controls mobile dropdown_mobile'");
                            		?>
                            		<div class="desktop">
		                          		<a href="<?php echo lang_url('manajemen/direksi');?>" class="linktab linktab-manajemen <?php echo $id_kat==4 ? "aktif":"";?>" rel="1"><?php echo $dir[4];?></a>
		                          		<a href="<?php echo lang_url('manajemen/dewan-komisaris');?>" class="linktab linktab-manajemen <?php echo $id_kat==3 ? "aktif":"";?>" rel="2"><?php echo $dir[3];?></a>
		                          		<a href="<?php echo lang_url('manajemen/dewan-pengawas-syariah');?>" class="linktab linktab-manajemen <?php echo $id_kat==2 ? "aktif":"";?>" rel="3"><?php echo $dir[2];?></a>
		                          	</div>
	                          	</div>
                          	</div>
                          	<div class="clear"></div>
                          	<div class="tabz tab1 container">
								            	<div class="block-title text-center">
	                                <h1 style="font-size:22px !important;"><?php echo GetValue("management_category".getLang(),"management_category",array("id"=> "where/".$id_kat));?></h1>
	                            </div>
	                          	<div class="row">
											        		<div class="mobile swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
																    "effect": "slide",
																    "pagination": {
																        "el": "#ingin-slider-pagination",
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
											                <div class="swiper-wrapper">
											                	<?php
										                		$q = GetAll("management", array("id_category"=> "where/".$id_kat, "is_delete"=> "where/0", "id"=> "order/asc"));
										                		$jum = $q->num_rows();
										                		$no=0;
										                		foreach($q->result_array() as $r) {?>
											                    <div class="swiper-slide">
											                        <div class="swiper-slide">
												                        <div class="col-md-4 text-center" style="padding:0px;">
														                			<a class="modalImg" ket="<?php echo $r['position'.getLang()];?>" desc="<?php echo nl2br($r['description'.getLang()]);?>" title="<?php echo $r['name'];?>" alt="<?php echo $r['title_image'];?>" gbr="<?php echo base_url().'uploads/management/'.$r['image'];?>">
															                			<img src="<?php echo base_url().'uploads/management/'.$r['image'];?>">
															                			<div class="nama_direksi" style="z-index:10000;">
											                    						<h2 style="font-size:24px;line-height:30px;"><?php echo $r['name'];?></h2>
											                    						<p class="ket"><?php echo $r['position'.getLang()];?></p>
											                    					</div>
											                    				</a>
										                    				</div>
													                    </div>
											                    </div>
											                  <?php }
											                  ?>
											                </div>
											                <div class="ingin-slider-nav" style="top:40%;">
											                    <div class="main-slider-button-prev"><i class="fa fa-angle-right" style="color:#F7941D;"></i></div>
											                    <div class="main-slider-button-next"><i class="fa fa-angle-right" style="color:#F7941D;"></i> </div>
											                </div>
											            </div>
									                <div class="col-xl-12 text-center desktop">
									                	<div class="row">
									                		<?php
									                		$q = GetAll("management", array("id_category"=> "where/".$id_kat, "is_delete"=> "where/0", "id"=> "order/asc"));
									                		$jum = $q->num_rows();
									                		$no=0;
									                		foreach($q->result_array() as $r) {
									                			$no++;
									                			if($jum == 4) {
									                				if($no%2==1) echo "<div class='col-md-2'></div>";
						                    					?>
							                    				<div class="col-md-4 text-center">
											                			<a class="modalImg" ket="<?php echo $r['position'.getLang()];?>" desc="<?php echo nl2br($r['description'.getLang()]);?>" title="<?php echo $r['name'];?>" alt="<?php echo $r['title_image'];?>" gbr="<?php echo base_url().'uploads/management/'.$r['image'];?>">
												                			<img src="<?php echo base_url().'uploads/management/'.$r['image'];?>">
												                			<div class="nama_direksi">
								                    						<h2><?php echo $r['name'];?></h2>
								                    						<p class="ket"><?php echo $r['position'.getLang()];?></p>
								                    					</div>
								                    				</a>
							                    				</div>
						                    					<?php if($no%2==0) echo "<div class='col-md-2'></div>";?>
						                    				<?php } else if($jum==5) {
						                    					if($no-3==1) echo "<div class='col-md-2'></div>";
						                    					?>
							                    				<div class="col-md-4 text-center">
											                			<a class="modalImg" ket="<?php echo $r['position'.getLang()];?>" desc="<?php echo nl2br($r['description'.getLang()]);?>" title="<?php echo $r['name'];?>" alt="<?php echo $r['title_image'];?>" gbr="<?php echo base_url().'uploads/management/'.$r['image'];?>">
												                			<img src="<?php echo base_url().'uploads/management/'.$r['image'];?>">
												                			<div class="nama_direksi">
								                    						<h2><?php echo $r['name'];?></h2>
								                    						<p class="ket"><?php echo $r['position'.getLang()];?></p>
								                    					</div>
								                    				</a>
							                    				</div>
						                    					<?php if($no-3==2) echo "<div class='col-md-2'></div>";?>
						                    				<?php } else if($jum==3) { ?>
						                    				<div class="col-md-4 text-center">
										                			<a class="modalImg" ket="<?php echo $r['position'.getLang()];?>" desc="<?php echo nl2br($r['description'.getLang()]);?>" title="<?php echo $r['name'];?>" alt="<?php echo $r['title_image'];?>" gbr="<?php echo base_url().'uploads/management/'.$r['image'];?>">
											                			<img src="<?php echo base_url().'uploads/management/'.$r['image'];?>">
											                			<div class="nama_direksi">
							                    						<h2><?php echo $r['name'];?></h2>
							                    						<p class="ket"><?php echo $r['position'.getLang()];?></p>
							                    					</div>
							                    				</a>
						                    				</div>
						                    				<?php }
						                    			}
						                    			?>
					                    			</div>
									                </div>
									            </div>
									          </div>
                        </div>
						
                    </div>
                </div>
						</br>
						<?php
							$sc = GetAll("kg_strukturorg",array("is_delete"=> "where/10", "limit"=> "0/1"));
							foreach($sc->result_array() as $rc) 
							{
								echo getLang() ? 
								"<h1 style='font-size:22px !important; margin-left:20px; color:#006885;'><b>Organizational Structure</b></h1>
								<a href='".base_url()."uploads/".$rc['file']."' target='_blank' style='font-size:16px; margin-left:24px; color:#F7941E'>View the Organizational Structure of PT BNI Life Insurance ></a>" 
								: 
								"<h1 style='font-size:22px !important; margin-left:20px; color:#006885;'><b>Struktur Organisasi</b></h1>
								<a href='".base_url()."uploads/".$rc['file']."' target='_blank' style='font-size:16px; margin-left:24px; color:#F7941E'>Lihat Struktur Organisasi PT BNI Life Insurance ></a>";
							}
                        ?>	
				
						</br></br></br>
            </div>
        </section>

<!-- The Modal -->
<div id="myModal" class="modal">
  <div class="box-modal">
	  <div class="col-md-6 kolom_image">
	  	<img class="modal-content" id="img01">
	  	<div class="nama_direksi_modal text-center">
				<h2></h2>
				<p class="ket"></p>
			</div>
	  </div>
	  <div class="col-md-6">
	  	<div id="label_modal">Biografi</div>
	  	<div id="caption_modal"></div>
	  </div>
	</div>
</div>

<script>
jQuery(function(){
	// Get the modal
	var modal = $("#myModal");
	
	// Get the image and insert it inside the modal - use its "alt" text as a caption
	var img = $("#myImg");
	var modalImg = $("#img01");
	$(".modalImg").click(function(){
		$("#myModal").show();
	  $("#img01").attr("src", $(this).attr("gbr"));
	  $("#img01").show();
	  $("#caption_modal").html($(this).attr("desc"));
	  $(".nama_direksi_modal h2").html($(this).attr("title"));
	  $(".nama_direksi_modal .ket").html($(this).attr("ket"));
	  $('body').attr('style','overflow: hidden;');
	});
	
	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];
	
	// When the user clicks on <span> (x), close the modal
	$(document).on("click", ".modal", function(e){
		e.stopPropagation();
		$("#myModal").hide();
		$('body').attr('style','overflow: auto;');
	});
	$(document).on("click", ".box-modal", function(e){
		e.stopPropagation();
	});
	
	$(".direksi").change(function(){
		var rel=$(this).val();
		if(rel==4) window.location="<?php echo lang_url('manajemen/direksi');?>";
		else if(rel==3) window.location="<?php echo lang_url('manajemen/dewan-komisaris');?>";
		else if(rel==2) window.location="<?php echo lang_url('manajemen/dewan-pengawas-syariah');?>";
		else window.location="<?php echo lang_url('manajemen/main/"+rel+"');?>";
	});
	
	/*$(".linktab").click(function(){
		$(".linktab").removeClass("aktif");
		$(this).addClass("aktif");
		var rel=$(this).attr("rel");
		$(".tabz").fadeOut();
		$(".tab"+rel).fadeIn(800);
		$(".bg-top-managemen").attr("style", "background-image:url('<?php echo base_url();?>uploads/bg-managemen"+rel+".png');");
	});*/
});
</script>