<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              	<div class="card-box">
				  	<form class="form-material" method="POST" action="<?php echo site_url($filez.'/'.$functionz.'_add');?>" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $id;?>">
	                	<div class="row">
	                		<div class="col-md-8 box-content">
								<div class="no-b">
				                    <div class="no-p card-body-tab">
			                        	<div class="tab-content" id="v-pills-tabContent1">
			                            <!-- TAB INDONESIA -->
			                            <div class="tab-pane fade active show" id="w2-tab1" role="tabpanel" aria-labelledby="w2-tab1">
			                                <div class="form-group form-float">
												<div class="form-line">
													<input name="title" class="form-control" value="<?php echo isset($val['title']) ? $val['title'] : "";?>">
													<label class="form-label">Title</label>
												</div>
											</div>
											<div class="form-group form-float">
												<div class="form-line">
													<input name="button_url" class="form-control" value="<?php echo isset($val['button_url']) ? $val['button_url'] : "";?>">
													<label class="form-label">Button Url</label>
												</div>
											</div>
			                            </div>
								</div>
				            </div>
				            <div class="title-box">Image</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input name="title_image" class="form-control" value="<?php echo isset($val['title_image']) ? $val['title_image'] : "";?>">
										<label class="form-label">Title Image</label>
									</div>
								</div>
								<div class="form-group form-float">
									<div>
										<input type="file" name="image" class="form-control">
										<?php if(isset($val['image']) && $val['image']){ ?>
											<img src="<?php echo base_url('../uploads/'.$filez.'/'.$val['image']); ?>" style="height: 100px;"><br>
										<?php } ?>
										<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
									</div>
								</div>
		                        <div class="title-box">Image Mobile</div>
									<div class="form-group form-float">
										<div class="form-line">
											<input name="title_image_mobile" class="form-control" value="<?php echo isset($val['title_image_mobile']) ? $val['title_image_mobile'] : "";?>">
											<label class="form-label">Title Image Mobile</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div>
											<input type="file" name="image_mobile" class="form-control">
											<?php if(isset($val['image_mobile']) && $val['image_mobile']){ ?>
												<img src="<?php echo base_url('../uploads/'.$filez.'/'.$val['image_mobile']); ?>" style="height: 100px;"><br>
											<?php } ?>
											<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
										</div>
									</div>
				                </div>
							</div>
							<div class="col-md-3 box-content box-content-kanan">
                        		<div class="form-group form-float">
									<div>
										<label class="form-label">Order</label>
										<?php
										$opt_urut   = array();
										$jum_banner = GetAll("merchandise_ban",array("is_delete"=> "where/0"))->num_rows();
										if($id==0) $jum_banner++;
										for($i=1;$i<=$jum_banner;$i++) {
											$opt_urut[$i] = $i;
										}
										echo form_dropdown("urutan",$opt_urut,isset($val['urutan']) ? $val['urutan'] : $jum_banner,"class='form-control'");
										?>
									</div>
								</div>
								<div class="form-group form-float float-left">
									<div class="float-left"> Publish
										<div class="material-switch float-right">
											<input id="someSwitchOptionSuccess" name="is_publish" type="checkbox" value="1" <?php echo isset($val['is_publish']) && $val['is_publish'] ? "checked=checked" : "";?>>
											<label for="someSwitchOptionSuccess" class="bg-success"></label>
			                      		</div>
			                    	</div>
		                    	</div>
	                      		<div class="form-group float-left">
									<button type="submit" class="btn btn-success btn-sm w100">Simpan</button>
								</div>
							</div>
	                  </div>
	                	<!--<button type="button" class="btn btn-outline-warning btn-sm float-right width-100 batal" style="margin-right:20px;">Batal</button>-->
	                </form>	
                </div>
          	</div>
        </div>
    </div>
</div>