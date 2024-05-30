@extends('layouts/private-layout')
@section('content')
    <div class="main-content">
        <div class="pagetitle">
            <h1>Featured Product Section</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Featured Product</li>
                </ol>
            </nav>
        </div>


        <form method="post" action="{{ route('featured-products.updateContent', $featured_product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card mt-5">
                <div class="card-header">
                    <h3>Edit Featured Product</h3>
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
                        <label class="form-label">Header</label>
                        <input type="text" class="form-control" name="header" value="{{ $featured_product->header }}"
                            placeholder="Header">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subheader</label>
                        <input type="text" class="form-control" name="subheader" value="{{ $featured_product->subheader }}"
                            placeholder="Subheader">
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
