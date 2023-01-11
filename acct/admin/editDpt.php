      <div class="dropdown-menu">
                           <div class="dropdown-title">Edit <?php echo $row['DepartmentName'] ;?> </div>
                         <div style="padding: 5px;">
                <form class="" method="POST" action="">
                    <div class="form-group">
                    <label>Department Name</label>
                    <div class="input-group">
                    <input type="hidden" name="upDid" value="<?php echo $row['id'] ;?>">                  
                      <input type="text" class="form-control" value="<?php echo $row['DepartmentName'] ;?>" name="departmentname" required="">
                    </div>
                  </div>                 
                  <button type="submit" class="btn btn-primary m-t-15 float-right waves-effect">Update</button>
                </form>
              </div>
                      </div>