
        <!-- Begin Page Content -->
        <div class="container-fluid">

                <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?> : Permintaan Barang</h1>
          	
          	<!-- Konten Tabel -->
          	<div class="row">	
                <div class="col-lg"> 
                  <?php   if(validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
                  <?php   endif; ?>
                          <?= $this->session->flashdata('message'); 	 ?>
          <div class="card-body">
          <div class="table-responsive"> 
          <table class="table table-bordered" id="dataTable">
				  <thead>
				    <tr>
				      	<th scope="col">No</th>
				      	<th scope="col">Nama</th>
				      	<th scope="col">Barang</th>
				      	<th scope="col">Ruangan yang mengajukan</th>
				      	<th scope="col">Jumlah Permintaan</th>
                        <th scope="col">Periode</th>
                        <th scope="col">Tanggal Permintaan</th>
                        <th scope="col">Tindak Lanjut</th>
                        <th scope="col">Ket</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 	$i = 1; ?>
				  	<?php foreach ($permintaan as $p): ?>
				    <tr>
				      	<td><?= $i;?></td>
				      	<td><?= $p['name'];?></td>
				      	<td><?= $p['nama_barang_masuk'];?></td>
              			<td align="center"><?= $p['ruangan'];?></td>
              			<td align="center"><?= $p['jumlah_permintaan'];?></td>
              			<td>
                            <?php $time = strtotime($p['periode_permintaan']); ?>
                            <?= date("F Y",$time); ?>
                        </td>
              			<td><?= date('d F Y', $p['tanggal_permintaan']); ?></td>
              			<td>
                            <?php if($p['status_permintaan'] == 'Pending') : ?>
                            <a href="<?= base_url('PermintaanBarang/validasi/').$p['id_permintaan_barang'];?>" class="badge badge-success">Validasi</a>
                            <a href="<?= base_url('PermintaanBarang/tolak/').$p['id_permintaan_barang'];?>" class="badge badge-danger">Tolak</a>
                            <?php elseif($p['status_permintaan'] == 'Disetujui'): ?>
                            <p><a href="<?= base_url('PermintaanBarang/cetak/').$p['id_permintaan_barang'];?>" target="_blank" class="badge badge-primary">Cetak Bukti</a></p>
                            <?php else: ?>
                            <p><a href="#" class="badge badge-secondary">Selesai</a></p>
                            <p><a href="<?= base_url('PermintaanBarang/hapus/').$p['id_permintaan_barang'];?>" onclick="return confirm('Yakin ingin menghapus data?');" class="badge badge-warning">Hapus</a></p>
                            <?php endif; ?>
                        </td>
                        <td><p style="<?php if($p['status_permintaan'] == 'Disetujui') { echo 'color:green;'; } elseif($p['status_permintaan'] == 'Ditolak') { echo 'color:red;'; }?>"><?= $p['status_permintaan']; ?></p></td>
                        
				      <?php $i++; ?>
				    </tr>		
				  	<?php endforeach ?>
				  </tbody>
			</table>
			</div>
    </div>
          	</div>

          </div>
          
          <!-- Akhir Konten Tabel -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->