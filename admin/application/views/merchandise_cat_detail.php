<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              	<div class="card-box">
                	<form class="form-material" method="POST" action="<?php echo site_url($filez.'/'.$functionz.'_add');?>" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $id;?>">
	                	<div class="row">
	                		<div class="col-md-12 box-content">
								<div class="no-b">
				                    <div class="card-headerd white">
				                        <div class="d-flex justify-content-between">
				                            <div class="align-self-end">
												<ul class="nav nav-tabs card-header-tabs nav-material" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" id="w2--tab1" data-toggle="tab" href="#w2-tab1" role="tab" aria-controls="tab1" aria-expanded="true" aria-selected="false">Indonesia</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" id="w2--tab2" data-toggle="tab" href="#w2-tab2" role="tab" aria-controls="tab2" aria-selected="true">English</a>
													</li>
												</ul>
											</div>
				                        </div>
				                    </div>
				                    <div class="no-p card-body-tab">
			                        	<div class="tab-content" id="v-pills-tabContent1">
											<!-- TAB INDONESIA -->
											<div class="tab-pane fade active show" id="w2-tab1" role="tabpanel" aria-labelledby="w2-tab1">
												<div class="form-group form-float">
													<div class="form-line">
														<input name="category" class="form-control" value="<?php echo isset($val['category']) ? $val['category'] : "";?>">
														<label class="form-label">Category</label>
													</div>
												</div>
											</div>
											<!-- TAB ENGLISH -->
											<div class="tab-pane fade" id="w2-tab2" role="tabpanel" aria-labelledby="w2-tab2">
												<div class="form-group form-float">
													<div class="form-line">
														<input name="category_eng" class="form-control" value="<?php echo isset($val['category_eng']) ? $val['category_eng'] : "";?>">
														<label class="form-label">Category (English)</label>
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
					            	<div class="col-md-3 box-content">
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
	                  		</div>
						</div>
						<!--<button type="button" class="btn btn-outline-warning btn-sm float-right width-100 batal" style="margin-right:20px;">Batal</button>-->
	                </form>
                </div>
          	</div>
        </div>
    </div>
</div>