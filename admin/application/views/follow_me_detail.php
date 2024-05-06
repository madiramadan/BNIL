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
											<div class="form">
												<label class="form-label">Image Type</label>
												<select name="image_type" id="image_type" class="form-control">
													<option value="img" <?php echo isset($val['image_type']) && $val['image_type'] == 'img' ? 'selected' : ''; ?>>Image</option>
													<option value="icon" <?php echo isset($val['image_type']) && $val['image_type'] == 'icon' ? 'selected' : ''; ?>>Font Awesome Icon</option>
												</select>
											</div>
										</div>
										<div id="form-img" <?php echo isset($val['image_type']) && $val['image_type'] == 'img' ? '' : 'style="display: none;"'; ?>>
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
										</div>
										<div id="form-icon" <?php echo isset($val['image_type']) && $val['image_type'] == 'icon' ? '' : 'style="display: none;"'; ?>>
											<div class="form-group form-float">
												<label class="form-label">Font Awesome Icon</label>
												<div class="form-line">
													<input name="icon" id="icon" class="form-control" placeholder="fa-instagram" value="<?php echo isset($val['icon']) ? $val['icon'] : "";?>"">
												</div>
												<label for=""><a href="https://fontawesome.com/search" target="_blank">More Icon fontawesome.com</a></label>
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
<script>
	$(document).on('change','#image_type',function(){
		if($(this).val() == "icon"){
			$('#form-icon').removeAttr('style',true);
			$('#form-img').attr('style','display:none');
		} else {
			$('#form-icon').attr('style','display:none');
			$('#form-img').removeAttr('style',true);
		}
	});
</script>