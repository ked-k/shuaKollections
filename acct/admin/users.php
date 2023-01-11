<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
  <?php include '../config.php' ;
  $active='users';?>


  <?php 
$msg2="";
if(isset($_GET['id']))
{
$id=$_GET['id'];
$result = $db->prepare("DELETE FROM users WHERE Id= $id");
  $result->execute();  
if($result->rowCount() > 0){
 $msg2 ='<div class="alert alert-success alert-dismissible fade show" role="alert">
  The recode was successfully <strong>Deleted</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
   
} else {
// $msg2 = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
//  <strong>Failed!</strong> Something went wrong or the item cant be deleted again
//   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     <span aria-hidden="true">&times;</span>
//   </button>
// </div>';
} 

}?>

<!-- ked did it-->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $appname ?> | Users</title>
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
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-users"></i> Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All users</li>
                      </ol>
                    </nav>
            <div class="row">
              <div class="col-12">
                <div class="card">
                   <?php echo $msg2 ?>
                  <div class="card-header">
                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-info">Add user</button>
                  </div>
                  <div class="card-body">
                   <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Full name</th>
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                                                                              <?php 
 
$me = $_SESSION['uid'];
 $branch = $_SESSION['locationid'];
$result = $db->prepare(" SELECT * FROM `users` WHERE Id != '$me' AND MyLocation = '$curBranchId'  ");
  $result->execute();
                            $cn=1;
                            for($i=0; $row = $result->fetch(); $i++){
                              $cnt=1+$i; 
 ?>
                  <tr>
                    <td><?php echo $cnt ?></td>
                    <td>  <?php echo $row['FullName'] ;?>     </td>
                    <td><?php echo $row['Uname'] ;?> </td>
                    <td> <?php echo $row['Role'] ;?> </td>
                    <td> <a class="" href="#"><i class="fa fa-eye"></i></a>
                      <a onclick="return confirm('Are you sure you want to delete?');" href="users?id=<?php echo $row['Id'] ;?>"><i class="fa fa-trash"></i></a>
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
                <h5 class="modal-title" id="formModal">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="POST" action="
                adduser">
                    <div class="form-group">
                    <label>User email</label>
                    <div class="input-group">                    
                      <input type="email" class="form-control" placeholder="User email" name="email" required="">
                       <input type="hidden" class="form-control" value="<?php echo $curBranchId ;?>" name="mybranch" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <div class="input-group">
                    
                      <input type="text" class="form-control" placeholder="User name" name="uname">
                    </div>
                  </div>
                     <div class="form-group">
                    <label>Contact</label>
                    <div class="input-group">
                    
                      <input type="number" class="form-control" placeholder="User contact" name="contact">
                    </div>
                  </div>
                     <div class="form-group">
                    <label>Full name</label>
                    <div class="input-group">
                    
                      <input type="text" class="form-control" placeholder="Full name" name="fname">
                    </div>
                  </div>

                     <div class="form-group">
                    <label>Role</label>
                    <div class="input-group">
                    
                      <select class="form-control" name="role">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                      
                      <input type="text" class="form-control" placeholder="Password" value="123456" name="password" readonly="">
                    </div>
                  </div>
                          <div class="form-group">
                      <label class="form-label">User Rights</label>
                      <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                          <input type="checkbox" name="Read" value="1" class="selectgroup-input" checked>
                          <span class="selectgroup-button">Read</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="checkbox" name="write" value="1" class="selectgroup-input" checked>
                          <span class="selectgroup-button">Write</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="checkbox" name="dashboard" value="1" class="selectgroup-input">
                          <span class="selectgroup-button">Dashboard</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="checkbox" name="Delete" value="1" class="selectgroup-input">
                          <span class="selectgroup-button">Delete</span>
                        </label>                        
                        <label class="selectgroup-item">
                          <input type="checkbox" name="Edit" value="1" class="selectgroup-input">
                          <span class="selectgroup-button">Edit</span>
                        </label>
                      
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
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>