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
                              <div class="form">
                                <label class="form-label">Type Setting</label>
                                <select name="type_setting" id="type_setting" class="form-control" autocomplete="off">
                                  <option value="channel_id">Channel ID</option>
                                  <option value="selected_videos">Selected Videos</option>
                                </select>
                              </div>
                            </div>
                            <div id="form-channel" class="form-group form-float">
                              <div class="form-line">
                                <input type="text" name="channel_id" id="channel_id" class="form-control" value="<?php echo isset($record['channel_id']) ? $record['channel_id'] : "";?>" />
                                <label class="form-label">Channel ID</label>
                              </div>
                            </div>
                            <div class="form-group form-float">
                              <div class="form-line">
                                <input type="text" name="api_key" class="form-control" value="<?php echo isset($record['api_key']) ? $record['api_key'] : "";?>" />
                                <label class="form-label">Api Key Youtube V3</label>
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
<script>
  $(document).on('change','#type_setting',function(){
    if($(this).val() == "selected_videos"){
      $('#form-channel').attr('style','display:none');
      $('#channel_id').val('');
    } else {
      $('#form-channel').removeAttr('style','display:none');
    }
  });
</script>