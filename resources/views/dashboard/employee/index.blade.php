@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Karyawan</h1>
  </div>
  @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif
  <div class="table-responsive col-lg-8">
    <a href="/employee/create" class="btn btn-primary mb-3">Create</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">NPK</th>
          <th scope="col">Nama</th>
          <th scope="col">Alamat</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($employees as $employee)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $employee->npk }}</td>
          <td>{{ $employee->nama }}</td>
          <td>{{ $employee->alamat }}</td>
          <td>
            <a href="/dashboard/employee/{{ $employee->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/employee/{{ $employee->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/employee/{{ $employee->id }}" method="post" class="d-inline">
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