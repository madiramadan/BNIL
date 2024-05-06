<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              	<div class="card-box">
                	<form class="form-material" method="POST" action="<?php echo site_url($filez.'/'.$functionz.'_save');?>" enctype="multipart/form-data">
						<input type="hidden" name="id_faq" value="<?php echo $id_faq; ?>">
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
													<div class="form-group form-float" style="padding-top: 18px;">
														<div class="form">
															<label class="form-label">Question</label>
															<textarea name="question" class="form-control"><?php echo isset($val['question']) ? $val['question'] : "";?></textarea>
														</div>
														<div class="form">
															<label class="form-label">Answer</label>
															<textarea name="answer" class="form-control" id="editor1"><?php echo isset($val['answer']) ? $val['answer'] : "";?></textarea>
														</div>
													</div>
												</div>
											</div>
											<!-- TAB ENGLISH -->
				                            <div class="tab-pane fade show" id="w2-tab2" role="tabpane2" aria-labelledby="w2-tab2">
												<div class="card-headerd white">
													<div class="form-group form-float" style="padding-top: 18px;">
														<div class="form">
															<label class="form-label">Question (English)</label>
															<textarea name="question_eng" class="form-control"><?php echo isset($val['question_eng']) ? $val['question_eng'] : "";?></textarea>
														</div>
														<div class="form">
															<label class="form-label">Answer (English)</label>
															<textarea name="answer_eng" class="form-control" id="editor2"><?php echo isset($val['answer_eng']) ? $val['answer_eng'] : "";?></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
				                </div>
							</div>
							<div class="col-md-3 box-content box-content-kanan">
								<div class="form-group form-float">
									<div class="form">
										<label class="form-label">Order</label>
										<select name="urutan" id="" class="form-control">
											<?php for($i=1; $i <= 12; $i++){ ?>
												<option value="<?php echo $i; ?>" <?php echo isset($val['urutan']) && $val['urutan'] == $i ? 'selected' : ''; ?> ><?php echo $i; ?></option>
											<?php } ?>
										</select>
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