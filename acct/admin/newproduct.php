<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
  <?php include '../config.php' ;
  $active='mproducts';
$active2='newproduct';
  ?>


<!-- ked did it-->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $appname ?> | New product</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">

  <link rel="stylesheet" href="../assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="../assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
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
        

<section class="section">
          <div class="section-body">
               <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-primary text-white-all">
                        <li class="breadcrumb-item"><a href="dashboard"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-bars"></i>Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New products</li>
                      </ol>
                    </nav>
               <div class="row">
                
                              <div class="col-12">
                         <div class="card">
               
                  <div class="card-body">
              
              
              
              <form method="POST" action="add_product" name="myForm"  class="needs-validation"  onsubmit="return validateForm()" >
            <div class="row">
                
                              <div class="col-md-6">
                         <div class="card">
                  <div class="card-header">
                   
                  </div>
                  <div class="card-body">
                     <div class="form-group">
                      <label>Product name</label>
                      <input type="text" name="product" placeholder="product name" class="form-control" required>
                    </div>
                   
                         <div class="form-group">
                      <label>Product barcode</label>
                      <input type="text" name="code" placeholder="product barcode" class="form-control" required>
                    </div> 
                        <div class="form-group">
                      <label>UOM/Size</label>
                      <input type="text" name="uom" placeholder="size" class="form-control" required>
                    </div> 
                          <div class="form-group">
                      <label>Cost price</label>
                      <input type="number" onchange="mymargin()" name="cprice"value="0" id="cprice" placeholder="product cost" class="form-control" required>
                    </div>
                    <div class="form-group">

                          
                      <label>Sell price</label>
                      <input type="number" onchange="mymargin2()" name="saleprice" id="saleprice" placeholder="sell price" value="0" class="form-control" required>
                  </div>
                   <div class="input-group"> 
                    <label>Margin</label>
                    <input type="" width="20%" readonly name="pmargin" id="pmargin" class="form-control"> 
                    <div class="input-group-append">
                          <div class="input-group-text">
                            %
                          </div>
                        </div>
                </div>
                    
               
                   
                  
                  </div>
                </div>
                
                
                
              </div>
                
                         <div class="col-md-6">
                         <div class="card">
                  <div class="card-header">
                   
                  </div>
                  <div class="card-body">

                        <div class="form-group">
                      <label>Description</label>
                      <input type="text" name="des" placeholder="" class="form-control">
                    </div>
                    
                       
                    <div class="form-group">
                      <label>Product Color</label>
                      <div class="input-group colorpickerinput">
                        <input type="text" class="form-control" name="color">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <i class="fas fa-fill-drip"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                     
             
                           <div class="form-group">
                      <label>Department</label>
                        <select  class="form-control select2" name="dpt"  required >
                                            <option value="">Select department</option>
                                                                        <?php 
      $brunch = $_SESSION['locationid'];
      $query = " SELECT * FROM `departments` ";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();      
      if($count >= 1 ) {
    $cn=1;
                            for($i=0; $row= $stmt->fetch(PDO::FETCH_ASSOC); $i++){
                              $cnt=1+$i;

 ?>
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row["DepartmentName"]; ?></option>
                             <?php }} ?>
                                            

              
                                        </select>
                    </div>
     
                    <div class="form-group">
                      <label>Category</label>
                        <select  class="form-control select2" name="cart"  required >
                                            <option value="">Select category</option>
                                                                        <?php 
      $brunch = $_SESSION['locationid'];
      $query = " SELECT * FROM `category` ";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();      
      if($count >= 1 ) {
    $cn=1;
                            for($i=0; $row= $stmt->fetch(PDO::FETCH_ASSOC); $i++){
                              $cnt=1+$i;

 ?>
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row["CategoryName"]; ?></option>
                             <?php }} ?>
                                            

              
                                        </select>
                    </div>
                      
                  
                     <div class="form-group" style="display: none;" >
                      <label>Subcategory</label>
                         <select  class="form-control select2" name="subcart">
                                            <option value="">Select Sub-category</option>
                                                                        <?php 
      $brunch = $_SESSION['locationid'];
      $query = "SELECT * FROM `subcategory` ";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();      
      if($count >= 1 ) {
    $cn=1;
                            for($i=0; $row= $stmt->fetch(PDO::FETCH_ASSOC); $i++){
                              $cnt=1+$i;

 ?>
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row["subcategoryname"]; ?></option>
                             <?php }} ?>
                                            

              
                                        </select>
                    </div>
                 
                        <div class="form-group" style="display: none;">
                      <label>Shop type</label>
                     <select  class="form-control select2" name="shop"  >
                                            
                                                                        <?php 
      $brunch = $_SESSION['locationid'];
      $query = "SELECT * FROM `shop` WHERE Splocation = '$brunch' ";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();      
      if($count >= 1 ) {
    $cn=1;
                            for($i=0; $row= $stmt->fetch(PDO::FETCH_ASSOC); $i++){
                              $cnt=1+$i;

 ?>
                                ?>
                                <option value="<?php echo $row['shopId']; ?>"><?php echo $row["Sptype"]; ?></option>
                             <?php }} ?>
                                            

              
                                        </select>
                    </div>
                    <label>Branch</label>
                     <select class="form-control" name="brunch" required>
                        <option value="<?php echo $_SESSION['locationid']?>"><?php echo $_SESSION['locationName']?></option>
                      </select>
                      <br>
                   <div class="form-group">
                     <button style="margin-right: 15px;" type="submit" class="btn btn-success float-right" >Save product</button>
             
                    </div>
                  
                  </div>
                </div>
                
              </div>
              <!-- end of col-6 -->
              
            
             
              
            </div>
             </form>
          </div>
          </div>
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

  <script src="../assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="../assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="../assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="../assets/bundles/select2/dist/js/select2.full.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/forms-advanced-forms.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../assets/js/custom.js"></script>
     <script src="../assets/bundles/sweetalert/sweetalert.min.js"></script>
<script>
    function validateForm() {
  var x = document.forms["myForm"]["cprice"].value-0;
    var y = document.forms["myForm"]["saleprice"].value-0;
    var z  = document.forms["myForm"]["pmargin"].value;
  if (x > y) {
 
    swal('Eroor ', 'Product sale price must be greater than your cost price!', 'error');
    return false;
  }
  else if (y > x) {
 swal('Good Job', 'Your details will be submitted!', 'success');
   
    return true;
  }
  
    else if (x === y){
 
    swal('Error', 'Product sale price must be greater than your cost price!', 'warning');
    return false;
  }

   else if (z < 0) {   
   swal('Error', 'Product margin is too low!', 'warning');
    return false;
  }
  
}
                   </script>

        <script type="text/javascript">
            function mymargin(){
            var val1 = document.getElementById('cprice').value-0;
            document.getElementById('saleprice').value = val1;
            var val2 = document.getElementById('saleprice').value-0;
            var val3 = val2 - val1;
            var val4 = val3/val2;
            var mymgn = val4*100;
            document.getElementById('pmargin').value = mymgn.toFixed(2)+'%';
        }

             function mymargin2(){
            var val1 = document.getElementById('cprice').value-0;
            var val2 = document.getElementById('saleprice').value-0;
            var val3 = val2 - val1;
            var val4 = val3/val2;
            var mymgn = val4*100;
            document.getElementById('pmargin').value = mymgn.toFixed(2);
        }
        </script>
</body>


<!-- ked  21 Aug 2021 03:47:04 GMT -->
</html>