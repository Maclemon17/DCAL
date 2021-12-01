@extends('layouts.main')

@section('navBtn')
    <a href="{{ route('posts.index') }}" class="get-started-btn scrollto">View all Post</a>
@endsection

@section('content')
    <section id="main" class="d-flex align-items-center">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    
                    <h1>Create New MOU</h1>
                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="docNum">Document Number</label>
                            <input type="text" name="docNum" id="docNum" class="form-control" placeholder="Serial Number" value="{{ old('docNum') }}">
                        </div>
                        <div class="form-group">
                            <label for="orgName">Name of Orgnisation</label>
                            <input type="text" name="orgName" id="orgName" class="form-control" value="{{ old('orgName') }}">
                        </div>
                        <div class="form-group">
                            <label for="signDate">Date Signed</label>
                            <input type="date" name="signDate" id="signDate" class="form-control" value="{{ old('signDate') }}">
                        </div>
                        <div class="form-group">
                            <label for="ExpDate">Exp Date</label>
                            <input type="date" name="ExpDate" id="ExpDate" class="form-control" value="{{ old('ExpDate') }}">
                        </div>
                        <div class="form-group">
                            <label for="keywords">Keywords</label>
                            <textarea name="keywords" id="keywords" class="form-control" placeholder="Purpose of Signing" cols="30" rows="10">{{ old('keywords') }}</textarea>
                        </div>
                        <div class="form-group mb-5">   
                            <label for="file">Document Attached</label>
                            <input type="file" name="file" id="file" class="form-control" value="{{ old('file') }}">
                        </div>
                        <input type="submit" value="Add MOU" class="btn btn-outline-danger">
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection