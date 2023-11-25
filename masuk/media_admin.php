<?php
session_start();
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
include "timeout.php";
include "../configurasi/koneksi.php";

if ($_SESSION['login'] == 1) {
  if (!cek_login()) {
    $_SESSION['login'] = 0;
  }
}
if ($_SESSION[login] == 0) {
  header('location:logout.php');
} else {
  if (empty($_SESSION['username']) and empty($_SESSION['password']) and $_SESSION['login'] == 0) {
    echo "<link href=css/style.css rel=stylesheet type=text/css>";
    echo "<div class='error msg'>Untuk mengakses Modul anda harus login.</div>";
  } else {



    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="../template/gentelella/images/favicon.ico" type="image/ico" />

      <title>Admin HR</title>


      <script src=”//cdn.ckeditor.com/4.5.9/full/ckeditor.js”></script>
      <!-- Bootstrap -->
      <link href="../template/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="../template/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- NProgress -->
      <link href="../template/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
      <!-- iCheck -->
      <link href="../template/gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

      <!-- bootstrap-progressbar -->
      <link href="../template/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
        rel="stylesheet">
      <!-- JQVMap -->
      <link href="../template/gentelella/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
      <!-- bootstrap-daterangepicker -->
      <link href="../template/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

      <!-- Custom Theme Style -->
      <link href="../template/gentelella/build/css/custom.min.css" rel="stylesheet">

      <!-- Datatables -->
      <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
      <link href="../template/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
      <link href="../template/gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
      <link href="../template/gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
        rel="stylesheet">
      <link href="../template/gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
        rel="stylesheet">
      <link href="../template/gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
        rel="stylesheet">

    </head>

    <body class="nav-md">
      <div class="container body">
        <div class="main_container">
          <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
              <div class="navbar nav_title" style="border: 0;">
                <a href="media_admin.php?module=home" class="site_title"><i class="fa fa-paw"></i> <span>Admin HR</span></a>
              </div>

              <div class="clearfix"></div>

              <!-- menu profile quick info -->
              <div class="profile clearfix">
                <div class="profile_pic">
                  <img src="../template/gentelella/images/img.jpg" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2>
                    <?php echo $_SESSION['nama_admin']; ?>
                  </h2>
                </div>
              </div>
              <!-- /menu profile quick info -->

              <br />

              <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <div class="ln_solid"></div>
                  <ul class="nav side-menu">
                   
                      <li><a><i class="fa fa-edit"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        
                            <li><a href="?module=pengguna">Pegawai</a></li>
                         
                        </ul>
                      </li>


                  </ul>
                </div>
              </div>
              <!-- /sidebar menu -->

              <!-- /menu footer buttons -->
              <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                  <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                  <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
              </div>
              <!-- /menu footer buttons -->
            </div>
          </div>

          <!-- top navigation -->
          <div class="top_nav">
            <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                      data-toggle="dropdown" aria-expanded="false">
                      <img src="../template/gentelella/images/img.jpg" alt="">
                      <?php echo $_SESSION['nama_admin']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="?module=profil&act=ubah"> Profile</a>
                      <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <!-- /top navigation -->

          <!-- page content -->
          <div class="right_col" role="main">

            <?php include "content_admin.php"; ?>

          </div>
          <!-- /page content -->

          <!-- footer content -->
          <footer>
            <div class="pull-right">
              @HR V.1.0.0 Support by <a href="https://arsipcode.com.com">Prio</a>
            </div>
            <div class="clearfix"></div>
          </footer>
          <!-- /footer content -->
        </div>
      </div>


      <!-- jQuery -->
      <script src="../template/gentelella/vendors/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="../template/gentelella/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <!-- FastClick -->
      <script src="../template/gentelella/vendors/fastclick/lib/fastclick.js"></script>
      <!-- NProgress -->
      <script src=".../template/gentelella/vendors/nprogress/nprogress.js"></script>
      <!-- Chart.js -->
      <script src="../template/gentelella/vendors/Chart.js/dist/Chart.min.js"></script>
      <!-- gauge.js -->
      <script src="../template/gentelella/vendors/gauge.js/dist/gauge.min.js"></script>
      <!-- bootstrap-progressbar -->
      <script src="../template/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
      <!-- iCheck -->
      <script src="../template/gentelella/vendors/iCheck/icheck.min.js"></script>
      <!-- Skycons -->
      <script src="../template/gentelella/vendors/skycons/skycons.js"></script>

      <!-- bootstrap-wysiwyg -->
      <script src="../template/gentelella/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
      <script src="../template/gentelella/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
      <script src="../template/gentelella/vendors/google-code-prettify/src/prettify.js"></script>
      <!-- jQuery Tags Input -->
      <script src="../template/gentelella/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
      <!-- Switchery -->
      <script src="../template/gentelella/vendors/switchery/dist/switchery.min.js"></script>
      <!-- Select2 -->
      <script src="../template/gentelella/vendors/select2/dist/js/select2.full.min.js"></script>
      <!-- Parsley -->
      <script src="../template/gentelella/vendors/parsleyjs/dist/parsley.min.js"></script>
      <!-- Autosize -->
      <script src="../template/gentelella/vendors/autosize/dist/autosize.min.js"></script>
      <!-- jQuery autocomplete -->
      <script src="../template/gentelella/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
      <!-- starrr -->
      <script src="../template/gentelella/vendors/starrr/dist/starrr.js"></script>
      <!-- Flot -->
      <script src="../template/gentelella/vendors/Flot/jquery.flot.js"></script>
      <script src="../template/gentelella/vendors/Flot/jquery.flot.pie.js"></script>
      <script src="../template/gentelella/vendors/Flot/jquery.flot.time.js"></script>
      <script src="../template/gentelella/vendors/Flot/jquery.flot.stack.js"></script>
      <script src="../template/gentelella/vendors/Flot/jquery.flot.resize.js"></script>
      <!-- Flot plugins -->
      <script src="../template/gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
      <script src="../template/gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
      <script src="../template/gentelella/vendors/flot.curvedlines/curvedLines.js"></script>
      <!-- DateJS -->
      <script src="../template/gentelella/vendors/DateJS/build/date.js"></script>
      <!-- JQVMap -->
      <script src="../template/gentelella/vendors/jqvmap/dist/jquery.vmap.js"></script>
      <script src="../template/gentelella/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
      <script src="../template/gentelella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
      <!-- bootstrap-daterangepicker -->
      <script src="../template/gentelella/vendors/moment/min/moment.min.js"></script>
      <script src="../template/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
      <script src="../template/gentelella/vendors/datepicker/bootstrap-datepicker.js"></script>

      <!-- Custom Theme Scripts -->
      <script src="../template/gentelella/build/js/custom.min.js"></script>

      <!-- Datatables -->
      <script src="../template/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="../template/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="../template/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
      <script src="../template/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
      <script src="../template/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
      <script src="../template/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
      <script src="../template/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
      <script src="../template/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
      <script src="../template/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
      <script src="../template/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
      <script src="../template/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
      <script src="../template/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
      <script src="../template/gentelella/vendors/jszip/dist/jszip.min.js"></script>
      <script src="../template/gentelella/vendors/pdfmake/build/pdfmake.min.js"></script>
      <script src="../template/gentelella/vendors/pdfmake/build/vfs_fonts.js"></script>


    </body>

    </html>
    <?php
  }
}
?>