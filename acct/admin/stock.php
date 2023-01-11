<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
  <?php include '../config.php' ;?>

   <?php 
 $active='mstock';
$active2='stock';
$msg2 = '';
$me = $_SESSION['uid'];

 $branch = $_SESSION['locationid'];
if(isset($_POST['upPsid']))
{
  $code = 'D'.uniqid().time();
$Sid=$_POST['upPsid'];
$stock=$_POST['stock'];
$result = $db->prepare("UPDATE products SET QtyLeft ='$stock' WHERE Pid= $Sid");
  $result->execute();  
if($result->rowCount() > 0){
  $resultdc = $db->prepare("INSERT INTO `stockqty`( `Pbarcode`, `Pdtid`, `PQty`, `Updates`,`Slocation`)
    VALUES ('$code','$Sid', '$stock', '$me', '$branch') ");
  $resultdc->execute(); 
   $msg2 ='<div class="alert alert-success alert-dismissible fade show" role="alert">
  The record was successfully <strong>Updated</strong> and a count document '.$code.' was created
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
   
} else {
$msg2 = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
 <strong>Failed!</strong> Something went wrong Or no new changes made
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
} 
}?>

<!-- ked did it-->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $appname ?> | Stock</title>
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
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-bars"></i> Stock</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Stock levels</li>
                      </ol>
                    </nav>
            <div class="row">
                 
              <div class="col-12">
                <div class="card">
                   <?php echo $msg2 ?>
                  <div class="card-header">
                    <a href="newstock?scode=<?php echo ("Stk-".uniqid().rand(100,900).time() ); ?>" class="btn btn-info">Add stock</a>
                  </div>
                  <div class="card-body">
                   <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                  <th>Product code</th>
                  <th>UOM</th>
                  <th>Cost price</th>
                  <th>Sell-Price</th>
                  <th>Quantity Left</th>
                  <th>Cost Value</th>
                  <th>Sale Value</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
  <?php 
  
$branch = $_SESSION['locationid'];
  try {
      $query = "SELECT * FROM `products` WHERE PdtLocation = '$branch' ";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();      
      if($count >= 1 ) {
    $cn=1;
                            for($i=0; $row= $stmt->fetch(PDO::FETCH_ASSOC); $i++){
                              $cnt=1+$i;

 ?>
                  <tr>
                    <td><?php echo $count ?></td>
                    <td>  <?php echo $row['PName'] ;?>     </td>
                    <td>  <?php echo $row['PCode'] ;?>     </td>
                    <td>  <?php echo $row['UOM'] ;?>     </td>
                    <td>  <?php echo formatMoney($row['Costprice']) ;?>     </td>
                    <td>  <?php echo formatMoney($row['RRPrice']) ;?>     </td>
                    <td>  <?php echo $row['QtyLeft'] ;?>     </td>
                    <td>  <?php $v1= $row['QtyLeft']*$row['Costprice'];
                    echo formatMoney($v1)  ;?><input name="cost" id="cost" type="hidden" value="<?php echo $v1; ?>" ></td>
                    <td>  <?php $v2= $row['QtyLeft']*$row['RRPrice'];
                     echo formatMoney($v2)  ;?><input name="sale" id="sale" type="hidden" value="<?php echo $v2; ?>" ></td>
                    <td> 
                      <div class="btn-group dropleft">
                      <a class="btn btn-info" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"  title="Quick Inventory">
                        <i class="fas fa-dolly"></i>
                      </a>
                  <?php include 'editStock.php' ?>
                    </div>                     
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
  
               <div class="col-6">
                  <h5>Total Cost: <span id="res1" class="text-success"><strong></strong></span></h5>
               </div>
               <div class="col-6">
                <h5>Total Sale: <span id="res2" class="text-success"><strong></strong></span></h5>
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
 <script type="text/javascript">

window.sumInputs = function() {
    var inputd = document.getElementsByName('sale'),

        sum = 0;            

    for(var d=0; d<inputd.length; d++) {
        var ipd = inputd[d];

        if (ipd.name && ipd.name.indexOf("total") < 0) {
            sum += parseFloat(ipd.value) || 0;
        }

    }

  
    var kedd = sum;
  var numd = 'UGX: ' + kedd.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
document.getElementById('res2').innerHTML = numd;
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