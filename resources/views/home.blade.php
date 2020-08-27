@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a href="{{ route('posts.create') }}">Create Posts</a>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($posts as $post)
                    <div class="card">
                        <img class="card-img-top" src="{{ asset("storage/postImage/". $post->image ) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <h6 class="card-title">{{ $post->detail }}</h6>
                            <p class="card-text">{{ $post->description }}</p>
                            <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i>Edit</a>
                            {{-- @endcan --}}
                            {{-- @can('delete-users') --}}
                                <form action="{{ route('posts.destroy', ['id'=>$post->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button  type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                                </form>
                        </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
