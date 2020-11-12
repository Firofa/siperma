
        <!-- Begin Page Content -->
        <div class="container-fluid">

                <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?> : Input Pegawai</h1>
          	
          	<!-- Konten Tabel -->
          	<div class="row">	
                <div class="col-lg"> 
                  <?php   if(validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
                  <?php   endif; ?>
                          <?= $this->session->flashdata('message'); 	 ?>
                          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newAkunUser">Tambah Akun Baru</a>
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
                        <th scope="col">Ruangan</th>
                        <th scope="col">Unit Kerja</th>
                        <th scope="col">Pangkat</th>
                        <th scope="col">Username</th>
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
              			<td><?= $pg['ruangan'];?></td>
              			<td><?= $pg['work_unit'];?></td>
              			<td><?= $pg['pangkat'];?></td>
              			<td><?= $pg['username'];?></td>
              			<td><?php if($pg['is_active'] == 1){echo "Aktif"; } else {echo "Tidak Aktif"; }?></td>
              			<td>
                            <a href="<?= base_url('admin/editDataUser/').$pg['id_users'];?>" class="badge badge-success">Edit</a>
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

<!-- Input Modal -->
<div class="modal fade" id="newAkunUser" tabindex="-1" role="dialog" aria-labelledby="newAkunUser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newAkunUser">Tambah Akun Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('admin/pengaturanAkses'); ?>
      <div class="modal-body">
      <div class="form-group">
                    <label>Nama Pengguna:</label>
                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Masukan Nama Pengguna..." value="<?= set_value('name'); ?>">
                    <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>NIP:</label>
                    <input type="text" class="form-control form-control-user" id="nip" name="nip" placeholder="Masukan Nomor Induk Pegawai..." value="<?= set_value('nip'); ?>">
                    <?= form_error('nip','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Jabatan:</label>
                    <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan" placeholder="Masukan Jabatan Pegawai..." value="<?= set_value('jabatan'); ?>">
                    <?= form_error('jabatan','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Pangkat:</label>
                    <input type="text" class="form-control form-control-user" id="pangkat" name="pangkat" placeholder="Masukan Pangkat Pegawai..." value="<?= set_value('pangkat'); ?>">
                    <?= form_error('pangkat','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Tahun:</label>
                    <select name="tahun" class="form-control">
                        <option disabled>Pilih tahun:</option>
                        <?php for($i=date("Y")-15; $i <= date("Y"); $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                    <?= form_error('tahun','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Username:</label>
                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukan Username..." value="<?= set_value('username'); ?>">
                    <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Password:</label>
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group">
                    <label>Konfirmasi Password:</label>
                    <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" placeholder="Repeat Password">
                </div>
                <div class="form-group ">
                  <label for="level_akses_id">Level Akses:</label>
                  <select class="form-control" id="level_akses_id" name="level_akses_id">
                    <option disabled>Pilih Level Akses:</option>
                    <?php foreach($level_akses as $la) : ?>
                      <option value="<?= $la['id_level_access'];?>"><?= $la['access_level'];?></option>
                    <?php endforeach; ?>
                  </select>
                    <?= form_error('level_akses_id','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                  <label for="work_unit_id">Unit Kerja:</label>
                  <select class="form-control" id="work_unit_id" name="work_unit_id">
                    <option disabled>Pilih Unit Kerja:</option>
                    <?php foreach($work_unit as $wu) : ?>
                      <option value="<?= $wu['id_work_unit'];?>"><?= $wu['work_unit'];?></option>
                    <?php endforeach; ?>
                  </select>
                    <?= form_error('work_unit_id','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                  <label for="ruangan_id">Ruangan:</label>
                  <select class="form-control" id="ruangan_id" name="ruangan_id">
                    <option disabled>Pilih ruangan:</option>
                    <?php foreach($ruangan as $ru) : ?>
                      <option value="<?= $ru['id_ruangan'];?>"><?= $ru['ruangan'];?></option>
                    <?php endforeach; ?>
                  </select>
                    <?= form_error('ruangan_id','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </form>
    </div>
  </div>
</div>