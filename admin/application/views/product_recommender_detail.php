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
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Umur</label>
												<div class="form">
													<select name="umur" class="form-control">
														<option value="18-25" <?php echo isset($val['umur']) == '18-25' ? 'selected' : ''; ?>>18-25</option>
														<option value="26-40" <?php echo isset($val['umur']) == '26-40' ? 'selected' : ''; ?>>26-40</option>
														<option value="41-55" <?php echo isset($val['umur']) == '41-55' ? 'selected' : ''; ?>>41-55</option>
														<option value="56 >" <?php echo isset($val['umur']) == '56 >' ? 'selected' : ''; ?>>56 ></option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Penghasilan</label>
												<div class="form">
													<select name="penghasilan" class="form-control">
														<option value="75jt" <?php echo isset($val['penghasilan']) == '75jt' ? 'selected' : ''; ?>>< Rp. 75jt</option>
														<option value="76-150jt" <?php echo isset($val['penghasilan']) == '76-150jt' ? 'selected' : ''; ?>>Rp. 76-150jt</option>
														<option value="151-250jt" <?php echo isset($val['penghasilan']) == '151-250jt' ? 'selected' : ''; ?>>Rp. 151-250jt</option>
														<option value="250jt" <?php echo isset($val['penghasilan']) == '250jt' ? 'selected' : ''; ?>>Rp. 250jt ></option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Memiliki Tanggungan</label>
												<div class="material-switch">
													<input id="someSwitchOptionSuccess" name="is_tanggungan" type="checkbox" value="<?php echo isset($val['is_tanggungan']) && $val['is_tanggungan'] ? 'checked=checked' : ''; ?>" >
													<label for="someSwitchOptionSuccess" class="bg-success"></label>
												</div>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Status</label>
												<div class="form">
													<select name="status" class="form-control">
														<option value="Berkeluarga" <?php echo isset($val['status']) == 'Berkeluarga' ? 'selected' : ''; ?>>Berkeluarga</option>
														<option value="Lajang" <?php echo isset($val['status']) == 'Lajang' ? 'selected' : ''; ?>>Lajang</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Perlindungan</label>
												<div class="form">
													<select name="perlindungan" class="form-control">
														<option value="Investasi" <?php echo isset($val['perlindungan']) == 'Investasi' ? 'selected' : ''; ?>>Investasi</option>
														<option value="Kesehatan" <?php echo isset($val['perlindungan']) == 'Kesehatan' ? 'selected' : ''; ?>>Kesehatan</option>
														<option value="Pendidikan" <?php echo isset($val['perlindungan']) == 'Pendidikan' ? 'selected' : ''; ?>>Pendidikan</option>
														<option value="Pensiun" <?php echo isset($val['perlindungan']) == 'Pensiun' ? 'selected' : ''; ?>>Pensiun</option>
														<option value="Penyakit Kritis" <?php echo isset($val['perlindungan']) == 'Penyakit Kritis' ? 'selected' : ''; ?>>Penyakit Kritis</option>
														<option value="Syariah" <?php echo isset($val['perlindungan']) == 'Syariah' ? 'selected' : ''; ?>>Syariah</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Jenis Product</label>
												<div class="form">
													<select name="jenis_product" class="form-control">
														<option value="Agency" <?php echo isset($val['jenis_product']) == 'Agency' ? 'selected' : ''; ?>>Agency</option>
														<option value="Bancassurance" <?php echo isset($val['jenis_product']) == 'Bancassurance' ? 'selected' : ''; ?>>Bancassurance</option>
														<option value="Product Lain" <?php echo isset($val['jenis_product']) == 'Product Lain' ? 'selected' : ''; ?>>Product Lain</option>
														<option value="Syariah" <?php echo isset($val['jenis_product']) == 'Syariah' ? 'selected' : ''; ?>>Syariah</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Product</label>
												<div class="form">
													<select name="id_product" class="form-control">
														<?php foreach ($product as $p) { ?>
															<option value="<?php echo $p['id']; ?>"><?php echo $p['title_eng']; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Jenis Premi</label>
												<div class="form">
													<select name="jenis_premi" class="form-control">
														<option value="Berkala" <?php echo isset($val['jenis_premi']) == 'Berkala' ? 'selected' : ''; ?>>Berkala</option>
														<option value="Sekaligus" <?php echo isset($val['jenis_premi']) == 'Sekaligus' ? 'selected' : ''; ?>>Sekaligus</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Harga Premi</label>
												<div class="form-line">
													<input type="number" name="harga_premi" class="form-control" value="<?php echo isset($val['harga_premi']) ? $val['harga_premi'] : "";?>">
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
<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets/js/editor.js"></script>