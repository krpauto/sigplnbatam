<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data ODP</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">ODP</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data ODP</li>
            </ol>
          </div>

      <?php $this->load->view('layout/alert') ?>
        <div class="row mb-3">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <!-- <div class="card-header d-flex justify-content-between">
                <a href="<?= site_url('admin/odp/add') ?>" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus" aria-hidden="true"></i> Tambah</a>
              </div> -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable">
                    <thead>
                      <tr>
                        <th width="40px">No</th>
                        <th>Foto</th>
                        <th>Nama ODP</th>
                        <th width="70px">Alamat</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Status</th>
                        <th width="100px" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($odp as $row) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><img src="<?= base_url("uploads/odp/") . $row->foto ?>" alt="foto" width="75px"></td>
                          <td><?= $row->nama ?></td>
                          <td><?= $row->alamat ?></td>
                          <td><?= $row->lat ?></td>
                          <td><?= $row->lng ?></td>
                          <td><?= $row->status ?></td>
                          <td class="text-center">
                            <b>
                            <a a href="<?= site_url('karyawan/odp/detail/' . $row->id) ?>"  class="btn btn-primary btn-sm"><i class="fas fa-info" aria-hidden="true"></i></a>
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
        

