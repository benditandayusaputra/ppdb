
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?= base_url('assets') ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-success">
              <div class="card-header"><h4 class="text-success">Form Pendaftaran</h4></div>
              <div class="card-body">
              <?= $this->session->flashdata('bukti') ?>
                <form action="<?= base_url('Auth/registrasi') ?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="nama" class="form-control" name="nama"  value="<?= set_value('nama') ?>" autofocus>
                    <div class="invalid-feedback">
                    </div>
                    <?= form_error('nama','<small class="text-danger">','</small>') ?>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="tempat">Tempat</label>
                      <input id="tempat" type="text" class="form-control" name="tempat" value="<?= set_value('tempat') ?>" >
                      <?= form_error('tempat','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="tgl">Tanggal Lahir</label>
                      <input id="tgl" type="date" class="form-control" name="tgl" value="<?= set_value('tgl') ?>">
                      <?= form_error('tgl','<small class="text-danger">','</small>') ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-4">
                      <label for="jk" class="d-block">Jenis Kelamin</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="jk1" value="Laki - laki">
                        <label class="form-check-label" for="jk1">
                          Laki - laki
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="jk2" value="Perempuan">
                        <label class="form-check-label" for="jk2">
                          Perempuan
                        </label>
                      </div>
                      <?= form_error('jk','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group col-4">
                      <label for="agama" class="d-block">Agama</label>
                      <input id="agama" type="tetx" class="form-control" name="agama" value="<?= set_value('agama') ?>">
                      <?= form_error('agama','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group col-4">
                      <label for="no_hp" class="d-block">No Handphon</label>
                      <input id="no_hp" type="text" class="form-control" name="no_hp" value="<?= set_value('no_hp') ?>">
                      <?= form_error('no_hp','<small class="text-danger">','</small>') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" rows="4" cols="3" name="alamat"></textarea>
                     <?= form_error('alamat','<small class="text-danger">','</small>') ?>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                        <?= form_error('email','<small class="text-danger">','</small>') ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <?= form_error('password','<small class="text-danger">','</small>') ?>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 offset-4">
                      <div class="form-group">
                        <label>Upload Bukti Pembayaran</label>
                        <input type="file" name="bayar" class="form-control">
                      </div>
                    </div>
                  </div>
                  <!-- <div class="form-divider">
                    Your Home
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Country</label>
                      <select class="form-control selectric">
                        <option>Indonesia</option>
                        <option>Palestine</option>
                        <option>Syria</option>
                        <option>Malaysia</option>
                        <option>Thailand</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Province</label>
                      <select class="form-control selectric">
                        <option>West Java</option>
                        <option>East Java</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>City</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-6">
                      <label>Postal Code</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div> -->

                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

