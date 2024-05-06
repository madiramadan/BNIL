<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card" style="background:white;">
        	<form id="report" style="width:100%;margin-left:15px;" method="POST" action="<?php echo site_url('lead_form/main');?>">
    				<div class="col-md-12" style="padding:0px;">
    					<div class="row">
        				<div class="col-md-3">
          				<div class="form-group input-group">
                    <label style="text-align:left;width:100%;">Tanggal</label>
                    <input style="margin-right:20px;font-size:14px;" class="form-control date-time-picker" data-options='{"timepicker":false, "format":"Y-m-d"}' type="text" placeholder="Tanggal Awal" name="t_awal" value="<?php echo $t_awal;?>"/> 
                    <input style="margin-right:10px;font-size:14px;" class="form-control date-time-picker" data-options='{"timepicker":false, "format":"Y-m-d"}' type="text" placeholder="Tanggal Akhir" name="t_akhir" value="<?php echo $t_akhir;?>"/>
                  </div>
                </div>
                <div class="col-md-2 seriz">
          				<div class="form-group">
                    <label style="text-align:left;width:100%;">Kategori</label>
                    <?php
                    if(GetUserGrup()==2) $opt_seri=array("2"=> "Produk Individu");
                    else if(GetUserGrup()==3) $opt_seri=array("2"=> "Produk Individu");
                    else if(GetUserGrup()==4) $opt_seri=array("2"=> "Produk Individu");
                    else if(GetUserGrup()==5) $opt_seri=array("4"=> "Produk Syariah");
                    else if(GetUserGrup()==6) $opt_seri=array("3"=> "Produk Kumpulan");
                    else $opt_seri=array(""=> "- Semua -", "1"=> "Customer Care", "2"=> "Produk Individu", "3"=> "Produk Kumpulan", "4"=> "Produk Syariah");
										echo form_dropdown("kat", $opt_seri, $kat, "style='font-size:14px;' class='form-control'");
										?>
                  </div>
                </div>
                <div class="col-md-7">
                	<div style="margin-top:30px;float:left;"><input type="submit" value="Cari" class="text-white btn btn-success btn-sm" name="tombol" style="padding: 4px 10px;border-radius: 5px;"></div>
                	<div style="margin-top:30px;margin-left:10px;float:left;"><input type="submit" value="Export" class="text-white btn btn-info btn-sm" name="tombol" style="padding: 4px 10px;border-radius: 5px;"></div>
                </div>
              </div>
            </div>
          </form>
        	<!--<div class="col-md-12 p-b-20 text-red text-right"><a class="text-white btn btn-success btn-sm" href="<?php echo site_url($filez.'/export');?>">Export to Excel</a></div>-->
        	<div class="card-body p-0">
          	<form id="form_dt" method="POST" action="#">
                <table id="table-edit" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Kota / Kabupaten</th>
                            <th>Usia</th>
                            <th>Subject</th>
                            <th>Sumber</th>
                            <th>Create Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
        "order"       : [],
        "searching"   : false,
        "info"        : false,
        "processing"  : true,                             //Feature control the processing indicator.
        "serverSide"  : true,                             //Feature control DataTables' server-side processing mode.
        "scrollX"     : true,
        "lengthChange": false,
        "lengthMenu"  : [[10, 50, 100], [10, 50, 100]],
        "language"    : {
            "search": "Cari",
        },
        "columnDefs" : [
            {orderable: false, targets: [ 0,1,2,3,4,5,6,7,8,9,10 ] }
        ],
        "ajax": {
            "url" : "<?php echo site_url($filez.'/'.$functionz.'_list/'.$param);?>",
            "type": "POST"
        },
    });
    $('#table-edit').on('click', '.akt', function () {
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
    $('#table-edit').on('click', '.chk', function () {
        var numItems = $('.chk:checked').length;
        $(".jum_del").html(numItems);
    });
});
</script>