<table id="table-edit" class="display" style="width:100%">
	<thead>
		<tr>
			<th width="20">No</th>
			<th>Title</th>
			<th>Publish Date</th>
      <th>Status</th>
      <th>Action</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>


<link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/datatables-net.min.css" rel="stylesheet" type="text/css" />

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
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
      "rowReorder": true,
      "columnDefs" : [
        {orderable: false, targets: [ 0,4 ] }
      ],
      "ajax": {
          "url": "<?php echo site_url($filez.'/'.$functionz.'_list/');?>",
          "type": "POST"
      },
  });
  $('#table-edit').on('click', '.akt', function () {
  	var rel = $(this).attr("rel");
		var zz = $(this).attr("zz");
		var lbl;
		if(zz==2) lbl="Delete";
		else lbl="";
		if(confirm('Are your sure '+lbl+' ?')) {
			$.post("<?php echo site_url($filez.'/'.$functionz.'_aktif');?>", {idz : rel, akt : zz},  function(response) {
				window.location="<?php echo site_url($filez.'/main');?>";
			});
		} else return false;
	});
});
</script>