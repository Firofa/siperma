<!-- Navbar -->
<nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand text-white" href="<?= base_url('user');?>">Siperma</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="<?php if($user['menu'] == "home") { echo "active"; } ?>" ><a href="<?= base_url('user');?>">Home</a></li>
          <li class="<?php if($user['menu'] == "lihatStokBarang") { echo "active"; } ?>" ><a href="<?= base_url('user/lihatStokBarang');?>">Lihat Stok Barang</a></li>
          <li class="<?php if($user['menu'] == "permintaan_barang") { echo "active"; } ?>" ><a href="<?= base_url('user/permintaanBarang');?>">Permintaan Barang</a></li>
          <li class="<?php if($user['menu'] == "lihatPermintaan") { echo "active"; } ?>" ><a href="<?= base_url('user/lihatPermintaan');?>">Lihat Permintaan</a></li>
          <li class="<?php if($user['menu'] == "chat_admin") { echo "active"; } ?>"  ><a href="#">Chat Admin</a></li>
          <li class="<?php if($user['menu'] == "ubah_password") { echo "active"; } ?>"  ><a href="<?= base_url('user/changePassword');?>">Change Password</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?= base_url('auth/logout');?>"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
        </ul>
      </div>
  </nav>
  <!-- End Navbar -->