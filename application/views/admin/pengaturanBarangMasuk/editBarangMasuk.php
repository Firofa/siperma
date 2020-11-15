        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


          <div class="row">
          	<div class="col-lg-6">
              <?= $this->session->flashdata('message'); ?>
            </div>
          	<div class="col-lg-8">
				<?= form_open_multipart('barangmasuk/doEditDataBarang/'); ?>
                <div class="form-group row">
                    <input type="text" class="form-control form-control-user" id="id_barang_masuk" name="id_barang_masuk" value="<?= $barang_masuk['id_barang_masuk'];?>" READONLY>
                    <?= form_error('id_barang_masuk','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group row">
                    <label>Nama Barang Masuk:</label>
                    <input type="text" class="form-control form-control-user" id="nama_barang_masuk" name="nama_barang_masuk" value="<?= $barang_masuk['nama_barang_masuk'];?>" placeholder="Masukan Nama Barang..">
                    <?= form_error('nama_barang_masuk','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Jumlah Barang Masuk:</label>
                    <input type="number" class="form-control form-control-user" id="jumlah_barang_masuk" name="jumlah_barang_masuk" placeholder="Masukan Jumlah Barang Masuk..." value="<?= $barang_masuk['jumlah_barang_masuk'];?>">
                    <?= form_error('jumlah_barang_masuk','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Harga Satuan Barang:</label>
                    <input type="number" class="form-control form-control-user" id="harga_satuan_barang" name="harga_satuan_barang" placeholder="Masukan Harga Satuan Barang.." value="<?= $barang_masuk['harga_satuan_barang'];?>">
                    <?= form_error('harga_satuan_barang','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Total Harga:</label>
                    <input type="number" class="form-control form-control-user" id="total_harga" name="total_harga" placeholder="Masukan Total Harga..." value="<?= $barang_masuk['total_harga'];?>">
                    <?= form_error('total_harga','<small class="text-danger pl-3">','</small>'); ?> 
                </div>
                <div class="form-group ">
                    <label>Nota Barang Masuk:</label>
                    <input type="text" class="form-control form-control-user" id="nota_barang_masuk" name="nota_barang_masuk" placeholder="Masukan Nota Barang Masuk..." value="<?= $barang_masuk['nota_barang_masuk'];?>">
                    <?= form_error('nota_barang_masuk','<small class="text-danger pl-3">','</small>'); ?> 
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

      