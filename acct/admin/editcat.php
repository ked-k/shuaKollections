      <div class="dropdown-menu">
                           <div class="dropdown-title">Edit <?php echo $row['CategoryName'] ;?> </div>
                         <div style="padding: 5px;">
                <form class="" method="POST" action="">
                    <div class="form-group">
                    <label>Category Name</label>
                    <div class="input-group">
                    <input type="hidden" name="upCid" value="<?php echo $row['cid'] ;?>">                  
                      <input type="text" class="form-control" value="<?php echo $row['CategoryName'] ;?>" name="cattname" required="">
                    </div>
                  </div>                 
                  <button type="submit" class="btn btn-primary m-t-15 float-right waves-effect">Update</button>
                </form>
              </div>
                      </div>