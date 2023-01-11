<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
  <?php include '../conn.php' ;?>

  <?php 
$msg2 = "";
if(isset($_GET['id'])) {
  extract($_GET);
$did = $_GET['id'];
  if (empty($did)) {
   $msg ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>An error occured! no reff</strong>Pleas Try again
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
exit();
  }
   $sql = " DELETE FROM vans` WHERE Vid  = '$did' ";
   
if ($conn->query($sql) === TRUE ){
 $msg2 ='<div class="alert alert-success alert-dismissible fade show" role="alert">
  The recode was successfully <strong>Deleted</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
   unset($_GET['id']);
} else {
$msg2 = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
 <strong>Failed!</strong>Something went wrong
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'.' '.$conn->error;
}
  }
 ?>

<!-- ked did it-->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin | Vans</title>
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
            <div class="row">
              <div class="col-12">
                <div class="card">
                   <?php echo $msg2 ?>
                  <div class="card-header">
                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-info">Add van</button>
                  </div>
                  <div class="card-body">
                   <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Van Name</th>
                  <th>Van No</th>
                  <th>Sales man</th>
                  <th>Location</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                                                                              <?php 
 
$sql = " SELECT * FROM `vans` ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
for($i=0; $row = $result->fetch_assoc(); $i++) {
    $cnt=1+$i;
   

 ?>
                  <tr>
                    <td><?php echo $cnt ?></td>
                    <td>  <?php echo $row['Van_name'] ;?>     </td>
                   <td>  <?php echo $row['No'] ;?>     </td>
                    <td>  <?php echo $row['Sales-man'] ;?>     </td>
                   <td>  <?php echo $row['Location'] ;?>     </td>
                    <td> <a class="" href="#"><i class="fa fa-eye"></i></a>
                      <a class="" href="vans?id=<?php echo $row['Vid'] ;?>"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
        <?php }} ?>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">New van</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="POST" action="
                addvan">
                    <div class="form-group">
                    <label>Van name</label>
                    <div class="input-group">                    
                      <input type="text" class="form-control" placeholder="van  Name" name="vname" required="">
                    </div>
                     <label>Van No</label>
                    <div class="input-group">                    
                      <input type="text" class="form-control" placeholder="number" name="no" required="">
                    </div>
                      <label>Van Location</label>
                    <div class="input-group">                    
                      <input type="text" class="form-control" placeholder="location" name="location" required="">
                    </div>
                      <label>Van Sales-man</label>
                    <div class="input-group">                    
                      <input type="text" class="form-control" placeholder="sales man" name="sman" required="">
                    </div>
                  </div>
                 
                  <button type="submit" class="btn btn-primary m-t-15 float-right waves-effect">Save</button>
                </form>
              </div>
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

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy",  "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>