@extends('layouts/private-layout')
@section('content')
    <div class="main-content">
        <div class="pagetitle">
            <h1>About Page Section</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </nav>
        </div>


        <form method="post" action="{{ route('abouts.update', $about->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card mt-5">
                <div class="card-header">
                    <h3>Edit About Content</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <div class="alert-title">
                                <h4>Whoops!</h4>
                            </div>
                            There are some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $about->title }}"
                            placeholder="Title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea class="form-control" name="content" value="{{  $about->content }}"  placeholder="Write content here ..">
                            {{$about->content}}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" name="image" id="formFile">
                    </div>
                    <img src="@if($about->image == '' || $about->image == null){{ asset('image/default.png') }} @else{{ asset($about->image) }} @endif"
                        id="imagePreview" class="imgUpload" alt="">
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
