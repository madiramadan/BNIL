<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              	<div class="card-box">
                	<form class="form-material" method="POST" action="<?php echo site_url($filez.'/'.$functionz.'_add');?>" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo isset($record['id']) ? $record['id'] : 0;?>">
	                	<div class="row">
	                		<div class="col-md-12 box-content">
								<div class="no-b">
				                    <div class="no-p card-body-tab">
										<div class="form-group form-float">
											<div class="form-line">
												<input name="text_eng" class="form-control" value="<?php echo isset($record['text_eng']) ? $record['text_eng'] : "";?>">
												<label class="form-label">WhatsApp Buy Text English</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="text" class="form-control" value="<?php echo isset($record['text']) ? $record['text'] : "";?>">
												<label class="form-label">WhatsApp Buy Text Indonesia</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="no_wa" class="form-control" value="<?php echo isset($record['no_wa']) ? $record['no_wa'] : "";?>">
												<label class="form-label">WhatsApp No.</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="help_text_eng" class="form-control" value="<?php echo isset($record['help_text_eng']) ? $record['help_text_eng'] : "";?>">
												<label class="form-label">WhatsApp Help Text English</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="help_text" class="form-control" value="<?php echo isset($record['help_text']) ? $record['help_text'] : "";?>">
												<label class="form-label">WhatsApp Help Text Indonesia</label>
											</div>
										</div>
				                    </div>
				                    <div class="title-box">Order Information Icon Image</div>
				                    <div class="form-group form-float">
										<label class="form-label">Harga & Biaya</label>
										<div>
											<input type="file" name="harga_biaya" class="form-control">
											<?php if(isset($record['harga_biaya']) && $record['harga_biaya']){ ?>
												<img src="<?php echo base_url('../uploads/'.$filez.'/'.$record['harga_biaya']); ?>" style="height: 100px;"><br>
											<?php } ?>
											<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
										</div>
									</div>
									<div class="form-group form-float">
										<label class="form-label">Pembayaran</label>
										<div>
											<input type="file" name="pembayaran" class="form-control">
											<?php if(isset($record['pembayaran']) && $record['pembayaran']){ ?>
												<img src="<?php echo base_url('../uploads/'.$filez.'/'.$record['pembayaran']); ?>" style="height: 100px;"><br>
											<?php } ?>
											<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
										</div>
									</div>
									<div class="form-group form-float">
										<label class="form-label">Pemesanan</label>
										<div>
											<input type="file" name="pemesanan" class="form-control">
											<?php if(isset($record['pemesanan']) && $record['pemesanan']){ ?>
												<img src="<?php echo base_url('../uploads/'.$filez.'/'.$record['pemesanan']); ?>" style="height: 100px;"><br>
											<?php } ?>
											<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
										</div>
									</div>
									<div class="form-group form-float">
										<label class="form-label">Pembatalan</label>
										<div>
											<input type="file" name="pembatalan" class="form-control">
											<?php if(isset($record['pembatalan']) && $record['pembatalan']){ ?>
												<img src="<?php echo base_url('../uploads/'.$filez.'/'.$record['pembatalan']); ?>" style="height: 100px;"><br>
											<?php } ?>
											<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
										</div>
									</div>
									<div class="form-group form-float">
										<label class="form-label">Pengiriman</label>
										<div>
											<input type="file" name="pengiriman" class="form-control">
											<?php if(isset($record['pengiriman']) && $record['pengiriman']){ ?>
												<img src="<?php echo base_url('../uploads/'.$filez.'/'.$record['pengiriman']); ?>" style="height: 100px;"><br>
											<?php } ?>
											<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
										</div>
									</div>
									<div class="form-group float-left">
										<button type="submit" class="btn btn-success btn-sm">Update</button>
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