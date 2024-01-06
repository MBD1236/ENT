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

            <li class="side-nav-title">Génie Informatique</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-user-line"></i>
                    <span> Etudiants </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.etudiantindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des etudiants</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#secondsidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-calendar-line"></i>
                    <span> Emplois du temps </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="secondsidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.emploiindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des emplois du temps</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#secondsidebarPage" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-book-line"></i>
                    <span> Matieres </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="secondsidebarPage">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.matiereindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des matières</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>

        <!--- Sidemenu: Sciences des Energies -->
        <ul class="side-nav">

            <li class="side-nav-title">Sciences des Energies</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-user-line"></i>
                    <span> Etudiants </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('scienceenergie.etudiantindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des etudiants</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#secondsidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-calendar-line"></i>
                    <span> Emplois du temps </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="secondsidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('scienceenergie.emploiindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des emplois du temps</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#secondsidebarPage" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-book-line"></i>
                    <span> Matieres </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="secondsidebarPage">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('scienceenergie.matiereindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des matières</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>

        <!--- Sidemenu: IMP -->
        <ul class="side-nav">

            <li class="side-nav-title">IMP</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-user-line"></i>
                    <span> Etudiants </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.etudiantindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des etudiants</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#secondsidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-calendar-line"></i>
                    <span> Emplois du temps </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="secondsidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.emploiindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des emplois du temps</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#secondsidebarPage" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-book-line"></i>
                    <span> Matieres </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="secondsidebarPage">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.matiereindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des matières</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>

        <!--- Sidemenu: TEB -->
        <ul class="side-nav">

            <li class="side-nav-title">TEB</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-user-line"></i>
                    <span> Etudiants </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.etudiantindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des etudiants</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#secondsidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-calendar-line"></i>
                    <span> Emplois du temps </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="secondsidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.emploiindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des emplois du temps</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#secondsidebarPage" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-book-line"></i>
                    <span> Matieres </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="secondsidebarPage">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.matiereindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des matières</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>

        <!--- Sidemenu: CFM -->
        <ul class="side-nav">

            <li class="side-nav-title">CFM</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-user-line"></i>
                    <span> Etudiants </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.etudiantindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des etudiants</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#secondsidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-calendar-line"></i>
                    <span> Emplois du temps </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="secondsidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.emploiindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des emplois du temps</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#secondsidebarPage" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-book-line"></i>
                    <span> Matieres </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="secondsidebarPage">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.matiereindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des matières</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>

        <!--- Sidemenu: Labo bio -->
        <ul class="side-nav">

            <li class="side-nav-title">Techniques de Laboratoires</li>
                <h4 class="side-nav-title">Labo biologie</h4>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-user-line"></i>
                    <span> Etudiants </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.etudiantindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des etudiants</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#secondsidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-calendar-line"></i>
                    <span> Emplois du temps </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="secondsidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.emploiindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des emplois du temps</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#secondsidebarPage" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-book-line"></i>
                    <span> Matieres </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="secondsidebarPage">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.matiereindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des matières</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <h4 class="side-nav-title">Labo chimie</h4>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-user-line"></i>
                    <span> Etudiants </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.etudiantindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des etudiants</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#secondsidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-calendar-line"></i>
                    <span> Emplois du temps </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="secondsidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.emploiindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des emplois du temps</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#secondsidebarPage" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="ri-book-line"></i>
                    <span> Matieres </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="secondsidebarPage">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('genieinfo.matiereindex') }}">
                                <i class="ri-list-check"></i>
                                <span>Liste des matières</span>
                            </a>
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
