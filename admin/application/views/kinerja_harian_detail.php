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
										<div class="form">
												<label class="form-label">Content</label>
												<textarea style="height:250px;" name="content" id="editor1" class="form-control"><?php echo isset($val['content']) ? $val['content'] : "";?></textarea>
												<hr>
												<label class="form-label">Content ENG</label>
												<textarea style="height:250px;" name="content_ENG" id="editor2" class="form-control"><?php echo isset($val['content_ENG']) ? $val['content_ENG'] : "";?></textarea>
											</div>
										</div>
									</div>
				                </div>
							</div>
							<div class="col-md-3 box-content box-content-kanan">
								<div class="form-group form-float">
									<div class="form-line">
										<input name="periode" class="form-control date-time-picker" value="<?php echo isset($val['periode']) ? $val['periode'] : "";?>">
										<label class="form-label">Periode</label>
									</div>
								</div>
								<div class="form-group form-float">
									<div>
										<label class="form-label">File</label>
										<input type="file" name="userfile" class="form-control">
										<?php if(isset($val['file']) && $val['file']) echo $val['file'].'<br>'; ?>
										<span class="badge badge-danger">*File harus berformat PDF<span>
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