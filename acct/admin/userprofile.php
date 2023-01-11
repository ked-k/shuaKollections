<?php include 'inc/session.php' ;?>
    <?php include '../config.php' ;?>
<!DOCTYPE html>
<html lang="en">

<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $appname ?> </title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
  <!-- Template CSS -->
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
        
  <?php 
if(isset($_GET['u']))
{
   
$me = $_GET['u'];
    
  try {
      $query = "SELECT * FROM `staff` WHERE StaffID = :me ";
      $stmt = $db->prepare($query);
      $stmt->bindParam('me', $me, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();      
      if($count >= 1 ) {
    $cn=1;
                            for($i=0; $row= $stmt->fetch(PDO::FETCH_ASSOC); $i++){
                              $cnt=1+$i;

 ?>
  <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <img alt="image" src="../allAttachements/profiles/<?php echo $row['Photo']; ?>" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#"><?php echo $row["UserName"]; ?></a>
                      </div>
                      <div class="author-box-job"><?php echo $row["UserType"]; ?></div>
                    </div>
        
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Personal Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-left">
                          Full names
                        </span>
                        <span class="float-right text-muted">
                          <?php echo $row["STitle"].' '.$row["FirstName"].' '.$row["SecondName"]; ?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                          <?php echo $row["Contact"]; ?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                          <?php echo $row["Email"]; ?>
                        </span>
                      </p>
                   
                      <p class="clearfix">
                        <span class="float-left">
                          Current project
                        </span>
                        <span class="float-right text-muted">
                          <?php echo $_SESSION['projectName']; ?>
                        </span>
                      </p>
                         <p class="clearfix">
                        <span class="float-left">
                         Signature
                        </span>
                        <span class="float-right text-muted">
                          <img width="120px" src="data:image/jpeg;base64, <?php echo base64_encode( $row['Signature'] );  ?> ">
                        </span>
                      </p>
                          <p class="clearfix">
                        <span class="float-left">
                         Contract
                        </span>
                        <span class="float-right text-muted">
                         <a href="../allAttachements/contract/<?php echo $row['Contract']; ?>" download="<?php echo $row["FirstName"].' '.$row["SecondName"]; ?> Contract"><i class="fa fa-download"></i></a>
                        </span>
                      </p>
                      <button  data-toggle="modal" data-target="#modal-lg" class="btn btn-primary btn-block">Update Signature</button>
                      <button  data-toggle="modal" data-target="#modal-lg2" class="btn btn-primary btn-block">Update contract</button>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    
                      <li class="nav-item">
                        <a class="nav-link active" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="false">Setting</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      
                      <div class="tab-pane fade show active"  id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                        <form method="post" action="adduser" class="needs-validation" novalidate="" enctype="multipart/form-data" >
              <div class="modal-content">
             
                <div ><hr/></div>
               
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-12 col-sm-4">
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control" required="" name="fname" value="<?php echo $row["FirstName"]; ?>">
                          <div class="invalid-feedback">
                            What's your First Name?
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="form-group">
                          <label>Second Name</label>
                          <input type="text" class="form-control" required="" name="sname" value="<?php echo $row["SecondName"]; ?>">
                          <div class="invalid-feedback">
                            What's your second name?
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="form-group">
                          <label>Preffered UserName</label>
                          <input type="text" class="form-control" required="" name="uname" value="<?php echo $row["Contact"]; ?>">
                          <div class="invalid-feedback">
                            What's your Preffered UserName?
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12 col-sm-4">
                        <div class="form-group">
                          <label>Select Title</label>
                          <select class="form-control" name="title">
                            <option>Mr.</option>
                            <option>Ms.</option>
                            <option>Miss</option>
                            <option>Dr.</option>
                            <option>Prof.</option>
                            <option>Eng</option>
                            <option>Madam</option>
                          </select>
                        </div>                        
                      </div>

                      <div class="col-12 col-sm-4">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" required="" name="email" value=" <?php echo $row["Email"]; ?>">
                          <div class="invalid-feedback">
                            Oh no! Email is invalid.
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-sm-4">
                        <div class="form-group">
                          <label>Contact</label>
                          <input type="text" class="form-control phone-number" required="" name="contact" value=" <?php echo $row["Contact"]; ?>">
                          <div class="invalid-feedback">
                            What's your Contact?
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12 col-sm-4">
                        <div class="form-group">
                          <label>Select UserType</label>
                          <select class="form-control" name="role">
                              <option value="<?php echo $row["UserType"]; ?>"><?php echo $row["UserType"]; ?></option>
                            <option value ="Admin">Admin</option>
                            <option value="User">User</option>                           
                          </select>
                        </div>                        
                      </div>

                 
                    </div>

                                    
                    </div>
                  <div class="modal-footer bg-whitesmoke br">
                      <button type="submit" class="btn btn-primary">Save</button>
                      
                    </div>

                  </div>                 
                </form>                            
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
                  <?php
                  }
}
      
      
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }

    } ?>
        
      </div>
    <?php include 'inc/footer.php';?>
    </div>
  </div>
  
  
<div class="modal fade" tabindex="-1" role="dialog"   id="modal-lg">
        <div class="modal-dialog modal-md">
 <form role="form" method="POST" enctype="multipart/form-data" action="updatesign.php?id=<?php echo $_GET['u']; ?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update your signature</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label>Signature</label>

                  <div class="input-group">
                    
                    <input type="file" required name="attch" class="form-control dropify" required="" >
                    <input type="hidden" required name="uid" class="form-control dropify" required="" value="<?php echo $_GET['u']; ?>" >
             
                  </div>
                  <!-- /.input group -->
                </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
              
          </div>
 </div>
 </form>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog"   id="modal-lg2">
        <div class="modal-dialog modal-md">
 <form role="form" method="POST" enctype="multipart/form-data" action="updateContract?id=<?php echo $_GET['u']; ?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update your signature</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label>Contract</label>

                  <div class="input-group">
                    
                    <input type="file" required name="attch" class="form-control dropify" required="" >
                    <input type="hidden" required name="uid" class="form-control dropify" required="" value="<?php echo $_GET['u']; ?>" >
             
                  </div>
                  <!-- /.input group -->
                </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
              
          </div>
 </div>
 </form>
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
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>