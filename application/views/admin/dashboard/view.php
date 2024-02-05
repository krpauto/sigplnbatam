<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
          <?php $this->load->view('layout/alert') ?>
          <div class="row mb-3 d-flex justify-content-center">
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pengguna</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">ODP</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $odp ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bolt fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pelanggan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pelanggan ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-address-book fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
</div>
        <!---Container Fluid-->