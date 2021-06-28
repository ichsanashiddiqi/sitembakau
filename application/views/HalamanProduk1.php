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
						<li class="active">Benih</li> 
					</ul>
					<!-- <h3 class="text-left" style="color:black; font-family: helmet"><?php echo $kategori; ?></h3>
					<hr style="border-color: grey;margin-top: -10px;"> -->
						<div class="row">
							<div class="col-xs-3 col-sm-4 col-lg-4">
								<h3 class="text-left hidden-xs" style="color:black; font-family: helmet; padding-top: 18px; margin-top: 0px; margin-bottom: -5px;"><?php echo $kategori; ?></h3>
								<h3 class="text-left hidden-sm hidden-lg" style="color:black; font-family: helmet; padding-top: 18px; margin-top: 0px; margin-bottom: -5px;"><?php echo $kategori; ?></h3>
							</div>
							<div class="col-xs-3 col-sm-4 col-lg-4">
								<h3 class="text-right hidden-xs" style="margin-left: 20px; padding-top: 18px; margin-top: 0px; margin-bottom: -5px; font-size: 14px;"><b>Filter by :</b></h3>
								<h6 class="text-left hidden-sm hidden-lg" style="margin-left: 18px; padding-top: 18px; margin-top: 0px; margin-bottom: -5px;"><b>Filter by :</b></h6>
							</div>
							<div class="col-xs-3 col-sm-2 col-lg-2 text-right" style="padding-top: 7px;">
							    <select class="form-control bulanBenih" id="bulanBenih" name="bulanBenih" style="margin-left: 13px;" onchange="filterBenih();">
							        <option disabled>Bulan</option>
							        <!-- <option value="Juni" selected>Juni</option> -->
								<?php
									$bulanBenih = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember","--Semua--");
									for($i = 0;$i < count($bulanBenih);$i++){
										if ($i == 5) {
											echo"<option value=$bulanBenih[$i] selected> $bulanBenih[$i] </option>";
										} else {
											echo"<option value=$bulanBenih[$i]> $bulanBenih[$i] </option>";
										}
									}
								?>
							    </select>
							</div>
							<div class="col-xs-3 col-sm-2 col-lg-2 text-right" style="padding-top: 7px;">
								<select class="form-control tahunBenih" id="tahunBenih" name="tahunBenih" onchange="filterBenih();">
							    	<option disabled>Tahun</option>
							    	<!-- <option value="2018" selected>2018</option> -->
							    	<?php
										for($i = 2017;$i <= 2029;$i++){
											if ($i == "2018") {
												echo"<option value=$i selected> $i </option>";
											} else {
												echo"<option value=$i> $i </option>";
											}
										}
									?>
							    </select>
							</div>
							<!-- <div class="col-xs-1 col-sm-1 col-lg-1 text-right">
							    <button class="btn btn-success" type="submit">Lihat</button>
							</div> -->
						</div>
						<br>
						<hr style="border-color: grey;margin-top: -15px;">

					<div id="tabelstokbenih"  style="margin-top: -7px;">
					<table class="table table-hover">
						<thead style="background-color: rgba(28,69,26,0.9);border-bottom: 3px solid white; color:#fece00;">
							<th>No</th>
							<th>Varietas</th>
							<th>Persediaan sampai</th>
							<th>Jumlah (g)</th>
						</thead >
						<tbody>
						<?php 
							// if($this->uri->segment(3)){
			    //                  $count = $this->uri->segment(3);
			    //             } else{
			                     $count = 0;
			                // }

							foreach ($dataBenih as $row) {
								$count++;	
						 ?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php echo $row->nama_benih; ?></td>
								<td><?php echo $row->stok_sampai; ?></td>
								<td><?php echo $row->jumlah_stok ?></td>
							</tr>
						<?php 
							}
						 ?>
						</tbody>
					</table>
					</div>
					<!-- <br> -->
					<!-- <ul class="paginationKu pagerCustom" > -->
						<?php //foreach ($links as $link) {
							//echo "<li>". $link."</li>";
							// echo $jumlah;
						//} ?>
					<!-- </ul> -->
					<br><br>



					<!-- DISTRIBUSI BENIH -->				
					<!-- <h3 class="text-left" style="color:black; font-family: helmet">Distribusi Benih UPBS</h3>
					<hr style="border-color: grey;margin-top: -8px;"> -->
					<!-- <div class="container-fluid"> -->
						<div class="row">
							<div class="col-xs-3 col-sm-4 col-lg-4">
								<h3 class="text-left hidden-xs" style="color:black; font-family: helmet; padding-top: 18px; margin-top: 0px; margin-bottom: -5px;">Distribusi Benih UPBS</h3>
								<h3 class="text-left hidden-sm hidden-lg" style="color:black; font-family: helmet; padding-top: 18px; margin-top: 0px; margin-bottom: -5px;">Distribusi Benih UPBS</h3>
							</div>
							<div class="col-xs-3 col-sm-4 col-lg-4">
								<h3 class="text-right hidden-xs" style="margin-left: 20px; padding-top: 18px; margin-top: 0px; margin-bottom: -5px; font-size: 14px;"><b>Filter by :</b></h3>
								<h6 class="text-right hidden-sm hidden-lg" style="margin-left: 18px; padding-top: 18px; margin-top: 0px; margin-bottom: -5px;"><b>Filter by :</b></h6>
							</div>
							<div class="col-xs-3 col-sm-2 col-lg-2 text-right" style="padding-top: 7px;">
							    <select class="form-control bulan" id="bulan" name="bulan" style="margin-left: 13px;" onchange="filterDistribusi();">
							        <option disabled>Bulan</option>
							        <option value="Januari" selected>Januari</option>
								<?php
									$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember","--Semua--");
									for($i = 1;$i < count($bulan);$i++){
										echo"<option value=$bulan[$i]> $bulan[$i] </option>";
									}
								?>
							    </select>
							</div>
							<div class="col-xs-3 col-sm-2 col-lg-2 text-right" style="padding-top: 7px;">
								<select class="form-control tahun" id="tahun" name="tahun" onchange="filterDistribusi();">
							    	<option disabled>Tahun</option>
							    	<option value="2009" selected>2009</option>
							    	<?php
										for($i = 2010;$i <= 2023;$i++){
											echo"<option value=$i> $i </option>";
										}
									?>
							    </select>
							</div>
							<!-- <div class="col-xs-1 col-sm-1 col-lg-1 text-right">
							    <button class="btn btn-success" type="submit">Lihat</button>
							</div> -->
						</div>
					<!-- </div> -->
					<br>
					<hr style="border-color: grey;margin-top: -15px;">

					<div id="table-data" style="margin-top: -7px;">
						<table class="table table-hover">
							<thead style="background-color: rgba(28,69,26,0.9);border-bottom: 3px solid white; color:#fece00;">
								<th>No.</th>
								<th>Varietas</th>
								<th>Tanggal</th>
								<th>Tahun Panen</th>
								<th>Kelas Benih</th>
								<th class="text-center">Jumlah (Kg)</th>
								<th>Luas Lahan</th>
							</thead >
							<tbody>
							<?php 
								// if($this->uri->segment(3)){
				    //                  $count = $this->uri->segment(3);
				    //             } else{
				                     $count = 0;
				    //             }

								$jumlah = 0;

								foreach ($dataDistribusiBenih as $row) {
									$count++;
									$jumlah += $row->jumlah_kg;
									$keterangan = "";
									if (!empty($row->keterangan)) {
										$keterangan = substr($row->keterangan, 0, 20)." ...";
									} else {
										$keterangan = $row->keterangan;
									}	
							 ?>
								<tr>
									<td><?php echo $count; ?></td>
									<td><?php echo $row->nama_benih; ?></td>
									<td><?php echo $row->tanggal; ?></td>
									<td><?php echo $row->tahun_panen; ?></td>
									<td><?php echo $row->kelas_benih; ?></td>
									<td class="text-center"><?php echo $row->jumlah_kg; ?></td>
									<td title="<?php echo $row->keterangan; ?>"><?php echo $keterangan; ?></td>
								</tr>
							<?php 
								}
							 ?>
							 	<tr style="background-color: rgba(28,69,26, 0.3);">
							 		<td></td>
							 		<td></td>
							 		<td></td>
							 		<td style="font-weight: bold;">JUMLAH</td>
							 		<td></td>
							 		<td class="text-center" style="font-weight: bold;"><?php echo number_format($jumlah, 3); ?></td>
							 		<td></td>
							 	</tr>
							</tbody>
						</table>
					</div>
				</div>				
				<div class="col-sm-3 col-lg-3">
					<br>
					<h3 class="text-left" style="color:black;font-family: helmet">Pencarian</h3>
					<hr style="border-color: grey;margin-top: -10px;">
					<div class="container-fluid" style="background-color:rgba(28,69,26,0.9);border-radius: 5px;margin-top: -7px;margin-bottom: -10px;">
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
			//----------------------------------MODAL LEAFLET----------------------------------------
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
			//---------------------------------------------------------------------------------------

			var acuan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember","--Semua--"];

			function filter(obj) {
				for (var i = 0; i < acuan.length; i++) {
					if (obj == acuan[i]) {
						if (i < 9) {
							obj = "0" + (i+1);
						} else {
							if (i == 12) {
								obj = "_%_%";
							} else {
								obj = (i+1);
							}
						}
					}
				}
				return obj;
			}

			function filterDistribusi(){
				var bulan = filter($("#bulan").val());
				var tahun = $("#tahun").val();
			    $.ajax({
			        type:"POST",
			        url: "../produk/filterDistribusi",
			        data: "tahun_bulan=" + tahun + "-" + bulan,
			        dataType : "html",
			        success:function(msg){
			            $("#table-data").html(msg);                
			        },
			        error:function(){
						alert("Search failed");
					}
			  	});
			}

			function filterBenih(){
				var bulan = filter($("#bulanBenih").val());
				// var bulan = $("#bulanBenih").val();
				// for (var i = 0; i < acuan.length; i++) {
				// 	if (bulan == acuan[i]) {
				// 		if (i < 9) {
				// 			bulan = "0" + (i+1);
				// 		} else {
				// 			if (i == 12) {
				// 				bulan = "_%_%";
				// 			} else {
				// 				bulan = (i+1);
				// 			}
				// 		}
				// 	}
				// }
				var tahun = $("#tahunBenih").val();
				// alert(tahun);
			    $.ajax({
			        type:"POST",
			        url: "../produk/filterStokBenih",
			        data: "tahun_bulanBenih=" + tahun + "-" + bulan,
			        dataType : "html",
			        success:function(msg){
			            $("#tabelstokbenih").html(msg);                
			        },
			        error:function(){
						alert("Search failed");
					}
			  	});
			}

		</script>
	</body>	
	<br><br>
	
</html>