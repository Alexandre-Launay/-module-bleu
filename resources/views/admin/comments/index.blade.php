<x-admin-layout>
    <x-slot name="header">
        <h2>
            {{ __('Liste des commentaires') }}
        </h2>
    </x-slot>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Contenu</th>
                <th>Auteur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->content }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>
                    <!-- Add action buttons if necessary -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>