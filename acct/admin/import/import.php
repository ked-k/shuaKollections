<?php include '../inc/session.php' ;?>

<?php
use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
$msg2= "";
$brunch = $curBranchId; 
if (isset($_POST["uptime"])) {
    $uploadTime  = $_POST["uptime"];
    }
    else{
       $uploadTime = time().rand(1,9); 
    }
if (isset($_POST["import"])) {
 
   
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
       if($column[0] != "" && $column[3] !="" && $column[4] !=""){    
              $product  = "";
            if (isset($column[0])) {
                $product  = mysqli_real_escape_string($conn, $column[0]);
            }

              $QtyLeft  = "0";
            if (isset($column[1])) {
                $QtyLeft  = mysqli_real_escape_string($conn, $column[1]);
            }

            $uom = "";
            if (isset($column[2])) {
                $uom = mysqli_real_escape_string($conn, $column[2]);
            }

             $cprice = "0";
            if (isset($column[3])) {
                $cprice = mysqli_real_escape_string($conn, $column[3]);
            }
             $saleprice = "0";
             $mak  = "";
            if (isset($column[4])) {
                $saleprice = mysqli_real_escape_string($conn, $column[4]);
               $x = $saleprice-$cprice;
                 $mak1 = $x/$saleprice;
                 $mak = $mak1*100;
            }

              $code = "";
              $gencode = rand(8,9).rand(9,1000).rand(20,90).rand(91,100).rand(1001,5000) ;
            if (isset($column[5])) {
                $code = mysqli_real_escape_string($conn, $column[5]);
                $gencode = rand(7,8).rand(11,5000).rand(20,90).rand(91,100).rand(1001,8000) ;
            }

             $color  = "";
            if (isset($column[6])) {
                $color = mysqli_real_escape_string($conn, $column[6]);
            }
              $des = "";
            if (isset($column[7])) {
                $des = mysqli_real_escape_string($conn, $column[7]);
            }
            
            $dpt = "1";
            if (isset($column[8])) {
                $dpt = mysqli_real_escape_string($conn, $column[8]);
            }
            $cart = "1";
            if (isset($column[9])) {
                $cart = mysqli_real_escape_string($conn, $column[9]);
            }
           

            $sqlInsert = "INSERT INTO `products`( `PName`, `PCode`, GnCode, `PDepartment`, `PCategory`,  `UOM`, `Costprice`, `RRPrice`, `pcolor`, `markup`,  `Description`, QtyLeft,  PdtLocation, Uptime)
                   values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $paramType = "sssiissssssiis";
            $paramArray = array(
                $product,
                $code,
                $gencode,
                $dpt,
                $cart,                
                $uom,
                $cprice,
                $saleprice,
                $color,
                $mak,
                $des,
                $QtyLeft,                
                $brunch,
                $uploadTime
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (! empty($insertId)) {
               $msg2 ='<div class="alert alert-success alert-dismissible fade show" role="alert">
  The products where successfully <strong>imported into the database</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <strong aria-hidden="true">&times;</strong>
  </button>
</div>';
            } else {
               $msg2 ='<div class="alert alert-warning alert-dismissible fade show" role="alert">
  invalid <strong>Data formart</strong>, pleaee check and map your data very well by following the instractions given below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <strong aria-hidden="true">&times;</strong>
  </button>
</div>';
            }
        }
    }
}
}
?>
<!DOCTYPE html>
<html>


<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Import products</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../../assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="../../assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../../assets/img/favicon.ico' />
</head>
<body>

  <div id="app">
      <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12 ">
    

<div class="card card-primary">
              <div class="row m-0">
                <div class="col-12 col-md-12 col-lg-12 p-0">
                  <div class="card-header text-center">
                    <h4>Import product cvs</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $msg2 ?>
 <form class="form-horizontal" action="" method="post"  name="frmCSVImport" id="frmCSVImport"          enctype="multipart/form-data">
                      <div class="form-group">
                        <lable>Choose CSV
                        File</label> 
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="far fa-user"></i>
                            </div>
                          </div>
                          <input type="file" name="file" required class="form-control" id="file" accept=".csv">
                        <input type="hidden" name="uptime" value="<?php echo time().rand(1,9);?>">
                   
                        </div>
                      </div>
                   
                      <div class="form-group text-right">
                        <button type="submit" id="submit" name="import"
                        class="btn btn-round btn-lg btn-primary">Import</button>
                      </div>
                    </form>
                  </div>
                </div>
                
              </div>
            </div>


<div class="card card-primary">

