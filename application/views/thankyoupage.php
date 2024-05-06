

<br><br>
<section class="you-can-help">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12 text-right">
                <div class="hp1 wow fadeInLeft" data-wow-delay="100ms">
                    <img src="<?php echo base_url();?>uploads/bella-new-final-rev.png" style="width:80%;hight:70%;">
                </div>
            </div>
            <div class="col-md-1 desktop"></div>
            <div class="col-md-4 col-xs-12 wow fadeInRight" data-wow-delay="300ms">
                    <br><br>
            	    <h4 style="font-size:30px;margin-bottom:10px;color:#006885;"><?php echo !getLang() ? "Terima Kasih <br> Sudah Mengisi Formulir" : "Thank You <br> For Filling Form";?></h4>
            	    <p style="line-height:26px;font-size:18px;"><?php echo !getLang() ? "Data kamu berhasil terkirim<br>Kamu akan di arahkan kehalaman produk" : "You data has been successfully sent <br> You will be directed to the product page" ?></p>
            	    <p style="line-height:26px;font-size:18px;"><?php echo !getLang() ? "dalam" : "in" ?>&nbsp;&nbsp;<span id="totaltimer" style="color:#ff6d12; font-size:27; font-weight:bold;"></span>&nbsp;&nbsp;<?php echo !getLang() ? "detik." : "second." ?></p>
            <div>
        </div>
    </div>
</section>
<br><br>

<script type="text/javascript">
    $(document).ready(function() {
        var newurl = window.location.href;
			
		var link1 = newurl.split('/')[2];
		var link2 = newurl.split('/')[3];
		var link3 = newurl.split('/')[5];
		var link4 = newurl.split('/')[6];
		var link5 = newurl.split('/')[7];
		var link6 = newurl.split('/')[8];
		var separator = "/";

		var llinkthankyoupage = link1 + separator + link2 + separator + link3 + separator + link4 + separator + link5 + separator + link6;
       
        var s = 6;

        var timer = setInterval(() => {
            s --;
            if (s == 1)
            {
                window.location.href="http://" + llinkthankyoupage;
            }    
            $('#totaltimer').text(s);
        }, 1000);
    });
</script>
