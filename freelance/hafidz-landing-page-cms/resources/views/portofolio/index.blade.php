@extends('layouts/private-layout')
@section('content')
    <div class="col-lg-12">
        <div class="pagetitle">
            <h1>Portofolio Page Section</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Portofolio</li>
                </ol>
            </nav>
          </div>
            <div class="card ">
              <div class="card-header">
                <h5>List porto Section</h5>
                <a class="btn btn-primary" href="{{ route('portofolios.create') }}">Add portofolio content</a>
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
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($portofolios as $porto)
                        <tr>
                          <td><img src="{{ asset($porto->image) }}" class="img-thumbnail" style="width:200px" /></td>
                          <td>{{ $porto->name }}</td>
                          <td>
                            <form method="POST" action="{{url('portofolios/update-status', $porto->id)}}" onsubmit="return confirm('Apakah Anda yakin ingin mengubah status data ini?')">
                              @csrf
                              @method('PATCH')
                              {{-- <input type="checkbox" class="button is-inverted" style="margin-top: 10px;" name="is_active" value="{{ $porto->is_active ? '1' : '0' }}"></input> --}}
                              <button type="submit" class="btn btn-sm btn-{{ $porto->is_active ? 'success' : 'secondary' }}">
                                {{ $porto->is_active ? 'Active' : 'Inactive' }}
                            </button>
                            </form>
                          </td>
                          <td>
                            <a href="{{ route('portofolios.edit', $porto->id) }}" class="btn btn-sm btn-primary">Edit</a>
                          </td>
                          <td>
                            <form method="POST" action="{{ route('portofolios.destroy', $porto->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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