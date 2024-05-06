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
										<div class="tab-pane fade active show" id="w2-tab1" role="tabpanel" aria-labelledby="w2-tab1">
											<div class="form-group form-float">
												<div class="form-line">
													<input name="career_category" class="form-control" value="<?php echo isset($val['career_category']) ? $val['career_category'] : "";?>">
													<label class="form-label">Career Category</label>
												</div>
											</div>
										</div>
				                    </div>
				                </div>
							</div>
							<div class="col-md-3 box-content box-content-kanan">
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