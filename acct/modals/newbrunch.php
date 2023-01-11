     <div class="modal fade" id="exampleModalB" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">New branch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" method="POST" action="addbranch">
                    <div class="form-group">
                    <label>Brunch name</label>
                    <div class="input-group">                    
                      <input type="text" class="form-control" placeholder="brunch name" name="bname" required="">
                    </div>
                  </div>
                 

                      <div class="form-group">
                    <label>Brunch location</label>
                    <div class="input-group">                    
                      <input type="text" class="form-control" placeholder="brunch region" name="blocation" required="">
                    </div>
                  </div>
           
                 
                  <button type="submit" class="btn btn-primary m-t-15 float-right waves-effect">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>