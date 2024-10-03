<x-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <!-- Carte Bootstrap pour l'affichage de l'article -->
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <!-- Titre de l'article -->
                        <h1 class="card-title mb-3">{{ $article->title }}</h1>
                        
                        <!-- Nom de la catégorie -->
                        <p class="text-muted">
                            <strong>Catégorie :</strong> 
                            <span class="badge bg-primary">{{ $article->category->name }}</span>
                        </p>
                        
                        <!-- Contenu de l'article -->
                        <div class="card-text">
                            {!! $article->content !!}
                        </div>
    
                        <!-- Boutons d'action en bas de l'article -->
                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{ route('client.articles.index') }}" class="btn btn-outline-secondary">Retour à la liste</a>
                            <a href="{{ route('client.articles.edit', $article)}}" class="btn btn-primary" >Modifier l'article</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>