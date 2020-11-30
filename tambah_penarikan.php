<?php $menu = 'penarikan'; ?>
<?php include 'header.php'; 

function rp($angka)
{

    $hasil_rupiah = "Rp. " . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}
?>


<div class="main-content">
    <div class="container-fluid">
    <?php if($_SESSION['Level']=='Petugas'){ ?>
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Penarikan</li>
            <li class="breadcrumb-item no-drop active">Tambah Penarikan</li>
            <li class="ml-auto active font-weight-bold">Penarikan</li>
        </ol>
    <?php }else{ ?>
        <ol class="breadcrumb" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="ml-auto active font-weight-bold">Tambah Penarikan</li>
        </ol>
    <?php } ?>
        
        <div class="row">
            <div class="col-md-12">
                <?php if($_SESSION['Level']=='Petugas'){ ?>
                    <a href="pengajuan_penarikan.php" class="btn btn-danger mb-20"><i class="ik ik-arrow-left"></i>&nbsp; Kembali</a>
                <?php } else { ?>
                    <a href="penarikan.php" class="btn btn-danger mb-20"><i class="ik ik-arrow-left"></i>&nbsp; Kembali</a>
                <?php } ?>
                <form method="post" action="" class="was-validated" style="border: 4px">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body shadow p-3 rounded">
                                    <?php
                                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                            $idPenarikan        = $_POST['ID_Penarikan'];
                                            $idTabungan         = $_POST['ID_Tabungan'];
                                            $besarPenarikan     = $_POST['Besar_Penarikan'];
                                            $tglEntri           = $_POST['Tgl_Entri'];

                                            if ($idTabungan == '' | $besarPenarikan == '' | $tglEntri == '' | $idPenarikan == '') {
                                                echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                                    Data Belum lengkap !!!
                                                </div>";
                                            } else {
                                                //simpan data penarikan
                                                $simpan = mysqli_query(
                                                $konek,
                                                "INSERT INTO `penarikan` (`ID_Penarikan`, `ID_Tabungan`, `Besar_Penarikan`, `Tgl_Entri`, `Status_Penarikan`)
                                                VALUES ('$idPenarikan', '$idTabungan', '$besarPenarikan', '$tglEntri', 'Menunggu')");

                                                if($_SESSION['Level']=='Petugas'){
                                                    echo "<script>document.location.href = 'pengajuan_penarikan.php';</script>";
                                                }else{
                                                    echo "<script>document.location.href = 'penarikan.php';</script>";
                                                }
                                            }
                                        }
                                        //membuat ID Penarikan
                                        $today           = "P19";
                                        $query           = mysqli_query($konek, "SELECT max(ID_Penarikan) AS last FROM penarikan WHERE ID_Penarikan LIKE '$today%'");
                                        $data            = mysqli_fetch_array($query);
                                        $lastNoBayar     = $data['last'];
                                        $lastNoUrut      = substr($lastNoBayar, 3, 4);
                                        $nextNoUrut      = $lastNoUrut + 1;
                                        $nextNoPenarikan = $today . sprintf('%04s', $nextNoUrut);
                                    ?>
                                    <div class="btn btn-md btn-danger btn-block" style="height: auto">
                                        <i class="fa fa-lock fa-md"></i>
                                        <span>Data Pribadi</span>
                                    </div>
                                    <br>
                                    <div class="border p-2">
                                        <?php
                                        $sqltb = mysqli_query($konek, "SELECT * FROM tabungan WHERE ID_Tabungan = '$da[ID_Tabungan]'");
                                        $dtb   = mysqli_fetch_array($sqltb);
                                        ?>
                                        <span class="h5">Tabungan : <?= rp($dtb['Besar_Tabungan']); ?></span>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ID_Penarikan" class="col-sm-3 col-form-label text-right">ID Penarikan :</label>
                                        <div class="col-sm-7">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $nextNoPenarikan; ?>" name="ID_Penarikan" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                                        <div class="form-group row">
                                            <label for="ID_Tabungan" class="col-sm-3 col-form-label text-right">Anggota :</label>
                                            <div class="col-sm-7">
                                                <div class="md-form mt-0">
                                                    <select name="ID_Tabungan" class="form-control" id="exampleSelectGender">
                                                        <option selected value="0" readonly>-- Pilih Tabungan --</option>
                                                        <?php
                                                        $sql_a = mysqli_query($konek, "SELECT * FROM tabungan INNER JOIN anggota on anggota.ID_Tabungan = tabungan.ID_Tabungan");
                                                        while ($a = mysqli_fetch_array($sql_a)) {
                                                        ?>
                                                            <option value="<?= $a['ID_Tabungan'] ?>"><?= $a['Nama_Anggota'] . " - " . $a['ID_Tabungan'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="form-group row">
                                            <label for="ID_Tabungan" class="col-sm-3 col-form-label text-right">Anggota :</label>
                                            <div class="col-sm-7">
                                                <div class="md-form mt-0">
                                                    <input class="form-control" type="text" value="<?= $da['Nama_Anggota'] . " - " . $da['ID_Tabungan']; ?>" name="" readonly>
                                                    <input class="form-control" type="hidden" value="<?= $da['ID_Tabungan']; ?>" name="ID_Tabungan" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <div class="form-group row">
                                        <label for="Besar_Penarikan" class="col-sm-3 col-form-label text-right">Besar Penarikan :</label>
                                        <div class="col-sm-7">
                                            <div class="md-form mt-0">
                                                <input type="number" class="form-control text-right" id="Besar_Penarikan" placeholder="0.00" name="Besar_Penarikan" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Tgl_Entri" class="col-sm-3 col-form-label text-right">Tanggal Penarikan :</label>
                                        <div class="col-sm-7">
                                            <div class="md-form mt-0">
                                                <input type="date" value="<?= date('Y-m-d'); ?>" class="form-control text-right" id="Tgl_Entri" placeholder="0.00" name="Tgl_Entri" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label text-right"></label>
                                        <div class="col-sm-7">
                                            <div class="md-form mt-0">
                                                <input type="submit" value="Simpan" name="simpan" class="btn btn-success" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>