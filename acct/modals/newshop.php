     <div class="modal fade" id="exampleModalS" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">New shop</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="POST" action="
                addshop">
                    <div class="form-group">
                    <label>Shop name</label>
                    <div class="input-group">                    
                      <input type="text" class="form-control" placeholder="shop name" name="spname" required="">
                    </div>
                  </div>
                 

                     <div class="form-group">
                    <label>Type</label>
                    <div class="input-group">
                    
                      <select class="form-control" name="type">
                        <option value="Retail">Retail</option>
                        <option value="Whole sale">Whole sale</option>
                      </select>
                    </div>
                  </div>
                 <div class="form-group">
                    <label>Location/brunch</label>
                    <div class="input-group">
                    
                      <select class="form-control" name="brunch" required>
                        <option value="<?php echo $_SESSION['locationid']?>"><?php echo $_SESSION['locationName']?></option>
                      </select>
                    </div>
                  </div>
                 
                  <button type="submit" class="btn btn-primary m-t-15 float-right waves-effect">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>