        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


          <div class="row">
          	<div class="col-lg-6">
              <?= $this->session->flashdata('message'); ?>
            </div>
          	<div class="col-lg-8">
				<?= form_open_multipart('admin/doEditDataUser/'); ?>
                <div class="form-group row">
                    <input type="text" class="form-control form-control-user" id="id_users" name="id_users" value="<?= $edit_user['id_users'];?>" READONLY>
                    <?= form_error('id_users','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group row">
                    <label>Nama Pengguna:</label>
                    <input type="text" class="form-control form-control-user" id="name" name="name" value="<?= $edit_user['name'];?>" placeholder="Masukan Nama Pengguna..." value="<?= set_value('name'); ?>">
                    <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group row">
                    <label>NIP:</label>
                    <input type="text" class="form-control form-control-user" id="nip" name="nip" value="<?= $edit_user['nip'];?>" placeholder="Masukan Nomor Induk Pegawai..." value="<?= set_value('nip'); ?>">
                    <?= form_error('nip','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group row">
                    <label>Jabatan:</label>
                    <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan" value="<?= $edit_user['jabatan'];?>" placeholder="Masukan Jabatan Pegawai..." value="<?= set_value('jabatan'); ?>">
                    <?= form_error('jabatan','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group row">
                    <label>Pangkat:</label>
                    <input type="text" class="form-control form-control-user" id="pangkat" name="pangkat" value="<?= $edit_user['pangkat'];?>" placeholder="Masukan Pangkat Pegawai..." value="<?= set_value('pangkat'); ?>">
                    <?= form_error('pangkat','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group row">
                    <label>Tahun:</label>
                    <select name="tahun" class="form-control">
                        <option disabled>Pilih tahun:</option>
                        <option value="<?= $edit_user['tahun'];?>">Data Saat ini: <?= $edit_user['tahun'];?></option>
                        <?php for($i=date("Y")-15; $i <= date("Y"); $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                    <?= form_error('tahun','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group row">
                  <label for="work_unit_id">Unit Kerja:</label>
                  <select class="form-control" id="work_unit_id" name="work_unit_id">
                    <option disabled>Pilih Unit Kerja:</option>
                    <option value="<?= $edit_user['id_work_unit'];?>">Unit Kerja Saat ini: <?= $edit_user['work_unit']; ?></option>
                    <?php foreach($work_unit as $wu) : ?>
                      <option value="<?= $wu['id_work_unit'];?>"><?= $wu['work_unit'];?></option>
                    <?php endforeach; ?>
                  </select>
                    <?= form_error('work_unit_id','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group row">
                  <label for="ruangan_id">Ruangan:</label>
                  <select class="form-control" id="ruangan_id" name="ruangan_id">
                    <option disabled>Pilih ruangan:</option>
                    <option value="<?= $edit_user['id_ruangan'];?>">Ruangan saat ini: <?= $edit_user['ruangan']; ?></option>
                    <?php foreach($ruangan as $ru) : ?>
                      <option value="<?= $ru['id_ruangan'];?>"><?= $ru['ruangan'];?></option>
                    <?php endforeach; ?>
                  </select>
                    <?= form_error('ruangan_id','<small class="text-danger pl-3">','</small>'); ?> 
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

      