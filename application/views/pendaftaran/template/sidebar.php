<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Calon Siswa</a>
            <!-- <a href="#">Super Admin</a> -->
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">Cs</a>
            <!-- <a href="#">Sa</a> -->
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                  <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
              </li> -->
              <li class="<?php if ($this->uri->segment('2') == 'Dashboard'): ?> active <?php endif ?>">
                <a href="<?= base_url('Pendaftaran/Dashboard/') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Starter</li>
              <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="layout-default.html">Data User</a></li>
                  <li><a class="nav-link" href="layout-transparent.html">Data Siswa</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Data Kelas</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Data Jurusan</a></li>
                </ul>
              </li> -->
              <li class="<?php if ($this->uri->segment('2') == 'Biodata'): ?> active <?php endif ?>">
                <a class="nav-link" href="<?= base_url('Pendaftaran/Biodata/')  ?>"><i class="fas fa-home"></i> <span>Biodata Pendaftaran</span></a>
              </li>
              <li class="<?php if ($this->uri->segment('2') == 'Pengumuman'): ?> active <?php endif ?>">
                <a class="nav-link" href="<?= base_url('Pendaftaran/Pengumuman')  ?>"><i class="fas fa-users"></i> <span>Pengumuman</span></a>
              </li>
              <li class="<?php if ($this->uri->segment('2') == 'CetakBukti'): ?> active <?php endif ?>">
                <a class="nav-link" href="<?= base_url('Pendaftaran/CetakBukti/')  ?>"><i class="fas fa-user"></i> <span>Cetak Bukti Pendaftaran</span></a>
              </li>
              <li class="<?php if ($this->uri->segment('2') == 'Syarat'): ?> active <?php endif ?>">
                <a class="nav-link" href="<?= base_url('Admin/Syarat/')  ?>"><i class="fas fa-user"></i> <span>Syarat Pendaftaran</span></a>
              </li>
              <li class="<?php if ($this->uri->segment('2') == 'EditProfil'): ?> active <?php endif ?>">
                <a class="nav-link" href="<?= base_url('Admin/EditProfil/')  ?>"><i class="fas fa-edit"></i> <span>Edit Profil</span></a>
              </li>
              <!-- <li class="">
                <a class="nav-link" href="#"><i class="fas fa-file"></i> <span>Laporan</span></a>
              </li> -->
              <!-- <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Laporan</span></a></li> -->
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="<?= base_url('Auth/logout') ?>" class="btn btn-success btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
        </aside>
</div>






