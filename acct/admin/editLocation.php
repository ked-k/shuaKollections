      <div class="dropdown-menu">
                           <div class="dropdown-title">Edit <?php echo $row['name'] ;?></div>
                         <div style="padding: 5px;">
                   <form class="" method="POST" action="">
                    <div class="form-group">
                    <label>Brunch name</label>
                    <div class="input-group">     
                    <input type="hidden" name="LcId" value="<?php echo $row['Lid'] ;?>">               
                      <input type="text" class="form-control" value="<?php echo $row['name'] ;?>" name="bname" required="">
                    </div>
                  </div>
                      <div class="form-group">
                    <label>Brunch location</label>
                    <div class="input-group">                    
                      <input type="text" class="form-control" value="<?php echo $row['region'] ;?>" name="blocation" required="">
                    </div>
                  </div>
           
                 
                  <button type="submit" class="btn btn-primary m-t-15 float-right waves-effect">Save</button>
                </form>
              </div>
                      </div>