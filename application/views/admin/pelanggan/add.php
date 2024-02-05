<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Pelanggan</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Data Pelanggan</li>
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
                  <form action="<?= site_url("admin/pelanggan/add") ?>" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="paket">Paket Internet</label>
                        <!-- <input type="text" class="form-control" id="paket" name="paket" placeholder="Paket Internet" required> -->
                        <select name="paket" id="paket" class="form-control" required>
                          <option value="10 Mbps">10 Mbps</option>
                          <option value="20 Mbps">20 Mbps</option>
                          <option value="30 Mbps">30 Mbps</option>
                          <option value="40 Mbps">40 Mbps</option>
                          <option value="50 Mbps">50 Mbps</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label for="lat">Latitude</label>
                        <input type="number" min="-90" max="90" class="form-control" id="lat" name="lat" step="any" placeholder="Latitude" required>
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="lng">Longitude</label>
                        <input type="number" min="-180" max="180" class="form-control" id="lng" name="lng" step="any" placeholder="Longitude" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="foto">Foto</label>
                      <input type="file" name="foto" id="foto" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
      </div>
</div>