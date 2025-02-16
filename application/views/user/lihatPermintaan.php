    <div class="page-header">
      <h2 class="h2 mb-4 text-gray-800">&nbsp;LIHAT PERMINTAAN BARANG</h2>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table" id="dataTable">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Ruangan</th>
                        <th scope="col">Barang yang diminta</th>
                        <th scope="col">periode</th>
                        <th scope="col">Tanggal Pengajuan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($permintaan as $p) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $p['name'];?></td>
                        <td><?= $p['ruangan'];?></td>
                        <td><?= $p['nama_barang_masuk'];?></td>
                        <td><?= $p['periode_permintaan'];?></td>
                        <td><?= date('d-m-Y',$p['created_at']);?></td>
                        <td><p style="<?php if($p['status_permintaan'] == 'Disetujui') { echo 'color:green;'; } elseif($p['status_permintaan'] == 'Ditolak') { echo 'color:red;'; }?>"><?= $p['status_permintaan'];?></p></td>
                    </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>