<b></b>
<?php
				$uri2=$this->uri->segment(2);
				if(!preg_match("/perlindungan/",$uri2)){
				?>
					<!-- Chat bot -->
	        <style>
	        	.footer-widget__explore-list li{padding-bottom:12px !important;line-height:22px;}
	        	.brand-one{background:#f15a22;}
	        	.lenna-credit{display:none !important;}
	        	.lenna-main-window[data-v-1f80176f]{right:10% !important;}
	        	.lenna-main-window{bottom:0px !important;width:75% !important;background:url('<?php echo base_url();?>uploads/bg-chat-n.png') no-repeat;background-size:cover;margin-bottom:0px !important;}
	        	.lenna-chat-header,.lenna-register-main,.lenna-credit,.lenna-chat-body,.lenna-footer-container{width:600px !important;margin:auto;position:unset !important;}
	        	.lenna-footer-container{width:100% !important;border-radius:0px !important;}
	        	.lenna-register-main{height:400px !important;}
	        	.lenna-main-window.lenna-rounded-border[data-v-3fa28b9c]{border-radius:10px 10px 0px 0px !important;right:14% !important;}
	        	.lenna-footer-container.lenna-rounded-border[data-v-3fa28b9c]{border-radius:0px !important;}
	        	.lenna-chat-footer{border-radius:0px !important;width:600px;margin:auto;}
	        	.lenna-chat-header{display:none !important;}
	        	.lenna-others .lenna-message-container{left: 38px;position: relative;top: -56px;}
	        	#lenna-webchat, #chatBody,.lenna-register-main{background:rgb(0, 104, 133, 0) !important;scrollbar-width: none;}
	        	#lenna-webchat #logo{position:absolute;margin:14px;color:#fff;}
	        	#lenna-webchat #billa{position:absolute;right:0;margin:14px;text-align:right;color:#fff;}
	        	.lenna-message-footer small,.lenna-message-footer.lenna-self small[data-v-eb5a4950]{color:#fff !important;}
	        	.lenna-message-footer.lenna-self div[data-v-eb5a4950]{display:none;}
	        	.lenna-message-head{display:none !important;}
	        	.sc-closed-icon{z-index:100;background:#006885 !important;}
	        	.lenna-footer-container, .lenna-text-input, .lenna-bg-white{background:#fff !important;}
	        	/*.lenna-chat-action{display:none;}*/
	        	#lenna-webchat {
						  scrollbar-width: thin;          /* #f7941e "auto" or "thin" */
						  scrollbar-color: #006885 #006885;   /* scroll thumb and track */ 
						  scrollbar-color: transparent;   /* scroll thumb and track */ 
						}
						.lenna-message.lenna-d-flex.lenna-flex-wrap.lenna-self{display:block !important;}
						.lenna-quickbutton-wrapper{width:40% !important;margin-left:32px !important;}
						@media (max-width: 799px) {
							.lenna-main-window[data-v-19f454fc]{width:83% !important;margin:auto !important;margin-bottom:0px !important;margin-right:0px !important;bottom:0px !important;height:85% !important;}
							/*.lenna-others .lenna-message-content{max-width:80% !important;}*/
							#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="bot"] > .lenna-custom-carousel + .lenna-message-container > .lenna-carousel-wrapper > div {
								width: 100% !important;
							}
							#lenna-webchat-bnil > div > #main-window > .lenna-banner-image-register {
								border-radius: 0 !important;
							}
							#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="user_platform"] > div:nth-child(2) > div > div > span {
								line-height: 100px !important;
							}
							#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="bot"] > .lenna-custom-carousel + .lenna-message-container > .lenna-carousel-wrapper {max-width: 80% !important}
							#lenna-webchat, #chatBody,.lenna-register-main{background:#006885 !important;height:40vh !important;border-radius:10px 10px 0px 0px !important;}
							.lenna-chat-header,.lenna-register-main,.lenna-credit,.lenna-chat-body,.lenna-footer-container{width:100% !important;margin:auto;position:unset !important;}
							.lenna-chat-footer{width:100% !important;}
							#lenna-webchat, .sc-closed-icon{transform:unset;border-radius: 50px !important;width: 30px !important;height: 30px !important;right:1px !important;bottom:78vh !important;padding:0px !important;}
						}
						::-webkit-scrollbar {
						  width: 0px;
						  scrollbar-width: none;
						  background: transparent; 
						}
						::-webkit-scrollbar-track {
						  width: 0px;
						  background: transparent !important; 
						  scrollbar-width: none;
						}					
						::-webkit-scrollbar-thumb {
						  border-radius: 0px;       /* roundness of the scroll thumb */
						  border: 0px solid #006885;
						  width: 0px;
						  background: transparent !important; 
						  scrollbar-width: none;
						}
						.sc-launcher.custom-open-icon.open-image.close-color{right:150px !important;bottom:50px !important;/*10px*/max-height:165px !important;}
						#lenna-webchat, .sc-closed-icon.custom-open-icon.open-image.close-color{bottom:10px !important;}
						/* New */
						.lenna-others:first-child .lenna-message-content::before{display:none;}
		        .lenna-others:first-child .lenna-message-content::after{display:none;}
		        .lenna-self:last-child .lenna-message-content::before{display:none;}
		        .lenna-self:last-child .lenna-message-content::after{display:none;}
		        .lenna-message-content{border-radius:20px 20px 20px 20px !important;background:#33938b !important;}
		        .lenna-self .lenna-message-content{border-radius:20px 20px 20px 20px !important;background:#33938b !important;}
		        .lenna-others:first-child .lenna-message-content{border-radius:20px 20px 20px 0px !important;background:#33938b !important;}
		        .lenna-self:first-child .lenna-message-content{border-radius:20px 20px 0px 20px !important;background:#fff !important;}
		        .lenna-others .lenna-message-content span, .lenna-others .lenna-message-content .lenna-text-content, 
		        .lenna-others .lenna-message-content .lenna-text-content h2, .lenna-others .lenna-message-content .lenna-text-content h3{color:#fff !important;}
		        .lenna-self .lenna-message-content span{color:#000 !important;}
		        .infinite-status-prompt .lenna-badge{background:#33938b !important;}
		        .lenna-others .lenna-message-footer{margin-top:15px !important;}
		        .lenna-self .lenna-message-footer{margin-top:5px !important;}
		        .lenna-message.lenna-d-flex.lenna-flex-wrap.lenna-self.lenna-custom-flex-wrap{position:relative;top:-44px;}
		        .lenna-others .custom-carousel-content[data-v-0a22f380]{max-width:80% !important;left:22px !important;padding-left:14px !important;}
		        .lenna-quickbutton-wrapper .lenna-quickbutton-item{white-space:normal !important;}
		        @media (min-width: 800px) {
	  	        #lenna-webchat > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others > .lenna-message-content{width:400px !important;max-width:400px !important;}
	  	        .lenna-table[data-v-19ceb552]{width:100% !important;}
	  	        .lenna-custom-table tbody tr td[data-v-19ceb552]:first-child{width:100px !important;max-width:100px !important;}
	  	        .lenna-custom-table tbody tr td[data-v-19ceb552]:nth-child(n+2){width:300px !important;max-width:300px !important;}
		        }
		        /*.mylivechat_inline{bottom:-68px !important;}*/
		        /* Show Live Chat */
		        .mylivechat_inline{bottom:0px !important;}
		        .mylivechat_collapsed{display:none;}
		        .lenna-message-avatar img{width:50px !important;}
				#lenna-webchat-bnil {z-index: 99999999;}
				
    
				#lenna-webchat-bnil > #bl-launcher {
					bottom: 50px !important;
					z-index: 999999;
				}
				#lenna-webchat-bnil > div > .lenna-main-window {
					width: 480px !important;
					right: 35px !important;
					bottom: 0 !important;
				}

				#lenna-webchat-bnil > div > .lenna-main-window > .lenna-chat-header {
					display: block !important;
				}

				#lenna-webchat-bnil > div > .lenna-main-window > #logo {
				display: none !important;
				}
				#lenna-webchat-bnil > div > .lenna-main-window > .lenna-footer-container > .lenna-chat-footer {
				width: 100% !important;
				}
				#lenna-self-animated-0 {
				background: #33938b !important
				}			

				@media not all and (min-width: 640px) {
				#lenna-webchat-bnil > div > .lenna-main-window {
				width: 100% !important;
				right: 0 !important;
				bottom: 0 !important;
				}
				}
				
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-self > div:nth-child(2) > div {
				  background-color: transparent !important;
				  border-radius: 24px !important;
				}
				
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others > div:nth-child(2) > div:not(:nth-child(2)) {
				  background-color: #f7941d !important;
				  left: 22px !important; 
				}

				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-self > div:nth-child(2) > div > div > span {
				  color: #000 !important;
				  line-height: 16px !important;
				}

				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="bot"] > .lenna-custom-carousel + .lenna-message-container > .lenna-carousel-wrapper > .custom-carousel-content  {
				 padding: 0 !important;
				 max-width: 100% !important;
				}
				
				@supports (-webkit-touch-callout: none) {
				  #lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="bot"] > .lenna-custom-carousel + .lenna-message-container > .lenna-carousel-wrapper > .custom-carousel-content {
					padding-bottom: 4px !important;
				  }
				}
				
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="bot"] > .lenna-custom-carousel + .lenna-message-container > .custom-carousel-content > .lenna-carousel-container:last-child {
				 margin-right: 0 !important;
				}
				
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="bot"] > .lenna-custom-carousel + .lenna-message-container > .lenna-carousel-wrapper > .custom-carousel-content > .lenna-carousel-container:not(last-child) {
				 margin-right: 6px !important;
				}
				
				#lenna-webchat > div > #main-window > .lenna-footer-container > lenna-chat-footer > div:nth-child(3) > div > .lenna-chat-action {
				  display: none;
				}
				
				
				/* header chat */
				#lenna-webchat-bnil > div > .lenna-main-window > .lenna-chat-header {
					width: 100% !important;
				}


				/* time deliver */
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others > div:nth-child(2) > div:nth-child(2) > small {
				  color: #000 !important;
				  margin-left: 16px !important;
				}
				
				
				/* chat window */
				#lenna-webchat > div > .lenna-main-window {
					height: 80vh !important;
				}
				
				/* register page */
				#lenna-webchat-bnil > div > #main-window > .lenna-register-main {
					height: /*calc((100vh - 250px) - 180px)*/ 52.5vh !important;
					width: 100% !important;
					border-radius: 0 !important;
				}
				
				/* chat body */
				#lenna-webchat-bnil > div > #main-window > #chatBody {
					height: 67vh !important;
					border-radius: 0 !important;
					width: 100% !important;
				}
				
				/* carousel image */
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="bot"] > .lenna-custom-carousel + .lenna-message-container > .custom-carousel-content > .lenna-carousel-container > .lenna-container-carousel-img > img {
					height: 70px !important
				}
				
				#lenna-webchat-bnil > div > #main-window > #banner-image-header {
					height: 10vh !important;
				}
				
				/* carousel title */
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="bot"] > .lenna-custom-carousel + .lenna-message-container > .lenna-carousel-wrapper > .custom-carousel-content > .lenna-carousel-container > .lenna-card-body > p {
					text-align: center !important;
				}
				
				/* carousel width */
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="bot"] > .lenna-custom-carousel + .lenna-message-container > .lenna-carousel-wrapper > .custom-carousel-content > .lenna-carousel-container {
					min-width: 170px !important;
				}
				
				#lenna-webchat-bnil > div > #main-window > .lenna-banner-image-register {
					border-top-left-radius: 8px;
					border-top-right-radius: 8px;
					height: 30vh !important;
				}
				
				#lenna-webchat-bnil > div > #main-window > .lenna-register-main > div:nth-child(2) > label {
					font-weight: normal !important;
				}
				
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others > div:nth-child(2) > div > .lenna-text-content > p > ul {
					padding-left: 20px;
				}
				
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others:last-child {
					margin-bottom: -30px !important;
				}
				
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="bot"] > .lenna-custom-carousel + .lenna-message-container > .lenna-carousel-wrapper > div {
					background-color: transparent !important;
					margin: 0 !important;
					width: 100% !important;
					margin-bottom: -3px !important;
				}
				
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="bot"] > .lenna-custom-carousel + .lenna-message-container > .lenna-carousel-wrapper {
					left: 30px !important;
					position: relative;
					border-radius: 8px;
					width: 83.5%;
				}
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > div > div {
					top: -20px !important;
					left: 12px !important;
				}
				
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="user_platform"] > div:nth-child(2) > div:not(:nth-child(3)) {
				  background-color: #f7941d !important;
				  left: -34px !important; 
				  top: 53px !important;
				  padding: 0 !important;
				  overflow: hidden !important;
				}
				
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="user_platform"] {
					margin-bottom: 10px !important;
				}
				
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="user_platform"] > div:nth-child(2) > div:nth-child(3) {
				  position: relative !important;
				  top: 55px !important;
				  background-color: transparent !important;
				  left: -36px !important;
				}
			
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="user_platform"] > div:nth-child(2) > div:nth-child(3) > small {
					color: #000 !important;
					display: flex !important;
				}
				
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="user_platform"] > div:nth-child(2) > div:nth-child(2) > div {
					background-color: transparent !important;
					padding: 10px !important;
				}
				
				#lenna-webchat-bnil > #bl-launcher > p  {
					display: none !important;
					opacity: 0 !important;
				}
				
				#lenna-webchat-bnil > div > #main-window > div:nth-child(3) > div:nth-child(3) > span > div > .lenna-others[type="user_platform"] > div:nth-child(2) > div:nth-child(2) > div > div {
					line-break: strict !important;
				}
				
				#lenna-webchat > div > div img {
					max-width: 220px !important;
				}

	        </style>
	        <!-- chat -->
	        <div class="icon__sticky-chat">
	            <div id="MyLiveChatContainer"></div>
	        </div> 
	        
	        <style>
					.icon__sticky-chat {
					  display: none;/*inline-block;*/
					  position: fixed;
					  bottom: 180px;
					  right: -20px;
					  text-align: center;
					  z-index: 5;
					}
					@media (max-width: 799px) {
						.icon__sticky-chat {bottom:110px;}
					}
					#MyLiveChatScriptButton{height:46px !important;}
					</style>
	        <!--Add the following script at the bottom of the web page (before </body></html>)s
	        <script type="text/javascript">function add_chatinline(){var hccid=13065097;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);} 
	        /*add_chatinline();*/ </script>
	        <script type="text/javascript">function add_chatbutton(){var hccid=13065097;var nt=document.createElement("script");nt.async=true;nt.src="https://www.mylivechat.com/chatbutton.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
	        add_chatbutton();</script>
	
	        <!-- For Logic Hide Form Offline Popup
	        <script type="text/javascript" src='https://www.mylivechat.com/chatapi.aspx?hccid=13065097'></script>-->
	
	        <script type="text/javascript">
	        $(document).ready(function() {
	            $(document).on('click', '#MyLiveChatScriptButton', function() {
	            if (typeof("MyLiveChat")!="undefined") {
	                if (!MyLiveChat.HasReadyAgents) {
	                $('.mylivechat_offline_name').hide();
	                $('.mylivechat_offline_email').hide();
	                $('.mylivechat_offline_oauth').hide();
	                $('.mylivechat_offline_enquiry').hide();
	                $('.mylivechat_offline_submit').hide();
	                }
	            }
	            })
				
	        });
	        </script>
	        <script>
	      	/* Chat Bot */

				var lennawebchat1 = document.createElement('script'); 
				lennawebchat1.src = "https://livechat.bni-life.co.id:444/webchat/lenna-init.js";
				var app1 = document.createElement('script');
				app1.src = "https://livechat.bni-life.co.id:444/webchat/app.js";
				document.head.prepend(lennawebchat1);
				document.head.prepend(app1);
				lennawebchat1.onload = function () {
					LennaWebchatInit('mbk5ez','penRe7')
				};

				var lennawebchat = document.createElement('script'); 
				lennawebchat.src = "https://platform.bni-life.co.id/webchat/lenna-init.js";
		    	var app = document.createElement('script');
		    	app.src = "https://platform.bni-life.co.id/webchat/app.js";
		    	/*lennawebchat.src = "https://app.lenna.ai/webchat/lenna-init.js";
		    	var app = document.createElement('script');
		    	app.src = "https://app.lenna.ai/webchat/app.js";*/
		    	document.head.prepend(lennawebchat);
		    	document.head.prepend(app);
		    	lennawebchat.onload = function () {
		    		LennaWebchatInit('rb2Gjd');
		    	};
			
		    	/* End Chat Bot */
		    	$(".closez").click(function(){
						$("#BoxLiveChat").hide();
						$(".livechat").show();
					});
		    	
					$(".ngobrol_billa").click(function(){
						$(".icon__sticky-chat").hide();
						$(".livechat").hide();
						$(".nav-billa").hide();
						$(".lenna-main-window").slideDown(500);
						$(".sc-launcher").hide();
						$(".sc-closed-icon").show();
						if($("#box-chat-overlay").length == 0) {
							$("#lenna-webchat").append("<div id='box-chat-overlay' style='width:100%;height:"+$(document).height()+"px;top:0;background:rgba(0,0,0,0.9);position:absolute;z-index:-1;'></div>");
							//$(".lenna-main-window").append("<div id='billa' class='desktop'><img src='"+logoz+"' width='100'></div>");
							$(".lenna-main-window").append("<div id='logo' class='desktop'><img src='"+logo_billa+"' width='70'><br>BNI Life Insurance Assistant</div>");
							$(".lenna-icon-mic").parent().attr("style","display:none;");
							$(".lenna-icon-send").parent().attr("style","display:none;");
							$(".lenna-text-input").attr("style","background:#fff !important;");
						} else $("#box-chat-overlay").attr("style","width:100%;height:"+$(document).height()+"px;top:0;background:rgba(0,0,0,0.9);position:absolute;z-index: -1;");
						$(".sc-closed-icon").click(function(){
							$(".lenna-main-window").hide();
							$("#box-chat-overlay").attr("style","background:none;");
							$(".header-navigation").attr("style","opacity:1 !important;");
							$("section").attr("style","opacity:1 !important;");
							$(".sc-launcher").show();
							$(".sc-closed-icon").hide();
							$(".icon__sticky-chat").show();
							$(".livechat").show();
							$(".nav-billa").show();
						});
					});
					function waitForElm(selector) {
						return new Promise(resolve => {
							if (document.querySelector(selector)) {
								return resolve(document.querySelector(selector));
							}

							const observer = new MutationObserver(mutations => {
								if (document.querySelector(selector)) {
									observer.disconnect();
									resolve(document.querySelector(selector));
								}
							});

							// If you get "parameter 1 is not of type 'Node'" error, see https://stackoverflow.com/a/77855838/492336
							observer.observe(document.body, {
								childList: true,
								subtree: true
							});
						});
					}
					
					waitForElm("#lenna-webchat-bnil > #bl-launcher > #main-window > #chatBody").then(function() {
						$('.lenna-banner-image-register').attr('style', 'display:none !important')
					})
					
					myChat = setInterval(chatxx, 1000);
					var logoz = "https://bni-life.co.id/assets/images/footer-logo.png";
					var logo_billa = "https://bni-life.co.id/assets/images/billa_chat_new.png";
					function chatxx() {
						$(".mylivechat_inline").show();
						$(".livechat").show();
						if($(".sc-launcher").length == 0) {
							//alert("S");
						} else {
							$("#MyLiveChatScriptButton").attr("src","https://bni-life.co.id/assets/images/livec1.png");
							$("#MyLiveChatScriptButton").attr("onmouseover","hover(this);");
							$("#MyLiveChatScriptButton").attr("onmouseout","unhover(this);");
							$(".icon__sticky-chat").show();
							$(".livechat").show();
							var isRegister = $('.lenna-register-main');
							console.log('LAUNE__', isRegister?.length)
							if (isRegister?.length) {
								console.log('BANNER')
								$('.lenna-banner-image-register').attr('style', 'display:block !important')
							} else {
								console.log('NO BANNER')
								$('.lenna-banner-image-register').attr('style', 'display:none !important')
							}
							if ($("#lenna-webchat-bnil").find("button[type='submit']")?.length) {
								$("#lenna-webchat-bnil").on('click', function() {
									
									if (localStorage.getItem('webchat_user_bnil')) {
										$('.lenna-banner-image-register').attr('style', 'display:none !important')
									} else {
										$('.lenna-banner-image-register').attr('style', 'display:block !important')
									}
								})
							}
							$(".sc-launcher").click(function(){
								console.log("clicskd !!!");
								//$(".mylivechat_inline").hide();
								$(".mylivechat_inline").show();
								$(".livechat").hide();
								$(".icon__sticky-chat").hide();
								//alert("SS");
								if($("#box-chat-overlay").length == 0) {
									$("#lenna-webchat").append("<div id='box-chat-overlay' style='width:100%;height:"+$(document).height()+"px;top:0;background:rgba(0,0,0,0.9);position:absolute;z-index:-1;'></div>");
									//$(".lenna-main-window").append("<div id='billa' class='desktop'><img src='"+logoz+"' width='100'></div>");
									$(".lenna-main-window").append("<div id='logo' class='desktop'><img src='"+logo_billa+"' width='70'><br>BNI Life Insurance Assistant</div>");
									$(".lenna-icon-mic").parent().attr("style","display:none;");
									$(".lenna-icon-send").parent().attr("style","display:none;");
									$(".lenna-text-input").attr("style","background:#fff !important;");
								} else $("#box-chat-overlay").attr("style","width:100%;height:"+$(document).height()+"px;top:0;background:rgba(0,0,0,0.9);position:absolute;z-index:-1");
								$(".header-navigation").attr("style","opacity:0 !important;");
								$("section").attr("style","opacity:0.5 !important;");
								$(".lenna-main-window")[0].slideDown(500);
							});
							$(".sc-closed-icon, .lenna-close-chat").click(function(){
								//alert("Sd");
								$("#box-chat-overlay").attr("style","background:none;");
								$(".header-navigation").attr("style","opacity:1 !important;");
								$("section").attr("style","opacity:1 !important;");
								$("#sectionhome").attr("style","opacity:1 !important; margin-top:5%;height:76%!important;");
								$(".mylivechat_inline").show();
								$(".livechat").show();
								$(".icon__sticky-chat").show();
							});
							clearInterval(myChat);
						}
					}
					function hover(element) {
					  element.setAttribute('src', 'https://bni-life.co.id/assets/images/livec2.png');
					  $(".icon__sticky-chat").css("right","-5px");
					}
					
					function unhover(element) {
					  element.setAttribute('src', 'https://bni-life.co.id/assets/images/livec1.png');
					  $(".icon__sticky-chat").css("right","-20px");
					}

		    	</script>
				<?php }?>

		<!--Site Footer One Start--> 
		<footer class="site-footer" style="background:#006885;">
	<div class="site-footer__one-top">
		<div class="row">
            <div class="desktop col-lg-3 col-md-3 wow fadeInUp fotleft" data-wow-delay="150ms">
				<div class="footer-widget__column footer-widget__about">
				
					<!--<div class="footer-widget__logo"> 
                    <a href="#"><img src="<?php echo base_url();?>assets/images/footer-logo.png" alt="" style="width:85px;"></a>
                    </div>-->
					
					<p class="footer-widget__text"><b>PT BNI Life Insurance</b></p>
                    <p class="footer-widget__text">Centennial Tower,<?php echo getLang() ? " 9th Floor" : " Lantai 9";?><br>Jl. Gatot Subroto Kav 24-25,<br> Jakarta 12930, Indonesia.<br>
                    <label style='padding-top:15px;'>Contact Center <a href="tel:1500045" style="color:#fff;">1-500-045</a></label></p>
                    
					<div style="width:100%;">
                        <p class="ket" style="color:#fff;"><b><?php echo getLang() ? "Social Media" : "Sosial Media";?></b></p>
                    </div>
                    
					<div class="site-footer__social">
						<?php
                        $sc = GetAll("follow_me",array("urutan"=> "order/asc", "is_publish"=> "where/1"));
                        foreach($sc->result_array() as $rc) {
							// if ($rc['nama'] == "Twitter"){
							// 	echo "<a href='".$rc['link']."' target='_blank'><i class='fa-brands fa-x-twitter'></i></a>";
							// }
							// else
							// {
							// 	echo "<a href='".$rc['link']."' target='_blank'><i class='fab ".$rc['icon']."'></i></a>";
							// }
									
							echo "<a href='".$rc['link']."' target='_blank'><i class='fab ".$rc['icon']."'></i></a>";
                        }
                        ?>
                    </div>
					
                    <div style="width:100%;padding-top:30px;">
                        <p class="ket" style="color:#fff;"><b><?php echo getLang() ? "Application" : "Aplikasi";?></b></p>
                    </div>
					
                    <div style="padding-bottom:10px;"><a href="https://apps.apple.com/us/app/bni-life-mobile/id1494865291" target="_blank"><img src="<?php echo base_url();?>assets/images/appstore.png"></a></div>
                        <div style="padding-bottom:10px;"><a href="https://play.google.com/store/apps/details?id=com.invent.bnilife.insurance" target="_blank"><img src="<?php echo base_url();?>assets/images/playstore.png"></a></div>
                          	<div>
                          		<img src="<?php echo base_url();?>uploads/img/suransi.png" style="padding-right:10px;width:80px;">
                          		<img src="<?php echo base_url();?>uploads/inklusi-keuangan.png" style="width:80px;">
                          	</div>
                        </div>
                    </div>
					
                    <div class="desktop col-md-9 wow fadeInUp fotright" data-wow-delay="150ms">
                    	<div class="row">
                    		<?php
                    		$foot = GetAll("menu_bottom",array("id_parents"=> "where/0", "is_publish"=> "where/1"));
                    		foreach($foot->result_array() as $f) {?>
			                    <div class="col-md-2">
			                        <div class="footer-widget__column footer-widget__explore clearfix">
			                            <h3 class="footer-widget__title"><?php echo $f['title'.getLang()];?></h3>
			                            <ul class="footer-widget__explore-list list-unstyled">
			                            	<?php
			                            	$foot_2 = GetAll("menu_bottom", array("id_parents"=> "where/".$f['id'], "urutan"=> "order/asc", "is_publish"=> "where/1"));
			                            	foreach($foot_2->result_array() as $f_2) {
			                            		$target = preg_match_all("/http/",$f_2['link']) ? 1 : 0;
			                            		if($target) echo "<li><a href='".$f_2['link']."' target='_blank'>".$f_2['title'.getLang()]."</a></li>";
			                            		else echo "<li><a href='".lang_url($f_2['link'])."'>".$f_2['title'.getLang()]."</a></li>";
											}
			                              ?>
			                            </ul>
									</div>
								</div>
			                <?php } ?>
		                 </div>
	                </div>
  
	                <div class="mobile accrodion-grp faq-one-accrodion footer-accrodion" data-grp-name="faq-one-accrodion">
      					<?php
                    	foreach($foot->result_array() as $f) {?>
                    		<div class="accrodion">
								<div class="accrodion-title">
									<h4><?php echo $f['title'.getLang()];?></h4>
								</div>
								
								<div class="accrodion-content" style="display:none;">
									<div class="inner">
										<ul>
										<?php
										$foot_2 = GetAll("menu_bottom", array("id_parents"=> "where/".$f['id'], "urutan"=> "order/asc", "is_publish"=> "where/1"));
										foreach($foot_2->result_array() as $f_2) {
											$target = preg_match_all("/http/",$f_2['link']) ? 1 : 0;
											if($target) echo "<li><a href='".$f_2['link']."' target='_blank'>".$f_2['title'.getLang()]."</a></li>";
											else echo "<li><a href='".lang_url($f_2['link'])."'>".$f_2['title'.getLang()]."</a></li>";
										}
										?>
										</ul>
									</div>
								</div>
							</div>
	                    <?php } ?>
                    </div>
					
		</div>
    </div>		
