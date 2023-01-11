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





<div class="row">

<div class="col-12">

 <div class="card">
  <div class="card-header text-center">
       <h3 class="text-center">Profit & Loss Report</h3> 
  </div>

                       <div class="card-body">
                        <div class="row">
                     <?php 
    if(isset($_POST['from'])) {
extract($_POST);


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
                                                                      
                                </div>
                                                    </div>                            
                        <div class="row">
                            <h3>Sales</h3>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                   <table  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Month/Year</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
    

  if($from != "" && $to != "") {
    try {
        $result = $db->prepare(" SELECT *, ROUND(SUM(TotalAmt),2) AS AMOUNT FROM sale
WHERE SaleLocation  = '$curBranchId' AND  SDate BETWEEN '$from' AND '$to'
 GROUP BY Month
 ");
                            $result->execute();
                            $cn=1;
                            for($i=0; $row = $result->fetch(); $i++){
                              $cnt=1+$i;
                                ?>
                                            <tr>
                          <td><?php echo $cnt ?></td>
                    <td><?php echo $row['Month'] ;?></td>
                  <td><?php echo  formatMoney($row['AMOUNT']); ?> <input name="Tsales" id="Tsales" type="hidden" value="<?php echo $row['AMOUNT']; ?>" ></td>

   
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

     <td></td>
     <td>Total Sales</td>
     <td><strong><h7 id="resSale" class="text-info"></h7></strong></td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <h3>Purchases/Stock Costs</h3>
                             <div class="col-md-12">
                                <div class="table-responsive">
                                   <table  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Month/Year</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
    

  if($from != "" && $to != "") {
    try {
        $result = $db->prepare(" SELECT *, SUM(StkAmount) AS amt, DATE_FORMAT(DateAdded, '%M-%y') AS Smonth FROM stock
WHERE `stock`.`State` = 'Saved' AND SBlocation = '$curBranchId'  AND  DateAdded BETWEEN '$from' AND '$to'
 GROUP BY Smonth
 ");
                            $result->execute();
                            $cn=1;
                            for($i=0; $row = $result->fetch(); $i++){
                              $cnt=1+$i;
                                ?>
                                            <tr>
                          <td><?php echo $cnt ?></td>
                    <td><?php echo $row['Smonth'] ;?></td>
                  <td><?php echo  formatMoney($row['amt']); ?> <input name="Tcost" id="Tcost" type="hidden" value="<?php echo $row['amt']; ?>" ></td>

   
                                            </tr>
                                           <?php }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }

    }
     ?>

     <td></td>
     <td>Total Purchases</td>
     <td><strong> <h7 id="resCost" class="mb-0 text-info"></h7></strong></td>
                                        </tbody>
                                    </table>
                                </div>
                                 <hr>
                            <p class="text-end h4 text-info mt-4">Total Gross Profit: <strong><span id="grossProf"></span></strong></p>
                            <hr>
                            </div>
                           
                             <h3>Expenses/Loss</h3>
                             <div class="col-md-12">
                                <div class="table-responsive">
                                   <table  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Month/Year</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
    

  if($from != "" && $to != "") {
    try {
        $result = $db->prepare(" SELECT *, ROUND(SUM(exp_amount),2) AS Amount FROM expenditures
WHERE expLocation  = '$curBranchId' AND  date_added BETWEEN '$from' AND '$to'
 GROUP BY exp_month
 ");
                            $result->execute();
                            $cn=1;
                            for($i=0; $row = $result->fetch(); $i++){
                              $cnt=1+$i;
                                ?>
                                            <tr>
                          <td><?php echo $cnt ?></td>
                    <td><?php echo $row['exp_month'] ;?></td>
                  <td><?php echo  formatMoney($row['Amount']); ?> <input name="Texpense" id="expense" type="hidden" value="<?php echo $row['Amount']; ?>" ></td>

   
                                            </tr>
                                           <?php }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }

    }
     ?>

     <td></td>
     <td>Total Expenses and Loss</td>
     <td><strong><h7 id="resExpense" class="mb-0 text-info"></h7></strong></td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <p class="text-end h4 text-info mt-4">Grand Total Gross Profit: <strong><span id="totalamountG"></span></strong></p>
                          
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6">
                                    
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
        var inputs = document.getElementsByName('Tsales'),
            sum = 0;
        for(var i=0; i<inputs.length; i++) {
            var ip = inputs[i];
            if (ip.name && ip.name.indexOf("total") < 0) {
                sum += parseFloat(ip.value) || 0;
            }
        }
        var ked = sum;
      var num = 'UGX: ' + ked.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    document.getElementById('resSale').innerHTML = num;

    //---------------------Purchases----------------------------------------
    var inputs2 = document.getElementsByName('Tcost'),
            sum2 = 0;
        for(var j=0; j<inputs2.length; j++) {
            var ip2 = inputs2[j];
            if (ip2.name && ip2.name.indexOf("total") < 0) {
                sum2 += parseFloat(ip2.value) || 0;
            }
        }
        var ked2 = sum2;
      var num2 = 'UGX: ' + ked2.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    document.getElementById('resCost').innerHTML = num2;
    var profit = sum-sum2;
    document.getElementById('grossProf').innerHTML = 'UGX: ' + profit.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
 //---------------------Expenses----------------------------------------
 var inputs3 = document.getElementsByName('Texpense'),
            sum3 = 0;
        for(var k=0; k<inputs3.length; k++) {
            var ip3 = inputs3[k];
            if (ip3.name && ip3.name.indexOf("total") < 0) {
                sum3 += parseFloat(ip3.value) || 0;
            }
        }
        var ked3 = sum3;
      var num3 = 'UGX: ' + ked3.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    document.getElementById('resExpense').innerHTML = num3;

 //---------------------grand----------------------------------------
 
       var gross = profit -sum3;
    document.getElementById('totalamountG').innerHTML = 'UGX: ' + gross.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    }


    sumInputs();
    </script>
   



      
  
<script type="text/javascript">

window.sumInputs = function() {
    var input = document.getElementsByName('cost'),

        sum3 = 0;            

    for(var j=0; j<input.length; j++) {
        var ips = input[j];

        if (ips.name && ips.name.indexOf("total") < 0) {
            sum3 += parseInt(ips.value) || 0;
        }

    }

  
    var ked = sum3;
  var nu3m = 'UGX: ' + ked.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
document.getElementById('resC').innerHTML = num3;
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