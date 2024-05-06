<style>
  /*
  .blog_detailz{
    line-height:30px!important;
    font-size:16px!important;
  }
    .point1 {
      margin-left:48px;
      color:black;
      ;
      list-style: none;
      counter-reset: alist 0;
      }
    .point1>li {
      position: relative;
      }
 
    .point1>li:before {
      position: absolute;
      left: -30px;
      content: counter(alist, lower-latin) ".";
      counter-increment: alist;
      }*/
<?php 
$q = GetAll("contents",array("id"=> "where/6","is_publish"=> "where/1"))->row_array();
?>
</style>
<section class="section-top desktop">
        	<div class="bg-top-csr" style="background-image:url('<?php echo base_url()."uploads/".GetHero(6);?>');background-size:100% 100%;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="csr text-center">
                      <div class="judul"><?php echo $q['title'.getLang()] ;?></div>
                      <div class="info">&nbsp;</div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <section class="section-top mobile">
        	<div class="col-xs-12 new_hero">
        		<div class="judul"><?php echo $q['title'.getLang()];?></div>
        		<div class="info">&nbsp;</div>
			    </div>
			    <div class="bg-top-managemen">
        		<img src="<?php echo base_url()."uploads/".GetHeroMobile(6);?>" width="100%">
          </div>
        </section>
        <section class="you-can-help section-bottom">
        	<div class="container">
              <div class="row"> 
                  <div class="col-xl-12 col-lg-12">
                      <div class="you-can-help__left">
                          <div class="row blog_detailz">
			                  	  <div class="col-md-12">
                            <?php
                            echo $q['contents'.getLang()]
                            ?>
				                    </div>
                  				</div>
                      </div>
                  </div>
              </div>
          </div>
        </section> 