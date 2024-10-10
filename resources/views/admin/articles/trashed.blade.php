<x-admin-layout>
    <div class="container-fluid">  
        <h1 class="h3 mb-2 text-gray-800">Articles</h1>
        <p class="mb-4">Liste des articles supprimés</p>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Articles supprimés</h6>
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
                                    <form action="{{ route('admin.articles.restore', $article->id) }}" method="POST" onsubmit="return confirm('Etes-vous sûr de vouloir restaurer cette catégorie ?');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                        </button>
                                    </form>
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