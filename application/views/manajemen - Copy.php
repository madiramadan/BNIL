
        <section class="section-top">
        	<div class="bg-top-managemen" style="background-image:url('<?php echo base_url();?>uploads/bg-managemen1.png');">
            <div class="container">
                <div class="row">
                	<div class="managemen-head text-center wow fadeInUp" data-wow-delay="100ms">
                    <div class="judul">Profil Manajemen</div>
                    <div class="info">BNI Life meneguhkan komitmen untuk berupaya memberikan nilai tambah pada setiap sisi kehidupan Anda.</div>
                  </div>
                </div>
            </div>
          </div>
        </section>
        <!-- Welcome Two End -->
        
        <section class="you-can-help">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="you-can-help__left managemen">
                            <div class="tab text-center">
                          		<a class="linktab aktif" rel="1">Direksi</a>
                          		<a class="linktab" rel="2">Dewan Komisaris</a>
                          		<a class="linktab" rel="3">Dewan Pengawas Syariah</a>
                          	</div>
                          	<div class="tabz tab1 container">
								            	<div class="block-title text-center">
	                                <h1>Direksi</h1>
	                            </div>
	                          	<div class="row">
									                <div class="col-xl-12 text-center">
									                	<div class="row">
									                		<?php
									                		$q = GetAll("management", array("id_category"=> "where/4", "id"=> "order/asc"));
									                		foreach($q->result_array() as $r) {?>
										                		<div class="col-md-4 text-center">
										                			<a class="modalImg" ket="<?php echo $r['position'.getLang()];?>" desc="<?php echo nl2br($r['description'.getLang()]);?>" title="<?php echo $r['name'.getLang()];?>" alt="<?php echo $r['title_image'];?>" gbr="<?php echo base_url().'uploads/management/'.$r['image'];?>">
											                			<img src="<?php echo base_url().'uploads/management/'.$r['image'];?>">
											                			<div class="nama_direksi">
							                    						<h2><?php echo $r['name'.getLang()];?></h2>
							                    						<p class="ket"><?php echo $r['position'.getLang()];?></p>
							                    					</div>
							                    				</a>
						                    				</div>
						                    			<?php }
						                    			?>
					                    			</div>
									                </div>
									                <!--<div class="row" style="width:66%;margin:auto;">-->
									            </div>
									          </div>
									          <div class="tabz tab2 container" style="display:none;">
								            	<div class="block-title text-center">
	                                <h1>Dewan Komisaris</h1>
	                            </div>
	                          	<div class="row">
									                <div class="col-xl-12 text-center">
									                	<div class="row">
									                		<?php
									                		$q = GetAll("management", array("id_category"=> "where/3", "id"=> "order/asc"));
									                		foreach($q->result_array() as $r) {?>
										                		<div class="col-md-4 text-center">
										                			<a class="modalImg" ket="<?php echo $r['position'.getLang()];?>" desc="<?php echo nl2br($r['description'.getLang()]);?>" title="<?php echo $r['name'.getLang()];?>" alt="<?php echo $r['title_image'];?>" gbr="<?php echo base_url().'uploads/management/'.$r['image'];?>">
											                			<img src="<?php echo base_url().'uploads/management/'.$r['image'];?>">
											                			<div class="nama_direksi">
							                    						<h2><?php echo $r['name'.getLang()];?></h2>
							                    						<p class="ket"><?php echo $r['position'.getLang()];?></p>
							                    					</div>
							                    				</a>
						                    				</div>
						                    			<?php }
						                    			?>				                    				
					                    			</div>
									                </div>
									            </div>
									          </div>
									          <div class="tabz tab3 container" style="display:none;">
								            	<div class="block-title text-center">
	                                <h1>Dewan Pengawas Syariah</h1>
	                            </div>
	                          	<div class="row">
									                <div class="col-xl-12 text-center">
									                	<div class="row">
									                		<?php
									                		$q = GetAll("management", array("id_category"=> "where/3", "id"=> "order/asc"));
									                		foreach($q->result_array() as $r) {?>
										                		<div class="col-md-4 text-center">
										                			<a class="modalImg" ket="<?php echo $r['position'.getLang()];?>" desc="<?php echo nl2br($r['description'.getLang()]);?>" title="<?php echo $r['name'.getLang()];?>" alt="<?php echo $r['title_image'];?>" gbr="<?php echo base_url().'uploads/management/'.$r['image'];?>">
											                			<img src="<?php echo base_url().'uploads/management/'.$r['image'];?>">
											                			<div class="nama_direksi">
							                    						<h2><?php echo $r['name'.getLang()];?></h2>
							                    						<p class="ket"><?php echo $r['position'.getLang()];?></p>
							                    					</div>
							                    				</a>
						                    				</div>
						                    			<?php }
						                    			?>		
					                    			</div>
									                </div>
									            </div>
									          </div>
                        </div>
                    </div>
                </div>
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
	  	<div id="label_modal" style="font-size:30px;padding-bottom:15px;margin-top:20px;">Biografi</div>
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
	
	$(".linktab").click(function(){
		$(".linktab").removeClass("aktif");
		$(this).addClass("aktif");
		var rel=$(this).attr("rel");
		$(".tabz").fadeOut();
		$(".tab"+rel).fadeIn(800);
		$(".bg-top-managemen").attr("style", "background-image:url('<?php echo base_url();?>uploads/bg-managemen"+rel+".png');");
	});
});
</script>