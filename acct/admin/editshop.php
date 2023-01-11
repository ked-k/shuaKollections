      <div class="dropdown-menu">
                           <div class="dropdown-title">Edit <?php echo $row['Spname'] ;?></div>
                         <div style="padding: 5px;">
                  <form class="" method="POST" action="">
                    <div class="form-group">
                    <label>Shop name</label>
                    <div class="input-group"> 
                    <input type="hidden" name="ShpId" value="<?php echo $row['shopId'] ;?>">                   
                      <input type="text" class="form-control" value="<?php echo $row['Spname'] ;?>" name="spname" required="">
                    </div>
                  </div>
                 

                     <div class="form-group">
                    <label>Type</label>
                    <div class="input-group">
                    
                      <select class="form-control" name="type" readonly>
                        <option value="<?php echo $row['Sptype'];?>"><?php echo $row['Sptype'];?></option>
                        <option value="Retail">Retail</option>
                        <option value="Whole sale">Whole sale</option>
                      </select>
                    </div>
                  </div>
                 <div class="form-group">
                    <label>Location/brunch</label>
                    <div class="input-group">
                    
                      <select class="form-control" name="brunch" required readonly>
                        <option value="<?php echo $_SESSION['locationid']?>"><?php echo $_SESSION['locationName']?></option>
                      </select>
                    </div>
                  </div>
                 
                  <button type="submit" class="btn btn-primary m-t-15 float-right waves-effect">Save</button>
                </form>
              </div>
                      </div>