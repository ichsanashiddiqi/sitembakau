<!DOCTYPE html>
<html lang="en">
	<body>
		<br>
		<!-- content -->
		<div class="container">			
				<ul class="breadcrumb" style="margin: -6px 0px -10px -15px;">
					  	<li><a href="<?php echo base_url() ?>">Beranda</a></li>
					  	<li class="active">Pencarian</li> 
				</ul>			
				<br><br>										
				<div class="container-fluid" style="background-color:rgba(28,69,26,0.9);border-radius: 5px; width: 60%;">
					<form method="get" action="<?php echo site_url('pencarian')?>" style="margin-top: 15px; margin-bottom: 15px;">
						<div class="input-group" style="z-index: 0;">
							<input type="text" name="keyword" class="form-control" placeholder="Cari" id="fieldCari" value="<?php echo $keyword; ?>" required>
							<div class="input-group-btn">
							    <button class="btn btn-success" type="submit">
							    	<i class="glyphicon glyphicon-search"></i>
							    </button>
							</div>
						</div>
					</form>						
				</div>
				<br>
				<h3 style=" font-style: italic;">Hasil pencarian<span class="matche-cnt"><span id="jumlahTerkait"></span> terkait</span></h3>
				<hr style="margin-top: -6px;">
				<input hidden id="keyword" value="<?php echo $keyword; ?>">


				<!-- PENCARIAN VARIETAS -->
				<?php
					$jumlahHasilPencarian = 0;
					$tempNamaVarietas = ""; 
					foreach ($pencarianVarietas as $row) {
						$narasi = "";
						if (strlen($row->narasi) > 556) {
							$narasi = substr($row->narasi, 0, 556)." <span style='color:#fece00; font-style:italic;'>(Selengkapnya)</span>";
						} else {
							$narasi = $row->narasi;
						}
						if ($tempNamaVarietas != $row->nama_varietas) {										
				 ?>
							<div>					
								<a href="<?php echo site_url('varietas/detailvarietas/').urlencode(strtolower($row->nama_varietas))."%23keyword%3D$keyword"; ?>" style="text-decoration-line: none;" class="teknologiBudidaya">						
									<h3 class="pencarian"><span><?php echo "$row->nama_varietas"; ?></span></h3>
								</a>
								<p style="text-indent: 0.5in;" class="pencarian"><?php echo "$narasi"; ?></p>
								<a href="<?php echo site_url('pencarian')?>?keyword=%23varietas" style="text-decoration-line: none;"><span style="color: #fece00; font-style: italic;"><p class="glyphicon glyphicon-tags small"></p>&nbsp;&nbsp;varietas</span></a>	
								<hr style="margin-top: -2px;">
							</div>	
				<?php 
							$jumlahHasilPencarian++;
						}
						$tempNamaVarietas = $row->nama_varietas;
					}
				?>

				<!-- PENCARIAN WAKTU TANAM -->
				<?php 
					foreach ($pencarianWaktuTanam as $row) {
						$narasi = "";
						if (strlen($row->deskripsi) > 556) {
							$narasi = substr($row->deskripsi, 0, 556)." <span style='color:#fece00; font-style:italic;'>(Selengkapnya)</span>";
						} else {
							$narasi = $row->deskripsi;
						}											
				 ?>
						<div >					
							<a href="<?php echo site_url('varietas/jenistembakau/waktutanam')."%23$row->id_waktu_tanam%23keyword%3D$keyword"; ?>" style="text-decoration-line: none;" class="teknologiBudidaya">						
								<h3 class="pencarian"><span><?php echo "$row->nama_file"; ?></span></h3>
							</a>
							<p style="text-indent: 0.5in;" class="pencarian"><?php echo "$narasi"; ?></p>
							<a href="<?php echo site_url('pencarian')?>?keyword=%23varietas" style="text-decoration-line: none;"><span style="color: #fece00; font-style: italic;"><p class="glyphicon glyphicon-tags small"></p>&nbsp;&nbsp;varietas</span></a>					
							<hr style="margin-top: -2px;">
						</div>	
				<?php 
						$jumlahHasilPencarian++; 
					}
				?>
				

				<!-- PENCARIAN LEAFLET -->
				<?php
					$tempNamaLeaflet = ""; $indeks = 0;
					foreach ($pencarianLeaflet as $row) {
						if ($tempNamaLeaflet != $row->nama_leaflet) {											
				 ?>
							<div>					
								<a href="#" style="text-decoration-line: none;" class="teknologiBudidaya indeksGambar" >						
									<h3 class="pencarian"><span><?php echo "$row->nama_leaflet"; ?></span></h3>
								</a>
								<a href="<?php echo site_url('pencarian')?>?keyword=%23leaflet" style="text-decoration-line: none;"><span style="color: #fece00; font-style: italic;"><p class="glyphicon glyphicon-tags small"></p>&nbsp;&nbsp;leaflet</span></a>		
								<hr style="margin-top: -2px;">
							</div>
				<?php 
							if ($indeks == 0) {
								echo "<script>
							            document.getElementsByClassName('indeksGambar')[$indeks].onclick = function() {
							            	gambarLeaflet(\"".$pencarianLeaflet[$indeks]->file."\",\"".$pencarianLeaflet[$indeks+1]->file."\",\"".$pencarianLeaflet[$indeks]->nama_leaflet."\",\"".$pencarianLeaflet[$indeks+1]->nama_leaflet."\")
							            };
							          </script>";
							} else {
								echo "<script>
							            document.getElementsByClassName('indeksGambar')[$indeks].onclick = function() {
							            	gambarLeaflet(\"".$pencarianLeaflet[$indeks*2]->file."\",\"".$pencarianLeaflet[($indeks*2)+1]->file."\",\"".$pencarianLeaflet[$indeks*2]->nama_leaflet."\",\"".$pencarianLeaflet[($indeks*2)+1]->nama_leaflet."\")
							            };
							          </script>";
							}
							$jumlahHasilPencarian++;
						    $indeks++;
						}	
						$tempNamaLeaflet = $row->nama_leaflet;
					}
				?>


				<!-- PENCARIAN TEKNOLOGI -->
				<?php 
					foreach ($pencarianTekno as $row) {
						$narasi = "";
						if (strlen($row->deskripsi) > 556) {
							$narasi = substr($row->deskripsi, 0, 556)." <span style='color:#fece00; font-style:italic;'>(Selengkapnya)</span>";
						} else {
							$narasi = $row->deskripsi;
						}											
				 ?>
						<div>					
							<a href="<?php echo site_url('teknologibudidaya/index/').urlencode(strtolower($row->jenis_teknologi_budidaya))."%23keyword%3D$keyword"; ?>" style="text-decoration-line: none;" class="teknologiBudidaya">						
								<h3 class="pencarian"><?php echo "$row->jenis_teknologi_budidaya"; ?></h3>
							</a>
							<p style="text-indent: 0.5in;" class="pencarian"><?php echo "$narasi"; ?></p>
							<a href="<?php echo site_url('pencarian')?>?keyword=%23teknologibudidaya" style="text-decoration-line: none;"><span style="color: #fece00; font-style: italic;"><p class="glyphicon glyphicon-tags small"></p>&nbsp;&nbsp;teknologibudidaya</span></a>
							<hr style="margin-top: -2px;">
						</div>	
				<?php $jumlahHasilPencarian++; } ?>


				<!-- PENCARIAN AGRIBISNIS -->
				<?php 
					foreach ($pencarianAgribisnis as $row) {
						$narasi = "";
						if (strlen($row->deskripsi_agribisnis) > 556) {
							$narasi = substr($row->deskripsi_agribisnis, 0, 556)." <span style='color:#fece00; font-style:italic;'>(Selengkapnya)</span>";
						} else {
							$narasi = $row->deskripsi_agribisnis;
						}											
				 ?>
						<div>					
							<a href="<?php echo site_url('agribisnis/jenis/').urlencode(strtolower($row->jenis_agribisnis))."%23keyword%3D$keyword"; ?>" style="text-decoration-line: none;" class="teknologiBudidaya">						
								<h3 class="pencarian"><span><?php echo "$row->jenis_agribisnis"; ?></span></h3>
							</a>
							<p style="text-indent: 0.5in;" class="pencarian"><?php echo "$narasi"; ?></p>
							<a href="<?php echo site_url('pencarian')?>?keyword=%23agribisnis" style="text-decoration-line: none;"><span style="color: #fece00; font-style: italic;"><p class="glyphicon glyphicon-tags small"></p>&nbsp;&nbsp;agribisnis</span></a>					
							<hr style="margin-top: -2px;">
						</div>	
				<?php 
						$jumlahHasilPencarian++; 
					}

					if ($jumlahHasilPencarian == 0) {
						echo "<script>$(\"#jumlahTerkait\").text(\"$jumlahHasilPencarian\");</script>";
						echo "<h3 class=\"text-center\" style=\"font-family: futura md bt;\">Hasil untuk <b style=\"color: rgb(242,97,5);\">$keyword</b> tidak ditemukan!</h3>"; 	
					} else {
						echo "<script>
									$(\"#jumlahTerkait\").text(\"$jumlahHasilPencarian\");
							  </script>";
					}
				?>																
		</div>
		

		<!-- BAGIAN MODAL UNTUK PENCARIAN LEAFLET -->
		<div id="modalKu" class="modalSlider">
			<span class="closeSlider cursor" onclick="closeModal()">&times;</span>
			<div class="modalSlider-content">
				<div class="mySlidesSlider">
					<div class="numbertextSlider">1 / 2</div>
					<img src="" style="width:100%" class="imgLeaflet">
				</div>
				<div class="mySlidesSlider">
					<div class="numbertextSlider">2 / 2</div>
					<img src="" style="width:100%" class="imgLeaflet">
				</div>
				<a class="prevSlider" onclick="plusSlides(-1)" style="text-decoration-line: none;">&#10094;</a>
				<a class="nextSlider" onclick="plusSlides(1)" style="text-decoration-line: none;">&#10095;</a>
				<div class="caption-container" style="background-color: rgba(0,0,0,0.9);">
			     	<strong><p id="caption" class="text-center" style="color: white; padding-top: 15px;"></p></strong>
			    </div>
			</div>
		</div>
		<!-- PENUTUP BAGIAN MODAL -->

		<script>
			var searchCnt = 0;

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

			function gambarLeaflet(value1, value2, nama1, nama2) {
				document.getElementsByClassName('imgLeaflet')[0].src = "http://localhost/tembakau/assets/leaflet/" + value1;
				document.getElementsByClassName('imgLeaflet')[1].src = "http://localhost/tembakau/assets/leaflet/" + value2;
				document.getElementsByClassName('imgLeaflet')[0].alt = nama1;
				document.getElementsByClassName('imgLeaflet')[1].alt = nama2;

				document.getElementById('modalKu').style.display='block';
				showSlides(slideIndex);
			}

			//SCRIPT UNTUK MODAL PENCARIAN
			var slideIndex = 1;

			function openModal() {
			  document.getElementById('modalKu').style.display = "block";
			}

			function closeModal() {
			  document.getElementById('modalKu').style.display = "none";
			}

			function plusSlides(n) {
			  showSlides(slideIndex += n);
			}

			function currentSlide(n) {
			  showSlides(slideIndex = n);
			}

			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlidesSlider");
			  var dots = document.getElementsByClassName("imgLeaflet");
			  var captionText = document.getElementById("caption");
			  if (n > slides.length) {slideIndex = 1}
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
			      slides[i].style.display = "none";
			  }
			  
			  slides[slideIndex-1].style.display = "block";
			  captionText.innerHTML = dots[slideIndex-1].alt;
			}

		</script>
	</body>	
	<br><br><br>
	
</html>
