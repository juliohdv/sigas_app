{{$email_user = \Illuminate\Support\Facades\Auth::user()->name}}
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-home"></i><span>Dashboard</span>
    </a>
    <a class="nav-link" href="/cooperativas">
        <i class=" fas fa-layer-group"></i><span>Cooperativa</span>
    </a>
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-user "></i><span>Usuarios</span>
    </a>
        <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock "></i><span>Roles</span>
    </a>
    <a class="nav-link" href="/solicitudes/">
        <i class=" fas fa-file-contract "></i><span>Solicitud de Registro</span>
    </a>
    <a class="nav-link" href="/paises">
        <i class=" fas fa-file-contract "></i><span>Paises</span>
    </a>
</li>

