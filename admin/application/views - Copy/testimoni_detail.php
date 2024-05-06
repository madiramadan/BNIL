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
						                              <input name="title" class="form-control" value="<?php echo isset($val['title']) ? $val['title'] : "";?>">
						                              <label class="form-label">Nama</label>
						                            </div>
						                        	</div>
						                        	<div class="form-group form-float">
						                            <div class="form-line">
						                              <input name="headline" class="form-control" value="<?php echo isset($val['headline']) ? $val['headline'] : "";?>">
						                              <label class="form-label">Pekerjaan & Umur</label>
						                            </div>
						                        	</div>
						                        	<div class="form-group form-float">
							                          <div>
							                            <label class="form-label">Testi</label>
							                            <textarea rows="20" id="editor1" name="contents"><?php echo isset($val['contents']) ? $val['contents'] : "";?></textarea>
							                          </div>
							                        </div>
			                            </div>
			                            <!-- TAB ENGLISH -->
			                            <div class="tab-pane fade" id="w2-tab2" role="tabpanel" aria-labelledby="w2-tab2">
			                                <div class="form-group form-float">
							                            <div class="form-line">
							                              <input name="title_eng" class="form-control" value="<?php echo isset($val['title_eng']) ? $val['title_eng'] : "";?>">
							                              <label class="form-label">Name</label>
							                            </div>
							                        </div>
								                      <div class="form-group form-float">
						                            <div class="form-line">
						                              <input name="headline_eng" class="form-control" value="<?php echo isset($val['headline_eng']) ? $val['headline_eng'] : "";?>">
						                              <label class="form-label">Job & Age</label>
						                            </div>
						                        	</div>
						                        	<div class="form-group form-float">
							                          <div>
							                            <label class="form-label">Testimoni</label>
							                            <textarea rows="20" id="editor2" name="contents_eng"><?php echo isset($val['contents_eng']) ? $val['contents_eng'] : "";?></textarea>
							                          </div>
							                        </div>
			                            </div>
			                        </div>
				                    </div>
				                    <div class="title-box">Image</div>
				                    <div class="form-group form-float">
							            		<div>
		                            <input type="file" name="file" accept="image/*" class="form-control">
		                            <?php
		                            if(isset($val['file'])) {
		                            	if(file_exists("../uploads/".$val['file']) && $val['file']) echo "<br><img src='".str_replace("admin","",base_url())."uploads/".$val['file']."' style='max-height:150px;'>";
		                            }
		                            ?>
		                          </div>
		                        </div>
		                        <div class="title-box">Image Mobile</div>
				                    <div class="form-group form-float">
							            		<div>
		                            <input type="file" name="file_mobile" accept="image/*" class="form-control">
		                            <?php
		                            if(isset($val['file_mobile'])) {
		                            	if(file_exists("../uploads/".$val['file_mobile']) && $val['file_mobile']) echo "<br><img src='".str_replace("admin","",base_url())."uploads/".$val['file_mobile']."' style='max-height:150px;'>";
		                            }
		                            ?>
		                          </div>
		                        </div>
				                </div>
					            </div>
					            <div class="col-md-3 box-content box-content-kanan">
                        <div class="form-group form-float">
					            		<div>
                            <label class="form-label">Order</label>
                            <?php
                            $opt_urut=array();
                            $jum_testimoni=GetAll("testimoni",array("is_delete"=> "where/0"))->num_rows();
                            if($id==0) $jum_testimoni++;
                            for($i=1;$i<=$jum_testimoni;$i++) {
                            	$opt_urut[$i] = $i;
                            }
                            echo form_dropdown("urutan",$opt_urut,isset($val['urutan']) ? $val['urutan'] : $jum_testimoni,"class='form-control'");
                            ?>
                          </div>
                        </div>
                        <div class="form-group form-float">
					            		<div>
                            <label class="form-label">Background Color</label>
                            <div class="head_warna" style="border:1px solid #ddd;width:60px;height:10px;margin-bottom:10px;background:<?php echo isset($val['warna_head']) ? $val['warna_head'] : "#F15922";?>"></div>
                            <select class="form-control warna" name="warna_head">
                              <option value="#F15922" <?php echo isset($val['warna_head']) && $val['warna_head']=="#F15922" ? "selected" : "";?>>Orange</option>
                              <option value="#F7941D" <?php echo isset($val['warna_head']) && $val['warna_head']=="#F7941D" ? "selected" : "";?>>Light Orange</option>
                              <option value="#01AAAD" <?php echo isset($val['warna_head']) && $val['warna_head']=="#01AAAD" ? "selected" : "";?>>Magenta</option>
                              <option value="#006785" <?php echo isset($val['warna_head']) && $val['warna_head']=="#006785" ? "selected" : "";?>>Tosca</option>
                              <option value="#99D7DB" <?php echo isset($val['warna_head']) && $val['warna_head']=="#99D7DB" ? "selected" : "";?>>Light Blue</option>
                              <option value="#006785" <?php echo isset($val['warna_head']) && $val['warna_head']=="#006785" ? "selected" : "";?>>Dark Blue</option>
                              <option value="#f7f7f7" <?php echo isset($val['warna_head']) && $val['warna_head']=="#f7f7f7" ? "selected" : "";?>>Light Grey</option>
                              <option value="#9B9B9B" <?php echo isset($val['warna_head']) && $val['warna_head']=="#9B9B9B" ? "selected" : "";?>>Gray</option>
                              <option value="#4a4a4a" <?php echo isset($val['warna_head']) && $val['warna_head']=="#4a4a4a" ? "selected" : "";?>>Dark Grey</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group form-float">
					            		<div>
                            <label class="form-label">Caption Color</label>
                            <div class="cap_warna" style="border:1px solid #ddd;width:60px;height:10px;margin-bottom:10px;background:<?php echo isset($val['warna_caption']) ? $val['warna_caption'] : "#F15922";?>"></div>
                            <select class="form-control warna_cap" name="warna_caption">
                              <option value="#F15922" <?php echo isset($val['warna_caption']) && $val['warna_caption']=="#F15922" ? "selected" : "";?>>Orange</option>
                              <option value="#F7941D" <?php echo isset($val['warna_caption']) && $val['warna_caption']=="#F7941D" ? "selected" : "";?>>Light Orange</option>
                              <option value="#01AAAD" <?php echo isset($val['warna_caption']) && $val['warna_caption']=="#01AAAD" ? "selected" : "";?>>Magenta</option>
                              <option value="#006785" <?php echo isset($val['warna_caption']) && $val['warna_caption']=="#006785" ? "selected" : "";?>>Tosca</option>
                              <option value="#99D7DB" <?php echo isset($val['warna_caption']) && $val['warna_caption']=="#99D7DB" ? "selected" : "";?>>Light Blue</option>
                              <option value="#006785" <?php echo isset($val['warna_caption']) && $val['warna_caption']=="#006785" ? "selected" : "";?>>Dark Blue</option>
                              <option value="#f7f7f7" <?php echo isset($val['warna_caption']) && $val['warna_caption']=="#f7f7f7" ? "selected" : "";?>>Light Grey</option>
                              <option value="#9B9B9B" <?php echo isset($val['warna_caption']) && $val['warna_caption']=="#9B9B9B" ? "selected" : "";?>>Gray</option>
                              <option value="#4a4a4a" <?php echo isset($val['warna_caption']) && $val['warna_caption']=="#4a4a4a" ? "selected" : "";?>>Dark Grey</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group form-float">
					            		<div class="form-line">
                            <input name="link" class="form-control" value="<?php echo isset($val['link']) ? $val['link'] : "";?>">
                            <label class="form-label">Link URL (Redirect)</label>
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
<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets/js/editor.js"></script>
<script>
$(".warna").change(function(){
	$(".head_warna").css("background",$(this).val());
});
$(".warna_cap").change(function(){
	$(".cap_warna").css("background",$(this).val());
});
</script>