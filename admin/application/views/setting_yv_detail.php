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
										<div class="tab-pane fade active show" id="w2-tab1" role="tabpanel" aria-labelledby="w2-tab1">
											<div class="form-group form-float">
												<div class="form-group form-float">
													<div class="form-line">
														<input name="link" id="link" class="form-control" value="<?php echo isset($val['link']) ? $val['link'] : "";?>">
														<label class="form-label">Link Youtube Video</label>
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
											</div>
										</div>
										<div class="form-group float-left">
											<button type="submit" class="btn btn-success btn-sm">Simpan</button>
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
<script>
	$(document).ready(function(){
		$('#title').keyup(function(){
			var text 	= $(this).val();
			var input 	= text.toLowerCase().replace(/ /g, '-');
			$('#slug').val(input);
		});
		$('#title_eng').keyup(function(){
			var text 	= $(this).val();
			var input 	= text.toLowerCase().replace(/ /g, '-');
			$('#slug_eng').val(input);
		});
	});
</script>