<?php

	
if (isset($_POST['save'])) {
    	if(ISSET($_POST['item'])){
            include '../config.php' ;
 try {  
extract($_POST);	    
$scode = $_POST['scode'];
$today = date('Y-m-d');

$sql = "INSERT INTO `confirmedsales`(`SaleCode`, `TotalAmt`, `Customer`, `PaidAmt`, `Balance`, `DateConfirmed`, `SBlocation`, `User`) VALUES ('$scode','$toto', '$customer', '$paid', '$balance', '$today', '$SaleLocation','$me')";
$sq2 = "UPDATE `sale` SET State = 'Saved', Updateby ='$me' WHERE Scode = '$scode' AND SaleLocation ='$SaleLocation' ";
$stmt = $db->prepare($sql);
$stmt->execute();
if($stmt->rowCount() > 0)
{
  
echo '<script language="javascript">';
echo 'alert("Sale Successfully Added,!")';
echo '</script>';
echo '<meta http-equiv="refresh" content="0;url=newsale?scode='.("S-".uniqid().time().date("Ymd") ).'" />';
 
}
} catch (PDOException $e) {
    echo '<script language="javascript">';
                                        echo 'alert("Proccessed SvO2! '.$er.'")';
                                        echo '</script>';
                                        echo '<meta http-equiv="refresh" content="0;url=newsale?scode='.("S-".uniqid().time().date("Ymd") ).'" />';
    
  } 
}


		
	
} 
else if (isset($_POST['sprnt'])) {

    if(ISSET($_POST['item'])){
        include '../config.php' ;
try {  
extract($_POST);	    
$scode = $_POST['scode'];
$today = date('Y-m-d');

$sql = "INSERT INTO `confirmedsales`(`SaleCode`, `TotalAmt`, `Customer`, `PaidAmt`, `Balance`, `DateConfirmed`, `SBlocation`, `User`) VALUES ('$scode','$toto', '$customer', '$paid', '$balance', '$today', '$SaleLocation','$me')";
$sq2 = "UPDATE `sale` SET State = 'Saved', Updateby ='$me' WHERE Scode = '$scode' AND SaleLocation ='$SaleLocation' ";
$stmt = $db->prepare($sql);
$stmt->execute();
if($stmt->rowCount() > 0)
{

echo '<script language="javascript">';
echo 'alert("Sale Successfully Added,!")';
echo '</script>';
echo '<meta http-equiv="refresh" content="0;url=newsale?scode='.("S-".uniqid().time().date("Ymd") ).'" />';

}
} catch (PDOException $e) {
echo '<script language="javascript">';
                                    echo 'alert("Proccessed SvO2! '.$er.'")';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=newsale?scode='.("S-".uniqid().time().date("Ymd") ).'" />';

} 
}


}

else {

  echo '<meta http-equiv="refresh" content="0;url=newsale?scode='.("S-".uniqid().time().date("Ymd") ).'" />';
 }
?>