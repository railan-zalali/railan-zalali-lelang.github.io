<?php  
// mambuat session agar file tidak bisa langsung dilewati
session_start();
if (!isset($_SESSION['index'])) {
  header("location: pages/examples/login.php");
  die;
}
// panggil file database.php untuk koneksi ke database
require_once "database/connection.php";

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lelang | Welcome</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-table-master/dist/bootstrap-table.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="?page=" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Le</b>OL</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Lelang</b>OL</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <!-- User Account Menu -->
            <li class="dropdown user user-menu" style="padding-right: 25px;">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="dist/img/default.png" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $_SESSION['username']?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="dist/img/default.png" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['username']?>
                    <!-- <small>Member since Nov. 2012</small> -->
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="proses/logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <!-- <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li> -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Menu</li>
          <!-- Optionally, you can add icons to the links -->
          <li class="active"><a href="?page="><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-desktop"></i> <span>Data Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="?page=barang">Data Barang</a></li>
              <li><a href="?page=lelang">Data Lelang</a></li>
              <li><a href="?page=petugas">Data Petugas</a></li>
              <li><a href="?page=riwayat">Riwayat Lelang</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-book"></i> <span>Generate Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="?page=laporan_barang">Laporan Data Barang</a></li>
              <li><a href="?page=laporan_petugas">Laporan Data Petugas</a></li>
              <li><a href="?page=laporan_lelang">Laporan Data lelang</a></li>
              <li><a href="?page=laporan_masyarakat">Laporan Data Masyarakat</a></li>
            </ul>
          </li>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content container-fluid">
        <?php
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
        if (empty($_GET['alert'])) {
          echo "";
        }
    // jika alert = 1
    // tampilkan pesan Sukses "Data berhasil disimpan"
        elseif ($_GET['alert'] == 1) { ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Buka Lelang Berhasil.
          </div>
          <?php
        } 
    // jika alert = 2
    // tampilkan pesan Sukses "Data berhasil diubah"
        elseif ($_GET['alert'] == 2) { ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Tutup Lelang Berhasil
          </div>
          <?php
        } 
    // jika alert = 3
    // tampilkan pesan Sukses "Data berhasil dihapus"
        elseif ($_GET['alert'] == 3) { ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Berhasil Tambah Lelang
          </div>
          <?php
        } 
    // jika alert = 4
    // tampilkan pesan Gagal "apabila sudah ada"
        elseif ($_GET['alert'] == 4) { ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Fail!</h4>
            Gagal Tambah Lelang
          </div>
          <?php
        }
        elseif ($_GET['alert'] == 5) { ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Berhasil Hapus Petugas
          </div>
          <?php
        }
        elseif ($_GET['alert'] == 6) { ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Fail!</h4>
            Anda tidak dapat menghapus barang karena sedang dalam proses lelang
          </div>
          <?php
        }
        elseif ($_GET['alert'] == 7) { ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Berhasil Tambah Data petugas
          </div>
          <?php
        }
        elseif ($_GET['alert'] == 8) { ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Fail!</h4>
            Username & id level sudah ada
          </div>
          <?php
        }
        elseif ($_GET['alert'] == 9) { ?>
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Fail!</h4>
            Anda tidak dapat menambahkan barang yang sama
          </div>
          <?php
        }
        elseif ($_GET['alert'] == 10) { ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Berhasil hapus barang
          </div>
          <?php
        }
        ?>  

        <!--------------------------
        | Your Page Content Railan zalali |
        -------------------------->
        <?php
        // fungsi untuk pemanggilan halaman
        // jika page = kosong atau saat aplikasi pertama dijalankan, tampilkan halaman dashboard.php
        if (empty($_GET["page"])) {
          include "dasboard.php";
        } 
        // jika page = tambah, maka tampilkan halaman form tambah_data.php
        elseif ($_GET['page']=='barang') {
          include "pages/tables/barang.php";
        } 
        elseif ($_GET['page']=='lelang') {
          include "pages/tables/lelang.php";
        } 
        elseif ($_GET['page']=='riwayat') {
          include "pages/tables/riwayat_lelang.php";
        } 
        elseif ($_GET['page']=='petugas') {
          include "pages/forms/petugas.php";
        }
        elseif ($_GET['page']=='laporan_petugas') {
          include "pages/tables/laporan_petugas.php";
        }
        elseif ($_GET['page']=='laporan_lelang') {
          include "pages/tables/laporan_lelang.php";
        }
        elseif ($_GET['page']=='laporan_barang') {
          include "pages/tables/laporan_barang.php";
        }
        elseif ($_GET['page']=='laporan_masyarakat') {
          include "pages/tables/laporan_masyarakat.php";
        }
        ?>
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/jquery/dist/jquery.mask.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="bower_components/tableExport.jquery.plugin-master/tableExport.min.js"></script>
  <script src="bower_components/tableExport.jquery.plugin-master/libs/jsPDF/jspdf.min.js"></script>
  <script src="bower_components/tableExport.jquery.plugin-master/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
  <script src="bower_components/bootstrap-table-master/dist/bootstrap-table.min.js"></script>
  <script src="bower_components/bootstrap-table-master/dist/extensions/export/bootstrap-table-export.js"></script>
  <script src="bower_components/bootstrap-table-master/dist/extensions/export/bootstrap-table-export.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script>
    var $table = $('#table')

    $(function() {
      $('#toolbar').find('select').change(function () {
        $table.bootstrapTable('destroy').bootstrapTable({
          exportDataType: $(this).val(),
          exportTypes: ['pdf', 'excel', 'txt', 'sql'],
          
        })
      }).trigger('change')
    })
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(200, function(){
        $(this).remove();
      });
    }, 1500);
    $(document).ready(function(){

                // Format mata uang.
                $( '.select2' ).mask('000.000.000', {reverse: true});
                // $( '.uang' ).mask('000.000.000', {reverse: true});

              })
    (function() {
      'use strict';
      window.addEventListener('load', function() {
                // Fetch all the forms designed by railanzalali custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
    })();
    function getkey(e) {
      if (window.event)
        return window.event.keyCode;
      else if (e)
        return e.which;
      else
        return null;
    }

    function goodchars(e, goods, field) {
      var key, keychar;
      key = getkey(e);
      if (key == null) return true;

      keychar = String.fromCharCode(key);
      keychar = keychar.toLowerCase();
      goods   = goods.toLowerCase();

            // check goodkeys
            if (goods.indexOf(keychar) != -1)
              return true;
            // control keys
            if ( key==null || key==0 || key==8 || key==9 || key==27 )
              return true;
            
            if (key == 13) {
              var i;
              for (i = 0; i < field.form.elements.length; i++)
                if (field == field.form.elements[i])
                  break;
                i = (i + 1) % field.form.elements.length;
                field.form.elements[i].focus();
                return false;
              };
            // else return false
            return false;
          }

        </script>
      </body>
      </html>