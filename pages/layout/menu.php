<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="../../images/avatar.png">
          </div>
          <div class="user-name">
          <?php
                echo $_SESSION['username'];
              ?>
          </div>
          <div class="user-designation">
              
          </div>
        </div>
        <ul class="nav">
          
          <li class="nav-item">
            <a class="nav-link" href="../../pages/user/ListUser.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/product/ListProduct.php">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Products</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/category/ListCategory.php">
              <i class="icon-stack menu-icon"></i>
              <span class="menu-title">Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/news/ListNews.php">
              <i class="icon-bell menu-icon"></i>
              <span class="menu-title">News</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/tables/basic-table.html">
              <i class="icon-command menu-icon"></i>
              <span class="menu-title">New</span>
            </a>
          </li>
        </ul>
      </nav>
