
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="../assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Sales</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            
                  <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fa fa-boxes"></i></i><span>Manage sales</span></a>
              <ul class="dropdown-menu">
                 <li><a href="newsale?scode=<?php echo ("S-".uniqid().rand(100,900).time() ); ?>">New sale</a></li> 
                <li><a href="draftsales">Drafts sales</a></li>
                <li><a href="donesales" ><span>Confirmed sales</span></a> </li>
              </ul>
            </li>
         
               <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fa fa-boxes"></i></i><span>Manage stock</span></a>
              <ul class="dropdown-menu">
                  <li><a href="stock" ><span>View stock</span></a> </li>
                <li><a href="stockrequests">Stock requests</a></li>
                <li><a href="Approvedrequests">Approved Stock request</a></li>
              </ul>
            </li>
         
         
               <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fa fa-boxes"></i></i><span>Manage Products</span></a>
              <ul class="dropdown-menu">
                <li><a href="newproduct">New product</a></li>
                <li><a href="products" ><span>Product List</span></a> </li>
              </ul>
            </li>
     
           <!--<li class="dropdown">-->
           <!--   <a href="users" class="nav-link"><i class="fa fa-users"></i><span>Users</span></a>-->
           <!-- </li>-->
           <!--            <li class="dropdown">-->
           <!--   <a href="Departments" class="nav-link"><i class="fa fa-building"></i><span>Departments</span></a>-->
           <!-- </li>-->
           <!--          <li class="dropdown">-->
           <!--   <a href="categories" class="nav-link"><i class="fa fa-sitemap"></i><span>Categories</span></a>-->
           <!-- </li>-->
           <!--   <li class="dropdown">-->
           <!--   <a href="subcategory" class="nav-link"><i class="fa fa-list-alt"></i><span>sub categories</span></a>-->
           <!-- </li>-->
           
      
    
      
          </ul>
        </aside>
      </div>