<div class="bg-dark text-white vh-100">
    <div class="text-center py-4">
        <h4>Admin Dashboard</h4>
    </div>

    {{-- Gestion administrative --}}
    <h6 class="text-uppercase text-muted ps-3">Administration</h6>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('dashboard') }}">
                <i class="bi bi-house-door-fill"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i> Déconnexion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>

    {{-- Gestion des catégories --}}
    <h6 class="text-uppercase text-muted ps-3">Gestion des catégories</h6>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.categories.index') }}">
                <i class="bi bi-tags-fill"></i> Liste des catégories
            </a>
        </li>
    </ul>

    {{-- Gestion des articles --}}
    <h6 class="text-uppercase text-muted ps-3">Gestion des articles</h6>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.articles.index') }}">
                <i class="bi bi-file-earmark-text"></i> Articles publiés
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.articles.pending') }}">
                <i class="bi bi-file-earmark-text"></i> Articles en attente
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.articles.trashed') }}">
                <i class="bi bi-file-earmark-text"></i> Articles supprimés
            </a>
        </li>
    </ul>

    {{-- Gestion des commentaires --}}
    <h6 class="text-uppercase text-muted ps-3">Gestion des Commentaires</h6>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.comments.index') }}">
                <i class="bi bi-chat-left-text-fill"></i> Commentaires publiés
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('admin.comments.index') }}">
                <i class="bi bi-chat-left-text-fill"></i> Commentaires supprimés
            </a>
        </li>
    </ul>

</div>
