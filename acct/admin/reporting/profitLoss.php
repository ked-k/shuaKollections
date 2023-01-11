
    <!--  --------------------------------------------- -->

                          <div class="tab-pane fade" id="profitLoss" role="tabpanel"
                            aria-labelledby="list-settings-list">
                            <h5>Profit Loss</h5>
     <form method="POST" action="reportProfitLoss">
                                <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                      <label>From</label>
                      <input type="date" name="from" class="form-control" required="">
                    </div>
                              </div>
                                  <div class="col-md-6">
                                <div class="form-group">
                      <label>To</label>
                      <input type="date" name="to" class="form-control" required="">
                    </div>
                              </div>
                                   

                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-file"></i> Show report</button>
                          </form>
                          </div>