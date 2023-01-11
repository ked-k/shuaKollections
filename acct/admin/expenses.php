<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
  <?php include '../config.php' ;?>

   <?php 
 $active='expenses';
$msg2 = '';
?>
<?php
if(isset($_POST['save_exp'])) {
 extract($_POST);
  if($reff_number != "") {
      $me = $_SESSION['uid'];
    try {
         $year = date('Y', strtotime($date_added));
        $week = date('Y-M-W', strtotime($date_added));
        $month = date('M-Y',strtotime($date_added));
 $sql = "INSERT INTO `expenditures` (`reff_number`, `from_acct`, `description`, `exp_amount`, `type`, `date_added`, `exp_year`, `exp_month`, `exp_week`, `user_id`, `expLocation`) 
                        VALUES('$reff_number', '$from_acct','$description','$exp_amount','$type','$date_added','$year','$month','$week', '$me','$curBranchId')";
  $stmt = $db->prepare($sql);
  $stmt->execute();
if($stmt->rowCount() > 0)
 {
	
  $msg2 ='<div class="alert alert-success alert-dismissible fade show" role="alert">
  The record was successfully <strong>saved</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
   
}
    	
      
      
    } catch (PDOException $e) {
       $msg2 ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Error <strong>Something went wrong, no action took place</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    
    } 
}

}

?>

<!-- ked did it-->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $appname ?> | Expenses</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
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
                        <li class="breadcrumb-item active" aria-current="page">Expenses</li>
                      </ol>
                    </nav>
            <div class="row">
                 
              <div class="col-12">
                <div class="card">
                   <?php echo $msg2 ?>
                  <div class="card-header">
                    <a data-toggle="modal" data-target="#ExpenseModal" href="#" class="btn btn-info">New Expense</a>
                  </div>
                  <div class="card-body">
                   <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th>No.</th>
                        <th>Refference</th>
                        <th>Account</th>
                        <th>Description</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th class="text-end">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
  <?php 
  
$branch = $_SESSION['locationid'];
  try {
      $query = "SELECT * FROM expenditures
                                    LEFT JOIN shop ON shop.shopId = expenditures.expLocation
                                    LEFT JOIN users ON `expenditures`.`user_id` = `users`.`Id`
                                    WHERE expLocation = '$branch' ORDER BY expenditures.id DESC
                                     ";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();      
      if($count >= 1 ) {
    $cn=1;
                            for($i=0; $row= $stmt->fetch(PDO::FETCH_ASSOC); $i++){
                              $cnt=1+$i;

 ?>
                   <tr>
                    <td><?php echo $cnt ?></td>
                    <td>  <?php echo $row['reff_number'] ;?>     </td>
                     <td>  <?php echo $row['from_acct'] ;?>     </td>
                     <td>  <?php echo $row['description'] ;?>     </td>
                      <td>  <?php echo $row['Uname'] ;?>     </td>
                      <td>  <?php echo $row['date_added'] ;?>  </td>
                      <td> <?php echo $row['type'] ;?></td>
                     <td>  <?php echo  formatMoney($row['exp_amount']) ;?><input name="cost" id="cost" type="hidden" value="<?php echo $row['exp_amount']; ?>" ></td>
                    
                  </tr>
                           <?php }
}
      
      
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    } ?>
                  </tbody>
                 
                </table>
                  </div>
                </div>
              </div>
  
               <div class="text-end text-right">
                  <h5>Total Cost: <span id="res1" class="text-success"><strong></strong></span></h5>
               </div>
              
            </div>
          </div>

         
        </section>

        
      </div>


                                            <div class="modal fade" id="ExpenseModal" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-md">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Create a new Expense</h5>
														 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
													</div>
                                                    <form action="" method="POST">
                                                        <div class="modal-body">


                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="mb-3">
                                                                            <label for="reff_number" class="form-label">Refference No.</label>
                                                                            <input type="text" id="reff_number" value=" <?php echo mt_rand(1000, 9999).time() ?>" name="reff_number" class="form-control"  required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="from_acct" class="form-label">Account</label>
                                                                            <input type="text" class="form-control"  name="from_acct" id="from_acct" value="Petty Cash" required>
                                                                               
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="exp_amount" class="form-label">Amount</label>
                                                                            <input type="number" step="any" id="exp_amount" name="exp_amount" class="form-control"  required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="type" class="form-label">Type</label>
                                                                            <select name="type" class="form-control"  id="type">
                                                                                <option selected value="Miscellaneous">Miscellaneous expenses </option>
                                                                                <option value="Rent">Rent expense </option>
                                                                                <option value="Finance cost">Finance cost </option>
                                                                                <option value="Taxation">Taxation expense</option>
                                                                                <option value="Communication">Communication expense </option>
                                                                                <option value="Utilities costs">Cost of utilities </option>
                                                                                <option value="Depreciation">Depreciation expense </option>
                                                                                <option value="Stationery">Printing and stationery expense </option>
                                                                                <option value="Goods cost">Cost of goods sold </option>
                                                                                <option value="Selling and distribution">Selling and distribution expenses </option>
                                                                                <option value="Operational">Operating, general and administrative expenses </option>
                                                                                <option value="Salaries">Salaries, wages, and benefits </option>
                                                                                <option value="Travel">Staff traveling expense </option>
                                                                                <option value="Repair and Maintenance">Repair and maintenance expense </option>
                                                                                <option value="Insurance"> Insurance cost </option>
                                                                                <option value="Legal">Legal and professional charges </option>

                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="description" class="form-label">Description</label>
                                                                           <textarea class="form-control" name="description" id="description" cols="30" rows="3"></textarea>
                                                                        </div>

                                                                            <div class="mb-3">
                                                                            <div class="text-sm">
                                                                            <label>Date</label>
                                                                            <input type="date" required class="form-control" value="<?php echo date('Y-m-d') ?>" name="date_added" id="date_added">
                                                                            </div>
                                                                            </div>
                                                                    </div> <!-- end col -->

                                                                </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <input type="submit" name="save_exp" value="Add Expense"  class="btn btn-success"/>
                                                        </div>
                                                    </form>
												</div>
											</div>
										</div>



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
  <script src="../assets/bundles/datatables/export-tables/jszip.min.js"></script>
  <script src="../assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
  <script src="../assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
  <script src="../assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script src="../assets/js/page/datatables.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../assets/js/custom.js"></script>
<script type="text/javascript">

window.sumInputs = function() {
    var input = document.getElementsByName('cost'),

        sum = 0;            

    for(var j=0; j<input.length; j++) {
        var ips = input[j];

        if (ips.name && ips.name.indexOf("total") < 0) {
            sum += parseFloat(ips.value) || 0;
        }

    }

  
    var ked = sum;
  var num = 'UGX: ' + ked.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
document.getElementById('res1').innerHTML = num;
}
sumInputs();


</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>