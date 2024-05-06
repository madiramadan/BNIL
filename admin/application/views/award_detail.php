<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              	<div class="card-box">
                	<form class="form-material" method="POST" action="<?php echo site_url($filez.'/'.$functionz.'_add');?>" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $id;?>">
	                	<div class="row">
	                		<div class="col-md-8 box-content" style="margin-bottom: 12px;">
								<div class="no-b">
									<div class="form-group form-float"  style="padding-top: 14px;">
										<div class="form-line">
											<input name="awarder_name" class="form-control" value="<?php echo isset($val['awarder_name']) ? $val['awarder_name'] : "";?>">
											<label class="form-label">Awarder Name</label>
										</div>
									</div>
								</div>
							</div>
	                		<div class="col-md-8 box-content">
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
														<input name="description" class="form-control" value="<?php echo isset($val['description']) ? $val['description'] : "";?>">
														<label class="form-label">Enter Description Here</label>
													</div>
												</div>
											</div>
				                            <!-- TAB ENGLISH -->
				                            <div class="tab-pane fade" id="w2-tab2" role="tabpanel" aria-labelledby="w2-tab2">
				                                <div class="form-group form-float">
													<div class="form-line">
														<input name="description_eng" class="form-control" value="<?php echo isset($val['description_eng']) ? $val['description_eng'] : "";?>">
														<label class="form-label">Enter Description Here (English)</label>
													</div>
												</div>
				                            </div>
				                        </div>
				                    </div>
				                </div>
							</div>
							<div class="col-md-3 box-content box-content-kanan">
								<div class="form-group form-float">
									<div class="form-line">
                            			<input name="date" class="date-time-picker form-control" value="<?php echo isset($val['date']) ? $val['date'] : date("Y-m-d H:i:s");?>">
                            			<label class="form-label">Date</label>
                          			</div>
                        		</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input name="title_image" class="form-control" value="<?php echo isset($val['title_image']) ? $val['title_image'] : "";?>">
										<label class="form-label">Title Image</label>
									</div>
								</div>
								<div class="form-group form-float">
									<div>
										<label class="form-label">Image</label>
										<input type="file" name="image" class="form-control">
										<?php if(isset($val['image']) && $val['image']){ ?>
											<img src="<?php echo base_url('../uploads/'.$filez.'/'.$val['image']); ?>" style="height: 100px;"><br>
										<?php } ?>
										<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
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