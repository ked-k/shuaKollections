      <div class="dropdown-menu dropleft">
                           <div class="dropdown-title">Edit <strong><?php echo $row['PName'] ;?></strong> Stock Qty</div>
                         <div style="padding: 5px;">
                <form class="" method="POST" action="">
                    <div class="form-group">
                    <label>Enter stock Qty</label>
                    <div class="input-group">
                    <input type="hidden" name="Estkid" value="<?php echo $row['Sid'] ;?>">                  
                      <input type="number" id="stqty" class="form-control" value="<?php echo $row['Stock'] ;?>" name="stkqty" required="" min="1">
                    </div>
                    <label>Amount</label>
                    <div class="input-group">                  
                      <input type="number" id="stamt" class="form-control" value="<?php echo $row['Unitcost'] ;?>" name="stkucost" required="" readonly >
                    </div>
                  </div>                 
                  <button type="submit" formaction="" onclick="return confirm('Are you sure you want to replace <?php echo $row['PName'] ;?> current stock value?');" class="btn btn-primary m-t-15 float-right waves-effect">Update</button>
                </form>
              </div>
                      </div>