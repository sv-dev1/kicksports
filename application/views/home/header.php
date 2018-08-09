<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Softnio">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Kick Sports Manager ICO Funding, the platform that will use KICK tokens to invest in professional players market value and much more!">
	<!-- Fav Icon  -->
	<link rel="shortcut icon" href="<?php echo site_url(); ?>images/favicon_kick.png">
	<!-- Site Title  -->
	<title><?php echo $this->lang->line('titlee');?></title>
	<!-- Vendor Bundle CSS -->

	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/css/vendor.bundle.css">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/css/theme-java.css">
	<!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/css/style.css"> 
	<link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>assets/css/jquery.popVideo.css">
 
	<script src="<?php echo site_url() ?>assets/js/jquery.min.js"></script>
	<!--script src="<?php echo site_url() ?>assets/js/jquery.popVideo.js"></script-->
	<!--script type="text/javascript" src="<?php echo site_url(); ?>assets/js/ethwebpage/bower_components/web3/dist/web3.min.js"></script-->


	<body class="theme-dark io-azure io-azure-pro" data-spy="scroll" data-target="#mainnav" data-offset="80">

		<!-- Header --> 
		<header class="site-header is-sticky">

			<!-- Place Particle Js -->
			<div id="particles-js" class="particles-container particles-js"></div>

			<!-- Navbar -->
			<div class="navbar navbar-expand-lg is-transparent" id="mainnav">
				<nav class="container">

					<a class="navbar-brand animated" data-animate="fadeInDown" data-delay=".65" href="./">
						<img class="logo logo-dark" alt="logo" src="<?php echo site_url(); ?>images/logo.png" srcset="<?php echo site_url(); ?>images/logo2x.png 2x">
						<img class="logo logo-light" alt="logo" src="<?php echo site_url(); ?>images/logo_kick.png" srcset="<?php echo site_url(); ?>images/logo_kick.png">
					</a>

					<div class="language-switcher animated" data-animate="fadeInDown" data-delay=".75">
						<a href="" data-toggle="dropdown"><i class="flag en">
							<?php if($this->session->userdata('site_lang') == 'portuguese'){?>
							<img src="<?php echo site_url(); ?>images/pt.png" /> 	
							<?php }elseif($this->session->userdata('site_lang') == 'english'){?>  
							<img src="<?php echo site_url(); ?>images/gb.png" /> 
							<?php }else{ ?>
							<img src="<?php echo site_url(); ?>images/pt.png" /> 
							<?php } ?>
						</i>
						<i class="fa fa-angle-down"></i></a> 
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<ul class="locales">
								<?php 
								if($this->session->userdata('site_lang') == 'portuguese'){?>
								<li><a href="<?php echo BASE_URL()?>index.php/LangSwitch/switchLanguage/portuguese" class="item active"><i class="flag en"><img src="<?php echo site_url(); ?>images/pt.png" /></i><span class="title">Português</span></a></li>
								<li><a href="<?php echo BASE_URL()?>index.php/LangSwitch/switchLanguage/english" class="item "><i class="flag1"><img src="<?php echo site_url(); ?>images/gb.png" /></i><span class="title">English</span></a></li>

								<?php }elseif($this->session->userdata('site_lang') == 'english'){?>     
								<li><a href="<?php echo BASE_URL()?>index.php/LangSwitch/switchLanguage/english" class="item active"><i class="flag1"><img src="<?php echo site_url(); ?>images/gb.png" /></i><span class="title">English</span></a></li>
								<li><a href="<?php echo BASE_URL()?>index.php/LangSwitch/switchLanguage/portuguese" class="item "><i class="flag en"><img src="<?php echo site_url(); ?>images/pt.png" /></i><span class="title">Português</span></a></li>

								<?php }else{?>
							<li><a href="<?php echo BASE_URL()?>index.php/LangSwitch/switchLanguage/portuguese" class="item active"><i class="flag1"><img src="<?php echo site_url(); ?>images/pt.png" /></i><span class="title">Português</span></a></li>
	<li><a href="<?php echo BASE_URL()?>index.php/LangSwitch/switchLanguage/english" class="item"><i class="flag en"><img src="<?php echo site_url(); ?>images/gb.png" /></i><span class="title">English</span></a></li>
								
								<?php } ?>
 <!-- <li><a class="item "><i class="flag1"><img src="<?php echo site_url(); ?>images/3.png" /></i><span class="title">हिन्दी</span></a></li>
