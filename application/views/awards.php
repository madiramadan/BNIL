        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(20);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[69];?></div>
                      <div class="info"><?php echo $bhs[70];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul"><?php echo $bhs[69];?></div>
			      <div class="info"><?php echo $bhs[70];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(20);?>" width="100%">
          </div>
        </section>
        
        <section class="you-can-help section-bottom">
        	<div class="container">
        		<div class="row media_other">
            	<?php
            	$q=GetAll("award",array("date"=> "order/desc", "is_delete"=> "where/0", "limit"=> "0/8"));
            	foreach($q->result_array() as $r) {
            		if(file_exists("./uploads/awards/".$r['image'])) $img = base_url().'uploads/awards/';
            		else $img = base_url().'uploads/award/';
								?>
                <div class="col-xs-6 col-lg-3 box_blog_lain box_media_lain">
	              	<div class="box_image">
		              	<img src="<?php echo $img.$r['image'];?>" alt="<?php echo $r['title_image'];?>" title="<?php echo $r['title_image'];?>">
		              </div>
						      <div class="tgl"><?php echo FormatTanggalShort(substr($r['date'],0,10));?></div>
		              <div class="judul"><?php echo $r['description'.getLang()];?></div>
			          </div>
              <?php }
              ?>
    				</div>
    				<div class="col-md-12 text-center"><br>
  						<a class="btn-color muat_lebih" rel="8" style="cursor:pointer;"><?php echo getLang() ? "Others" : "Muat Lebih";?></a>
  					</div>
          </div>
        </section>
        
        <script>
        $(".muat_lebih").click(function(){
        	var limit = $(".muat_lebih").attr("rel");
        	$.post("<?php echo site_url('awards/muat_lebih/"+limit+"');?>", {id:1,langz: "<?php echo getLang();?>"},  function(response) {
						$(".media_other").append(response);
						var new_limit = parseInt(limit) + 8;
						$(".muat_lebih").attr("rel", new_limit);
					});
        });
        </script>