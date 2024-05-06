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
			                            </div>
			                        </div>
				                    </div>
				                    <div class="title-box">Image</div>
				                    <div class="form-group form-float">
							            		<div>
		                            <input type="file" name="image" accept="image/*" class="form-control">
		                            <?php
		                            if(isset($val['image'])) {
		                            	if(file_exists("../uploads/".$val['image']) && $val['image']) echo "<br><img src='".str_replace("admin","",base_url())."uploads/".$val['image']."' style='max-height:150px;'>";
		                            }
		                            ?>
		                          </div>
		                        </div>
		                        <div class="title-box">Image Mobile</div>
				                    <div class="form-group form-float">
							            		<div>
		                            <input type="file" name="image_mobile" accept="image/*" class="form-control">
		                            <?php
		                            if(isset($val['image_mobile'])) {
		                            	if(file_exists("../uploads/".$val['image_mobile']) && $val['image_mobile']) echo "<br><img src='".str_replace("admin","",base_url())."uploads/".$val['image_mobile']."' style='max-height:150px;'>";
		                            }
		                            ?>
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