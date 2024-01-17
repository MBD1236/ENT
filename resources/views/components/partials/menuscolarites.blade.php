<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Service Scolarite</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-target="#scolarites-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Etudiants</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="scolarites-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('scolarite.etudiant.create') }}">
                        <i class="bi bi-circle"></i><span>Nouvel etudiant</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('scolarite.etudiant.index') }}">
                        <i class="bi bi-circle"></i><span>Liste des etudiants</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('scolarite.inscription.create') }}">
                        <i class="bi bi-circle"></i><span>Nouvelle inscription</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('scolarite.inscription.index') }}">
                        <i class="bi bi-circle"></i><span>Liste des inscrits/reinscrits</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
