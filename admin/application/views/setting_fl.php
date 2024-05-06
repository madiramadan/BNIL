<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card" style="background:white;">
          <div class="p-b-20">
            <a class="text-white btn btn-success btn-sm" href="<?php echo site_url($filez.'/'.$functionz.'_detail/0');?>">Add New <?php echo $labelz;?></a>
          </div>
          <div class="card-body p-0">
          <div class="table-responsive">
              <table id="table-edit" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="500">Action</th>
                    <th>Item</th>
                    <th>Value</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(count($record) > 0){ 
                    foreach ($record as $r) { ?>
                    <tr>
                      <td class="text-center" width="500">
                        <a href="<?php echo site_url($filez.'/'.$functionz.'_detail/'.$r['id']); ?>" class="btn btn-sm" title="Edit" ><i class='icon icon-pencil'></i></a>
                        <a href="javascript:;" class="btn btn-sm" title="Delete" ><i class='icon icon-trash akt' rel="<?php echo $r['id']; ?>" zz="2"></i></a>
                      </td>
                      <td><?php echo $r['item']; ?></td>
                      <td><?php echo $r['value']; ?></td>
                    </tr>
                  <?php } } else { ?>
                    <tr>
                      <td colspan="3">Tidak ada Data</td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
          </div>
          </div>
        </div>
    </div>
</div>
<script>
var table;
$(document).ready(function() {
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
});
</script>