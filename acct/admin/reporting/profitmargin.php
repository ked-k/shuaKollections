
    <!--  --------------------------------------------- -->

                          <div class="tab-pane fade" id="profitmargin" role="tabpanel"
                            aria-labelledby="list-settings-list">
                            <h5>Profit & margin</h5>
     <form method="POST" action="reportProfitMarginsales">
                                <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                      <label>From</label>
                      <input type="date" name="from" class="form-control" required="">
                    </div>
                              </div>
                                  <div class="col-md-6">
                                <div class="form-group">
                      <label>To</label>
                      <input type="date" name="to" class="form-control" required="">
                    </div>
                              </div>
                                    <div class="col-md-12">
                        <div >
                          <label>Select Product</label>
                          <select class="form-control select2" name="product" style="width:100%;">
                            <option value="">All products</option>
                                                <?php 
      $query = " SELECT * FROM `products` 
LEFT JOIN shop ON shop.shopId = `products`.`shop`
WHERE PdtLocation = '$curBranchId' ";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();      
      if($count >= 1 ) {
    $cn=1;
                            for($i=0; $row= $stmt->fetch(PDO::FETCH_ASSOC); $i++){
                              $cnt=1+$i;

 ?>
                                ?>
       <option value="<?php echo $row['Pid'] ;?>"><?php echo $row['PName']; ?></option>
     <?php }} ?>
                          </select>
                        </div>                        
                      </div>
                          <div class="col-md-6">
                        <div class="form-group">
                          <label>Select User</label>
                          <select class="form-control select2" name="user" style="width:100%;">
                            <option value="">All users</option>
                                                <?php 
      $query = "SELECT * FROM `users` ";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();      
      if($count >= 1 ) {
    $cn=1;
                            for($i=0; $row= $stmt->fetch(PDO::FETCH_ASSOC); $i++){
                              $cnt=1+$i;

 ?>
                                ?>
                                <option value="<?php echo $row['Id']; ?>"><?php echo $row["Uname"]; ?></option>
                             <?php }} ?>
                          </select>
                        </div>                        
                      </div>



      <div class="col-md-6">
                         <div class="form-group">
                      <label>Shop type</label>
                     <select  class="form-control" name="shop">
                                            <option value="">All</option>
                                                                        <?php 
      $brunch = $_SESSION['locationid'];
      $query = "SELECT * FROM `shop` WHERE Splocation = '$brunch' ";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $count = $stmt->rowCount();      
      if($count >= 1 ) {
    $cn=1;
                            for($i=0; $row= $stmt->fetch(PDO::FETCH_ASSOC); $i++){
                              $cnt=1+$i;

 ?>
                                ?>
                                <option value="<?php echo $row['shopId']; ?>"><?php echo $row["Sptype"]; ?></option>
                             <?php }} ?>
                                            

              
                                        </select>
                    </div>                        
                      </div>

                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-file"></i> Show report</button>
                          </form>
                          </div>