</footer>
        <!--Site Footer One End-->
        
        <?php
        $bhs_footer = GetBahasa("footer");
        ?>
        <!--Site Footer Bottom Start-->
        <div class="site-footer-bottom" style="background:#004052;">
            <div class="row">
                <div class="col-xl-12 fotleft">
                    <div class="site-footer-bottom__inner" style="align-items:unset;">
					
                        <div class="site-footer-bottom__left" style="font-size:14px;">
							<div class="mobile">
								<p class="footer-widget__text"><b>PT BNI Life Insurance</b></p>
                    			<p class="footer-widget__text">Centennial Tower,<?php echo getLang() ? " 9th Floor" : " Lantai 9";?><br>Jl. Gatot Subroto Kav 24-25,<br> Jakarta 12930, Indonesia.<br>
                    			<label style='padding-top:15px;'>Contact Center <a href="tel:1500045" style="color:#fff;">1-500-045</a></label></p>
							
								<p class="ket" style="color:#fff;"><b><?php echo getLang() ? "Social Media :" : "Sosial Media :";?></b></p>
								<br>
								<?php
                        		$sc = GetAll("follow_me",array("urutan"=> "order/asc", "is_publish"=> "where/1"));
                        		foreach($sc->result_array() as $rc) {
									echo "<a href='".$rc['link']."' target='_blank'><i class='fab ".$rc['icon']."' style='font-size:28px;'></i></a> &nbsp;&nbsp;";
                        		}
                        		?>

								<br><br>
						
								<p class="ket" style="color:#fff;"><b><?php echo getLang() ? "Application :" : "Aplikasi :";?></b></p>
								<br>
								<a href="https://apps.apple.com/us/app/bni-life-mobile/id1494865291" target="_blank"><img src="<?php echo base_url();?>assets/images/appstore.png"></a>
                        		<a href="https://play.google.com/store/apps/details?id=com.invent.bnilife.insurance" target="_blank"><img src="<?php echo base_url();?>assets/images/playstore.png"></a>
                          	
								<br><br>

                          		<img src="<?php echo base_url();?>uploads/img/suransi.png" style="padding-right:10px;width:80px;">
                          		<img src="<?php echo base_url();?>uploads/inklusi-keuangan.png" style="width:80px;">
                          	
								<br><br>

                            	<p>BNI Life &copy; <?php echo date("Y");?>. <?php echo $bhs_footer[19];?></p>
							</div>

							<div class="desktop">
								<p>BNI Life &copy; <?php echo date("Y");?>. <?php echo $bhs_footer[19];?></p>	
                        	</div>
							
                        </div>
                        <div class="site-footer-bottom__left" style="float:right;padding-right:250px;padding-top:40px;">
                        	<div class="desktop">
                        		<a href="<?php echo lang_url('privacy');?>" style="padding-right:40px;padding-left:40px;"><?php echo $bhs_footer[57];?></a><a href="<?php echo lang_url('syarat');?>"><?php echo $bhs_footer[58];?></a>
                        	</div>
                        	<div class="mobile">
	                        	<div><a href="<?php echo lang_url('privacy');?>"><?php echo $bhs_footer[57];?></a></div>
	                        	<div><a href="<?php echo lang_url('syarat');?>"><?php echo $bhs_footer[58];?></a></div>
	                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Site Footer Bottom End-->
    </div><!-- /.page-wrapper -->

    <!--<a class="scroll-to-target scroll-to-top"><img src="<?php echo base_url();?>assets/images/lifechat.png" width="60"></a>
    <button class="chat_with_bot">Chat with Bot</button>-->

    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/waypoints.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/TweenMax.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/wow.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/swiper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/typed-2.0.11.js"></script>
    <script src="<?php echo base_url();?>assets/js/vegas.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/countdown.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/nouislider.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/isotope.js"></script>
    <script src="<?php echo base_url();?>assets/js/appear.js"></script>
    <script src="<?php echo base_url();?>assets/js/jarallax.js"></script>
    
    <!-- template scripts -->
    <script src="<?php echo base_url();?>assets/js/theme.js"></script>
    <script>
					$(".original").css("opacity","1");
		    $(document).ready(function(){
		    	$(".stricked-menu").css("background","rgba(255, 255, 255, 1)");
		    	$(".stricked-menu").css("opacity","0");
					$(".original").css("opacity","1");
					$(".stricked-menu").css("z-index","99");
					$(".original").css("z-index","99999");
					$(".activer").css('cssText',"color:#F15922!important"); 
		    	$(window).scroll(function(){
					  var position = $(window).scrollTop();
					  //var bottom = $(document).height() - $(window).height();
					  $('.stricked-menu .main-nav__main-navigation .main-nav__navigation-box>li>a').css('color','red!important');
					  if(position >= 680) {
					  	$(".stricked-menu").css("background","rgba(0, 104, 133, 1)");
					  	$(".stricked-menu").css("opacity","1");
					  	$(".original").css("opacity","0");
						$(".stricked-menu").css("z-index","99999");
						$(".original").css("z-index","99");
					  	$(".pri_logo").attr("src","<?php echo base_url();?>assets/images/logo-white.png");
					  	$(".main-nav__main-navigation .plan_logo").attr("src","<?php echo base_url();?>assets/images/PlanBLife Logo White.png");
					  	$(".main-nav__main-navigation .bpos_logo").attr("src","<?php echo base_url().'uploads/logo_bpos_white.png';?>");
					  	$(".main-nav__main-navigation .mobile_logo").attr("src","<?php echo base_url();?>assets/images/bni_mobile_white.png");
					  	$(".icon-magnifying-glass").css("color","#ffffff");
					  	$(".main-nav__right__btn-one").css("color","#cccccc");
					  	$(".main-nav__right__btn-one a").css("color","#cccccc");
					  	$(".main-nav__right__btn-one a.aktif").css("color","#ffffff");
					  	$(".main-nav__left .side-menu__toggler").css("color","#ffffff");
					  } else if(position==0) {
					  	$(".stricked-menu").css("background","rgba(255, 255, 255, 1)");
					  	$(".stricked-menu").css("opacity","0");
					  	$(".original").css("opacity","1");
						$(".stricked-menu").css("z-index","99");
						$(".original").css("z-index","99999");
					  	$(".pri_logo").attr("src","<?php echo base_url();?>assets/images/logo.png");
					  	$(".plan_logo").attr("src","<?php echo base_url();?>assets/images/PlanBLife Logo.png");
					  	$(".bpos_logo").attr("src","<?php echo base_url().'uploads/logo_bpos.png';?>");
					  	$(".mobile_logo").attr("src","<?php echo base_url();?>assets/images/bni_mobile.png");
					  	$(".icon-magnifying-glass").css("color","#585757");
					  	$(".main-nav__right__btn-one a").css("color","#585757");
					  	$(".main-nav__right__btn-one").css("color","#585757");
					  	$(".main-nav__right__btn-one a.aktif").css("color","#F15922");
					  	$(".main-nav__left .side-menu__toggler").css("color","#ff9d00");
					  } else {
					  	$(".stricked-menu").css("background","rgba(255, 255, 255, 0.5)");
					  	$(".stricked-menu").css("opacity","0");
					  	$(".original").css("opacity","1");
						$(".stricked-menu").css("z-index","99");
						$(".original").css("z-index","99999");
					  	$(".pri_logo").attr("src","<?php echo base_url();?>assets/images/logo.png");
					  	$(".plan_logo").attr("src","<?php echo base_url();?>assets/images/PlanBLife Logo.png");
					  	$(".bpos_logo").attr("src","<?php echo base_url().'uploads/logo_bpos.png';?>");
					  	$(".mobile_logo").attr("src","<?php echo base_url();?>assets/images/bni_mobile.png");
					  	$(".icon-magnifying-glass").css("color","#585757");
					  	$(".main-nav__right__btn-one a").css("color","#585757");
					  	$(".main-nav__right__btn-one").css("color","#585757");
					  	$(".main-nav__right__btn-one a.aktif").css("color","#F15922");
					  	$(".main-nav__left .side-menu__toggler").css("color","#ff9d00");
					  }
					});
					$("#MyLiveChatScriptButton").attr("src","<?php echo base_url();?>assets/images/livec1.png");
					
					// $("#MyLiveChatContainer").hide();
					// $('#bl-launcher').css("z-index","9999999");
					// $('#bl-launcher').css("margin-bottom","150");
					
				});
  	</script>
</body>

</html>