<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
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
				                    <div class="no-p card-body-tab">
                                        <div class="form-group form-float">
											<div class="form-line">
												<input type="hidden" name="id" value="<?php echo isset($val['id']) ? $val['id'] : 0;?>">
												<input name="nama" class="form-control" value="<?php echo isset($val['nama']) ? $val['nama'] : "";?>">
												<label class="form-label">Name</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="link" class="form-control" value="<?php echo isset($val['link']) ? $val['link'] : "";?>">
												<label class="form-label">Link</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="title_image" class="form-control" value="<?php echo isset($val['title_image']) ? $val['title_image'] : "";?>">
												<label class="form-label">Title Image</label>
											</div>
										</div>
										<div class="form-group form-float">
											<label class="form-label">Image</label>
											<div>
												<input type="file" name="image" class="form-control">
												<?php if(isset($val['image']) && $val['image']){ ?>
													<img src="<?php echo base_url('../uploads/'.$filez.'/'.$val['image']); ?>" style="height: 100px;"><br>
												<?php } ?>
												<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
											</div>
										</div>
										<div class="form-group form-float float-left">
											<div class="float-left">
												<label class="form-label">Publish</label>
												<div class="material-switch float-right">
													<input id="someSwitchOptionSuccess" name="is_publish" type="checkbox" value="1" <?php echo isset($val['is_publish']) && $val['is_publish'] ? "checked=checked" : "";?>>
													<label for="someSwitchOptionSuccess" class="bg-success"></label>
												</div>
											</div>
										</div>
										<div class="form-group float-left">
											<button type="submit" class="btn btn-success btn-sm">Update</button>
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