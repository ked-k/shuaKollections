<?php include 'inc/session.php' ;?>
    <?php include '../config.php' ;?>
<!DOCTYPE html>
<html lang="en">

<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $appname ?></title>
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
if(isset($_SESSION['uid']))
{
   
$me = $_SESSION['uid'];
    
  try {
      $query = "SELECT * FROM users WHERE Id = :me ";
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
                      <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#"><?php echo $row["Uname"]; ?></a>
                      </div>
                      <div class="author-box-job"><?php echo $row["Role"]; ?></div>
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
                          <?php echo $row["FullName"]; ?>
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
                   
                      
                    
                    </div>
                    <div class="text-center">
                      <a href="" class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">
                        Change Password</a>
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
                        <form method="post" action="updateuser" class="needs-validation" novalidate="" enctype="multipart/form-data" >
              <div class="modal-content">
             
                <div ><hr/></div>
               
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control" required="" name="fname" value="<?php echo $row["FullName"]; ?>">
                          <div class="invalid-feedback">
                            What's your First Name?
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label>User Name</label>
                          <input type="text" class="form-control" required="" name="sname" value="<?php echo $row["Uname"]; ?>">
                          <div class="invalid-feedback">
                            What's your preffered name?
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
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="updatePassword.php">
        <input type="hidden" required value="<?php echo $row["Id"];?>" name ="me">
        <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">New Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
         <div class="md-form ">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" required name="oldpass"  class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your Old password</label>
        </div>

        <div class="md-form ">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="pass" placeholder="Enter New Password" onkeyup="validate_password()" required name="newpass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your New password</label>
        </div>
        <span id="wrong_pass_alert"></span>
           <div class="md-form ">
          <i class="fas fa-lock prefix grey-text"></i>
          <input id="confirm_pass" type="password" name="confirm_pass" placeholder="Confirm Password" required onkeyup="validate_password()" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Confirm password</label>
        </div>

      </div>
      <script>
        function validate_password() {
 
            var pass = document.getElementById('pass').value;
            var confirm_pass = document.getElementById('confirm_pass').value;
            if (pass != confirm_pass) {
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML
                  = '☒ Passwords do not match';
                document.getElementById('create').disabled = true;
                document.getElementById('create').style.opacity = (0.4);
            } else {
                document.getElementById('wrong_pass_alert').style.color = 'green';
                document.getElementById('wrong_pass_alert').innerHTML =
                    '🗹 Password Matched';
                document.getElementById('create').disabled = false;
                document.getElementById('create').style.opacity = (1);
            }
        }
 
        function wrong_pass_alert() {
            if (document.getElementById('pass').value != "" &&
                document.getElementById('confirm_pass').value != "") {
                alert("Your password will be changed");
            } else {
                alert("Please fill all the fields");
            }
        }
    </script>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" id="create" onclick="wrong_pass_alert()">Update</button>
      </div>
    </div>
    </form>
  </div>
</div>
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