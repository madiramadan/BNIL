<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card" style="background:#fff;">
        	<div class="card-body p-0">
              <div class="card-box">
              	<div class="col-md-12 p-b-20 text-yellow" style="padding-left:0px;"><b><a class="text-white btn btn-primary" href="<?php echo site_url('blog');?>">Back to Life Blog</a></b></div>
                	<form class="form-material" method="POST" action="<?php echo site_url('blog/blog_import');?>" enctype="multipart/form-data">
										<input type="hidden" name="id" value="1">
	                	<div class="row">
	                		<div class="col-md-12" style="border-bottom:1px solid #ddd;padding-bottom:10px;">
	                			<h5>Import Life Blog<br></h5>
	                		</div>
	                		<div class="col-md-4">
	                			<div style="padding-top:15px;">
	                				<div class="row">
				                    <div class="col-md-8">
				                			<div class="form-group form-float">
			                          <input type="file" accept=".xls, .xlsx" name="file" class="form-control">
			                          <a href="<?php echo base_url()."uploads/template_life_blog.xlsx";?>">Download Template</a>
			                        </div>
				                    </div>
				                    <div class="col-md-2">
				                    	<button type="submit" class="btn btn-success btn-sm width-100">Import</button>
				                    </div>
				                  </div>
				                  <div style="font-size:12px;"><?php echo $msg;?></div>
				                </div>
		                  </div>
	                  </div>
	                </form>
                </div>
          </div>
        </div>
    </div>
</div>