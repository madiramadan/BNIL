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
														<input name="nama" id="nama" class="form-control" value="<?php echo isset($val['nama']) ? $val['nama'] : "";?>">
														<label class="form-label">Name</label>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form-line">
														<input type="text" name="phone" id="phone" class="form-control" value="<?php echo isset($val['phone']) ? $val['phone'] : ""; ?>">
														<label class="form-label">Phone Number</label>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form">
														<label class="form-label">Provinsi</label>
														<?php
														echo form_dropdown("id_province",GetOptProv(),isset($val['id_province']) ? $val['id_province'] : "","class='form-control g_prov'");
														?>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form">
														<label class="form-label">Kota</label>
														<div id="kabz">
															<select name="" id="" class="form-control">
																<option value="">- Pilih Kota -</option>
															</select>
														</div>
													</div>
												</div>
												<div class="form-group form-float">
													<label class="form-label">Address</label>
													<div class="form-line">
														<textarea name="address" id="address" class="form-control"><?php echo isset($val['address']) ? $val['address'] : ""; ?></textarea>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form-group form-float">
														<label class="form-label">Latitude</label>
														<div class="form-line">
															<input type="text" name="latitude" id="latitude" class="form-control" value="<?php echo isset($val['latitude']) ? $val['latitude'] : ""; ?>">
														</div>
													</div>
													<div class="form-group form-float">
														<label class="form-label">Longitude</label>
														<div class="form-line">
															<input type="text" name="longitude" id="longitude" class="form-control" value="<?php echo isset($val['longitude']) ? $val['longitude'] : ""; ?>">
														</div>
													</div>
													<div class="content-box">
														<div class="banner">
															<div id="map_canvas" style="border:0; width: 100%; height: 300px"></div>
														</div>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form">
														<label class="form-label">Category</label>
														<select name="id_category" id="id_category" class="form-control">
															<option value="">Select Category</option>
															<?php foreach ($category as $c) { ?>
																<option value="<?php echo $c['id'] ?>" <?php echo isset($val['id_category']) && $val['id_category'] == $c['id'] ? 'selected' : ''; ?>><?php echo $c['title_eng']; ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form">
														<label class="form-label">Type</label>
														<select name="id_type" id="id_type" class="form-control">
															<option value="">Select Type</option>
															<?php foreach ($type as $c) { ?>
																<option value="<?php echo $c['id'] ?>" <?php echo isset($val['id_type']) && $val['id_type'] == $c['id'] ? 'selected' : ''; ?>><?php echo $c['title_eng']; ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form">
														<label class="form-label">Tags</label>
														<select name="id_tags" id="id_tags" class="form-control">
															<option value="">Select Tags</option>
															<?php foreach ($tags as $c) { ?>
																<option value="<?php echo $c['id'] ?>" <?php echo isset($val['id_tags']) && $val['id_tags'] == $c['id'] ? 'selected' : ''; ?>><?php echo $c['title']; ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
				                    			<div class="title p-b-10">Facilities</div>
												<div class="form-group form-float float-left">
													<div class="float-left">
														<label class="form-label">Rawat Inap</label> &nbsp; &nbsp; &nbsp;
														<div class="material-switch">
															<input id="is_rawat_inap" name="is_rawat_inap" type="checkbox" value="1" <?php echo isset($val['is_rawat_inap']) && $val['is_rawat_inap'] ? "checked=checked" : "";?>>
															<label for="is_rawat_inap" class="bg-info"></label>
														</div>
													</div>
													<div class="float-left">
														<label class="form-label">Rawat Jalan</label> &nbsp; &nbsp; &nbsp;
														<div class="material-switch">
															<input id="is_rawat_jalan" name="is_rawat_jalan" type="checkbox" value="1" <?php echo isset($val['is_rawat_jalan']) && $val['is_rawat_jalan'] ? "checked=checked" : "";?>>
															<label for="is_rawat_jalan" class="bg-warning"></label>
														</div>
													</div>
													<div class="float-left">
														<label class="form-label">Medical Checkup</label> &nbsp; &nbsp; &nbsp;
														<div class="material-switch">
															<input id="is_medical_checkup" name="is_medical_checkup" type="checkbox" value="1" <?php echo isset($val['is_medical_checkup']) && $val['is_medical_checkup'] ? "checked=checked" : "";?>>
															<label for="is_medical_checkup" class="bg-danger"></label>
														</div>
													</div>
													<div class="float-left">
														<label class="form-label">Optik</label>
														<div class="material-switch">
															<input id="is_optik" name="is_optik" type="checkbox" value="1" <?php echo isset($val['is_optik']) && $val['is_optik'] ? "checked=checked" : "";?> >
															<label for="is_optik" class="bg-success"></label>
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
	                </form>
                </div>
          </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBeEPj1UtxUnb5N39BEKbX2-GrcBTlW1sY&libraries=places&callback=initAutocomplete"></script>
<script type="text/javascript">
	$(document).ready(function(){
		initMap();
		var id_prov = "<?php echo isset($val['id_province']) ? $val['id_province'] : 0;?>";
		var id_kab = "<?php echo isset($val['id_city']) ? $val['id_city'] : 0;?>";
		$(".g_prov").change(function(){
			$.post('<?php echo base_url();?>contact/get_kabupaten',{id_prov: $(this).val()},function(data){
				$("#kabz").html(data);
			});
		});
		if(id_prov > 0) {
			$.post('<?php echo base_url();?>contact/get_kabupaten',{id_prov: id_prov, id_kab: id_kab},function(data){
				$("#kabz").html(data);
			});
		}
	});
	function initMap() {
		var lat_ = $('#latitude').val();
		var lng_ = $('#longitude').val();
		var map  = new google.maps.Map(document.getElementById('map_canvas'), {
			zoom: 5,
			center: new google.maps.LatLng(-2.401183, 116.543652),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		if(lat_ === "" || lng_ === ""){
			var vMarker = new google.maps.Marker({
				position: new google.maps.LatLng(-2.401183, 116.543652),
				draggable: true
			});
			google.maps.event.addListener(vMarker, 'dragend', function (evt) {
				// $("#latitude").val(evt.latLng.lat().toFixed(6));
				// $("#longitude").val(evt.latLng.lng().toFixed(6));
				$("#latitude").val(evt.latLng.lat());
				$("#longitude").val(evt.latLng.lng());
				map.panTo(evt.latLng);
			});
		} else {
			var vMarker = new google.maps.Marker({
				position: new google.maps.LatLng(lat_, lng_),
				draggable: true
			});
			google.maps.event.addListener(vMarker, 'dragend', function (evt) {
				$("#latitude").val(evt.latLng.lat());
				$("#longitude").val(evt.latLng.lng());
				map.panTo(evt.latLng);
			});
		}
		map.setCenter(vMarker.position);
		vMarker.setMap(map);
	}
</script>