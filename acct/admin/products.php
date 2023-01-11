<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
 <?php include '../config.php' ;?>


  <?php 
$active='mproducts';
$active2='products';
$msg2="";
if(isset($_GET['id']))
{
$id=$_GET['id'];
  try {
$result = $db->prepare("DELETE FROM products WHERE Pid= $id");
  $result->execute();  
if($result->rowCount() > 0){
 $msg2 ='<div class="alert alert-success alert-dismissible fade show" role="alert">
  The recode was successfully <strong>Deleted</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
   
} else {

$msg2 = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
 <strong>Failed!</strong> Something went wrong or the item cant be deleted again
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
} 


 } catch (PDOException $e) {
    

          $msg2 = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
 <strong>Failed!</strong> Cannot delete or update a parent row: a foreign key constraint fails
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
  }
?>
<!-- ked did it-->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $appname ?> | Products</title>
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
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-bars"></i>Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All products</li>
                      </ol>
                    </nav>
            <div class="row">
              <div class="col-12">
                <div class="card">
                   <?php echo $msg2 ?>
                  <div class="card-header">
                    <a href="newproduct" class="btn btn-info">Add product</a> &nbsp &nbsp &nbsp
                     <a href="import/import" target="_blanck" class="btn btn-primary float-right">Import products</a>
                  </div>
                  <div class="card-body">
                   <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                  <th>Product code</th>
                  <th>UOM/Size</th>
                  <th>Cost price</th> 
                  <th>Sale price</th>                  
                  <th>Description</th>
                    <th>Color</th>                  
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
         <?php 
 $branch = $_SESSION['locationid'];
$result = $db->prepare(" SELECT * FROM `products` WHERE PdtLocation = '$branch' ORDER BY Pid DESC");
  $result->execute();
                            $cn=1;
                            for($i=0; $row = $result->fetch(); $i++){
                              $cnt=1+$i; 

 ?>
                  <tr>
                    <td><?php echo $cnt ?></td>
                    <td>  <?php echo $row['PName'] ;?>     </td>
                    <td>  <?php echo $row['PCode'] ;?> <p style="display:none"><?php echo $row['GnCode'] ;?></p>    </td>
                    <td>  <?php echo $row['UOM'] ;?>     </td>
                    <td>  <?php echo $row['Costprice'] ;?></td> 
                    <td>  <?php echo $row['RRPrice'] ;?></td>                    
                    <td>  <?php echo $row['Description'] ;?>     </td>
                    <td>  <?php echo $row['pcolor'] ;?>     </td>                    
                    <td> <a  data-toggle="tooltip" title="Edit!" href="editproduct?Pid=<?php echo $row['Pid'] ;?>"><i class="fa fa-edit"></i>
                     
                    </a>

                    <a  target="_blanck"  data-toggle="tooltip" title="View price tag" href="pricetag?pid=<?php echo $row['Pid'] ;?>"><i class="fa fa-tag"></i>
                      
                    </a>

                      <a onclick="return confirm('Are you sure you want to delete?');" href="products?id=<?php echo $row['Pid'] ;?>" data-toggle="tooltip" title="Delete!"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
        <?php } ?>
      
                  </tbody>
                 
                </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

         
        </section>

        
      </div>


 <!-- Modal with form -->
        


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

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>