<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              <div class="card-box">
              	<div class="col-md-12 p-b-20 text-yellow"><b><a class="text-red" href="<?php echo site_url('admin');?>">Kembali List User</a></b></div>
                	<form class="form-material" method="POST" action="<?php echo site_url('admin/import');?>" enctype="multipart/form-data">
										<input type="hidden" name="id" value="1">
	                	<div class="row">
	                		<div class="col-md-12">
	                			<h5>Import User<br><br></h5>
	                		</div>
	                		<div class="col-md-3">
	                			<div class="form-group form-float">
                          <div class="form-line">
                          	<input type="file" accept=".xls, .xlsx" name="file" class="form-control">
                          </div>
                        </div>
	                    </div>
	                    <div class="col-md-9">
	                    	<button type="submit" class="btn btn-warning btn-sm float-left width-100">Import</button>
	                    </div>
	                    <div class="col-md-3" style="font-size:12px;height:350px;overflow:auto;"><?php echo $rdd;?></div>
	                  </div>
	                </form>
                </div>
          </div>
        </div>
    </div>
</div>