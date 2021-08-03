      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a></div>
              <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
              <div class="breadcrumb-item"><?= $title ?></div>
            </div>
          </div>

          <div class="section-body">
            <!-- <div class="row"> -->
            <div class="card">
              <div class="card-body" style="overflow-x:auto;">
                <!-- <a href="" class="btn btn-primary"></a> -->
                <hr>
                <table class="table" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>NIS</th>
                      <th>NISN</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat</th>
                      <th>Tanggal Lahiir</th>
                      <th>Agama</th>
                      <th>No Telepon</th>
                      <th>Almat</th>
                      <th>Status</th>
                      <th>Upload Bukti Pembayaran</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($c_siswa as $no => $cs) : ?>
                      <tr>
                        <td><?= $no + 1 ?></td>
                        <td><?= $cs->nama ?></td>
                        <td><?= $cs->nis ?></td>
                        <td><?= $cs->nisn ?></td>
                        <td><?= $cs->jenis_kelamin ?></td>
                        <td><?= $cs->tempat_lahir ?></td>
                        <td><?= $cs->tanggal_lahir ?></td>
                        <td><?= $cs->agama ?></td>
                        <td><?= $cs->no_telpon ?></td>
                        <td><?= $cs->alamat ?></td>
                        <td>
                          <?php if ($cs->status == 0) : ?>
                            <small class="badge badge-warning">Confirm</small>
                          <?php else : ?>
                            <small class="badge badge-success">Lulus</small>
                          <?php endif ?>
                        </td>
                        <td>
                          <a href="<?= base_url('assets/img/bukti_pendaftaran/' . $cs->bukti_pembayaran) ?>" class='perbesar'>
                            <img src="<?= base_url('assets/img/bukti_pendaftaran/' . $cs->bukti_pembayaran) ?>" width="50">
                          </a>
                        </td>

                        <td>
                          <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                          <a href="" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
      </div>