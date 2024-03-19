
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Espace de l'étudiant</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#etudiants-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Inscriptions</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="etudiants-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="lien-a">
                    <a href="{{ route('etudiant.list-inscrit') }}">
                        <i class="bi bi-circle"></i><span>Non orienté par l'Etat</span>
                    </a>
                </li>
                <li class="lien-a">
                    <a href="{{route('etudiant.list-reinscrit')}} ">
                        <i class="bi bi-circle"></i><span>Orienté par l'Etat</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item my-0">
            <a class="nav-link collapsed" href="{{route('etudiant.list-reinscrit')}}">
                <i class="bi bi-person"></i><span>Réinscription</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('etudiant.matiere')}}">
                 <i class="bi bi-book"></i><span>Matieres du cycle</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                 <i class="bi bi-body-text"></i><span>Emplois du temps</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                 <i class="bi bi-calendar-check"></i><span>Cours en générale</span>
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
       
        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                 <i class="bi bi-calendar-check"></i><span>Chat</span>
            </a>
        </li>
    </ul>

</aside>