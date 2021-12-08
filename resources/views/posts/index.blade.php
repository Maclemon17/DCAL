@extends('layouts.main')

@section('title', 'All Posts')

@section('navBtn')
    <a href="{{ route('posts.create') }}" class="get-started-btn scrollto">Create new post</a>
@endsection

@section('content')
    <div id="main">
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

        <section id="blog" class="blog">

            <div class="row">
                <div class="container">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered">
                            <thead>
                                <th>#</th>
                                <th>Doc Num</th>
                                <th>Organization Name</th>
                                <th>Purpose</th>
                                <th>Created</th>
                                <th>Doc Name</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr class="">
                                        <td> {{ $count++ }} </td>
                                        <td> {{ $post->docNum }} </td>
                                        <td> {{ $post->OrgName }} </td>
                                        <td> {{ strlen($post->keywords) > 10 ? substr_replace($post->keywords, '...', 20) : $post->keywords }}
                                        </td>
                                        <td> {{ date('M,j Y', strtotime($post->created_at)) }} </td>
                                        <td>{{ $post->docName }}</td>
                                        <td class="d-flex justify-content-around">
                                            <div>
                                                <a href="{{ route('mou.single', $post->id) }}"
                                                    class="btn btn-sm btn-outline-primary">View</a>
                                            </div>

                                            <div>
                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                    class="btn btn-sm btn-outline-warning">Edit</a>
                                            </div>

                                            <div>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                    {{-- <input type="search" name="search" placeholder="Search MoU by Org name"> --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-outline-danger" onclick=" return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination Links --}}
                    <div class="d-flex justify-content-center text-danger">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
