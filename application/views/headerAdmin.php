<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>Admin - Balai Penelitian Tanaman Pemanis dan Serat</title>
		<meta charset="utf-8">
		<!-- <link href="gambar/logo.png" rel="shortcut icon"> -->
		<meta name="description" content="A Tuts+ course">
		<meta name="author" content="Gusna Ikhsan">		
		<!-- <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.css"> -->
		<link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/balittas.css">
		<link href="<?php echo base_url() ?>assets/icon/Logo-Kementerian-Pertanian.png" rel="shortcut icon">

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="thetop"></div>
		<header>
			<?php			
				if (!empty($judul)) { ?>
					<div class="hidden-md hidden-lg" style="background-color: rgb(28,69,26); height: 70px;"></div>			
			<?php 
				} ?>		
			<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: rgba(28,69,26,1)">
				<div class="container-fluid">
				    <div class="navbar-header" style="margin-top: 5px; margin-bottom: 3px;">
				    	<!-- <img src="<?php //echo base_url() ?>item img/logobalittas.png" style="width:280px; margin-left: 5px;"> -->
				    	<img src="<?php echo base_url() ?>assets/icon/logobalittasadmin.png" style="width:422px; margin-left: 5px;">
				    </div>			
				    <div class="collapse navbar-collapse">			    
					    <ul class="nav navbar-nav navbar-right" style="margin-top: 10px;margin-right: 0px;">
					      	<!-- <a href="<?php echo base_url() ?>" class="glyphicon glyphicon-home dropbtnHeader" style="text-decoration-line: none;font-size: 14px;"></a> -->
					      	<div class="dropdownHeader">							  								  	
							  	<a href="<?php echo site_url('admin/logout'); ?>" style="text-decoration-line: none;"><div class="dropbtnHeader" style="font-family: Minion Pro; cursor: pointer;">Logout &nbsp<i class="glyphicon glyphicon-log-out" style="font-size:14px;"></i></div></a>
							</div>																			      		     
					    </ul>				    
				    </div>				    
				</div>
			</nav>										
			<!-- gambar tengah -->			
			<?php
				if (empty($judul)) { ?>
					<div class="containerImg">
						<img style="width: 100%">
							<source src="<?php echo base_url() ?>assets/Gambar/Untitled-1.gif" type="gif">
						</img>			  				 	
					</div>							
			<?php
				} else { ?>
					<!-- <div class="containerImg">
						<img src="<?php echo base_url() ?>item img/tembakauHeader.jpg" alt="" style="width: 100%;">
					 	<div class="contentImg text-center">
						    <h1 class="hidden-xs hidden-sm" style="margin-top:12%;font-size:5vw; font-family: futura md bt;"><?php echo $judul; ?></h1>
						    <h1 class="hidden-md hidden-lg" style="margin-top:6vw;font-size:5vw; font-family: futura md bt;"><?php echo $judul; ?></h1>
					  	</div>
					</div> -->
			<?php
				} ?>
		</header>
	</body>
	<script>
		//JS for scroll to top
		$(window).scroll(function() {
		    if ($(this).scrollTop() > 50 ) {
		        $('.scrolltop:hidden').stop(true, true).fadeIn();
		    } else {
		        $('.scrolltop').stop(true, true).fadeOut();
		    }
		});
		$(function(){$(".scroll").click(function(){$("html,body").animate({scrollTop:$(".thetop").offset().top},"1000");return false})})
	</script>
</html>
