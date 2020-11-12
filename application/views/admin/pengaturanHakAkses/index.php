
        <!-- Begin Page Content -->
        <div class="container-fluid">

                <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?> : Pengaturan Hak Akses</h1>
          	
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
				      	<th scope="col">NIP</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Level Akses</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 	$i = 1; ?>
				  	<?php foreach ($pengguna as $pg): ?>
				    <tr>
				      	<td><?= $i;?></td>
				      	<td><?= $pg['name'];?></td>
              			<td><?= $pg['nip'];?></td>
              			<td><?= $pg['jabatan']?></td>
              			<td><?= $pg['access_level'];?></td>
              			<td><?php if($pg['is_active'] == 1){echo "Aktif"; } else {echo "Tidak Aktif"; }?></td>
              			<td>
                            <a href="<?= base_url('admin/editHakAkses/').$pg['id_users'];?>" class="badge badge-success">Edit</a>
                        </td>
                        
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
