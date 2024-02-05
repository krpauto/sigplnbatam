<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pelanggan</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Pelanggan</li>
            </ol>
          </div>

        <div class="row mb-3">
          <div class="col-lg-12 grid-margin stretch-card">
          <?php $this->load->view('layout/alert') ?>
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <a href="<?= site_url('admin/pelanggan/add') ?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus" aria-hidden="true"></i> Tambah</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable">
                    <thead>
                      <tr>
                        <th width="40px">No</th>
                        <th>Foto</th>
                        <th>Nama Pelanggan</th>
                        <th width="70px">Alamat</th>
                        <th>Paket Internet</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th width="100px" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($pelanggan as $row) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><img src="<?= base_url("uploads/pelanggan/") . $row->foto ?>" alt="foto" width="75px"></td>
                          <td><?= $row->nama ?></td>
                          <td><?= $row->alamat ?></td>
                          <td><?= $row->paket_internet ?></td>
                          <td><?= $row->lat ?></td>
                          <td><?= $row->lng ?></td>
                          <td class="text-center">
                            <b>
                              <a a href="<?= site_url('admin/pelanggan/detail/' . $row->id) ?>"  class="btn btn-primary btn-sm"><i class="fas fa-info" aria-hidden="true"></i></a>
                              <a href="<?= site_url('admin/pelanggan/edit/' . $row->id) ?>"  class="btn btn-warning btn-sm"><i class="fas fa-pen" aria-hidden="true"></i></a>
                              <a href="<?= site_url('admin/pelanggan/delete/' . $row->id) ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
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
        

