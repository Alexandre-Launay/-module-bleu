<x-app-layout>
    <div class="col-8 col-md-10">
            <h1 class="text-center">AJout l'article</h1>
            <form action="{{ route('client.articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label class="form-label" for="image">Bannière</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                
                <div>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="" required>
                </div>
                
                <div>
                    <label for="content">Content</label>
                    <textarea id="content" name="content"></textarea>
                </div>
                <div>
                    <label for="category">Category</label>
                    <select name="category_id" id="category">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit">Create</button>
            </form>
        </div>
</x-app-layout>

