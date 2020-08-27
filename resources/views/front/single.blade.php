@extends('front.layouts.app')
@section('content')

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Blog Single</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Blog</a></li>
					<li class="breadcrumb-item active" aria-current="page">Blog Single</li>
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

						<div class="single-post nobottommargin">

							<!-- Single Post
							============================================= -->
							<div class="entry clearfix">

								<!-- Entry Title
								============================================= -->
								<div class="entry-title">
									<h2>This is a Standard post with a Preview Image</h2>
								</div><!-- .entry-title end -->

								<!-- Entry Meta
								============================================= -->
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> 10th July 2014</li>
									<li><a href="#"><i class="icon-user"></i> admin</a></li>
									<li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>
									<li><a href="#"><i class="icon-comments"></i> 43 Comments</a></li>
									<li><a href="#"><i class="icon-camera-retro"></i></a></li>
								</ul><!-- .entry-meta end -->

								<!-- Entry Image
								============================================= -->
								<div class="entry-image">
									<a href="#"><img src="images/blog/full/1.jpg" alt="Blog Single"></a>
								</div><!-- .entry-image end -->

								<!-- Entry Content
								============================================= -->
								<div class="entry-content notopmargin">

									<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>



									<div class="clear"></div>

									<!-- Post Single - Share
									============================================= -->
									<div class="si-share noborder clearfix">
										<span>Share this Post:</span>
										<div>
											<a href="#" class="social-icon si-borderless si-facebook">
												<i class="icon-facebook"></i>
												<i class="icon-facebook"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-twitter">
												<i class="icon-twitter"></i>
												<i class="icon-twitter"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-pinterest">
												<i class="icon-pinterest"></i>
												<i class="icon-pinterest"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-gplus">
												<i class="icon-gplus"></i>
												<i class="icon-gplus"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-rss">
												<i class="icon-rss"></i>
												<i class="icon-rss"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-email3">
												<i class="icon-email3"></i>
												<i class="icon-email3"></i>
											</a>
										</div>
									</div><!-- Post Single - Share End -->

								</div>
							</div><!-- .entry end -->

							<div class="line"></div>

							<!-- Comments
							============================================= -->
							<div id="comments" class="clearfix">

								<!-- Comments List
								============================================= -->
								<ol class="commentlist clearfix">
                                    @foreach ($post->comments as $comment)
                                        <li class="comment even thread-even depth-1" id="li-comment-1">

                                            <div id="comment-1" class="comment-wrap clearfix">

                                                <div class="comment-meta">

                                                    <div class="comment-author vcard">
                                                        <span class="comment-avatar clearfix">
                                                        <img alt='' src='{{ asset('storage/userImage'.$comment->user->image) }}' class='avatar avatar-60 photo avatar-default' height='60' width='60' /></span>

                                                    </div>

                                                </div>

                                                    <div class="comment-content clearfix">

                                                        <div class="comment-author">{{ $comment->name }} || {{ $comment->email }}<span><a href="#" title="Permalink to this comment">{{ date('d-F-Y',strtotime($comment->created_at)) }}</a></span></div>

                                                        <p>{!! $comment->comment !!}</p>

                                                        <a class='comment-reply-link'  cid="{{ $comment->id }}" name_a="{{ Auth::user()->name }}" token="{{ csrf_token() }}"><i class="icon-reply"></i></a>

                                                    </div>



                                                <div class="clear"></div>

                                            </div>


                                            {{-- @foreach($comment->replies as $rep)
                                                @if($comment->id === $rep->comment_id)
                                                <ul class='children'>

                                                        <li class="comment byuser comment-author-_smcl_admin odd alt depth-2" id="li-comment-3">
        
                                                            <div id="comment-3" class="comment-wrap clearfix">
        
                                                                <div class="comment-meta">
        
                                                                    <div class="comment-author vcard">
        
                                                                        <span class="comment-avatar clearfix">
                                                                        <img alt='' src='http://1.gravatar.com/avatar/30110f1f3a4238c619bcceb10f4c4484?s=40&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D40&amp;r=G' class='avatar avatar-40 photo' height='40' width='40' /></span>
        
                                                                    </div>
        
                                                                </div>
        
                                                                <div class="comment-content clearfix">
        
                                                                    <div class="comment-author"><a href='#' rel='external nofollow' class='url'>SemiColon</a><span><a href="#" title="Permalink to this comment">April 25, 2012 at 1:03 am</a></span></div>
        
                                                                    <p>Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        
                                                                    <a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>
        
                                                                </div>
        
                                                                <div class="clear"></div>
        
                                                            </div>
        
                                                        </li>
        
                                                    </ul>
        
                                                @endif 
                                            @endforeach --}}


                                        </li>
                                    @endforeach

								</ol><!-- .commentlist end -->

								<div class="clear"></div>

								<!-- Comment Form
								============================================= -->
								<div id="respond" class="clearfix">

									<h3>Leave a <span>Comment</span></h3>

                                 	<form class="clearfix" action="{{ route('comment.store', ['id' => $post->id]) }}" method="POST">
                                            {{ csrf_field() }}
										<div class="col_one_third">
											<label for="author">Name</label>
											<input type="text" name="name" id="author"  size="22"  class="sm-form-control" />
										</div>

										<div class="col_one_third">
											<label for="email">Email</label>
											<input type="text" name="email" id="email"  size="22"  class="sm-form-control" />
                                        </div>

										<div class="clear"></div>

										<div class="col_full">
											<label for="comment">Comment</label>
											<textarea name="comment" cols="58" rows="7"  class="sm-form-control"></textarea>
										</div>

										<div class="col_full nobottommargin">
                                            <button type="submit" class="btn btn-outline-info d-flex btn-block justify-content-center"><i class="fa fa-paper-plane"></i> Submit</button>
										</div>

									</form>

								</div><!-- #respond end -->

							</div><!-- #comments end -->

						</div>

					</div><!-- .postcontent end -->
				</div>

			</div>

		</section><!-- #content end -->

@endsection
