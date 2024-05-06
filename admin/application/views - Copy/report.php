<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
        		<div class="col-md-12 p-b-20 text-yellow"><b><a class="text-red" href="<?php echo site_url('survei/report_export/'.$id_survei);?>">Export to Excel</a>
        			<!--| <a class="text-red" href="<?php echo site_url('survei/report_export_full/'.$id_survei);?>">Full Export</a>-->
        			| <a class="text-red" href="<?php echo site_url('survei');?>">Kembali ke Survei</a>
        		</b></div>
        	<div class="card-body p-0">
          	<form id="form_dt" method="POST" action="<?php echo site_url('survei/survei_rdd_hapus');?>">
          		<input type="hidden" name="del_res" value="<?php echo $trash;?>">
              <table id="table-edit" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th width="20">No</th>
										<th>Nama Responden</th>
                    <th>Tanggal</th>
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
var trash="<?php echo $trash;?>";
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
      "lengthsurvei": [[10, 50, 100], [10, 50, 100]],
      "language": {
      	"search": "Cari",
      },
      "columnDefs" : [
        {orderable: false, targets: [ 0,2 ] }
      ],
      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('survei/report_list/'.$id_survei);?>",
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
		if(confirm('Anda yakin '+lbl+' kategori survei ini?')) {
			$.post("<?php echo site_url('survei/survei_rdd_aktif');?>", {idz : rel, akt : zz},  function(response) {
				window.location="<?php echo site_url('survei/main');?>";
			});
		} else return false;
	});
	$(".del_button").click(function(){
		var numItems = $('.chk:checked').length;
		if(numItems > 0) {
			if(confirm('Anda yakin menghapus survei ini?')) {
				$("#form_dt").submit();
			}
		}
	});
	$(".res_button").click(function(){
		var numItems = $('.chk:checked').length;
		if(numItems > 0) {
			if(confirm('Anda yakin kembalikan survei ini?')) {
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