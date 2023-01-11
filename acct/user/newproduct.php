<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
  <?php include '../conn.php' ;?>


<!-- ked did it-->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin | New product</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <link rel="stylesheet" href="../assets/bundles/select2/dist/css/select2.min.css">
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
               
                  <div class="card-body">
              
              
              
              <form method="POST" action="add_product" >
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
                      <label>Product code</label>
                      <input type="text" name="code" placeholder="product barcode" class="form-control" required>
                    </div> 
                        <div class="form-group">
                      <label>UOM</label>
                      <input type="text" name="uom" placeholder="product barcode" class="form-control" required>
                    </div> 
                          <div class="form-group">
                      <label>Case price</label>
                      <input type="number" name="cprice" placeholder="product name" class="form-control" required>
                    </div>
                    
                          <div class="form-group">
                      <label>Dozen price</label>
                      <input type="number" name="dprice" placeholder="" class="form-control" required>
                    </div>
                    
                          <div class="form-group">
                      <label>Unit Price</label>
                      <input type="number" name="uprice" placeholder="product name" class="form-control" required>
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
                      <label>RRPrice</label>
                      <input type="number" name="rrp" placeholder="product barcode" class="form-control" required>
                    </div> 
                    
                      
                          <div class="form-group">
                      <label>Description</label>
                      <input type="text" name="des" placeholder="" class="form-control">
                    </div>
                    
                     
                    <div class="form-group">
                      <label>Department</label>
                     <select  class="form-control select2" name="dpt" id="country"  required >
                                            <option value="">Select</option>
                                             <?php 
$sql = " SELECT * FROM `Departments` ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
for($i=0; $row = $result->fetch_assoc(); $i++) {
    $cnt=1+$i;
   

 ?>
  <option value="<?php echo $row['id'] ;?>"><?php echo $row['DepartmentName']  ;}}?></option>
              
                                        </select>
                    </div>
                     
     
                    <div class="form-group">
                      <label>Category</label>
                      <select class="form-control select2" name="cat" id="state">
                        <option>Select category</option>
                      </select>
                    </div>
                      
                   
        
                    <div class="form-group">
                      <label>Subcategory</label>
                      <select class="form-control select2" id="city" name="subcat">
                        <option>select subcategory</option>
                        
                      </select>
                    </div>
                  
                  
                    <div class="form-group">
                     <button style="align:right;" type="submit" class="btn btn-success float-right" >Save product</button>
             
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