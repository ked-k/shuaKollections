<!DOCTYPE html>
<html lang="en">

<?php
include 'acct/conn.php';
$message="";
if(count($_POST)>0) {

$username = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $password = md5($password);

$result = mysqli_query($conn,"SELECT * FROM users LEFT JOIN location ON location.Lid = users.MyLocation WHERE Email = '$username' and Password = '$password' ");
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
    $scode = ("S-".uniqid().rand(100,900).time() );
            $_SESSION['me'] = $row["FullName"];
    $_SESSION['uid'] = $row["Id"];
     $_SESSION['role'] = $row["Role"];
      $_SESSION['uname'] = $row["Uname"];
    $_SESSION['read'] = $row["uRead"];
    $_SESSION['write'] = $row["uWrite"];
     $_SESSION['delet'] = $row["uDelete"];
      $_SESSION['edit'] = $row["uEdit"];
       $_SESSION['dash'] = $row["Dashboard"];
   // $_SESSION['Mylocationid'] = $row["MyLocation"];
    $_SESSION['email'] = $username;
      $_SESSION['success'] = "You are now logged in";
      $_SESSION['loggedin_time'] = time(); 
      $_SESSION['CREATED'] = time();
      $_SESSION['Ltime']= date("Y-m-d H:i", strtotime("+0 hours"));
  
      
      if ($_SESSION['role'] == 'Admin'){
   echo "<script type='text/javascript'>window.location.href = 'acct/admin/';</script>";}
   elseif ($_SESSION['role'] == "User"){
        echo "<script type='text/javascript'>window.location.href = 'acct/admin/newsale?scode=$scode';</script>";
        $_SESSION['locationid'] = $row["MyLocation"];
        $_SESSION['locationName'] =$row["name"];
       $_SESSION['locationRegion'] = $row["region"];
   } 
} else {
$message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 invalid username or password
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
}

?>

<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Shua kollections</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="acct/assets/css/app.min.css">
  <link rel="stylesheet" href="acct/assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="acct/assets/css/style.css">
  <link rel="stylesheet" href="acct/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="acct/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='acct/assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                  <div  >
                <img style="border: 1px solid #ddd; border-radius: 7px; padding: 5px;  width: 170px; margin-left: auto;
  margin-right: auto; display: block;" src="acct/img/icons/mms.png"  alt="logo">
              </div>
                <?php echo $message ;?>
                <form method="POST" action="" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="#auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
            
           
              </div>
            </div>
       
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="acct/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="acct/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="acct/assets/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>