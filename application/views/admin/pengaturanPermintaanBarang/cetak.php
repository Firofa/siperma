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
        <img src="<?= base_url('assets/img/logo/').$permintaan['logo_kantor'];?>" class="img-thumbnail" style="width:100px; height:100px;" alt="Logo kantor">
		<h2><?= $permintaan['work_unit']; ?></h2>
		<h4><?= $permintaan['alamat'] ?>, <?= $permintaan['no_telp'] ?></h4>
    </center>
    <hr style="border:2px black solid;">
    <center>
        <h2>Tanda Terima Barang</h2>
        <table class="table" style="border:2px black solid;">
            <tr style="border:2px black solid;">
                <td style="border:2px black solid;">Nama</td>
                <td style="border:2px black solid;"><?= $permintaan['name']; ?></td>
            </tr>
            <tr style="border:2px black solid;">
                <td style="border:2px black solid;">Bagian yang Mengajukan</td>
                <td style="border:2px black solid;"><?= $permintaan['ruangan']; ?></td>
            </tr>
            <tr style="border:2px black solid;">
                <td style="border:2px black solid;">Jenis Barang</td>
                <td style="border:2px black solid;"><?= $permintaan['nama_barang_masuk']; ?></td>
            </tr>
            <tr style="border:2px black solid;">
                <td style="border:2px black solid;">Tindak Lanjut</td>
                <td style="border:2px black solid;"><?= $permintaan['status_permintaan']; ?></td>
            </tr>
            <tr style="border:2px black solid;">
                <td style="border:2px black solid;">Keterangan</td>
                <?php $time = strtotime($permintaan['periode_permintaan']); ?>
                <td style="border:2px black solid;">Periode Permintaan Barang Untuk: <?= date("F Y",$time); ?></td>
            </tr>
        </table>
    </center>
    <h4>Pada Hari ini <b><?= $hariIndo; ?></b> tanggal <b><?= date('d-m-Y',time()); ?></b>, Telah diberikan permintaan barang sesuai dengan permintaan Barang pertanggal <b><?= date('d-m-Y',$permintaan['tanggal_permintaan']); ?></b></h4>
    <h4>Demikian Bukti Penerimaan ini dibuat. Terima Kasih</h4>
    <br>
    <div style="float:left;">
    <h4>Penanggung Jawab</h4>
    <br>
    <br>
    <br>
    <br>
    <h4><?= $user['name']; ?></h4>
    </div>
    <div style="float:right;">
    <h4>Penerima Barang</h4>
    <br>
    <br>
    <br>
    <br>
    <h4><?= $permintaan['name']; ?></h4>
    <h4>NIP. <?= $permintaan['nip'];?></h4>
    </div>      
</div>
 
 
	
 
</body>
</html>
    <!-- <script>
        setTimeout(function () { window.print(); }, 10);
        window.onfocus = function () { setTimeout(function () { window.close(); }, 10); }
	</script> -->