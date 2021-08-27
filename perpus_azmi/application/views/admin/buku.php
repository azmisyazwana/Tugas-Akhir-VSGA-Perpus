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
            <h1>Buku</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Buku</li>
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
                <h3 class="card-title">List Buku</h3>
              </div>
              <!-- /.card-header -->
                <div class="row">
          <div class="col-sm-4">
            <div class="card shadow">
              <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
              </div>
              <div class="card-body">
                <form method="POST" action="<?= base_url('Admin/action_tambah_produk') ?>" enctype="multipart/form-data">
                  <div class="row">
                      <div class="form-group col-6">
                        <label>ID Buku</label>
                        <input type="text" name="id_buku" disabled="" placeholder="ketik" autocomplete="off" class="form-control">
                      </div>
                      <div class="form-group col-6">
                        <label>Judul Buku</label>
                        <input type="text" name="judul_buku"  required="required" placeholder="ketik" autocomplete="off" class="form-control">
                      </div>
                    </div>
                  <div class="row">
                      <div class="form-group col-6">
                        <label for="no_polisi">ISBN</label>
                        <input type="text" name="isbn"  required="required" placeholder="ketik" autocomplete="off" class="form-control">
                      </div>
                      <div class="form-group col-6">
                        <label>Pengarang</label>
                        <input type="text" name="pengarang" required="required" placeholder="ketik" autocomplete="off" class="form-control">
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
                <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
              </div>

                <table class="table table-bordered" id="dataTable" cellspacing="0">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>ID Buku</th>
                                <th>Judul Buku</th>
                                <th>ISBN</th>
                                <th>Pengarang</th>
                                <th>Action</th>
                              </tr>
                          </thead>
                              <tbody>
                            <?php
                            $no=1;
                            foreach($read as $r) {?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?= $r->id_buku ?></td>
                        <td><?= $r->judul_buku ?></td>
                        <td><?= $r->isbn ?></td>
                        <td><?= $r->pengarang ?></td>
                        <td>
                          <a href="<?= base_url()?>Admin/ubah_produk?id_buku=<?= $r->id_buku ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
                          <a href="<?= base_url()?>Admin/action_delete_produk?id_buku=<?= $r->id_buku ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                      </tr>
                           <?php } ?>
                          </tbody>
                            <tfoot>
                              <tr>
                                <th>No</th>
                                <th>ID Buku</th>
                                <th>Judul Buku</th>
                                <th>ISBN</th>
                                <th>Pengarang</th>
                                <th>Action</th>
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
