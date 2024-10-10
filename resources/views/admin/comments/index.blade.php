<x-admin-layout>
    <div class="container-fluid">  
        <h1 class="h3 mb-2 text-gray-800">Commentaires</h1>
        <p class="mb-4">Liste des commentaires en ligne publiés sur les articles.</p>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Commentaires publiés</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Article</th>
                                <th>Commentaire</th>
                                <th>Auteur</th>
                                <th>Date de création</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Article</th>
                                <th>Commentaire</th>
                                <th>Auteur</th>
                                <th>Date de création</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ ($comment->article)? $comment->article->title : 'Article supprimé'}}</td>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{ $comment->created_at }}</td>
                                    <td>
                                        @if(Auth::check() && Auth::user()->role_id === 2)
                                        <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Etes-vous sûr de vouloir supprimer ce commentaire ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
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