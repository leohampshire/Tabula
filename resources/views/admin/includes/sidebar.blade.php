  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Tabula</p>
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
        <li {{ (Request::is('admin/dashboarda') ? 'class=active' : '') }} {{ (Request::is('admin/dashboard') ? 'class=active' : '') }}>
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-users" aria-hidden="true"></i> <span>USUÁRIOS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/categoria') ? 'class=active' : '') }} {{ (Request::is('admin/categoria/*') ? 'class=active' : '') }}>
          <a href="{{route('admin.category.index')}}">
            <i class="fa fa-cubes" aria-hidden="true"></i> <span>CATEGORIAS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/subcategoria') ? 'class=active' : '') }} {{ (Request::is('admin/subcategoria/*') ? 'class=active' : '') }}>
          <a href="{{route('admin.subcategory.index')}}">
            <i class="fa fa-cube" aria-hidden="true"></i> <span>SUBCATEGORIAS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/curso') ? 'class=active' : '') }} {{ (Request::is('admin/curso/*') ? 'class=active' : '') }}>
          <a href="{{route('admin.course.index')}}">
            <i class="fa fa-university" aria-hidden="true"></i> <span>CURSOS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/dashboard') ? 'class=active' : '') }} {{ (Request::is('admin/dashboard') ? 'class=active' : '') }}>
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-refresh" aria-hidden="true"></i> <span>ANÁLISES</span>
          </a>
        </li>
        <li {{ (Request::is('admin/dashboard') ? 'class=active' : '') }} {{ (Request::is('admin/dashboard') ? 'class=active' : '') }}>
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-industry" aria-hidden="true"></i> <span>EMPRESAS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/dashboard') ? 'class=active' : '') }} {{ (Request::is('admin/dashboard') ? 'class=active' : '') }}>
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-shopping-basket" aria-hidden="true"></i> <span>CUPONS</span>
          </a>
        </li>
        <li {{ (Request::is('admin/dashboard') ? 'class=active' : '') }} {{ (Request::is('admin/dashboard') ? 'class=active' : '') }}>
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-server" aria-hidden="true"></i> <span>SEO</span>
          </a>
        </li>
        <li {{ (Request::is('admin/categoria-blog') ? 'class=active' : '') }} {{ (Request::is('admin/categoria-blog/*') ? 'class=active' : '') }}>
          <a href="{{route('admin.categ.blog.index')}}">
            <i class="fa fa-cube" aria-hidden="true"></i><span>CATEGORIAS DO BLOG</span>
          </a>
        </li>
        <li {{ (Request::is('admin/post-blog') ? 'class=active' : '') }} {{ (Request::is('admin/post-blog/*') ? 'class=active' : '') }}>
          <a href="{{route('admin.post.blog.index')}}">
            <i class="fa fa-tag" aria-hidden="true"></i> <span>POSTS DO BLOG</span>
          </a>
        </li>
        <li {{ (Request::is('admin/dashboard') ? 'class=active' : '') }} {{ (Request::is('admin/dashboard') ? 'class=active' : '') }}>
          <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-comments-o" aria-hidden="true"></i> <span>COMENTÁRIOS DO BLOG</span>
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