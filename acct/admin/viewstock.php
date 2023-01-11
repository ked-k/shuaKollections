<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
  <?php include '../conn.php' ;
  $active='mstock';?>



<!-- ked did it-->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $appname ?> | view stock</title>
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
        
<?php
extract($_GET);
$scode = $_GET['scode'] ;
$me = $_SESSION['uid'];
?>
<section class="section">

<div class="section-body">
     <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-primary text-white-all">
                        <li class="breadcrumb-item"><a href="dashboard"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-bars"></i> Stock</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View stock</li>
                      </ol>
                    </nav>
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
          <?php 
extract($_GET);
$scode = $_GET['scode'] ;
$sql = " SELECT * FROM stock
LEFT JOIN products ON `stock`.`Pdt` = `products`.`Pid`
WHERE stkCodde = '$scode' AND SBlocation = '$curBranchId' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
for($i=0; $row = $result->fetch_assoc(); $i++) {
    $cnt=1+$i;
   

 ?>
                  <div class="col-lg-12">
                      
                    <div class="invoice-title">
                      <h2>Stock oder details</h2>

                      <div class="invoice-number">Order #12345</div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Order by:</strong><br>
                          
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Branch name:</strong><br>
                          Keith Johnson<br>
                          197 N 2000th E<br>
                          Rexburg, ID,<br>
                          Springfield Center, USA
                        </address>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Payment Method:</strong><br>
                          Visa ending **** 5687<br>
                          test@example.com
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Order Date:</strong><br>
                          June 26, 2018<br><br>
                        </address>
                      </div>
                      
                    </div>
                
                  </div>
                      <?php }} ?>
                </div>
                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">All items here cannot be deleted.</p>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tr>
                          <th data-width="40">#</th>
                          <th>Item</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-center">Price</th>
                          <th class="text-right">Totals</th>
                        </tr>
                           
             <?php 
extract($_GET);
$scode = $_GET['scode'] ;
$sql = " SELECT * FROM stock
LEFT JOIN products ON `stock`.`Pdt` = `products`.`Pid`
WHERE stkCodde = '$scode' AND SBlocation = '$curBranchId' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
for($i=0; $row = $result->fetch_assoc(); $i++) {
    $cnt=1+$i;
   

 ?>
                  <tr>
                    <td><?php echo $cnt ?></td>
                    <td>  <?php echo $row['PName'] ;?> <input type="hidden" name="item[]" value=" <?php echo $row['Pdt'] ;?>" >   </td>
                     <td class="text-center">  <?php echo $row['Stock'] ;?>  <input type="hidden" name="qty[]" value=" <?php echo $row['Stock'] ;?>" >  </td>
                     <td class="text-center">  <?php echo $row['Unitcost'] ;?>     </td>
                     <td class="text-right">  <?php echo $row['StkAmount'] ;?>   <input name="comm" id="comm" type="hidden" value="<?php echo $row['StkAmount']; ?>" >  </td>
                  </tr>
        <?php }} ?>
                 
                      </table>
                      <input name="tot" id="tot" type="hidden" value="" disabled>
                    </div>
                    <div class="row mt-4">
                      <div class="col-lg-8">
                        <div class="section-title">State</div>
                        <p class="section-lead">The stock was successfully stored.</p>
                      </div>
                      <div class="col-lg-4 text-right">
                       
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Total</div>
                          <div class="invoice-detail-value invoice-detail-value-lg" id="res">/div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-md-right">
                
                <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
              </div>
            </div>
          </div>
         
        </section>

        
      </div>


   <script type="text/javascript">

window.sumInputs = function() {
    var inputs = document.getElementsByName('comm'),
        result = document.getElementById('tot'),
        sum = 0;            

    for(var i=0; i<inputs.length; i++) {
        var ip = inputs[i];

        if (ip.name && ip.name.indexOf("total") < 0) {
            sum += parseInt(ip.value) || 0;
        }

    }

    result.value = sum;
    var ked = sum;
  var num = '<?php echo $cur ?>: ' + ked.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
document.getElementById('res').innerHTML = num;

}
sumInputs();


</script>

    <?php include 'inc/footer.php';?>
    </div>
  </div>
  <!-- General JS Scripts -->
 <script src="../assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src="../assets/bundles/datatables/datatables.min.js"></script>
  <script src="../assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="../assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
  <script src="../assets/js/page/datatables.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../assets/js/custom.js"></script>
  <script src="../assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/forms-advanced-forms.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "excel", "pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>