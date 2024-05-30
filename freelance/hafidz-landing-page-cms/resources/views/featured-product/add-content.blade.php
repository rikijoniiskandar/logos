@extends('layouts.private-layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card ">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-header ">Add content in {{ $featured_product->header }}</div>
                <div class="ms-4 mt-4">
                    <label for="" class="labels text-secondary">Header</label>
                    <h5>{{ $featured_product->header }}</h5>

                    <label class="labels text-secondary">Subheader</label>
                    <h5>{{ $featured_product->subheader }}</h5>
                    <label class="labels text-secondary">Content</label>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>

                            </tr>
                        </thead>
                        {{-- {{ $featured_content}} --}}
                        <tbody>
                            @forelse (json_decode($featured_product->content) as $content)
                                <tr>
                                    <td>{{ $content->title }}</td>
                                    <td>{{ $content->description }}</td>
                                    <td>
                                        <img src="{{ asset($content->image) }}" class="img-thumbnail" style="width:200px" />
                                    </td>
                                    {{-- <td>
                                            <form method="POST" action="{{ route('featured-products.destroy', $feature->id) }}" onsubmit="return confirm('Are you sure you want to delete this?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>  --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        No record found!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
                <div class="card-body">

                    <!-- Form to add new array -->

                    <!-- Form to add new array -->
                    <form method="POST"
                        action="{{ route('featured-products.addContent', ['id' => $featured_product->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Content form</label>
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                    placeholder="Title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea type="text" class="form-control" name="description" value="{{ old('description') }}"
                                    placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            <input class="form-control" type="file" name="image" id="formFile">
                        </div>

                        <!-- Add more fields as needed -->

                        <button type="submit" class="btn btn-sm btn-primary">Add Content</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
