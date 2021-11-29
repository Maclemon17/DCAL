@extends('layouts.main')

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

                            {{-- <div class="entry-img">
                                    <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
                                </div> --}}

                            <h2 class="entry-title">
                                <a href="blog-single.html">{{ $post->OrgName }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="text-danger">Document Number:</i> <a
                                            href="#">{{ $post->docNum }}</a>
                                    </li>
                                    {{-- <li class=" lign-items-center"><i class="icofont-clock-time text-danger"></i> <a
                                            href="#"><time
                                                datetime="2020-01-01">{{ $post->ExpDate }}</time></a>
                                    </li> --}}
                                    <li class="d-flex align-items-center"><i class="text-danger">MoU Document:</i> <a
                                            href="#">{{ $post->file }}</a>
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
                                
                                {{-- <div class="float-right share">
                                    <a href="#"><i class="">Created: </i>{{ date('M Y', strtotime($post->created_at)) }}</a>
                                </div> --}}
                                
                                <div class="float-right">
                                    <a href="{{ url('/download', $post->file) }}" class="btn btn-success">Download File</a>
                                </div>
                            </div>
                            
                        </article><!-- End blog entry -->

                        {{-- <div class="blog-author clearfix">
                            <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
                            <h4>DCAL</h4>
                            <div class="social-links">
                                <a href="https://twitters.com/#"><i class="icofont-twitter"></i></a>
                                <a href="https://facebook.com/#"><i class="icofont-facebook"></i></a>
                                <a href="https://instagram.com/#"><i class="icofont-instagram"></i></a>
                            </div>
                            <p>
                                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas
                                repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde
                                voluptas.
                            </p>
                        </div><!-- End blog author bio --> --}}

                    </div><!-- End blog entries list -->

                </div>

            </div>
        </section><!-- End Blog Single Section -->

    </main><!-- End #main -->

@endsection
