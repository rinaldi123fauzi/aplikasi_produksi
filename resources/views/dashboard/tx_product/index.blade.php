@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-txproducts-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Transaksi Produk</h1>
  </div>
  @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif
  <div class="table-responsive col-lg-8">
    <a href="/txproduct/create" class="btn btn-primary mb-3">Create</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kode Item</th>
          <th scope="col">Lokasi</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($txproducts as $txproduct)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $txproduct->item->kode }}</td>
          <td>{{ $txproduct->location->kode }}</td>
          <td>
            <a href="/txproduct/{{ $txproduct->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/txproduct/{{ $txproduct->id }}" method="post" class="d-inline">
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