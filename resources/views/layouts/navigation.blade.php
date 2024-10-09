<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.articles.index') }}">
      <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Panel Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.articles.index') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Articles
  </div>

  {{-- Articles panel --}}
  <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin.articles.index')}}" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa-solid fa-list"></i>
          <span>Liste Articles</span>
      </a>
  </li>
  <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin.articles.pending') }}" data-bs-toggle="collapse" data-bs-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fa-solid fa-hourglass-start"></i>
          <span>Articles en attente de validation</span>
      </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('admin.articles.trashed') }}" data-bs-toggle="collapse" data-bs-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa-solid fa-trash"></i>
        <span>Articles supprimés</span>
    </a>
</li>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Commentaires
  </div>

  {{-- Comments panel --}}
  <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin.comments.index')}}" data-bs-toggle="collapse" data-bs-target="#collapsePages"
          aria-expanded="true" aria-controls="collapsePages">
          <i class="fa-solid fa-list"></i>
          <span>Liste des commentaires</span>
      </a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.comments.trashed') }}">
        <i class="fa-solid fa-trash"></i>
          <span>Commentaires supprimés</span></a>
  </li>

  <!-- Divider -->

  <hr class="sidebar-divider d-none d-md-block">

{{-- Categories panel --}}
  <div class="sidebar-heading">
    Categories
  </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('admin.categories.index')}}" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa-solid fa-list"></i>
        <span>Liste des catégories</span>
    </a>
  </li>
</ul>
