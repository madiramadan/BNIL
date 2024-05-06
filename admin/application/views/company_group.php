<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        	<div class="card-body p-0">
              	<div class="card-box">
                	<div class="row">
						&nbsp; &nbsp; &nbsp; &nbsp; 
                		<div class="col-md-5 box-content">
							<div class="no-b">
        						<form class="form-material" method="POST" action="<?php echo site_url($filez.'/'.$functionz.'_add');?>" enctype="multipart/form-data">
				                    <div class="no-p card-body-tab">
				                    	<div class="title-box">Add New</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="nama" class="form-control">
												<label class="form-label">Name</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="link" class="form-control">
												<label class="form-label">Link</label>
											</div>
										</div>
										<div class="form-group form-float">
											<div class="form-line">
												<input name="title_image" class="form-control">
												<label class="form-label">Title Image</label>
											</div>
										</div>
										<div class="form-group form-float">
											<label class="form-label">Image</label>
											<div>
												<input type="file" name="image" class="form-control">
												<span class="badge badge-danger" style="margin-top: 10px;">*File harus berformat JPG, JPEG, atau PNG<span>
											</div>
										</div>
										<div class="form-group form-float float-left">
											<div class="float-left">
												<label class="form-label">Publish</label>
												<div class="material-switch float-right">
													<input id="someSwitchOptionSuccess" name="is_publish" type="checkbox" value="1" >
													<label for="someSwitchOptionSuccess" class="bg-success"></label>
												</div>
											</div>
										</div>
										<div class="form-group float-left">
											<button type="submit" class="btn btn-success btn-sm">Submit</button>
										</div>
				                    </div>
            					</form>
							</div>
                  		</div>
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
						<div class="col-md-6 box-content">
							<div class="no-b">
								<form action="<?php echo site_url($filez.'/update_sort'); ?>" method="POST">
				                    <div class="no-p card-body-tab">
				                    	<div class="title-box">Company Group</div>
										<label class="form-label">Drag each item into the order you prefer. Click the arrow on the right of item to reveal additional configuration options.</label>
										<ul id="sortable" class="timeline">
											<?php foreach ($record as $r) { ?>
											<li data-id="<?php echo $r['id']; ?>" data-order="<?php echo $r['urutan']; ?>">
												<i class="ion icon-th-list grey"></i>
												<div class="timeline-item card">
													<div>
														<span ><?php echo $r['nama']; ?></span>
														<span class="float-right">
															<a href="<?php echo site_url($filez.'/'.$functionz.'_detail/'.$r['id']); ?>" class="btn btn-warning btn-sm" title="Edit"><span class="icon icon-pencil"></span></a> &nbsp;
															<a href="javascript:;" class="btn btn-danger btn-sm akt" rel='<?php echo $r['id']; ?>' zz='2' title="Hapus"><span class="icon icon-trash"></span></a>
														</span>
													</div>
												</div>
											</li>
											<?php } ?>
										</ul>
				                    </div>
								</form>
							</div>
                  		</div>
					</div>
                </div>
          	</div>
        </div>
    </div>
</div>
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
	$(document).ready(function(){
		$("#sortable").sortable({
			update : function(event, ui){
				$(this).children().each(function(index){
					if($(this).attr('data-order') != (index + 1)){
						$(this).attr('data-order',(index + 1)).addClass('updated');
					}
				});
				updateOrder();
			}
		});
	});

	function updateOrder(){
		var order = [];
		$('.updated').each(function(){
			order.push([$(this).attr('data-id'),$(this).attr('data-order')]);
			$(this).removeClass('updated');
		});

		$.ajax({
			url 		: $('#base_url').val()+'company_group/update_sort',
			method 		: 'POST',
			dataType 	: 'text',
			data 		: {
				update 	: 1,
				order 	: order 
			}, success	: function(r){
				console.log(r);
			}
		});
	}
	$(document).on('click', '.akt', function () {
        var rel = $(this).attr("rel");
        var zz  = $(this).attr("zz");
        var lbl = "";
        if (zz==2) lbl = "Delete";
        else lbl       = "";
        if(confirm('Are your sure '+lbl+' ?')) {
            $.post("<?php echo site_url($filez.'/'.$functionz.'_aktif');?>", {
                idz : rel, 
                akt : zz
            }, function(response) {
                window.location = "<?php echo site_url($filez.'/main');?>";
            });
        } else return false;
    });
</script>