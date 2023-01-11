<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
  <?php include '../conn.php' ;
  $active='msales';?>



<!-- ked did it-->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $appname ?> | saved sale</title>
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
        

<section class="section">
          <div class="section-body">
                <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-success text-white-all">
                        <li class="breadcrumb-item"><a href="dashboard"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i>sales</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All sales</li>
                      </ol>
                    </nav>
               <div class="row">
                
                              <div class="col-12">
                         <div class="card">
               
                  <div class="card-body">
              
              
              
             
            <div class="row">
                
                              
                
                         <div class="col-md-12">
                         <div class="">
                 
           <div class="table-responsive">
                    
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Product</th>
                  <th>Van</th>
                  <th>Ctn</th>
                  <th>Pcs</th>
                  <th>Amount</th>
                    <th>P-type</th>
                     
                  </tr>
                  </thead>
                  <tbody>
                                                                              <?php 
 $pode = $_GET['scode'] ;
$sql = " SELECT * FROM sale
LEFT JOIN products ON `sale`.`Item` = `products`.`Pid`
LEFT JOIN vans ON `sale`.`Van` = `vans`.`Vid`
WHERE `sale`.`Q-code` = '$pode' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
for($i=0; $row = $result->fetch_assoc(); $i++) {
    $cnt=1+$i;
   

 ?>
                  <tr>
                    <td><?php echo $cnt ?></td>
                    <td>  <?php echo $row['P-name'] ;?>     </td>
                     <td>  <?php echo $row['Van_name'] ;?>     </td>
                     <td>  <?php echo $row['Ctn'] ;?>     </td>
                     <td>  <?php echo $row['Pcs'] ;?>     </td>
                     <td>  <?php echo $row['Amount'] ;?>     </td>
                     <td>  <?php echo $row['Ptype'] ;?>     </td>
                  
                  </tr>
        <?php }} ?>
                  </tbody>
                 
                </table>
                  
                  
                  </div>
                </div>
                
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