<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Liste des articles') }}
        </h2>
    </x-slot>
    <div>
        <a href="{{ route('client.articles.create') }}" class="btn btn-primary">Ajouter</a>
    </div>
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
            @foreach ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->created_at->format('Y-m-d') }}</td>
                <td>{{ $article->category->name }}</td>
                <td>
                    <a href="{{ route('client.articles.show', $article) }}" class="btn btn-primary">Voir</a>
                    <a href="{{ route('client.articles.edit', $article) }}" class="btn btn-warning">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>