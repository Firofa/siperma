<!DOCTYPE html>
<html>
<head>
    <title>Cetak Bukti Penerimaan Barang</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
</head>
<body>
    <?php
        //Ambil Hari dalam bahasa indo
        $hariInggris = date('l', time());
        function hariIndo($hariInggris) {
        switch ($hariInggris) {
            case 'Sunday':
            return 'Minggu';
            case 'Monday':
            return 'Senin';
            case 'Tuesday':
            return 'Selasa';
            case 'Wednesday':
            return 'Rabu';
            case 'Thursday':
            return 'Kamis';
            case 'Friday':
            return 'Jumat';
            case 'Saturday':
            return 'Sabtu';
            default:
            return 'hari tidak valid';
        }
        }
        $hariIndo = hariIndo($hariInggris);
    ?>
    <div class="container-fluid">
    <center>
        <h2>Nota Barang</h2>
        <hr style="border:2px solid black;">
        <table class="table" style="border:2px black solid;">
            <tr style="border:2px black solid;">
                <th style="border:2px black solid;">No</th>
                <th style="border:2px black solid;">Nama Barang</th>
                <th style="border:2px black solid;">Jumlah Barang</th>
                <th style="border:2px black solid;">Harga Satuan Barang</th>
                <th style="border:2px black solid;">Total Harga</th>
                <th style="border:2px black solid;">Keterangan</th>
            </tr>
            <tr>
                <td style="border:2px black solid;">1</td>
                <td style="border:2px black solid;"><?= $barang_masuk['nama_barang_masuk'];?></td>
                <td style="border:2px black solid;"><?= $barang_masuk['jumlah_barang_masuk'];?></td>
                <td style="border:2px black solid;"><?= $barang_masuk['harga_satuan_barang'];?></td>
                <td style="border:2px black solid;"><?= $barang_masuk['total_harga'];?></td>
                <td style="border:2px black solid;"><?= $barang_masuk['nota_barang_masuk'];?></td>
            </tr>
        </table>
    </center>
          
</div>
 
 
	
 
</body>
</html>
    <script>
        setTimeout(function () { window.print(); }, 10);
        window.onfocus = function () { setTimeout(function () { window.close(); }, 10); }
	</script>