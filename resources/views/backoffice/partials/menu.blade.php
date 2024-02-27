<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="/">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link " data-bs-target="#gestions-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Gestions</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="gestions-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('admin.annee_universitaire.index') }}">
            <i class="bi bi-circle"></i><span>Année Universitaires</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.promotion.index') }}">
            <i class="bi bi-circle"></i><span>Promotions</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.niveau.index') }}">
            <i class="bi bi-circle"></i><span>Niveaux</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.semestre.index') }}">
            <i class="bi bi-circle"></i><span>Semestres</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.matiere.index') }}">
            <i class="bi bi-circle"></i><span>Matieres</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.enseignant.index') }}">
            <i class="bi bi-circle"></i><span>Enseignants</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.departement.index') }}">
            <i class="bi bi-circle"></i><span>Departements</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.programme.index') }}">
            <i class="bi bi-circle"></i><span>Programmes</span>
          </a>
        </li>
      </ul>
    </li><!-- End Gestions Nav -->
    
    <li class="nav-heading">Autres</li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin.galerie.index') }}">
        <i class="bi bi-image"></i><span>Galeries</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin.article.index') }}">
        <i class="bi bi-journal"></i><span>Articles</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin.partenaire.index') }}">
        <i class="bi bi-circle"></i><span>Partenaires</span>
      </a>
    </li>


  </ul>

</aside><!-- End Sidebar-->