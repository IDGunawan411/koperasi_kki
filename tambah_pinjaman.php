<?php $menu = 'pinjaman'; ?>
<?php include 'header.php'; ?>


<div class="main-content">
    <div class="container-fluid">
    <?php if($_SESSION['Level']=='Petugas'){ ?>
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Pinjaman</li>
            <li class="breadcrumb-item no-drop active">Tambah Pinjaman</li>
            <li class="ml-auto active font-weight-bold">Pinjaman</li>
        </ol>
    <?php }else{ ?>
        <ol class="breadcrumb" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="ml-auto active font-weight-bold">Tambah Pinjaman</li>
        </ol>
    <?php } ?>
        
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="" class="was-validated">
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body shadow p-3 rounded">
                                    <div class="row clearfix">
                                        <a href="pinjaman.php"><button type="button" class="btn btn-danger btn-sm"><i class="ik ik-arrow-left"></i>&nbsp; Kembali</button></a>
                                    </div>
                                    <br>
                                    <?php
                                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                            $idPinjaman         = $_POST['ID_Pinjaman'];
                                            $idAnggota          = $_POST['ID_Anggota'];
                                            $namaPinjaman       = $_POST['Nama_Pinjaman'];
                                            $besarPinjaman      = $_POST['Besar_Pinjaman'];
                                            $besarAngsuran      = $_POST['Besar_Angsuran'];
                                            $lamaAngsuran       = $_POST['Lama_Angsuran'];
                                            $bunga              = $_POST['Bunga'];
                                            $tglEntri           = $_POST['Tgl_Entri'];
                                            $jatuhTempo         = $_POST['Jatuh_Tempo'];

                                            if ($idAnggota == '' | $namaPinjaman == '' | $besarPinjaman == '' | $besarAngsuran == '' | $lamaAngsuran == '' | $bunga == '' | $tglEntri == ''  | $jatuhTempo == '') {
                                                    echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>Data Belum lengkap !!!</div>";
                                            } else {
                                                $sql_np = mysqli_query($konek, "SELECT * FROM jenis_pinjaman WHERE Nama_Pinjaman='$namaPinjaman'");
                                                $np = mysqli_fetch_array($sql_np);
                                                if ($besarPinjaman > $np['Max_Pinjaman']) {
                                                    echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>Melebihi Batas Pinjaman !!! </div>";
                                                } else {
                                                    //simpan data
                                                    $simpan = mysqli_query(
                                                        $konek,
                                                        "INSERT INTO `pinjaman` (`ID_Pinjaman`, `ID_Anggota`, `Nama_Pinjaman`, `Besar_Pinjaman`, `Besar_Angsuran`, `Lama_Angsuran`,`Bunga`, `Tgl_Entri`, `Jatuh_Tempo`, `Status_Pinjaman`) 
                                                        VALUES ('$idPinjaman', '$idAnggota', '$namaPinjaman', '$besarPinjaman', '$besarAngsuran', '$lamaAngsuran', '$bunga', '$tglEntri', '$jatuhTempo', 'Menunggu')"
                                                    );
                                                    echo "<script>document.location.href = 'pinjaman.php';</script>";
                                                }
                                            }
                                        }
                                        //membuat ID Pinjaman
                                        $today          = "P21";
                                        $query          = mysqli_query($konek, "SELECT max(ID_Pinjaman) AS last FROM pinjaman WHERE ID_Pinjaman LIKE '$today%'");
                                        $data           = mysqli_fetch_array($query);
                                        $lastNoBayar    = $data['last'];
                                        $lastNoUrut     = substr($lastNoBayar, 3, 4);
                                        $nextNoUrut     = $lastNoUrut + 1;
                                        $nextNoPinjaman = $today . sprintf('%04s', $nextNoUrut);
                                    ?>
                                    <div class="btn btn-md btn-danger btn-block" style="height: auto">
                                        <i class="fa fa-lock fa-md"></i>
                                        <span>Data Pribadi</span>
                                    </div>

                                    <br>
                                    <div class="form-group row">
                                        <label for="ID_Pinjaman" class="col-sm-3 col-form-label text-right">ID Pinjaman :</label>
                                        <div class="col-sm-7">
                                            <div class="md-form mt-0">
                                                <input class="form-control" type="text" value="<?= $nextNoPinjaman; ?>" name="ID_Pinjaman" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Tgl_Entri" class="col-sm-3 col-form-label text-right" style="font-size: 15px">Tanggal Pinjam :</label>
                                        <div class="col-sm-7">
                                            <div class="md-form mt-0">
                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="Tgl_Entri" value="<?= date('Y-m-d'); ?>" name="Tgl_Entri" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Jatuh_Tempo" class="col-sm-3 col-form-label text-right" style="font-size: 15px">Jatuh Tempo :</label>
                                        <div class="col-sm-7">
                                            <div class="md-form mt-0">
                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="Jatuh_Tempo" value="<?= date('Y-m-d'); ?>" name="Jatuh_Tempo" required>
                                                        <div class="valid-feedback">Valid.</div>
                                                        <div class="invalid-feedback">Harap isi kolom ini.</div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                                        <div class="form-group row">
                                            <label for="ID_Anggota" class="col-sm-3 col-form-label text-right">Anggota :</label>
                                            <div class="col-sm-7">
                                                <div class="md-form mt-0">
                                                    <select name="ID_Anggota" class="form-control" id="exampleSelectGender">
                                                        <option selected value="0" readonly>-- Pilih Anggota --</option>
                                                        <?php
                                                        $sql_a = mysqli_query($konek, "SELECT * FROM anggota");
                                                        while ($a = mysqli_fetch_array($sql_a)) {
                                                        ?>
                                                            <option value="<?= $a['ID_Anggota'] ?>"><?= $a['Nama_Anggota'] . " - " . $a['ID_Tabungan'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="form-group row">
                                            <label for="ID_Anggota" class="col-sm-3 col-form-label text-right">Anggota :</label>
                                            <div class="col-sm-7">
                                                <div class="md-form mt-0">
                                                    <input class="form-control" type="text" value="<?= $da['Nama_Anggota'] . " - " . $da['ID_Tabungan']; ?>" name="" readonly>
                                                    <input class="form-control" type="hidden" value="<?= $da['ID_Anggota']; ?>" name="ID_Anggota" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <div class="form-group row">
                                        <label for="Nama_Pinjaman" class="col-sm-3 col-form-label text-right">Jenis Pinjaman :</label>
                                        <div class="col-sm-7">
                                            <div class="md-form mt-0">
                                                <select name="Nama_Pinjaman" class="form-control" id="exampleSelectGender">
                                                    <option selected disabled>-- Pilih Jenis Pinjaman --</option>
                                                    <?php
                                                    $sql_jp = mysqli_query($konek, "SELECT * FROM Jenis_Pinjaman");
                                                    while ($djp = mysqli_fetch_array($sql_jp)) {
                                                    ?>
                                                        <option value="<?= $djp['Nama_Pinjaman'] ?>"><?= $djp['Nama_Pinjaman'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Besar_Pinjaman" class="col-sm-3 col-form-label text-right">Besar Pinjaman :</label>
                                        <div class="col-sm-7">
                                            <div class="md-form mt-0">
                                                <input type="number" class="form-control text-right" id="Besar_Pinjaman" placeholder="0.00" name="Besar_Pinjaman" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Lama_Angsuran" class="col-sm-3 col-form-label text-right">Lama Angsuran :</label>
                                        <div class="col-sm-7">
                                            <div class="md-form mt-0">
                                                <input type="text" class="form-control text-right" id="Lama_Angsuran" placeholder="0" name="Lama_Angsuran" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Bunga" class="col-sm-3 col-form-label text-right">Bunga :</label>
                                        <div class="col-sm-7">
                                            <div class="md-form mt-0">
                                                <input type="text" class="form-control text-right" id="Bunga" placeholder="0.00%" name="Bunga" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Besar_Angsuran" class="col-sm-3 col-form-label text-right">Besar Angsuran :</label>
                                        <div class="col-sm-7">
                                            <div class="md-form mt-0">
                                                <input type="text" class="form-control text-right" id="Besar_Angsuran" placeholder="0.00" name="Besar_Angsuran" required>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Harap isi kolom ini.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label text-right"></label>
                                        <div class="col-sm-7">
                                            <div class="md-form mt-0">
                                                <input type="submit" value="Simpan" name="simpan" class="btn btn-success" style="margin-top: 5px; height: auto" />
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
<script>
    $(document).ready(function() {
        function hitung() {
            var BPinjaman = $('#Besar_Pinjaman').val();
            var LAngsuran = parseFloat($('#Lama_Angsuran').val());
            var Bunga = parseFloat($('#Bunga').val());
            BPinjaman = parseFloat(BPinjaman.replace(/[^,\d]/g, '').toString());
            Bunga = BPinjaman * Bunga / 100;
            console.log(Bunga)
            BPinjaman = BPinjaman / LAngsuran;
            console.log(BPinjaman)
            BPinjaman += Bunga
            $('#Besar_Angsuran').val(BPinjaman)
        }
        $('#Besar_Pinjaman').change(function() {
            hitung();
        });
        $('#Lama_Angsuran').change(function() {
            hitung();
        });
        $('#Bunga').change(function() {
            hitung();
        });
    });
</script>

<!-- <script>
    var rupiah = document.getElementById('Besar_Pinjaman');
    rupiah.addEventListener('keyup', function(e) {
        rupiah.value = formatRupiah(this.value, '');
    })

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }

    var BA = document.getElementById('Besar_Angsuran');
    BA.addEventListener('keyup', function(e) {
        BA.value = formatRupiah(this.value, '');
    })

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            BA = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            BA += separator + ribuan.join('.');
        }
        BA = split[1] != undefined ? BA + ',' + split[1] : BA;
        return prefix == undefined ? BA : (BA ? '' + BA : '');
    }
</script> -->