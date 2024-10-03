<x-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-dark text-white text-center py-3">
                        <h3 class="mb-0">Modifier l'article</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('client.articles.update', $article->id) }}" method="POST">
                            @csrf
                            @method('PUT')
    
                            <!-- Choix de la catégorie (liste déroulante) -->
                            <div class="mb-4">
                                <label for="category" class="form-label fw-bold">Catégorie</label>
                                <select name="category_id" id="category" class="form-select @error('category_id') is-invalid @enderror">
                                    <option value="" disabled>Sélectionnez une catégorie</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $article->category_id) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Titre de l'article -->
                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold">Titre de l'article</label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $article->title) }}" placeholder="Saisissez le titre de l'article">
                            </div>
                            <!-- Contenu de l'article -->
                            <div class="mb-4">
                                <label for="content" class="form-label fw-bold">Contenu de l'article</label>
                                <textarea name="content" id="content" rows="6" class="form-control @error('content') is-invalid @enderror" placeholder="Saisissez le contenu de l'article">{{ old('content', $article->content) }}</textarea>
                            </div>
    
                            <!-- Boutons d'action -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('client.articles.show', $article->id) }}" class="btn btn-outline-secondary">Annuler</a>
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>