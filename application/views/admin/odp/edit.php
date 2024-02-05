<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Data ODP</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">ODP</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ubah Data ODP</li>
            </ol>
          </div>

      
      <div class="row">
            <div class="col-lg-12">
            <?php $this->load->view('layout/alert') ?>
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <a href="<?= site_url('admin/odp') ?>" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                  </div>
                <div class="card-body">
                  <form action="<?= site_url("admin/odp/edit/" . $data->id) ?>" method="POST" enctype="multipart/form-data" >
                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $data->nama ?>" required>
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" placeholder="Status" value="<?= $data->status ?>" required>
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
                      <label for="foto">Foto</label>
                      <input type="file" name="foto" id="foto" class="form-control mb-3">
                      <?php if($data->foto != null) { ?>
                        <img src="<?= base_url("uploads/odp/") . $data->foto ?>" alt="foto" width="100px">
                      <?php } ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
      </div>
</div>