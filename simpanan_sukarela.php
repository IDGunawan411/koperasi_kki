<?php $menu = 'sukarela'; ?>
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
                <li class="breadcrumb-item no-drop active">Simpanan Sukarela</li>
                <li class="ml-auto active font-weight-bold">Simpanan Sukarela</li>
            </ol>
        <?php } else { ?>
            <ol class="breadcrumb" style="font-size: 16px">
                <li><i class="fa fa-home" aria-hidden="true"></i></li>
                <li class="ml-auto active font-weight-bold">Simpanan Sukarela</li>
            </ol>
        <?php } ?>
        <div class="row">
            <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <a href="tambah_simpanan.php" class="btn btn-primary btn-sm" style="margin-bottom: 10px; height: auto" data-toggle="tooltip" data-placement="top" title="Tambah Data Simpanan"><i class="fa fa-plus" aria-hidden="true"></i>Tambah Data</a> -->
                            <br>
                            <div class="dt-responsive p-4" style="overflow-x: auto;">
                                <table class=" table table-bordered display nowrap fixed" id="alt-pg-dt" style="font-size: 16px;">
                                    <col width="30px">
                                    <col width="100px">
                                    <col width="100px">
                                    <col width="300px">
                                    <col width="150px">
                                    <col width="150px">
                                    <col width="100px">
                                    <col width="100px">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>ID Simpanan</th>
                                            <th>ID Tabungan</th>
                                            <th>Nama_Anggota</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Saldo Simpanan</th>
                                            <th>Gambar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $query = "SELECT * FROM simpanan INNER JOIN anggota 
                                    on anggota.ID_Tabungan = simpanan.ID_Tabungan WHERE Jenis_Simpanan='Simpanan Sukarela' AND Status_Simpanan='Konfirmasi'";

                                        $sql_total  = mysqli_query($konek, "SELECT SUM(Saldo_Simpanan) as Total_Sukarela FROM simpanan 
                                    INNER JOIN anggota on anggota.ID_Tabungan = simpanan.ID_Tabungan WHERE Jenis_Simpanan='Simpanan Sukarela'");
                                        $total_sw   = mysqli_fetch_array($sql_total);
                                        $sw         = $total_sw['Total_Sukarela'];

                                        $sql = mysqli_query($konek, "$query");
                                        while ($s = mysqli_fetch_array($sql)) {
                                            $color = "color:" . ($s['Status_Simpanan'] == 'Konfirmasi' ? 'black' : 'red') . "";
                                        ?>
                                            <tr style="<?= $color; ?>">
                                                <td align="center"><?= $i++; ?></td>
                                                <td align="center"><?= $s["ID_Simpanan"]; ?></td>
                                                <td align="center"><?= $s["ID_Tabungan"]; ?></td>
                                                <td><?= $s["Nama_Anggota"]; ?></td>
                                                <td align="right"><?= $s["Tanggal_Transaksi"]; ?></td>
                                                <td align="right"><?= rupiah($s["Saldo_Simpanan"]); ?></td>
                                                <td align="center">
<<<<<<< HEAD
                                                <a href="#" type="button" class="btn-sm" data-toggle="modal" data-target="#myModal1<?= $w['ID_Simpanan']; ?>"><button class="btn btn-icon btn-outline-success"><i class='fa fa-image'></i></button></a>
                                                    
                                                    <div class="modal fade" id="myModal1<?= $w['ID_Simpanan']; ?>" role="dialog">
                                                        <div class="modal-dialog modal-lg">
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Bukti Pembayaran </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php
                                                                        $id = $w['ID_Simpanan'];
                                                                        $query_view = mysqli_query($konek, "SELECT * FROM Simpanan WHERE ID_Simpanan='$id'");
                                                                        //$result = mysqli_query($conn, $query);
                                                                        $data = mysqli_fetch_assoc($query_view) ?>
                                                                    <img id="myImg" src="img/<?= $data['gambar'] ?>" alt="picture" width="100%">,

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
=======
                                                    <a id="view" data-toggle="modal" data-target="#editLayoutItem" data-ID_Simpanan="<?= $s['ID_Simpanan']; ?>" data-ID_Tabungan="<?= $s['ID_Tabungan']; ?>" data-Jenis_Simpanan="<?= $s['Jenis_Simpanan']; ?>" data-Nama_Anggota="<?= $s['Nama_Anggota']; ?>" data-Tanggal_Transaksi="<?= $s['Tanggal_Transaksi']; ?>" data-Saldo_Simpanan="<?= $s['Saldo_Simpanan']; ?>" data-gambar="<?= $s['gambar']; ?>" class=" w-40 w-sm-100" data-toggle="tooltip" data-placement="top" title="Klik untuk melihat gambar ukuran besar">
                                                        <img src="img/<?= $s['gambar']; ?>" width="80">
>>>>>>> 3191a7719d9029ec20266cf03adc5f0af47f621f
                                                </td>
                                                <td align="center"><?= $s["Status_Simpanan"]; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class='border'>
                                <p class="p-2">Total Simpanan Sukarela : <?php if (isset($sw)) {
                                                                                echo rp($sw);
                                                                            } ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-12">
                    <?php
                    $query = "SELECT * from simpanan INNER JOIN anggota
                        on anggota.ID_Tabungan = simpanan.ID_Tabungan WHERE Jenis_Simpanan='Simpanan Sukarela'
                        AND anggota.ID_User='$_SESSION[ID_User]'";

                    $sql_total  = mysqli_query($konek, "SELECT SUM(Saldo_Simpanan) as Total_Sukarela FROM simpanan 
                        INNER JOIN anggota on anggota.ID_Tabungan = simpanan.ID_Tabungan WHERE Jenis_Simpanan='Simpanan Sukarela'
                        AND anggota.ID_User='$_SESSION[ID_User]'");
                    $total_sw   = mysqli_fetch_array($sql_total);
                    $sw         = $total_sw['Total_Sukarela'];

                    $sql = mysqli_query($konek, "$query");
                    while ($s = mysqli_fetch_array($sql)) {
                        $color = ($s['Status_Simpanan'] == 'Konfirmasi' ? 'text-success' : 'text-danger');
                    ?>
                        <div class="widget border shadow-sm" style="margin-bottom:2px">
                            <div class="widget-header bg-teal text-white">
                                <h3 class="widget-title h5 font-weight-bold">- <?= $s['ID_Simpanan'] ?> -</h3>
                                <div class="widget-tools pull-right">
                                    <!-- Modal Info Simpanan -->
                                    <a href="#"><button class="btn btn-sm btn-widget-tool ik ik-info text-white" data-toggle="modal" data-target="#exampleModal<?= $w['ID_Simpanan'] ?>"></button></a>
                                    <button type="button" class="btn btn-sm btn-widget-tool minimize-widget text-white ik ik-minus"></button>
                                </div>
                            </div>
                            <div class="widget-body" style="padding: 0px 10px;">
                                <table class="table">
                                    <tr>
                                        <td><i class="fas fa-clipboard-list text-primary"></i></td>
                                        <td>Tanggal Transaksi</td>
<<<<<<< HEAD
                                        <td><?= $w['Tanggal_Transaksi']; ?></td>
=======
                                        <td><?= $s['Tanggal_Transaksi']; ?></td>
>>>>>>> 3191a7719d9029ec20266cf03adc5f0af47f621f
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-clipboard-check text-success"></i></td>
                                        <td>Saldo Simpanan</td>
                                        <td><?= rp($s['Saldo_Simpanan']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="ik ik-info text-info"></i></td>
                                        <td>Status Simpanan</td>
                                        <td class="<?= $color; ?>"><?= $s['Status_Simpanan']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $w['ID_Simpanan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">INFORMSASI SIMPANAN</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php
                                    $id = $w['ID_Simpanan'];
                                    $gid=mysqli_query($konek, "SELECT * FROM simpanan WHERE ID_Simpanan='$id'");
                                    $g=mysqli_fetch_array($gid);
                                    ?>
                                    <div class="modal-body">
                                        <div class="row invoice-info">
                                            <div class="col-sm-12 invoice-col">
                                                <address>
                                                    <strong>ID Simpanan</strong><br>
<<<<<<< HEAD
                                                    <p class="text-danger h5"><?= $g['ID_Simpanan']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>ID Tabungan</strong><br>
                                                    <p class="text-danger h5"><?= $g['ID_Tabungan']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>Jenis Simpanan</strong><br>
                                                    <p class="text-danger h5"><?= $g['Jenis_Simpanan']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>Tanggal Transaksi</strong><br>
                                                    <p class="text-danger h5"><?= $g['Tanggal_Transaksi']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>Saldo Simpanan</strong><br>
                                                    <p class="text-danger h5"><?= rp($g['Saldo_Simpanan']) ?></p>
                                                </address>
                                                <address>
                                                    <strong>Status Simpanan</strong><br>
                                                    <p class="text-danger h5"><?= $g['Status_Simpanan']; ?></p>
=======
                                                    <p class="text-danger h5"><?= $s['ID_Simpanan']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>ID Tabungan</strong><br>
                                                    <p class="text-danger h5"><?= $s['ID_Tabungan']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>Jenis Simpanan</strong><br>
                                                    <p class="text-danger h5"><?= $s['Jenis_Simpanan']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>Tanggal Transaksi</strong><br>
                                                    <p class="text-danger h5"><?= $s['Tanggal_Transaksi']; ?></p>
                                                </address>
                                                <address>
                                                    <strong>Saldo Simpanan</strong><br>
                                                    <p class="text-danger h5"><?= rp($s['Saldo_Simpanan']) ?></p>
                                                </address>
                                                <address>
                                                    <strong>Status Simpanan</strong><br>
                                                    <p class="text-danger h5"><?= $s['Status_Simpanan']; ?></p>
>>>>>>> 3191a7719d9029ec20266cf03adc5f0af47f621f
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

<div class="modal fade edit-layout-modal" id="editLayoutItem" tabindex="-1" role="dialog" aria-labelledby="editLayoutItemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLayoutItemLabel">Sed id mi non quam iaculis pulvinar.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12" align="center">
                    <img class="img-fluid" id="gambar" width="900" height="600">
                </div>
            </div>

        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script>
    $(document).ready(function() {
        $(document).on('click', '#view', function() {
            var gambar = $(this).data('gambar');
            console.log(gambar);
            $('#gambar').attr('src', 'img/' + gambar);
            $('#view').text(view);
        })
    })
</script>