<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              	<div class="card-box">
                	<form class="form-material" method="POST" action="<?php echo site_url($filez.'/'.$functionz.'_save');?>" enctype="multipart/form-data">
						<input type="hidden" name="id_product" value="<?php echo $id_product; ?>">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
	                	<div class="row">
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
												<div class="card-headerd white">
													<div class="form-group form-float" style="padding-top: 18px;">
														<div class="form">
															<label class="form-label">Title</label>
															<textarea name="title" class="form-control"><?php echo isset($val['title']) ? $val['title'] : "";?></textarea>
														</div>
														<div class="form">
															<label class="form-label">Desktipsi</label>
															<textarea name="description" class="form-control" id="editor1"><?php echo isset($val['description']) ? $val['description'] : "";?></textarea>
														</div>
													</div>
												</div>
											</div>
											<!-- TAB ENGLISH -->
				              <div class="tab-pane fade show" id="w2-tab2" role="tabpane2" aria-labelledby="w2-tab2">
												<div class="card-headerd white">
													<div class="form-group form-float" style="padding-top: 18px;">
														<div class="form">
															<label class="form-label">Title (English)</label>
															<textarea name="title_eng" class="form-control"><?php echo isset($val['title_eng']) ? $val['title_eng'] : "";?></textarea>
														</div>
														<div class="form">
															<label class="form-label">Desktipsi (English)</label>
															<textarea name="description_eng" class="form-control" id="editor2"><?php echo isset($val['description_eng']) ? $val['description_eng'] : "";?></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
				                </div>
							</div>
							<div class="col-md-3 box-content box-content-kanan">
								<div class="form-group form-float float-left">
									<div class="form-group form-float">
									<div class="form-line">
										<label class="form-label">Date Publish</label>
										<input name="publish_date" class="date-time-picker form-control" value="<?php echo isset($val['publish_date']) ? $val['publish_date'] : date("Y-m-d H:i"); ?>">
									</div>
                </div>
                <div class="float-left">
										<label class="form-label">Publish</label>
										<div class="material-switch float-right">
											<input name="is_publish" id="is_publish" type="checkbox" value="1" <?php echo isset($val['is_publish']) && $val['is_publish'] ? "checked='checked'" : ""; ?>>
											<label for="is_publish" class="bg-success"></label>
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
<script src="<?php echo base_url();?>assets/js/editor.js"></script>