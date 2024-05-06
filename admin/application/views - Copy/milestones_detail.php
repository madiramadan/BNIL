<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
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
											<input name="year" class="form-control" value="<?php echo isset($val['year']) ? $val['year'] : "";?>">
											<label class="form-label">Year</label>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3 box-content box-content-kanan">
	                      		<div class="form-group float-left">
									<button type="submit" class="btn btn-success btn-sm w100">Simpan</button>
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
													<div>
														<label class="form-label">Description</label>
														<textarea rows="30" id="editor1" name="description"><?php echo isset($val['description']) ? $val['description'] : "";?></textarea>
													</div>
												</div>
											</div>
				                            <!-- TAB ENGLISH -->
				                            <div class="tab-pane fade" id="w2-tab2" role="tabpanel" aria-labelledby="w2-tab2">
												<div class="form-group form-float">
													<div>
														<label class="form-label">Description (English)</label>
														<textarea rows="30" id="editor2" name="description_eng"><?php echo isset($val['description_eng']) ? $val['description_eng'] : "";?></textarea>
													</div>
												</div>
				                            </div>
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
<script src="<?php echo base_url();?>assets/js/editor.js"></script>