      <div class="dropdown-menu dropleft">
                           <div class="dropdown-title">Edit <?php echo $row['PName'] ;?> Stock Level </div>
                         <div style="padding: 5px;">
                <form class="" method="POST" action="">
                    <div class="form-group">
                    <label>Enter stock Qty</label>
                    <div class="input-group">
                    <input type="hidden" name="upPsid" value="<?php echo $row['Pid'] ;?>">                  
                      <input type="text" class="form-control" value="0" name="stock" required="">
                    </div>
                  </div>                 
                  <button type="submit" onclick="return confirm('Are you sure you want to replace <?php echo $row['PName'] ;?> current stock value?');" class="btn btn-primary m-t-15 float-right waves-effect">Update</button>
                </form>
              </div>
                      </div>