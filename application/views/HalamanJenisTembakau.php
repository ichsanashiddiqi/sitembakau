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
						<li><a href="<?php echo base_url() ?>">Varietas</a></li>
						<li><a href="<?php echo base_url("varietas/jenistembakau/$url") ?>">Jenis Tembakau</a></li>
						<li class="active"><?php echo $kategori; ?></li> 
					</ul>
					<h3 class="text-left" style="color:black; font-family: helmet">Berdasarkan <?php echo $kategori; ?></h3>
					<hr style="border-color: grey;margin-top: -10px;">

				
					<?php 
// JENIS TEMBAKAU BERDASARKAN KEGUNAAN DAN DAERAH PENANAMAN	-------------------------------------------------------------------------------------
						if ($kategori == "Kegunaan" || $kategori == "Sentra Penanaman Jenis Tembakau") { ?>
							<table class="table table-hover" style="margin-top: -7px;">
								<thead style="background-color: rgba(28,69,26,0.9);border-bottom: 3px solid white; color:#fece00;">
									<th>No</th>
									<th class="text-center">Jenis</th>
									<th class="text-center"><?php echo $kategori; ?></th>							
								</thead>
								<tbody>
								<?php
									$value = ""; $indeks = 0;
									foreach ($jenistembakau as $row) {
										if ($kategori == "Kegunaan") {
											$value = $row->kegunaan;
										} else if ($kategori == "Sentra Penanaman Jenis Tembakau") {
											$value = $row->daerah_penanaman;
										}
								 ?>
									<tr>
										<td><?php echo $indeks + 1; ?></td>
										<td style="color:rgb(242,97,5);"><b><?php echo $row->jenis_tembakau; ?></b></td>
										<td><?php echo $value; ?></td>								
									</tr>
								<?php
										$indeks++; 
									}
								?>
								</tbody>
							</table>
					<?php 
							if ($kategori == "Kegunaan") {
								echo "<br>
									<p><b>Catatan:</b></p>
									<p><b>*Shag</b> = tembakau rajangan halus untuk rokok tingwe (linting dewe).</p>";
							}

// JENIS TEMBAKAU BERDASARKAN ASAL-USUL DAN DAERAH PENGEMBANGAN	-------------------------------------------------------------------------------------
							
						} else if ($kategori == "Asal-usul" || $kategori == "Daerah Pengembangan Varietas Tembakau") { ?>
							<table class="table table-hover" style="margin-top: -7px;">
								<thead style="background-color: rgba(28,69,26,0.9);border-bottom: 3px solid white; color:#fece00;">
									<th class="text-center">No</th>
									<th class="text-center">Varietas</th>
									<th class="text-center"><?php echo $kategori; ?></th>							
								</thead>
								<tbody>
								<?php 
									if($this->uri->segment(4)){
					                     $count = $this->uri->segment(4);
					                } else{
					                     $count = 0;
					                }
									
									foreach ($dataJenisTembakau as $row) {
										$count++;
								 ?>
									<tr>
										<td><?php echo $count; ?></td>
										<td><a href="<?php echo base_url('index.php/varietas/detailvarietas/').urlencode(strtolower($row->nama_varietas)) ?>" style="text-decoration-line:none;" class="teknologiBudidaya" title="Klik untuk melihat detil varietas"><b><?php echo $row->nama_varietas ?></b></a></td>
										<td><?php echo $row->detail_value; ?></td>								
									</tr>
								<?php 
									// $count++;
									}
								 ?>
								</tbody>
							</table>
							<br>
							<div>
								<ul class="paginationKu pagerCustom" >
									<?php foreach ($links as $link) {
										echo "<li>". $link."</li>";
										// echo $jumlah;
									} ?>
								</ul>
							</div>

					<?php
// JENIS TEMBAKAU BERDASARKAN WAKTU TANAM ------------------------------------------------------------------------------------------------------------
						} else if ($kategori == "Waktu Tanam") {
							$indeks = 0;
							$indeksTerpilih = explode('%23keyword%3D', $value);
							echo "<div style=\"margin-top:-7px;\">";
							foreach ($waktutanam as $row) {
								if ($indeksTerpilih[0] == $row->id_waktu_tanam) {
									echo "<input hidden id=\"keyword\" value=\"".urldecode($indeksTerpilih[1])."\">";
									echo "<button class=\"accordion actived\" style=\"border-bottom: 2px solid white;\"><strong class=\"pencarian\">$row->nama_file</strong></button>
										<div class=\"container-fluid panel\" style=\"display: block;\">";
								} else {
									echo "<button class=\"accordion\" style=\"border-bottom: 2px solid white;\"><strong class=\"pencarian\">$row->nama_file</strong></button>
										<div class=\"container-fluid panel\">";
								}								
								$deskripsiWaktuTanam = explode("</p>", $row->deskripsi);
					?>
								<br>
									<?php 
										for ($i = 0; $i < count($deskripsiWaktuTanam); $i++) { 
											echo "<p style=\"text-indent: 0.5in;\" class=\"pencarian\">".$deskripsiWaktuTanam[$i]."</p>";
										}
									?>
									<br>
									<p style="color: #5cb85c;"><b>Catatan:</b></p>
									<p>Pembahasan lebih lanjut monograf <b class="pencarian"><?php echo $row->nama_file; ?></b> dapat diunduh <a href="<?php echo base_url() ?>assets/waktutanam/<?php echo $row->file; ?>" target="blank" class="hoverThumbnail" style="text-decoration-line: none"><b>di sini</b></a>.</p>
									<br>
								</div>
					<?php
								$indeks++;
							}
							echo "</div>";
						}
