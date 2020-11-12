        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?> : Pengaturan Hak Akses</h1>


          <div class="row">
          	<div class="col-lg-6">
              <?= $this->session->flashdata('message'); ?>
            </div>
          	<div class="col-lg-8">
				<?= form_open_multipart('admin/doEditHakAkses/'); ?>
                <div class="form-group row">
                    <input type="text" class="form-control form-control-user" id="id_users" name="id_users" value="<?= $edit_user['id_users'];?>" READONLY>
                    <?= form_error('id_users','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group row">
                  <label for="level_access_id">Level Akses:</label>
                  <select class="form-control" id="level_access_id" name="level_access_id">
                    <option disabled>Pilih Unit Kerja:</option>
                    <option value="<?= $edit_user['level_access_id'];?>">Level Akses Saat ini: <?= $edit_user['access_level']; ?></option>
                    <?php foreach($level_akses as $la) : ?>
                      <option value="<?= $la['id_level_access'];?>"><?= $la['access_level'];?></option>
                    <?php endforeach; ?>
                  </select>
                    <?= form_error('level_access_id','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group row">
                  <label for="is_active">Status:</label>
                  <select class="form-control" id="is_active" name="is_active">
                      <option disabled>Pilih ruangan:</option>
                      <option value="<?= $edit_user['is_active'];?>">Status saat ini: <?php if($edit_user['is_active'] == 1){ echo "Aktif"; } else { echo "Tidak Aktif"; } ?></option>
                      <option value="1">Aktif</option>
                      <option value="0">Tidak Aktif</option>
                  </select>
                    <?= form_error('is_active','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                

				<div class="form-group row justify-content-end">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</div>

         		</form>


          	</div>
          </div>

          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      