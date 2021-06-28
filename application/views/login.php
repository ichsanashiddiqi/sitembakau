<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo "$judul"; ?></title>
		<meta charset="utf-8">		
		<meta name="description" content="A Tuts+ course">		
		<link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/balittas.css">
		<link href="<?php echo base_url() ?>assets/icon/Logo-Kementerian-Pertanian.png" rel="shortcut icon">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body style="background-color: rgb(28,69,26);">
		<?php 
			if (isset($coba)) { ?>			
			<div align="center" style="margin-top: 100px;">				
				<div class="alert alert-warning fade in text-center" style="width: 40%;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<p><strong>Password salah!</strong></p>
				</div>
			</div>
			<?php  } ?>		
		<div class="text-center" style="margin-top: 100px; background-color: none;">
			<a href="<?php echo site_url() ?>"><img src="<?php echo base_url() ?>assets/icon/Logo-Kementerian-Pertanian.png" style="width:150px;height: auto; margin-top: 45px"></a>
		</div>
		<div style="background-color: none;" align="center">			
			<div style="background-color:orange; width: 350px;border-radius: 5px;" class="text-center">
				<form method="post" action="<?php echo site_url('admin/login')?>" style="margin:15px 30px;padding-top: 30px;padding-bottom: 30px;">
					<div class="input-group">
	    				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	    				<input id="email" type="text" class="form-control" name="username" placeholder="Username" required="">
	 				</div>
	 				<br>
				  	<div class="input-group">
				    	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				    	<input id="password" type="password" class="form-control" name="password" placeholder="Password" required="">
				  	</div>
				  	<br>
				  	<button type="submit" class="btn btn-success" style="width: 290px;font-family: monion pro"><b>Masuk</b></button>
				</form>
			</div>				
		</div>					
	</body>
	<br>
	<footer>
		<div style="color:white;" class="text-center">
			<p style="font-family: calibri"><span class="glyphicon glyphicon-copyright-mark"></span> 2018 All Reserved Design By BALITTAS</p>
		</div>
	</footer>			
</html>
