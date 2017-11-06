<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{URL::asset('img/ami.jpg')}}" class="img-circle" alt="User Image" height="160" width="160">
        </div>
        <div class="pull-left info">
          <p>Rumman</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{route('admin.index')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="layout/top-nav.php"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="layout/boxed.php"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="layout/fixed.php"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="layout/collapsed-sidebar.php"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>-->
        <!--<li>
          <a href="widgets.php">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>-->
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="charts/chartjs.php"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="charts/morris.php"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="charts/flot.php"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="charts/inline.php"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>-->
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="UI/general.php"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="UI/icons.php"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="UI/buttons.php"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="UI/sliders.php"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="UI/timeline.php"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="UI/modals.php"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>-->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Post</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('posts.create')}}"><i class="fa fa-circle-o"></i> Add Posts</a></li>
            <li><a href="{{route('posts.index')}}"><i class="fa fa-circle-o"></i> Show Posts</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('categories.create')}}"><i class="fa fa-circle-o"></i> Add Categories</a></li>
            <li><a href="{{route('categories.index')}}"><i class="fa fa-circle-o"></i> Show Categories</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Tag</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('tags.create')}}"><i class="fa fa-circle-o"></i> Add Tags</a></li>
            <li><a href="{{route('tags.index')}}"><i class="fa fa-circle-o"></i> Show Tags</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Featured Block</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('featuredblocks.create')}}"><i class="fa fa-circle-o"></i> Add Featured Block</a></li>
            <li><a href="{{route('featuredblocks.index')}}"><i class="fa fa-circle-o"></i> Show Featured Block</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Featured Item Left</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('fi.ftlhead')}}"><i class="fa fa-circle-o"></i>FeaturedItem Left Heading</a></li>
            <li><a href="{{route('featureditemsleft.create')}}"><i class="fa fa-circle-o"></i> Add FeaturedItem Left</a></li>
            <li><a href="{{route('featureditemsleft.index')}}"><i class="fa fa-circle-o"></i> Show FeaturedItem Left</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Featured Item Right</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="{{route('fi.ftrhead')}}"><i class="fa fa-circle-o"></i>FeaturedItem Right Heading</a></li>
            <li><a href="{{route('featureditemsright.create')}}"><i class="fa fa-circle-o"></i> Add FeaturedItem Left</a></li>
            <li><a href="{{route('featureditemsright.index')}}"><i class="fa fa-circle-o"></i> Show FeaturedItem Left</a></li>
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('sliders.create')}}"><i class="fa fa-circle-o"></i> Add Slider</a></li>
            <li><a href="{{route('sliders.index')}}"><i class="fa fa-circle-o"></i> Show All Slider</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('pages.aboutinsert')}}"><i class="fa fa-circle-o"></i> About Page</a></li>
            <li><a href="{{route('pages.prpo')}}"><i class="fa fa-circle-o"></i> Privacy-Policy Page</a></li>
            <li><a href="{{route('pages.loyality')}}"><i class="fa fa-circle-o"></i> Our-Loyality Page</a></li>
            <li><a href="{{route('pages.termcon')}}"><i class="fa fa-circle-o"></i> Terms & Condition Page</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Site Options</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('site.options')}}"><i class="fa fa-circle-o"></i>Options</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Social Sites</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{route('social-site.create')}}"><i class="fa fa-circle-o"></i>Add Site Option</a></li>
              <li><a href="{{route('social-site.index')}}"><i class="fa fa-circle-o"></i>Show Site Options</a></li>
          </ul>
        </li>

            
        <li>
          <a href="{{route('admin.contact')}}">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="">
              <small class="label pull-right bg-green">{{$notificatios->count()}}</small>
            </span>
          </a>
        </li>
       

        <!--<li><a href="documentation/index.php"><i class="fa fa-book"></i> <span>Documentation</span></a></li>-->
       <!-- <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>