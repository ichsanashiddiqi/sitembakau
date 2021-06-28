<!DOCTYPE html>
<html lang="en">
	<body>
		<!-- <div class="thetop"></div> -->
		
		<br>
		<!-- content -->
		<div class="container">
			<div class="row">		
				<div class="col-sm-9 col-lg-9">
				    <ul class="breadcrumb" style="margin: -6px 0px -10px -15px;">
					  	<li class="active">Beranda</li> 
					  	<li></li>
					</ul>
				<h3 class="text-left" style="color:black; font-family: helmet">Varietas Unggul Baru</h3>
				<hr style="border-color: grey; margin-top: -10px;">
				<div class="row" style="margin-top: -7px;">
					<?php 
						foreach ($varietas as $row) {
							$namaVarietas = ""; $narasi = "";
							if (strlen($row->nama_varietas) > 30) {
								$namaVarietas = substr($row->nama_varietas, 0, 30)."...";
							} else {
								$namaVarietas = $row->nama_varietas;
							}

							$waktu = substr($row->waktu_upload, 0, 5);
					 ?>
					<div class="col-xs-12 col-sm-4 col-lg-4"> 
						<div class="thumbnail thumbku" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
							<a href="<?php echo site_url('varietas/detailvarietas/').urlencode(strtolower($row->nama_varietas)) ?>" style="text-decoration-line: none;">
								<?php 
									if (empty($row->file_gambar)) { ?>
										<img src="<?php echo base_url() ?>assets/varietas/tembakau.jpg" alt="" style="width: 100%;">
								<?php 
									} else { ?>
										<img src="<?php echo base_url() ?>assets/varietas/<?php echo $row->file_gambar; ?>" alt="" style="width: 100%;">
								<?php 
									}
								 ?>								
								<span class="label label-success"><p class="glyphicon glyphicon-calendar"></p> <?php echo $row->tanggal_upload ?></span>
								<span class="label label-warning"><p class="glyphicon glyphicon-time"></p> <?php echo $waktu; ?></span>	
								<h4 style="color:#fece00;" title="<?php echo $row->nama_varietas; ?>"><?php echo $namaVarietas; ?></h4>
							</a>
							
							<!-- DESKRIPSI -->
							<?php 
								// if (!empty($row->narasi)) {
								// 	$narasi = substr($row->narasi, 0, 25)." ...";
								// 	echo "<p>&nbsp $narasi</p>";
								// } else {
								// 	$narasi = "Belum ada deskripsi";
								// 	echo "<p style=\"font-style: italic; color:lightgrey;\">&nbsp $narasi</p>";
								// 	// echo "<br><br>";
								// }
							 ?>
							
							<br>							
							<div style="text-align: right; margin-bottom: 10px;margin-right: 10px;">
								<a href="<?php echo site_url('varietas/detailvarietas/').urlencode(strtolower($row->nama_varietas)) ?>" style="text-decoration-line: none;" class="hoverThumbnail"><i>Selengkapnya</i></a>
							</div>
						</div>						
					</div>
					<?php 
						}
					 ?>
				</div>
					<ul class="paginationKu pagerCustom" >
						<?php foreach ($links as $link) {
							echo "<li>". $link."</li>";
						} ?>
					</ul>
					<br>
				</div>				
				<div class="col-sm-3 col-lg-3">
					<br>
					<h3 class="text-left" style="color:black;font-family: helmet">Pencarian</h3>
					<hr style="border-color: grey;margin-top:  -10px;">
					<div class="container-fluid" style="background-color:rgba(28,69,26,0.9);border-radius: 5px;margin-top: -7px;margin-bottom: -8px;">
						<form method="get" action="<?php echo site_url('pencarian'); ?>" style="margin-top: 15px; margin-bottom: 15px;">
							<div class="input-group" style="z-index: 0;">
							    <input type="text" name="keyword" class="form-control" placeholder="Cari" required>
							    <div class="input-group-btn">
							      <button class="btn btn-success" type="submit">
							        <i class="glyphicon glyphicon-search"></i>
							      </button>
							    </div>
							 </div>
						</form>						
					</div>					
					<a href="<?php echo site_url('leaflet') ?>" style="text-decoration-line:none;" title="Klik untuk menuju halaman leaflet"><h3 class="text-left" style="color:black;font-family: helmet">Leaflet</h3></a>
					<hr style="border-color: grey;margin-top:  -10px; margin-bottom: 0px;">
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
			</div> <!-- akhir div container atas -->
			<br>
			
	
			<div class="container-fluid" style="background-color: rgba(28,69,26,0.8);">
				<div class="container">
				<!-- Produk -->
				<h3 class="text-center" style="color:white;font-family: helmet;"><strong>Produk</strong></h3>
				<p class="text-center" style="color: white;"><span style="font-size: 20px; font-weight: bold; font-family: hobo std; color: #fece00;">I</span> novasi teknologi yang paling strategis untuk mendukung pengembangan komoditas adalah varietas unggul. Penggunaan varietas unggul suatu komoditas mempunyai dampak yang sangat luas, antara lain dapat berpengaruh terhadap efisiensi biaya dalam budi daya, peningkatan produksi dan mutu, serta pemanfaatan lahan-lahan marginal, sehingga dapat berdampak sosial dan ekonomi yang cukup nyata bagi petani. Selain itu, penggunaan varietas unggul merupakan teknologi yang relatif mudah diterima dan diterapkan oleh petani.</p>
				<br><br>
				<div class="row" style="margin-top: -20px;">
				    <div class="col-xs-6 col-sm-3 col-lg-3">
					    <a href="http://balittas.litbang.pertanian.go.id/aplikasi/upbs-stok/" style="text-decoration-line: none;" onmouseover="hvr(this, 'in')" onmouseleave="hvr(this, 'out')">
					    	<div class="thumbnail text-center produk" style="background-color: rgba(28,69,26,0); border-style: none;" >
					    		<img src="<?php echo base_url() ?>assets/icon/hazelnutWh.png" style="width: 40%" col="g">
					    		<img src="<?php echo base_url() ?>assets/icon/hazelnutY.png" style="width: 40%; display:none;" col="b">
					    		<br>
								<h4 style="font-family: helmet;">Benih</h4>
					    	</div>
					    </a>
				    </div>
				    <div class="col-xs-6 col-sm-3 col-lg-3">
					    <a href="<?php echo site_url() ?>produk/alsin" style="text-decoration-line: none;" onmouseover="hvr(this, 'in')" onmouseleave="hvr(this, 'out')">
					    	<div class="thumbnail text-center produk" style="background-color: rgba(28,69,26,0); border-style: none">
					    		<img src="<?php echo base_url() ?>assets/icon/toolsWh.png" style="width: 40%" col="g">
					    		<img src="<?php echo base_url() ?>assets/icon/toolsY.png" style="width: 40%; display:none;" col="b">
					    		<br>
								<h4 style="font-family: helmet;">Alat & Mesin</h4>
					    	</div>
					    </a>
				    </div>
				    <div class="col-xs-6 col-sm-3 col-lg-3">
					    <a href="<?php echo site_url() ?>produk/formula" style="text-decoration-line: none;" onmouseover="hvr(this, 'in')" onmouseleave="hvr(this, 'out')">
					    	<div class="thumbnail text-center produk" style="background-color: rgba(28,69,26,0); border-style: none">
					    		<img src="<?php echo base_url() ?>assets/icon/flaskWh.png" style="width: 40%" col="g">
					    		<img src="<?php echo base_url() ?>assets/icon/flaskY.png" style="width: 40%; display:none;" col="b">
					    		<br>
								<h4 style="font-family: helmet;">Formula</h4>
					    	</div>
					    </a>
				    </div>
				    <div class="col-xs-6 col-sm-3 col-lg-3">
					    <a href="<?php echo site_url() ?>produk/produkhilir" style="text-decoration-line: none;" onmouseover="hvr(this, 'in')" onmouseleave="hvr(this, 'out')">
					    	<div class="thumbnail text-center produk" style="background-color: rgba(28,69,26,0); border-style: none">
					    		<img src="<?php echo base_url() ?>assets/icon/pipeWh.png" style="width: 40%" col="g">
					    		<img src="<?php echo base_url() ?>assets/icon/pipeY.png" style="width: 40%; display:none;" col="b">
					    		<br>
								<h4 style="font-family: helmet;">Produk Hilir</h4>
					    	</div>
					    </a>
				    </div>
				</div>
			</div>
			</div>
			<br><br>
			<div class="container">
			<div class="row">
				<div class="col-sm-3 col-lg-3">
					<h3 class="text-center" style="color:black;margin-top: 0px;font-family: helmet;"><strong>Teknologi Budidaya</strong></h3>
					<p class="text-center"><span style="font-size: 20px; font-weight: unset; font-family: hobo std; color: rgb(242,97,5);">T</span>eknologi budidaya pada tembakau dapat dikelompokkan menjadi beberapa jenis yang diantaranya adalah penangkaran benih, pesemaian, pemupukan, dan pemupukan bebas chlor. Selain itu, teknologi budidaya tembakau juga membahas mengenai penyakit-penyakit pada tembakau serta hama tembakau disertai cara pengendaliannya. Bagaimana proses panen, proses pasca panen, kesesuaian lahan, dan budidaya tembakau cerutu juga dibahas pada sub topik teknologi budidaya tembakau ini.</p>
				</div>
				<div class="col-sm-9 col-lg-9">
					<div class="row">
						<?php 
							foreach ($teknologi as $row) {
								$deskripsi_teknologi = "";
								if (strlen($row->deskripsi) > 125) {
									$deskripsi_teknologi = substr($row->deskripsi, 0, 125)." ...";
								} else {
									$deskripsi_teknologi = $row->nama_varietas;
								}
						?>
						<div class="col-sm-4 col-lg-4">
						 	<a href="<?php echo site_url('teknologibudidaya/index/').urlencode(strtolower($row->jenis_teknologi_budidaya)); ?>" title="Klik untuk lebih detil" style="text-decoration-line: none;" class="teknologiBudidaya">
						 		<div class="thumbnail" style="background-color: white; border-style: none">
							 		<div class="itemZoom" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
										<img src="<?php echo base_url() ?>assets/gambarTBD/<?php echo $row->gambar_tekno; ?>" class="imageZoom" >
										<div class="itemZoom-overlay top"></div>
									</div>
									<h4 style="font-family: helmet;"><?php echo $row->jenis_teknologi_budidaya; ?></h4>
									<hr style="margin:-6px 0px 5px 0px; border-color: orange;">
									<div class="overlayhr"></div>
									<p style="color:black;"><?php echo $deskripsi_teknologi; ?></p>
						 		</div>
						 	</a>
						</div>
						<?php
							}
						?>
					</div>
				</div>				
			</div>
			<!-- <hr> -->
			<hr style="border-color: grey">
			<a href="<?php echo site_url('agribisnis') ?>" style="text-decoration-line:none;" title="Klik untuk menuju halaman Agribisnis"><h3 class="text-center" style="color:black;font-family: helmet; "><strong>Agribisnis Tembakau</strong></h3></a>
			<p style="text-align: justify; text-indent: 0.5in;"><span style="font-size: 20px; font-weight: unset; font-family: hobo std; color: rgb(242,97,5);">A</span> gribisnis tembakau mempunyai peran yang strategis dalam perekonomian lokal dan nasional. Sebagai komoditas yang bernilai ekonomis tinggi, usaha tani tembakau dapat menyumbang pendapatan petani sekitar 40−80% dari total pendapatan. Sedangkan sebagai bahan baku utama rokok, peranan tembakau semakin menentukan dalam perkembangan industri rokok. Industri rokok telah ditetapkan pemerintah sebagai salah satu industri prioritas nasional (Anonim 2010a), yang perkembangannya akan sangat mempengaruhi perkembangan ekonomi nasional. Target penerimaan negara dari cukai yang telah ditetapkan untuk tahun 2010 sebesar Rp61 triliun dan tahun 2011 sebesar Rp71 triliun; sedangkan penerimaan devisa dari ekspor tembakau sebesar US$564 juta. Usaha tani tembakau dan industri yang terkait juga menyediakan lapangan kerja bagi kurang lebih 10 juta orang. Selain sebagai usaha tani primer, agribisnis tembakau sangat terkait dengan industri hulu dan industri hilir, yang semuanya bernilai ekonomi tinggi. Industri hulu yang sangat erat hubungannya antara lain adalah usaha pembibitan dan pembuatan pupuk kandang. Sedangkan industri hilir yang sangat menopang agribisnis tembakau antara lain adalah usaha kerajinan tikar, alas pengering tembakau rajangan, kerajinan tali, dan usaha tani cengkeh (Anonim 2010a). </p>
			<br><br>
			<?php 
				foreach ($agribisnis as $row) {				
			?>
			<div class="row">
				<div class="col-sm-3 col-lg-3">
					<img src="<?php echo base_url() ?>assets/gambarAgribisnis/<?php echo $row->gambar_agribisnis; ?>" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
				</div>
				<div class="col-sm-8 col-lg-8">
					<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;"><?php echo $row->jenis_agribisnis; ?></p>
					<p><?php echo $row->deskripsi_agribisnis; ?></p>	
					<div class="text-right">						
						<a href="<?php echo site_url('agribisnis/jenis/').urlencode(strtolower($row->jenis_agribisnis)); ?>">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Selengkapnya</i></p></button>
						</a>
					</div>
				</div>
			</div>
			<hr>
			<?php 
				}
			?>
			<!-- <div class="row">
				<div class="col-sm-3 col-lg-3">
					<img src="<?php echo base_url() ?>item img/tembakau.jpg" class="image img-rounded" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.2);">
				</div>
				<div class="col-sm-8 col-lg-8">
					<p style="font-size: 20px;color:rgb(242,97,5); font-family: helmet;">Budidaya tembakau madura</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident quod, quisquam fugiat maiores ipsam. Deserunt molestiae reiciendis, eius natus iure? ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati repudiandae tenetur illo vitae impedit eum culpa esse vero, hic repellendus.</p>
					<div class="text-right">						
						<a href="">
							<button class="btn btn-success" style="height: 30px;"><p style="font-size: 12px;padding-top: -12px;"><i>Selengkapnya</i></p></button>
						</a>
					</div>
				</div>
			</div>	 -->					
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

		<div class='scrolltop'>
		    <div class='scroll icon' style="width: 50px; height: 40px;">
		    	<i class="glyphicon glyphicon-chevron-up"></i>
		    </div>
		</div>
	</body>
	<br><br><br><br>
	
	<script>
		function hvr(dom, action)
		{
		    if (action == 'in')
		    {
		        $(dom).find("[col=g]").css("display", "none");
		        $(dom).find("[col=b]").css("display", "block");
		    }

		    else
		    {
		        $(dom).find("[col=b]").css("display", "none");
		        $(dom).find("[col=g]").css("display", "block");
		    }
		}

		
	</script>
</html>
