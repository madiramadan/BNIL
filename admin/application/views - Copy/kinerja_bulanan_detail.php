<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
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
										<div class="form-group form-float" style="margin-top: 18px;">
											<div class="form">
												<label class="form-label">Tinjauan Makro</label>
												<textarea name="tinjauan_makro" id="editor1" class="form-control"><?php echo isset($val['tinjauan_makro']) ? $val['tinjauan_makro'] : "";?></textarea>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Tabel Indikator</label>
												<textarea name="tabel_indikator" id="editor2" class="form-control"><?php echo isset($val['tabel_indikator']) ? $val['tabel_indikator'] : "";?></textarea>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Pembanding</label>
												<textarea name="pembanding" id="editor3" class="form-control"><?php echo isset($val['pembanding']) ? $val['pembanding'] : "";?></textarea>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Grafik Portfolio</label>
												<textarea name="grafik_portofolio" id="editor4" class="form-control"><?php echo isset($val['grafik_portofolio']) ? $val['grafik_portofolio'] : "";?></textarea>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Grafik Bulanan</label>
												<textarea name="grafik_bulanan" id="editor5" class="form-control"><?php echo isset($val['grafik_bulanan']) ? $val['grafik_bulanan'] : "";?></textarea>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Alokasi Asset 1</label>
												<textarea name="alokasi_asset1" id="editor6" class="form-control"><?php echo isset($val['alokasi_asset1']) ? $val['alokasi_asset1'] : "";?></textarea>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Alokasi Asset 2</label>
												<textarea name="alokasi_asset2" id="editor7" class="form-control"><?php echo isset($val['alokasi_asset2']) ? $val['alokasi_asset2'] : "";?></textarea>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Alokasi Asset 3</label>
												<textarea name="alokasi_asset3" id="editor8" class="form-control"><?php echo isset($val['alokasi_asset3']) ? $val['alokasi_asset3'] : "";?></textarea>
											</div>
										</div>
									</div>
				                </div>
							</div>
							<div class="col-md-3 box-content box-content-kanan">
								<div class="form-group form-float">
									<div class="form-line">
										<input name="periode" class="form-control date-time-picker" value="<?php echo isset($val['periode']) ? $val['periode'] : "";?>">
										<label class="form-label">Periode</label>
									</div>
								</div>
								<div class="form-group form-float">
									<div>
										<label class="form-label">File</label>
										<input type="file" name="file" accept="image/*" class="form-control">
										<?php
										if(isset($val['file'])) {
											if(file_exists("../uploads/".$val['file']) && $val['file']) echo "<br><img src='".str_replace("admin","",base_url())."uploads/".$val['file']."' style='max-height:150px;'>";
										}
										?>
									</div>
								</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input name="aum" class="form-control" value="<?php echo isset($val['aum']) ? $val['aum'] : "";?>">
										<label class="form-label">AUM</label>
									</div>
								</div>
								<div class="form-group float-left">
									<label class="form-label">Product</label>
									<select name="id_product" class="form-control">
										<?php foreach ($product as $p) { ?>
											<option value="<?php echo $p['id']; ?>" <?php echo isset($val['id_product']) && $val['id_product'] == $p['id'] ? 'selected' : ''; ?> ><?php echo $p['title']; ?></option>
										<?php } ?>
									</select>
								</div>
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
<script src="<?php echo base_url();?>assets/js/editor.js"></script>