<?php include '../inc/session.php' ;?>
<?php
use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

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

             $cprice = "";
            if (isset($column[3])) {
                $cprice = mysqli_real_escape_string($conn, $column[3]);
            }
             $saleprice = "";
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
                $gencode = rand(8,9).rand(9,1000).rand(20,90).rand(91,100).rand(1001,5000) ;
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
            $subcart = "1";
            if (isset($column[10])) {
                $subcart = mysqli_real_escape_string($conn, $column[10]);
            }
                        
             $shop = "1";
            if (isset($column[11])) {
                $shop = mysqli_real_escape_string($conn, $column[11]);
            }
           
           
            $sqlInsert = "INSERT INTO `products`( `PName`, `PCode`, GnCode, `PDepartment`, `PCategory`, `Subcat`,  `UOM`, `Costprice`, `RRPrice`, `pcolor`, `markup`,  `Description`, QtyLeft, shop, PdtLocation, Uptime)
                   values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $paramType = "sssiiissssssiiis";
            $paramArray = array(
                $product,
                $code,
                $gencode,
                $dpt,
                $cart,
                $subcart,
                $uom,
                $cprice,
                $saleprice,
                $color,
                $mak,
                $des,
                $QtyLeft,
                $shop,
                $brunch,
                $uploadTime
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (! empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
<script src="jquery-3.2.1.min.js"></script>

<style>
body {
    font-family: Arial;
   
}

.outer-scontainer {
    background: #F0F0F0;
    border: #e0dfdf 1px solid;
    padding: 20px;
    border-radius: 2px;
}

.input-row {
    margin-top: 0px;
    margin-bottom: 20px;
}

.btn-submit {
    background: #333;
    border: #1d1d1d 1px solid;
    color: #f0f0f0;
    font-size: 0.9em;
    width: 100px;
    border-radius: 2px;
    cursor: pointer;
}

.outer-scontainer table {
    border-collapse: collapse;
    width: 100%;
}

.outer-scontainer th {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

.outer-scontainer td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

#response {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 2px;
    display: none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>
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
</head>

<body>
    <h2>Import CSV file into Mysql using PHP</h2>

    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
        </div>
    <div class="outer-scontainer">
        <div class="row">

            <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Choose CSV
                        File</label> <input type="file" name="file"
                        id="file" accept=".csv">
                        <input type="hidden" name="uptime" value="<?php echo time().rand(1,9);?>">
                    <button type="submit" id="submit" name="import"
                        class="btn-submit">Import</button>
                    <br />

                </div>

            </form>

        </div>
               <?php
            $sqlSelect = "SELECT * FROM `products` WHERE Uptime = '$uploadTime' ";
            $result = $db->select($sqlSelect);
            if (! empty($result)) {
                ?>
            <table id='userTable'>
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
                
                foreach ($result as $row) {
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
                    <?php
                }
                ?>
                </tbody>
        </table>
        <?php } ?>
    </div>

</body>

</html>