<li><a class="item "><i class="flag1"><img src="<?php echo site_url(); ?>images/4.png" /></i><span class="title">简体中文</span></a></li>
<li><a class="item "><i class="flag1"><img src="<?php echo site_url(); ?>images/5.png" /></i><span class="title">Bahasa Indonesia</span></a></li>
<li><a class="item "><i class="flag1"><img src="<?php echo site_url(); ?>images/6.png" /></i><span class="title">繁體中文</span></a></li>
<li><a class="item "><i class="flag1"><img src="<?php echo site_url(); ?>images/7.png" /></i><span class="title">Malay</span></a></li>
<li><a class="item "><i class="flag1"><img src="<?php echo site_url(); ?>images/8.png" /></i><span class="title">ภาษาไทย</span></a></li>
<li><a class="item "><i class="flag1"><img src="<?php echo site_url(); ?>images/9.png" /></i><span class="title">Tiếng Việt</span></a></li>
<li><a class="item "><i class="flag1"><img src="<?php echo site_url(); ?>images/10.png" /></i><span class="title">Tagalog</span></a></li>

<li><a class="item "><i class="flag1"><img src="<?php echo site_url(); ?>images/11.png" /></i><span class="title">Español</span></a></li>
<li><a class="item "><i class="flag1"><img src="<?php echo site_url(); ?>images/12.png" /></i><span class="title">Español</span></a></li!-->




</ul>	

</div>
</div>



<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle">
	<span class="navbar-toggler-icon">
		<span class="ti ti-align-justify"></span>
	</span>
</button>

<div class="collapse navbar-collapse justify-content-end" id="navbarToggle">
	<ul class="navbar-nav animated remove-animation" data-animate="fadeInDown" data-delay=".9">
<!--li class="nav-item"><a class="nav-link menu-link" href="#intro">What is ICO<span class="sr-only">(current)</span></a></li>
<li class="nav-item"><a class="nav-link menu-link" href="#tokenSale">Token Sale</a></li>
<li class="nav-item"><a class="nav-link menu-link" href="#roadmap">Roadmap</a></li>
<li class="nav-item"><a class="nav-link menu-link" href="#apps">Apps</a></li>
<li class="nav-item"><a class="nav-link menu-link" href="#team">Team</a></li-->
	<!-- <li class="nav-item"><a class="nav-link menu-link" href="#faq">MVP</a></li> -->
	<li class="nav-item"><a class="nav-link menu-link" target="_blank" href="<?php echo site_url() ?>assets/whitepaper_0.1.pdf"><?php echo $this->lang->line("whitepaper");?></a></li>
</ul>
<?php if (!$this->ion_auth->logged_in()){ ?>
<ul class="navbar-nav navbar-btns animated remove-animation" data-animate="fadeInDown" data-delay="1.15">
	<!--li class="nav-item"><a class="nav-link btn btn-sm btn-outline menu-link" href="#" data-toggle="modal" data-target="#registerModal">Sign up</a></li-->
	<li class="nav-item"><a class="nav-link btn btn-sm btn-outline menu-link main_imp" href="#" data-toggle="modal" data-target="#loginModal"><?php echo $this->lang->line("buy_tokens");?></a></li>
</ul>
<?php }else{ ?>
<ul class="navbar-nav navbar-btns animated remove-animation" data-animate="fadeInDown" data-delay="1.15">
	<li class="nav-item"><a class="nav-link btn btn-sm btn-outline menu-link testing" href="<?php echo base_url() ?>dashboard"><?php echo $this->lang->line("buy_tokens");?></a></li>
</ul>
<?php } ?>
</div>

</nav>
</div>
<!-- End Navbar -->

