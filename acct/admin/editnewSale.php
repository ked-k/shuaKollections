     
        <div class="modal fade" id="edit_<?php echo $row['Sid'] ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Member</h4></center>
            </div>
       <div class="modal-body">
       
                      <form method="POST" action="update_sale" >
                <input type="hidden" class="form-control" name="scode" value="<?php echo $code ;?>" readonly >
                <input type="hidden" class="form-control" name="me" value="<?php echo $me ;?>" readonly >
                <input type="hidden" class="form-control" name="SaleLocation" value="<?php echo $curBranchId ;?>" readonly >
                         <div class="form-group">
                      <label>Product</label>
                     <select  class="form-control" name="item" id="ecountry" onchange="efill()" required >
                                            <option value="<?php echo $row['Item'] ;?>"><?php echo $row['PName'] ;?></option>
            
                                        </select>
                    </div>
                    
                       
                          <div class="row">
                      
                        <div class="col-md-4">
                              <div class="form-group">
                      <label>Quantity</label>
                     <input type="number" class="form-control" name="qty" value="<?php echo $row['Pcs'] ;?>" min="1" onchange="efill()" id="eqty" required placeholder="quantity" >
                    </div>
                    </div>
                    <div class="col-md-8">
                             <div class="form-group">
                      <label>Discount</label>
                     <input type="number" class="form-control" min="0" name="discount" value="<?php echo $row['discount'] ;?>" onchange="efill()" id="edis" required>
                    </div>
                  </div>
                  </div>
      
                         <div class="row">
                      
                        <div class="col-md-6">
                             <div class="form-group">
                      <label>Payment type</label>
                     <select required class="form-control" name="ptype" id="eptype" onchange='checkvalue(this.value)' required >
                                            
                                            <option value="Cash">Cash</option>
                                            <option value="Credit">Credit</option>
                                        </select>
                    </div>
                        </div>
                        <div class="col-md-6">
                                     <div class="form-group">
                      <label>AMOUNT</label>
                     <select required class="form-control" name="amount" id="eamt" onchange="efill()" required readonly >
                        <option value="<?php echo $row['Amount'] ;?>"><?php echo $row['Amount'] ;?></option>
                                            
                                           
                                        </select>
                    </div> 
                        </div>
                    </div>
                     <div class="form-group">
                      <label>Total Amount</label>
                 <input type="number" class="form-control" name="total" value="<?php echo $row['TotalAmt'] ;?> "  id="etamt" readonly required>
                 </div>
                  <button type="submit" class="btn btn-success">Submit</button>
                  
                  </form>
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
            </form>
            </div>

        </div>
    </div>
</div>