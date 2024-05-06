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
										<div class="form-group form-float" style="padding-top: 18px;">
											<div class="form-line">
												<input name="form_name" class="form-control" value="<?php echo isset($val['form_name']) ? $val['form_name'] : "";?>">
												<label class="form-label">Form Name</label>
											</div>
										</div>
										<div class="form-group form-float" style="padding-top: 18px;">
											<div class="form-line">
												<input name="to_email" class="form-control" value="<?php echo isset($val['to_email']) ? $val['to_email'] : "";?>">
												<label class="form-label">Email to (Multiple email address with coma separated)</label>
											</div>
										</div>
										<div class="form-group form-float" style="padding-top: 18px;">
											<div class="form-line">
												<input name="cc_email" class="form-control" value="<?php echo isset($val['cc_email']) ? $val['cc_email'] : "";?>">
												<label class="form-label">FEmail cc (Multiple email address with coma separated)</label>
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