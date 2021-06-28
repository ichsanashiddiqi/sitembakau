<table class="table table-hover">
						<thead style="background-color: rgba(28,69,26,0.9);border-bottom: 3px solid white; color:#fece00;">
							<th>No</th>
							<th>Varietas</th>
							<th>Persediaan sampai</th>
							<th>Jumlah (gr)</th>
						</thead >
						<tbody>
						<?php 
							// if($this->uri->segment(3)){
			    //                  $count = $this->uri->segment(3);
			    //             } else{
			                     $count = 0;
			                // }

							foreach ($dataStokBenihFiltered as $row) {
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