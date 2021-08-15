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
                <table class="table" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Konfirmasi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($c_siswa as $no => $cs) : ?>
                      <tr>
                        <td><?= $no + 1 ?></td>
                        <td><?= $cs->nama ?></td>
                        <td><?= $cs->email ?></td>
                        <td>
                          <small style="cursor: pointer;" class="badge badge-warning" onclick="return confirm('Yakin Konfirmasi User') ? window.location.href = '<?= site_url('admin/konfirmasipendaftaran/active_user/' . $cs->id) ?>' : ''">Confirm</small>
                        </td>

                        <td>
                          <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                          <a href="<?= site_url('admin/konfirmasipendaftaran/detail/' . $cs->id) ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
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