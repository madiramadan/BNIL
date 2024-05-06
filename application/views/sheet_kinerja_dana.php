<style type="text/css">

.table-scroll {
    position:relative;
    max-width:100%;
    margin:left;
    overflow:hidden;
    /* border:1px solid #000; */
  }
.table-wrap {
	width:100%;
	overflow:auto;
}
.table-scroll table {
	width:100%;
	margin:auto;
	border-collapse:separate;
	border-spacing:0;
}
.table-scroll th, .table-scroll td {
	padding:5px 10px;
	/* border:1px solid #000; */
	background:#fff;
	white-space:nowrap;
	vertical-align:top;
}
.table-scroll thead, .table-scroll tfoot {
	/* background:#f9f9f9; */
}
.clone {
	position:absolute;
	top:0;
	left:0;
	pointer-events:none;
}
.clone th, .clone td {
	visibility:hidden
}
.clone td, .clone th {
	border-color:transparent
}
.clone tbody th {
	visibility:visible;
	color:black;
}
.clone .fixed-side {
	/* border:1px solid #000; */
	/* background:#eee; */
	visibility:visible;
}
.clone thead, .clone tfoot{background:transparent;}

</style>

        <section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(13);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $bhs[61];?></div>
                      <div class="info"><?php echo $bhs[62];?></div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul"><?php echo $bhs[61];?></div>
			      <div class="info"><?php echo $bhs[62];?></div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(13);?>" width="100%">
          </div>
        </section>
        
        <section class="you-can-help">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left kinerja_dana">
                      	<?php
                      	$q = GetAll("kinerja_harian", array("create_date"=> "order/desc", "limit"=> "0/1"));
                      	foreach($q->result_array() as $r) {?>
                          <div class="row">
								            <div class="col-md-9 col-xs-12">
								            	<div class="block-title" style="margin-bottom:10px !important;">
								            		<span class="tgl"><?php echo FormatTanggalShort(substr($r['periode'],0,10));?></span>
									            	<h2><?php echo $bhs[71];?></h2>
									            </div>
				                    </div>
				                    <!--<div class="btn-unduh col-md-3 col-xs-12 text-right">
				                    	<a href="<?php echo base_url().'uploads/kinerja_harian/'.$r['file'];?>" target="_blank" class="btn-color2">Unduh Laporan&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-down"></i></a>
				                    </div>-->
                  				</div>
                  				<div class="row blog_detailz">
                  					<div class="col-md-12 col-xs-12">
                  						<?php echo getLang() ? $r['content_ENG'] : $r['content'];?>
                  					</div>
                  					<div class="col-md-12 col-xs-12 text-center">
                  						<a href="<?php echo base_url().'uploads/kinerja_harian/'.$r['file'];?>" target="_blank" class="btn-color2"><?php echo getLang() ? "Download Report" : "Unduh Laporan";?><!--&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-down"></i>--></a>
				                    	<br><br>
				                    </div>
                  				</div>
                  			<?php }
                  			?>
                      </div>
                  </div>
              </div>
          </div>
        </section>
        
        <section class="you-can-help" style="padding-top:40px;">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left kinerja_dana">
                          <div class="row">
                          	<div class="col-md-12 col-xs-12">
                          		<h2><?php echo $bhs[72];?></h2>
                          	</div>
                          	<div class="col-md-12">
                          		<div id="saham" style="margin-bottom:40px;"></div>
                          	</div>
                          	<div class="col-md-12 col-xs-12" style="padding:15px 0px;">
                          		<div class="col-md-4 col-xs-12">
                          			<select id="cat_dana" name="cat_dana" class="ganti form-control">
                          			<?php
                          			$lbl="";$opt_lbl=array();
	                  						$q = GetAll("fun_product", array("is_delete"=> "where/0","id_category"=> "order/asc"));

											if(getLang())
											{
												foreach($q->result_array() as $k=> $r) {
													$opt_lbl[$r['id']] = $r['title'];
													$slc = $k==0 ? "selected" : "";
													if($k==0) $lbl=$r['title'];
													echo "<option value='".$r['id']."' rel='".$r['title']."' ".$slc." class='optf".$r['id']."'>".$r['title']."</option>";
												}
											}
											else
											{
												foreach($q->result_array() as $k=> $r) {
													$opt_lbl[$r['id']] = $r['title'];
													$slc = $k==0 ? "selected" : "";
													if($k==0) $lbl=$r['title'];
													echo "<option value='".$r['id']."' rel='".$r['title']."' ".$slc." class='optf".$r['id']."'>".$r['title']."</option>";
												}
											}
	                  						?>
                          			</select>
                          		</div>
                          		<div class="col-md-3 col-xs-6">
                          			<input id="tgl_s" name="tgl_s" class="date ganti form-control" placeholder="<?php echo getLang() ? "Start Date" : "Tanggal Awal";?>">
                          		</div>
								  						<div class="col-md-3 col-xs-6">
                          			<input id="tgl_e" name="tgl_e" class="date ganti form-control" placeholder="<?php echo getLang() ? "End Date" : "Tanggal Akhir";?>">
                          		</div>
								  					</div>
								  					<div class="col-md-12 col-xs-12">
								  						<div id="grafik"></div>
								  					</div>
                  				</div>
                      </div>
                  </div>
              </div>
          </div>
        </section>

		<hr>
		<br>

		<!--Prod deploy nab-->	

		
		<section class="you-can-help" style="padding-top:40px;">
        	<div class="container">
            	<div class="row">
                	<div class="col-xl-12 col-lg-12">
                    	<div class="you-can-help__left kinerja_dana">
                      		<div class="row">
                          		<div class="col-md-12 col-xs-12">
									<?php
										$getdate = $this->db->query("select top(1) nav_date from fund_product_units t1
										order by nav_date desc");

										foreach($getdate->result_array() as $getdates=> $getdatess) {?>
							  			
										<span class="tgl"><?php echo FormatTanggalShort(substr($getdatess['nav_date'],0,10));?></span>
									    
									<?php } ?>
									
									<h2><?php echo $bhs[165];?></h2>
									<br>

									<?php

									$q = $this->db->query("select top(1) nav_date from fund_product_units t1
									order by nav_date desc");

                  					//$q = GetAll("fun_product_cat", array("id_parent"=> "where/0",'is_delete'=>'where/0'));

                  					foreach($q->result_array() as $k=> $r) {?>
										<div class="blog_detailz col-md-12 csr-kanan csr-info<?php echo $r['nav_date'] ?>" style="padding:15px 0px; <?php echo $k==0 ? "" : "display:none;";?>">
											<div class="tab text-left unit-link">
												<?php
												
												$qq = $this->db->query("
												select 
												case 
												when a.parent = 'Konvensional' 
												then 'Pendapatan Tetap' 
												else a.parent end as 'parent',	
												case
												when a.parent_ENG = 'Convensional' 
												then 'Fixed Income' 
												else a.parent_ENG end as 'parent_ENG',
												a.sequence
												from (
												select distinct
												case when t3.parent = ''
												then t3.title else
												t3.parent end as parent
												,
												case when t3.parent_ENG = ''
												then t3.title_ENG else
												t3.parent_ENG end as parent_ENG
												,t3.sequence
												
												from fund_product_units t1
												inner join kg_fun_product t2 on t1.fund_product_id = t2.id
												inner join kg_fun_product_cat t3 on t2.id_category = t3.id
												inner join fund_product_units t4 on t1.fund_product_id = t4.fund_product_id and t1.nav_date = t4.nav_date
												) 
												as a order by a.sequence asc");

												//$qq = GetAll("fun_product_cat", array("id_parent"=> "where/0",'is_delete'=>'where/0'));

												foreach($qq->result_array() as $kk=> $rr) {
													$akt = $kk==0 ? "aktif" : "";
													echo getLang() ? "<a class='linklayanan ".$akt." tabzz".$kk."' rel='".$kk."'>".$rr['parent_ENG']."</a>" : "<a class='linklayanan ".$akt." tabzz".$kk."' rel='".$kk."'>".$rr['parent']."</a>";
												}
												?>
											</div>

											<?php	
											foreach($qq->result_array() as $kk=> $rr) {?>
		                        			<div class="row perlindungz perlindung<?php echo $kk;?>" style="padding:15px; <?php echo $kk==0 ? "" : "display:none;";?>">
	                  							<div class="accrodion-grp faq-one-accrodion faq-one-main" data-grp-name="faq-one-accrodion">
												<div style="overflow-x:auto;">  

													<table id="table-data" class="table table-bordered table-hover table-striped" style="font-size:80%;">
															<tr style="background-color:#dee2e6;">
																<th style="text-align:left;vertical-center:left;border-left:hidden;border-right:hidden;"><?php echo getLang() ? "Fund Name" : "Produk"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;" width="70"><?php echo getLang() ? "NAV" : "NAB"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;" width="70"><?php echo getLang() ? "1 Month" : "1 BLN"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;" width="70"><?php echo getLang() ? "3 Month" : "3 BLN"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;" width="70"><?php echo getLang() ? "1 Year" : "1 THN"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;" width="70"><?php echo getLang() ? "Year to Date" : "SAT"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;" width="70"><?php echo getLang() ? "Since Inception" : "SP"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;"><?php echo getLang() ? "Total Unit" : "Jumlah Unit Penyertaan"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;"><?php echo getLang() ? "Total AUM" : "Total AUM"?></th>
															</tr>
	                  								<?php 
													$getdataunit = $this->db->query("
													select 
													a.[nav_date],a.[fund_product_id],a.[unit_price]
													,a.[satu_bulan],a.[tiga_bulan],a.[setahun],a.[sat],a.[sp]
													,a.[unit_amount],a.[total_nominal],a.id_category,
													case 
													when a.parent = 'Konvensional' 
													then 'Pendapatan Tetap' 
													else a.parent end as 'parent',		
													case
													when a.parent_ENG = 'Convensional' 
													then 'Fixed Income' 
													else a.parent_ENG end as 'parent_ENG',
													a.title,a.title_ENG,a.Product,a.ProductENG
													from(
													select t1.[nav_date],t1.[fund_product_id],t1.[unit_price],
													t1.[satu_bulan],t1.[tiga_bulan],t1.[setahun],t1.[sat],t1.[sp],
													t1.[unit_amount],t1.[total_nominal],
													t2.id_category,
													case when t3.parent = ''
													then t3.title else
													t3.parent end as parent,
													case when t3.parent_ENG = ''
													then t3.title_ENG else
													t3.parent end as parent_ENG,
													t3.title
													,t3.title_ENG,
													t2.title as Product,
													t2.title_ENG as ProductENG
													from fund_product_units t1
													inner join kg_fun_product t2 on t1.fund_product_id = t2.id
													inner join kg_fun_product_cat t3 on t2.id_category = t3.id
													inner join fund_product_units t4 on t1.fund_product_id = t4.fund_product_id and t1.nav_date = t4.nav_date
													) as a order by a.fund_product_id asc");
													
													foreach($getdataunit->result_array() as $kkk=> $rrr){
													if($rrr['parent'] == $rr['parent'])
													{?>	
														<tr>
															<th style="border-left:hidden;border-right:hidden;"><?php echo $rrr['Product']?></th>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo getLang() ? Rupiah_ENG2($rrr['unit_price'])  : Rupiah2($rrr['unit_price']);?></td>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo Rupiah4($rrr['satu_bulan'])?></td>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo Rupiah4($rrr['tiga_bulan'])?></td>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo Rupiah4($rrr['setahun'])?></td>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo Rupiah4($rrr['sat'])?></td>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo Rupiah4($rrr['sp'])?></td>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo getLang() ? Rupiah_ENG2($rrr['unit_amount'])  : Rupiah2($rrr['unit_amount']);?></td>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo getLang() ? Rupiah_ENG3($rrr['total_nominal'])  : Rupiah3($rrr['total_nominal']);?></td>
														</tr>

													<?php }} ?>
													</table>

													<br>
													<p style="color:grey; font-size:13px;"><i>** Informasi ini disiapkan oleh PT BNI Life Insurance dan hanya digunakan sebagai keterangan saja. 
													Kinerja dana ini tidak dijamin, dimana kinerja dana masa lalu tidak mencerminkan kinerja dana masa depan, 
													kemudian nilai unit dan pendapatan dari dana ini dapat bertambah atau berkurang. 
													Anda disarankan meminta pendapat dari konsultan keuangan anda sebelum memutuskan untuk melakukan investasi.</i></p>
												</div>	
	                                			</div>
							    			</div>
							    			<?php }	?>		

										</div>

										
										<!-- batas suci -->

										<!-- <div class="blog_detailz col-md-12 csr-kanan csr-info<?php echo $r['nav_date'] ?>" style="padding:15px 0px; <?php echo $k==0 ? "" : "display:none;";?>">
											<div class="tab text-left unit-link">
												<?php
												
												$qq = $this->db->query("
												select 
												case 
												when a.parent = 'Konvensional' 
												then 'Pendapatan Tetap' 
												else a.parent end as 'parent',	
												case
												when a.parent_ENG = 'Convensional' 
												then 'Fixed Income' 
												else a.parent_ENG end as 'parent_ENG',
												a.sequence
												from (
												select distinct
												case when t3.parent = ''
												then t3.title else
												t3.parent end as parent
												,
												case when t3.parent_ENG = ''
												then t3.title_ENG else
												t3.parent_ENG end as parent_ENG
												,t3.sequence
												
												from fund_product_units t1
												inner join kg_fun_product t2 on t1.fund_product_id = t2.id
												inner join kg_fun_product_cat t3 on t2.id_category = t3.id
												inner join fund_product_units t4 on t1.fund_product_id = t4.fund_product_id and t1.nav_date = t4.nav_date
												) 
												as a order by a.sequence asc");

												//$qq = GetAll("fun_product_cat", array("id_parent"=> "where/0",'is_delete'=>'where/0'));

												foreach($qq->result_array() as $kk=> $rr) {
													$akt = $kk==0 ? "aktif" : "";
													echo getLang() ? "<a class='linklayanan ".$akt." tabzz".$kk."' rel='".$kk."'>".$rr['parent_ENG']."</a>" : "<a class='linklayanan ".$akt." tabzz".$kk."' rel='".$kk."'>".$rr['parent']."</a>";
												}
												?>
											</div>

											<?php	
											foreach($qq->result_array() as $kk=> $rr) {?>
		                        			<div class="row perlindungz perlindung<?php echo $kk;?>" style="padding:15px; <?php echo $kk==0 ? "" : "display:none;";?>">
												<div id="table-scroll" class="table-scroll">
    											<div class="table-wrap">
      												<table class="main-table table table-bordered table-hover table-striped" style="font-size:80%;">
													  <thead>
														<tr style="background-color:#dee2e6;">
																<th class="fixed-side" scope="col"><?php echo getLang() ? "Fund Name" : "Produk"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;" width="70"><?php echo getLang() ? "NAV" : "NAB"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;" width="70"><?php echo getLang() ? "1 Month" : "1 BLN"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;" width="70"><?php echo getLang() ? "3 Month" : "3 BLN"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;" width="70"><?php echo getLang() ? "1 Year" : "1 THN"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;" width="70"><?php echo getLang() ? "Year to Date" : "SAT"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;" width="70"><?php echo getLang() ? "Since Inception" : "SP"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;"><?php echo getLang() ? "Total Unit" : "Jumlah Unit Penyertaan"?></th>
																<th style="text-align:right;vertical-center:left;border-left:hidden;border-right:hidden;"><?php echo getLang() ? "Total AUM" : "Total AUM"?></th>
															</tr>
															
        											</thead>
        											<tbody>
	                  								<?php 
													$getdataunit = $this->db->query("
													select 
													a.[nav_date],a.[fund_product_id],a.[unit_price]
													,a.[satu_bulan],a.[tiga_bulan],a.[setahun],a.[sat],a.[sp]
													,a.[unit_amount],a.[total_nominal],a.id_category,
													case 
													when a.parent = 'Konvensional' 
													then 'Pendapatan Tetap' 
													else a.parent end as 'parent',		
													case
													when a.parent_ENG = 'Convensional' 
													then 'Fixed Income' 
													else a.parent_ENG end as 'parent_ENG',
													a.title,a.title_ENG,a.Product,a.ProductENG
													from(
													select t1.[nav_date],t1.[fund_product_id],t1.[unit_price],
													t1.[satu_bulan],t1.[tiga_bulan],t1.[setahun],t1.[sat],t1.[sp],
													t1.[unit_amount],t1.[total_nominal],
													t2.id_category,
													case when t3.parent = ''
													then t3.title else
													t3.parent end as parent,
													case when t3.parent_ENG = ''
													then t3.title_ENG else
													t3.parent end as parent_ENG,
													t3.title
													,t3.title_ENG,
													t2.title as Product,
													t2.title_ENG as ProductENG
													from fund_product_units t1
													inner join kg_fun_product t2 on t1.fund_product_id = t2.id
													inner join kg_fun_product_cat t3 on t2.id_category = t3.id
													inner join fund_product_units t4 on t1.fund_product_id = t4.fund_product_id and t1.nav_date = t4.nav_date
													) as a order by a.fund_product_id asc");
													
													foreach($getdataunit->result_array() as $kkk=> $rrr){
													if($rrr['parent'] == $rr['parent'])
													{?>	
														<tr>
															<th style="border-left:hidden;border-right:hidden;"><?php echo $rrr['Product']?></th>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo getLang() ? Rupiah_ENG2($rrr['unit_price'])  : Rupiah2($rrr['unit_price']);?></td>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo Rupiah4($rrr['satu_bulan'])?></td>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo Rupiah4($rrr['tiga_bulan'])?></td>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo Rupiah4($rrr['setahun'])?></td>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo Rupiah4($rrr['sat'])?></td>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo Rupiah4($rrr['sp'])?></td>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo getLang() ? Rupiah_ENG2($rrr['unit_amount'])  : Rupiah2($rrr['unit_amount']);?></td>
															<td style="text-align:right;border-left:hidden;border-right:hidden;"><?php echo getLang() ? Rupiah_ENG3($rrr['total_nominal'])  : Rupiah3($rrr['total_nominal']);?></td>
														</tr>

													<?php }} ?>
													</tbody>
      												</table>

													<br>
													<p style="color:grey; font-size:13px;"><i>** Informasi ini disiapkan oleh PT BNI Life Insurance dan hanya digunakan sebagai keterangan saja. 
													Kinerja dana ini tidak dijamin, dimana kinerja dana masa lalu tidak mencerminkan kinerja dana masa depan, 
													kemudian nilai unit dan pendapatan dari dana ini dapat bertambah atau berkurang. 
													Anda disarankan meminta pendapat dari konsultan keuangan anda sebelum memutuskan untuk melakukan investasi.</i></p>
												</div>	
	                                			</div>
							    			</div>
							    			<?php }	?>		

										</div> -->


									<?php } ?>
								</div>
                  			</div>
                    	</div>
                	</div>
            	</div>
        	</div>

			
        </section>

		<!-- <hr>
		
		<div class="container-fluid animatedParent animateOnce my-3" style="overflow-x:scroll;">
    		<div class="animated fadeInUpShort">
        		<div class="card" style="background:white;overflow-x:scroll;">
					<table id="table-edit" class="table table-bordered table-hover" style="overflow-x:scroll;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Kota / Kabupaten</th>
                            <th>Usia</th>
                            <th>Subject</th>
                            <th>Sumber</th>
                            <th>Create Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
						<tr>
                            <th>aaaaaaaaaa</th>
                            <th>bbbbbbbbbb</th>
                            <th>cccccccccc</th>
                            <th>dddddddddd</th>
                            <th>eeeeeeeeee</th>
                            <th>ffffffffff</th>
                            <th>gggggggggg</th>
                            <th>hhhhhhhhhh</th>
                            <th>iiiiiiiiii</th>
                            <th>jjjjjjjjjj</th>
                            <th>kkkkkkkkkk</th>
                        </tr>
					</tbody>
                	</table>
				</div>
			</div>	
		</div> -->
		<!--development test-->	

		<!-- <section class="you-can-help" style="padding-top:40px;">
        	<div class="container">
            	<div class="row">
                	<div class="col-xl-12 col-lg-12">
                    	<div class="you-can-help__left kinerja_dana">
                      		<div class="row">
                          		<div class="col-md-12 col-xs-12">
									<?php
										$getdate = $this->db->query("select top(1) nav_date from fund_product_units t1
										order by nav_date desc");

										foreach($getdate->result_array() as $getdates=> $getdatess) {?>
							  			
										<span class="tgl"><?php echo FormatTanggalShort(substr($getdatess['nav_date'],0,10));?></span>
									    
									<?php } ?>
									
									<h2><?php echo $bhs[165];?></h2>
									<br>

									<?php

									$q = $this->db->query("select top(1) nav_date from fund_product_units t1
									order by nav_date desc");

                  					//$q = GetAll("fun_product_cat", array("id_parent"=> "where/0",'is_delete'=>'where/0'));

                  					foreach($q->result_array() as $k=> $r) {?>
										<div class="blog_detailz col-md-12 csr-kanan csr-info<?php echo $r['nav_date'] ?>" style="padding:15px 0px; <?php echo $k==0 ? "" : "display:none;";?>">
											<div class="tab text-left unit-link">
												<?php
												
												$qq = $this->db->query("select distinct
												case when t3.parent = ''
												then t3.title else
												t3.parent end as parent
												,
												case when t3.parent_ENG = ''
												then t3.title_ENG else
												t3.parent_ENG end as parent_ENG
												
												from fund_product_units t1
												inner join kg_fun_product t2 on t1.fund_product_id = t2.id
												inner join kg_fun_product_cat t3 on t2.id_category = t3.id
												inner join fund_product_units t4 on t1.fund_product_id = t4.fund_product_id and t1.nav_date = t4.nav_date");

												//$qq = GetAll("fun_product_cat", array("id_parent"=> "where/0",'is_delete'=>'where/0'));

												foreach($qq->result_array() as $kk=> $rr) {
													$akt = $kk==0 ? "aktif" : "";
													echo getLang() ? "<a class='linklayanan ".$akt." tabzz".$kk."' rel='".$kk."'>".$rr['parent_ENG']."</a>" : "<a class='linklayanan ".$akt." tabzz".$kk."' rel='".$kk."'>".$rr['parent']."</a>";
												}
												?>
											</div>

											<?php	
											foreach($qq->result_array() as $kk=> $rr) {?>
		                        			<div class="row perlindungz perlindung<?php echo $kk;?>" style="padding:15px; <?php echo $kk==0 ? "" : "display:none;";?>">
	                  							<div class="accrodion-grp faq-one-accrodion faq-one-main" data-grp-name="faq-one-accrodion">
												<div style="overflow-x:auto;">  	
													<table id="table-data" class="table table-bordered table-hover" style="font-size:80%;">
															<tr style="background-color:#dee2e6;">
																<th style="text-align:center;vertical-align:middle;"><?php echo getLang() ? "Fund Name" : "Produk"?></th>
																<th style="text-align:center;vertical-align:middle;" width="70"><?php echo getLang() ? "NAB" : "NAB"?></th>
																<th style="text-align:center;vertical-align:middle;" width="70"><?php echo getLang() ? "1 Month" : "1 BLN"?></th>
																<th style="text-align:center;vertical-align:middle;" width="70"><?php echo getLang() ? "3 Month" : "3 BLN"?></th>
																<th style="text-align:center;vertical-align:middle;" width="70"><?php echo getLang() ? "6 Month" : "6 BLN"?></th>
																<th style="text-align:center;vertical-align:middle;" width="70"><?php echo getLang() ? "1 Year" : "1 THN"?></th>
																<th style="text-align:center;vertical-align:middle;" width="70"><?php echo getLang() ? "3 Year" : "3 THN"?></th>
																<th style="text-align:center;vertical-align:middle;" width="70"><?php echo getLang() ? "SAT" : "SAT"?></th>
																<th style="text-align:center;vertical-align:middle;" width="70"><?php echo getLang() ? "SP" : "SP"?></th>
																<th style="text-align:center;vertical-align:middle;"><?php echo getLang() ? "Total Unit" : "Total Unit"?></th>
																<th style="text-align:center;vertical-align:middle;"><?php echo getLang() ? "Total AUM" : "Total AUM"?></th>
															</tr>
	                  								<?php 
													$getdataunit = $this->db->query("select t1.[nav_date],t1.[fund_product_id],t1.[unit_price],t1.[unit_amount],t1.[total_nominal],
													t2.id_category,
													case when t3.parent = ''
													then t3.title else
													t3.parent end as parent,
													case when t3.parent_ENG = ''
													then t3.title_ENG else
													t3.parent end as parent_ENG,
													t3.title
													,t3.title_ENG,
													t2.title as Product,
													t2.title_ENG as ProductENG
													from fund_product_units t1
													inner join kg_fun_product t2 on t1.fund_product_id = t2.id
													inner join kg_fun_product_cat t3 on t2.id_category = t3.id
													inner join fund_product_units t4 on t1.fund_product_id = t4.fund_product_id and t1.nav_date = t4.nav_date
													order by t1.fund_product_id asc");
													
													foreach($getdataunit->result_array() as $kkk=> $rrr){
													if($rrr['parent'] == $rr['parent'])
													{?>	
														<tr>
															<th><?php echo $rrr['Product']?></th>
															<td style="text-align:center;"><?php echo $rrr['unit_price']?></td>
															<td style="text-align:center;">9</td>
															<td style="text-align:center;">8</td>
															<td style="text-align:center;">7</td>
															<td style="text-align:center;">6</td>
															<td style="text-align:center;">5</td>
															<td style="text-align:center;">99 %</td>
															<td style="text-align:center;">99 %</td>
															<td style="text-align:center;"><?php echo $rrr['unit_amount']?></td>
															<td style="text-align:center;"><?php echo $rrr['total_nominal']?></td>
														</tr>

													<?php }} ?>
													</table>
												</div>	
	                                			</div>
							    			</div>
							    			<?php }	?>		

										</div>
									<?php } ?>				
								</div>
                  			</div>
                    	</div>
                	</div>
            	</div>
        	</div>
        </section>
         -->
        <!--<section class="you-can-help">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left kinerja_dana">
                          <div class="row">
								            <div class="col-md-12 col-xs-12">
								            	<div class="block-title">
								            		<span class="tgl">8 Maret 2022</span>
									            	<h2>Kinerja Unit Link BNI Life</h2>
									            </div>
				                    </div>
				                  </div>
				                  <div class="row">
				                  	<div class="col-md-12 col-xs-12">
					                  	<div class="tab text-left">
	                				<?php
	                							$qq = GetAll("fun_product_cat", array("id_parent"=> "where/0"));

												if(getLang())
												{
													foreach($qq->result_array() as $kk=> $rr) {
														$akt = $kk==0 ? "aktif" : "";
													  echo "<a class='linklayanan ".$akt." tabzz".$kk."' rel='".$kk."'>".$rr['title']."</a>";
													  }
												}
												else
												{
													foreach($qq->result_array() as $kk=> $rr) {
														$akt = $kk==0 ? "aktif" : "";
													  echo "<a class='linklayanan ".$akt." tabzz".$kk."' rel='".$kk."'>".$rr['title']."</a>";
													  }
												}
	                							
	                          		?>
	                          	</div>
	                          </div>
	                          <div class="col-md-12 col-xs-12">
		                          <?php
		                          foreach($qq->result_array() as $kk=> $rr) {?>
		                          <div class="row perlindungz perlindung<?php echo $kk;?>" style="<?php echo $kk==0 ? "" : "display:none;";?>">
		                          	<div class="col-md-12 col-xs-12">
		                          		<h2 style="margin-top:30px;"><?php echo $rr['title'];?></h2>
		                          		<table class="mztable">
		                          			<tr><th>Produk</th><th>NAV</th><th>1 BLN</th><th>3 BLN</th><th>6 BLN</th><th>1 THN</th><th>3 THN</th><th>SAT</th><th>SP</th></tr>
		                          			<?php
		                          			$xx = GetAll("fun_product_cat", array("id_parent"=> "where/".$rr['id']));
											
											if(getLang())
											{
												foreach($xx->result_array() as $yy) {
													$qqq = GetAll("fun_product", array("id_category"=> "where/".$yy['id']));
															  foreach($qqq->result_array() as $kkk=> $rrr) {
																  echo "<tr><td>".$rrr['title_ENG']."</td>";
																  for($i=1;$i<=8;$i++) {
																	  echo "<td>".$i."</td>";
																  }
																  echo "</tr>";
															  }
														  }
											}
											else
											{
												foreach($xx->result_array() as $yy) {
													$qqq = GetAll("fun_product", array("id_category"=> "where/".$yy['id']));
															  foreach($qqq->result_array() as $kkk=> $rrr) {
																  echo "<tr><td>".$rrr['title']."</td>";
																  for($i=1;$i<=8;$i++) {
																	  echo "<td>".$i."</td>";
																  }
																  echo "</tr>";
															  }
														  }
											}
				                			?>
		                          		</table>
		                          	</div>
		                          </div>
			                        <?php }
			                        ?>
		                      	</div>
                          </div>
				              </div>
				          </div>
              </div>
          </div>
        </section>-->
        
        <section class="you-can-help section-bottom">
        	<div class="container">
              <div class="row">
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left laporan_kinerja_dana">
                          <div class="row">
								            <div class="col-md-5 col-xs-12">
								            	<h2><?php echo $bhs[61];?></h2>
								            	<p><?php echo $bhs[73];?></p>
				                    </div>
				                    <div class="col-md-7 col-xs-12">
				                    	<div class="row">
				                    		<div class="col-md-12 col-xs-12">
						                    	<select id="l_utama" class="form-control">
						                    		<option value=""> <?php echo getLang() ? "Fund Performance" : "Kinerja Dana";?> </option>
						                    		<?php
						                    		$q = GetAll("fun_product_unit_link");

													if(getLang())
													{
														foreach($q->result_array() as $k=> $r) {
															echo "<option value='".$r['id']."'>".$r['title_ENG']."</option>";
														}
													}
													else
													{
														foreach($q->result_array() as $k=> $r) {
															echo "<option value='".$r['id']."'>".$r['title']."</option>";
														}
													}
			                  						
													?>
						                    		<?php

						                    		//$q = GetAll("fun_product_cat", array("id_parent"=> "where/0"));
			                  						//foreach($q->result_array() as $k=> $r) {
			                  						//	echo "<option value='".$r['id']."'>".$r['title']."</option>";
			                  						//}
			                  						?>
						                    	</select>
						                    </div>
						                    <div class="space desktop"></div>
											<!--
				                    		<div class="col-md-6 col-xs-12">
						                    	<select id="l_unit_link" class="form-control">
						                    		<option value=""> Kategori Dana </option>
						                    		<?php
						                    		$q = GetAll("fun_product_cat", array("id_parent"=> "where/0"));

													if(getLang())
													{
														foreach($q->result_array() as $k=> $r) {
															echo "<option value='".$r['id']."'>".$r['title_ENG']."</option>";
														}
													}
													else
													{
														foreach($q->result_array() as $k=> $r) {
															echo "<option value='".$r['id']."'>".$r['title']."</option>";
														}
													}

			                  						?>
						                    	</select>
						                    </div>-->
											
					                    	<div class="col-md-6 col-xs-12 d_kategori_dana">
					                    		<select class="form-control" disabled>
					                    			<option value=""> <?php echo getLang() ? "Sub-Fund Category" : "Kategori Subdana";?> </option>
						                    	</select>
						                    </div>
					                    	<div class="col-md-6 col-xs-12 d_tipe_dana">
					                    		<select class="form-control" disabled>
					                    			<option value=""> <?php echo getLang() ? "Sub-Fund" : "Subdana";?> </option>
						                    	</select>
						                    </div>
						                    <div class="space desktop"></div>
						                    <div class="col-md-6 col-xs-12 d_tahun">
					                    		<select class="form-control" disabled>
					                    			<option value=""> <?php echo getLang() ? "Year" : "Tahun";?> </option>
						                    	</select>
						                    </div>
						                    <div class="col-md-6 col-xs-12 d_bulan">
					                    		<select class="form-control" disabled>
					                    			<option value=""> <?php echo getLang() ? "Month" : "Bulan";?> </option>
						                    	</select>
						                    </div>
						                    <div class="space"></div>
						                    <div class="col-md-12 col-xs-12">
						                    	<input type="button" class="btn-dis3" value="<?php echo getLang() ? "Download Report" : "Download Laporan";?>">
												<input type="hidden" id="aaa" value="<?php echo getLang() ? "Unit Price" : "Harga Unit" ?>">
												<input type="hidden" id="aab" value="<?php echo getLang() ? "en" : "id" ?>">
											</div>
					                    </div>
				                    </div>
				                  </div>
				              </div>
				          </div>
              </div>
          </div>
        </section>
		
		<!-- //untuk data table nab freeze first kolom -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>	 -->

        <script src="<?php echo base_url();?>assets/js/highcharts.js"></script>
				<script src="<?php echo base_url();?>assets/js/data.js"></script>
        <script>



        $(document).ready(function(){

			var labelcat = $('#cat_dana :selected').text();
			var hargaunits = $('#aaa').val();

        	$("#saham").load("<?php echo lang_url('saham');?>");
        	$('.date').datepicker({
			        format: "yyyy-mm-dd",
			        changeMonth: true,
			        changeYear: true,
		          autoclose: true,
		          endDate: '-1d'
			    });
			    
			    Highcharts.getJSON(
					    "<?php echo site_url('sheet_kinerja_dana/grafik/1');?>",
					    function (data) {
					        Highcharts.chart('grafik', {
					            chart: {
					                zoomType: 'x'
					            },
					            title: {
					                text: labelcat
					            },
					            subtitle: {
					                text: document.ontouchstart === undefined ?
					                    'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
					            },
					            xAxis: {
					                type: 'datetime',
					                labels: { 
			                        enabled: true,
			                        format: '{value:%d %b %Y}',
			                    },
					            },
					            yAxis: {
					                title: {
					                    text: hargaunits
					                }
					            },
					            legend: {
					                enabled: false
					            },
					            plotOptions: {
					                area: {
					                		color:"#F15922",
					                    fillColor: {
					                        linearGradient: {
					                            x1: 0,
					                            y1: 0,
					                            x2: 0,
					                            y2: 1
					                        },
					                        stops: [
					                            [0, "#F15922"],
					                            [1, Highcharts.color("#FFA814").setOpacity(0.6).get('rgba')]
					                        ]
					                    },
					                    marker: {
					                        radius: 2
					                    },
					                    lineWidth: 1,
					                    states: {
					                        hover: {
					                            lineWidth: 1
					                        }
					                    },
					                    threshold: null
					                }
					            },
					
					            series: [{
					                type: 'area',
					                name: 'NAB',
					                data: data
					            }]
					        });
					    }
					);
					
					$(".ganti").change(function(){
					var labelcat = $('#cat_dana :selected').text();
					var hargaunits = $('#aaa').val();
			    	var cat_dana = $("#cat_dana").val();
			    	var lbl = $(".optf"+cat_dana).attr("rel");
			    	var tgl_s = $("#tgl_s").val();
			    	if(!tgl_s) tgl_s="2000-01-01";
			    	var tgl_e = $("#tgl_e").val();
			    	Highcharts.getJSON(
					    "<?php echo site_url('sheet_kinerja_dana/grafik/"+cat_dana+"/"+tgl_s+"/"+tgl_e+"');?>",
					    function (data) {
					        Highcharts.chart('grafik', {
					            chart: {
					                zoomType: 'x'
					            },
					            title: {
					                text: labelcat,
					            },
					            subtitle: {
					                text: document.ontouchstart === undefined ?
					                    'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
					            },
					            xAxis: {
					                type: 'datetime',
					                labels: { 
			                        enabled: true,
			                        format: '{value:%d %b %Y}',
			                    },
					            },
					            yAxis: {
					                title: {
					                    text: hargaunits
					                }
					            },
					            legend: {
					                enabled: false
					            },
					            plotOptions: {
					                area: {
					                    color:"#F15922",
					                    fillColor: {
					                        linearGradient: {
					                            x1: 0,
					                            y1: 0,
					                            x2: 0,
					                            y2: 1
					                        },
					                        stops: [
					                            [0, "#F15922"],
					                            [1, Highcharts.color("#FFA814").setOpacity(0.6).get('rgba')]
					                        ]
					                    },
					                    marker: {
					                        radius: 2
					                    },
					                    lineWidth: 1,
					                    states: {
					                        hover: {
					                            lineWidth: 1
					                        }
					                    },
					                    threshold: null
					                }
					            },
					
					            series: [{
					                type: 'area',
					                name: 'NAB',
					                data: data
					            }]
					        });
					    }
						);
			    });
			    
			    $(".linklayanan").click(function(){
						$(".linklayanan").removeClass("aktif");
						var rel=$(this).attr("rel");
						$(".tabzz"+rel).addClass("aktif");
						$(".perlindungz").hide();
						$(".perlindung"+rel).show();
					});
					
					$("#l_utama").change(function(){
						
						var aab = $('#aab').val();

						if(aab == "en")
						{
							$.post("<?php echo site_url('sheet_kinerja_dana/get_kategori_dana_eng');?>", {param: $(this).val()},  function(response) {
							$(".btn-color3").addClass("btn-dis3");
							$(".btn-color3").removeClass("btn-color3");
							$(".btn-dis3").attr("alt","");
							$(".d_tipe_dana").html("<select class='form-control' disabled=''><option value=''> Sub-Fund </option></select>");
							$(".d_tahun").html("<select class='form-control' disabled=''><option value=''>Year</option></select>");
							$(".d_bulan").html("<select class='form-control' disabled=''><option value=''>Month</option></select>");
							$(".d_kategori_dana").html(response);
							
							$("#l_unit_link").change(function(){
							$.post("<?php echo site_url('sheet_kinerja_dana/get_tipe_dana_eng');?>", {param: $(this).val()},  function(response) {
							$(".btn-color3").addClass("btn-dis3");
							$(".btn-color3").removeClass("btn-color3");
							$(".btn-dis3").attr("alt","");
							$(".d_tipe_dana").html(response);
							$(".d_tahun").html("<select class='form-control' disabled=''><option value=''>Year</option></select>");
							$(".d_bulan").html("<select class='form-control' disabled=''><option value=''>Month</option></select>");
							$("#l_tipe_dana").change(function(){
								$.post("<?php echo site_url('sheet_kinerja_dana/get_tahun_eng');?>", {param: $(this).val()},  function(response) {
									$(".d_tahun").html(response);
									$(".d_bulan").html("<select class='form-control' disabled=''><option value=''>Month</option></select>");
									$(".btn-color3").addClass("btn-dis3");
									$(".btn-color3").removeClass("btn-color3");
									$(".btn-dis3").attr("alt","");
									$("#l_tahun").change(function(){
										$.post("<?php echo site_url('sheet_kinerja_dana/get_bulan_eng');?>", {param: $("#l_tipe_dana").val(), param2: $(this).val()},  function(response) {
											$(".d_bulan").html(response);
											$(".btn-color3").addClass("btn-dis3");
											$(".btn-color3").removeClass("btn-color3");
											$(".btn-dis3").attr("alt","");
											$("#l_bulan").change(function(){
													$.post("<?php echo site_url('sheet_kinerja_dana/unduh');?>", {param: $("#l_tipe_dana").val(), param2: $("#l_tahun").val(), param3: $(this).val()},  function(response) {
														$(".btn-dis3").addClass("btn-color3");
														$(".btn-dis3").removeClass("btn-dis3");
														if(response && response!=0) {
															$(".btn-color3").attr("alt",response);
															$(".btn-color3").click(function(){
																var alt = $(this).attr("alt");
																if(alt) {
																	/*window.location="<?php echo base_url().'uploads/kinerja_bulanan/"+alt+"';?>";*/
																	window.open("<?php echo base_url().'uploads/kinerja_bulanan/"+alt+"';?>", '_blank');
																}
															});
														}
													});
												});
										});
									});
								});
							});
							});
							});
					
							});
						}
						else
						{
							$.post("<?php echo site_url('sheet_kinerja_dana/get_kategori_dana');?>", {param: $(this).val()},  function(response) {
							$(".btn-color3").addClass("btn-dis3");
							$(".btn-color3").removeClass("btn-color3");
							$(".btn-dis3").attr("alt","");
							$(".d_tipe_dana").html("<select class='form-control' disabled=''><option value=''> Subdana </option></select>");
							$(".d_tahun").html("<select class='form-control' disabled=''><option value=''>Tahun</option></select>");
							$(".d_bulan").html("<select class='form-control' disabled=''><option value=''>Bulan</option></select>");
							$(".d_kategori_dana").html(response);
							
							$("#l_unit_link").change(function(){
							$.post("<?php echo site_url('sheet_kinerja_dana/get_tipe_dana');?>", {param: $(this).val()},  function(response) {
							$(".btn-color3").addClass("btn-dis3");
							$(".btn-color3").removeClass("btn-color3");
							$(".btn-dis3").attr("alt","");
							$(".d_tipe_dana").html(response);
							$(".d_tahun").html("<select class='form-control' disabled=''><option value=''>Tahun</option></select>");
							$(".d_bulan").html("<select class='form-control' disabled=''><option value=''>Bulan</option></select>");
							$("#l_tipe_dana").change(function(){
								$.post("<?php echo site_url('sheet_kinerja_dana/get_tahun');?>", {param: $(this).val()},  function(response) {
									$(".d_tahun").html(response);
									$(".d_bulan").html("<select class='form-control' disabled=''><option value=''>Bulan</option></select>");
									$(".btn-color3").addClass("btn-dis3");
									$(".btn-color3").removeClass("btn-color3");
									$(".btn-dis3").attr("alt","");
									$("#l_tahun").change(function(){
										$.post("<?php echo site_url('sheet_kinerja_dana/get_bulan');?>", {param: $("#l_tipe_dana").val(), param2: $(this).val()},  function(response) {
											$(".d_bulan").html(response);
											$(".btn-color3").addClass("btn-dis3");
											$(".btn-color3").removeClass("btn-color3");
											$(".btn-dis3").attr("alt","");
											$("#l_bulan").change(function(){
													$.post("<?php echo site_url('sheet_kinerja_dana/unduh');?>", {param: $("#l_tipe_dana").val(), param2: $("#l_tahun").val(), param3: $(this).val()},  function(response) {
														$(".btn-dis3").addClass("btn-color3");
														$(".btn-dis3").removeClass("btn-dis3");
														if(response && response!=0) {
															$(".btn-color3").attr("alt",response);
															$(".btn-color3").click(function(){
																var alt = $(this).attr("alt");
																if(alt) {
																	/*window.location="<?php echo base_url().'uploads/kinerja_bulanan/"+alt+"';?>";*/
																	window.open("<?php echo base_url().'uploads/kinerja_bulanan/"+alt+"';?>", '_blank');
																}
															});
														}
													});
												});
										});
									});
								});
							});
							});
							});
					
							});
						}

						
					});
					
					/*$(".btn-color3").click(function(){
						var alt = $(this).attr("alt");
						if(alt) window.location="<?php echo base_url().'uploads/kinerja_bulanan/"+alt+"';?>";
					});*/
				});
				</script>

<!-- <script>
// requires jquery library
jQuery(document).ready(function() {
  jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');   
 });
</script> -->