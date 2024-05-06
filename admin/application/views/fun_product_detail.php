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
											<div class="form-line">
												<input name="title" class="form-control" value="<?php echo isset($val['title']) ? $val['title'] : "";?>">
												<label class="form-label">Title</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form">
												<label class="form-label">Content</label>
												<textarea name="content" id="editor1" class="form-control"><?php echo isset($val['content']) ? $val['content'] : "";?></textarea>
											</div>
										</div>
									</div>
				                </div>
							</div>
							<div class="col-md-3 box-content box-content-kanan">
								<div class="form-group form-float">
									<div class="form-line">
										<input name="column_nab" class="form-control" value="<?php echo isset($val['column_nab']) ? $val['column_nab'] : "";?>">
										<label class="form-label">Column Nab</label>
									</div>
								</div>
								<div class="form-group float-left">
									<label class="form-label">Category</label>
									<select name="id_category" id="id_category" class="form-control">
										<?php foreach ($category as $c) { 
											
													$anaknya = GetAll('fun_product_cat', array('is_delete'=>'where/0','id_parent'=>'where/'.$c['id']))->result_array();
											?>
											
											<optgroup label="<?php echo $c['title']; ?>">
											<?php foreach ($anaknya as $as) { 
											
											?>
											
											<option value="<?php echo $as['id']; ?>" <?php echo isset($val['id_category']) && $val['id_category'] == $as['id'] ? 'selected' : ''; ?> ><?php echo $as['title']; ?></option>

											<?php }?>
											<!--
											<?php
											if(!$c['id_parent']){ ?>
											<optgroup label="<?php echo $c['title']; ?>">
											<?php } else { ?>
												<option value="<?php echo $c['id']; ?>" <?php echo isset($val['id_category']) && $val['id_category'] == $c['id'] ? 'selected' : ''; ?> ><?php echo $c['title']; ?></option>
											<?php } ?>-->
											</optgroup>
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