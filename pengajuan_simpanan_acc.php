<?php $menu = 'pengajuanS'; ?>
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
            <li class="breadcrumb-item no-drop active">Pengajuan Simpanan</li>
            <li class="ml-auto active font-weight-bold">Pengajuan Simpanan</li>
        </ol>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div style="overflow-x: auto;">
                            <table class=" table table-bordered display nowrap fixed" id="tabel-data" style="font-size: 16px;">
                                <col width="50px">
                                <col width="150px">
                                <col width="150px">
                                <col width="200px">
                                <col width="150px">
                                <col width="150px">
                                <col width="150px">
                                <col width="0">
                                <col width="150px">
                                <col width="120px">
                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>ID Simpanan</th>
                                        <th>ID Tabungan</th>
                                        <th>Jenis Simpanan</th>
                                        <th>Nama Anggota</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Saldo Simpanan</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                                            <th>Aksi</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php
                                        if ($_SESSION['Level'] == 'Petugas') {
                                            $sql = mysqli_query($konek, "SELECT * FROM simpanan INNER JOIN anggota USING(ID_Tabungan) ORDER BY ID_Simpanan ASC");
                                        }
                                        while ($s = mysqli_fetch_array($sql)) {
                                        if($s['Status_Simpanan']=='Konfirmasi'){$color = "text-dark";}
                                        elseif($s['Jenis_Simpanan']=='Simpanan Wajib'){$color = "text-warning";}
                                        else{$color = "text-primary";}
                                    ?>
                                        <tr class="<?= $color; ?>">
                                            <td align="center"><?= $i++; ?></td>
                                            <td align="center"><?= $s["ID_Simpanan"]; ?></td>
                                            <td align="center"><?= $s["ID_Tabungan"]; ?></td>
                                            <td align="center"><?= $s["Jenis_Simpanan"]; ?></td>
                                            <td width="200px"><?= $s["Nama_Anggota"]; ?></td>
                                            <td align="center"><?= $s["Tanggal_Transaksi"]; ?></td>
                                            <td align="right"><?= rupiah($s["Saldo_Simpanan"]); ?></td>
                                            <td>
                                                <a id="view" data-toggle="modal" data-target="#editLayoutItem" data-ID_Simpanan="<?= $s['ID_Simpanan']; ?>" data-ID_Tabungan="<?= $s['ID_Tabungan']; ?>" data-Jenis_Simpanan="<?= $s['Jenis_Simpanan']; ?>" data-Nama_Anggota="<?= $s['Nama_Anggota']; ?>" data-Tanggal_Transaksi="<?= $s['Tanggal_Transaksi']; ?>" data-Saldo_Simpanan="<?= $s['Saldo_Simpanan']; ?>" data-gambar="<?= $s['gambar']; ?>" class=" w-40 w-sm-100" data-toggle="tooltip" data-placement="top" title="Klik untuk melihat gambar ukuran besar">
                                                    <img src="img/<?= $s['gambar']; ?>" width="80">
                                                </a>
                                            </td>
                                            <td align="right"><?= $s["Status_Simpanan"]; ?></td>
                                            <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                                                <td align="center">
                                                    <?php if ($s['Status_Simpanan'] == 'Menunggu') { ?>
                                                        <a href="acc_simpanan.php?act=acc_simpanan&ID_Simpanan=<?= $s['ID_Simpanan'] ?>&Saldo_Simpanan=<?= $s['Saldo_Simpanan'] ?>&ID_Tabungan=<?= $s['ID_Tabungan'] ?>" data-toggle="tooltip" data-placement="top" title="Konfirmasi"><button class="btn btn-icon btn-outline-primary"><i class='fa fa-check'></i></button></a> |
                                                        <a href="hapus_simpanan.php?ID_Simpanan=<?= $s['ID_Simpanan'] ?>&gambar=<?= $s['gambar']; ?>" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn-del"><button class="btn btn-icon btn-outline-danger"><i class='fa fa-trash'></i></button></a>
                                                    <?php } else { ?>
                                                         <a href="acc_simpanan.php?act=batal&ID_Simpanan=<?= $s['ID_Simpanan'] ?>&Saldo_Simpanan=<?= $s['Saldo_Simpanan'] ?>&ID_Tabungan=<?= $s['ID_Tabungan'] ?>" data-toggle="tooltip" data-placement="top" title="Batalkan"><button class="btn btn-icon btn-outline-warning"><i class='fa fa-times'></i></button></a> |
                                                    <?php } ?>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
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
            <div class="col-md-12">
                <img class="img-fluid" id="gambar" width="900" height="600">
            </div>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<script>
    // Gambar
    $(document).ready(function() {
        $(document).on('click', '#view', function() {
            var gambar = $(this).data('gambar');
            console.log(gambar);
            $('#gambar').attr('src', 'img/' + gambar);
            $('#view').text(view);
        })
    })
</script>