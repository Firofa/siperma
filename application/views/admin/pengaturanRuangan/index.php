
        <!-- Begin Page Content -->
        <div class="container-fluid">

                <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?> : Input Ruangan</h1>
          	
          	<!-- Konten Tabel -->
          	<div class="row">	
                <div class="col-lg"> 
                  <?php   if(validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
                  <?php   endif; ?>
                          <?= $this->session->flashdata('message'); 	 ?>
                          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRuangan">Tambah Ruangan Baru</a>
          <div class="card-body">
          <div class="table-responsive"> 
          <table class="table table-bordered" id="dataTable">
				  <thead align="center">
				    <tr>
				      	<th scope="col">No</th>
				      	<th scope="col">Nama Ruangan</th>
                        <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody align="center">
				  	<?php 	$i = 1; ?>
				  	<?php foreach ($ruangan as $ru): ?>
				    <tr>
				      	<td><?= $i;?></td>
				      	<td><?= $ru['ruangan'];?></td>
              			<td>
                            <a href="<?= base_url('ruangan/editDataRuangan/').$ru['id_ruangan'];?>" class="badge badge-success">Edit</a>
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
<div class="modal fade" id="newRuangan" tabindex="-1" role="dialog" aria-labelledby="newRuangan" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRuangan">Tambah Ruangan Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('ruangan/pengaturanRuangan'); ?>
        <div class="modal-body">
                <div class="form-group">
                    <label>Nama Ruangan:</label>
                    <input type="text" class="form-control form-control-user" id="ruangan" name="ruangan" placeholder="Masukan Nama Ruangan..." value="<?= set_value('ruangan'); ?>">
                    <?= form_error('ruangan','<small class="text-danger pl-3">','</small>'); ?> 
               
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