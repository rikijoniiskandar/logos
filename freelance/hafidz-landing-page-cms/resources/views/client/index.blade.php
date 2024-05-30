@extends('layouts/private-layout')
@section('content')
    <div class="col-lg-12">
        <div class="pagetitle">
            <h1>Client Page Section</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Clients</li>
                </ol>
            </nav>
          </div>
            <div class="card ">
              <div class="card-header">
                <h5>List clients Section</h5>
                <a class="btn btn-primary" href="{{ route('client.create') }}">Add client content</a>
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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($clients as $client)
                        <tr>
                          <td><img src="{{ asset($client->image) }}" class="img-thumbnail" style="width:200px" /></td>
                          <td>{{ $client->name }}</td>
                          <td>
                            <form method="POST" action="{{ route('client.destroy', $client->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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