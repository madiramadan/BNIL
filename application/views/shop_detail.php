        <!-- Shop -->
        <section class="section-top">
        	<div class="container">
        		<div class="row shop_detail">
        			<div class="col-md-6 col-xs-12 fotoz">
        				<div class="col-md-2 col-xs-2 nop-r">
        					<?php for($i=1;$i<=4;$i++) {
        						if($val['image'.$i] && file_exists("./uploads/merchandise_prod/".$val['image'.$i])) {
        							$foto=$val['image'.$i];
        							?>
        							<img class="thumb_foto" rel="<?php echo $foto;?>" src="<?php echo base_url()."uploads/merchandise_prod/".$foto;?>" alt="<?php echo $val['title_image'.$i];?>" title="<?php echo $val['title_image'.$i];?>">
        					<?php }
        					} ?>
        				</div>
        				<div class="col-md-10 col-xs-10 nop-r">
        					<img width="100%" class="foto_utama" src="<?php echo base_url()."uploads/merchandise_prod/".$val['image1'];?>" alt="<?php echo $val['title_image1'];?>" title="<?php echo $val['title_image1'];?>">
        				</div>
        			</div>
        			<div class="col-md-6 col-xs-12">
        				<h2><?php echo $val['nama'.getLang()];?></h2>
        				<div class="harga_utama"><?php echo getLang() ? Rupiah_ENG($val['price'])  : Rupiah($val['price']);?></div>
        				<div class="label_desc"><?php echo getLang() ? "Descriptions" : "Deskripsi";?></div>
        				<div class="keterangan"><?php echo $val['description'.getLang()];?></div>
        				<div class="beli"><a class="btn-color" target="_blank" href="https://wa.me/6281119670919?text=Saya ingin membeli <?php echo $val['nama'.getLang()];?>"><i class="fab fa-whatsapp"></i><?php echo getLang() ? "  Buy Now" : "  Beli Sekarang" ?></a></div>
        			</div>
        		</div>
        	</div>
        </section>
        
        <section class="you-can-help">
        	<div class="container block-title">
        		<h1><?php echo getLang() ? "Other Product" : "Produk Lainnya";?></h1>
        		<div class="row">
        			<?php
        			$q = GetAll("merchandise_prod", array("is_publish"=> "where/1", "id !="=> "where/".$val['id'], "create_date"=> "order/desc", "limit"=> "0/4"));
	            foreach($q->result_array() as $r) {?>
	            	<div class="col-xs-6 col-lg-3 box_shop_lain text-center">
	              	<a href="<?php echo lang_url('shop/detail/'.$r['id']);?>">
	              		<div class="box_image">
			              	<img src="<?php echo base_url()."uploads/merchandise_prod/".$r['image1'];?>" alt="<?php echo $r['title_image1'];?>" title="<?php echo $r['title_image1'];?>">
			              </div>
							      <!--<div class="tgl"><?php echo $r['category'];?></div>-->
			              <div class="judul" style="color:#1C1C1C;"><?php echo $r['nama'.getLang()];?></div>
			              <div class="harga" style="color:#5c5b5b;font-weight:normal;"><?php echo getLang() ? Rupiah_ENG($val['price'])  : Rupiah($val['price']);?></div>
			            </a>
			          </div>
			        <?php }
			        ?>
            </div>
          </div>
        </section>
        
        <section class="you-can-help" style="padding-top:20px;">
        	<div class="container">
        		<div class="row cara_belanja">
        			<div class="col-md-4 col-xs-12">
        				<h3><b><?php echo $bhs[107];?></b></h3>
        				<p><?php echo $bhs[108];?></p>
        			</div>
        			<div class="col-md-4 col-xs-12">
        				<h4><?php echo $bhs[109];?></h4>
        				<p><?php echo $bhs[110];?></p>
        				<h4><?php echo $bhs[113];?></h4>
        				<p><?php echo $bhs[114];?></p>
        				<h4><?php echo $bhs[117];?></h4>
        				<p><?php echo $bhs[118];?></p>
        			</div>
        			<div class="col-md-4 col-xs-12">
        				<h4><?php echo $bhs[111];?></h4>
        				<p><?php echo $bhs[112];?></p>
        				<h4><?php echo $bhs[115];?></h4>
        				<p><?php echo $bhs[116];?></p>
        			</div>
        		</div>
        	</div>
        </section>
        
        
        <section class="you-can-help">
        	<div class="container">
        		<div class="block-title">
        			<h2 class="text-center">Merchandise FAQ</h2>
        		</div>
        		<div class="row">
        			<div class="col-md-1 desktop"></div>
        			<div class="col-md-10 col-xs-12">
	        			<div class="accrodion-grp faq-one-accrodion faq-one-main" data-grp-name="faq-one-accrodion">
									<div class="accrodion active">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[119];?></h4>
                    </div>
                    <div class="accrodion-content">
                      <div class="inner">
                      	<p><?php echo $bhs[120];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[121];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[122];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[123];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[124];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[125];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[126];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[127];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[128];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[129];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[130];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[131];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[132];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[133];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[134];?></p>
                      </div>
                    </div>
	                </div>
	                <div class="accrodion">
                    <div class="accrodion-title">
                       <h4><?php echo $bhs[135];?></h4>
                    </div>
                    <div class="accrodion-content" style="display:none;">
                      <div class="inner">
                      	<p><?php echo $bhs[136];?></p>
                      </div>
                    </div>
	                </div>
	              </div>
	            </div>
	            <div class="col-md-1 desktop"></div>
            </div>
          </div>
        </section>
        
        <script>
        $(".thumb_foto").click(function(){
        	var rel=$(this).attr("rel");
        	var alt=$(this).attr("alt");
        	$(".foto_utama").attr("src", "<?php echo base_url();?>uploads/merchandise_prod/"+rel);
        	$(".foto_utama").attr("alt", alt);
        	$(".foto_utama").attr("title", alt);
        });
        </script>