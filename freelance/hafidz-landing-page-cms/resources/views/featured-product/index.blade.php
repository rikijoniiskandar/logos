@extends('layouts/private-layout')
@section('content')
    <div class="col-lg-12">
        <div class="pagetitle">
            <h1>Featured Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Featured Product</li>
                </ol>
            </nav>
        </div>
        <div class="card ">
            <div class="card-header">
              <h5>Featured Products Content</h5>
              <a class="btn btn-sm btn-primary" href="{{ route('featured-products.create') }}">Add New Featured</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif
  
                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <table class="table table-striped table-bordered mt-3">
                  <thead>
                    <tr>
                      {{-- <th>Image</th> --}}
                      <th>Header</th>
                      <th>Subheader</th>
                      <th>Content</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($featured_products as $feature)
                      <tr>
                        <td>{{ $feature->header }}</td>
                        <td>{{ $feature->subheader }}</td>
                        <td>
                          <ul>
                            @foreach(json_decode($feature->content) as $content)
                              <li>Title: {{ $content->title }}</li>
                              <li>Description: {{ $content->description }}</li>
                              <li><img src="{{ asset($content->image) }}" class="img-thumbnail" style="width:200px" /></li>
                            @endforeach
                          </ul> <br>
                          <a class="btn btn-sm btn-primary" href="{{ route('featured-products.editContent', $feature->id) }}">Add New Content</a>
                        </td>
                        <td>
                          <form method="POST" action="{{url('featured-products/update-status', $feature->id)}}" onsubmit="return confirm('Apakah Anda yakin ingin mengubah status data ini?')">
                            @csrf
                            @method('PATCH')
                           
                            <button type="submit" class="btn btn-sm btn-{{ $feature->is_active ? 'success' : 'secondary' }}">
                              {{ $feature->is_active ? 'Active' : 'Inactive' }}
                          </button>
                          </form>
                        </td>
                        <td>
                          <a href="{{ route('featured-products.edit', $feature->id) }}" class="btn btn-sm btn-primary">Edit</a>
                          <form class="mt-2" method="POST" action="{{ route('featured-products.destroy', $feature->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                        </td>
                        
                      </tr>
                    @empty
                      <tr>
                        <td colspan="999" class="text-center">
                            No record found!
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>

              </div>
        </div>
    </div>
@endsection
