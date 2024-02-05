<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Data Pelanggan</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ubah Data Pelanggan</li>
            </ol>
          </div>

      <div class="row">
            <div class="col-lg-12">
            <?php $this->load->view('layout/alert') ?>
              <div class="card mb-4">
              <div class="card-header d-flex justify-content-between">
                <a href="<?= site_url('admin/pelanggan') ?>" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-left" aria-hidden="true"></i> Kembali</a>
              </div>
                <div class="card-body">
                  <form action="<?= site_url("admin/pelanggan/edit/") . $data->id ?>" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $data->nama ?>" required>
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="paket">Paket Internet</label>
                        <!-- <input type="text" class="form-control" id="paket" name="paket" placeholder="Paket Internet" value="<?= $data->paket_internet ?>" required> -->
                        <select name="paket" id="paket" class="form-control">
                          <option value="10 Mbps" <?= $data->paket_internet == "10 Mbps" ? 'selected' : '' ?> >10 Mbps</option>
                          <option value="20 Mbps" <?= $data->paket_internet == "20 Mbps" ? 'selected' : '' ?> >20 Mbps</option>
                          <option value="30 Mbps" <?= $data->paket_internet == "30 Mbps" ? 'selected' : '' ?> >30 Mbps</option>
                          <option value="40 Mbps" <?= $data->paket_internet == "40 Mbps" ? 'selected' : '' ?> >40 Mbps</option>
                          <option value="50 Mbps" <?= $data->paket_internet == "50 Mbps" ? 'selected' : '' ?> >50 Mbps</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label for="lat">Latitude</label>
                        <input type="number" step="any" min="-90" max="90" class="form-control" id="lat" name="lat" placeholder="Latitude" value="<?= $data->lat ?>" required>
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="lng">Longitude</label>
                        <input type="number" step="any" min="-180" max="180" class="form-control" id="lng" name="lng" placeholder="Longitude" value="<?= $data->lng ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"><?= $data->alamat ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="foto">Foto</label> <small>Isi untuk perbarui</small>
                      <input type="file" name="foto" id="foto" class="form-control mb-3">
                      <?php if($data->foto != null) { ?>
                        <img src="<?= base_url("uploads/pelanggan/") . $data->foto ?>" alt="foto" width="100px">
                      <?php } ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
      </div>
</div>