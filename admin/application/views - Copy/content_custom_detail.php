<?php
$template=array("","2","3");
?>
<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              <div class="card-box">
                	<form class="form-material" method="POST" action="<?php echo site_url('content_custom/content_custom_add');?>" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $id;?>">
	                	<div class="row">
	                		<div class="col-md-8 box-content">
					                <div class="no-b">
					                	<div class="form-group form-float">
							            		<div>
							            			<br>
		                            <label class="form-label">Template Pages</label>
		                            <select class="form-control template_nm" name="nm_template">
		                              <option value="1" <?php echo isset($nm_template) && $nm_template==1 ? "selected" : "";?>>Template 1</option>
		                              <option value="2" <?php echo isset($nm_template) && $nm_template==2 ? "selected" : "";?>>Template 2</option>
		                              <option value="3" <?php echo isset($nm_template) && $nm_template==3 ? "selected" : "";?>>Template 3</option>
		                            </select>
		                          </div>
		                        </div>
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
							                        	<?php 
													            	foreach($template as $tem) {
													            		if($tem <= $nm_template) {?>
									                        	<div class="form-group form-float">
										                          <div>
										                            <label class="form-label">Caption <?php echo $tem;?></label>
										                            <textarea rows="3" name="headline<?php echo $tem;?>" class="form-control areatext"><?php echo isset($val['headline'.$tem]) ? $val['headline'.$tem] : "";?></textarea>
										                          </div>
										                        </div>
										                       <?php }
										                    }?>
								                        <div class="form-group form-float">
								                          <div>
								                            <label class="form-label">Content</label>
								                            <textarea rows="30" id="editor1" name="contents"><?php echo isset($val['contents']) ? $val['contents'] : "";?></textarea>
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
									                      <?php 
													            	foreach($template as $tem) {
													            		if($tem <= $nm_template) {?>
									                        	<div class="form-group form-float">
										                          <div>
										                            <label class="form-label">Caption <?php echo $tem;?> (English)</label>
										                            <textarea rows="3" name="headline_eng<?php echo $tem;?>" class="form-control areatext"><?php echo isset($val['headline_eng'.$tem]) ? $val['headline_eng'.$tem] : "";?></textarea>
										                          </div>
										                        </div>
										                       <?php }
										                    }?>
								                        <div class="form-group form-float">
								                          <div>
								                            <label class="form-label">Content (English)</label>
								                            <textarea rows="30" id="editor2" name="contents_eng"><?php echo isset($val['contents_eng']) ? $val['contents_eng'] : "";?></textarea>
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
					            	<?php 
					            	foreach($template as $tem) {
					            		if($tem <= $nm_template) {?>
							            	<div class="form-group form-float">
							            		<div>
		                            <label class="form-label">Image <?php echo $tem;?></label>
		                            <input type="file" name="file<?php echo $tem;?>" accept="image/*" class="form-control">
		                            <?php
		                            if(isset($val['file'.$tem])) {
		                            	if(file_exists("../uploads/".$val['file'.$tem]) && $val['file'.$tem]) echo "<br><img src='".str_replace("admin","",base_url())."uploads/".$val['file'.$tem]."' style='max-height:150px;'>";
		                            }
		                            ?>
		                          </div>
		                        </div>
                      	<?php }
                      	}?>
                        <?php 
					            	foreach($template as $tem) {
					            		if($tem <= $nm_template) {?>
					            			<div class="form-group form-float">
							            		<div>
		                            <label class="form-label">Image Mobile <?php echo $tem;?></label>
		                            <input type="file" name="file_mobile<?php echo $tem;?>" accept="image/*" class="form-control">
		                            <?php
		                            if(isset($val['file_mobile'.$tem])) {
		                            	if(file_exists("../uploads/".$val['file_mobile'.$tem]) && $val['file_mobile'.$tem]) echo "<br><img src='".str_replace("admin","",base_url())."uploads/".$val['file_mobile'.$tem]."' style='max-height:150px;'>";
		                            }
		                            ?>
		                          </div>
		                        </div>
		                    <?php }
                      	}?>
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
<script src="<?php echo base_url();?>assets/js/editor.js"></script>
<script>
$(".template_nm").change(function(){
	window.location="<?php echo site_url('content_custom/custom_template/'.$id.'/"+$(this).val()+"');?>";
});
</script>