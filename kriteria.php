    <div class="">
                 <h1 class="h3 mb-2 text-gray-800"></h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kriteria

                            	<a href=""class="btn btn-primary" data-toggle="modal" data-target="#tambahdata" style="float: right;"><i class="fas fa-plus"></i> Tambah Data</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama Kriteria</th>
                                            <th>Bobot Kriteria</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php
                                      include 'inc/koneksi.php';

                                      $quary = mysqli_query($koneksi,"SELECT * FROM `tb_kriteria`");
                                      $no = 1;
                                      while ($data = mysqli_fetch_array($quary)) {

                                      ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $data['nama_kriteria']?></td>
                                            <td><?php echo $data['bobot_kriteria']?></td>
                                            <td>
                                              <a href="?module=editkriteria&id=<?php echo $data['id_kriteria']?>"class="btn btn-warning">Edit</a>
                                              <a href="delete_kriteria.php?id=<?php echo $data ['id_kriteria']?>"
                                                onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                      <?php }?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="#" method="POST">
		      <div class="form-group">
		             <label for="">Nama Kriteria</label>
		             <input type="text" name="nama_kriteria" class="form-control" placeholder="Masukkan Nama Kriteria">
		      </div>
		    
		      <div class="form-group">
		             <label for="">Bobot Kriteria</label>
		             <input type="text" name="bobot_kriteria" class="form-control" placeholder="Masukkan Bobot Kriteria">
		         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Save</button>
      </div>
  </form>
       <?php

       include 'inc/koneksi.php';

       if(isset($_POST['save'])) {
        $nama = $_POST['nama_kriteria'];
        $bobot = $_POST['bobot_kriteria'];
       
         
        $insert = mysqli_query($koneksi,"INSERT INTO `tb_kriteria`(`id_kriteria`, `nama_kriteria`, `bobot_kriteria`) VALUES ('','$nama','$bobot')");

        if ($insert){
          echo "<script>alert('Data Berhasil Disimpan');
          window.location='?module=kriteria_pestisida';
          </script>";

        }else{
          echo "<script>alert('Data Gagal Disimpan');
          window.location='?module=kriteria_pestisida';
          </script>";

           }
         }

       ?>
    </div>
  </div>
</div>
</div>