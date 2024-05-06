<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-150px mt-3 mb-3 ml-3">
            <img src="<?php echo base_url();?>assets/images/logo.png" alt="">
        </div>
        <div class="relative">
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                    	<?php
                    	$avatar = $this->session->userdata("admin_instansi");
                    	$img = $avatar ? str_replace("admin/","",base_url()."uploads/".$avatar) : base_url()."assets/img/dummy/u2.png";
                    	?>
                      <img class="user_avatar" src="<?php echo $img;?>" alt="Avatar" title="Avatar">
                    </div>
                    <div class="float-left info text-white">
                        <h6 class="font-weight-light mt-2 mb-1 text-black"><b><?php echo $this->session->userdata("admin");?></b></h6>
                        <!--<div style="white-space:nowrap;">-->
	                        <?php echo GetValue("title","admin_grup",array("id"=> "where/".$this->session->userdata("admin_grup")));?> | 
	                        <a href="<?php echo site_url('login/logout');?>"><b>Logout</b></a>
                      	<!--</div>-->
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Home</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('banner');?>"><i class="icon icon-angle-right s-18"></i>Banner</a></li>
	                <li><a href="<?php echo site_url('banner/banner_info');?>"><i class="icon icon-angle-right s-18"></i>Info in Banner</a></li>
	                <li><a href="<?php echo site_url('produk/tahapan');?>"><i class="icon icon-angle-right s-18"></i>Yang Ingin</a></li>
	                <li><a href="<?php echo site_url('proteksi');?>"><i class="icon icon-angle-right s-18"></i>Proteksi Tepat</a></li>
	                <li><a href="<?php echo site_url('bella');?>"><i class="icon icon-angle-right s-18"></i>Bella</a></li>
	                <li><a href="<?php echo site_url('beragam');?>"><i class="icon icon-angle-right s-18"></i>Beragam Kemudahan</a></li>
	                <li><a href="<?php echo site_url('promo');?>"><i class="icon icon-angle-right s-18"></i>Promo</a></li>
	                <li>
	                	<a href="#">
			            		<i class="icon icon-angle-right s-18"></i><span>Video Corner</span>
			           		</a>
			           		<ul class="treeview-menu">
				                <li><a href="<?php echo site_url('video');?>"><i class="icon icon-angle-right s-18"></i>All Video</a></li>
				                <li><a href="<?php echo site_url('video/video_cat');?>"><i class="icon icon-angle-right s-18"></i>Category Video</a></li>
				            </ul>
	                </li>
	                <li><a href="<?php echo site_url('testimoni');?>"><i class="icon icon-angle-right s-18"></i>Testimoni</a></li>
	                <li><a href="<?php echo site_url('bnimobile');?>"><i class="icon icon-angle-right s-18"></i>BNI Mobile</a></li>
	                <li>
	                	<a href="#">
			            		<i class="icon icon-angle-right s-18"></i><span>Life Blog</span>
			           		</a>
			           		<ul class="treeview-menu">
				                <li><a href="<?php echo site_url('blog');?>"><i class="icon icon-angle-right s-18"></i>All Life Blog</a></li>
				                <li><a href="<?php echo site_url('blog/blog_cat');?>"><i class="icon icon-angle-right s-18"></i>Category Life Blog</a></li>
				            </ul>
	                </li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Pages</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('content');?>"><i class="icon icon-angle-right s-18"></i>All Pages</a></li>
	                <li><a href="<?php echo site_url('content/content_detail/0');?>"><i class="icon icon-angle-right s-18"></i>New Page</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Custom Pages</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('content_custom');?>"><i class="icon icon-angle-right s-18"></i>All Pages</a></li>
	                <li><a href="<?php echo site_url('content_custom/content_custom_detail/0');?>"><i class="icon icon-angle-right s-18"></i>New Page</a></li>
	            </ul>
            </li>
            <!--<li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Article</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('blog');?>"><i class="icon icon-angle-right s-18"></i>All Article</a></li>
	                <li><a href="<?php echo site_url('blog/blog_detail/0');?>"><i class="icon icon-angle-right s-18"></i>New Article</a></li>
	                <li><a href="<?php echo site_url('blog/blog_cat');?>"><i class="icon icon-angle-right s-18"></i>Category Article</a></li>
	            </ul>
            </li>-->
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Products</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
           			<li><a href="<?php echo site_url('product');?>"><i class="icon icon-angle-right s-18"></i>All Product</a></li>
                <li><a href="<?php echo site_url('product/product_detail/0');?>"><i class="icon icon-angle-right s-18"></i>New Product</a></li>
                <li><a href="<?php echo site_url('product/product_cat');?>"><i class="icon icon-angle-right s-18"></i>Category Product</a></li>
                <li><a href="<?php echo site_url('product/lifestage');?>"><i class="icon icon-angle-right s-18"></i>Category Lifestages</a></li>
                <li><a href="<?php echo site_url('product_recommender');?>"><i class="icon icon-angle-right s-18"></i>Product Recommender</a></li>
	              <!--<li><a href="<?php echo site_url('comingsoon');?>"><i class="icon icon-angle-right s-18"></i>Product Recommender Request Data</a></li>-->
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Ruang Media</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('media');?>"><i class="icon icon-angle-right s-18"></i>All Ruang Media</a></li>
	                <li><a href="<?php echo site_url('media/media_detail/0');?>"><i class="icon icon-angle-right s-18"></i>New Ruang Media</a></li>
	                <li><a href="<?php echo site_url('media/media_cat');?>"><i class="icon icon-angle-right s-18"></i>Category Ruang Media</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>CSR</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('csr');?>"><i class="icon icon-angle-right s-18"></i>All CSR</a></li>
	                <li><a href="<?php echo site_url('csr/csr_detail/0');?>"><i class="icon icon-angle-right s-18"></i>New CSR</a></li>
	            </ul>
            </li>
            <!--<li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Video Corner</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('video');?>"><i class="icon icon-angle-right s-18"></i>All Video</a></li>
	                <li><a href="<?php echo site_url('video/video_detail/0');?>"><i class="icon icon-angle-right s-18"></i>New Video</a></li>
	                <li><a href="<?php echo site_url('video/video_cat');?>"><i class="icon icon-angle-right s-18"></i>Category Video</a></li>
	            </ul>
            </li>-->
            <!--<li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Testimoni</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('testimoni');?>"><i class="icon icon-angle-right s-18"></i>All Testimoni</a></li>
	                <li><a href="<?php echo site_url('testimoni/testimoni_detail');?>"><i class="icon icon-angle-right s-18"></i>New Testimoni</a></li>
	            </ul>
            </li>-->
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Menu</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('menuz');?>"><i class="icon icon-angle-right s-18"></i>Top Menu</a></li>
	                <li><a href="<?php echo site_url('menuz/bottom');?>"><i class="icon icon-angle-right s-18"></i>Bottom Menu</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Translation Manager</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('translation_manager');?>"><i class="icon icon-angle-right s-18"></i>All Translation</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>BNI Life Shop</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('merchandise_prod');?>"><i class="icon icon-angle-right s-18"></i>Product</a></li>
	                <li><a href="<?php echo site_url('merchandise_cat');?>"><i class="icon icon-angle-right s-18"></i>Category</a></li>
	                <li><a href="<?php echo site_url('merchandise_ban');?>"><i class="icon icon-angle-right s-18"></i>Banners</a></li>
	                <li><a href="<?php echo site_url('merchandise_set');?>"><i class="icon icon-angle-right s-18"></i>Setting</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>BNI Life Online</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('bni_life_online');?>"><i class="icon icon-angle-right s-18"></i>Customers</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Career</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('career');?>"><i class="icon icon-angle-right s-18"></i>All Careers</a></li>
	                <li><a href="<?php echo site_url('career/career_detail/0');?>"><i class="icon icon-angle-right s-18"></i>New Careers</a></li>
	                <li><a href="<?php echo site_url('career/category');?>"><i class="icon icon-angle-right s-18"></i>Category</a></li>
	                <li><a href="<?php echo site_url('career/level');?>"><i class="icon icon-angle-right s-18"></i>Level</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Awards</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('award');?>"><i class="icon icon-angle-right s-18"></i>All Awards</a></li>
	                <li><a href="<?php echo site_url('award/award_detail/0');?>"><i class="icon icon-angle-right s-18"></i>New Awards</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Milestones</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('milestones');?>"><i class="icon icon-angle-right s-18"></i>All Milestones</a></li>
	                <li><a href="<?php echo site_url('milestones/milestones_detail/0');?>"><i class="icon icon-angle-right s-18"></i>New Milestones</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Profile Management</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('management');?>"><i class="icon icon-angle-right s-18"></i>All Management</a></li>
	                <li><a href="<?php echo site_url('management/management_detail/0');?>"><i class="icon icon-angle-right s-18"></i>New Management</a></li>
	                <li><a href="<?php echo site_url('management/categoryman');?>"><i class="icon icon-angle-right s-18"></i>Category</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Directory</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('direktori');?>"><i class="icon icon-angle-right s-18"></i>All Directory</a></li>
	                <li><a href="<?php echo site_url('direktori/direktori_detail/0');?>"><i class="icon icon-angle-right s-18"></i>New Directory</a></li>
	                <li><a href="<?php echo site_url('direktori/category');?>"><i class="icon icon-angle-right s-18"></i>Category</a></li>
	                <li><a href="<?php echo site_url('direktori/type');?>"><i class="icon icon-angle-right s-18"></i>Type</a></li>
	                <li><a href="<?php echo site_url('direktori/tags');?>"><i class="icon icon-angle-right s-18"></i>Tags</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Reports</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('annual_report');?>"><i class="icon icon-angle-right s-18"></i>Annual Reports</a></li>
	                <li><a href="<?php echo site_url('financial_report');?>"><i class="icon icon-angle-right s-18"></i>Financial Reports</a></li>
	                <li><a href="<?php echo site_url('lanjut_report');?>"><i class="icon icon-angle-right s-18"></i>Keberlanjutan Reports</a></li>
	            </ul>
            </li>
            <!--<li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Annual Reports</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('annual_report');?>"><i class="icon icon-angle-right s-18"></i>All Annual Reports</a></li>
	                <li><a href="<?php echo site_url('annual_report/annual_report_detail/0');?>"><i class="icon icon-angle-right s-18"></i>New Annual Reports</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Financial Reports</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('financial_report');?>"><i class="icon icon-angle-right s-18"></i>All Financial Reports</a></li>
	                <li><a href="<?php echo site_url('financial_report/financial_report_detail/0');?>"><i class="icon icon-angle-right s-18"></i>New Financial Reports</a></li>
	            </ul>
            </li>-->
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>FAQ</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('faq');?>"><i class="icon icon-angle-right s-18"></i>All FAQ</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Form</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('formulir');?>"><i class="icon icon-angle-right s-18"></i>Formulir</a></li>
	                <!--<li><a href="<?php echo site_url('comingsoon');?>"><i class="icon icon-angle-right s-18"></i>Form Product</a></li>
	                <li><a href="<?php echo site_url('comingsoon');?>"><i class="icon icon-angle-right s-18"></i>Form Product Kumpulan</a></li>
	                <li><a href="<?php echo site_url('comingsoon');?>"><i class="icon icon-angle-right s-18"></i>Form Product Online</a></li>
	                <li>
	                	<a href="#">
			            		<i class="icon icon-angle-right s-18"></i><span>Form Contact</span>
			           		</a>
			           		<ul class="treeview-menu">
				              <li><a href="<?php echo site_url('comingsoon');?>"><i class="icon icon-angle-right s-18"></i>All Form Contact</a></li>
	                		<li><a href="<?php echo site_url('comingsoon');?>"><i class="icon icon-angle-right s-18"></i>Form Contact Category</a></li>
				            </ul>
	                </li>-->
	                <li><a href="<?php echo site_url('lead_form');?>"><i class="icon icon-angle-right s-18"></i>All Leads Form</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Contact</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('contact');?>"><i class="icon icon-angle-right s-18"></i>All Contact</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Lelang</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('lelang');?>"><i class="icon icon-angle-right s-18"></i>All Lelang</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Tenaga Pemasar</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('tenaga_pemasar');?>"><i class="icon icon-angle-right s-18"></i>All Tenaga Pemasar</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Fund Fact Sheet</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('fun_product');?>"><i class="icon icon-angle-right s-18"></i>Products</a></li>
	                <li><a href="<?php echo site_url('fun_product_cat');?>"><i class="icon icon-angle-right s-18"></i>Product Category</a></li>
	                <li><a href="<?php echo site_url('kinerja_bulanan');?>"><i class="icon icon-angle-right s-18"></i>Kinerja Bulanan</a></li>
	                <li><a href="<?php echo site_url('kinerja_harian');?>"><i class="icon icon-angle-right s-18"></i>Kinerja Harian</a></li>
	            </ul>
            </li>
            <!--<li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Form Product</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('comingsoon');?>"><i class="icon icon-angle-right s-18"></i>All Form Product</a></li>
	                <li><a href="<?php echo site_url('comingsoon');?>"><i class="icon icon-angle-right s-18"></i>All Form Product Kumpulan</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Form Product Online</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('comingsoon');?>"><i class="icon icon-angle-right s-18"></i>All Form Product Online</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Form Contact</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('comingsoon');?>"><i class="icon icon-angle-right s-18"></i>All Form Contact</a></li>
	                <li><a href="<?php echo site_url('comingsoon');?>"><i class="icon icon-angle-right s-18"></i>Category Form Contact</a></li>
	            </ul>
            </li>-->
            <!--<li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Product Recommender</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('comingsoon');?>"><i class="icon icon-angle-right s-18"></i>All Product Recommender</a></li>
	                <li><a href="<?php echo site_url('comingsoon');?>"><i class="icon icon-angle-right s-18"></i>All Product Recommender Request data</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Leads Form</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('comingsoon');?>"><i class="icon icon-angle-right s-18"></i>All Leads Form</a></li>
	            </ul>
            </li>-->
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Company Group</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('company_group');?>"><i class="icon icon-angle-right s-18"></i>All Company Group</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Email Recipient</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
	                <li><a href="<?php echo site_url('email_recipient');?>"><i class="icon icon-angle-right s-18"></i>Settings</a></li>
	            </ul>
            </li>
            <li class="treeview">
            	<a href="#">
            		<i class="icon icon-dialpad blue-text"></i>
                <span>Setting</span><i class="icon icon-angle-left s-18 pull-right"></i>
           		</a>
           		<ul class="treeview-menu">
           				<li><a href="<?php echo site_url('hero');?>"><i class="icon icon-angle-right s-18"></i>Hero</a></li>
	                <li><a href="<?php echo site_url('setting_fl');?>"><i class="icon icon-angle-right s-18"></i>Footer & Logo</a></li>
	                <li><a href="<?php echo site_url('follow_me');?>"><i class="icon icon-angle-right s-18"></i>Follow Me (Footer)</a></li>
	                <li><a href="<?php echo site_url('setting_cp');?>"><i class="icon icon-angle-right s-18"></i>Change Password</a></li>
	                <!--<li><a href="<?php echo site_url('setting_ys');?>"><i class="icon icon-angle-right s-18"></i>Youtube Setting</a></li>
	                <li><a href="<?php echo site_url('setting_yv');?>"><i class="icon icon-angle-right s-18"></i>Youtube Videos</a></li>-->
	            </ul>
            </li>
        </ul>
    </section>
</aside>