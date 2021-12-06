@extends('layouts.main')

@section('title', 'Update Posts')

@section('navBtn')
    <a href="{{ route('posts.index') }}" class="get-started-btn scrollto">Back</a>
@endsection

@section('content')
<section id="main" class="d-flex align-items-center">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Update MOU</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="docNum">Document Number</label>
                        <input type="text" name="docNum" id="docNum" class="form-control" placeholder="Serial Number" value="{{ $post->docNum }}">
                    </div>
                    <div class="form-group">
                        <label for="OrgName">Name of Orgnisation</label>
                        <input type="text" name="OrgName" id="OrgName" class="form-control" value="{{ $post->OrgName }}">
                    </div>
                    <div class="form-group">
                        <label for="signDate">Date Signed</label>
                        <input type="date" name="signDate" id="signDate" class="form-control" value="{{ $post->signDate }}">
                    </div>
                    <div class="form-group">
                        <label for="ExpDate">Exp Date</label>
                        <input type="date" name="ExpDate" id="ExpDate" class="form-control" value="{{ $post->ExpDate }}">
                    </div>
                    <div class="form-group">
                        <label for="keywords">Keywords</label>
                        <textarea name="keywords" id="keywords" class="form-control"  cols="30" rows="10">{{ $post->keywords }}</textarea>
                    </div>
                    <div class="form-group mb-5">   
                        <label for="file">Document Attached</label>
                        <input type="file" name="file" id="file" class="form-control" value="{{ $post->file }}">    
                    </div>
                    <input type="submit" value="Save Changes" class="btn btn-outline-danger" >
                </form>
            </div>
        </div>
    </div>

</section>
    
@endsection