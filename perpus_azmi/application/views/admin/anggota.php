<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('template/head') ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    <?php $this->load->view('template/nav') ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
   <?php $this->load->view('template/sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Anggota</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Anggota</h3>
              </div>
              <!-- /.card-header -->
                <div class="row">
          <div class="col-sm-4">
            <div class="card shadow">
              <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Anggota</h6>
              </div>
              <div class="card-body">
                <form method="POST" action="<?= base_url('Admin/action_tambah_anggota') ?>" enctype="multipart/form-data">
                  <div class="row">
                      <div class="form-group col-6">
                        <label>ID Anggota</label>
                        <input type="text" name="id_anggota" disabled=" " autocomplete="off" class="form-control">
                      </div>
                      <div class="form-group col-6">
                        <label>Nama</label>
                        <input type="text" name="nama"  required="required" placeholder="ketik" autocomplete="off" class="form-control">
                      </div>
                    </div>
                  <div class="row">
                      <div class="form-group col-12">
                        <label for="jenis kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class=" form-control">
                          <option>-pilih-</option>
                         <option value="Pria">Pria</option>
                          <option value="Wanita">Wanita</option>
                        </select>
                      </div>
                    </di120
                    <div class="row">
                      <div class="form-group col-12">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class=" form-control" maxlength="120">  </textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-12">
                        <label for="foto">Foto</label>
                        <input type="file" name="image">
                      </div>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-success" name="tambah"><i class="fa fa-plus"></i> Tambah</button>
                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                    </div>
                </form>
              </div>
            </div>
          </div>

          <div class="col-sm-8">
            <div class="card shadow">
              <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Daftar anggota</h6>
              </div>

                <table class="table table-bordered" id="dataTable" cellspacing="0">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>ID Anggota</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>alamat</th>
                                <th>Aksi</th>
                              </tr>
                          </thead>
                              <tbody>
                            <?php
                            $no=1;
                            foreach($read as $r) {?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?= $r->id_anggota ?></td>
                        <td><img src="<?= base_url()?>assets/img/<?= $r->image ?>" height="100px" style="border-radius:20px"></td>
                        <td><?= $r->nama ?></td>
                        <td><?= $r->jenis_kelamin ?></td>
                        <td><?= $r->alamat ?></td>
                        <td>
                          <a href="<?= base_url()?>Admin/ubah_anggota?id_anggota=<?= $r->id_anggota ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
                          <a href="<?= base_url()?>Admin/action_delete_anggota?id_anggota=<?= $r->id_anggota?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
                          <a href="<?= base_url()?>Admin/print?id_anggota=<?= $r->id_anggota?>" class="btn btn-sm btn-success" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Cetak</a>
                        </td>
                      </tr>
                           <?php } ?>
                          </tbody>
                            <tfoot>
                              <tr>
                                <th>No</th>
                                <th>ID Anggota</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>alamat</th>
                                <th>Aksi</th>

                              </tr>
                            </tfoot>
                      
                        </table>

              </div>
            </div>
          </div>
        
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php $this->load->view('template/footer') ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
 <?php $this->load->view('template/script') ?>
<!-- Page specific script -->

</body>
</html>
