<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
<?php include '../config.php' ;?>

 
  <?php 
$msg2="";
if(isset($_GET['id']))
{
$id=$_GET['id'];
try{
$result = $db->prepare("DELETE FROM subcategory WHERE id= $id");
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

if(isset($_POST['upSid']))
{
$Sid=$_POST['upSid'];
$SCname=$_POST['subcattname'];
$result = $db->prepare("UPDATE subcategory SET subcategoryname ='$SCname' WHERE id= $Sid");
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
  <title>Admin | Sub Categories</title>
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
                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-info">Add SubCategories</button>
                  </div>
                  <div class="card-body">
                   <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Sub Category Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                                                                              <?php 
 
 $branch = $_SESSION['locationid'];
$result = $db->prepare("  SELECT *,subcategory.id as sid FROM `subcategory` ORDER BY id DESC");
  $result->execute();
                            $cn=1;
                            for($i=0; $row = $result->fetch(); $i++){
                              $cnt=1+$i; 
   

 ?>
                  <tr>
                    <td><?php echo $cnt ?></td>
                    <td>  <?php echo $row['subcategoryname'] ;?>     </td>
                    <td>     <div class="btn-group mb-2">
                      <a class="btn btn-info" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-edit"></i>
                      </a>
                  <?php include 'editsubcat.php' ?>
                    </div>
                      <a  class="btn btn-warning" onclick="return confirm('Are you sure you want to delete?');" href="subcategory?id=<?php echo $row['sid'] ;?>"><i class="fa fa-trash"></i></a>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">New sub Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="POST" action="addsubcategory">
                    <div class="form-group">
                    <label>Sub Category</label>
                    <div class="input-group">                    
                      <input type="text" class="form-control" placeholder="Category  Name" name="subcategory" required="">
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