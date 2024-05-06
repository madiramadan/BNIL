<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card" style="background:white;">
        	<div class="col-md-12 p-b-20 text-red"><a class="text-white btn btn-success" href="<?php echo site_url($filez.'/'.$functionz.'_detail/0');?>">Add New <?php echo $labelz;?></a></div>
        	<div class="card-body p-0">
          	<form id="form_dt" method="POST" action="<?php echo site_url('admin/admin_hapus');?>">
          		<table id="table-edit" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th width="20">No</th>
										<th>Nama</th>
                    <th>Role</th>
                    <th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</form>
          </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/js/datatables-net/datatables.min.js"></script>
<link href="<?php echo base_url();?>assets/css/datatables-net.min.css" rel="stylesheet" type="text/css" />
<script>
var table;
$(document).ready(function() {
  //datatables
  table = $('#table-edit').DataTable({
      //"scrollY": "970px",
      "order" : [],
      "searching": true,
      "info": false,
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "scrollX" : true,
      "lengthChange": true,
      "lengthMenu": [[10, 50, 100], [10, 50, 100]],
      "language": {
      	"search": "Cari",
      },
      "columnDefs" : [
        //{orderable: false, targets: [ 2,5,9,11,12,13,14 ] }
        {orderable: false, targets: [ 0,2,3 ] }
      ],
      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('admin/admin_list/');?>",
          "type": "POST"
      },
  });
  
  $('#table-edit').on('click', '.akt', function () {
  	var rel = $(this).attr("rel");
		var zz = $(this).attr("zz");
		var lbl;
		if(zz==2) lbl="Menghapus";
		else if(zz==3) lbl="Kembalikan";
		else if(zz==0) lbl="Aktifkan";
		else lbl="Non-Aktifkan";
		if(confirm('Anda yakin '+lbl+' user ini?')) {
			$.post("<?php echo site_url('admin/admin_aktif');?>", {idz : rel, akt : zz},  function(response) {
				window.location="<?php echo site_url('admin/main');?>";
			});
		} else return false;
	});
	$(".del_button").click(function(){
		var numItems = $('.chk:checked').length;
		if(numItems > 0) {
			if(confirm('Anda yakin menghapus user ini?')) {
				$("#form_dt").submit();
			}
		}
	});
	$(".res_button").click(function(){
		var numItems = $('.chk:checked').length;
		if(numItems > 0) {
			if(confirm('Anda yakin kembalikan user ini?')) {
				$("#form_dt").submit();
			}
		}
	});
	$('#table-edit').on('click', '.chk', function () {
		var numItems = $('.chk:checked').length;
		$(".jum_del").html(numItems);
	});
});

$('.chk_all').click(function () {
	if($(this).prop("checked")) {
		$(".chk").prop("checked", true);
		var numItems = $('.chk:checked').length;
		$(".jum_del").html(numItems);
	} else {
		$(".chk").prop("checked", false);
		$(".jum_del").html(0);
	}
});
</script>