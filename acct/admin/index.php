<?php // header('location:dashboard');?>
<?php 
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if(!isset($_SESSION['uid'])){
	header('location: ../../auth-login');
}

 if($_SESSION['role'] != 'Admin'){
	header('location: logout');
}

if (isset($_SESSION['locationid']))
{
unset($_SESSION['locationName']);
unset($_SESSION['locationid']);

}
?>

<?php

function isLoginSessionExpired() {
	$login_session_duration = 1860; 
	$current_time = time(); 
if ((time() - $_SESSION['loggedin_time']) > 1700)
{  echo '<script language="javascript">';
                                        echo 'alert("You are about to be logged out in less than 2 mins sec, please save you data!")';
                                        echo '</script>';
                                     
		} 



	if(isset($_SESSION['loggedin_time']) and isset($_SESSION['uid'])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
			return true; 
		} 
		else {$_SESSION['loggedin_time'] = time();}
	}
	return false;
}
?>

<?php

$x = $_SERVER['REQUEST_URI'];
if(isset($_SESSION['uid'])) {
	if(isLoginSessionExpired()) {
		header("Location:lock?session_expired=$x");
	}
}



?>
  <?php include '../config.php' ;?>
<!DOCTYPE html>
<html lang="en">

<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
 <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>R-shop | Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
  <link rel="stylesheet" href="../assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
     <link rel="stylesheet" href="../assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../assets/img/favicon.ico' />
</head>

<body onload="swalert()">
  
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12  col-lg-12 ">
                <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-primary text-white-all">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-user-alt"></i><?php echo $_SESSION['me'] ; ?></a></li>
                        
                        <li class="breadcrumb-item active" aria-current="page"><a href="logout" > <i class="fas fa-sign-out-alt"></i>
                        Logout
                        </a></li>
                        <!--<li class="breadcrumb-item"><a data-toggle="modal" data-target="#exampleModalB" >New branch/Location</a></li>-->
                        </ol>
                </nav>
            <div class="card card-primary">
                 <div class="card-body">
                    <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th class="text-center">
                              My shops
                            </th>
                          
                         
                          </tr>
                        </thead>
                        <tbody>
                            <div class="row ">
<?php 
 $me = $_SESSION['uid'];
  try {
      $query = "SELECT * FROM `location` ";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();      
      if($count >= 1 ) {
    $cn=1;
                            for($i=0; $row= $stmt->fetch(PDO::FETCH_ASSOC); $i++){
                              $cnt=1+$i;
$createlocation = 'style="display:none"';

 ?>  
                          <tr>
                            <td>
                                <h4 style="display:none;" ><?php echo $row['name'] ;?></h4>
                                <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-cyan">
                    <a class="nav-link" href="openshops?lid=<?php echo $row['Lid'] ; ?>&Lname=<?php echo $row['name'] ; ?>&bregion=<?php echo $row['region'] ; ?>" onclick="return confirm('Are you sure you want to proceed with the following #<?php echo $row['name'] ; ?> location ?');" >
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-store"></i></div>
                    <div class="card-content">
                      <h4 class="card-title"><?php echo $row['name'] ;?></h4>
                      <span>Region</span>
                      
                      <p class="mb-0 text-sm">
                        
                        <span class="text-nowrap"><?php echo $row['region'] ;?></span>
                      </p>
                    </div>
                  </div>
                  </a>
                </div>
              </div>
          
              </td>
                    
                          </tr>
                        
                          
                        <?php }
                        
                        
}else{
    $createlocation = 'style="display:block"';
}
      
      
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    } ?>
                      
             </div>
                        </tbody>
                      </table>
                    </div>
                    <div <?php echo $createlocation ?> class="text-warning" >
                    New system? create a new branch by clicking here:
                    <a data-toggle="modal" data-target="#exampleModalB" class="btn btn-info" >New branch</a>
                    </div>
                  </div>
                
            </div>
       
          </div>
        </div>
      </div>
    </section>
  </div>
   <?php include '../modals/newbrunch.php' ?>
  <!-- General JS Scripts -->
  <script src="../assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../assets/js/custom.js"></script>
   <script src="../assets/bundles/datatables/datatables.min.js"></script>
  <script src="../assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
   <script src="../assets/bundles/sweetalert/sweetalert.min.js"></script>

  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
  

</script>
  
  <script>
     
        
    function swalert() {
  
  swal('Hello <?php echo $_SESSION['uname'] ?>', 'Please select a shop location to proceed!', 'warning');
;
    }
  </script>
  
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>