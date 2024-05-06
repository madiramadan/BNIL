<style>
@-webkit-keyframes shrink {
  0% {
    color: white;
    transform: scale(2);
  }
  100% {
    transform: scale(1);
    color: white;
  }
}
@keyframes shrink {
  0% {
    color: white;
    transform: scale(2);
  }
  100% {
    transform: scale(1);
    color: white;
  }
}
@-webkit-keyframes grow {
  0% {
    transform: scale(1);
    color: white;
  }
  100% {
    transform: scale(2);
    color: white;
  }
}
@keyframes grow {
  0% {
    transform: scale(1);
    color: white;
  }
  100% {
    transform: scale(2);
    color: white;
  }
}
/* $. Classes
\*----------------------------------------------------------------*/
.animate {
  transform: translate3d(0, 0, 0);
  perspective: 1000;
  filter: blur(0);
  -webkit-animation-iteration-count: 1;
          animation-iteration-count: 1;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
  transform-origin: center left;
}

.animate--shrink, .hero__title .slick-current > span {
  -webkit-animation-duration: 1s;
          animation-duration: 1s;
  -webkit-animation-name: shrink;
          animation-name: shrink;
  -webkit-animation-timing-function: "linear";
          animation-timing-function: "linear";
}

.animate--grow, .no-js .hero__title .slick-dupe:nth-child(2) > span, .hero__title .slick-current + .slick-slide > span {
  -webkit-animation-duration: 1s;
          animation-duration: 1s;
  -webkit-animation-timing-function: "linear";
          animation-timing-function: "linear";
  -webkit-animation-name: grow;
          animation-name: grow;
}

/* Slider */
.slick-slider {
  position: relative;
  display: block;
  box-sizing: border-box;
  touch-callout: none;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  touch-action: pan-y;
  tap-highlight-color: transparent;
  padding-top: 0px;
}

.slick-list {
  position: relative;
  overflow: hidden;
  display: block;
  margin: 0;
  padding: 0;
}
.slick-list:focus {
  outline: none;
}
.slick-list.dragging {
  cursor: pointer;
  cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list {
  transform: translate3d(0, 0, 0);
}

.slick-track {
  position: relative;
  left: 0;
  top: 0;
  display: block;
}
.slick-track:before, .slick-track:after {
  content: "";
  display: table;
}
.slick-track:after {
  clear: both;
}
.slick-loading .slick-track {
  visibility: hidden;
}

.slick-slide {
  float: left;
  height: 100%;
  min-height: 1px;
  display: none;
}
[dir=rtl] .slick-slide {
  float: right;
}
.slick-slide img {
  display: block;
}
.slick-slide.slick-loading img {
  display: none;
}
.slick-slide.dragging img {
  pointer-events: none;
}
.slick-initialized .slick-slide {
  display: block;
}
.slick-loading .slick-slide {
  visibility: hidden;
}
.slick-vertical .slick-slide {
  display: block;
  height: auto;
  border: 0;
  outline: none;
}
.slick-vertical .slick-slide::-moz-selection {
  outline: none !important;
  border: 0 !important;
  box-shadow: none;
}
.slick-vertical .slick-slide:focus, .slick-vertical .slick-slide:active, .slick-vertical .slick-slide::selection {
  outline: none !important;
  border: 0 !important;
  box-shadow: none;
}

.slick-arrow.slick-hidden {
  display: none;
}

.slick-current {
  position: relative;
}

.hero__title .slick-slide {
  overflow: hidden;
  padding: 20px 0;
}

.hero__title [aria-hidden] {
  transition: 1s;
}
.hero__title .slick-current > span {
  box-sizing: border-box;
  display: block;
}

.no-js .hero__title .slick-dupe:nth-child(2) > span {
  padding: 1em;
}

.hero__title-misc {
  display: block;
  font-size: 24px;
  font-weight: bold;
  color: #ccc;
}

.container_saham {
  margin: 0 auto;
  width: 100%;
  background: none;
  padding: 10px 0px;
}
.widget{font-size:16px;}
.widget label{padding-right:15px;white-space:nowrap;margin-bottom:0px;}
.widget span{padding-right:15px;white-space:nowrap;}
</style>
<div class="container_saham">
  <div class="hero__title" id="animatedHeading">
  	<?php
  	//Cek Tanggal
  	$tgl = $this->db->query("select TOP(1) entry_date from fund_product_nabs order by entry_date desc")->result_array()[0]['entry_date'];
  	$produk=array();
    $q_p = GetAll("kg_fun_product");

    $CI =& get_instance();
		
    if(getLang())
    {
      foreach($q_p->result_array() as $pq) {
        $produk[$pq['id']] = $pq['title'];
      }
    }
    else
    {
      foreach($q_p->result_array() as $pq) {
        $produk[$pq['id']] = $pq['title'];
      }
    }

  	$q = $this->db->query("select * from fund_product_nabs where entry_date='".$tgl."' order by id desc");
  	foreach($q->result_array() as $r) {
    ?>
	  	<div class="slick-dupe"><span class="hero__title-misc  |  animate">
	    	<div class="widget">
	        <label class="ev-uppercase c-white fw-bold fs-14-sm col-md-4 col-xs-12"><?php echo $produk[$r['fund_product_id']];?></label>
	        <label class="ev-uppercase c-white fw-bold fs-14-sm col-md-2 col-xs-6"><?php echo date("d F Y", strtotime($r['entry_date']));?></label>
	        <span class="c-white fw-light fs-14-sm col-md-1 col-xs-6"><?php echo $r['value'];?></span>
	        <?php
	        $qq = $this->db->query("select TOP(1) * from fund_product_nabs where fund_product_id='".$r['fund_product_id']."' AND entry_date!='".$tgl."' order by entry_date desc");
  				foreach($qq->result_array() as $rr) {
  					$up = $r['value'] >= $rr['value'] ? "up" : "down";
  					$val_up = abs(number_format((($r['value'] - $rr['value']) / $rr['value']) * 100,2));
  					?>
		        <label class="ev-uppercase c-white fw-bold fs-14-sm col-md-2 col-xs-6"><?php echo date("d F Y", strtotime($rr['entry_date']));?></label>
		        <span class="c-white fw-light fs-14-sm col-md-1 col-xs-6"><?php echo $rr['value'];?></span>
	        	<span class="c-white fw-light fs-14-sm col-md-2 col-xs-12"><i class="fa fa-arrow-circle-<?php echo $up;?>" aria-hidden="true"></i> <?php echo $val_up;?>%</span>
	        	<?php 
	        }
	        ?>
	      </div>
	     </span>
	    </div>
	  <?php }
	  ?>
  </div>
</div>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/slick.min.js"></script>
<script>
// Get titles from the DOM
var titleMain = $("#animatedHeading");
var titleSubs = titleMain.find("slick-active");

if (titleMain.length) {
  titleMain.slick({
    autoplay: false,
    arrows: false,
    dots: false,
    slidesToShow: 1,
    centerPadding: "10px",
    draggable: false,
    infinite: true,
    pauseOnHover: false,
    swipe: false,
    touchMove: false,
    vertical: true,
    speed: 2000,
    autoplaySpeed: 4000,
    useTransform: true,
    cssEase: "cubic-bezier(0.645, 0.045, 0.355, 1.000)",
    adaptiveHeight: true
  });

  // On init
  $(".slick-dupe").each(function (index, el) {
    $("#animatedHeading").slick("slickAdd", "<div>" + el.innerHTML + "</div>");
  });

  // Manually refresh positioning of slick
  titleMain.slick("slickPlay");
}

</script>