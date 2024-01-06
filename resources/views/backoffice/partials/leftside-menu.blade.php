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
        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Main</li>

            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard.index') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end">9+</span>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    <span> Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.etudiant.index') }}">Etudiants</a>
                        </li>
                         <li>
                            <a href="{{ route('admin.inscription.index') }}">Reinscriptions</a>
                        </li>
                         <li>
                            <a href="{{ route('admin.session.index') }}">Sessions</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.promotion.index') }}">Promotions</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.niveau.index') }}">Niveaux</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.semestre.index') }}">Semestres</a>
                        </li>
                         <li>
                            <a href="{{ route('admin.matiere.index') }}">Matieres</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.enseignant.index') }}">Enseignants</a>
                        </li>
                        <li>
                             <a href="{{ route('admin.departement.index') }}">Departements</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarOtherPages" aria-expanded="false" aria-controls="sidebarOtherPages" class="side-nav-link">
                    <i class="ri-group-2-line"></i>
                    <span> Autre pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarOtherPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.galerie.index')}}">Galeries</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.article.index') }}">Articles</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.partenaire.index') }}">Partenaires</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
        <!--- End Sidemenu -->
        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
