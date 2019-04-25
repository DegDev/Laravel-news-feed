@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center"> Manage News </h1>
        <hr>
        <div class="row justify-content-center">

            <div class="col-3">

                <div class="list-group">
                    <a href="/news/create" class="btn btn-primary" role="button">Create News</a>
                </div>
            </div>

            <div class="col">

                @forelse($news as $newsItem)
                    <div class="card mb-2">

                        <div class="card-header">
                            <div class="level">
                                <div class="flex">
                                    <span>
                                       {{ $newsItem->title }}
                                    </span>({{ $newsItem->created_at->diffForHumans() }})
                                </div>
                                <div>
                                    <a href="{{ $newsItem->path() }}"> <i class="far fa-eye "></i> </a>
                                    <a href="{{route('news.edit_form',['news'=> $newsItem->id ]) }}"> <i class="far fa-edit"></i></a>
                                    <form class="delete-form" action="{{route('news.delete',['news'=>$newsItem->id])}}"
                                          method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-link far fa-trash-alt p-0"></button>
                                    </form>
                                </div>
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