<!-- Banner/Slider -->
<div id="header" class="banner banner-full banner-tokensale d-flex align-items-center custom-header">
	<div class="container">
		<div class="banner-content">
			<div class="row align-items-center mobile-center">
				<div class="col-lg-6 col-md-12 order-lg-first lft">
					<div class="header-txt">
						<h1 class="animated" data-animate="fadeInUp" data-delay="1.55">KICK SPORTS MANAGER <br class="d-none d-xl-block"><?php echo $this->lang->line("your_marketplace");?><br class="d-none d-xl-block"><?php echo $this->lang->line("buying_selling");?>!</h1>
						<p class="lead animated" data-animate="fadeInUp" data-delay="1.65"><?php echo $this->lang->line('revlo');?><br class="d-none d-xl-block"> <?php echo $this->lang->line('fav_player');?>!  </p>
						<ul class="btns animated" data-animate="fadeInUp" data-delay="1.75">
							
							<li><a href="<?php echo site_url() ?>dashboard" class="btn"><?php echo $this->lang->line("join_us");?></a></li>
							
							<li><a href="<?php echo site_url() ?>assets/whitepaper_0.1.pdf" target="_blank" class="btn btn-alt"><?php echo $this->lang->line("whitepaper");?></a></li>


						</ul>
					</div>
				</div><!-- .col  -->
				<div class="col-lg-6 col-md-12 order-first res-m-bttm-lg">
					<div class="header-image-alt animated" data-animate="fadeInRight" data-delay="1.25">
						<img class="test_visible" src="<?php echo site_url(); ?>images/header-image-blue.png" alt="header">
					</div>

					<div class="countdown-box countdown-transparent text-center animated" data-animate="fadeIn" data-delay="1.85">
						<span class="extra-line"></span>
						<h6 class="animated" data-animate="fadeInUp" data-delay="1.95"><?php echo $this->lang->line("ico_sale_is_open");?></h6>
						<?php date_default_timezone_get(); $today = date('Y-m-d');?>  
							<?php date_default_timezone_get();$today = date('Y/m/d');if($today < '2018/07/13'){?>
						<div class="token-countdown d-flex align-content-stretch animated" data-animate="fadeInUp" data-delay="2.05" data-date="2018/07/13"></div>
						<?php }else{?>
						<div class="token-countdown d-flex align-content-stretch animated" data-animate="fadeInUp" data-delay="2.05" data-date="2018/10/12"></div>
						<?php } ?>  
						
						
						<div class="token-status-bar animated" data-animate="fadeInUp" data-delay="2.15">
							<div class="token-status-percent" style="width:0%;"></div>
			<!-- 				<span class="token-status-point token-status-point-2" style="left:15%;"><?php echo $this->lang->line("soft_cap");?></span>
			<span class="token-status-point token-status-point-1" style="left:50%;"><?php echo $this->lang->line("pre_sale");?></span> -->

			<!-- 	<span class="token-status-point token-status-point-3" style="left:70%;"><?php echo $this->lang->line("hard_cap");?></span> -->

		</div>
		<div class="animated" data-animate="fadeInUp" data-delay="2.25">

			<a href="<?php echo site_url(); ?>dashboard" class="btn btn-alt btn-sm" data-toggle="modal" data-target="#loginModal"><?php echo $this->lang->line("purchase_kick_now");?></a>

		</div>
	</div>

</div>
</div><!-- .col  -->
</div><!-- .row  -->
</div><!-- .banner-content  -->
</div><!-- .container  -->
</div>
<!-- End Banner/Slider -->
<div class="header-partners">
	<div class="container">
		<div class="row align-items-center">
			<ul class="partner-list-s2 d-flex flex-wrap align-items-center">
				<li class="animated for-text" data-animate="fadeInUp" data-delay="1.85"><?php echo $this->lang->line("our_partners");?></li>
				<li class="animated" data-animate="fadeInUp" data-delay="1.9"><a href="#"><img src="<?php echo site_url(); ?>images/partner-nike.png" alt="partner"></a></li>
				<li class="animated" data-animate="fadeInUp" data-delay="1.95"><a href="#"><img src="<?php echo site_url(); ?>images/partner-adidas.png" alt="partner"></a></li>
				<li class="animated" data-animate="fadeInUp" data-delay="2"><a href="#"><img src="<?php echo site_url(); ?>images/partner-puma.png" alt="partner"></a></li>
				<li class="animated" data-animate="fadeInUp" data-delay="2.05"><a href="#"><img src="<?php echo site_url(); ?>images/partner-sport.png" alt="partner"></a></li>

			</ul>
		</div><!-- .row  -->
	</div><!-- .container  -->
