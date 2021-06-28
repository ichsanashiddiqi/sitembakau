<?php
    $isLogin = $this->session->userdata('akunAktifBenih');
    if($isLogin==""){
        redirect(site_url('admin/index'));
    }    
?>
<!DOCTYPE html>
<html lang="en" id="home">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Balittas</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?php echo base_url();?>/bootstrap/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
    <link href="<?php echo base_url();?>/bootstrap/css/bootstrap.css" rel="stylesheet">    
    <link href="<?php echo base_url();?>/bootstrap/css/styleadmin.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>/bootstrap/css/croppie.css">
    
    <!-- <link href="<?php echo base_url() ?>/bootstrap/img/Logo-Kementerian-Pertanian.png" rel="shortcut icon"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/bootstrap/js/croppie.js"></script>
    <script src="<?php echo base_url();?>/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>    
    <div class="sidenav" style="padding-top: 10px; height: 90px;">                
        <a href="#tabelBenih"><i class="glyphicon glyphicon-chevron-right"></i> Benih</a>
        <hr style="border-color: grey;margin:0px 13px 5px 13px;">
        <a href="#tabelDistribusibenih"><i class="glyphicon glyphicon-chevron-right"></i> Distribusi Benih</a>     
    </div>
    
    <div class="admin">
    <!-- DATA BENIH -->
    <section id="tabelBenih" style="padding-top: 50px">
        <div class="container">
            <div class="table table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Data <b>Benih</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#tambahbenih" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Data</span></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="margin: 30px 0px;">
                    <table class="table table-striped table-hover table-fixed">
                        <thead>
                            <tr>                                
                                <th>No</th>
                                <th>Nama Benih</th>
                                <th>Stok Sampai</th>                                                            
                                <th>Jumlah Stok (gram)</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $no = 1;
                            foreach ($benih as $ben) {       
                         ?>
                            <tr>                                
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $ben->nama_benih; ?></td>
                                <td><?php echo $ben->stok_sampai; ?></td>                                
                                <td><?php echo $ben->jumlah_stok; ?></td>                                
                                <td>
                                    <a href="#editbenih" class="edit" onclick="modal_edit_benih('<?php echo $ben->id_benih; ?>','<?php echo $ben->nama_benih; ?>','<?php echo $ben->stok_sampai; ?>','<?php echo $ben->jumlah_stok; ?>');">
                                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                    </a>
                                    <a href="" class="delete" data-toggle="modal" onclick="confirm_modal_benih('<?php echo $ben->id_benih; ?>');"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- DATA DISTIBUSI BENIH -->
    <section id="tabelDistribusibenih" style="padding-top: 50px">
        <div class="container">
            <div class="table table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Data <b>Distibusi Benih</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#tambahdistribusibenih" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Data</span></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="margin: 30px 0px;">
                    <table class="table table-striped table-hover table-fixed">
                        <thead>
                            <tr>                                
                                <th>No</th>
                                <th>Nama Benih</th>
                                <th>Tanggal</th>                                                            
                                <th>Tahun Panen</th>                                                            
                                <th>Kelas</th>
                                <th>Jumlah (Kg)</th>
                                <th>Luas Lahan</th>                                                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $no = 1;
                            foreach ($distribusiBenih as $db) {       
                         ?>
                            <tr>                                
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $db->nama_benih; ?></td>
                                <td><?php echo $db->tanggal; ?></td>                                
                                <td><?php echo $db->tahun_panen; ?></td>
                                <td><?php echo $db->kelas_benih; ?></td>                                
                                <td><?php echo $db->jumlah_kg; ?></td>
                                <td><?php echo $db->keterangan; ?></td>
                                <td>
                                    <a href="#editdistribusibenih" class="edit" onclick="modal_edit_distribusibenih('<?php echo $db->id_distribusi; ?>','<?php echo $db->id_benih; ?>','<?php echo $db->nama_benih; ?>','<?php echo $db->tanggal; ?>','<?php echo $db->tahun_panen; ?>','<?php echo $db->kelas_benih; ?>','<?php echo $db->jumlah_kg; ?>','<?php echo $db->keterangan; ?>',);">
                                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                    </a>
                                    <a href="" class="delete" data-toggle="modal" onclick="confirm_modal_distribusibenih('<?php echo $db->id_distribusi; ?>');"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    </div>
<!-- =====================================================MODAL-MODAL================================================ -->
    <!-- Tambah Modal HTML Produk Benih-->
    <div id="tambahbenih" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data Benih</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">&times;</button>
              </div>
                 <form enctype="multipart/form-data" action="<?php echo site_url('admin/tambahBenih');?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Benih</label>
                            <input type="text" class="form-control" name="namabenih" required>
                        </div>
                        <div class="form-group">
                            <label>Stok Sampai</label>
                            <input type="date" class="form-control" name="stoksampai" placeholder="ex. 2018-08-17" required>
                        </div>                        
                        <div class="form-group">
                            <label>Jumlah Stok (gram)</label>
                            <input type="number" step="any" placeholder="0.000" class="form-control" name="jumlahstok" required>
                        </div>     
                    </div>
                    <input hidden name="identity_tambah" value="benih">
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                        <input type="submit" class="btn btn-success" value="Tambah">
                    </div>
                </form>              
            </div>
        </div>
    </div>
    
    <!-- Edit Modal HTML Produk Benih-->
    <div id="editbenih" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Data Benih</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">&times;</button>
              </div>
                 <form enctype="multipart/form-data" action="<?php echo site_url('admin/editBenih');?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <input hidden id="idbenih" name="idbenih">
                        <div class="form-group">
                            <label>Nama Benih</label>
                            <input type="text" class="form-control" name="editnamabenih" id="editnamabenih" required>
                        </div>
                         <div class="form-group">
                            <label>Stok Sampai</label>
                            <input type="text" class="form-control" name="editstoksampai" id="editstoksampai" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Stok</label>
                            <input type="number" step="any" placeholder="0.000" class="form-control" name="editjumlahstok" id="editjumlahstok" required>
                        </div>
                    </div>
                    <input hidden name="identity_edit" value="benih">
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>
                </form>              
            </div>
        </div>
    </div>
    <script>
        function modal_edit_benih(idbenih,namabenih,stoksampai,jumlahstok)
        {
          $('#editbenih').modal('show', {backdrop: 'static'});          
          document.getElementById('idbenih').value = idbenih;
          document.getElementById('editnamabenih').value = namabenih;         
          document.getElementById('editstoksampai').value = stoksampai;    
          document.getElementById('editjumlahstok').value = jumlahstok;    
        }
    </script>

    <!-- Delete Modal HTML Produk Benih-->
    <div id="hapusbenih" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">                
                <div class="modal-header">
                        <h4 class="modal-title">Hapus Data Benih</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">&times;</button>
                </div>
                <div class="modal-body">                        
                    <p>Yakin Ingin menghapus data ini ?</p>
                    <p class="text-warning"><small></small></p>
                </div>           
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                    <a href="" id="hapusben"><input type="button" class="btn btn-danger" value="Hapus"></a>
                </div>                
            </div>
        </div>
        <?php  ?>
    </div>   
    <script>
        function confirm_modal_benih(delete_url)
        {
          $('#hapusbenih').modal('show', {backdrop: 'static'});
          document.getElementById('hapusben').setAttribute('href' ,"deleteBenih/benih-"+delete_url);
        }
    </script>

    <!-- Tambah Modal HTML Produk Distribusi Benih-->
    <div id="tambahdistribusibenih" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data Distribusi Benih</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">&times;</button>
              </div>
                 <form enctype="multipart/form-data" action="<?php echo site_url('admin/tambahDistribusiBenih');?>" method="post" class="form-horizontal" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Benih</label>
                            <input type="text" class="form-control" list="daftarNamaBenih" name="namadistribusibenih" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="tgldistribusi" placeholder="ex. 2018-08-17" required>
                        </div>
                        <div class="form-group">
                            <label>Tahun Panen</label>
                            <input type="text" class="form-control" name="thnpanen" placeholder="ex. Pasirian 2002" required>
                        </div>
                        <div class="form-group">
                            <label>Kelas benih</label>
                            <input type="text" class="form-control" name="kelasbenih" required>
                        </div>   
                        <div class="form-group">
                            <label>Jumlah (Kg)</label>
                            <input type="number" step="any" placeholder="0.000" class="form-control" name="jumlah" required>
                        </div>                              
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" required>
                        </div>     
                    </div>
                    <input hidden name="identity_tambah" value="benih">
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                        <input type="submit" class="btn btn-success" value="Tambah">
                    </div>
                </form>              
            </div>
        </div>
    </div>
    
    <datalist id="daftarNamaBenih">
    <?php 
        foreach ($ListNamaBenih as $row) {
            echo "<option value=\"$row->nama_benih\">";
        }
    ?>
    </datalist>

    <!-- Edit Modal HTML Produk Distribusi Benih-->
    <div id="editdistribusibenih" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Data Benih</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">&times;</button>
              </div>
                 <form enctype="multipart/form-data" action="<?php echo site_url('admin/editDistribusiBenih');?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <input hidden id="iddistribusi" name="iddistribusi">
                        <input hidden id="iddistribusibenih" name="iddistribusibenih">
                        <div class="form-group">
                            <label>Nama Benih</label>
                            <input type="text" class="form-control" name="editnamadistribusibenih" id="editnamadistribusibenih" required readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="edittgldistribusi" id="edittgldistribusi" placeholder="ex. 2018-08-17" required>
                        </div>
                        <div class="form-group">
                            <label>Tahun Panen</label>
                            <input type="text" class="form-control" name="editthnpanen" id="editthnpanen" placeholder="ex. Pasirian 2002" required>
                        </div>
                        <div class="form-group">
                            <label>Kelas benih</label>
                            <input type="text" class="form-control" name="editkelasbenih" id="editkelasbenih">
                        </div>   
                        <div class="form-group">
                            <label>Jumlah (Kg)</label>
                            <input type="number" step="any" class="form-control" name="editjumlah" id="editjumlah" placeholder="0.000" required>
                        </div>                              
                        <div class="form-group">
                            <label>Luas Lahan</label>
                            <input type="text" class="form-control" name="editketerangan" id="editketerangan" required>
                        </div>     
                    </div>
                    <input hidden name="identity_edit" value="benih">
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>
                </form>              
            </div>
        </div>
    </div>    
    <script>
        function modal_edit_distribusibenih(iddistribusi,idbenih,namabenih,tgl,thn,kelas,jumlah,keterangan)
        {
          $('#editdistribusibenih').modal('show', {backdrop: 'static'});          
          document.getElementById('iddistribusi').value = iddistribusi;
          document.getElementById('iddistribusibenih').value = idbenih;
          document.getElementById('editnamadistribusibenih').value = namabenih;         
          document.getElementById('edittgldistribusi').value = tgl;    
          document.getElementById('editthnpanen').value = thn;
          document.getElementById('editkelasbenih').value = kelas;
          document.getElementById('editjumlah').value = jumlah;
          document.getElementById('editketerangan').value = keterangan;    
        }
    </script>

    <!-- Delete Modal HTML Produk Distribusi Benih-->
    <div id="hapusdistribusibenih" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">                
                <div class="modal-header">
                        <h4 class="modal-title">Hapus Data Distribusi Benih</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">&times;</button>
                </div>
                <div class="modal-body">                        
                    <p>Yakin Ingin menghapus data ini ?</p>
                    <p class="text-warning"><small></small></p>
                </div>           
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
                    <a href="" id="hapusdben"><input type="button" class="btn btn-danger" value="Hapus"></a>
                </div>                
            </div>
        </div>
        <?php  ?>
    </div>   
    <script>
        function confirm_modal_distribusibenih(delete_url)
        {
          $('#hapusdistribusibenih').modal('show', {backdrop: 'static'});
          document.getElementById('hapusdben').setAttribute('href' ,"deleteDistribusiBenih/benih-"+delete_url);
        }
    </script>    
    <footer>
        <div class="container-fluid text-center" style="color:white;background-color: black;">
            <div style=" margin-top: 10px;">
                <p style="font-family: calibri"><span class="glyphicon glyphicon-copyright-mark"></span> 2018 All Reserved Design By BALITTAS</p>
            </div>
        </div>
    </footer>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>/bootstrap/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>/bootstrap/js/jquery.easing.1.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url();?>/bootstrap/js/script.js"></script>
    <script src="<?php echo base_url();?>/bootstrap/perfect-scrollbar/perfect-scrollbar.min.js"></script>

</body>

</html>
