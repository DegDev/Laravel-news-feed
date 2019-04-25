@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3">

                <div class="list-group">
                    <a href="/" class="list-group-item list-group-item-action">
                        All News
                    </a>

                    @foreach($categories as $category)
                        <a href="/news/{{$category->slug}}" class="list-group-item list-group-item-action">{{$category->name}}</a>
                    @endforeach

                </div>
            </div>
            <div class="col">
                @forelse($news as $newsItem)
                    <div class="card mb-4">

                        <div class="card-header">
                            <div class="level">
                                <h4 class="flex">
                                    <a href="{{ $newsItem->path() }}">
                                        {{ $newsItem->title }}
                                    </a>
                                </h4>
                                <p> Published: {{ $newsItem->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="body">
                                {{ $newsItem->body }}
                            </div>

                        </div>
                    </div>
                @empty
                    <p> There are no relevant results at this time </p>
                @endforelse

                    {{ $news->links() }}
            </div>

        </div>

    </div>
@endsection
