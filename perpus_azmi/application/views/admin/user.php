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
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                <h3 class="card-title">List User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
				        <a href="<?= base_url() ?>Admin/tambah_user" class="btn btn-primary btn-sm float-right">
                  <i class="fas fa-plus-circle"></i>
                    TAMBAH
                </a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Username</th>
                      <th class="text-center">Password</th>
                      <th class="text-center">Akses</th>
                      <th width="250px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach($read as $r) {?>
                    <tr>
                      <td class="text-center"></td>
                      <td class="text-center"><?= $r->nama ?></td>
                      <td class="text-center"><?= $r->username ?></td>
                      <td class="text-center"><?= $r->password?></td>
                      <td class="text-center"><?= $r->akses ?></td>
                      <td>
                            <a href="<?= base_url()?>Admin/update_produk?username=<?= $r->username ?>" class="btn btn-sm btn-info"  onclick="return confirm('apakah anda yakin?')"><i class="fa fa-pen"></i> Ubah</a>

                            <a href="<?= base_url()?>Admin/action_delete_user?username=<?= $r->username ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
                            
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <th class="text-center">No</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Username</th>
                      <th class="text-center">Password</th>
                      <th class="text-center">Akses</th>
                      <th width="150px">Aksi</th>
                  </tfoot>
                </table>
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
