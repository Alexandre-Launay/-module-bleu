<x-app-layout>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <form action="{{  route('client.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <!-- Boutons d'action en bas de l'article -->
                <div class="mt-4 d-flex justify-content-end">
                    @if (Auth::check())
                    <button type="submit" class="btn btn-primary me-3" >Mettre à jour</button>
                    <a href="{{ route('client.articles.index') }}" class="btn btn-outline-secondary">Retour à la liste</a>
                    @endif
                </div>
                <!-- Carte Bootstrap pour l'affichage de l'article -->
                <div class="card mt-3 border-0 ">
                    <div class="card-body p-2">
                        @if($article->image_path)
                        <div class="card-image-top d-flex justify-content-center bg-black" style="width: 1000px ; height: 420px">
                            <img src="{{asset('storage/'.$article->image_path)}}" alt="Image de l'article" class="img-fluid rounded">
                        </div>
                        @else
                        <div class="mb-3  text-center card-image-top bg-dark bg-size-cover" style="height: 150px">
                        </div>
                        @endif
                        <div class="form-group mb-4">
                            <label class="form-label" for="image">Bannière</label>
                            <input type="file" name="image" class="form-control-file" id="image">
                        </div>
                        <div class="d-flex justify-content-between">
                            <!-- Nom de la catégorie -->
                            <div>
                                <strong>Catégorie :</strong> 
                                <select name="category_id" id="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Titre de l'article -->
                        <label for="title" class="form-label">Titre de l'article: </label>
                        <input type="text" id="title" name="title" value="{{ $article->title }}">
                        <!-- Contenu de l'article -->
                        <div class="card-text">
                            <textarea id="content" name="content">{{ $article->content }}</textarea>
                        </div>
                    </div>
                </div> 
                </form>        
            </div>
        </div>
    </div>
</x-app-layout>
