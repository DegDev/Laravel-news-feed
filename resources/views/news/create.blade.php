@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a News</div>

                    <div class="card-body">
                        @if(count($errors))
                            <ul class="alert alert-danger list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="/news">
                            @csrf
                            <div class="form-group">
                                <label for="channel_id">Choose a channel</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option value="">Choose one...</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Title: </label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="body">Body: </label>
                                <textarea name="body" id="body" class="form-control" required
                                          rows="8" required>{{ old('body') }}</textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"> Publish</button>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
