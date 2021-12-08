@extends('layouts.main')

@section('title', 'MoU')

@section('navBtn')
    @if (!Auth::guest())
        <a href="{{ url('/posts') }}" class="get-started-btn scrollto">Manage Posts</a>

    @endif
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>MoU</li>
                </ol>
                <h2> All MoU</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">
                        @if ($posts->count() > 0)

                            @foreach ($posts as $post)

                                <article class="entry">

                                        {{-- <div class="entry-img">
                                    <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
                                    </div> --}}

                                    <h2 class="entry-title">
                                        <a href="#">{{ $post->OrgName }}</a>
                                    </h2>

                                    <div class="entry-meta">
                                        <ul>
                                            <li class="d-flex align-items-center"><i class="icofont-stamp text-danger"></i>
                                                <a
                                                    href="#">{{ Carbon\Carbon::parse($post->signDate)->diffForHumans() }}</a>
                                            </li>
                                            <li class="d-flex align-items-center"><i
                                                    class="icofont-hour-glass text-danger"></i>
                                                <a href="#"><time datetime="2020-01-01">{{ $post->ExpDate }}</time></a>
                                            </li>
                                            <li class="d-flex align-items-center"><i
                                                    class="icofont-attachment text-danger"></i>
                                                <a href="#">{{ $post->docNum }}</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="entry-content">
                                        <p>{{ strlen($post->keywords) > 150 ? substr_replace($post->keywords, '...', 250) : $post->keywords }}
                                        </p>
                                        <div class="read-more">
                                            <a href="{{ route('mou.single', $post->id) }}">Read More</a>
                                        </div>
                                    </div>


                                </article><!-- End blog entry -->

                            @endforeach
                        @else()
                            <h2 class="entry-title">No Posts</h2>
                        @endif


                        <div class="blog-pagination">
                            <ul class="justify-content-center">
                                {{ $posts->links() }}
                            </ul>
                        </div>
                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        <div class="sidebar">

                            <h3 class="sidebar-title">Search</h3>
                            <div class="sidebar-item search-form">
                                <form action="{{ route('search') }}" type='get'>
                                    <input type="search" name="search" placeholder="Search MoU by Org name">
                                    <button type="submit"><i class="icofont-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->

                            <h3 class="sidebar-title">Recent Posts</h3>
                            <div class="sidebar-item recent-posts">
                                @foreach ($recents as $recent)
                                    <div class="post-item clearfix">
                                        <img src="assets/img/blog/blog-recent-1.jpg" alt="">
                                        <h4><a href="#">{{ $recent->OrgName }}</a></h4>
                                        <time datetime="2021-01-01">{{ $recent->signDate }}</time>
                                    </div>
                                @endforeach

                            </div><!-- End sidebar recent posts-->

                        </div><!-- End sidebar -->

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main>
@endsection
