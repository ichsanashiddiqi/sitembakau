<!DOCTYPE html>
<html>
	<body>
		<!-- CONTENT -->
		<div class="container">
			<ul class="breadcrumb" style="margin-bottom: 0px;margin-top: 15px;">
				<li><a href="<?php echo base_url() ?>">Beranda</a></li>
				<li class="active">Agribisnis Tembakau</li>
			</ul>
			<div class="row">
				<div class="col-sm-9 col-lg-9">
					<hr style="border-color: grey;margin-top: 3px;">
					<?php
						$deskripsiAgribisnis = "";
						foreach ($agribisnis as $row) {
							if (strlen($row->deskripsi_agribisnis) > 537) {
								$deskripsiAgribisnis = substr($row->deskripsi_agribisnis, 0, 537)." ...";
							} else {
								$deskripsiAgribisnis = $row->deskripsi_agribisnis;
							}
					?>
							<div class="row">
								<div class="col-sm-4 col-lg-4">
									<img src="<?php echo base_url() ?>assets/gambarAgribisnis/<?php echo $row->gambar_agribisnis; ?>" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
								</div>
								<div class="col-sm-8 col-lg-8">
									<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;"><?php echo $row->jenis_agribisnis; ?></p>
									<p><?php echo $deskripsiAgribisnis; ?></p>	
									<div class="text-right">						
										<a href="<?php echo base_url('index.php/agribisnis/jenis/').urlencode(strtolower($row->jenis_agribisnis)); ?>">
											<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Selengkapnya</i></p></button>
										</a>
									</div>
								</div>
							</div>
							<hr>
					<?php
						}
					?>

				</div>
				<div class="col-sm-3 col-lg-3">
					
					<h3 class="text-left" style="color:black; margin-top: -25px; font-family: helmet">Pencarian</h3>
					<hr style="border-color: grey;margin-top: -8px;">
					<div class="container-fluid" style="background-color:rgba(28,69,26,0.9);border-radius: 5px;">
						<form method="get" action="<?php echo base_url('pencarian'); ?>" style="margin-top: 15px; margin-bottom: 15px;">
							<div class="input-group" style="z-index: 0">
							    <input type="text" class="form-control" placeholder="Cari" name="keyword" required>
							    <div class="input-group-btn">
							      <button class="btn btn-success" type="submit">
							        <i class="glyphicon glyphicon-search"></i>

							      </button>
							    </div>
							 </div>
						</form>						
					</div>
					<a href="<?php echo base_url('leaflet') ?>" style="text-decoration-line:none;" title="Klik untuk menuju halaman leaflet"><h3 class="text-left" style="color:black;font-family: helmet">Leaflet</h3></a>
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
	<br><br>
	
</html>
