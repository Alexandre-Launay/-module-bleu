<x-admin-layout>
    <div class="container-fluid">  
        <h1 class="h3 mb-2 text-gray-800">Articles</h1>
        <p class="mb-4">Liste des articles en attente de validation pour être publié en ligne.</p>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Articles en attente</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th>Créé le</th>
                                <th>Catégorie</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th>Créé le</th>
                                <th>Catégorie</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->created_at->format('Y-m-d') }}</td>
                                <td>{{ isset($article->category)? $article->category->name : '' }}</td>
                                <td>
                                    @if(Auth::check() && Auth::user()->role_id === 2)
                                    <a href="{{ route('admin.articles.editVisibility', $article->id) }}" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>