<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Data Pelanggan</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Data Pelanggan</li>
            </ol>
          </div>

      <?php $this->load->view('layout/alert') ?>
    <div class="row">  
    <div class="col-lg-12">
              <!-- Form Basic -->
              <div class="card mb-4">
              <div class="card-header d-flex justify-content-between">
                <a href="<?= site_url('karyawan/pelanggan') ?>" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-left" aria-hidden="true"></i> Kembali</a>
              </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group mx-auto mb-4 col-lg-2">
                        <?php if($pelanggan->foto != null) { ?>
                            <img src="<?= base_url("uploads/pelanggan/") . $pelanggan->foto ?>" alt="foto" width="200px" style="border-radius:50%;">
                          <?php } ?>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="nama">Nama Lengkap</label>
                          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $pelanggan->nama ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="paket">Paket Internet</label>
                          <input type="text" class="form-control" id="paket" name="paket" placeholder="Paket Internet" value="<?= $pelanggan->paket_internet ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-lg-6">
                        <label for="lat">Latitude</label>
                        <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude" value="<?= $pelanggan->lat ?>" readonly>
                      </div>
                      <div class="form-group col-lg-6">
                        <label for="lng">Longitude</label>
                        <input type="text" class="form-control" id="lng" name="lng" placeholder="Longitude" value="<?= $pelanggan->lng ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" readonly><?= $pelanggan->alamat ?></textarea>
                    </div>
                    <div class="row">
                    <div id="map" class="mt-3"></div>
                    <script>
                      let markers = [];
                      let nama = [];
                      let alamat = [];
                      let paket = [];
                      let foto = [];
                      markers.push('<?= $pelanggan->lng ?>');
                      markers.push('<?= $pelanggan->lat ?>');
                      nama.push('<?= $pelanggan->nama ?>');
                      alamat.push('<?= $pelanggan->alamat ?>');
                      paket.push('<?= $pelanggan->paket_internet ?>');
                      foto.push('<?= $pelanggan->foto ?>');

                      // masukan ke peta
                      mapboxgl.accessToken = 'pk.eyJ1IjoiZnR0aHBsbiIsImEiOiJjbHBocmp0N3AwZTV0MnFyd3A0MXkzOHQzIn0.C1ORbFFfHrocVIs6X5rOSg';
                      const map = new mapboxgl.Map({
                        container : 'map',
                        center : [ markers[0], markers[1]],
                        zoom : 12
                      });
                      let k = 0;
                      for (let i = 0; i < markers.length; i++){
                        let popup = new mapboxgl.Popup({offset : 25, closeOnClick: false}).setHTML(
                          '<div class="row rounded" style="background-color:#F4F4F4;">' +
                        '<div class="col-4 my-auto p-2">' +
                        '<div class="photo">' +
                        '<img src="<?= base_url("uploads/pelanggan/") ?>' + foto[k] + '" alt="userphoto" width="85px" height="100%" class="float-left object-fit-cover rounded">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-8 my-auto p-2">' +
                        '<p align="left" class="nama"><strong>' + nama[k] + '</strong></p>' +
                        '<p align="left"> Paket Internet ' + paket[k] + '</p>' +
                        '<p align="left"> Alamat ' + alamat[k] + '</p>' +  
                        '</div>' +
                        '</div>' 
                        );
                        // i nya harus pakai 2 set
                        new mapboxgl.Marker()
                          .setLngLat([ markers[i], markers[i + 1]])
                          .setPopup(popup)
                          .addTo(map);
                        k = k + 1;
                        i = i + 1;
                      }


                    </script>
                    </div>
                </div>
              </div>
            </div>
    </div>
</div>