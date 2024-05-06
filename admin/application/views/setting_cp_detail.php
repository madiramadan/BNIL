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
										<?php if(!$id){ ?>
											<div class="form-group form-float">
												<div class="form-line">
													<input type="text" name="item" class="form-control" value="<?php echo isset($val['item']) ? $val['item'] : "";?>" />
													<label class="form-label">Item</label>
												</div>
											</div>
											<div class="form-group form-float">
												<div class="form-line">
													<textarea name="value" class="form-control"><?php echo isset($val['value']) ? $val['value'] : "";?></textarea>
													<label class="form-label">Value</label>
												</div>
											</div>
										<?php } else { ?>
											<div class="form-group form-float">
												<div class="form">
													<label class="form-label"><?php echo isset($val['item']) ? $val['item'] : "";?></label>
													<textarea name="value" class="form-control"><?php echo isset($val['value']) ? $val['value'] : "";?></textarea>
												</div>
											</div>
										<?php } ?>
										<div class="form-group float-left">
											<button type="submit" class="btn btn-success btn-sm">Simpan</button>
										</div>
				                    </div>
								</div>
							</div>
						</div>
	                </form>
                </div>
          	</div>
        </div>
    </div>
</div>