<?php
    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";

    $user = isset($_SESSION['user']) ?$_SESSION['user']:"";
    if ($user == "1") {
        $ff->alert("Username Tidak Ditemukan! Silahkan Login Dulu!");
        $ff->redirect("index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran Listrik</title>
    <!-- <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css"> -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/default.css" type="text/css">
</head>
<body>
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">
                <h1 class="hidden-xs hidden-sm">E-BILLING</h1>
                <ul>
                    <li class="link active">
                        <a href="admin.php">
                            <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                            <span class="hidden-sm hidden-xs">Dashboard</span>
                        </a>
                    </li>

                    <li class="link">
                        <a href="#collapse-post" data-toggle="collapse" aria-control="collapse-post">
                            <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                            <span class="hidden-sm hidden-xs">Tarif</span>
                                <?php
                                    $q = $odb->select("tarif");
                                    $a = $odb->nur($q);
                                ?>
                            <span class="label label-success pull-right hidden-sm hidden-xs"><?=$a?></span>

                        </a>
                        <ul class="collapse collapseable" id="collapse-post">
                            <li><a href="?hal=dtarif">Data Tarif</a></li>
                            <li><a href="?hal=ftarif">Form Tambah</a></li>

                        </ul>
                    </li>

                    <li class="link">
                        <a href="?hal=dtarif">
                            <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                            <span class="hidden-sm hidden-xs">Tarif</span>
                        </a>
                    </li>

                    <li class="link">
                        <a href="?hal=dpelanggan">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <span class="hidden-sm hidden-xs">Pelanggan</span>
                        </a>
                    </li>

                    <li class="link">
                        <a href="?hal=dpenggunaan">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <span class="hidden-sm hidden-xs">Pengguna</span>
                        </a>
                    </li>

                    <li class="link btn">
                        <a href="trans_a.php">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <span class="hidden-sm hidden-xs">Transaksi</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- main content -->
            <div class="col-md-10 col-sm-11 display-table-cell  valign-top ">
                <div class="row">

                    <header id="nav-header" class="clearfix">
                        <div class="col-md-5">
                            <nav class="navbar-default pull-left">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu">
                                    <span class="sr-only">Toggle Navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </nav>
                            <input type="text" class="hidden-sm hidden-xs" id="header-search-field" placeholder="Search ...">
                        </div>
                        <div class="col-md-7">
                            <ul class="pull-right">
                                <li id="welcome" class="hidden-sm hidden-xs">Welcome To Pembayaran Listrik</li>
                                <li class="fixed-width">
                                    <a href="#">
                                        <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                                        <span class="label label-warning">3</span>
                                    </a>
                                </li>
                                <li class="fixed-width">
                                    <a href="#">
                                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                        <span class="label label-message">3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="logout.php" class="logout">
                                        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                        Log Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </header>

                </div>

                <?php
                    $hal=isset($_GET['hal']) ?$_GET['hal']:"dashboard";
                    include("$hal".'.php');
                ?>

                    <div class="row">
                        <footer id="admin-footer" class="clearfix">
                            <div class="pull-left"><b>Copyright</b>&copy; 2018</div>
                            <div class="pull-right"> Pembayaran Listrik</div>
                        </footer>
                    </div>

            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/default.js"></script>
</body>
</html>