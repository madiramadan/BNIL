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
														<input name="slug" id="slug" class="form-control" value="<?php echo isset($val['slug']) ? $val['slug'] : "";?>">
													</div>
												</div>
												<div class="form-group form-float">
													<div>
														<label class="form-label">Content</label>
														<textarea rows="30" id="editor1" name="contents"><?php echo isset($val['contents']) ? $val['contents'] : "";?></textarea>
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
														<input name="slug_eng" id="slug_eng" class="form-control" value="<?php echo isset($val['slug_eng']) ? $val['slug_eng'] : "";?>">
													</div>
												</div>
												<div class="form-group form-float">
													<div>
														<label class="form-label">Contents (English)</label>
														<textarea rows="30" id="editor2" name="contents_eng"><?php echo isset($val['contents_eng']) ? $val['contents_eng'] : "";?></textarea>
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
                            			<input name="closed_date" class="date-time-picker form-control" value="<?php echo isset($val['closed_date']) ? $val['closed_date'] : date("Y-m-d H:i:s");?>">
                            			<label class="form-label">Closed Date</label>
                          			</div>
                        		</div>
                        		<div class="form-group form-float">
									<div class="form-line">
                            			<input name="kode" class="form-control" value="<?php echo isset($val['kode']) ? $val['kode'] : "";?>">
                            			<label class="form-label">Kode</label>
                          			</div>
                        		</div>
                        		<div class="form-group form-float">
									<div class="">
                            			<label class="form-label">Category</label>
                            			<select name="id_category" class="form-control">
											<?php foreach ($category as $c) { ?>
												<option value="<?php echo $c['id']; ?>" <?php echo $val['id_category'] == $c['id'] ? 'selected' : ''; ?> ><?php echo $c['career_category']; ?></option>
											<?php } ?>
										</select>
                          			</div>
                        		</div>
                        		<div class="form-group form-float">
									<div class="">
                            			<label class="form-label">Level</label>
                            			<select name="id_level" class="form-control">
											<?php foreach ($level as $l) { ?>
												<option value="<?php echo $l['id']; ?>" <?php echo isset($val['id_level']) == $l['id'] ? 'selected' : ''; ?> ><?php echo $l['career_level']; ?></option>
											<?php } ?>
										</select>
                          			</div>
                        		</div>
                        		<div class="form-group form-float">
									<div class="">
                            			<label class="form-label">Cities</label>
                            			<select name="cities" class="form-control">
											<option value="">Cities</option>
											<?php
											//$q = GetAll("contact_view",array("nama"=> "group"));
											$q = $this->db->query("select id_province, nama, province from kg_contact_view where 1=1 GROUP BY id_province, nama, province ORDER BY province asc");
											foreach($q->result_array() as $r) {
												if($val['cities']==$r['nama']) echo "<option value='".$r['nama']."' selected>".$r['nama']."</option>";
												else echo "<option value='".$r['nama']."'>".$r['nama']."</option>";
											}
											?>
										</select>
                          			</div>
                        		</div>
                        		<div class="form-group form-float">
									<div class="form-line">
                            			<input name="salary_range" class="form-control" value="<?php echo isset($val['salary_range']) ? $val['salary_range'] : "";?>">
                            			<label class="form-label">Salary Range</label>
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