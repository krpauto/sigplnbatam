<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pengguna</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
            </ol>
          </div>

        <div class="row mb-3">
          <div class="col-lg-12 grid-margin stretch-card">
          <?php $this->load->view('layout/alert') ?>
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <a href="javascript:void(0)" id="btn_tambah" data-toggle="modal" data-target="#adduser" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus" aria-hidden="true"></i> Tambah</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable">
                    <thead>
                      <tr>
                        <th width="40px">No</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th width="100px" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($pengguna as $row) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $row->username ?></td>
                          <td><?php if($row->level == 1)
                            {
                            echo 'Admin';
                            } elseif ($row->level == 2){
                              echo 'Karyawan';
                            }
                          ?></td>
                          <td class="text-center">
                            <b>
                            <?php if($row->id != 1){ ?>
                              <a href="javascript:void(0)" id="btn_reset" data-toggle="modal" data-target="#resetPassword" class="btn btn-sm btn-secondary" data-id="<?= $row->id ?>" data-username="<?= $row->username ?>"><i class="fa fa-key"></i></a>
                              <a href="<?= site_url('admin/pengguna/delete/' . $row->id) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
                              <?php } ?>
                            </b>
                          </td>
                        </tr>
                      <?php
                      endforeach;
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>

<!-- MODAL Reset Password -->
<div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="resetPasswordLbl" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('admin/pengguna/reset') ?>" method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mb-2">Ganti Username dan Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_user" id="modal_id">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="modal_username" required>
        </div>
        <div class="form-group">
          <label for="">Password Baru </label>
          <input type="password" name="password" class="form-control" autofocus required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="reset_pass" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- MODAL add user -->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="adduser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('admin/pengguna/add') ?>" method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mb-2">Tambah Pengguna Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="modal_username" required>
        </div>
        <div class="form-group">
          <label for="">Password </label>
          <input type="password" name="password" class="form-control" autofocus required>
        </div>
        <div class="form-group">
          <label for="">Level </label>
          <select name="level" id="level" class="form-control">
            <option value="1">Admin</option>
            <option value="2">Karyawan</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
        

