<x-admin-layout>
    <x-slot name="header">
        <h2>
            {{ __('Liste des articles supprimés') }}
        </h2>
    </x-slot>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Supprimé le</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deleted as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->deleted_at->format('Y-m-d') }}</td>
                <td>
                    <!-- Add action buttons if necessary -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>