<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
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
									<div class="card-headerd white">
										<div class="form-group form-float" style="margin-top: 18px;">
											<div class="form-line">
												<input name="title" class="form-control" value="<?php echo isset($val['title']) ? $val['title'] : "";?>">
												<label class="form-label">Title</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Description</label>
												<textarea name="description" id="editor1" class="form-control"><?php echo isset($val['description']) ? $val['description'] : "";?></textarea>
											</div>
										</div>
									</div>
				                </div>
							</div>
							<div class="col-md-3 box-content box-content-kanan">
								<div class="form-group float-left">
									<label class="form-label">Category</label>
									<select name="id_parent" class="form-control">
										<option value="">Parent Category</option>
										<?php foreach ($record as $r) { ?>
											<option value="<?php echo $r['id']; ?>" <?php echo isset($val['id_parent']) && $val['id_parent'] == $r['id'] ? 'selected' : ''; ?> ><?php echo $r['title']; ?></option>
										<?php } ?>
									</select>
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