<table class="table table-hover" id="tabelku">
							<thead style="background-color: rgba(28,69,26,0.9);border-bottom: 3px solid white; color:#fece00;">
								<th>No.</th>
								<th>Varietas</th>
								<th>Tanggal</th>
								<th>Tahun Panen</th>
								<th>Kelas Benih</th>
								<th class="text-center">Jumlah (Kg)</th>
								<th>Keterangan</th>
							</thead >
							<tbody>
							<?php 
								// if($this->uri->segment(3)){
				    //                  $count = $this->uri->segment(3);
				    //             } else{
				                     $count = 0;
				    //             }

								$jumlah = 0;

								foreach ($dataDistribusiFiltered as $row) {
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