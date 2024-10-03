<x-admin-layout>
    <x-slot name="header">
        <h2>
            {{ __('Liste des articles en attente de validation') }}
        </h2>
    </x-slot>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Créé le</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pending as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->created_at->format('Y-m-d') }}</td>
                <td>{{ $article->category->name }}</td>
                <td>
                    <!-- Add action buttons if necessary -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-admin-layout>