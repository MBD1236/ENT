<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{ route('admin.dashboard.index') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('backend/images/logo.png')}}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('backend/images/logo-sm.png')}}" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{ route('admin.dashboard.index') }}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('backend/images/logo-dark.png')}}" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('backend/images/logo-sm.png')}}" alt="small logo">
        </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu: Génie Informatique -->
        <ul class="side-nav">

            <li class="side-nav-title">Service Scolarité</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-user-line"></i>
                    <span> Etudiants </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('scolarite.etudiant.create') }}">
                                <i class="ri-add-line"></i>
                                <span>Nouvel etudiant</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('scolarite.etudiant.index') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des etudiants</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('scolarite.inscription.create') }}">
                                <i class="ri-add-line"></i>
                                <span>Nouvelle inscription</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('scolarite.inscription.index') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des inscrits/reinscrits</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            

        <!--- End Sidemenu -->
        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
