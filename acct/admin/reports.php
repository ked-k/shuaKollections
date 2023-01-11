<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
  <?php include '../config.php' ;
  $active='reports';?>

 

<!-- ked did it-->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $appname ?> | Reports</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
    <link rel="stylesheet" href="../assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">

  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php include 'inc/navbar.php' ;?>
   <?php include 'inc/sidebar.php';?>
      <!-- Main Content -->
      <div class="main-content">
        

<section class="section">
          <div class="section-body">
                <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-primary text-white-all">
                        <li class="breadcrumb-item"><a href="dashboard"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-bars"></i> Reports</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All reports</li>
                      </ol>
                    </nav>
            <div class="row">
              <div class="col-12">

                 <div class="card">
                  <div class="card-header">
                    <h4>Sales</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-4">
                        <div class="list-group" id="list-tab" role="tablist">                           
                          <a class="list-group-item list-group-item-action active" id="list-home-list"
                            data-toggle="list" href="#products" role="tab">Products</a>
                          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                            href="#productgroup" role="tab">Prduct group</a>
                          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                            href="#users" role="tab">Users</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                            href="#productDetaileds" role="tab">Prduct Detailed</a>
                          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                            href="#dailysales" role="tab">Daily sales</a>
                          <!--<a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"-->
                          <!--  href="#profitmargin" role="tab">Profit & Margin</a>-->
                          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                            href="#unpaidsales" role="tab">Upaid sales</a>
                             <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                            href="#profitLoss" role="tab">Profit/Loss</a>
                          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                            href="#refunds" role="tab">Refunds</a>
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="tab-content" id="nav-tabContent">

<?php include 'reporting/salesproduct.php' ?>
<?php include 'reporting/salesproductgp.php' ?>
<?php include 'reporting/salesdaily.php' ?>
<?php include 'reporting/salesusers.php' ?>
<?php include 'reporting/profitmargin.php' ?>
<?php include 'reporting/unpaidsales.php' ?>
<?php include 'reporting/refunds.php' ?>
<?php include 'reporting/salespdtdetailed.php' ?>
<?php include 'reporting/profitLoss.php' ?>

                     </div>
                      </div>
                    </div>
                  </div>
                </div>
             




                
              </div>
  
           
            </div>
          </div>
        </section>
      </div>
    <?php include 'inc/footer.php';?>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="../assets/js/app.min.js"></script>
  <!-- JS Libraies -->

  <script src="../assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>

  <script src="../assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <script src="../assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/forms-advanced-forms.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../assets/js/custom.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>