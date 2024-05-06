<?php
$username=$email=$wa=array();
$q=GetAll("member", array("id !="=> "where/".$id, "is_delete"=> "where/0"));
foreach($q->result_array() as $r) {
	$username[] = "'".str_replace("'","",$r['username'])."'";
	$email[] = "'".$r['email']."'";
	$wa[] = "'".$r['hp']."'";
}
$username_tim = join(",",$username);
$email_tim = join(",",$email);
$wa_tim = join(",",$wa);
?>
<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              <div class="card-box">
                	<form id="form_user" class="form-material" method="POST" action="<?php echo site_url('user/user_add');?>" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $id;?>">
	                	<div class="row">
	                		<div class="col-md-12">
	                			<div class="form-group form-float">
                          <div class="form-line">
                            <input name="nama" id="id_nama" class="form-control" value="<?php echo isset($val['nama']) ? $val['nama'] : "";?>" required>
                            <label class="form-label">Nama</label>
                          </div>
                        </div>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <input name="username" id="id_username" class="form-control" value="<?php echo isset($val['username']) ? $val['username'] : "";?>" required>
                            <label class="form-label">Username</label>
                          </div>
                        </div>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <input name="password" id="id_password" type="password" class="form-control" value="<?php echo isset($val['password']) ? $val['password'] : "";?>" required>
                            <input name="password_old" type="hidden" value="<?php echo isset($val['password']) ? $val['password'] : "";?>">
                            <label class="form-label">Kata Sandi</label>
                          </div>
                        </div>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <input name="email" id="id_email" class="form-control" value="<?php echo isset($val['email']) ? $val['email'] : "";?>" required>
                            <label class="form-label">Email</label>
                          </div>
                        </div>
                        <div class="form-group form-float">
                          <div class="form-line">
                            <input name="hp" id="id_hp" class="form-control" value="<?php echo isset($val['hp']) ? $val['hp'] : "";?>" maxlength="14" required>
                            <label class="form-label">No Whatsapp</label>
                          </div>
                        </div>
	                			<div class="col-md-3" style="padding-left:0px;">
	                				<div class="form-group form-float">
		                				<label class="form-label">Status Aktif</label><br>
		                				Aktifkan User
	                          <div class="material-switch float-right">
	                              <input id="someSwitchOptionDefault" name="is_active" type="checkbox" value="1" <?php echo isset($val['is_active']) && $val['is_active'] ? "checked" : "";?>/>
	                              <label for="someSwitchOptionDefault" class="bg-success"></label>
	                          </div>
	                        </div>
	                      </div>
                        <!--<div class="form-group">
	                          <label>Foto</label>
	                          <input type="file" accept="image/*" name="file" class="form-control" style="margin-bottom:6px;">
	                          <?php echo isset($val['keterangan']) ? "Download File : <a href='./../../../../uploads/".$val['keterangan']."' target='_blank'>".$val['keterangan']."</a>" : "";?>
	                      </div>-->
	                    </div>
	                  </div>
	                	<button type="submit" class="btn btn-warning btn-sm float-right width-100">Simpan</button>
	                	<button type="button" class="btn btn-outline-warning btn-sm float-right width-100 batal" style="margin-right:20px;">Batal</button>
	                	
	                </form>
                </div>
          </div>
        </div>
    </div>
</div>
<style>
label.error{position:absolute;}
.form-material .form-group{margin-bottom:35px;}
</style>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script><!-- Jquery -->
<script src="<?php echo base_url();?>assets/js/jquery-ui-1.12.1.js"></script>
<script type="application/javascript">
(function ($) {
    var tim_email = [<?php echo $email_tim;?>];
		var tim_wa = [<?php echo $wa_tim;?>];    
		var tim_username = [<?php echo $username_tim;?>];
		$("#id_nama").blur(function(){$(this).valid();});
    $("#id_username").blur(function(){$(this).valid();});
    $("#id_password").blur(function(){$(this).valid();});
    $("#id_email").blur(function(){$(this).valid();});
    $("#id_hp").blur(function(){$(this).valid();});
    jQuery.validator.addMethod("notSameEmail", function (value, element, options) {
    	 if(tim_email.indexOf(value) < 0) return true;
  		 else return false;
		});
		jQuery.validator.addMethod("notSameWa", function (value, element, options) {
	     if(tim_wa.indexOf(value) < 0) return true;
  		 else return false;
		});
		jQuery.validator.addMethod("notSameUsername", function (value, element, options) {
	     if(tim_username.indexOf(value) < 0) return true;
  		 else return false;
		});
		$("#form_user").validate({
	    rules: {
    		username: {notSameUsername: ['.form-control']},
    		email: {notSameEmail: ['.form-control']},
    		hp: {notSameWa: ['.form-control'], minlength: 10},
    	},
    	messages: {
    		username: {notSameUsername: 'Username sudah digunakan'},
    		email: {notSameEmail: 'Email sudah digunakan'},
    		hp: {notSameWa: 'No WhatsApp sudah digunakan'},
    	},
    	submitHandler: function(form) {
	    	form.submit();
	    }
	  });
})(jQuery);
</script>