  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Jão</p>
          <span><small>Administrador</small></span>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PRINCIPAL</li>
        <li {{ (Request::is('admin/dashboard') ? 'class=active' : '') }} {{ (Request::is('admin/dashboard') ? 'class=active' : '') }}>
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-tachometer"></i> <span>DASHBOARD</span>
          </a>
        </li>
        <li {{ (Request::is('admin/categoria') ? 'class=active' : '') }} {{ (Request::is('admin/categoria/*') ? 'class=active' : '') }}>
          <a href="{{route('admin.category.index')}}">
            <i class="fa fa-tachometer"></i> <span>CATEGORIAS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/subcategoria') ? 'class=active' : '') }} {{ (Request::is('admin/subcategoria/*') ? 'class=active' : '') }}>
          <a href="{{route('admin.subcategory.index')}}">
            <i class="fa fa-tachometer"></i> <span>SUBCATEGORIAS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/dashboard') ? 'class=active' : '') }} {{ (Request::is('admin/dashboard') ? 'class=active' : '') }}>
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-tachometer"></i> <span>CURSOS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/dashboard') ? 'class=active' : '') }} {{ (Request::is('admin/dashboard') ? 'class=active' : '') }}>
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-tachometer"></i> <span>DASHBOARD</span>
          </a>
        </li>
        <li {{ (Request::is('admin/dashboard') ? 'class=active' : '') }} {{ (Request::is('admin/dashboard') ? 'class=active' : '') }}>
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-tachometer"></i> <span>DASHBOARD</span>
          </a>
        </li>
        <li {{ (Request::is('admin/categoria-blog') ? 'class=active' : '') }} {{ (Request::is('admin/categoria-blog/*') ? 'class=active' : '') }}>
          <a href="{{route('admin.categ.blog.index')}}">
            <i class="fa fa-tachometer"></i> <span>CATEGORIAS DO BLOG</span>
          </a>
        </li>
        <li {{ (Request::is('admin/dashboard') ? 'class=active' : '') }} {{ (Request::is('admin/dashboard') ? 'class=active' : '') }}>
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-tachometer"></i> <span>POSTS DO BLOG</span>
          </a>
        </li>
        <li {{ (Request::is('admin/dashboard') ? 'class=active' : '') }} {{ (Request::is('admin/dashboard') ? 'class=active' : '') }}>
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-tachometer"></i> <span>COMENTÁRIOS DO BLOG</span>
          </a>
        </li>
        <li {{ (Request::is('admin/paginas') ? 'class=active' : '') }} {{ (Request::is('admin/paginas/*') ? 'class=active' : '') }}>
          <a href="{{route('admin.page.index')}}">
            <i class="fa fa-tachometer"></i> <span>PÁGINAS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/admin/configuration') ? 'class=active' : '') }} {{ (Request::is('admin/admin/configuration/*') ? 'class=active' : '') }} >
          <a href="#">
            <i class="fa fa-cogs"></i> <span>CONFIGURAÇÕES</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>