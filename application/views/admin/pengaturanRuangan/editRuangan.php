        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


          <div class="row">
          	<div class="col-lg-6">
              <?= $this->session->flashdata('message'); ?>
            </div>
          	<div class="col-lg-8">
				<?= form_open_multipart('ruangan/doEditDataRuangan/'); ?>
                <div class="form-group row">
                    <input type="text" class="form-control form-control-user" id="id_ruangan" name="id_ruangan" value="<?= $ruangan['id_ruangan'];?>" READONLY>
                    <?= form_error('id_ruangan','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group row">
                    <label>Nama Pengguna:</label>
                    <input type="text" class="form-control form-control-user" id="ruangan" name="ruangan" value="<?= $ruangan['ruangan'];?>" placeholder="Masukan Nama Ruangan..." value="<?= set_value('ruangan'); ?>">
                    <?= form_error('ruangan','<small class="text-danger pl-3">','</small>'); ?> 
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

      