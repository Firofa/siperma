  <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin');?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-file-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Siperma Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Halaman Awal</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Reference
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <?php if($user['level_access_id'] == "1") : ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Configuration</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="<?= base_url('admin/pengaturanHakAkses');?>">Pengaturan Hak Akses</a>
            <a class="collapse-item" href="<?= base_url('unit');?>">Pengaturan Satuan Kerja</a>
          </div>
        </div>
      </li>
      <?php else: ?>
      
      <?php endif; ?>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="<?= base_url('ruangan/pengaturanRuangan');?>">Input Ruangan</a>
            <a class="collapse-item" href="<?= base_url('admin/pengaturanPegawai');?>">Input Pegawai</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Transaction
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Transaction:</h6>
            <a class="collapse-item" href="<?= base_url('BarangMasuk'); ?>">Barang Persediaan Masuk</a>
            <a class="collapse-item" href="<?= base_url('PermintaanBarang'); ?>">Permintaan Barang</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Report:</h6>
            <a class="collapse-item" href="<?= base_url('laporan');?>">Laporan Barang Masuk</a>
            <a class="collapse-item" href="<?= base_url('laporan/barangkeluar');?>">Laporan Barang Keluar</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('petunjuk');?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Petunjuk Penggunaan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/changepassword');?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Change Password</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    

  

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?php echo $notifikasiCount > 0 ? $notifikasiCount : ""; ?></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notifikasi Permintaan Barang
                </h6>
                <?php if($notifikasiCount < 1) :?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                  </div>
                  <div>
                    <span class="font-weight-bold">Tidak ada permintaan baru.</span>
                  </div>
                </a>
                <?php else : ?>
                <?php foreach($notifikasiPermintaan as $np) : ?>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url('PermintaanBarang'); ?>">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?= date('d M Y',$np['tanggal_permintaan']); ?></div>
                    <span class="font-weight-bold">Permintaan belum divalidasi.</span>
                    <span>Dari: <?= $np['name']; ?></span><br / >
                    <span>Permintaan: <?= $np['nama_barang_masuk']; ?></span><br />
                    <span>Jumlah: <?= $np['jumlah_permintaan']; ?></span>
                  </div>
                </a>
                <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi, <?= $user['name']; ?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
