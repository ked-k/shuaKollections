<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
  <?php include '../config.php' ;?>

 <?php 
 $active='mlocations';
$active2='locations';
$msg2="";
if(isset($_GET['lid']))
{
  try{
$lid=$_GET['lid'];
$result = $db->prepare("DELETE FROM location WHERE Lid = '$lid' ");
  $result->execute();  
if($result->rowCount() > 0){
 $msg2 ='<div class="alert alert-success alert-dismissible fade show" role="alert">
  The record was successfully <strong>Deleted</strong>
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
}
catch (PDOException $e) {
  $msg2 = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
 <strong>Failed!</strong> Something went wrong or the item cant be deleted '.$e->getMessage().'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
     
    }  

}?>

  <?php 

if(isset($_POST['LcId']))
{
$LcId=$_POST['LcId'];
$bname=$_POST['bname'];
$blocation = $_POST['blocation'];
$result = $db->prepare("UPDATE location SET name ='$bname', region = '$blocation' WHERE Lid= '$LcId'  ");
  $result->execute();  
if($result->rowCount() > 0){
   $msg2 ='<div class="alert alert-success alert-dismissible fade show" role="alert">
  The record was successfully <strong>Updated</strong>
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
  <title><?php echo $appname ?> | Locations</title>
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
                 <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-primary text-white-all">
                        <li class="breadcrumb-item"><a href="dashboard"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i>Locations</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All branches</li>
                      </ol>
                    </nav>
                <div class="card">
                   <?php echo $msg2 ?>
                  <div class="card-header">
                    <button data-toggle="modal" data-target="#exampleModalB" class="btn btn-info">New branch/Location</button>
                  </div>
                  <div class="card-body">
                   <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Branch name</th>
                    <th>Location</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                                                                              <?php 
$lid = $_SESSION['locationid'];
  try {
      $query = "SELECT * FROM `location` ";
      $stmt = $db->prepare($query);
      $stmt->bindParam('lid', $lid, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();      
      if($count >= 1 ) {
    $cn=1;
                            for($i=0; $row= $stmt->fetch(PDO::FETCH_ASSOC); $i++){
                              $cnt=1+$i;

   

 ?>
                  <tr>
                    <td><?php echo $cnt ?></td>
                    <td>  <?php echo $row['name'] ;?>     </td>
                    
                    <td> <?php echo $row['region'] ;?> </td>
                    <td>  <div class="btn-group dropleft">
                      <a class="btn btn-info" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-edit"></i>
                      </a>
                  <?php include 'editLocation.php' ?>
                    </div>
                      <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record!');" href="locations?lid=<?php echo $row['Lid'] ;?>"><i class="fa fa-trash"></i></a>
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

         
        </section>

        
      </div>


 <!-- Modal with form -->
   <?php include '../modals/newbrunch.php' ?>


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