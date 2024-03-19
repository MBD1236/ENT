
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
                    <a href="{{ route('genieinfo.etudiants') }}">
                        <i class="bi bi-circle"></i><span>Etudiants</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('genieinfo.inscriptions') }}">
                        <i class="bi bi-circle"></i><span>Inscrits</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item my-0">
            <a class="nav-link collapsed" href="{{ route('genieinfo.enseignants') }}">
                <i class="bi bi-person"></i><span>Enseignants</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('genieinfo.matieres') }}">
                 <i class="bi bi-book"></i><span>Matieres</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('genieinfo.enseigners') }}">
                 <i class="bi bi-body-text"></i><span>Planification cours</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('genieinfo.emploi-temps') }}">
                 <i class="bi bi-calendar-check"></i><span>Emplois de temps</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#note-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-richtext"></i><span>Notes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="note-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Note par matiere</span>
                    </a>
                </li>
                 <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>Note semestrielle</span>
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        {{-- Sciences de l'energie --}}

        {{-- @can('s_energie')
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
        @endcan --}}

        {{-- @can('imp')
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
        @endcan --}}

        {{-- @can('s_technique')
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
        @endcan --}}

        {{-- @can('teb')
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
        @endcan --}}

        {{-- @can('t_laboratoire')
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
        @endcan --}}
    </ul>

</aside>