<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Peta Pelanggan</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Peta Pelanggan</li>
            </ol>
          </div>

        <div class="row mb-3">
          <div class="col-lg-12 grid-margin stretch-card">
          <?php $this->load->view('layout/alert') ?>
              <div class="card">
                <div class="card-header">
                <form action="" method="GET" enctype="multipart/form-data" class="pt-3">
                <div class="input-group ">
                  <input type="text" class="form-control p-4 pl-1 pr-1" value="<?= @$_GET['key'] ?>" name="key" placeholder="Masukkan Nama/Alamat/Paket" aria-label="Cari" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary p-2 pr-4 pl-4 pt-2" type="submit" style="height: 50px;width: 80px;"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
                </div>
                <div class="card-body">
                  <!-- susun data untuk peta -->
                  <div id="map"></div>
                  <script>
                    let markers = [];
                    let nama = [];
                    let alamat = [];
                    let paket = [];
                    let foto = [];
                    <?php  
                    if ($pelanggan != null){
                      foreach ($pelanggan as $row) : ?>
                        markers.push('<?= $row->lng ?>');
                        markers.push('<?= $row->lat ?>');
                        nama.push('<?= $row->nama ?>');
                        alamat.push('<?= $row->alamat ?>');
                        paket.push('<?= $row->paket_internet ?>');
                        foto.push('<?= $row->foto ?>');
                    <?php 
                      endforeach; 
                    }?>

                    // masukan ke peta
                    mapboxgl.accessToken = 'pk.eyJ1Ijoia2V2aW5iaWViZXIiLCJhIjoiY2xya3BlZDZ5MDA0dzJrcWpzYzdmdHVxOSJ9.IluYsfm0OtqpMXcCcRYKXw';
                    if(markers.length == 0){
                      // diperlihatkan peta indonesia tanpa markers
                      const map = new mapboxgl.Map({
                        container : 'map',
                        center : [ 1.0997994121668597 , 103.96230825127316],
                        zoom : 4
                      });
                    }
                    else
                    {
                      const map = new mapboxgl.Map({
                        container : 'map',
                        center : [ markers[0], markers[1]],
                        zoom : 8
                      });
                      let k = 0;
                      for (let i = 0; i < markers.length; i++){
                        let popup = new mapboxgl.Popup({offset : 25, closeOnClick: true}).setHTML(
                        '<div class="row rounded" style="background-color:#F4F4F4;">' +
                        '<div class="col-4 my-auto p-2">' +
                        '<div class="photo">' +
                        '<img src="../uploads/pelanggan/' + foto[k] + '" alt="userphoto" width="85px" height="100%" class="float-left object-fit-cover rounded">' +
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
                    }

                  </script>
                  
                </div>
              </div>
          </div>
        </div>
</div>
