
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @can('genie_info')
        <li class="nav-heading">Génie Informatique</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#etudiants-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="etudiants-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('genieinfo.etudiantindex') }}">
                        <i class="bi bi-circle"></i><span>Liste des etudiants</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#emplois-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-calendar-check"></i><span>Emplois du temps</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="emplois-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('genieinfo.emploiindex') }}">
                        <i class="bi bi-circle"></i><span>Liste des emplois du temps</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#matieregi-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-book"></i><span>Matieres</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="matieregi-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('genieinfo.matiereindex') }}">
                        <i class="bi bi-circle"></i><span>Liste des matieres</span>
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        {{-- Sciences de l'energie --}}

        @can('s_energie')
        <li class="nav-heading">Sciences des Energies</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#etudiantse-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="etudiantse-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('scienceenergie.etudiantindex') }}">
                        <i class="bi bi-circle"></i><span>Liste des etudiants</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#emploise-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-calendar-check"></i><span>Emplois du temps</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="emploise-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('scienceenergie.emploiindex') }}">
                        <i class="bi bi-circle"></i><span>Liste des emplois du temps</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#matierese-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-book"></i><span>Matieres</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="matierese-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('scienceenergie.matiereindex') }}">
                        <i class="bi bi-circle"></i><span>Liste des matieres</span>
                    </a>
                </li>
            </ul>
        </li>
        @endcan

        @can('imp')
        <li class="nav-heading">IMP</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#etudiantse-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="etudiantse-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('imp.etudiantindex') }}">
                        <i class="bi bi-circle"></i><span>Liste des etudiants</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#matierese-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-book"></i><span>Matieres</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="matierese-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('imp.matiereindex') }}">
                        <i class="bi bi-circle"></i><span>Liste des matieres</span>
                    </a>
                </li>
            </ul>
        </li>
        @endcan

        @can('s_technique')
        <li class="nav-heading">Sciences Techniques</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#etudiantse-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="etudiantse-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('sciencetechnique.etudiantindex') }}">
                        <i class="bi bi-circle"></i><span>Liste des etudiants</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#matierese-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-book"></i><span>Matieres</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="matierese-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('sciencetechnique.matiereindex') }}">
                        <i class="bi bi-circle"></i><span>Liste des matieres</span>
                    </a>
                </li>
            </ul>
        </li>
        @endcan

        @can('teb')
        <li class="nav-heading">Technologie des Equipements Biomédicaux</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#etudiantse-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="etudiantse-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('teb.etudiantindex') }}">
                        <i class="bi bi-circle"></i><span>Liste des etudiants</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#matierese-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-book"></i><span>Matieres</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="matierese-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('teb.matiereindex') }}">
                        <i class="bi bi-circle"></i><span>Liste des matieres</span>
                    </a>
                </li>
            </ul>
        </li>
        @endcan

        @can('t_laboratoire')
        <li class="nav-heading">Technique de laboratoire</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#etudiantse-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="etudiantse-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('techniquelaboratoire.etudiantindex') }}">
                        <i class="bi bi-circle"></i><span>Liste des etudiants</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#matierese-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-book"></i><span>Matieres</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="matierese-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('techniquelaboratoire.matiereindex') }}">
                        <i class="bi bi-circle"></i><span>Liste des matieres</span>
                    </a>
                </li>
            </ul>
        </li>
        @endcan
    </ul>

</aside>