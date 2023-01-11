<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
  <?php include '../conn.php' ;?>



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

<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php include 'inc/navbar.php' ;?>
   <?php include 'inc/sidebar.php';?>
      <!-- Main Content -->
      <div class="main-content">
        
<?php $code = $_GET['scode'] ;?>
<section class="section">
          <div class="section-body">
                <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-success text-white-all">
                        <li class="breadcrumb-item"><a href="dashboard"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i>New sale</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $code ;?></li>
                      </ol>
                    </nav>
                                     <?php 
 $pode = $_GET['scode'] ;
$sql = " SELECT * FROM sale
LEFT JOIN products ON `sale`.`Item` = `products`.`Pid`
LEFT JOIN vans ON `sale`.`Van` = `vans`.`Vid`
WHERE `sale`.`Sid` = '$pode' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
for($i=0; $row = $result->fetch_assoc(); $i++) {
    $cnt=1+$i;
   

 ?>
                    <form method="POST" action="update_sale" >
               <div class="row">
                
                              <div class="col-12">
                         <div class="card">
               
                  <div class="card-body">
              
              
              
             
            <div class="row">
                
                              <div class="col-md-6">
                         <div class="card">
                  <div class="card-header">
                   
                  </div>
                  
  
                  <div class="card-body">
                      
                      
                <input type="hidden" class="form-control" name="scode" value="<?php echo $code ;?>" readonly >
                         <div class="form-group">
                      <label>Product</label>
                     <select  class="form-control select2" name="item" id="country"  required readonly>
                                            <option value="<?php echo $row['Pid'] ;?>"> <?php echo $row['P-name'] ;?> </option>
                                     
            
                                        </select>
                    </div>
                    
                       
                          
                              <div class="form-group">
                      <label>Outlet Name</label>
                     <input type="textr" class="form-control" name="outname" required placeholder="outlet name"  value="<?php echo $row['Outlet'] ;?>" >
                    </div>
                   
                             <div class="form-group">
                      <label>Location</label>
                     <input type="text" class="form-control" name="location" placeholder="location" required value="<?php echo $row['Location'] ;?>" >
                    </div>
                  
                   <div class="row">
                      
                        <div class="col-md-6">
                                 <div class="form-group">
                                     <label>Van</label>
                         <select  class="form-control select2" name="van"   required readonly>
                                            <option value="<?php echo $row['Vid'] ;?>"><?php echo $row['Van_name'] ;?></option>
                                         
            
                                        </select>
                    </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                      <label>Units in CTN</label>
                     <input type="number" class="form-control" name="unc" required value="<?php echo $row['UCTN'] ;?>" >
                    </div>
                        </div>
                    </div>
                  
                    
                   
                  
               
                  </div>
                </div>
                
                
                
              </div>
                
                         <div class="col-md-6">
                         <div class="">
          <div class="section-title">Qty sold</div>
                    <div class="row">
                      
                        <div class="col-md-6">
                                 <div class="form-group">
                      <label>CTN</label>
                     <input type="number" class="form-control" name="ctn" required value="<?php echo $row['Ctn'] ;?>">
                    </div>
                        </div>
                        <div class="col-md-6">
                                     <div class="form-group">
                      <label>Pcs</label>
                     <input type="number" class="form-control" name="pcs" value="<?php echo $row['Pcs'] ;?>" required>
                    </div> 
                        </div>
                    </div>
                     <div class="row">
                      
                        <div class="col-md-6">
                                 <div class="form-group">
                      <label>Sales</label>
                     <input type="number" class="form-control" name="sales" value="<?php echo $row['Sales'] ;?>">
                    </div>
                        </div>
                        <div class="col-md-6">
                                     <div class="form-group">
                      <label>RECPT NO.</label>
                     <input type="text" class="form-control" name="rctno" value="<?php echo $row['Rctno'] ;?>">
                    </div> 
                        </div>
                    </div>
                        
                    
                          <div class="row">
                      
                        <div class="col-md-6">
                             <div class="form-group">
                      <label>Payment type</label>
                     <select required class="form-control" name="ptype" id="pay" onchange='checkvalue(this.value)' required >
                                            <option value="<?php echo $row['Ptype'] ;?>"><?php echo $row['Ptype'] ;?></option>
                                            <option value="Cash">Cash</option>
                                            <option value="Credit">Credit</option>
                                        </select>
                    </div>
                        </div>
                        <div class="col-md-6">
                                     <div class="form-group">
                      <label>AMOUNT</label>
                     <input type="number" class="form-control" name="amount" value="<?php echo $row['Amount'] ;?>" >
                    </div> 
                        </div>
                    </div>
                  
                  <button type="submit" class="btn btn-success">update</button>
                </div>
                
              </div>
              <!-- end of col-6 -->
              
          
             
              
            </div>
       
          </div>
          </div>
          </div>
          </div>
             </form>
           <?php }} ?>
          
          </div>

         
        </section>

        
      </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			     	
			     	
			     			     	<script type="text/javascript">
	$(document).ready(function(){
		// Country dependent ajax
		$("#country").on("change",function(){
			var countryId = $(this).val();
	
			if (countryId) {
				$.ajax({
					url :"ajax.php",
					type:"POST",
					cache:false,
					data:{countryId:countryId},
					success:function(data){
						$("#state").html(data);
					 
					   $("#am").val('');
					
					}
				});
			}else{
				$('#state').html('<option value="">Not data</option>');
            	
			}
			
			
		});



		$("#state").on("change",function(){
		var stateId = $("#state").val();
			
			if (stateId) {
				$.ajax({
					url :"ajax.php",
					type:"POST",
					cache:false,
					data:{stateId:stateId},
					success:function(data){
						$("#city").html(data);
					
					}
				});
			}else{
				$('#city').html('<option value="">No data</option>');
            	
			}
		});
		
		
			$("#country").on("change",function(){
		var stateId = $("#state").val();
			
			if (stateId) {
				$.ajax({
					url :"ajax.php",
					type:"POST",
					cache:false,
					data:{stateId:stateId},
					success:function(data){
						$("#city").html(data);
					
					}
				});
			}else{
				$('#city').html('<option value="">amount</option>');
            	
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