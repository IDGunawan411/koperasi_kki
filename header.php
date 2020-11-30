<?php include "koneksi.php";

session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}



function tgl($tanggal)
{
    $bulan_arr    = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    // $hari_arr     = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

    $ex           = explode('-', $tanggal);
    $hari         = date('N', strtotime($tanggal));
    $tanggal_indo = $ex[2] . ' ' . $bulan_arr[(int)$ex[1]] . ' ' . $ex[0];

    return $tanggal_indo;
}

function hari($date)
{
    $hari_arr     = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    $hari         = date('N', strtotime($date));
    return $hari_arr[$hari];
}

?>

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ThemeKit - Admin Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/jquery-toast-plugin/dist/jquery.toast.min.css">
    <link rel="stylesheet" href="plugins/weather-icons/css/weather-icons.min.css">
    <link rel="stylesheet" href="plugins/c3/c3.min.css">
    <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="dist/css/theme.min.css">

</head>

<body>
    <!-- Widget -->
    <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="quick-search">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto">
                                <div class="input-wrap">
                                    <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                    <i class="ik ik-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="container">
                        <div class="apps-wrap">
                            <div class="app-item">
                                <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                            </div>
                            <div class="app-item dropdown">
                                <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-command"></i><span>Ui</span></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Widget -->
    <div class="wrapper">
        <header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <?php if($_SESSION['Level']=='Petugas'){ ?>
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <div class="header-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                <input type="text" class="form-control">
                                <a>Selamat Datang <b class="text-dark ml-2"><?= $_SESSION['Nama_Lengkap']; ?></b></a>
                                <!-- <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button> -->
                            </div>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <a><b class="text-dark ml-2"><?= $_SESSION['Nama_Lengkap']; ?></b></a>
                        <div class="header-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                <!-- <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button> -->
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="top-menu d-flex align-items-center">
                        <?php if($_SESSION['Level']=='Petugas'){ ?>
                        <div class="dropdown">
                            <?php 
                                $ps=mysqli_query($konek,"SELECT COUNT(ID_Simpanan) as total_ps FROM simpanan WHERE Status_Simpanan='Menunggu'");
                                $dps=mysqli_fetch_array($ps);
                                $total_ps = $dps['total_ps'];
                            ?>
                            <button class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ik ik-bell"></i><span class="badge bg-danger"><?= $total_ps; ?></span></button>
                            <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                                <h4 class="header">Notifications</h4>
                                <div class="notifications-wrap">
                                    <?php 
                                        $qs=mysqli_query($konek,"SELECT * FROM simpanan WHERE Status_Simpanan='Menunggu'");
                                        while($ds=mysqli_fetch_array($qs)){ 
                                        if($ds['Jenis_Simpanan']=='Simpanan Wajib'){$simpanan="warning";}
                                        else{$simpanan="primary";}
                                    ?>
                                        <a href="pengajuan_simpanan_acc.php" class="media">
                                            <span class="media-body">
                                                <span class="media-content mr-2 h6"><i class="text-info ik ik-info"></i></span>
                                                <span class="media-content h6 text-dark font-weight-bold"><?= $ds['ID_Tabungan']; ?> - </span> 
                                                <span class="media-content h6 text-<?= $simpanan; ?>"><?= $ds['Jenis_Simpanan']; ?></span>
                                            </span>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="dropdown">
                            <button class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ik ik-bell"></i><span class="badge bg-danger">1</span></button>
                            <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                                <h4 class="header">Notifications</h4>
                                <div class="notifications-wrap">
                                    <?php 
                                        $qa=mysqli_query($konek,"SELECT * FROM angsuran INNER JOIN anggota on anggota.ID_Anggota = angsuran.ID_Anggota 
                                        INNER JOIN user on user.ID_User = anggota.ID_User WHERE user.ID_User='$_SESSION[ID_User]'");
                                        while($da=mysqli_fetch_array($qa)){ 
                                        if($da['Jatuh_Tempo']=='2020-12-23' && $da['Status_Angsuran']=='Belum Lunas'){$Jatuh_Tempo = " - Jatuh Tempo";$JT_Text="text-danger";}
                                        else{$Jatuh_Tempo = "";$JT_Text="text-dark";}
                                    ?>
                                        <a href="#" class="media">
                                            <span class="media-body">
                                                <span class="media-content mr-2 h6"><i class="text-info ik ik-info"></i></span>
                                                <span class="media-content h6 <?= $JT_Text; ?> font-weight-bold"><?= $da['ID_Angsuran'].$Jatuh_Tempo; ?></span> 
                                            </span>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button> -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="img/user.jpg" alt=""></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil.php"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
                                <a class="dropdown-item" href="logout.php"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrap">
            <!-- Sidebar -->
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a class="header-brand" href="index.html">
                        <div class="logo-img">
                            <img src="0001.png" width="125" style="color: white; margin-top: 140px;" class="header-brand-img" alt="lavalite">
                        </div>
                        <span class="text" style="margin-left: 8px">KOPERASI</span>
                    </a>
                    <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                </div>

                <div class="sidebar-content">
                    <div class="nav-container">
                        <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                            <nav id="main-menu-navigation" class="navigation-main">
                                <?php
                                if ($menu == 'index') {
                                    $index        = "active";
                                    $text_index   = "text-danger";
                                } elseif ($menu == 'form_pend') {
                                    $anggota      = "active open";
                                    $text_anggota = "text-danger";
                                    $form_pend    = "active";
                                } elseif ($menu == 'data_anggota') {
                                    $anggota      = "active open";
                                    $text_anggota = "text-danger";
                                    $data_anggota = "active";
                                } elseif ($menu == 'tabungan') {
                                    $anggota      = "active open";
                                    $text_anggota = "text-danger";
                                    $tabungan     = "active";
                                } elseif ($menu == 'wajib') {
                                    $simpanan  = "active open";
                                    $text_simpanan  = "text-danger";
                                    $wajib = "active";
                                } elseif ($menu == 'sukarela') {
                                    $simpanan  = "active open";
                                    $text_simpanan  = "text-danger";
                                    $sukarela  = "active";
                                } elseif ($menu == 'pengajuanS') {
                                    $simpanan  = "active open";
                                    $text_simpanan  = "text-danger";
                                    $pengajuanS  = "active";
                                } elseif ($menu == 'penarikan') {
                                    $penarikan       = "active open";
                                    $text_penarikan  = "text-danger";
                                    $penarikann      = "active";
                                } elseif ($menu == 'pengajuanP') {
                                    $penarikan       = "active open";
                                    $text_penarikan  = "text-danger";
                                    $pengajuanP      = "active";
                                } elseif ($menu == 'pinjaman') {
                                    $pinjaman       = "active open";
                                    $text_pinjaman  = "text-danger";
                                    $pinjamann      = "active";
                                } elseif ($menu == 'pengajuanPI') {
                                    $pinjaman       = "active open";
                                    $text_pinjaman  = "text-danger";
                                    $pengajuanPI      = "active";
                                } elseif ($menu == 'angsuran') {
                                    $angsuran         = "active";
                                    $text_angsuran    = "text-danger";
                                } elseif ($menu == 'help') {
                                    $help         = "active";
                                    $text_help    = "text-danger";
                                }
                                ?>
                                <div class="nav-lavel" style="">Navigation</div>
                                <div class="nav-item <?= $index; ?>">
                                    <a href="index.php" class="<?= $text_index; ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="nav-item has-sub <?= $anggota; ?>">
                                    <a href="javascript:void(0)" class="<?= $text_anggota; ?>"><i class="ik ik-layers"></i><span>Anggota</span></a>
                                    <div class="submenu-content">
                                        <a href="syarat_anggota.php" class="menu-item <?= $form_pend; ?>">Syarat Pendaftaran</a>
                                        <a href="anggota.php" class="menu-item <?= $data_anggota; ?>">Anggota</a>
                                        <a href="tabungan.php" class="menu-item <?= $tabungan; ?>">Tabungan</a>
                                    </div>
                                </div>
                                <div class="nav-item has-sub <?= $simpanan; ?>">
                                    <a href="javascript:void(0)" class="<?= $text_simpanan; ?>"><i class="ik ik-layers"></i><span>Simpanan</span> <span class="badge badge-danger">150+</span></a>
                                    <div class="submenu-content">
                                        <a href="simpanan_wajib.php" class="menu-item <?= $wajib; ?>">Wajib</a>
                                        <a href="simpanan_sukarela.php" class="menu-item <?= $sukarela; ?>">Sukarela</a>
                                        <a href="pengajuan_simpanan.php" class="menu-item <?= $pengajuanS; ?>">Pengajuan Simpanan</a>
                                    </div>
                                </div>

                                <div class="nav-item has-sub <?= $penarikan; ?>">
                                    <a href="javascript:void(0)" class="<?= $text_penarikan; ?>"><i class="ik ik-layers"></i><span>Penarikan</span> <span class="badge badge-danger">150+</span></a>
                                    <div class="submenu-content">
                                        <a href="penarikan.php" class="menu-item <?= $penarikann; ?>">Penarikan</a>
                                        <a href="pengajuan_penarikan.php" class="menu-item <?= $pengajuanP; ?>">Pengajuan Penarikan</a>
                                    </div>
                                </div>

                                <div class="nav-lavel">Peminjaman</div>

                                <div class="nav-item has-sub <?= $pinjaman; ?>">
                                    <a href="javascript:void(0)" class="<?= $text_pinjaman; ?>"><i class="ik ik-layers"></i><span>Pinjaman</span> <span class="badge badge-danger">150+</span></a>
                                    <div class="submenu-content">

                                        <a href="pinjaman.php" class="menu-item <?= $pinjamann; ?>"><span>Pinjaman</span></a>
                                        <a href="pengajuan_pinjaman.php" class="menu-item <?= $pengajuanPI; ?>">Pengajuan Pinjaman</a>
                                    </div>
                                </div>
                                <div class="nav-item <?= $help; ?>">
                                    <a href="help.php" class="<?= $text_help; ?>"><i class="ik ik-menu"></i><span>Help</span></a>
                                </div>
                            </nav>
                        <?php } else { ?>
                            <?php
                            $sqlAnggota = mysqli_query($konek, "SELECT * FROM anggota WHERE ID_User = '$_SESSION[ID_User]'");
                            $da         = mysqli_fetch_array($sqlAnggota);
                            ?>
                            <nav id="main-menu-navigation" class="navigation-main">
                                <?php
                                if ($menu == 'index') {
                                    $index        = "active";
                                    $text_index   = "text-danger";
                                } elseif ($menu == 'tabungan') {
                                    $anggota      = "active open";
                                    $text_anggota = "text-danger";
                                    $tabungan     = "active";
                                } elseif ($menu == 'wajib') {
                                    $simpanan  = "active open";
                                    $text_simpanan  = "text-danger";
                                    $wajib = "active";
                                } elseif ($menu == 'sukarela') {
                                    $simpanan  = "active open";
                                    $text_simpanan  = "text-danger";
                                    $sukarela  = "active";
                                } elseif ($menu == 'pengajuanS') {
                                    $simpanan  = "active open";
                                    $text_simpanan  = "text-danger";
                                    $pengajuanS  = "active";
                                } elseif ($menu == 'penarikan') {
                                    $penarikan       = "active open";
                                    $text_penarikan  = "text-danger";
                                    $penarikan      = "active";
                                } elseif ($menu == 'pengajuanP') {
                                    $penarikan       = "active open";
                                    $text_penarikan  = "text-danger";
                                    $pengajuanP      = "active";
                                } elseif ($menu == 'pinjaman') {
                                    $pinjaman       = "active open";
                                    $text_pinjaman  = "text-danger";
                                    $pinjamann      = "active";
                                } elseif ($menu == 'pengajuanPI') {
                                    $pinjaman       = "active open";
                                    $text_pinjaman  = "text-danger";
                                    $pengajuanPI      = "active";
                                } elseif ($menu == 'help') {
                                    $help         = "active";
                                    $text_help    = "text-danger";
                                } elseif ($menu == 'angsuran') {
                                    $angsuran         = "active";
                                    $text_angsuran    = "text-danger";
                                }
                                ?>
                                <div class="nav-lavel" style="">Navigation</div>
                                <div class="nav-item <?= $index; ?>">
                                    <a href="index.php" class="<?= $text_index; ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>

                                <div class="nav-item has-sub <?= $simpanan; ?>">
                                    <a href="javascript:void(0)" class="<?= $text_simpanan; ?>"><i class="ik ik-layers"></i><span>Simpanan</span> <span class="badge badge-danger">150+</span></a>
                                    <div class="submenu-content">
                                        <a href="simpanan_wajib.php" class="menu-item <?= $wajib; ?>">Wajib</a>
                                        <a href="simpanan_sukarela.php" class="menu-item <?= $sukarela; ?>">Sukarela</a>
                                        <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                                            <a href="pengajuan_simpanan.php" class="menu-item <?= $pengajuanS; ?>">Pengajuan Simpanan</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="nav-item has-sub <?= $penarikan; ?>">
                                    <a href="javascript:void(0)" class="<?= $text_penarikan; ?>"><i class="ik ik-layers"></i><span>Penarikan</span> <span class="badge badge-danger">150+</span></a>
                                    <div class="submenu-content">
                                        <a href="penarikan.php" class="menu-item <?= $penarikan; ?>">Penarikan</a>
                                        <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                                            <a href="pengajuan_penarikan" class="menu-item <?= $pengajuanP; ?>">Pengajuan Penarikan</a>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="nav-lavel">Peminjaman</div>

                                <div class="nav-item has-sub <?= $pinjaman; ?>">
                                    <a href="javascript:void(0)" class="<?= $text_pinjaman; ?>"><i class="ik ik-layers"></i><span>Pinjaman</span> <span class="badge badge-danger">150+</span></a>
                                    <div class="submenu-content">

                                        <a href="pinjaman.php" class="menu-item <?= $pinjamann; ?>"><span>Pinjaman</span></a>
                                        <?php if ($_SESSION['Level'] == 'Petugas') { ?>
                                            <a href="pengajuan_pinjaman.php" class="menu-item <?= $pengajuanPI; ?>">Pengajuan Pinjaman</a>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="nav-item <?= $help; ?>">
                                    <a href="help.php" class="<?= $text_help; ?>"><i class="ik ik-menu"></i><span>Help</span></a>
                                </div>
                            </nav>

                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- END Sidebar -->