<div class="card-body">
               <?php
            include '../../config.php' ;
 
  try {
      $query = "SELECT * FROM `products` WHERE Uptime = '$uploadTime' ";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();      
      if($count >= 1 ) {
          $instructions = 'style="display:none"';
                ?>
            <table class="table">
            <thead>
              <tr>
                    <th>SKU</th>
                    <th>Product Name</th>
                  <th>Product Barcode</th>
                   <th>System code</th>
                  <th>UOM/Size</th>
                  <th>Cost price</th> 
                  <th>Sale price</th>                 
                  <th>Description</th>
                    <th>Color</th>                  
                   
                  </tr>
            </thead>
<?php
        for($i=0; $row= $stmt->fetch(PDO::FETCH_ASSOC); $i++){
                              $cnt=1+$i;
                    ?>
                    
                <tbody>
             <tr>
                    <td><?php echo $row['Pid']; ?></td>
                    <td>  <?php echo $row['PName'] ;?>     </td>
                    <td>  <?php echo $row['PCode'] ;?>     </td>
                     <td>  <?php echo $row['GnCode'] ;?>     </td> 
                    <td>  <?php echo $row['UOM'] ;?>     </td>
                    <td>  <?php echo $row['Costprice'] ;?>     </td> 
                    <td>  <?php echo $row['RRPrice'] ;?></td>                    
                    <td>  <?php echo $row['Description'] ;?>     </td>
                    <td>  <?php echo $row['pcolor'] ;?>     </td>                    
                  
                  </tr>
                
                          <?php }
                        
                        
}else{
    $instructions = 'style="display:block"';
}
      
      
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    } ?>
                </tbody>
        </table>
        
<div <?php echo $instructions ; ?>>
         <h5 class="text-success text-center">PLEASE TAKE NOTE OF THE FOLLOWING
</h5>
<ol>
    <li>Please follow the order below while mapping your data</li>
    <img src="format.png" width="100%">
    or <a href="cvsimport.csv" download="Products_import.csv"><i class="fa fa-download"></i> Download a template</a>

    <li>Make sure you delete the headers and unwanted colums and rows after mapping your data <strong class="text-danger">(Delete the entire first row of this document beginig from A1 to J1)</strong> else the doccument will not be imported.<strong class="text-danger text-strong">(possible error: "Warning: A non-numeric value encountered")</strong></li>

<li><strong class="text-success">Quantity, cost price and selling price</strong> values must be integers or float values (numbers) with no characters else the document will not be imported(possible error: <strong class="text-danger">"Warning: A non-numeric value encountered")</strong></li>

<li>The <strong class="text-success">Depatment & Cartegory</strong> values must be got directly from the system and must be of dataType <strong class="text-success">Int(integers)</strong> values else the doccument will not be imported.<strong class="text-danger">(possible error:a foreign key constraint fails)</strong></li>

Below is a list of <strong class="text-success">Depatment & Cartegory</strong> values in your system

       <div class="card-body">
                   <table id="example1" class="table table-bordered">
                
                  <tbody>  
                   <tr>
                    <th>#</th>
                    <th>Department Name</th>                  
                    <th>Value/Id</th>
                  </tr>       
                    <?php 
 
$result = $db->prepare("  SELECT * FROM `departments` ORDER BY id DESC");
  $result->execute();
                            $cn=1;
                            for($i=0; $row = $result->fetch(); $i++){
                              $cnt=1+$i; 

 ?>
                  <tr>
                    <td><?php echo $cnt ?></td>
                    <td>  <?php echo $row['DepartmentName'] ;?>     </td>
                  <td>  <?php echo $row['id'] ;?>     </td>
                  </tr>
        <?php  } ?>
         <tr>
                    <th>#</th>
                    <th>Cartegory Name</th>                  
                    <th>Value/Id</th>
                  </tr>
                            <?php 

$result = $db->prepare("SELECT *,category.id as  cid FROM `category` ORDER BY id DESC");
  $result->execute();
                            $cn=1;
                            for($i=0; $row = $result->fetch(); $i++){
                              $cnt=1+$i; 

 ?>


                  <tr>
                    <td><?php echo $cnt ?></td>
                    <td>  <?php echo $row['CategoryName'] ;?>     </td>
                   <td>  <?php echo $row['cid'] ;?>     </td>
                   </tr>
            <?php  } ?>


           

     
                  </tbody>
                 
                </table>
                  </div>
<li class="text-success">Save your file as a cvs file and upload</li>

</ol>


</div>
</div>
</div>

</div>
</div>

</div>
</div>
</section>
</div>
<script src="jquery-3.2.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

        $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
                $("#response").addClass("error");
                $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
 <script src="../../assets/bundles/datatables/datatables.min.js"></script>
  <script src="../../assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="../../assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>

  <script src="../../assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
  
  <script src="../../assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
</body>

</html>