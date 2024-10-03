<x-admin-layout>
    <x-slot name="header">
        <h2>
            {{ __('Liste des catégories') }}
        </h2>
    </x-slot>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <!-- Add action buttons if necessary -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>