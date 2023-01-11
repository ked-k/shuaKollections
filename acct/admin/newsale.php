<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
  <?php include '../conn.php' ;?>

<?php 
$msg = "";
$active='msales';
$active2='newsale';
if(isset($_GET['sid'])) {
  extract($_GET);
$did = $_GET['sid'];
$pcs = $_GET['pcs'];
$DPdtid = $_GET['pid'];
  if (empty($did)) {
   $msg ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>An error occured! no reff</strong>Pleas Try again
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
exit();
  }
 $sql1= "DELETE FROM `sale` WHERE Sid  = '$did' ";
if ($conn->query($sql1) === TRUE) {
$resultd = mysqli_query($conn,"UPDATE products SET QtyLeft=QtyLeft+'$pcs' WHERE products.Pid = '$DPdtid' "); 
 $_SESSION['success'] ='<div class="alert alert-success alert-dismissible fade show" role="alert">
  The recode was successfully <strong>Deleted</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
header('location: newsale?scode='.$scode.'');
   
} else {

    $msg ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>An error occured!</strong>Pleas Try again
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
  }


  if(isset($_SESSION['success'])){
       $msg = $_SESSION['success'];
       unset($_SESSION['success']);
        }
 ?>
<?php include 'add_sale.php';?>

<?php 
if (isset($_POST['Esaleid'])){

extract($_POST);
$saleid = $_POST['Esaleid'];
$saleqty = $_POST['saleqty'];
$qtyavailable =$_POST['qtyavailable'];
$saleamt = $_POST['saleamt'];
$tsalecost = $saleqty*$saleamt;

$valid = $qtyavailable-$saleqty;

if($valid > 0){

 $sqle = "UPDATE `sale` SET Pcs = '$saleqty', TotalAmt = '$tsalecost'  WHERE Sid = '$saleid' ";
    if ($conn->query($sqle) === TRUE) {
$result = mysqli_query($conn,"UPDATE products SET QtyLeft=QtyLeft+'$valid' WHERE products.Pid = '$Pdtid' ");  
$msg='<div class="alert alert-primary alert-dismissible fade show" role="alert">
  The record was successfully <strong>Updated</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
}

elseif ($valid <= 0) {
 $msg='<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Error!, You can only decrease the quantity but not to increase <strong>Quantity</strong>
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
  <title><?php echo $appname ?> | New sale</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
    <link rel="stylesheet" href="../assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">

  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../assets/img/favicon.ico' />
  <style type="text/css">
    .hidden{
     display:none; 

    }
  </style>
</head>

<body onload="act()" >
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php include 'inc/navbar.php' ;?>
   <?php include 'inc/sidebar.php';?>
      <!-- Main Content -->
      <div class="main-content">
        
<?php $code = $_GET['scode'] ;
$me = $_SESSION['uid'];
?>
<section class="section">
          <div class="section-body">
                <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-info text-white-all">
                        <li class="breadcrumb-item"><a href="dashboard"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i>New sale</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $code ;?></li>
                      </ol>
                    </nav>
               <div class="row">
                
                              <div class="col-12">
                         <div class="card">
                 <?php echo $msg ?>
                  <div class="card-body">
              
              
              
             
            <div class="row">
                
                              <div class="col-md-5">
                         <div class="card">
                  <div class="card-header">
                   
                  </div>
                  <div class="card-body">
                      
                      <form method="POST" action="" name="myForm"  class="needs-validation"  onsubmit="return validateForm()">
                <input type="hidden" class="form-control" name="scode" value="<?php echo $code ;?>" readonly >
                <input type="hidden" class="form-control" name="me" value="<?php echo $me ;?>" readonly >
                <input type="hidden" class="form-control" name="SaleLocation" value="<?php echo $curBranchId ;?>" readonly >
                 <label>Product</label>
                         <div class="input-group">
                     
                     <select  class="form-control select2" name="item" id="country" onchange="fill()" required >
                                            <option value="">Select</option>
                                             <?php 
$sql = " SELECT * FROM `products` 
WHERE PdtLocation = '$curBranchId' ORDER BY PName ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
for($i=0; $row = $result->fetch_assoc(); $i++) {
    $cnt=1+$i;
   

 ?>
  <option value="<?php echo $row['Pid'] ;?>"><?php echo $row['PName'].' UOM- '. $row['UOM'] ;?> <h1 class="hidden" ><?php echo $row['PCode'].' '. $row['GnCode'] ?></h1></option>
<?php }} ?>
            
                                        </select>

                                        <div class="input-group-append">
                          <select required  name="avqty" id="avqty"  required readonly >
                                            
                                           
                                        </select>
                        </div>

                    </div>
                    
                       
                          <div class="row">
                      
                        <div class="col-md-4">
                              <div class="form-group">
                      <label>Quantity</label>
                     <input type="number" class="form-control" name="qty" value="1" min="1" onchange="qfill()" id="qty" required placeholder="quantity" >
                    </div>
                    </div>
                    <div class="col-md-8">
                             <div class="form-group">
                      <label>Discount</label>
                     <input type="number" class="form-control" min="0" name="discount" value="0" onchange="fill()" id="dis" required>
                    </div>
                  </div>
                  </div>
      
                         <div class="row">
                       <div class="col-md-6">
                                     <div class="form-group">
                      <label>Min AMOUNT</label>
                     <select required class="form-control" name="amount" id="amt" onchange="fill()" required readonly >
                                            
                                           
                                        </select>
                    </div> 
                        </div>

                        <div class="col-md-6">
                             <div class="form-group">
                      <label>Amount sold</label>
           <input type="number" class="form-control" name="soldamt" value="0"  id="soldamt" onchange="sfill()" required>
                    </div>
                        </div>
                       
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                     <div class="form-group">
                      <label>Total Amount</label>
                 <input type="number" class="form-control" name="total" value="0"  id="tamt" readonly required>
                 </div>
               </div>

                 <div class="col-md-6">
                             <div class="form-group">
                      <label>Payment type</label>
                     <select required class="form-control" name="ptype" id="ptype" onchange='checkvalue(this.value)' required readonly>
                                            
                                            <option selected value="1">Cash</option>
                                            
                                        </select>
                    </div>
                        </div>
               </div>
                    <input type="submit" name="save_sale" value="Add Item"  class="btn btn-success"/>
                  </form>
                  </div>
                </div>

                
                
              </div>
                
                         <div class="col-md-7">
                              <form method="POST" action="addsave_sale" >
                             <div>                                                                                 <?php 
 $psode = $_GET['scode'] ;
$sql = " SELECT *, SUM(TotalAmt) AS amt FROM sale
WHERE `sale`.`Scode` = '$psode' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
for($i=0; $row = $result->fetch_assoc(); $i++) {
    $cnt=1+$i;
    $paid= $row['amt'];
if ($row['amt'] <= 0 )

{
 
    $btn = 'style="display: none"';
}
else{
   $btn = '';
  
}
 ?>
 <h4>Total sale amount = <strong><?php echo $row['amt'];  ?></strong></h4>
 <input type ="hidden" id="samt" value = "<?php echo $row['amt']; }} ?>" name="toto" >
                             </div>
                         <div class="">
                 
           <div class="table-responsive">
                    
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Product</th>
                  <th>Quantity</th>
                   <th>Discount</th>
                  <th>Amount</th>
                    <th>Total</th>
                     <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                                                                              <?php 
 $pode = $_GET['scode'] ;
$sql = " SELECT * FROM sale
LEFT JOIN products ON `sale`.`Item` = `products`.`Pid`
WHERE `sale`.`Scode` = '$pode' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
for($i=0; $row = $result->fetch_assoc(); $i++) {
    $cnt=1+$i;
   

 ?>
                  <tr>
                    <td><?php echo $cnt ?></td>
                    <td>  <?php echo $row['PName'] ;?> <input type="hidden" name="item[]" value="<?php echo $row['Item'] ;?>" >   </td>
                     <td>  <?php echo $row['Pcs'] ;?>  <input type="hidden" name="qty[]" value="<?php echo $row['Pcs'] ;?>" >  </td>
                      <td>  <?php echo $row['discount'] ;?>     </td>
                     <td>  <?php echo $row['Amount'] ;?>     </td>
                     <td>  <?php echo $row['TotalAmt'] ;?>     </td>
                     
                    <td> 
                      <div class="btn-group dropleft">
                  <!--     <a  data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"  title="Click to edit">
                        <i class="fa fa-edit"></i>
                      </a> -->
                        <?php include 'editNewSaleQty.php' ;?>
                      </div>

                      <a class="" onclick="return confirm('Are you sure you want to delete this product from the cart?');" href="newsale?sid=<?php echo $row['Sid'] ;?>&scode=<?php echo $pode ;?>&pcs=<?php echo $row['Pcs'] ;?>&pid=<?php echo $row['Item'] ;?>"><i class="fa fa-trash"></i></a>
                    </td>

                  </tr>

        <?php }} ?>
                  </tbody>
                 
                </table>
                  
                  
                  </div>
                
                </div>
                 
                      <?php $salecode = $_GET['scode'] ;
                        $meid = $_SESSION['uid'];
                        ?>
                <input type="hidden" class="form-control" name="scode" value="<?php echo $salecode ;?>" readonly >
                <input type="hidden" class="form-control" name="me" value="<?php echo $meid ;?>" readonly >
                <input type="hidden" class="form-control" name="SaleLocation" value="<?php echo $curBranchId ;?>" readonly >
               <div class="row">
                <div class="col-md-4" style="padding: 10px;">
                 <div class="input-group">                        
                        <div class="input-group-append">
                          <div class="input-group-text">
                           Paid
                          </div>
                        </div>
                        <input type="text" class="form-control" id="paid" onchange="pfill()" value="<?php echo $paid ?>" name="paid" >
                      </div>
                      </div>

                      <div class="col-md-4" style="padding: 10px;">
                      <div class="input-group">                        
                        <div class="input-group-append">
                          <div class="input-group-text">
                            Balance
                          </div>
                        </div>
                   <input type="text" readonly="" class="form-control" id="bal" value="0" name="balance" >
                      </div>
                      </div>

                       <div class="col-md-4" style="padding: 10px;">
                      <div class="input-group">                        
                      
                          <select  class="form-control select2" name="customer" id="customer"  required >
                             
                                      <?php 
$sql = "SELECT * FROM `customers` ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
for($i=0; $row = $result->fetch_assoc(); $i++) {
    $cnt=1+$i;
   

 ?>
  <option value="<?php echo $row['CusId'] ;?>"><?php echo $row['CusName'];?></option>
<?php }} ?>
            
                                        </select>
                      </div>
                      </div>

                      </div>

                <input type="submit"  <?php echo $btn ?> onclick="return confirm('Are you sure you want to save, no more changes will be made after!');" class="btn btn-info" name="save" value="Save sale">
                <input type="submit" <?php echo $btn ?> onclick="return confirm('Are you sure you want to save, no more changes will be made after!');" class="btn btn-success" name="sprnt" value="Save Print">
                </form>
              </div>
              <!-- end of col-6 -->
              
          
             
              
            </div>
       
          </div>
          </div>
          </div>
          </div>
          </div>

         
        </section>

        
      </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			     	
			     	                 <script>

    function fill() {
        
        var qt = document.getElementById("qty").value-0;
        var ds = document.getElementById("dis").value-0;
         var amt = document.getElementById("amt").value-0;         
         document.getElementById("soldamt").value = amt;
         var salep = document.getElementById("soldamt").value
         var tt = qt * salep;
        document.getElementById("tamt").value = tt - ds;

    }
    function sfill() {
        
        var sqt = document.getElementById("qty").value-0;
        var sds = document.getElementById("dis").value-0;
         var samt = document.getElementById("amt").value-0;         
         var ssalep = document.getElementById("soldamt").value
         var stt = sqt * ssalep;
        document.getElementById("tamt").value = stt - sds;

    }

      function qfill() {
        
        var qqt = document.getElementById("qty").value-0;
        var qds = document.getElementById("dis").value-0;               
         var qsalep = document.getElementById("soldamt").value
         var qtt = qqt * qsalep;
        document.getElementById("tamt").value = qtt - qds;

    }

     function pfill() {
        
        var pd = document.getElementById("paid").value-0;
         var amtp = document.getElementById("samt").value-0;
         var bal= pd - amtp ;
        document.getElementById("bal").value = bal;
        
    }
</script>
			     			     	<script type="text/javascript">
	$(document).ready(function(){
		// Country dependent ajax
		$("#country").on("change",function(){
			var countryId = $(this).val();
	
			if (countryId) {
				$.ajax({
					url :"ajaxsale.php",
					type:"POST",
					cache:false,
					data:{countryId:countryId},
					success:function(data){
						$("#amt").html(data);
						 $('#qty').val('1');
                     $('#dis').val('0');
					 fill();	
					   
					
					}
				});
			}else{
				$('#amt').html('<option value="">No price</option>');
            	
			}
			
			
		});

  $("#country").on("change",function(){
    var stateId = $(this).val();
      
      if (stateId) {
        $.ajax({
          url :"ajaxsale.php",
          type:"POST",
          cache:false,
          data:{stateId:stateId},
          success:function(data){
            $("#avqty").html(data);
          
          }
        });
      }else{
        $('#avqty').html('<option value="0">0</option>');
              
      }
    });




	});
</script>
<script>


    function validateForm() {
      
     var q1 = document.forms["myForm"]["avqty"].value-0;
     var q2 = document.forms["myForm"]["qty"].value-0;
     var stm = 'Quantity on hand is: ' +q1+ ' and  quantity required is: ' +q2;
  var x = document.forms["myForm"]["amt"].value-0;
    var y = document.forms["myForm"]["soldamt"].value-0;
    var z  = document.forms["myForm"]["tamt"].value;
  if (x > y) {
 
    swal('Error ', 'Product selling price must be greater than or equal to minmum price!', 'error');

    return false;
  }
 
 if (q2 > q1) {
 
  //  swal('Error ',+ q1 q2 + 'The availbe quatity  is less than the input/required quatity ', 'warning');
  swal('Stock Quantity missing, ' + stm + '!');
    return false;
  }
   else if (z <= 0) {   
   swal('Error', 'Total price can not be equal to 0 !', 'warning');
    return false;
  }
  else{
    return true;
  }
  
}
                   </script>

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
  <script src="../assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/forms-advanced-forms.js"></script>
   <script src="../assets/bundles/sweetalert/sweetalert.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "excel", "pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>