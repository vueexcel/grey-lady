

<!-- sidebar: style can be found in sidebar.less -->
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 343px;"><section class="sidebar" style="overflow: hidden; width: auto; height: 343px;">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li><a href="/dashboard"><i class="fa fa-circle-o"></i>Dashboard</a></li>
        <li class="treeview active">
          <a href="/explore">
            <i class="fa fa-check-circle-o"></i>
            <span>Favorites</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/explore/favorites/zips"><i class="fa fa-circle-o"></i>Zips</a></li>
            <li><a href="/explore/favorites/listings"><i class="fa fa-circle-o"></i>Listings</a></li>
          </ul>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-paper-plane"></i>
            <span>Setup & Docs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/getting-started"><i class="fa fa-circle-o"></i>Getting Started</a></li>
            <li><a href="/plugin/latest"><i class="fa fa-circle-o"></i>Plugin Releases</a></li>
            <li><a href="/plugin/instructions"><i class="fa fa-circle-o"></i>Plugin Download Instructions</a></li>
            @role('admin')
            <li><a target=_Blank href="https://github.com/MatthewBarba/greylady-app/issues"><i class="fa fa-circle-o"></i>Report a bug</a></li>
            @endrole
          </ul>
        </li>
        @role('admin')
          <li class="treeview active">
            <a href="/explore">
              <i class="fa fa-th"></i>
              <span>Explore</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/explore"><i class="fa fa-circle-o"></i>Explore all Zips</a></li>
              <li><a href="/explore?stateAbbreviation=ME"><i class="fa fa-circle-o"></i>Maine</a></li>
              <li><a href="/explore?stateAbbreviation=NH"><i class="fa fa-circle-o"></i>New Hampshire</a></li>
              <li><a href="/explore?stateAbbreviation=VT"><i class="fa fa-circle-o"></i>Vermont</a></li>
              <li><a href="/explore?stateAbbreviation=MA"><i class="fa fa-circle-o"></i>Massachusetts</a></li>
              <li><a href="/explore?town=worcester"><i class="fa fa-circle-o"></i>Worcester, MA</a></li>
              <li><a href="/explore?town=Boston"><i class="fa fa-circle-o"></i>Boston, MA</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class=""></i>
              <span>Admin</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a target=_Blank href="https://my.apify.com/"><i class="fa fa-circle-o"></i>Apify Dashboard</a></li>
              <li><a target=_Blank href="https://drive.google.com/drive/u/1/folders/1J6VbLYVkZNQegBFvPA6FnjT2WRyROlAt"><i class="fa fa-circle-o"></i>Google Drive Folder</a></li>
              <li><a target=_Blank href="https://papertrailapp.com/systems/greyladyapp/events"><i class="fa fa-circle-o"></i>Hosted Logs</a></li>
              <li><a target=_Blank href="/admin/"><i class="fa fa-circle-o"></i>Admin Panel</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class=""></i>
              <span>CRUD Views</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="../listings"><i class="fa fa-circle-o"></i>Listings Index</a></li>
              <li><a href="../zips"><i class="fa fa-circle-o"></i>Zips Index</a></li>
              <li><a href="../watchlist"><i class="fa fa-circle-o"></i>Watchlists Index</a></li>
            </ul>
          </li>
        @endrole
        
      </ul>
    </section><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: -178.375px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 119.319px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
    <!-- /.sidebar -->