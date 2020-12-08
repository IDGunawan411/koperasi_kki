<?php $menu = 'pinjaman'; ?>
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

        <?php if ($_SESSION['Level'] == 'Petugas') { ?>
            <ol class="breadcrumb mb-4" style="font-size: 16px">
                <li><i class="fa fa-home" aria-hidden="true"></i></li>
                <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item no-drop active">Pinjaman</li>
                <li class="ml-auto active font-weight-bold">Pinjaman</li>
            </ol>
        <?php } else { ?>
            <ol class="breadcrumb" style="font-size: 16px">
                <li><i class="fa fa-home" aria-hidden="true"></i></li>
                <li class="ml-auto active font-weight-bold">Peminjaman</li>
            </ol>
        <?php } ?>

        <div class="row">
            <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2 bg-dark rounded text-white p-2 text-center">
                                <a>PENGAJUAN PINJAMAN</a>
                            </div>
                            <a href="tambah_pinjaman.php" class="mb-2 btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                            <div class="dt-responsive p-4" style="overflow-y: scroll;">
                                <table id="alt-pg-dt" class="table nowrap table-bordered" style="font-size: 18px;">
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
                                        $sql = mysqli_query($konek, "SELECT * FROM pinjaman INNER JOIN anggota USING(ID_Anggota)  ORDER BY ID_Pinjaman ASC");
                                        while ($p = mysqli_fetch_array($sql)) {
                                            $color = "color:" . ($p['Status_Pinjaman'] == 'Konfirmasi' ? 'black' : 'red') . "";
                                        ?>
                                            <tr style="<?= $color; ?>">
                                                <td align="center" style="font-size: 14px;"><?= $i; ?></td>
                                                <td align="center" style="font-size: 14px;"><?= $p["ID_Pinjaman"]; ?></td>
                                                <td align="center" style="font-size: 14px;"><?= $p["Tgl_Entri"]; ?></td>
                                                <td align="center" style="font-size: 14px;"><?= $p["Nama_Anggota"]; ?></td>
                                                <td align="center" style="font-size: 14px;"><?= $p["Nama_Pinjaman"]; ?></td>
                                                <td align="right" style="font-size: 14px;"><?= rupiah($p["Besar_Pinjaman"]); ?></td>
                                                <td align="center" style="font-size: 14px;"><?= $p["Lama_Angsuran"]; ?>x</td>
                                                <td align="right" style="font-size: 14px;"><?= $p["Bunga"]; ?>%</td>
                                                <td align="right" style="font-size: 14px;"><?= rupiah($p["Besar_Angsuran"]); ?></td>
                                                <td align="center" style="font-size: 14px;"><?= $p["Status_Pinjaman"] ?></td>
                                                <td>
                                                    <a href="angsuran.php?act=tolak&ID_Pinjaman=<?= $p['ID_Pinjaman']; ?>" data-toggle="tooltip" data-placement="top" title="Klik untuk melihat Angsuran">
                                                        <button class="btn btn-icon btn-outline-primary"><i class='fa fa-list'></i></button>
                                                    </a>

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
            <?php } else { ?>
                <div class="col-md-12">
                    <a href="tambah_pinjaman.php" data-toggle="tooltip" data-placement="top" title="Minta Pengajuan Pinjaman">
                        <button class="mb-10 btn btn-sm ik ik-plus bg-primary text-white"></button></a>

                    <?php
                    $sql = mysqli_query($konek, "SELECT * FROM pinjaman INNER JOIN anggota USING(ID_Anggota) WHERE ID_Anggota = '$da[ID_Anggota]'  ORDER BY ID_Pinjaman ASC");
                    while ($p = mysqli_fetch_array($sql)) {
                        $color = ($p['Status_Pinjaman'] == 'Konfirmasi' ? 'text-success' : 'text-danger');
                    ?>
                        <div class="widget border shadow-sm" style="margin-bottom:2px">
                            <div class="widget-header bg-dark text-white">
                                <h3 class="widget-title h5 font-weight-bold">- <?= $p['ID_Pinjaman'] ?> -</h3>
                                <div class="widget-tools pull-right">
                                    <!-- Modal Info Penarikan -->
                                    <a href="#"><button class="btn btn-sm btn-widget-tool ik ik-info text-white" data-toggle="modal" data-target="#exampleModal"></button></a>
                                    <button type="button" class="btn btn-sm btn-widget-tool minimize-widget text-white ik ik-minus"></button>
                                </div>
                            </div>
                            <div class="widget-body" style="padding: 0px 10px;">
                                <table class="table">
                                    <tr>
                                        <td><i class="fas fa-clipboard-list text-primary"></i></td>
                                        <td>Tanggal Pengajuan</td>
                                        <td><?= $p['Tgl_Entri']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-clipboard-check text-success"></i></td>
                                        <td>Besar Pinjaman</td>
                                        <td><?= rp($p['Besar_Pinjaman']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-list text-warning"></i></td>
                                        <td>Angsuran</td>
                                        <td><a href="#"><?= rp($p['Besar_Angsuran']) . " #" . $p['Lama_Angsuran']; ?>x</a></td>
                                    </tr>
                                    <tr>
                                        <td><i class="ik ik-info text-info"></i></td>
                                        <td>Status Pinjaman</td>
                                        <td class="<?= $color; ?>"><?= $p['Status_Pinjaman']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">INFORMSASI PINJAMAN</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row invoice-info">
                                            <div class="col-sm-12 invoice-col">
                                                <address>
                                                    <strong>ID Pinjaman</strong><br>
                                                    <p class="text-danger h5"><?= $p['ID_Pinjaman']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>ID Anggota</strong><br>
                                                    <p class="text-danger h5"><?= $p['ID_Anggota']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>Nama Pinjaman</strong><br>
                                                    <p class="text-danger h5"><?= $p['Nama_Pinjaman']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>Besar Pinjaman</strong><br>
                                                    <p class="text-danger h5"><?= rp($p['Besar_Pinjaman']); ?></p>
                                                </address>
                                                <address>
                                                    <strong>Besar Angsuran</strong><br>
                                                    <p class="text-danger h5"><?= rp($p['Besar_Angsuran']) ?></p>
                                                </address>
                                                <address>
                                                    <strong>Lama Angsuran</strong><br>
                                                    <p class="text-danger h5"><?= $p['Lama_Angsuran']; ?>x</p>
                                                </address>
                                                <address>
                                                    <strong>Bunga</strong><br>
                                                    <p class="text-danger h5"><?= $p['Bunga']; ?>%</p>
                                                </address>
                                                <address>
                                                    <strong>Tanggal Pinjam</strong><br>
                                                    <p class="text-danger h5"><?= $p['Tgl_Entri']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>Jatuh Tempo</strong><br>
                                                    <p class="text-danger h5"><?= tgl($p['Jatuh_Tempo']); ?></p>
                                                </address>
                                                <address>
                                                    <strong>Status Pinjaman</strong><br>
                                                    <p class="text-danger h5"><?= $p['Status_Pinjaman']; ?></p>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>