  <!-- Header Start -->
  <div class="container-fluid header bg-white p-0">
      <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
          <div class="col-md-6 p-5 mt-lg-5">
              <h1 class="display-5 animated fadeIn mb-4">RSIA<span class="text-primary"> Milano </span> Teluk Kuantan</h1>
              <p class="animated fadeIn mb-4 pb-2">Rumaah Sakit Ibu Dan Anak <br /> Jl. Perintis Kemerdekaan, Simpang Tiga, Kec. Kuantan Tengah, Kabupaten Kuantan Singingi, Riau 29566</p>
              <a href="<?= base_url('Daftar'); ?>" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">PENDAFTARAN</a>
          </div>
          <div class="col-md-6 animated fadeIn">
              <div class="owl-carousel header-carousel">
                  <div class="owl-carousel-item">
                      <img class="img-fluid" src="<?= base_url("assets/img/milano.jpg") ?>" style="min-height: 350px;" alt="">
                  </div>
                  <div class="owl-carousel-item">
                      <img class="img-fluid" src="<?= base_url("assets/img/ilustrasi-rs.jpg") ?>" style="min-height: 350px;" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Header End -->


  <!-- Search Start -->
  <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
      <div class="container">
          <div class="row g-2">
              <div class="col-md-10">
                  <div class="row g-2">
                      <div class="col-md-12">
                          <!-- <input type="text" class="form-control border-0 py-3" placeholder="Cari Dokter"> -->
                      </div>
                  </div>
              </div>
              <div class="col-md-2">
                  <!-- <button class="btn btn-dark border-0 w-100 py-3">Search</button> -->
              </div>
          </div>
      </div>
  </div>
  <!-- Search End -->


  <!-- Category Start -->
  <div class="container-xxl py-5">
      <div class="container">
          <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
              <h1 class="mb-3">DOKTER</h1>

          </div>
          <div class="row g-4">
              <?php
                foreach ($dok as $key => $value) : ?>
                  <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">

                      <div class="cat-item d-block bg-light text-center rounded p-3" href="">
                          <div class="rounded p-4">
                              <!-- <div class="mb-3">
                                  <h1>A001</h1>
                              </div> -->
                              <h6><?= $value->nama_dokter ?></h6>
                              <span>Layanan</span><br>
                              <span><?= $value->hari_pertama ?> s/d <?= $value->hari_terakhir ?></span><br>
                              <span><?= $value->jam_pertama ?> s/d <?= $value->jam_terakhir ?></span>
                          </div>
                      </div>

                  </div>
              <?php endforeach ?>
          </div>
      </div>
  </div>
  <!-- Category End -->