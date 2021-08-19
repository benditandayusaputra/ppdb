      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= site_url('admin/dashboard') ?>">Dashboard</a></div>
              <!-- <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div> -->
              <div class="breadcrumb-item"><?= $title ?></div>
            </div>
          </div>

          <div class="section-body">
            <!-- <div class="row"> -->
            <div class="card">
              <div class="card-body" style="overflow-x:auto;">
                <?php if ($this->session->flashdata('success')) : ?>
                  <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
                <?php endif ?>
                <hr>
                <table class="table text-center" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jenis Pembayaran</th>
                      <th>Jumlah Bayar</th>
                      <th>Foto</th>
                      <th>Konfirm</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pembayaran as $no => $item) : ?>
                      <tr>
                        <td><?= $no + 1 ?></td>
                        <td><?= $item->nama ?></td>
                        <td>Rp. <?= number_format($item->jumlah, 0, ',', '.') ?></td>
                        <td><?= $item->jenis ?></td>
                        <td class="foto-bukti text-center" style="cursor: pointer;"><img src="<?= base_url('assets/img/bukti_pendaftaran/' . $item->foto_bukti) ?>" alt="Foto Bukti" width="100px"></td>
                        <td>
                          <?php if ($item->konfirm == 0) : ?>
                            <?php if ($item->jenis_pembayaran_id !=  1) : ?>
                              <small style="cursor: pointer;" class="badge badge-warning" onclick="return confirm('Yakin Konfirmasi Pembayaran') ? window.location.href = '<?= site_url('admin/pembayaran/konfirm/' . $item->id) ?>' : ''">Confirm</small>
                            <?php else : ?>
                              <small style="cursor: pointer;" class="badge badge-warning" data-toggle="modal" data-target="#modalKonfirmasi-<?= $item->id ?>">Confirm</small>
                            <?php endif ?>
                          <?php else : ?>
                            <strong class="badge badge-success">Sudah Di Konfirmasi</strong>
                          <?php endif ?>
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

      <?php foreach ($pembayaran as $no => $item) : ?>
        <?php if ($item->jenis_pembayaran_id == 1) : ?>
          <div class="modal fade" id="modalKonfirmasi-<?= $item->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran Pendaftaran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= site_url('admin/pembayaran/konfirm/' . $item->id) ?>" method="post">
                    <div class="form-group">
                      <label for="kelas_id">Pilih Kelas Untuk Siswa Baru</label>
                      <select id="kelas_id" class="form-control" name="kelas_id">
                        <?php foreach ($kelas as $value) : ?>
                          <option value="<?= $value->id ?>"><?= $value->grade ?> <?= $value->nama_kelas ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group float-right">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php endif ?>
      <?php endforeach ?>