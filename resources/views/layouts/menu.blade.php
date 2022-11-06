@role('Administrador')
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-home"></i><span>Dashboard</span>
    </a>
</li>
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/cooperativas">
        <i class=" fas fa-layer-group"></i><span>Cooperativa</span>
    </a>
</li>
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-user "></i><span>Usuarios</span>
    </a>
</li>
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock "></i><span>Roles</span>
    </a>
</li>
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/solicitudes/">
        <i class=" fa fa-file-signature "></i><span>Solicitud de Registro</span>
    </a>
</li>
@endrole
@role('Invitado')
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-home"></i><span>Dashboard</span>
    </a>
</li>
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/solicitudes/">
        <i class=" fa fa-file-signature "></i><span>Solicitud de Registro</span>
    </a>
</li>
@endrole
@role('Asociado')
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-home"></i><span>Dashboard</span>
    </a>
</li>
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/solicitudes/">
        <i class=" fa fa-file-signature "></i><span>Solicitud de Registro</span>
    </a>
</li>
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/cuentas">
        <i class="fa fa-piggy-bank "></i><span>Cuentas</span>
    </a>
</li>
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/asociados">
        <i class="fa fa-id-card "></i><span>Carnet</span>
    </a>
</li>
@endrole
@role('Jefe de Operaciones')
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/cooperativas">
        <i class=" fas fa-layer-group"></i><span>Cooperativa</span>
    </a>
</li>
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-home"></i><span>Dashboard</span>
    </a>
</li>
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/solicitudes/">
        <i class=" fa fa-file-signature "></i><span>Solicitud de Registro</span>
    </a>
</li>
@endrole


