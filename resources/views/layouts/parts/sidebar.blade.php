<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="https://image.flaticon.com/icons/png/512/201/201818.png" 
        class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Suryo Widiyanto</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Administrator</a>
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
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="{{ Request::is('home') || Request::is('home/*') ? 'active' : '' }}">
        <a href="{{ route('home.index') }}"><i class="fa fa-dashboard"></i> <span>Beranda</span></a>
      </li>

      <li class="{{ Request::is('categories') || Request::is('categories/*') ? 'active' : '' }}">
        <a href="{{ route('categories.index') }}"><i class="fa fa-tags"></i> <span>Kategori</span></a>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>