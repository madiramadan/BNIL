<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              	<div class="card-box">
                	<form class="form-material" method="POST" action="<?php echo site_url($filez.'/'.$functionz.'_save');?>" enctype="multipart/form-data">
						<input type="hidden" name="id_contact" value="<?php echo $id_contact; ?>">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
	                	<div class="row">
	                		<div class="col-md-8 box-content">
								<div class="no-b">
				                    <div class="card-headerd white">
				                        <div class="d-flex justify-content-between">
				                            <div class="align-self-end">
												<ul class="nav nav-tabs card-header-tabs nav-material" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" id="w2--tab1" data-toggle="tab" href="#w2-tab1" role="tab" aria-controls="tab1" aria-expanded="true" aria-selected="false">Indonesia</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" id="w2--tab2" data-toggle="tab" href="#w2-tab2" role="tab" aria-controls="tab2" aria-selected="true">English</a>
													</li>
												</ul>
											</div>
				                        </div>
				                    </div>
				                    <div class="no-p card-body-tab">
				                        <div class="tab-content" id="v-pills-tabContent1">
				                            <!-- TAB INDONESIA -->
				                            <div class="tab-pane fade active show" id="w2-tab1" role="tabpanel" aria-labelledby="w2-tab1">
												<div class="card-headerd white">
													<div class="form-group form-float">
														<div class="form-line">
															<input type="text" name="nama" class="form-control" value="<?php echo isset($val['nama']) ? $val['nama'] : "";?>" >
															<label class="form-label">Name</label>
														</div>
													</div>
												</div>
											</div>
											<!-- TAB ENGLISH -->
				                            <div class="tab-pane fade show" id="w2-tab2" role="tabpane2" aria-labelledby="w2-tab2">
												<div class="card-headerd white">
													<div class="form-group form-float">
														<div class="form-line">
															<input type="text" name="nama_eng" class="form-control" value="<?php echo isset($val['nama_eng']) ? $val['nama_eng'] : "";?>" >
															<label class="form-label">Name (English)</label>
														</div>
													</div>
												</div>
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
	                	<div class="row" style="padding-top: 12px;">
							<div class="col-md-8 box-content">
								<div class="no-b">
									<div class="form-group form-float">
										<div class="form-line" style="margin-top: 18px;">
											<input type="text" name="kup" class="form-control" value="<?php echo isset($val['kup']) ? $val['kup'] : "";?>" >
											<label class="form-label">KUP</label>
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
											<textarea type="text" name="address" class="form-control"><?php echo isset($val['address']) ? $val['address'] : "";?></textarea>
										</div>
									</div>
									<div class="form-group form-float">
										<label class="form-label">Latitude</label>
										<div class="form-line">
											<input type="text" name="latitude" id="latitude" class="form-control" value="<?php echo isset($val['latitude']) ? $val['latitude'] : "";?>">
										</div>
									</div>
									<div class="form-group form-float">
										<label class="form-label">Longitude</label>
										<div class="form-line">
											<input type="text" name="longitude" id="longitude" class="form-control" value="<?php echo isset($val['longitude']) ? $val['longitude'] : "";?>">
										</div>
									</div>
									<div class="form-group form-float">
										<div class="content-box">
											<div class="banner">
												<div id="map_canvas" style="border:0; width: 100%; height: 300px"></div>
											</div>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line">
											<input type="text" name="email" class="form-control" value="<?php echo isset($val['email']) ? $val['email'] : "";?>" >
											<label class="form-label">Email</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line">
											<input type="text" name="phone" class="form-control" value="<?php echo isset($val['phone']) ? $val['phone'] : "";?>" >
											<label class="form-label">Phone</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line">
											<input type="text" name="fax" class="form-control" value="<?php echo isset($val['fax']) ? $val['fax'] : "";?>" >
											<label class="form-label">Fax</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line">
											<input type="text" name="open_hour" class="form-control" value="<?php echo isset($val['open_hour']) ? $val['open_hour'] : "";?>" >
											<label class="form-label">Open Hour</label>
										</div>
									</div>
									<div class="form-group form-float">
										<div class="form-line">
											<input type="text" name="kantor_layanan" class="form-control" value="<?php echo isset($val['kantor_layanan']) ? $val['kantor_layanan'] : "";?>" >
											<label class="form-label">Manager Kantor Layanan</label>
										</div>
									</div>
									<div class="form-group form-float">
										<label class="form-label">Additional Field</label>
										<div class="form-line">
											<textarea type="text" name="additional_field" class="form-control"><?php echo isset($val['additional_field']) ? $val['additional_field'] : "";?></textarea>
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