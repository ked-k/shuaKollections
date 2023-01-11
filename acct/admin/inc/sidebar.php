
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"> <img alt="image" src="../img/icons/fav.png" class="header-logo" /> <span
                class="logo-name" style="font-size:14px"><?php echo $appname ?></span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header"><?php echo $_SESSION['locationName'] ?></li>
            <li class="dropdown <?php if($active=='dashboard') echo "active text-info-all"; ?>" <?php echo $dash ?>>
              <a href="dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            
               <li class="dropdown <?php if($active=='msales') echo "active"; ?>">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fa fa-shopping-cart "></i><span>Manage sales</span></a>
              <ul class="dropdown-menu">
                   
                 <li <?php if($active2=='newsale') echo 'class="active"'; ?>>
                  <a href="newsale?scode=<?php echo ("S-".uniqid().rand(100,900).time() ); ?>">New sale</a></li> 
                  <li <?php if($active2=='newinvoice') echo 'class="active"'; ?>>
                  <a href="newinvoice?scode=<?php echo ("Inv-".uniqid().rand(100,900).time() ); ?>">New invoice</a></li> 
                <li <?php if($active2=='draftsales') echo 'class="active"'; ?>>
                  <a href="draftsales">Sales History</a></li>
                <li <?php if($active2=='donesales') echo 'class="active"'; ?>>
                  <a href="donesales" ><span>Confirmed sales</span></a> </li>
              </ul>
            </li>
         
               <li class="dropdown <?php if($active=='mlocations') echo "active"; ?>"  <?php echo $view ?>>
              <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fa fa-university "></i><span>Manage Branches</span></a>
              <ul class="dropdown-menu">
                <!-- <li><a href="shops">Shops</a></li> -->
                <li <?php if($active2=='locations') echo 'class="active"'; ?>><a href="locations" ><span>Branch/Locations</span></a> </li>
              </ul>
            </li>
         
         
               <li class="dropdown <?php if($active=='mproducts') echo "active"; ?>">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fa fa-boxes"></i><span>Manage Products</span></a>
              <ul class="dropdown-menu">
                <li <?php if($active2=='products') echo 'class="active"'; ?> ><a href="products" ><span>Product List</span></a> </li>
                <li <?php if($active2=='newproduct') echo 'class="active"'; ?>><a href="newproduct">New product</a></li>              
                
              </ul>
            </li>
     
             <li class="dropdown <?php if($active=='mstock') echo "active"; ?>">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fa fa-bars"></i><span>Manage Stock</span></a>
              <ul class="dropdown-menu">
                <li <?php if($active2=='newstock') echo 'class="active"'; ?> >
                  <a href="newstock?scode=<?php echo ("Stk-".uniqid().rand(100,900).time() ); ?>" ><span>New Stock</span></a> </li>
                  <li <?php if($active2=='stock') echo 'class="active"'; ?> ><a href="stock" ><span>Stock levels</span></a> </li>
                <li <?php if($active2=='draftstock') echo 'class="active"'; ?> ><a href="draftstock">Draft stock purcases</a></li>
                <li <?php if($active2=='confirmedstock') echo 'class="active"'; ?> ><a href="confirmedstock" ><span>Confirmed stock purcases</span></a> </li>
                
              </ul>
            </li>

               <li class="dropdown <?php if($active=='mcustomers') echo "active"; ?>">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i class="
fas fa-user-friends"></i><span>Customers & Suppliers</span></a>
              <ul class="dropdown-menu">
                  <li <?php if($active2=='customers') echo 'class="active"'; ?>><a href="customers" ><span>customers</span></a> </li>
                <li <?php if($active2=='suppliers') echo 'class="active"'; ?>><a href="suppliers">Suppliers</a></li>
               
                
              </ul>
            </li>

             <li class="dropdown <?php if($active=='expenses') echo "active"; ?>" <?php echo $view ?>>
              <a href="expenses" class="nav-link"><i class="fa fa-money-bill"></i><span>Expenses</span></a>
            </li>

             <li class="dropdown <?php if($active=='reports') echo "active"; ?>" <?php echo $view ?>>
              <a href="reports" class="nav-link"><i class="fas fa-file-pdf"></i><span>Reports</span></a>
            </li>
           <li class="dropdown <?php if($active=='users') echo "active"; ?>" <?php echo $view ?>>
              <a href="users" class="nav-link"><i class="fa fa-users"></i><span>Users</span></a>
            </li>
             <li class="dropdown <?php if($active=='departments') echo "active"; ?>" >
              <a href="Departments" class="nav-link"><i class="fa fa-building"></i><span>Departments</span></a>
            </li>
          <li class="dropdown <?php if($active=='categories') echo "active"; ?>">
              <a href="categories" class="nav-link"><i class="fa fa-sitemap"></i><span>Categories</span></a>
            </li>

          <li class="dropdown">
              <a href="#" class="nav-link"><i class="fa fa-list-alt"></i><span>Documentation</span></a>
            </li>
          <!--     <li class="dropdown">
              <a href="subcategory" class="nav-link"><i class="fa fa-list-alt"></i><span>sub categories</span></a>
            </li> -->
           
      
    
      
          </ul>
        </aside>
      </div>

