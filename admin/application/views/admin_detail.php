<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              <div class="card-box">
									<form class="form-material" method="POST" action="<?php echo site_url('admin/admin_add');?>" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $id;?>">
	                	<div class="row">
	                		<div class="col-md-12 box-content">
	                			<div class="no-b">
	                				<div class="no-p card-body-tab">
			                			<div class="form-group form-float">
		                          <div class="form-line">
		                            <input name="name" class="form-control" value="<?php echo isset($val['name']) ? $val['name'] : "";?>" required>
		                            <label class="form-label">Nama</label>
		                          </div>
		                        </div>
		                        <div class="form-group form-float">
		                          <div class="form-line">
		                            <input name="username" class="form-control" value="<?php echo isset($val['username']) ? $val['username'] : "";?>" required>
		                            <label class="form-label">Username</label>
		                          </div>
		                        </div>
		                        <div class="form-group form-float">
		                          <div class="form-line">
		                            <input name="userpass" type="password" class="form-control" value="<?php echo isset($val['userpass']) ? $val['userpass'] : "";?>" required>
		                            <label class="form-label">Kata Sandi</label>
		                          </div>
		                        </div>
		                        <!--<div class="form-group form-float">
		                          <div class="form-line">
		                            <input name="email" class="form-control" value="<?php echo isset($val['email']) ? $val['email'] : "";?>">
		                            <label class="form-label">Email</label>
		                          </div>
		                        </div>-->
		                        <div class="form-group form-float">
		                          <div class="form-line">
		                            <?php 
		                            $grup=GetOptGrup();
		                            echo form_dropdown("id_admin_grup", $grup, isset($val['id_admin_grup']) ? $val['id_admin_grup'] : 1, "class='form-control' style='border:0px !important;' required");
		                            ?>
		                            <label class="form-label">Role</label>
		                          </div>
		                        </div>
		                        <div class="form-group form-float">
			                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
				                			<button type="button" class="btn btn-warning btn-sm" style="margin-right:20px;" onClick="javascript:history.go(-1);">Batal</button>
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