@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Planning</h1>
  </div>
  @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif
  <div class="table-responsive col-lg-8">
    <a href="/planning/create" class="btn btn-primary mb-3">Create</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode</th>
          <th scope="col">Qty Target</th>
          <th scope="col">Waktu Target</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($plannings as $planning)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $planning->kode }}</td>
          <td>{{ $planning->qty_target }}</td>
          <td>{{ $planning->waktu_target }}</td>
          <td>
            <a href="/planning/{{ $planning->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/planning/{{ $planning->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection