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
  <div class="card-header text-center">
       <h3 class="text-center">User Sales Report</h3> 
  </div>

                       <div class="card-body">
                        <div class="row">
                     <?php 
    if(isset($_POST['from'])) {
extract($_POST);

if($product != ""){
$pdt = $_POST['product'];
$pop = ' AND';
$ps = "Item =";
$pdtstmt = $pop.' '.$ps.' '.$pdt;

}
else{
  $pdtstmt = "";
  $pdt = 'All';
}

if($user != ""){
$users = $_POST['user'];
$uop = ' AND';
$us = "sale.User =";
$userstmt = $uop.' '.$us.' '.$users;

}
else{
  $userstmt = "";
  $users = 'All';
}

if($shop != ""){
  $shp = $_POST['shop'];
$sop = ' AND';
$ss = "shopId =";
$shopstmt = $sop.' '.$ss.' '.$shp;

}
else{
  $shopstmt = "";
  $shp = 'All';
}


                      ?>       
                                             
                                <div class="col-md-6 col-sm-6">
                                    <address>
                                        <strong><h4>Mr&Mrs Shoes.</h4></strong><br>
                                        795 Folsom Ave, Suite 546 San Francisco, CA 54656<br>
                                        <abbr title="Phone">P:</abbr> (256) 456-34636
                                    </address>
                                </div>
                                <div class="col-md-6 col-sm-6 text-right">
                                    <p class="mb-0"><strong>Period: </strong> <?php echo $from; ?>-<?php echo $to; ?></p>
                                    <p class="mb-0"><strong>Product: </strong> <?php echo $pdt ?></p>
                                    <p class="mb-0"><strong>Shop: </strong> <?php echo $shp ?></p>
                                    <p class="mb-0"><strong>User: </strong> <?php echo $users ?></p>                                    
                                </div>
                                                    </div>                            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover c_table theme-color">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
                                                                                                                                           
                                                <th class="text-right">Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
    

  if($from != "" && $to != "") {
    try {
        $result = $db->prepare(" SELECT *, ROUND(SUM(TotalAmt),2) AS AMOUNT FROM sale
LEFT JOIN users ON  `users`.Id =  sale.User
LEFT JOIN products ON `sale`.`Item` = `products`.`Pid`
LEFT JOIN shop ON shop.shopId = `products`.`shop`
WHERE SaleLocation  = '$curBranchId' AND sale.State ='Saved' 
$pdtstmt $shopstmt $userstmt AND SDate BETWEEN '$from' AND '$to'

 GROUP BY sale.User
 ");
                            $result->execute();
                            $cn=1;
                            for($i=0; $row = $result->fetch(); $i++){
                              $cnt=1+$i;
                                ?>
                                            <tr>
                          <td><?php echo $cnt ?></td>
                    <td><?php echo $row['Uname'] ;?></td>
                <td class="text-right"><?php echo  formatMoney($row['AMOUNT']); ?><input name="comm" id="comm" type="hidden" value="<?php echo $row['AMOUNT']; ?>" ></td>
                                            </tr>
                                           <?php }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }

    }
    }

else {

echo '<script language="javascript">';
                                        echo 'alert("Errror, Something went wrong!'.$conn->error.'")';
                                        echo '</script>';
                                   echo "<script type='text/javascript'>window.history.go(-1);</script>";

}
     ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Total</h5>
                                     <a href="javascript:void(0);" onclick="window.history.go(-1);" class="btn btn-info"><i class="fa fa-backward"></i></a>
                                </div>
                                <div class="col-md-6 text-right">
                                   
                                                                     
                                    <h5 id="res" class="mb-0 text-success"></h5>
                                    <a href="javascript:void(0);" class="btn btn-info"><i class="fa fa-print"></i></a>
                                   
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
   <script type="text/javascript">

window.sumInputs = function() {
    var inputd = document.getElementsByName('comm'),

        sum = 0;            

    for(var d=0; d<inputd.length; d++) {
        var ipd = inputd[d];

        if (ipd.name && ipd.name.indexOf("total") < 0) {
            sum += parseInt(ipd.value) || 0;
        }

    }

  
    var kedd = sum;
  var numd = 'UGX: ' + kedd.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
document.getElementById('res').innerHTML = numd;
}
sumInputs();


</script>
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