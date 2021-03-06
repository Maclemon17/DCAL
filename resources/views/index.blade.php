@extends('layouts.main')

@section('title', 'Home')
   
@section('navBtn')
    @if (!Auth::guest())
        <a href="{{ url('/posts') }}" class="get-started-btn scrollto">Manage Posts</a>
    @endif
@endsection

@section('content')
    <section id="hero" class="d-flex align-items-center">
        <div class="container-fluid" data-aos="zoom-out" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row">
                        <div class="col-xl-7">
                            <h1>Directorate for Collaborations, Affilations and Linkages</h1>
                            <h2><span class="typed" data-typed-items="Memorandum of Understanding"></h2>
                            <a href="{{ route('mou') }}" class="btn-get-started scrollto">Goto MoU</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
