<x-app-layout>
    <div class="d-flex flex-column" style="width: 60%">

        @if (Auth::check())
        <div class="d-flex justify-content-end">
            <a href="{{ route('client.articles.create') }}" class="btn btn-primary">Ajouter</a>
        </div>
        @endif

        @foreach ($articles as $article)
        <div class="card-image-top ">
            <div class="card-image-top d-flex justify-content-center  bg-black" style="width: 1000px ; height: 200px;">
                <img src="{{asset('storage/'.$article->image_path)}}"  alt="{{isset($article->image_path)? $article->image_path : ''}}">
            </div>
            <div class="card-header d-flex align-items-center">
                <div>
                    <h6 class="mb-0">{{ $article->user->name }}</h6>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ isset($article->category->name)? $article->category->name : '' }}</p>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
            <small class="text-muted">{{ $article->created_at->locale('fr')->diffForHumans() }}</small>
            <a class="btn btn-info" href="{{ route('client.articles.show', $article) }}">
                    Voir plus
                </a>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>