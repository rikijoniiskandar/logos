@extends('layouts/private-layout')
@section('content')
          <div class="main-content">
            <div class="pagetitle">
                <h1>Home Page Section</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Hero</li>
                    </ol>
                </nav>
              </div>
         
            
            <form method="post" action="{{ route('hero.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="card mt-5">
                <div class="card-header">
                  <h3>Add New Heroes</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <div class="alert-title"><h4>Whoops!</h4></div>
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
                    <div class="mb-3 mt-3">
                      <label class="form-label">Title</label>
                      <input type="text" class="form-control" name="title" value="{{ old('title') }}"  placeholder="Title">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Subtitle</label>
                      <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle') }}"  placeholder="Subtitle">
                    </div>
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Image</label>
                      <input class="form-control" type="file" name="image" id="formFile">
                    </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Create</button>
                </div>
              </div>
            </form>
        </div>
@endsection
  