</div><!-- .header-partners  -->
<a href="#intro" class="scroll-down menu-link"><?php echo $this->lang->line('scroll_down');?></a>
</header>
<!-- End Header -->

<!--- Login Modal -->
<div id="loginModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<!--<h4 class="modal-title">Login</h4>-->
				<div class="tab-bar-new">
					<div id="tabl" class="tab2 active">
						<span id="log_in"><?php echo $this->lang->line("Login");?></span>
					</div>
					<div id="tabr" class="tab2">
						<span id="reg_win"><?php echo $this->lang->line("Register");?></span>
					</div>
				</div>
			</div>
			<div class="modal-body" id="log_win">
				<div id="infoMessage"><?php echo $this->session->flashdata('message');?></div>
				<div id="opeee">
					<?php echo form_open("login",array('id' => 'loginSubmit'));?>      
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Email" required="required" name="identity">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" required="required" name="password">
					</div>
					<!-- <div class="check-row"><a href="/password-reset-init"><span>Forgot password?</span></a></div> -->
					<div class="form-group">
						<button type="button" class="btn btn-primary btn-block" onclick="submitForm();">
							<div class="loader" style="display:none;"></div><?php echo  $this->lang->line('Login');?></button>
						</div>
						<?php echo form_close();?>
					</div>
					<div class="put_text" style="display:none">
						<form method="post" class="formsubmit">
							<input type="hidden" name="type" value="check"> 
							<input type="hidden" name="userId"  id="userId"> 
							<input type="hidden" name="identity"  id="identity"> 
							<input type="hidden" name="password"  id="password"> 
							<div class="input">
								<input type="text" name="token"  placeholder="Google Aunthenticator Token" class="form-control">
							</div><span></span>
							<div class="errors"></div>
							<div class="input">
								<button class="button blue" type="button" onclick="formsubmit1();"><div class="loader" style="display:none;"></div><?php echo  $this->lang->line('Login');?></button>
							</div><span></span>
						</form>
					</div>
				</div>
				<div style="display:none" class="modal-body" id="reg_form">
					<h1></h1>
					<div id="infoMessage1"></div>
					<?php echo form_open("register",array('id' => 'registerSubmit'));?>
					<?php
					?>     
					<input type="hidden" value="<?php if(isset($_GET['r_id'])){ echo $ref_id = $_GET['r_id'];}else{ echo $ref = 0;}?>" name="link">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Email" required="required" name="identity">
					</div>
					<div id="infoMessage2"></div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" required="required" name="password">
					</div>
					<div id="infoMessage3"></div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Confirm Password" required="required" name="password_confirm">
					</div> 
					<div class="check-row"><span class=""><input type="checkbox" class="checkbox" name="agree" id="chk-agree"><label for="chk-agree"><span class="agree-text"><span><?php echo $this->lang->line("confirm");?><a target="_blank" href="/terms">
						<?php echo $this->lang->line("term_conditions");?></a>,<?php echo $this->lang->line("legal_age");?></span></span></label></span></div>
						<div class="form-group">
							<button type="button" class="btn btn-primary btn-block" onclick="registerForm();"><div class="loader" style="display:none;"></div><?php echo $this->lang->line("Register");?><?php //echo  lang('create_user_submit_btn') ?></button>
						</div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div>
		<style>

		.loader {
			border: 16px solid #f3f3f3; /* Light grey */
			border-top: 16px solid #3498db; /* Blue */
			border-radius: 50%;
			width: 1px;
			height: 1px;
			animation: spin 2s linear infinite;
		}
		.token-status-bar .progress{
			height: 19px;
			background-image: linear-gradient(-270deg,#379bf4,#6e1dbf);
			box-shadow: 0 0 1px 0 rgba(0,8,125,.5);
		}
		.theme-dark .io-azure .io-azure-pro .no-touch .loaded{
			top:0px!important;
		}

		@keyframes spin {
			0% { transform: rotate(0deg); }
			100% { transform: rotate(360deg); }
		}
		</style>
		<!--Script starts here -->
		<script>
		// $("#openpopup").click(function(){
  //       $(".modal").show();
		// });
$('#reg_win').click(function(){
	$('#reg_form').show();
	$('#log_win').hide(); 
	$('#tabl').removeClass('active');
	$('#tabr').addClass('active');


});
$('#log_in').click(function(){
	$('#log_win').show();
	$('#reg_form').hide();
	$('#tabl').addClass('active');
	$('#tabr').removeClass('active');
});

function submitForm(){
	$(".loader").show();
	$.ajax({
		type : "POST",
		url : "<?php echo base_url(); ?>index.php/User/login",
				data : $("#loginSubmit").serialize(), // Add your form data as inputname1=value1&inputname2=value2....
				success : function(data) {
		
					$(".loader").hide();

				// /alert(data);
				$("#infoMessage").html('<div class="alert alert-warning"><strong>'+data+'</strong></div>');
				$(".alert-warning").fadeTo(2000, 500).slideUp(500, function(){
					$(".alert-warning").slideUp(500);
				});

				var data2 = JSON.parse(data);

				if(data2.userId != ''){
					$("#infoMessage").hide();
					$(".put_text").show();
					$("#opeee").hide();
					$('#userId').val(data2.userId);
					$('#identity').val(data2.identity);
					$('#password').val(data2.password);
				}
				if(data == 1)
				{
					$(".put_text").hide();
					window.location = "<?php echo base_url(); ?>index.php/User/dashboard";
				}


			}	
		});
}
function formsubmit1(){
	$(".loader").show();
	$.ajax({
		type : "POST",
		url : "<?php echo base_url(); ?>index.php/User/enablelogin",
				data : $(".formsubmit").serialize(), // Add your form data as inputname1=value1&inputname2=value2....
				success : function(data) {
					$(".loader").hide();
					if(data == 1){
						window.location = "<?php echo base_url(); ?>index.php/User/dashboard";
					}
					if(data == 2){
						$('.errors').show();
						$('.errors').html('<div class="alert alert-danger"><strong>Please Enter valid token</strong></div>');
						$(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
							$(".alert-danger").slideUp(500); 
						});

					}else{
						$("#infoMessage").show();
						$(".put_text").hide();
						$("#opeee").show();
						$('.infoMessage').html('<div class="alert alert-danger"><strong>'+data+'</strong></div>');
						$(".alert-danger").fadeTo(2000, 500).slideUp(500, function(){
							$(".alert-danger").slideUp(500); 
						});

					}
				}   
			});
}
function registerForm(){
	$('#infoMessage1').html('');
	var chk_val = $('#chk-agree').prop('checked');

	if(chk_val == false){
		$('#infoMessage1').html('<div class="alert alert-warning"><strong>Accept Terms & Conditions before registration</strong></div>');
		$(".alert-warning").fadeTo(2000, 500).slideUp(500, function(){
			$(".alert-warning").slideUp(500);
		});	
	}else{	
		$(".loader").show();
		$.ajax({
			type : "POST",
			url : "<?php echo base_url(); ?>index.php/User/register",
				data : $("#registerSubmit").serialize(), // Add your form data as inputname1=value1&inputname2=value2....
				success : function(data) {
					if(data==1){
						$("#tabr").removeClass("active");
						$("#tabl").addClass("active");
						$("#log_win").show();
						$("#reg_form").hide();
						$(".loader").hide();
					}else{
						$(".loader").hide();
						var data1 = JSON.parse(data);
						$("#infoMessage1").html('<div class="alert alert-warning"><strong>'+data1.message+'</strong></div>');
						$(".alert-warning").fadeTo(2000, 500).slideUp(500, function(){
							$(".alert-warning").slideUp(500);
						});

					}
				}	
			});

	}
}


var tokenbought = function() { 
	$.ajax({
		type: "POST",
		url: "<?php echo base_url();?>index.php/User/token_bought",

		dataType : "json",
		success: function(html){
			$('.token-status-bar .token-status-percent').css('width', (html)+'%');
                    //$('.token-status-bar .token-status-percent').text(html);
					//}
				}
			});
	setTimeout(tokenbought, 10000);

}
setTimeout(tokenbought, 10000);
</script>
