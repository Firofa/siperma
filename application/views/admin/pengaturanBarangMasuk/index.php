
        <!-- Begin Page Content -->
        <div class="container-fluid">

                <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?> : Barang Persediaan Masuk</h1>
          	
          	<!-- Konten Tabel -->
          	<div class="row">	
                <div class="col-lg"> 
                  <?php   if(validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
                  <?php   endif; ?>
                          <?= $this->session->flashdata('message'); 	 ?>
                          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newBarangMasuk">Tambah Barang Masuk Baru</a>
          <div class="card-body">
          <div class="table-responsive"> 
          <table class="table table-bordered" id="dataTable">
				  <thead>
				    <tr>
				      	<th scope="col">No</th>
				      	<th scope="col">Nama Barang Masuk</th>
				      	<th scope="col">Jumlah Barang Masuk</th>
                        <th scope="col">Harga Satuan Barang</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pilihan</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 	$i = 1; ?>
				  	<?php foreach ($barang_masuk as $bm): ?>
				    <tr>
				      	<td><?= $i;?></td>
				      	<td><?= $bm['nama_barang_masuk'];?></td>
              			<td><?= $bm['jumlah_barang_masuk'];?></td>
              			<td><?= $bm['harga_satuan_barang']?></td>
              			<td><?= date('d M Y', $bm['updated_at']); ?></td>
              			<td>
                            <a href="<?= base_url('BarangMasuk/cetakDataBarang/').$bm['id_barang_masuk'];?>" target="_blank" class="badge badge-secondary">Cetak</a>
                            <a href="<?= base_url('BarangMasuk/editDataBarang/').$bm['id_barang_masuk'];?>" class="badge badge-success">Edit</a>
                            <a href="<?= base_url('BarangMasuk/hapusDataBarang/').$bm['id_barang_masuk'];?>" class="badge badge-danger">Hapus</a>
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
<div class="modal fade" id="newBarangMasuk" tabindex="-1" role="dialog" aria-labelledby="newBarangMasuk" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newBarangMasuk">Tambah Barang Masuk Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('BarangMasuk'); ?>
      <div class="modal-body">
      <div class="form-group">
                    <label>Nama Barang Masuk:</label>
                    <input type="text" class="form-control form-control-user" id="nama_barang_masuk" name="nama_barang_masuk" placeholder="Masukan Nama Unit Kerja..." value="<?= set_value('nama_barang_masuk'); ?>">
                    <?= form_error('nama_barang_masuk','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Jumlah Barang Masuk:</label>
                    <input type="number" class="form-control form-control-user" id="jumlah_barang_masuk" name="jumlah_barang_masuk" placeholder="Masukan Jumlah Barang Masuk..." value="<?= set_value('jumlah_barang_masuk'); ?>">
                    <?= form_error('jumlah_barang_masuk','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Harga Satuan Barang:</label>
                    <input type="number" class="form-control form-control-user" id="harga_satuan_barang" name="harga_satuan_barang" placeholder="Masukan Harga Satuan Barang.." value="<?= set_value('harga_satuan_barang'); ?>">
                    <?= form_error('harga_satuan_barang','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Total Harga:</label>
                    <input type="number" class="form-control form-control-user" id="total_harga" name="total_harga" placeholder="Masukan Total Harga..." value="<?= set_value('total_harga'); ?>">
                    <?= form_error('total_harga','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nota Barang Masuk:</label>
                    <input type="text" class="form-control form-control-user" id="nota_barang_masuk" name="nota_barang_masuk" placeholder="Masukan Nota Barang Masuk..." value="<?= set_value('nota_barang_masuk'); ?>">
                    <?= form_error('nota_barang_masuk','<small class="text-danger pl-3">','</small>'); ?> 
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