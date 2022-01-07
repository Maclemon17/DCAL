@extends('layouts.main')

@section('title', 'MoU - Single')

@section('navBtn')
    <a href="{{ route('mou') }}" class="get-started-btn scrollto">Back</a>
@endsection

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('mou') }}">MoU</a></li>
                    <li>{{ $post->docNum }}</li>
                </ol>
                <h2>{{ $post->OrgName }}</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">

                    <div class="col-lg-12 entries">

                        <article class="entry">

                            <h2 class="entry-title">
                                <a href="#" onclick="event.preventDefault()">{{ $post->OrgName }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="text-danger">Document Number:</i> <a
                                            href="#">{{ $post->docNum }}</a>
                                    </li>

                                    <li class="d-flex align-items-center"><i class="text-danger">MoU Document:</i> <a
                                            href="#">{{ $post->docName }}</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <h2>Purpose of Signing</h2>
                                <p> {{ $post->keywords }}</p>

                            </div>

                            <div class="entry-footer clearfix">
                                <div class="float-left">
                                    <i class="">Signed Date</i>
                                    <ul class="cats">
                                        <li><a href="#">{{ date('D, d M Y', strtotime($post->signDate)) }}</a></li>
                                    </ul>

                                    <i class="">Expiry Date</i>
                                    <ul class="tags">
                                        <li><a href="#">{{ date('D, d M Y', strtotime($post->ExpDate)) }}</a></li>

                                    </ul>
                                </div>

                                <div class="float-right">
                                    <a href="{{ url('/download', $post->file) }}"
                                        class="get-started-btn scrollto text-white">Download Document</a>
                                    @if (!Auth::guest())

                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="btn btn-outline-warning">Edit</a>

                                    @endif
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                    </div><!-- End blog entries list -->

                </div>

            </div>
        </section><!-- End Blog Single Section -->

    </main><!-- End #main -->

@endsection
