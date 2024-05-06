<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="col-md-6 p-b-20" style="float:left;">
      		<i class="icon icon-timelapse"></i>
      		<?php
      		for($i=2020;$i<=date("Y");$i++) {
      			$opt[$i] = $i;
      		}
      		$s_tahun = $this->session->userdata("c_tahun");
      		echo form_dropdown("s_tahun",$opt,isset($s_tahun) ? $s_tahun : date("Y"), "class='ganti_tahun'");
        	?>
        </div>
      	<?php if(!$trash) {?>
      		<div class="col-md-6 p-b-20 text-red" style="float:right;text-align:right;"><a class="text-red" href="<?php echo site_url('user/user_detail/0');?>">+ Tambah User</a> | <a class="text-red" href="<?php echo site_url('user/main/1');?>">Tempat Sampah</a></div>
      	<?php }?>
      	<div style="clear:both;"></div>
       	<div class="card">
        	<div class="card-body p-0">
          	<form id="form_dt" method="POST" action="<?php echo site_url('user/user_hapus');?>">
          		<input type="hidden" name="del_res" value="<?php echo $trash;?>">
              <table id="table-edit" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th width="20"><input type="checkbox" class="chk_all"></th>
										<th>Nama</th>
                    <th>Email</th>
                    <th>No WA</th>
                    <th>Tanggal Daftar</th>
                    <th>Aktif</th>
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
      "lengthMenu": [[10, 50, 100], [10, 50, 100]],
      "language": {
      	"search": "Cari",
      },
      "columnDefs" : [
        {orderable: false, targets: [ 0,6 ] }
      ],
      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('user/user_list/'.$trash);?>",
          "type": "POST"
      },
  });
  $(".ganti_tahun").change(function(){
  	var rel = $(this).val();
  	table.ajax.url("<?php echo site_url('user/user_list/'.$trash.'/"+rel+"');?>");
  	table.ajax.reload();
  });
  /*setInterval( function () {
	    table.ajax.reload();
	}, 5000 );*/
  if(trash==1) $(".dataTables_length").html("<div><span class='jum_del'>0</span> user dipilih&nbsp;&nbsp;&nbsp;<span class='res_button text-red pointer'><i class='icon icon-restore'></i> Kembalikan</span>&nbsp;&nbsp;&nbsp;<span class='del_permanen text-red pointer'><i class='icon icon-trash'></i> Hapus</span></div>");
  else $(".dataTables_length").html("<div><span class='jum_del'>0</span> user dipilih&nbsp;&nbsp;&nbsp;<span class='del_button text-red pointer'><i class='icon icon-trash'></i> Hapus</span>&nbsp;&nbsp;&nbsp;<span class='akt_button text-red pointer'><i class='icon icon-check-circle'></i> Aktifkan</span></div>");
  $('#table-edit').on('click', '.akt', function () {
  	var rel = $(this).attr("rel");
		var zz = $(this).attr("zz");
		var lbl;
		if(zz==5) lbl="mengirim email aktivasi untuk";
		else if(zz==2) lbl="Menghapus";
		else if(zz==4) lbl="Menghapus Permanen";
		else if(zz==3) lbl="Kembalikan";
		else if(zz==0) lbl="Aktifkan";
		else lbl="Non-Aktifkan";
		if(confirm('Anda yakin '+lbl+' user ini?')) {
			$.post("<?php echo site_url('user/user_aktif');?>", {idz : rel, akt : zz},  function(response) {
				window.location="<?php echo site_url('user/main');?>";
			});
		} else return false;
	});
	$(".del_button").click(function(){
		var numItems = $('.chk:checked').length;
		if(numItems > 0) {
			if(confirm('Anda yakin menghapus user ini?')) {
				$("#form_dt").attr("action", "<?php echo site_url('user/user_hapus');?>");
				$("#form_dt").submit();
			}
		}
	});
	$(".akt_button").click(function(){
		var numItems = $('.chk:checked').length;
		if(numItems > 0) {
			if(confirm('Anda yakin mengaktifkan user ini?')) {
				$("#form_dt").attr("action", "<?php echo site_url('user/user_akt');?>");
				$("#form_dt").submit();
			}
		}
	});
	$(".res_button").click(function(){
		var numItems = $('.chk:checked').length;
		if(numItems > 0) {
			if(confirm('Anda yakin kembalikan user ini?')) {
				$("#form_dt").attr("action", "<?php echo site_url('user/user_hapus');?>");
				$("#form_dt").submit();
			}
		}
	});
	$(".del_permanen").click(function(){
		var numItems = $('.chk:checked').length;
		if(numItems > 0) {
			if(confirm('Anda yakin menghapus permanen user ini?')) {
				$("#form_dt").attr("action", "<?php echo site_url('user/user_hapus_permanen');?>");
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