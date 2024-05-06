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
										<div class="form-group form-float" style="padding-top: 18px;">
											<div class="">
												<label class="form-label">Text</label>
												<textarea name="text" class="form-control"><?php echo isset($val['text']) ? $val['text'] : "";?></textarea>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="">
												<label class="form-label">Text (English)</label>
												<textarea name="text_eng" class="form-control"><?php echo isset($val['text_eng']) ? $val['text_eng'] : "";?></textarea>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="grup" class="form-control" value="<?php echo isset($val['grup']) ? $val['grup'] : "";?>">
												<label class="form-label">Group</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="item" class="form-control" value="<?php echo isset($val['item']) ? $val['item'] : "";?>">
												<label class="form-label">Item</label>
											</div>
										</div>
				                    </div>
				                </div>
	                      		<div class="form-group float-left">
									<button type="submit" class="btn btn-success btn-sm">Simpan</button>
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