<?php $menu = 'pengajuanPI'; ?>
<?php include 'header.php'; ?>

<?php
//membuat format rupiah dengan PHP
//tutorial www.malasngoding.com

function rupiah($angka)
{

    $hasil_rupiah = "" . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}

function rp($angka)
{

    $hasil_rupiah = "Rp. " . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}
?>
<div class="main-content">
    <div class="container-fluid">

        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Pinjaman</li>
            <li class="ml-auto active font-weight-bold">Pinjaman</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2 bg-dark rounded text-white p-2 text-center">
                            <a>PENGAJUAN PINJAMAN</a>
                        </div>
                        <a href="tambah_pinjaman.php" class="mb-2 btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                        <div class="dt-responsive p-4" style="overflow-y: scroll;">
                            <table id="order-table" class="table nowrap table-bordered">
                                <!-- <col width=""><col width=""><col width=""><col width=""><col width=""><col width=""><col width=""><col width=""><col width="">
                                <col width="50px"> -->
                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>ID Pinjaman</th>
                                        <th>Tgl Pinjam</th>
                                        <th>Nama Anggota</th>
                                        <th>Jenis Pinjaman</th>
                                        <th>Jumlah Pinjaman</th>
                                        <th>Angsuran</th>
                                        <th>Bunga</th>
                                        <th>Jumlah Angsuran</th>
                                        <th>Status</th>
                                        <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                                            <th>Aksi</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php
                                    if ($_SESSION['Level'] == 'Petugas') {
                                        $sql = mysqli_query($konek, "SELECT * FROM pinjaman INNER JOIN anggota USING(ID_Anggota)  ORDER BY ID_Pinjaman ASC");
                                    } else {
                                        $sql = mysqli_query($konek, "SELECT * FROM pinjaman INNER JOIN anggota USING(ID_Anggota) WHERE ID_Anggota = '$da[ID_Anggota]'  ORDER BY ID_Pinjaman ASC");
                                    }
                                    while ($p = mysqli_fetch_array($sql)) {

                                        // $st_angsur = mysqli_query($konek, "SELECT SUM(Besar_Angsuran) as total_angsur FROM angsuran WHERE Status_Angsuran='Lunas'
                                        // AND ID_Pinjaman='$p[ID_Pinjaman]'");
                                        // $dta = mysqli_fetch_array($st_angsur);

                                        // $st_angsur1 = mysqli_query($konek, "SELECT SUM(Besar_Angsuran) as sisa_angsur FROM angsuran
                                        // WHERE ID_Pinjaman='$p[ID_Pinjaman]'");
                                        // $dta1 = mysqli_fetch_array($st_angsur1);

                                        // $total_agsur = $dta['total_angsur'];
                                        // if ($dta['total_angsur'] == $dta1['sisa_angsur']) {
                                        //     $text_lunas = "text-primary";
                                        //     $status_lunas = "Lunas";
                                        // } else {
                                        //     $text_lunas = "";
                                        //     $status_lunas = "Belum Lunas";
                                        // }

                                    ?>
                                        <tr class="<?= $text_lunas; ?>">
                                            <td align="center"><?= $i; ?></td>
                                            <td align="center"><?= $p["ID_Pinjaman"]; ?></td>
                                            <td align="center"><?= $p["Tgl_Entri"]; ?></td>
                                            <td align="center"><?= $p["Nama_Anggota"]; ?></td>
                                            <td align="center"><?= $p["Nama_Pinjaman"]; ?></td>
                                            <td align="right"><?= rupiah($p["Besar_Pinjaman"]); ?></td>
                                            <td align="center"><?= $p["Lama_Angsuran"]; ?>x</td>
                                            <td align="right"><?= $p["Bunga"]; ?>%</td>
                                            <td align="right"><?= rupiah($p["Besar_Angsuran"]); ?></td>
                                            <td align="center"><?= $p["Status_Pinjaman"] ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-icon" href="acc_pinjaman.php?act=acc&ID_Pinjaman=<?= $p['ID_Pinjaman']; ?>"><i class='fa fa-check'></i></a>
                                                <a class="btn btn-danger btn-icon" href="acc_pinjaman.php?act=tolak&ID_Pinjaman=<?= $p['ID_Pinjaman']; ?>"><i class='fa fa-times'></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>