<x-admin-layout>
    <div class="container-fluid">  
        <h1 class="h3 mb-2 text-gray-800">Articles</h1>
        <p class="mb-4">Liste des articles publiés et visible en lignes</p>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Articles publiés</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Date de création</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nom</th>
                                <th>Date de création</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <form action="{{ route('admin.categories.store') }}" method="POST">
                                    <td colspan="2"><input type="text" name="name" id="name" class="form-control" placeholder="Nom de la nouvelle catégorie"></td>
                                    <td>
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i></button>
                                    </td>
                                </form>
                            </tr>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td class="">
                                        @if(Auth::check() && Auth::user()->role_id === 2)
                                        <div style="{{ $category->deleted_at ? 'display: none' : '' }}">
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Etes-vous sûr de vouloir supprimer cette catégorie ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                        <div style="{{ $category->deleted_at ? 'display: block' : 'display: none' }}">
                                            <form action="{{ route('admin.categories.restore', $category->id) }}" method="POST" onsubmit="return confirm('Etes-vous sûr de vouloir restaurer cette catégorie ?');">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
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