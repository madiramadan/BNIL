<style>
	
.original .main-nav__navigation-box>li>a:before {
    position: absolute;
    left: 0;
    bottom: -3px;
    right: 0;
    height: 2px;
    background: #F15922!important;
    content: "";
    transform: scaleX(0.5);
    opacity: 0;
    transition: all 500ms ease;
    z-index: -1;
}
.main-nav__main-navigation .main-nav__navigation-box>li>a:before {
    position: absolute;
    left: 0;
    bottom: -3px;
    right: 0;
    height: 2px;
    background: #F15922!important;
    content: "";
    transform: scaleX(0.5);
    opacity: 0;
    transition: all 500ms ease;
    z-index: -1;
}
</style>
<?php
$seo=array("title"=> "BNI Life Insurance", "desc"=> "PT BNI Life Insurance adalah perusahaan asuransi yang memiliki berbagai produk asuransi seperti Asuransi Jiwa Kesehatan Pendidikan Investasi Pensiun dan Syariah");
if(isset($val['seo'.getLang()])) $seo['title'] = $val['seo']." | ".$seo['title'];
if(isset($val['seo_title'.getLang()])) $seo['title'] = $val['seo_title']." | ".$seo['title'];
if(isset($val['seo_desc'.getLang()])) $seo['desc'] = $val['seo_desc'];
if(isset($val['seo_description'.getLang()])) $seo['desc'] = $val['seo_description'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
    <title><?php echo $seo['title'];?></title>
    <meta name="description" content="<?php echo $seo['desc'];?>">
    <!--<meta name="twitter:card" content="summary_large_image">-->
    <meta name="twitter:site" content="@bnilifeid">
    <meta name="twitter:creator" content="@bnilifeid">
    <meta property="og:url" content="<?php echo current_url();?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $seo['title'];?>" />
    <meta itemprop="name" content="<?php echo $seo['title'];?>">
    <meta name="twitter:title" content="<?php echo $seo['title'];?>">
    <meta property="og:description" content="<?php echo $seo['desc'];?>" />
    <meta itemprop="description" content="<?php echo $seo['desc'];?>">
    <meta name="twitter:description" content="<?php echo $seo['desc'];?>">
    <!--<meta property="og:image" content="https://www.bni-life.co.id/storage/product_categories/img/1645065067_600_315.jpg" />
    <meta itemprop="image" content="https://www.bni-life.co.id/storage/product_categories/img/1645065067_600_315.jpg">
    <meta name="twitter:image:src" content="https://www.bni-life.co.id/storage/product_categories/img/1645065067_600_315.jpg">-->
    <meta property="og:site_name" content="<?php echo $seo['title'];?>" />    
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/images/favicon_32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/images/favicon_32.png">
    <link rel="manifest" href="<?php echo base_url();?>assets/images/favicon_32.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="facebook-domain-verification" content="fyvnwzai147h9rw330natf1zitlzh7" />
    
    <!-- Fonts-->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <!-- Css-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap_xs.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fontawesome-all.min.css">
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jarallax.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/vegas.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/nouislider.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/nouislider.pips.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/icon.css">
    
    <!-- Template styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css">
    
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <style>
  	.mobile-nav__wrapper{transform-origin:unset;transition:unset;transform:unset;position:absolute;top:-1000px;}
  	/*.mobile-nav__wrapper.expanded{top:0px !important;}*/
  	.mobile-nav__wrapper.expanded{transform:unset;}
    </style>
		<!-- Google tag (gtag.js) --> 
		<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11324432990"></script> 
		<script> 
			window.dataLayer = window.dataLayer || []; 
			function gtag(){dataLayer.push(arguments);} 
			gtag('js', new Date()); 
			gtag('config', 'AW-11324432990'); 
		</script>
    	<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-MKQ5M7L5WQ"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'G-MKQ5M7L5WQ');
		</script>
		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110090361-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'UA-110090361-1');
		</script>
    	<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=AW-522028442"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'AW-522028442');
		</script>
		<!-- Event snippet for Website traffic conversion page -->
		<script>
		  gtag('event', 'conversion', {'send_to': 'AW-522028442/h-7CCLSinOcBEJqL9vgB'});
		</script>
		<!-- Meta Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window, document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '4972789382754509');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=4972789382754509&ev=PageView&noscript=1"/></noscript>
		<!-- End Meta Pixel Code -->
