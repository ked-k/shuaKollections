  
    <?php
            function formatMoney($number, $fractional=false) {
              if ($fractional) {
                $number = sprintf('%.2f', $number);
              }
              while (true) {
                $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                if ($replaced != $number) {
                  $number = $replaced;
                } else {
                  break;
                }
              }
              return $number;
            }
            ?>
  <?php include '../config.php' ;?>
 <?php

include('../bcode/src/BarcodeGenerator.php');
include('../bcode/src/BarcodeGeneratorPNG.php');
include('../bcode/src/BarcodeGeneratorSVG.php');
include('../bcode/src/BarcodeGeneratorHTML.php');

$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
$generatorSVG = new Picqer\Barcode\BarcodeGeneratorSVG();
$generatorHTML = new Picqer\Barcode\BarcodeGeneratorHTML();

// echo $generatorHTML->getBarcode('081231723897', $generatorPNG::TYPE_CODE_128);
// echo $generatorSVG->getBarcode('081231723897', $generatorPNG::TYPE_EAN_13);

?>
 <link rel="stylesheet" href="../assets/css/app.min.css">
  <link rel="stylesheet" href="../assets/bundles/chocolat/dist/css/chocolat.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../assets/img/favicon.ico' />
 
  <table width="100%">
               <?php 
 $pid = $_GET['pid'];
$result = $db->prepare(" SELECT * FROM `products` WHERE  Pid = '$pid' ");
  $result->execute();
                            $cn=1;
                            for($i=0; $row = $result->fetch(); $i++){
                              $cnt=1+$i; 

 ?>

    <tr>
      <td>
 <div class="card card-primary">

                  <h4 style="text-align: center;"><?php echo $row['PName'].' '.$row['UOM'] ;?></h4>
                  <div class="card-body text-center">
                    <h3><?php echo formatMoney($row['RRPrice']) ;?><h3> 
                    <?php echo '<img width="80%" src="data:image/png;base64,' . base64_encode($generatorPNG->getBarcode($row['GnCode'], $generatorPNG::TYPE_CODE_128)) . '">'; ?>
                    <h5><?php echo $row['GnCode'] ;?></h5>
                  </div>
                </div>

         </td>
                 <td>
 <div class="card card-primary">

                  <h4 style="text-align: center;"><?php echo $row['PName'].' '.$row['UOM'] ;?></h4>
                  <div class="card-body text-center">
                    <h3><?php echo formatMoney($row['RRPrice']) ;?><h3> 
                    <?php echo '<img width="80%" src="data:image/png;base64,' . base64_encode($generatorPNG->getBarcode($row['GnCode'], $generatorPNG::TYPE_CODE_128)) . '">'; ?>
                    <h5><?php echo $row['GnCode'] ;?></h5>
                  </div>
                </div>

         </td>
                <td>
 <div class="card card-primary">

                  <h4 style="text-align: center;"><?php echo $row['PName'].' '.$row['UOM'] ;?></h4>
                  <div class="card-body text-center">
                    <h3><?php echo formatMoney($row['RRPrice']) ;?><h3> 
                    <?php echo '<img width="80%" src="data:image/png;base64,' . base64_encode($generatorPNG->getBarcode($row['GnCode'], $generatorPNG::TYPE_CODE_128)) . '">'; ?>
                    <h5><?php echo $row['GnCode'] ;?></h5>
                  </div>
                </div>

         </td>
       </tr>
     <?php } ?>
     </table>
     </table>



    <script src="../assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="../assets/bundles/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="../assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../assets/js/custom.js"></script>