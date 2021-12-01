@extends('layouts.main')

@section('title', 'Search')

@section('navBtn')
    <a href="{{ route('mou')}}" class="get-started-btn scrollto">Back</a>
@endsection

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('mou') }}">MoU</a></li>
            </ol>
            <h2>Search results</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">

                <div class="col-lg-12 entries">

                    <article class="entry">
                        @if ($post->count() > 0)
                            
                            @foreach ($post as $post)
                                
                                <h2 class="entry-title">
                                    <a href="blog-single.html">{{ $post->OrgName }}</a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="icofont-stamp text-danger"></i> <a
                                                href="blog-single.html">{{ $post->signDate }}</a>
                                        </li>
                                        <li class="d-flex align-items-center"><i class="icofont-clock-time text-danger"></i> <a
                                                href="blog-single.html"><time
                                                    datetime="2020-01-01">{{ $post->ExpDate }}</time></a>
                                        </li>
                                        <li class="d-flex align-items-center"><i class="icofont-attachment text-danger"></i> <a
                                                href="blog-single.html">{{ $post->docNum }}</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="entry-content">
                                    <p> {{ strlen($post->keywords) > 100 ? substr_replace($post->keywords, "...", 100): $post->keywords }} </p>
                                    <div class="read-more">
                                        <a href="{{ route('mou.single', $post->id) }}">View</a>
                                    </div>
                                </div>
                                <hr>
                            @endforeach

                        @else
                            <h2 class="entry-title">No results found</h2>
                        @endif

                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->

</main><!-- End #main -->

@endsection