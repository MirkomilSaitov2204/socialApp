@extends('admin.layouts.master')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            <div class="panel-header">
                <h3 class="text-center" style="padding-top: 20px">Information Post</h3>
                <hr>
            </div>
            <div class="panel-body">
                <div class="d-flex justify-content-end mb-5">
                    <a href="{{ route('post.index') }}" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="text-center text-capitalize">information post</h3>
                        <img src="/storage/postImage/{{ $post->image }}" alt="" width="60px" height="60px" style="border-radius:50%">
                    </div>
                    <div class="card-body">
                        <span class="font-weight-bold text-capitalize">Title:</span> {{ $post->title }}
                        <hr>
                        <span class="font-weight-bold text-capitalize">Detail:</span> {{ $post->detail }}
                        <hr>
                        <span class="font-weight-bold text-capitalize">Description:</span> {{ $post->description }}
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
