<!DOCTYPE html>
<html lang="en">
	<body>
		<br>
		<!-- content -->
		<div class="container">
			<div class="row">		
				<div class="col-sm-9 col-lg-9">
				    <ul class="breadcrumb" style="margin: -6px 0px -10px -15px;">
					  	<li><a href="<?php echo base_url() ?>">Beranda</a></li>
					  	<li><a href="<?php echo base_url("produk/$url") ?>">Produk</a></li>
						<li class="active"><?php echo $kategori; ?></li> 
					</ul>
					<h3 class="text-left" style="color:black; font-family: Minion Pro"><?php echo $kategori; ?></h3>
					<hr style="border-color: grey;margin-top: -8px;">
					<div class="row">
						<div class="thumbku" style="box-shadow: 2px 5px 7px 5px rgba(0,0,0,0.2); border-color: white; color: #fece00;">					
							<img src="<?php echo base_url()?>assets/varietas/default.jpg" alt="" style="width: 100%;border-radius: 3px;">				
							<br>
							<table class="table" style="margin-bottom: -10px;">
								<tbody>
									<tr style="border-top: 2px solid white !important;">
										<td class="text-center"><h2><b>Masih dalam proses pengerjaan!</b></h2></td>
									</tr>
								</tbody>
							</table>
							<br>															
						</div>																		
						<!-- <div class="col-xs-12 col-sm-6 col-lg-6"> 
							<div class="thumbnail" style="box-shadow: 2px 5px 7px 5px rgba(0,0,0,0.2); border-color: white;">	
								<div style="color:#fece00;background-color: rgb(28,69,26); height:30px;margin-top: -10px;border-radius: 2px;margin-bottom: 5px;">
									<h4 style="padding-top: 7px;" class="text-center">VARIETAS NC 471</h4>
								</div>
								<img src="<?php echo base_url()?>item img/tembakau.jpg" alt="" style="width: 100%;border-radius: 3px;">				
								<br>
								<table class="table" style="margin-bottom: -10px;">
									<tbody>
										<tr style="border-top: 2px solid white !important;">
											<td><b>skdfsd</b></td>
											<td>jakfgkabf</td>
										</tr>
										<tr>
											<td><b>skdfsd</b></td>
											<td>jakfgkabf</td>
										</tr>										
									</tbody>
								</table>
								<br>															
							</div>						
						</div> -->
						<!-- <div class="col-xs-12 col-sm-6 col-lg-6"> 
							<div class="thumbnail" style="box-shadow: 2px 5px 7px 5px rgba(0,0,0,0.2); border-color: white;">	
								<div style="color:#fece00;background-color: rgb(28,69,26); height:30px;margin-top: -10px;border-radius: 2px;margin-bottom: 5px;">
									<h4 style="padding-top: 7px;" class="text-center">VARIETAS NC 471</h4>
								</div>
								<div class="row">
									<div class="col-xs-6 col-sm-6 col-lg-6"> 
										<img src="<?php echo base_url()?>item img/tembakau.jpg" alt="" style="width: 106%;border-radius: 3px;">				
									</div>
									<div class="col-xs-6 col-sm-6 col-lg-6"> 
										<img src="<?php echo base_url()?>item img/tembakau.jpg" alt="" style="width: 106%;border-radius: 3px;margin-left: -12px;">				
									</div>
								</div>
								<br>
								<table class="table" style="margin-bottom: -10px;">
									<tbody>
										<tr style="border-top: 2px solid white !important;">
											<td><b>skdfsd</b></td>
											<td>jakfgkabf</td>
										</tr>
										<tr>
											<td><b>skdfsd</b></td>
											<td>jakfgkabf</td>
										</tr>										
									</tbody>
								</table> 	
								<br>															
							</div>						
						</div> -->
					</div>					
				</div>				
				<div class="col-sm-3 col-lg-3">
					<br>
					<h3 class="text-left" style="color:black;font-family: Minion Pro">Pencarian</h3>
					<hr style="border-color: grey;margin-top: -8px;">
					<div class="container-fluid" style="background-color:rgba(28,69,26,0.9);border-radius: 5px;">
						<form method="get" action="<?php echo base_url('pencarian'); ?>" style="margin-top: 15px; margin-bottom: 15px;">
							<div class="input-group" style="z-index: 0;">
							    <input type="text" class="form-control" placeholder="Cari" name="keyword" required>
							    <div class="input-group-btn">
							      <button class="btn btn-success" type="submit">
							        <i class="glyphicon glyphicon-search"></i>
							      </button>
							    </div>
							 </div>
						</form>						
					</div>
					<a href="<?php echo base_url() ?>leaflet" style="text-decoration-line:none;" title="Klik untuk menuju halaman leaflet"><h3 class="text-left" style="color:black;font-family: Minion Pro">Leaflet</h3></a>
					<hr style="border-color: grey;margin-top: -8px;">					
					<?php 
						$ganjil = true;
						foreach ($subLeaflet as $leafletSide) {
							if ($ganjil) {
							
					?>	
					<h5 style="color:black;"><?php echo $leafletSide->nama_leaflet; ?></h5>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-lg-6">													 
							<img class="leafletImg" src="<?php echo base_url() ?>assets/leaflet/<?php echo $leafletSide->file; ?>" class="image" style="width: 110%;border-radius: 3px;">						
						</div>
					<?php 	$ganjil = false; } else { ?> 
						<div class="col-xs-6 col-sm-6 col-lg-6">
							<img class="leafletImg" src="<?php echo base_url() ?>assets/leaflet/<?php echo $leafletSide->file; ?>" class="image" style="width: 110%;border-radius: 3px; margin-left: -10px;">
						</div>						
					</div>
					<?php $ganjil = true; } } ?>	
				</div>
			</div>								
		</div>
		<!-- MODALS -->
		<div id="myModal" class="modalLeaflet">
		  <span class="closeModal" style="margin-top: 50px; margin-left: 15px;">&times;</span>
		  <img class="modalLeaflet-content" id="imgModal">
		</div>
		<script>
		// Get the modal
		var modal = document.getElementById('myModal');

		// Get the image and insert it inside the modal - use its "alt" text as a caption
		var max = document.getElementsByClassName("leafletImg");
		for (var i = 0; i < max.length; i++) {
			var img = document.getElementsByClassName("leafletImg")[i];
			var modalImg = document.getElementById("imgModal");
			img.onclick = function(){
			    modal.style.display = "block";
			    modalImg.src = this.src;
			}
		}

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("closeModal")[0];

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() { 
		    modal.style.display = "none";
		}
		</script>
		<!-- END OF MODALS -->
	</body>	
	<br><br><br>
	
</html>