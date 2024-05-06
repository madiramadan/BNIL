<style>
#caption_modal{padding-right:20px;}
</style>
        <section class="section-top desktop">
        	<div class="bg-top-csr bg-top-csr-real" style="background-image:url('<?php echo base_url()."uploads/".GetHero(9);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[49];?></div>
                      <div class="info"><?php echo $bhs[50];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul"><?php echo $bhs[49];?></div>
			      <div class="info2"><?php echo $bhs[50];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(9);?>" width="100%">
          </div>
        </section>
        <!-- Welcome Two End -->

        <section class="you-can-help">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left">
                          <div class="row blog_detailz">
								            <div class="col-md-12" style="text-align:justify;">
								            	<div class="block-title text-center">
									            	<h1 style="color:#1C1C1C;"><?php echo $bhs[102];?></h1>
									            </div>
				                    	<p><?php echo $bhs[103];?></p>
				                    </div>
                  				</div>
                      </div>
                  </div>
              </div>
          </div>
        </section>
        
        <section class="main-slider main-slider-three banner-csr" style="padding-top:40px;">
        		<div class="block-title text-center">
            	<h1 style="color:#1C1C1C;"><?php echo $bhs[104];?></h1>
            </div>
            <div class="container">
	            <div class="row">
	            	<div class="col-md-12 csr-gallery" style="margin-bottom:0px;">
	            		<?php
	            		$q = GetAll("csr",array("is_publish"=> "where/1", "id"=> "order/desc", "limit"=> "0/6"));
	            		foreach($q->result_array() as $r) {
	            			?>
			            	<div class="col-md-4 col-xs-6">
			            		<a class="modalImg" desc="<?php echo $r['contents'.getLang()];?>" flag="<?php echo $r['csr_cat'];?>" title="<?php echo $r['title'.getLang()];?>" gbr="<?php echo base_url()."uploads/".$r['image'];?>"><img src="<?php echo base_url()."uploads/".$r['image'];?>"></a>
			            	</div>
			            <?php }
			            ?>
		            </div>
	            </div>
	            <div class="clear"></div>
	            	<div class="col-md-12 text-center stepz2">
									<?php
									$label = !getLang() ? "Lihat CSR lainnya" : "Others CSR";
									echo "<a class='btn-nocolor muat_lebih' rel='6' style='cursor:pointer;'>".$label."</a>";
									?>
      					</div>
	          </div>
        </section>
        
        <script>
        $(document).ready(function(){
        	$(".csrz").click(function(){
        		var rel=$(this).attr("rel");
        		$(".csrz").removeClass("aktif");
        		$(".csr"+rel).addClass("aktif");
        		$(".csr-kanan").hide();
        		$(".csr-info"+rel).fadeIn(300);
        	});
				});
				
        $(".muat_lebih").click(function(){
        	var limit = $(".muat_lebih").attr("rel");
        	$.post("<?php echo site_url('csr/muat_lebih/"+limit+"');?>", {id:1},  function(response) {
						$(".csr-gallery").append(response);
						var new_limit = parseInt(limit) + 6;
						$(".muat_lebih").attr("rel", new_limit);
					});
        });
        </script>
				
<!-- The Modal -->
<div id="myModal" class="modal">
  <div class="box-modal">
	  <div class="col-md-6 kolom_image">
	  	<img class="modal-content" id="img01">
	  	<iframe class="modal-content" id="vid01" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
	  </div>
	  <div class="col-md-6">
	  	<div id="label_modal"></div>
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
		var flag = $(this).attr("flag");
		$("#myModal").show();
	  if(flag=="video") {$("#vid01").attr("src", $(this).attr("gbr"));$("#img01").hide();$("#vid01").show();}
	  else {$("#img01").attr("src", $(this).attr("gbr"));$("#img01").show();$("#vid01").hide();}
	  $("#label_modal").html($(this).attr("title"));
	  $("#caption_modal").html($(this).attr("desc"));
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
	
});
</script>