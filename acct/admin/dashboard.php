<!DOCTYPE html>
<html lang="en">
 <?php include 'inc/session.php' ;?>
  <?php include '../conn.php' ;
  $active='dashboard';
  ;?>

<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $appname ?>|Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../assets/img/favicon.ico' />
</head>

<body  >
  <div class="loader"></div>
  <div id="app" <?php echo $dash ?>>
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php include 'inc/navbar.php' ;?>
   <?php include 'inc/sidebar.php';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Product count</h5>
                                <?php 
          
        $sql = "SELECT  COUNT(Pid) as products FROM products WHERE 	PdtLocation = '$curBranchId'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  


 ?>
                          <h2 class="mb-3 font-18"><?php echo $row['products'] ;}} ?></h2>
                          <p class="mb-0"><span class="col-green">Entered</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../img/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Stores</h5>
                             <?php 
          
        $sql = "SELECT  COUNT(shopId) as shops FROM `shop` WHERE Splocation = '$curBranchId'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  


 ?>
                          <h2 class="mb-3 font-18"><?php echo $row['shops'] ;}} ?></h2>
                          <p class="mb-0"><span class="col-green">Entered</span>
                           </p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../img/2.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"><?php echo date("Y-m-d"); ?></h5>
                             <?php 
          $today = date("Y-m-d");
        $sql = "SELECT *, SUM(TotalAmt) as amt1 FROM sale WHERE SDate = '$today' AND SaleLocation	= '$curBranchId' AND State ='Saved' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  


 ?>
                          <h3 class="mb-3 font-18"><?php echo formatMoney($row['amt1'], true); }}?>/-</h3>
                          <p class="mb-0"><span class="col-orange">Daily</span>Sales</p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../img/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Revenue</h5>
                            <?php 
          
        $sql = "SELECT *, SUM(TotalAmt) as amt FROM sale WHERE SaleLocation = '$curBranchId' AND State ='Saved' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  


 ?>
                          <h2 class="mb-3 font-18"><?php echo formatMoney($row['amt'], true); }}?>/-</h2>
                           <p class="mb-0"><span class="col-orange">Total</span> Amount</p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="../img/4.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                
                
                
      
                
              <div class="card ">
                <div class="card-header">
                  <h4>Monthly Sales chart</h4>
                  <div class="card-header-action">
                    <div class="dropdown">
                      <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                      <div class="dropdown-menu">
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                        <div class="dropdown-divider"></div>
                      </div>
                    </div>
                    <a href="#" class="btn btn-primary">View All</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                    
                    
                              
                <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
               
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#bar-chart" data-toggle="tab">bar chart</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#donut-chart" data-toggle="tab">Pie chart</a>
                    </li>
                    
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="bar-chart"
                       style="position: relative; height: 420px;">
                 <style>
          #chartdiv {
            width: 100%;
            height: 420px;
          }                                       
        </style>  
                  <div id="chartdiv"></div>       
              


      <?php 
          
        $sql = "SELECT *, Month as m, SUM(TotalAmt) as tt FROM sale WHERE SaleLocation = '$curBranchId' AND State ='Saved' GROUP BY Month ORDER BY `sale`.`Sid` ASC limit 12";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $data8[] = array('title'=>$row['m'], 'value'=>$row['tt']);
   $d = json_encode($data8);
}
}

 ?>
                        

      
                   </div>
                  <div class="chart tab-pane" id="donut-chart" style="position: relative; height: 420px;">
      <?php 
          
        $sql = "SELECT *, Month as m, SUM(TotalAmt) as tt FROM sale WHERE SaleLocation = '$curBranchId' AND State ='Saved' GROUP BY Month limit 12";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $data1[] = array('title'=>$row['m'], 'value'=>$row['tt']);
   $d1 = json_encode($data1);
}
}

 ?>
                   
 <div id="chart"></div> 
                   
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
                    
                    
                    
                    
                      <div class="row mb-0">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                                class="col-green"></i>
                                 <?php 
          $week = date("Y-F-W");
        $sql = "SELECT *, SUM(TotalAmt) as wamts FROM sale WHERE Week = '$week' AND SaleLocation = '$curBranchId' AND State ='Saved' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  


 ?>
                              <h5 class="m-b-0"><?php echo formatMoney($row['wamts'], true); }}?>/-</h5>
                              <p class="text-muted font-14 m-b-0">Weekly Earnings</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="arrow-down-circle"
                                class="col-orange"></i>
                                   <?php 
          $monthe = date("F-Y");
        $sql = "SELECT *, SUM(TotalAmt) as mamts FROM sale WHERE Month = '$monthe'AND SaleLocation = '$curBranchId' AND State ='Saved' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  


 ?>
                              <h5 class="m-b-0"> <?php echo formatMoney($row['mamts'], true); }}?>/-</h5>
                              <p class="text-muted font-14 m-b-0">Monthly Earnings</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <div class="list-inline text-center">
                            <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                                class="col-green"></i>
                                <?php 
          $ya = date("Y");
        $sql = "SELECT *, SUM(TotalAmt) as yamts FROM sale WHERE Year = '$ya' AND SaleLocation	= '$curBranchId' AND State ='Saved' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  


 ?>
                              <h5 class="m-b-0"><?php echo formatMoney($row['yamts'], true); }}?>/-</h5>
                              <p class="text-muted font-14 m-b-0">Yearly Earnings</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
        
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h4>Daily sales Chart</h4>
                </div>
                <div class="card-body">
                          <?php 
          
        $sql = "SELECT *, SDate as m, SUM(TotalAmt) as tt FROM sale WHERE SaleLocation = '$curBranchId' AND State ='Saved' GROUP BY SDate limit 7";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $data2[] = array('title'=>$row['m'], 'value'=>$row['tt']);
   $d2 = json_encode($data2);
}
}

 ?>
                  <div id="chart2" class="chartsh"></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h4>Weekly sales Chart</h4>
                </div>
                <div class="card-body">
                  <div class="summary">
                    <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                              <?php 
          
        $sql = "SELECT *, Week as m, SUM(TotalAmt) as tt FROM sale WHERE SaleLocation = '$curBranchId' AND State ='Saved' GROUP BY Week limit 4";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $data3[] = array('title'=>$row['m'], 'value'=>$row['tt']);
   $d3 = json_encode($data3);
}
}

 ?>
                      <div id="chart3" class="chartsh"></div>
                    </div>
                    <div data-tab-group="summary-tab" id="summary-text">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h4>Shop sales Chart</h4>
                </div>
                <div class="card-body">
                          <?php 
          
        $sql = "SELECT *, Sptype as m, SUM(TotalAmt) as tt FROM sale 
        LEFT JOIN products ON products.Pid= `sale`.`Item`
        LEFT JOIN shop ON shop.shopId = `products`.`shop`
        WHERE SaleLocation = '$curBranchId' AND State ='Saved'  GROUP BY shop.shopId ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $data4[] = array('title'=>$row['m'], 'value'=>$row['tt']);
   $d4 = json_encode($data4);
}
}

 ?>
                  <div id="chart4" class="chartsh"></div>
                </div>
              </div>
            </div>
          </div>
          
          
        </section>
         <?php include 'chart1.php';?>
      </div>
    <?php include 'inc/footer.php';?>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="../assets/js/app.min.js"></script>
  <!-- JS Libraies -->
 
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../assets/js/custom.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>