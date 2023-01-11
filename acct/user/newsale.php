<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
  <?php include '../conn.php' ;?>

<?php 
$msg = "";
if(isset($_GET['sid'])) {
  extract($_GET);
$did = $_GET['sid'];
  if (empty($did)) {
   $msg ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>An error occured! no reff</strong>Pleas Try again
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
exit();
  }
 
    $sql1 = " DELETE FROM `sale` WHERE Sid  = '$did' ";
if ($conn->query($sql1) === TRUE){
 $msg ='<div class="alert alert-success alert-dismissible fade show" role="alert">
  The recode was successfully <strong>Deleted</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
   
} else {

    $msg ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>An error occured!</strong>Pleas Try again
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
  <title>Admin | New sale</title>
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
        
<?php $code = $_GET['scode'] ;
$me = $_SESSION['uid'];
?>
<section class="section">
          <div class="section-body">
                <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-success text-white-all">
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
                      
                      <form method="POST" action="add_sale" >
                <input type="hidden" class="form-control" name="scode" value="<?php echo $code ;?>" readonly >
                <input type="hidden" class="form-control" name="me" value="<?php echo $me ;?>" readonly >
                         <div class="form-group">
                      <label>Product</label>
                     <select  class="form-control select2" name="item" id="country" onchange="fill()" required >
                                            <option value="">Select</option>
                                             <?php 
$sql = " SELECT * FROM `products` ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
for($i=0; $row = $result->fetch_assoc(); $i++) {
    $cnt=1+$i;
   

 ?>
  <option value="<?php echo $row['Pid'] ;?>"><?php echo $row['P-name'].' '. $row['UOM']  ;}}?></option>
            
                                        </select>
                    </div>
                    
                       
                          <div class="row">
                      
                        <div class="col-md-4">
                              <div class="form-group">
                      <label>Quantity</label>
                     <input type="number" class="form-control" name="qty" value="1" min="1" onchange="fill()" id="qty" required placeholder="quantity" >
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
                      <label>Payment type</label>
                     <select required class="form-control" name="ptype" id="ptype" onchange='checkvalue(this.value)' required >
                                            
                                            <option value="Cash">Cash</option>
                                            <option value="Credit">Credit</option>
                                        </select>
                    </div>
                        </div>
                        <div class="col-md-6">
                                     <div class="form-group">
                      <label>AMOUNT</label>
                     <select required class="form-control" name="amount" id="amt" onchange="fill()" required readonly >
                                            
                                           
                                        </select>
                    </div> 
                        </div>
                    </div>
                     <div class="form-group">
                      <label>Total Amount</label>
                 <input type="number" class="form-control" name="total" value="0"  id="tamt" readonly required>
                 </div>
                  <button type="submit" class="btn btn-success">Submit</button>
                  
                  </form>
                  </div>
                </div>

                
                
              </div>
                
                         <div class="col-md-7">
                              <form method="POST" action="addsave_sale" >
                             <div>
                                                                                                               <?php 
 $psode = $_GET['scode'] ;
$sql = " SELECT *, SUM(TotalAmt) AS amt FROM sale
WHERE `sale`.`Scode` = '$psode' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
for($i=0; $row = $result->fetch_assoc(); $i++) {
    $cnt=1+$i;
   
if ($row['amt'] <= 0 )

{
    $btn = 'style="display: none"';
}
 ?>
 <h4>Total sale amount = <strong><?php echo $row['amt'];  ?></strong></h4>
 <input type ="hidden" value = "<?php echo $row['amt']; }} ?>" name="toto" >
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
                    <td>  <?php echo $row['P-name'] ;?> <input type="hidden" name="item[]" value=" <?php echo $row['Item'] ;?>" >   </td>
                     <td>  <?php echo $row['Pcs'] ;?>  <input type="hidden" name="qty[]" value=" <?php echo $row['Pcs'] ;?>" >  </td>
                      <td>  <?php echo $row['discount'] ;?>     </td>
                     <td>  <?php echo $row['Amount'] ;?>     </td>
                     <td>  <?php echo $row['TotalAmt'] ;?>     </td>
                     
                    <td> <a class="" href="#editsale?scode=<?php echo $row['Sid'] ;?>"><i class="fa fa-edit"></i></a>
                      <a class="" onclick="return confirm('Are you sure you want to delete this product from the cart?');" href="newsale?sid=<?php echo $row['Sid'] ;?>&scode=<?php echo $pode ;?>"><i class="fa fa-trash"></i></a>
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
                <input type="submit" <?php echo $btn ?> onclick="return confirm('Are you sure you want to save, no more changes will be made after!');" class="btn btn-info" value="Save sale">
                <input type="submit" <?php echo $btn ?> onclick="return confirm('Are you sure you want to save, no more changes will be made after!');" class="btn btn-primary" value="Save/print sale">
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
         var tt = qt * amt ;
        document.getElementById("tamt").value = tt - ds;
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






	});
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