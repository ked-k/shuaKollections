  <footer class="main-footer">
        <div class="footer-left">Made with <i  class="fas fa-heart"></i> by
          <a target="_blanck" href="https://ripontechug.com/">Ripon Techologies Ug Ltd</a>
        </div>
        <div class="footer-right">
            V1 <a target="_blanck" href="https://ked.ripontechug.com/">@ked</a> 
        </div>
      </footer>
           <div class="modal fade" id="exampleModalEB" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">New branch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="POST" action="">
                    <div class="form-group">
                    <label>Brunch name</label>
                    <div class="input-group">                    
                      <input type="text" class="form-control" value="<?php echo $_SESSION['locationName']?>" name="bname" required="">
                    </div>
                  </div>
                 

                      <div class="form-group">
                    <label>Brunch location</label>
                    <div class="input-group">                    
                      <input type="text" class="form-control" value="<?php echo $_SESSION['locationRegion']?>" name="blocation" required="">
                       <input type="hidden" class="form-control" value="updatebrunch" name="updatebrunch" required="">
                    </div>
                  </div>
           
                 
                  <button type="submit" class="btn btn-primary m-t-15 float-right waves-effect">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        
               <div class="modal fade hide" id="modal-smN">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title text-center text-warning">PAYMENT REMINDER</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Hi Shua Kollections,<br>
Domain and Hosting is Due for Renewal on January 12th, 2023.  

<b>Important: At the expiry date, if the domain/hosting has not been renewed, you will lose access to it and any services or products attached to it will cease to work.</b>
Again, please reach out if you have any questions on this payment. Otherwise, please organize for settlement to avoide any further inconviniance.
<br>
Kind regards,
Ripon Tech Ug Ltd
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
            </div>
          </div>
        </div>
      </div>
  <script type="text/javascript">
    window.onload = function () {
        OpenBootstrapPopup();
    };
    function OpenBootstrapPopup() {
        $("#modal-smN").modal('show');
    }
</script>
        
        <?php
 include '../config.php' ;
if(isset($_POST['updatebrunch'])) {


 
if(isset($_POST['blocation'])) {
    $me = $_SESSION['uid'];
    $lid = $_SESSION['locationid'];
$blocation = trim($_POST['blocation']);
$bname = trim($_POST['bname']);

    try {

 $sql = "UPDATE `Location` SET `AddBy` = '$me', name ='$bname', region ='$blocation' WHERE `Location`.`Lid` = '$lid'";
  $stmt = $db->prepare($sql);
  $stmt->execute();
if($stmt->rowCount() > 0)
 {
	
 echo '<script language="javascript">';
                                        echo 'alert("Details were successfully updated, changes will take effect after you logout of this branch!")';
                                        echo '</script>';
                                    
   
}
    	
      
      
    } catch (PDOException $e) {
      echo '<script language="javascript">';
                                        echo 'alert("Errror, Something went wrong!'.$e->getMessage().'")';
                                        echo '</script>';
                                        echo "<script type='text/javascript'>window.history.go(-1);</script>";
    } 
}

}?>
        
        
      <!--
		<script>
    
    (function (global) {
	if(typeof (global) === "undefined")
	{
		throw new Error("window is undefined");
	}
    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";
		// making sure we have the fruit available for juice....
		// 50 milliseconds for just once do not cost much (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };	
	// Earlier we had setInerval here....
    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };
    global.onload = function () {        
		noBackPlease();
		// disables backspace on page except on input fields and textarea..
		document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            
            e.stopPropagation();
        };		
    };
})(window);
</script>
-->