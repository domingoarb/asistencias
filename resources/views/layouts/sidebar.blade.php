<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
  <div class="sidebar-brand-icon">
    <img src="{{asset('img/fmo.gif')}}" alt="" width="30px" height="30px" >
  </div>
  <div class="sidebar-brand-text mx-3">Asistencia FFCC</div>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="/"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
</li>

<hr class="sidebar-divider">

<li class="nav-item">
    <a class="nav-link" href="{{route('workers.index')}}">
        <i class="fas fa-user-tie"></i>
        <span>Trabajadores</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('departaments.index')}}">
        <i class="fas fa-puzzle-piece"></i>
        <span>Departamentos</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-chart-area"></i><span>Aistencia</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('attendances.index')}}">Ver dia</a>
            <a class="collapse-item" href="{{route('attendances.create')}}">Registrar</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block"><!-- Divider -->

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
