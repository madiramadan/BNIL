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
														<input name="title" id="title" class="form-control" value="<?php echo isset($val['title']) ? $val['title'] : "";?>">
														<label class="form-label">Title</label>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form-line">
														<input name="slug" id="slug" class="form-control" value="<?php echo isset($val['slug']) ? $val['slug'] : "";?>" readonly>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form">
														<textarea name="description" id="editor1" class="form-control"><?php echo isset($val['description']) ? $val['description'] : "";?></textarea>
													</div>
												</div>
												<!--<div class="form-group form-float">
													<div class="form">
														<label class="form-label">Informasi Tambahan</label>
														<textarea name="informasi" id="" class="form-control"><?php echo isset($val['informasi']) ? $val['informasi'] : "";?></textarea>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form">
														<label class="form-label">Caption</label>
														<textarea name="caption" class="form-control"><?php echo isset($val['caption']) ? $val['caption'] : "";?></textarea>
													</div>
												</div>-->
												<div class="title-box">SEO</div>
												<div class="form-group form-float">
													<div class="form-line">
														<input name="seo" class="form-control" value="<?php echo isset($val['seo']) ? $val['seo'] : "";?>">
														<label class="form-label">SEO Title</label>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form">
														<label class="form-label">SEO Description</label>
														<textarea name="seo_description" class="form-control"><?php echo isset($val['seo']) ? $val['seo'] : "";?></textarea>
													</div>
												</div>
											</div>
											<!-- TAB ENGLISH -->
											<div class="tab-pane fade" id="w2-tab2" role="tabpanel" aria-labelledby="w2-tab2">
												<div class="form-group form-float">
													<div class="form-line">
														<input name="title_eng" id="title_eng" class="form-control" value="<?php echo isset($val['title_eng']) ? $val['title_eng'] : "";?>">
														<label class="form-label">Title (English)</label>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form-line">
														<input name="slug_eng" id="slug_eng" class="form-control" value="<?php echo isset($val['slug_eng']) ? $val['slug_eng'] : "";?>" readonly>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form">
														<textarea name="description_eng" id="editor2" class="form-control"><?php echo isset($val['description_eng']) ? $val['description_eng'] : "";?></textarea>
													</div>
												</div>
												<!--<div class="form-group form-float">
													<div class="form">
														<label class="form-label">Informasi Tambahan (English)</label>
														<textarea name="informasi_eng" id="" class="form-control"><?php echo isset($val['informasi_eng']) ? $val['informasi_eng'] : "";?></textarea>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form">
														<label class="form-label">Caption (English)</label>
														<textarea name="caption_eng" class="form-control"><?php echo isset($val['caption_eng']) ? $val['caption_eng'] : "";?></textarea>
													</div>
												</div>-->
												<div class="title-box">SEO</div>
												<div class="form-group form-float">
													<div class="form-line">
														<input name="seo_eng" class="form-control" value="<?php echo isset($val['seo_eng']) ? $val['seo_eng'] : "";?>">
														<label class="form-label">SEO Title (English)</label>
													</div>
												</div>
												<div class="form-group form-float">
													<div class="form">
														<label class="form-label">SEO Description (English)</label>
														<textarea name="seo_description_eng" class="form-control"><?php echo isset($val['seo_description_eng']) ? $val['seo_description_eng'] : "";?></textarea>
													</div>
												</div>
											</div>
										</div>
				                    </div>
				                </div>
							</div>
							<div class="col-md-3 box-content box-content-kanan">
								<div class="form-group form-float">
									<div class="form-line">
										<label class="form-label">Date Publish</label>
										<input name="publish_date" class="date-time-picker form-control" value="<?php echo isset($val['publish_date']) ? $val['publish_date'] : date("Y-m-d H:i"); ?>">
									</div>
                </div>
								<div class="form-group form-float">
									<div class="form-line">
										<input name="title_image" class="form-control" value="<?php echo isset($val['title_image']) ? $val['title_image'] : "";?>">
										<label class="form-label">Title Masthead Image</label>
									</div>
								</div>
								<div class="form-group form-float">
									<div>
										<label class="form-label">Masthead Image</label>
										<input type="file" name="image" class="form-control">
										<?php if(isset($val['image']) && $val['image']){ 
											if(file_exists('../uploads/'.$functionz.'/'.$val['image'])) $path="product";
											else $path="img";
											?>
											<img src="<?php echo base_url('../uploads/'.$path.'/'.$val['image']); ?>" style="height: 100px;"><br>
										<?php } ?>
										<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
									</div>
								</div>
								<div class="form-group form-float">
									<div class="form-line">
										<input name="title_image_mobile" class="form-control" value="<?php echo isset($val['title_image_mobile']) ? $val['title_image_mobile'] : "";?>">
										<label class="form-label">Title Masthead Image Mobile</label>
									</div>
								</div>
								<div class="form-group form-float">
									<div>
										<label class="form-label">Masthead Image Mobile</label>
										<input type="file" name="image_mobile" class="form-control">
										<?php if(isset($val['image_mobile']) && $val['image_mobile']){ 
											if(file_exists('../uploads/'.$functionz.'/'.$val['image'])) $path="product";
											else $path="img";?>
											<img src="<?php echo base_url('../uploads/'.$path.'/'.$val['image_mobile']); ?>" style="height: 100px;"><br>
										<?php } ?>
										<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
									</div>
								</div>
								<div class="form-group form-float">
									<div>
										<label class="form-label">Brosur</label>
										<input type="file" name="brosur" class="form-control">
										<?php if(isset($val['brosur']) && $val['brosur']){ ?>
											<a href="<?php echo base_url('uploads/'.$functionz.'/'.$val['brosur']); ?>" target="_blank"><?php echo $val['brosur']; ?></a><br>
										<?php } ?>
										<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat PDF dengan Max Size 45MB<span>
									</div>
								</div>
								<div class="form-group float-left">
									<label class="form-label">Category</label>
									<select name="id_category[]" id="id_category" class="form-control select2" multiple="multiple">
										<?php foreach ($category as $c) {
											if(!$c['id_parent']){ ?>
											<optgroup label="<?php echo $c['title']; ?>">
											<?php } else { ?>
												<option value="<?php echo $c['id']; ?>" <?php echo isset($val['id_category']) && preg_match("/-".$c['id']."-/",$val['id_category']) ? 'selected' : ''; ?> > - <?php echo $c['title']; ?></option>
											<?php } ?>
											</optgroup>
										<?php } ?>
									</select>
								</div>
								<div class="form-group float-left">
									<label class="form-label">Lifestage</label>
									<select name="id_lifestage[]" id="id_lifestage" class="form-control select2" multiple="multiple">
										<?php foreach ($lifestage as $c) {
											if(!$c['id_parent']){ ?>
											<optgroup label="<?php echo $c['title']; ?>">
											<?php } else { ?>
												<option value="<?php echo $c['id']; ?>" <?php echo isset($val['id_lifestage']) && preg_match("/-".$c['id']."-/",$val['id_lifestage']) ? 'selected' : ''; ?> > - <?php echo $c['title']; ?></option>
											<?php } ?>
											</optgroup>
										<?php } ?>
									</select>
								</div>
								<div class="form-group form-float float-left">
									<div class="float-left">
										<label class="form-label">Champions</label>
										<div class="material-switch float-right">
											<input name="is_champions" id="is_champions" type="checkbox" value="1" <?php echo isset($val['is_champions']) && $val['is_champions'] ? "checked='checked'" : ""; ?>>
											<label for="is_champions" class="bg-warning"></label>
										</div>
									</div>
								</div>
								<div class="form-group form-float float-left">
									<div class="float-left">
										<label class="form-label">Publish</label>
										<div class="material-switch float-right">
											<input name="is_publish" id="is_publish" type="checkbox" value="1" <?php echo isset($val['is_publish']) && $val['is_publish'] ? "checked='checked'" : ""; ?>>
											<label for="is_publish" class="bg-success"></label>
										</div>
									</div>
								</div>
								<div class="form-group float-left">
									<button type="submit" class="btn btn-success btn-sm w100">Simpan</button>
								</div>
							</div>
	                  	</div>
	                </form>
                </div>
          	</div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/js/editor.js"></script>
<script>
	$(document).ready(function(){
		$('#title').keyup(function(){
			var text 	= $(this).val();
			var input 	= text.toLowerCase().replace(/ /g, '-');
			$('#slug').val(input);
		});
		$('#title_eng').keyup(function(){
			var text 	= $(this).val();
			var input 	= text.toLowerCase().replace(/ /g, '-');
			$('#slug_eng').val(input);
		});
	});
</script>