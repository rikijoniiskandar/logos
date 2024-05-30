@extends('layouts/private-layout')
@section('content')
    <div class="col-lg-12">
        <div class="pagetitle">
            <h1>About Page Section</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </nav>
          </div>
            <div class="card ">
              <div class="card-header">
                <h5>List About Section</h5>
                <a class="btn btn-primary" href="{{ route('abouts.create') }}">Add about content</a>
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
                        <th>Image</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($abouts as $about)
                        <tr>
                          <td><img src="{{ asset($about->image) }}" class="img-thumbnail" style="width:200px" /></td>
                          <td>{{ $about->title }}</td>
                          <td>{{ $about->content }}</td>
                          <td>
                            <form method="POST" action="{{url('abouts/update-status', $about->id)}}" onsubmit="return confirm('Apakah Anda yakin ingin mengubah status data ini?')">
                              @csrf
                              @method('PATCH')
                              {{-- <input type="checkbox" class="button is-inverted" style="margin-top: 10px;" name="is_active" value="{{ $about->is_active ? '1' : '0' }}"></input> --}}
                              <button type="submit" class="btn btn-sm btn-{{ $about->is_active ? 'success' : 'secondary' }}">
                                {{ $about->is_active ? 'Active' : 'Inactive' }}
                            </button>
                            </form>
                          </td>
                          <td>
                            <a href="{{ route('abouts.edit', $about->id) }}" class="btn btn-sm btn-primary">Edit</a>
                          </td>
                          <td>
                            <form method="POST" action="{{ route('abouts.destroy', $about->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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