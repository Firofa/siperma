    <div class="page-header">
      <h2 class="h2 mb-4 text-gray-800">&nbsp;LIHAT STOK BARANG</h2>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table" id="dataTable">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Stok Barang</th>
                    </tr>
                </thead>
                <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($barang as $b) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $b['nama_barang_masuk'];?></td>
                        <td><?= $b['jumlah_barang_masuk'];?></td>
                    </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>