// --------------------------------------------------------------------------------------------------------------------------------------------------
					?>				
				</div>				
				<div class="col-sm-3 col-lg-3">
					<br>
					<h3 class="text-left" style="color:black;font-family: helmet">Pencarian</h3>
					<hr style="border-color: grey;margin-top: -10px;">
					<div class="container-fluid" style="background-color:rgba(28,69,26,0.9);border-radius: 5px;margin-top: -7px;margin-bottom: -8px;">
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
					<a href="<?php echo base_url() ?>leaflet" style="text-decoration-line:none;" title="Klik untuk menuju halaman leaflet"><h3 class="text-left" style="color:black;font-family: helmet">Leaflet</h3></a>
					<hr style="border-color: grey;margin-top: -10px;margin-bottom: 0px;">					
					<?php 
						$ganjil = true;
						foreach ($subLeaflet as $leafletSide) {
							if ($ganjil) {
							
					?>	
					<h5 style="color:black;"><?php echo $leafletSide->nama_leaflet; ?></h5>
					<div class="row" style="margin-top: -5px;">
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
			//-------------------------------------------MODAL LEAFLET SAMPING--------------------------------------
			var modal = document.getElementById('myModal');
			var max = document.getElementsByClassName("leafletImg");
			for (var i = 0; i < max.length; i++) {
				var img = document.getElementsByClassName("leafletImg")[i];
				var modalImg = document.getElementById("imgModal");
				img.onclick = function(){
				    modal.style.display = "block";
				    modalImg.src = this.src;
				}
			}
			var span = document.getElementsByClassName("closeModal")[0];
			span.onclick = function() { 
			    modal.style.display = "none";
			}

			//-----------------------------------------SCRIPT ACCRODION----------------------------------------------
			var acc = document.getElementsByClassName("accordion");
			for (var i = 0; i < acc.length; i++) {
			    acc[i].addEventListener("click", function() {
			        this.classList.toggle("actived");
			        var panelAccordion = this.nextElementSibling;
			        if (panelAccordion.style.display === "block") {
			            panelAccordion.style.display = "none";
			        	this.setAttribute('title', 'Klik untuk lebih detil');
			        } else {
			            panelAccordion.style.display = "block";
						this.setAttribute('title', 'Klik untuk menyembunyikan');
			        }
			    });
			}
			//---------------------------------------SCRIPT HIGHLIGHT-----------------------------------------------
			var option = {
				color: "rgb(28,69,26)",
				background: "rgba(92,184,92,0.5)",
				bold: false,
				class: "high",
				ignoreCase: true,
				wholeWord: false
			}
			$(function(){
				searchCnt = $(".pencarian").highlight($('#keyword').val(), option);
			});
		</script>
	<!-- END OF MODALS -->
	</body>	
	<br><br><br>
	
</html>
