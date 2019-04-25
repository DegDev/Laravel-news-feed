@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card mb-2">
                    <div class="card-header">
                        <div class="level">
                            <span class="flex">
                            <a href="{{ $news->path() }}">   {{ $news->title }}  </a>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $news->body }}
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
