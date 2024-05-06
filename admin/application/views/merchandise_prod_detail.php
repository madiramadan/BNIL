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
												<div class="form-group form-float">
													<div class="form-line">
														<input name="nama" class="form-control" value="<?php echo isset($val['nama']) ? $val['nama'] : "";?>">
														<label class="form-label">Name</label>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form">
														<label class="form-label">Description</label>
														<textarea name="description" class="form-control" id="editor1"><?php echo isset($val['description']) ? $val['description'] : "";?></textarea>
													</div>
												</div>
											</div>
											<!-- TAB ENGLISH -->
											<div class="tab-pane fade" id="w2-tab2" role="tabpanel" aria-labelledby="w2-tab2">
												<div class="form-group form-float">
													<div class="form-line">
														<input name="nama_eng" class="form-control" value="<?php echo isset($val['nama_eng']) ? $val['nama_eng'] : "";?>">
														<label class="form-label">Name (English)</label>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form">
														<label class="form-label">Description (English)</label>
														<textarea name="description_eng" class="form-control" id="editor2"><?php echo isset($val['description_eng']) ? $val['description_eng'] : "";?></textarea>
													</div>
												</div>
											</div>
										</div>
				                    </div>
									<div class="title-box">Product Detail</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input type="text" name="price" class="form-control" value="<?php echo isset($val['price']) ? $val['price'] : "";?>" />
												<label class="form-label">Price</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input type="number" name="weight" class="form-control" value="<?php echo isset($val['weight']) ? $val['weight'] : "";?>" />
												<label class="form-label">Weight In Gram</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input type="text" name="sku" class="form-control" value="<?php echo isset($val['sku']) ? $val['sku'] : "";?>" />
												<label class="form-label">SKU</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input type="number" name="stock" class="form-control" value="<?php echo isset($val['stock']) ? $val['stock'] : "";?>" />
												<label class="form-label">Stock</label>
											</div>
										</div>
									</div>
									<div class="title-box">Product Category</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Product Category</label>
												<select name="id_category" class="form-control">
													<?php foreach ($category as $c) { ?>
														<option value="<?php echo $c['id']; ?>"><?php echo $c['category']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-3 box-content box-content-kanan">
										<div class="title-box">Image</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="title_image1" class="form-control" value="<?php echo isset($val['title_image1']) ? $val['title_image1'] : "";?>">
												<label class="form-label">Title Image 1</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div>
												<label class="form-label">Image 1</label>
												<input type="file" name="image1" class="form-control">
												<?php if(isset($val['image1']) && $val['image1']){ ?>
													<img src="<?php echo base_url('../uploads/'.$filez.'/'.$val['image1']); ?>" style="height: 100px;"><br>
												<?php } ?>
												<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="title_image2" class="form-control" value="<?php echo isset($val['title_image2']) ? $val['title_image2'] : "";?>">
												<label class="form-label">Title Image 2</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div>
												<label class="form-label">Image 2</label>
												<input type="file" name="image2" class="form-control">
												<?php if(isset($val['image2']) && $val['image2']){ ?>
													<img src="<?php echo base_url('../uploads/'.$filez.'/'.$val['image2']); ?>" style="height: 100px;"><br>
												<?php } ?>
												<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="title_image3" class="form-control" value="<?php echo isset($val['title_image3']) ? $val['title_image3'] : "";?>">
												<label class="form-label">Title Image 3</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div>
												<label class="form-label">Image 3</label>
												<input type="file" name="image3" class="form-control">
												<?php if(isset($val['image3']) && $val['image3']){ ?>
													<img src="<?php echo base_url('../uploads/'.$filez.'/'.$val['image3']); ?>" style="height: 100px;"><br>
												<?php } ?>
												<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="title_image4" class="form-control" value="<?php echo isset($val['title_image4']) ? $val['title_image4'] : "";?>">
												<label class="form-label">Title Image 4</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div>
												<label class="form-label">Image 4</label>
												<input type="file" name="image4" class="form-control">
												<?php if(isset($val['image4']) && $val['image4']){ ?>
													<img src="<?php echo base_url('../uploads/'.$filez.'/'.$val['image4']); ?>" style="height: 100px;"><br>
												<?php } ?>
												<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="title_image5" class="form-control" value="<?php echo isset($val['title_imagtitle_image5e4']) ? $val['title_image5'] : "";?>">
												<label class="form-label">Title Image 5</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div>
												<label class="form-label">Image 5</label>
												<input type="file" name="image5" class="form-control">
												<?php if(isset($val['image5']) && $val['image5']){ ?>
													<img src="<?php echo base_url('../uploads/'.$filez.'/'.$val['image5']); ?>" style="height: 100px;"><br>
												<?php } ?>
												<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
											</div>
										</div>
										<div class="float-left" style="margin-bottom: 12px;">
											<label class="form-label">Publish</label>
											<div class="material-switch float-right">
												<input id="someSwitchOptionSuccess" name="is_publish" type="checkbox" value="1" <?php echo isset($val['is_publish']) && $val['is_publish'] ? "checked=checked" : "";?>>
												<label for="someSwitchOptionSuccess" class="bg-success"></label>
											</div>
										</div>
										<div class="form-group float-left">
											<button type="submit" class="btn btn-success btn-sm w100">Simpan</button>
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
<script src="<?php echo base_url();?>assets/js/editor.js"></script>