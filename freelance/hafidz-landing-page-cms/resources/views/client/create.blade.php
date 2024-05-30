@extends('layouts/private-layout')
@section('content')
          <div class="main-content">
            <div class="pagetitle">
                <h1>Client Page Section</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Client</li>
                    </ol>
                </nav>
              </div>
         
            
            <form method="post" action="{{ route('client.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="card mt-5">
                <div class="card-header">
                  <h3>Add New Client Content</h3>
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
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" value="{{ old('name') }}"  placeholder="Name">
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
  