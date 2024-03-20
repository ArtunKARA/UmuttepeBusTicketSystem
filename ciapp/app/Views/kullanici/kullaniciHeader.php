<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	
<title>Umuttepe Turizm Gururla Sunar</title>
<link rel="icon" href="images/otobus3.png" type="icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Green Wheels Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="//cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>
<script>new WOW().init();</script>
	
<!--//end-animate-->
</head>
<body>
<!-- top-header -->
<div class="top-header">
	<div class="container">
		<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
			<li class="hm"><a href="/UmuttepeBusTicketSystem/ciapp/public"><i class="fa fa-home"></i>   Ana Sayfa</a></li>
			<!--<li class="prnt"><a href="javascript:window.print()">Print/SMS Ticket</a></li>-->
				
		</ul>
		<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s"> 
			<li class="tol">İletişim : 236 444 41 41</li>
			<?php
				if(isset($_SESSION['KullaniciTipi'])){
					$kullanici = $_SESSION;
					if($kullanici['KullaniciTipi'] == 0){
						echo '<li class="sigi"><a href="/UmuttepeBusTicketSystem/ciapp/public/kullanici" >'.$kullanici['Isim'].' </a></li>';
						echo '<li class="sigi"><a href="/UmuttepeBusTicketSystem/ciapp/public/logout" >/ Çıkış Yap</a></li>';
					}
					else if($kullanici['KullaniciTipi'] == 1){
						echo '<li class="sigi"><a href="/UmuttepeBusTicketSystem/ciapp/public/logout" >Çıkış Yap</a></li>';
					}
				}
				else{
					echo '<li class="sig"><a href="/UmuttepeBusTicketSystem/ciapp/public/kayitOl" >Kayıt Ol</a></li>';
					echo '<li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4" >/ Giriş Yap</a></li>';
				}
			?>
        </ul>
		<div class="clearfix"></div>
	</div>
</div>
<!--- /top-header ---->
<!--- header ---->
<div class="header">
	<div class="container">
		<div class="logo wow fadeInDown animated" data-wow-delay=".5s">
			<a href="/UmuttepeBusTicketSystem/ciapp/public">Umuttepe <span>Turizm</span></a>	
		</div>
		<div class="bus wow fadeInUp animated" data-wow-delay=".5s">
            <a href="index.html" class="buses active">BUSES</a>
            <a href="hotels.html">HOTELS</a>
        </div>
		<div class="lock fadeInDown animated" data-wow-delay=".5s"> 
			<li><i class="fa fa-lock"></i></li>
            <li><div class="securetxt">Hızlı &amp; Güvenli <br> ONLİNE ÖDEME</div></li>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--- /header ---->