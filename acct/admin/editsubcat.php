      <div class="dropdown-menu">
                           <div class="dropdown-title">Edit <?php echo $row['subcategoryname'] ;?> </div>
                         <div style="padding: 5px;">
                <form class="" method="POST" action="">
                    <div class="form-group">
                    <label>Sub-Category Name</label>
                    <div class="input-group">
                    <input type="hidden" name="upSid" value="<?php echo $row['sid'] ;?>">                  
                      <input type="text" class="form-control" value="<?php echo $row['subcategoryname'] ;?> " name="subcattname" required="">
                    </div>
                  </div>                 
                  <button type="submit" class="btn btn-primary m-t-15 float-right waves-effect">Update</button>
                </form>
              </div>
                      </div>