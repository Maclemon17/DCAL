@extends('layouts.main')

@section('navBtn')
    <a href="{{ route('posts.create') }}" class="get-started-btn scrollto">Create new post</a>
@endsection

@section('content')
   
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Post</li>
                </ol>
                <h2>All Posts</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
               
                <div class="row">

                    <div class=" col-md- entries">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <article class="entry">

                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <th>#</th>
                                    <th>Doc Num</th>
                                    <th>Organization Name</th>
                                    <th>Purpose</th>
                                    <th>Created At</th>
                                    <th>Doc</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td> {{ $count++ }} </td>
                                            <td> {{ $post->docNum }} </td>
                                            <td> {{ $post->OrgName }} </td>
                                            <td> {{ strlen($post->keywords) > 10 ? substr_replace($post->keywords, "...", 20): $post->keywords }} </td>
                                            <td> {{ date('M,j Y', strtotime($post->created_at)) }} </td>
                                            <td>{{ $post->file }}</td>
                                            <td class="d-flex ">
                                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                                @method('POST')
                                                <a href="{{ route('posts.destroy', $post->id) }}" type="submit" class="btn btn-sm btn-outline-danger">Delete</a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="blog-pagination">
                                <div class="d-flex justify-content-center">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </article><!-- End blog entry -->
                    </div>
                </div>
            </div>
        </section>
        {{-- <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div> --}}
    </main>

@endsection