<x-app-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-8 col-md-10">
                <h1 class="text-center">AJout l'article</h1>
                <form action="{{ route('client.articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                
                    <div class="form-group mb-4">
                        <label class="form-label" for="image">Bannière</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                    </div>
                
                    <div class="form-group mb-4">
                        <label class="form-label" for="title">Titre</label>
                        <input type="text" id="title" name="title" value="" class="form-control" required>
                    </div>
                
                    <div class="form-group mb-4">
                        <label class="form-label" for="content">Contenue</label>
                        <textarea id="content" name="content"></textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label  class="form-label" for="category">Categorie</label>
                        <select name="category_id" id="category" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-3">Create</button>
                        <a href="{{ route('client.articles.index') }}" class="btn btn-outline-secondary">Retour à la liste</a>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>

