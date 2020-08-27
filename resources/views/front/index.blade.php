@extends('front.layouts.app')
@section('content')
<section id="page-title">

        <div class="container clearfix">
            <h1>Blog</h1>
            <span>Our Latest News</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin clearfix">

                    <!-- Posts
                    ============================================= -->
                    <div id="posts">
                        @foreach ($posts as $post)
                            <div class="entry clearfix">
                                <div class="entry-image">
                                    <a href="{{ asset('/storage/postImage/'.$post->image ) }}" data-lightbox="image"><img class="image_fade" src="{{ asset('/storage/postImage/'.$post->image ) }}" alt="Standard Post with Image"></a>
                                </div>
                                <div class="entry-title">
                                    <h2><a href="{{ route('post.single',$post->title) }}">{!! $post->title !!}</a></h2>
                                </div>
                                <ul class="entry-meta clearfix">
                                    <li><i class="icon-calendar3"></i> {{ date('d-F-Y',strtotime($post->created_at)) }}</li>
                                    <li><a href="#"><i class="icon-user"></i>{{ $post->user->name }}</a></li>
                                    <li><a href="#"><i class="icon-comments"></i> 13 Comments</a></li>
                                </ul>
                                <div class="entry-content">
                                    <h4>{!! $post->detail !!}</h4>
                                    <p>
                                            {!! $post->description !!}
                                    </p>
                                    <a href="{{ route('post.single',$post->title) }}"class="more-link">Read More</a>
                                </div>
                            </div>
                        @endforeach

                    </div><!-- #posts end -->

                    <!-- Pagination
                    ============================================= -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <a href="#" class="btn btn-outline-secondary float-left">&larr; Older</a>
                            <a href="#" class="btn btn-outline-dark float-right">Newer &rarr;</a>
                        </div>
                    </div>
                    <!-- .pager end -->

                </div><!-- .postcontent end -->


            </div>

        </div>

    </section><!-- #content end -->

@endsection
