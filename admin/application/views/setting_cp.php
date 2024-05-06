<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              	<div class="card-box">
                	<form class="form-material" method="POST" action="<?php echo site_url($filez.'/'.$functionz.'_add');?>" enctype="multipart/form-data">
						        <input type="hidden" name="id" value="<?php echo isset($record['id']) ? $record['id'] : 0; ?>">
	                	<div class="row">
	                		<div class="col-md-12 box-content">
								        <div class="no-b">
                          <div class="no-p card-body-tab">
                            <div class="form-group form-float">
                              <div class="form-line">
                                <input type="password" name="current_password" class="form-control" value="<?php echo isset($record['current_password']) ? $record['current_password'] : "";?>" />
                                <label class="form-label">Current Password</label>
                              </div>
                            </div>
                            <div class="form-group form-float">
                              <div class="form-line">
                                <input type="text" name="new_password" class="form-control" value="<?php echo isset($record['new_password']) ? $record['new_password'] : "";?>" />
                                <label class="form-label">New Password</label>
                              </div>
                            </div>
                            <div class="form-group form-float">
                              <div class="form-line">
                                <input type="text" name="confirm_password" class="form-control" value="<?php echo isset($record['confirm_password']) ? $record['confirm_password'] : "";?>" />
                                <label class="form-label">Confirm Password</label>
                              </div>
                            </div>
                            <div class="form-group form-float">
                              <div class="form-line">
                                <input type="email" name="email" class="form-control" value="<?php echo isset($record['email']) ? $record['email'] : "";?>" />
                                <label class="form-label">Email</label>
                              </div>
                            </div>
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