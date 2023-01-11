<?php include 'inc/session.php' ;?>
  <?php include '../config.php' ;?>
<!DOCTYPE html>
<html lang="en">


 
<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>PRAS - Admin Users</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Custom style CSS -->
   <link rel="stylesheet" href="../assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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
        

   
          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                 
                  <div class="card-header">
                    <h4>Users</h4>
                    <div class="card-header-action">
                      <a class="btn btn-primary"  href="NewStockRequest?stkcode=<?php echo ("SR-".uniqid().rand(100,900).time() ); ?>">New request</a>
                      
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                      <tr>
                    <th>#</th>
                    <th>Product Name</th>
                  <th>Product code</th>
                  <th>UOM</th>
                  <th>Sale price</th>
                  <th>Cost-Price</th>
                  <th>Quantity</th>
                    <th>Action</th>
                  </tr>
                        </thead>
                        <tbody>
<?php 
 $me = $_SESSION['uid'];
  try {
      $query = "SELECT * FROM `stock` WHERE Requester = :me GROUP BY stkCodde ";
      $stmt = $db->prepare($query);
      $stmt->bindParam('me', $me, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();      
      if($count >= 1 ) {
    $cn=1;
                            for($i=0; $row= $stmt->fetch(PDO::FETCH_ASSOC); $i++){
                              $cnt=1+$i;

 ?>
                              <tr>
                    <td><?php echo $cnt ?></td>
                    <td>  <?php echo $row['PName'] ;?>     </td>
                    <td>  <?php echo $row['PCode'] ;?>     </td>
                    <td>  <?php echo $row['UOM'] ;?>     </td>
                    <td>  <?php echo $row['Costprice'] ;?>     </td>
                    <td>  <?php echo $row['RRPrice'] ;?>     </td>
                    <td>  <?php echo $row['QtyLeft'] ;?>     </td>
                    <td> <a class="" href="#"><i class="fa fa-eye"></i></a>
                     
                    </td>
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
              </div>
            </div>
          </div>
        
        
      </div>


 <?php include '../models/newuser.php' ?>

    <?php include 'inc/footer.php';?>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="../assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="../assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../assets/js/custom.js"></script>
    <script src="../assets/bundles/datatables/datatables.min.js"></script>
  <script src="../assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>

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