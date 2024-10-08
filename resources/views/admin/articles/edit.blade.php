<x-admin-layout>
    <x-slot name="header">
        <h2>
            {{ __('Vérification avant publication') }}
        </h2>
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

        <!-- Boutons d'action en bas de l'article -->
            <div class="mt-4 d-flex justify-content-end">
                <div class="mt-4 d-flex justify-content-end">
                    <form action="{{ route('admin.articles.update', $article) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <input type="radio" name="is_visible" id="is_visible_false" value="0" @if($article->is_visible === 1)  checked @endif />
                            <label class="mr-2" for="is_visible_false">Cacher l'article</label>
                            <input type="radio" name="is_visible" id="is_visible_true" value="1" @if($article->is_visible === 0)  checked @endif />
                            <label for="is_visible_true">Publier l'article</label>
                        </div>
                        <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary">Retour à la liste</a>
                        <input type="submit" value="{{(!$article->is_visible) ? 'Publier l\'article' : 'Cacher l\'article' }}" class="btn btn-success" />
                    </form>
                </div>
            </div>

            <!-- Carte Bootstrap pour l'affichage de l'article -->
            <div class="card mt-3 border-0 bg-transparent">
                
                <!--Ajout de l'image(si elle existe)-->
                @if($article->image_path)
                    <div class="card-image-top">
                        <img src="{{asset('storage/'.$article->image_path)}}" alt="Image de l'article" class="img-fluid rounded">
                @else
                        <div class="mb-3  text-center">
                            <img src="https://www.freeiconspng.com/uploads/no-image-icon-15.png" alt="No image"> <!-- Icône appareil photo barrée -->
                            <p>Aucune image disponible</p>
                        </div>
                @endif

                <div class="card-body p-2">
                    <div class="d-flex justify-content-between">
                        <!-- Nom de la catégorie -->
                        <div class="text-muted">
                            <strong>Catégorie :</strong> 
                            <span class="badge bg-primary">{{ isset($article->category->name) ? $article->category->name : '' }}</span>
                        </div>
                        <div class="d-flex flex-column align-items-end">
                            <!-- Nom du createur -->
                            <strong class="text-primary">{{ isset($article->user->name) ? $article->user->name : '' }}</strong>
                            <p class="text-muted">Publié  {{ $article->created_at->locale('fr')->diffForHumans() }}</p>
                        </div>
                    </div>
                    <!-- Titre de l'article -->
                    <h1 class="card-title mt-2">{{ $article->title }}</h1>

                    <!-- Contenu de l'article -->
                    <div class="card-text">
                        {!! $article->content !!}
                    </div>
                </div>
            </div>
        </div>
</x-admin-layout>