<!--<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>-->
<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              <div class="card-box">
                	<form class="form-material" method="POST" action="<?php echo site_url('content/content_add');?>" enctype="multipart/form-data">
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
							                              <input name="title" class="form-control" value="<?php echo isset($val['title']) ? $val['title'] : "";?>">
							                              <label class="form-label">Title</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group form-float">
								                          <div>
								                            <label class="form-label">Caption</label>
								                            <textarea rows="3" name="headline" class="form-control areatext"><?php echo isset($val['headline']) ? $val['headline'] : "";?></textarea>
								                          </div>
								                        </div>
								                        <div class="form-group form-float">
								                          <div>
								                            <label class="form-label">Content</label>
								                            <textarea rows="30" id="editor1" class="main-editor2" name="contents"><?php echo isset($val['contents']) ? $val['contents'] : "";?></textarea>
								                          </div>
								                        </div>
								                        <div class="title-box">SEO</div>
								                        <div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="seo_title" class="form-control" value="<?php echo isset($val['seo_title']) ? $val['seo_title'] : "";?>">
							                              <label class="form-label">SEO Title</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group">
								                          <div>
								                            <label class="form-label">SEO Content</label>
								                            <textarea rows="3" name="seo_desc" class="form-control areatext"><?php echo isset($val['seo_desc']) ? $val['seo_desc'] : "";?></textarea>
								                          </div>
								                        </div>
				                            </div>
				                            <!-- TAB ENGLISH -->
				                            <div class="tab-pane fade" id="w2-tab2" role="tabpanel" aria-labelledby="w2-tab2">
				                                <div class="form-group form-float">
								                            <div class="form-line">
								                              <input name="title_eng" class="form-control" value="<?php echo isset($val['title_eng']) ? $val['title_eng'] : "";?>">
								                              <label class="form-label">Title (English)</label>
								                            </div>
								                        </div>
									                      <div class="form-group form-float">
								                          <div>
								                            <label class="form-label">Caption (English)</label>
								                            <textarea rows="3" name="headline_eng" class="form-control areatext"><?php echo isset($val['headline_eng']) ? $val['headline_eng'] : "";?></textarea>
								                          </div>
								                        </div>
								                        <div class="form-group form-float">
								                          <div>
								                            <label class="form-label">Content (English)</label>
								                            <textarea rows="30" id="editor2" class="main-editor2" name="contents_eng"><?php echo isset($val['contents_eng']) ? $val['contents_eng'] : "";?></textarea>
								                          </div>
								                        </div>
								                        <div class="title-box">SEO</div>
								                        <div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="seo_title_eng" class="form-control" value="<?php echo isset($val['seo_title_eng']) ? $val['seo_title_eng'] : "";?>">
							                              <label class="form-label">SEO Title</label>
							                            </div>
							                        	</div>
							                        	<div class="form-group">
								                          <div>
								                            <label class="form-label">SEO Content</label>
								                            <textarea rows="3" name="seo_desc_eng" class="form-control areatext"><?php echo isset($val['seo_desc_eng']) ? $val['seo_desc_eng'] : "";?></textarea>
								                          </div>
								                        </div>
				                            </div>
				                        </div>
				
				                    </div>
				                </div>
					            </div>
					            <div class="col-md-3 box-content box-content-kanan">
					            	<div class="form-group form-float">
					            		<div>
                            <label class="form-label">Image</label>
                            <input type="file" name="file" accept="image/*" class="form-control">
                            <?php
                            if(isset($val['file'])) {
                            	if(file_exists("../uploads/".$val['file']) && $val['file']) echo "<br><img src='".base_url()."../uploads/".$val['file']."' style='max-height:150px;'>";
                            }
                            ?>
                          </div>
                        </div>
                        <div class="form-group form-float">
					            		<div>
                            <label class="form-label">Image Mobile</label>
                            <input type="file" name="file_mobile" accept="image/*" class="form-control">
                            <?php
                            if(isset($val['file_mobile'])) {
                            	if(file_exists("../uploads/".$val['file_mobile']) && $val['file_mobile']) echo "<br><img src='".base_url()."../uploads/".$val['file_mobile']."' style='max-height:150px;'>";
                            }
                            ?>
                          </div>
                        </div>
                        <div class="form-group form-float">
					            		<div class="form-line">
                            <input name="link" class="form-control" value="<?php echo isset($val['link']) ? $val['link'] : "";?>">
                            <label class="form-label">Link URL Redirect (Optional)</label>
                          </div>
                        </div>
					            	<div class="form-group form-float">
					            		<div class="form-line">
                            <input name="publish_date" class="date-time-picker form-control" value="<?php echo isset($val['publish_date']) ? $val['publish_date'] : date("Y-m-d H:i");?>">
                            <label class="form-label">Date Publish</label>
                          </div>
                        </div>
					            	<div class="form-group form-float float-left">
						            	<div class="float-left">
						            		Publish
							            	<div class="material-switch float-right">
			                          <input id="someSwitchOptionSuccess" name="is_publish" type="checkbox" value="1" <?php echo isset($val['is_publish']) && $val['is_publish'] ? "checked=checked" : "";?>>
			                          <label for="someSwitchOptionSuccess" class="bg-success"></label>
			                      </div>
			                    </div>
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
<!--<script src="<?php echo base_url();?>assets/js/editor.js"></script>-->
<!--<script src="https://localhost/bni_life/test/jquery.js"></script>-->
<!--<script src="<?php echo base_url();?>assets/js/editor.js"></script>-->
<script>
	$(function () {
    $('.main-editor2').froalaEditor({
  		fontSize: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '30', '36', '48', '60', '72', '96'],
        toolbarButtons: ['paragraphFormat', 'bold', 'italic', 'underline', 'strikeThrough', '|', 'fontFamily', 'fontSize', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'embedly', 'insertFile', 'insertTable', '|', 'emoticons', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'spellChecker', 'help', 'html', 'fullscreen', '|', 'undo', 'redo'],
        height: 500,
        key: 'Cc1mmF5jnnlB15hcA6gk==',
        charCounterCount: true,
		paragraphFormatSelection: true,
		imageUploadMethod:'POST',
		requestHeaders: {
			'X-CSRF-TOKEN': $('input[name="_token"]').val()
		},
		imageUploadURL: '/administrator/editor/upload',
		imageManagerDeleteMethod: 'POST',
		imageManagerDeleteURL: '/administrator/editor/delete',
		imageManagerLoadURL: '/administrator/editor/show'
    }).on('froalaEditor.image.uploaded', function (e, editor, response) {
        console.log('r',e);
	}).on('froalaEditor.image.error', function (e, editor, error, response) {
		console.log('err',error);
		console.log($($('input[name="_token"]').val()));
		// Bad link.
        // if (error.code == 1) { console.log('err',error.); }
 
        // // No link in upload response.
        // else if (error.code == 2) { ... }
 
        // // Error during image upload.
        // else if (error.code == 3) { ... }
 
        // // Parsing response failed.
        // else if (error.code == 4) { ... }
 
        // // Image too text-large.
        // else if (error.code == 5) { ... }
 
        // // Invalid image type.
        // else if (error.code == 6) { ... }
 
        // // Image can be uploaded only to same domain in IE 8 and IE 9.
        // else if (error.code == 7) { ... }
 
        // Response contains the original server response to the request if available.
      });

    $('.light-editor').froalaEditor({
        toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', '|', 'align', 'formatOL', 'formatUL', 'outdent', '|', 'insertLink', 'insertImage', 'insertTable', 'undo', 'redo', 'html'],
        key: 'Cc1mmF5jnnlB15hcA6gk=='
    });
    
    $(".fr-wrapper div").hide();
    $(".fr-view").show();

});
</script>