</head>

<body>
    <div class="page-wrapper">

        <div class="site-header__header-three-wrap clearfix">

            <div class="container">
                <header class="main-nav__header-three">
                    <nav class="header-navigation stricky stricked-menu stricky-fixed" style="opacity:1!important;">
                        <div class="main-nav__header-three__content-box clearfix row">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="main-nav__left main-nav__left-three float-left logo-utama">
                                <div class="logo">
                                    <a href="<?php echo lang_url('');?>"><img class="pri_logo" src="<?php echo base_url();?>assets/images/logo.png" alt=""></a>
                                </div>
                                <a href="#" class="side-menu__toggler">
                                    <i class="fa fa-bars" style="color:#fff !important;"></i>
                                </a>
                                <a href="#" class="mobile main-nav__search search-popup__toggler" style="float:right;position:relative;padding-top:28px;padding-right:20px;color:#006885;">
                                    <i class="icon-magnifying-glass"></i>
                                </a>
                            </div>
                            <div class="main-nav__main-navigation main-nav__main-navigation__three float-left clearfix">
                                <ul class="main-nav__navigation-box temp_menu" rel="0">
											              <?php
											              $rel=0;
														  $stylehead="";
											          		$head = GetAll("menu_top",array("id_parents"=> "where/0", "urutan"=> "order/asc", "is_publish"=> "where/1"));
											          		foreach($head->result_array() as $h) {
																$param=$this->uri->segment(2);
																$getparent=GetValue('id_parents','menu_top',array('link'=>'where/'.$param));
																if($h['id']==$getparent){
																	$stylehead="color:#F15922!important;";
																	//$stylehead="activer";
																}else{
																	//$stylehead="";
																	$stylehead="color:black";
																}
											          			$rel++;
											          			//if(!preg_match_all("/planb/",$h['link']) && !preg_match_all("/planb/",$h['link'])) {
											          			if(!$h['link']) {
											          			?>
	                                    <li class="dropdown menuz" rel="<?php echo $rel;?>" id="induk_<?php echo $rel?>">

	                                        <!-- <a href="#" class="<?php echo $stylehead?>" onclick="menuclick(<?php echo $rel?>)" style="white-space:nowrap;" >-->

	                                        <a href="#" onclick="menuclick(<?php echo $rel?>)" style="white-space:nowrap;<?php echo $stylehead?>" >
	                                        	<?php 
	                                        	if($h['logo']) echo "<img class='mobile_logo' src='".base_url()."uploads/".$h['logo']."' width='60'>";
	                                        	else echo $h['title'.getLang()];
	                                        	?>
	                                        </a>
	                                        <ul class="mobile">
	                                        	<?php
	                                        	$head_2 = GetAll("menu_top",array("id_parents"=> "where/".$h['id'], "urutan"=> "order/asc", "is_publish"=> "where/1"));
											          						foreach($head_2->result_array() as $h_2) {
											          							$target = preg_match_all("/http/",$h_2['link']) ? 1 : 0;
													                		if(preg_match_all("/MyLiveChat_OpenDialog/",$h_2['link'])) {
													                			//echo "<li><a href='#' id='MyLiveChatScriptLink' onclick='MyLiveChat_OpenDialog()'>".$h_2['title'.getlang()]."</a></li>";
													                		} else {
															            			if($target) echo "<li><a href='".$h_2['link']."' target='_blank'>".$h_2['title'.getLang()]."</a></li>";
														                		else echo "<li><a href='".lang_url($h_2['link'])."'>".$h_2['title'.getLang()]."</a></li>";
														                	}
														                }
											          						?>
	                                        </ul>
	                                    </li>
	                                    <?php 
	                                  	} else {
	                                  		if($h['logo']) {
	                                  			if($h['title']=="Plan BLife") {
		                                  		?>
		                                  		<li class="logo_plan">
			                                        <a href="<?php echo $h['link'];?>" target="_blank"><img class="plan_logo" src="<?php echo base_url()."uploads/".$h['logo'];?>" width="36"></a>
			                                    </li>
	                                  			<?php
	                                  			} else {
	                                  				?>
	                                  			<li style="padding-top:15px;">
			                                        <a href="<?php echo $h['link'];?>" target="_blank"><img class="bpos_logo" src="<?php echo base_url()."uploads/".$h['logo'];?>" width="50"></a>
			                                    </li>
	                                  			<?php }
	                                  		} else {?>
	                                  		<li>
		                                        <a href="<?php echo $h['link'];?>" target="_blank"><?php echo $h['title'];?></a>
		                                    </li>
	                                  		<?php }
	                                  	}
	                                  }
	                                  ?>
                                    <!--<li class="logo_plan">
                                        <a href="https://planblife.bni-life.co.id/" target="_blank"><img class="plan_logo" src="<?php echo base_url();?>assets/images/PlanBLife Logo.png" width="36"></a>
                                    </li>-->
                                </ul>
                            </div>
                            <div class="main-nav__right-three float-right col-md-3">
                                <div class="main-nav__right__btn-one">
                                	<?php
                                	if(!$this->uri->segment(2)) {?>
                                		<a href="<?php echo site_url("id/");?>" style="padding-right:0px;" class="<?php echo getLang() ? "" : "aktif";?>">ID</a> | <a class="<?php echo getLang() ? "aktif" : "";?>" style="padding-left:0px;" href="<?php echo site_url("en/");?>">EN</a>
                                	<?php } else {?>
                                    <a href="<?php echo current_lang_url("id");?>" style="padding-right:0px;" class="<?php echo getLang() ? "" : "aktif";?>">ID</a> | <a class="<?php echo getLang() ? "aktif" : "";?>" style="padding-left:0px;" href="<?php echo current_lang_url("en");?>">EN</a>
                                  <?php }?>
                                </div>
                                <div class="main-nav__right__icon-search-box">
                                    <a href="#" class="main-nav__search search-popup__toggler">
                                        <i class="icon-magnifying-glass"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>
            </div>
            <div class="menudrop desktop">
            	<?php
            	$rel=0;
          		foreach($head->result_array() as $h) {
          			$rel++;
          			?>
	            	<ul class="menusubz sub<?php echo $rel;?>" style="display:none;">
	            		<?php
	            		$head_2 = GetAll("menu_top", array("id_parents"=> "where/".$h['id'], "urutan"=> "order/asc", "is_publish"=> "where/1"));
	            		foreach($head_2->result_array() as $k_2=> $h_2) {
	            			$cls_top = $k_2 > 3 ? "class='topborder'" : "";
                		$target = preg_match_all("/http/",$h_2['link']) ? 1 : 0;
                		if(preg_match_all("/MyLiveChat_OpenDialog/",$h_2['link'])) {
                			echo "<li><a href='#' id='MyLiveChatScriptLink' onclick='MyLiveChat_OpenDialog()'>".$h_2['title'.getlang()]." </a></li>";
                		} else {
		            			if($target) echo "<li ".$cls_top."><a href='".$h_2['link']."' target='_blank'>".$h_2['title'.getLang()]." </a></li>";
	                		else echo "<li ".$cls_top."><a href='".lang_url($h_2['link'])."'>".$h_2['title'.getLang()]." </a></li>";
	                	}
	            		}
	            		//Top Border
	            		if($k_2 > 3) {
	            			if((($k_2+1)%4) > 0) {
			            		for($i=1;$i<=4-(($k_2+1)%4);$i++) {
			            			echo "<li class='topborder'></li>";
			            		}
			            	}
		            	}
	            		?>
	            	</ul>
	            <?php }
	            ?>
            </div>
        </div>
        <script>
			function menuclick(vals){
				//console.log('diklik');
				
				//$('#induk-'+vals+' .dropdown-btn').click();
				//$('#induk_'+vals).find(".dropdown-btn").click();
				//console.log('#induk_'+vals);
			}
			$(document).ready(function(e){
				
			$(".mobile-nav__container")
            .find("li.dropdown a")
            .on("click", function (e) {
				console.log('diklik');
                $(this).find('.dropdown-btn').toggleClass("open");
                $(this).parent().children("ul").slideToggle(500);
                //e.preventDefault();
            });
			})
        $(".menuz").click(function(){
        	$(".menuz").removeClass("current");
        	$(this).addClass("current");
        	var rel = $(this).attr("rel");
        	var temp_rel = $(".temp_menu").attr("rel");
        	$(".menusubz").slideUp("fast");
        	if(temp_rel==0 || temp_rel != rel) {
        		$(".sub"+rel).slideDown("slow");
        		$(".temp_menu").attr("rel",rel);
        	} else {
        		$(".temp_menu").attr("rel",0);
        		$(this).removeClass("current");
        	}
        });
        $(document).on("click", ".menudrop", function(e){
					e.stopPropagation();
				});
				$(document).on("click", ".menuz", function(e){
					e.stopPropagation();
				});
        $(document).on("click", "body", function(e){
					e.stopPropagation();
					$(".menusubz").slideUp("fast");
					$(".menuz").removeClass("current");
				});
        </script>
        
        <div class="mobile-nav__wrapper" style="display:block;">
		        <div class="mobile-nav__overlay side-menu__toggler mobile-nav__toggler"></div>
		        <div class="mobile-nav__content">
		            <span class="mobile-nav__close side-menu__toggler mobile-nav__toggler" style="background: #F15922;padding: 25px;font-size:22px;right: 0px;top: 0px;">
		                <i class="fa fa-times"></i>
		            </span>
		            <div class="logo-box">
		                <a href="<?php echo lang_url('');?>" aria-label="logo image">
		                   <img src="<?php echo base_url();?>assets/images/logo.png" alt="" width="70"/>
		                </a>
		            </div>
		            <!-- /.logo-box -->
		            <div class="mobile-nav__container clearfix"></div>
		            <!-- /.mobile-nav__container -->
		            <ul class="mobile-nav__contact list-unstyled">
		                <li class="bahasa" style="color:#585858;">
                        <a href="<?php echo current_lang_url("id");?>" style="padding-right:0px;" class="<?php echo getLang() ? "" : "aktif";?>">ID</a>&nbsp;|&nbsp;<a class="<?php echo getLang() ? "aktif" : "";?>" style="padding-left:0px;" href="<?php echo current_lang_url("en");?>">EN
                        </a>
                    </li>
		                <li>
		                    <i class="fas fa-envelope"></i>
		                    <a href="mailto:care@bni-life.co.id">care@bni-life.co.id</a>
		                </li>
		                <li>
		                    <i class="fas fa-phone-square-alt"></i>
		                    <a href="tel:1500045">1-500-045</a>
		                </li>
		            </ul><!-- /.mobile-nav__contact -->
		            <!--<div class="text-center"><a href='#' id='MyLiveChatScriptLink' onclick='MyLiveChat_OpenDialog()'>Live Chat</a></div>
		            <div class="mobile-nav__top">
		                <div class="mobile-nav__social">
		                    <a href="https://www.facebook.com/BNILifeID/" target="_blank"><i class="fab fa-facebook-square"></i></a>
		                    <a href="https://www.instagram.com/bnilifeid/" target="_blank"><i class="fab fa-instagram"></i></a>
		                    <a href="https://twitter.com/bnilifeid" target="_blank"><i class="fab fa-twitter"></i></a>
		                    <a href="https://www.youtube.com/channel/UCFBKohX52ePqnFRMwm56saQ" target="_blank"><i class="fab fa-youtube"></i></a>
		                    <a href="https://www.linkedin.com/company/bni-life/mycompany/" target="_blank"><i class="fab fa-linkedin"></i></a>
		                    <a href="https://www.tiktok.com/@bnilifeid" target="_blank"><i class="fab fa-tiktok"></i></a>
		                </div>
		            </div>-->
		        </div>
		    </div>
		
		    <div class="search-popup">
		        <div class="search-popup__overlay custom-cursor__overlay">
		            <div class="cursor"></div>
		            <div class="cursor-follower"></div>
		        </div><!-- /.search-popup__overlay -->
		        <div class="search-popup__inner">
		            <form method="GET" action="<?php echo lang_url('search');?>" class="search-popup__form">
		                <input type="text" name="cari" placeholder="<?php echo getLang() ? "Search..." : "Cari...";?>">
		                <button type="submit"><i class="fa fa-search"></i></button>
		            </form>
		        </div>
		    </div>