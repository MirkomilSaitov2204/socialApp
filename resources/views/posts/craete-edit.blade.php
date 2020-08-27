@extends('front.layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            @if (count($errors)>0)
                <div class="alert">
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="panel-header">
                <h3 class="text-center" style="padding-top: 20px">
                        {{ isset($post) ? 'Edit Post' : 'Create Post' }}
                </h3>
                <hr>
            </div>
            <div class="panel-body">
                <div class="d-flex justify-content-end mb-5">
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <form action="{{ isset($post) ? route('posts.update', ['id' => $post->id]) : route('posts.store')}} " method="POST" enctype="multipart/form-data">
                   @if (isset($post))
                        @method('PUT')
                   @endif
                    <div class="row">
                        <div class="col-md-7">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" placeholder="Title" class="form-control" value="{{ isset($post) ? $post->title : ''  }}">
                            </div>
                            <div class="form-group">
                                <label for="detail">Detail</label>
                                <input type="text" id="detail" name="detail" placeholder="Detail" class="form-control" value="{{ isset($post) ? $post->detail : ''  }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                {{-- <input type="password" id="password" name="password" placeholder="Password" class="form-control"> --}}
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ isset($post) ? $post->description : ''  }}</textarea>
                            </div>

                        </div>
                        <div class="col-md-5">
                            {{-- <div class="form-group">
                                <label for="iso_code">Iso Code</label>

                                <select name="iso_code"  id="iso_code" class="form-control ">
                                        <option value="uz">UZ</option>
                                        <option value="ru">RU</option>
                                </select>
                            </div> --}}
                            <input type="hidden" name="iso_code" id="" value="uz">
                            <div class="form-group">
                                <label for="is_active">Is Active</label>

                                <select name="is_active"  id="is_active" class="form-control ">
                                        <option value="0">Yes</option>
                                        <option value="1">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" placeholder="Image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-outline-info d-flex btn-block justify-content-center"><i class="fa fa-paper-plane"></i> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>
@endsection
