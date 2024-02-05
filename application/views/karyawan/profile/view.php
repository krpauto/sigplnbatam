<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Profile</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile Karyawan</li>
            </ol>
          </div>

        <div class="row mb-3">
          <div class="col-lg-6 col-md-6 grid-margin stretch-card mx-auto">
            <?php $this->load->view('layout/alert') ?>
            <div class="card">
              <div class="card-header">
                <h5 class="h5">Ganti Username dan Password</h5>
                <div class="card-body">
                  <form action="<?= site_url('karyawan/profile/reset') ?>" method="POST">
                    <div class="row">
                      <div class="form-group col-lg-12">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $pengguna->username ?>" required>
                      </div>
                      <div class="form-group col-lg-12">
                        <label for="password">Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"  required>
                      </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
</div>