<?php
ini_set('session.gc_maxlifetime', 2678400);
ob_start();
session_start();
require_once("include/config.php");
// cek user login dengan session yg benar
if (!isset($_SESSION['usernameam']) or !isset($_SESSION['csam'])) {
  // KODE REFERRAL
  $r = !isset($_GET['r']);
  if ($r != '') {
    $ceksetcookie = mysqli_query($konek, "select * from referral where kode='$r'");
    $xcesetcookie = mysqli_fetch_array($ceksetcookie);
    if ($xcesetcookie['kode'] == $r) {
      setcookie("Jalankan_referral", $xcesetcookie['kode'], time() + 3600 * 24 * 365 * 2);
      header("Location: login");
      die();
    }
  }
  header("Location: login");
  die();
} else {
  $usernameam = $_SESSION['usernameam'];
  $sessionam = $_SESSION['csam'];
  $ceksession = mysqli_query($konek, "select * from user where username='$usernameam'");
  $xceksession = mysqli_fetch_array($ceksession);
  $truesession = $xceksession['session'];
  if ($_SESSION['csam'] <> $truesession) {
    header("Location: login");
    die();
  } else {
    // ini yang dipakai
    include("include/header.php");
    // include("countmitra.php");

    // $xdata = mysqli_query($konek, "select * from user where username='$usernameam'");
    // $data = mysqli_fetch_array($xdata);
    // $nama = $data['nama'];
    // $lastip = $data['ip'];
    // $ceksaldo = $data['saldo'];

    // $firstname = explode(" ", $nama);
    $sekarang = date("Y-m-d");



?>

    <!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

    <body class="hold-transition">
      <div class="wrapper">
        <?php
        include("include/menu.php");
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Main content -->
          <div class="content" style="padding: 20px;">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header border-0">
                      <div class="d-flex justify-content-between">
                        <h3 class="card-title">Weekly Total Funding</h3>
                        <a href="javascript:void(0);">View Detail Report</a>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="d-flex">
                        <p class="d-flex flex-column">
                          <span class="text-bold text-lg">820</span>
                          <span>Lender This Month</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                          <span class="text-success">
                            <i class="fas fa-arrow-up"></i> 12.5%
                          </span>
                          <span class="text-muted">Since last Week</span>
                        </p>
                      </div>
                      <!-- /.d-flex -->

                      <div class="position-relative mb-4">
                        <canvas id="visitors-chart" height="200"></canvas>
                      </div>

                      <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                          <i class="fas fa-square text-primary"></i> This Month
                        </span>

                        <span>
                          <i class="fas fa-square text-gray"></i> Last Month
                        </span>
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                  <div class="card">
                    <div class="card-header border-0">
                      <h3 class="card-title">Daily Achievements (Program)</h3>
                      <div class="card-tools" style="margin-right: 0;">
                        <!-- <a href="javascript:void(0);">View Detail Report</a> -->
                      </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                      <table id="DataTable2" class="table table-striped table-valign-middle">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Program</th>
                            <th></th>
                            <th>Jumlah</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr style="font-weight: 500;">
                            <td>
                              1
                            </td>
                            <td>
                              Emergency Bencana Tidak Terikat
                            </td>
                            <td>
                              Rp
                            </td>
                            <td>
                              1.000.000
                            </td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>
                              Emergency Bencana - Malang
                            </td>
                            <td>
                              Rp
                            </td>
                            <td>
                              1.000.000
                            </td>
                          </tr>
                          <tr style="font-weight: 500;">
                            <td>
                              3
                            </td>
                            <td>
                              Bantu Dunia Islam - Uganda
                            </td>
                            <td>
                              Rp
                            </td>
                            <td>
                              1.000.000
                            </td>
                          </tr>
                          <tr>
                            <td>
                              4
                            </td>
                            <td>
                              Berbagi Buka Puasa
                            </td>
                            <td>
                              Rp
                            </td>
                            <td>
                              1.000.000
                            </td>
                          </tr>
                          <tr style="background-color: #007bff !important;font-weight: 500;color: white;">
                            <th colspan="2">Total</th>
                            <th>Rp</th>
                            <th>4.000.000</th>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">DSS Funding</h3>
                    </div>
                    <div class="card-body table-responsive">
                      <table id="DataTable3" class="table table-striped table-valign-middle">
                        <thead>
                          <tr>
                            <th>Nama program</th>
                            <th>DSS</th>
                            <th>Penyaluran</th>
                            <th>Detail</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              Emergency Bencana Tidak Terikat
                            </td>
                            <td>
                              <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                12%
                              </small>
                              50.000.000
                            </td>
                            <td>
                              <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                12%
                              </small>
                              10.000.000
                            </td>
                            <td>
                              <a href="#" class="text-muted">
                                <i class="fas fa-search"></i>
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Emergency Bencana - Malang
                            </td>
                            <td>
                              <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                12%
                              </small>
                              100.000.000
                            </td>
                            <td>
                              <small class="text-warning mr-1">
                                <i class="fas fa-arrow-down"></i>
                                5%
                              </small>
                              20.000.000
                            </td>
                            <td>
                              <a href="#" class="text-muted">
                                <i class="fas fa-search"></i>
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Bantu Dunia Islam - Uganda
                            </td>
                            <td>
                              <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                12%
                              </small>
                              20.000.000
                            </td>
                            <td>
                              <small class="text-danger mr-1">
                                <i class="fas fa-arrow-down"></i>
                                13%
                              </small>
                              10.000.000
                            </td>
                            <td>
                              <a href="#" class="text-muted">
                                <i class="fas fa-search"></i>
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Berbagi Buka Puasa
                              <span class="badge bg-danger">NEW</span>
                            </td>
                            <td>
                              <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                12%
                              </small>
                              100.000.000
                            </td>
                            <td>
                              <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                10%
                              </small>
                              50.000.000
                            </td>
                            <td>
                              <a href="#" class="text-muted">
                                <i class="fas fa-search"></i>
                              </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header border-0">
                      <div class="d-flex justify-content-between">
                        <h3 class="card-title">Top 6 Fundraiser</h3>
                        <a href="javascript:void(0);">View Detail Report</a>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="d-flex">
                        <p class="d-flex flex-column">
                          <span class="text-bold text-lg">2.000.000.000</span>
                          <span>Funding Over Time</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                          <span class="text-success">
                            <i class="fas fa-arrow-up"></i> 33.1%
                          </span>
                          <span class="text-muted">Since last month</span>
                        </p>
                      </div>
                      <!-- /.d-flex -->

                      <div class="position-relative mb-4">
                        <canvas id="sales-chart" height="200"></canvas>
                      </div>

                      <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                          <i class="fas fa-square text-primary"></i> This Month
                        </span>

                        <span>
                          <i class="fas fa-square text-gray"></i> Last Month
                        </span>
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Daily Achievements (Funding)</h3>
                    </div>
                    <div class="card-body table-responsive">
                      <table id="DataTable4" class="table table-striped table-valign-middle">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th></th>
                            <th>Jumlah</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr style="font-weight: 500;">
                            <td>
                              1
                            </td>
                            <td>
                              Bapak Suroto
                            </td>
                            <td>
                              Rp
                            </td>
                            <td>
                              1.000.000
                            </td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>
                              Mitra - Bu Ida
                            </td>
                            <td>
                              Rp
                            </td>
                            <td>
                              1.000.000
                            </td>
                          </tr>
                          <tr style="font-weight: 500;">
                            <td>
                              3
                            </td>
                            <td>
                              Bapak Alwi
                            </td>
                            <td>
                              Rp
                            </td>
                            <td>
                              1.000.000
                            </td>
                          </tr>
                          <tr>
                            <td>
                              4
                            </td>
                            <td>
                              Mitra - Bu Maria
                            </td>
                            <td>
                              Rp
                            </td>
                            <td>
                              1.000.000
                            </td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr style="background-color: #007bff !important;font-weight: 500;color: white;">
                            <td colspan="2" rowspan="1">
                              Total
                            </td>
                            <td>Rp</td>
                            <td>4.000.000</td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Monthly Achievements (2021)</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="DataTable1" class="table table-striped nowrap">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>January</th>
                            <th>February</th>
                            <th>March</th>
                            <th>April</th>
                            <th>May</th>
                            <th>June</th>
                            <th>July</th>
                            <th>August</th>
                            <th>September</th>
                            <th>October</th>
                            <th>November</th>
                            <th>December</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr style="font-weight: 500;">
                            <td>
                              1
                            </td>
                            <td>
                              Bapak Suroto
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>
                              Mitra - Bu Ida
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                          </tr>
                          <tr style="font-weight: 500;">
                            <td>
                              3
                            </td>
                            <td>
                              Bapak Alwi
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                          </tr>
                          <tr>
                            <td>
                              4
                            </td>
                            <td>
                              Mitra - Bu Maria
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                          </tr>

                        </tbody>
                        <tfoot>
                          <tr style="background-color: #007bff !important;font-weight: 500;color: white;">
                            <td colspan="2">
                              Total
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Monthly Achievements (2021 - Kantor)</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="DataTable5" class="table table-striped nowrap">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>January</th>
                            <th>February</th>
                            <th>March</th>
                            <th>April</th>
                            <th>May</th>
                            <th>June</th>
                            <th>July</th>
                            <th>August</th>
                            <th>September</th>
                            <th>October</th>
                            <th>November</th>
                            <th>December</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr style="font-weight: 500;">
                            <td>
                              1
                            </td>
                            <td>
                              Semarang - Pusat
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>
                              Bulukumba
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                          </tr>
                          <tr style="font-weight: 500;">
                            <td>
                              3
                            </td>
                            <td>
                              Magelang
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                          </tr>
                          <tr>
                            <td>
                              4
                            </td>
                            <td>
                              Semarang - Sadewa
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                            <td>
                              Rp 1.000.000
                            </td>
                          </tr>

                        </tbody>
                        <tfoot>
                          <tr style="background-color: #007bff !important;font-weight: 500;color: white;">
                            <td colspan="2">
                              Total
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                            <td>
                              Rp 4.000.000
                            </td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <!-- /.col-md-6 -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </div>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->



  <?php
  }
}
include("include/footer.php");
  ?>