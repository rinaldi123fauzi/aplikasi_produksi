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
    <a href="/tx_product/create" class="btn btn-primary mb-3">Create</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Kode Item</th>
          <th scope="col">Nama Item</th>
          <th scope="col">Kode Lokasi</th>
          <th scope="col">Nama Lokasi</th>
          <th scope="col">Created By</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($txproducts as $txproduct)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $txproduct->transaction_date }}</td>
          <td>{{ $txproduct->item->kode }}</td>
          <td>{{ $txproduct->item->nama_item }}</td>
          <td>{{ $txproduct->location->kode }}</td>
          <td>{{ $txproduct->location->nama_lokasi }}</td>
          <td>{{ $txproduct->npk }}</td>
          <td>
            @if (auth()->user()->username != "superadmin")
              <a href="/tx_product/{{ $txproduct->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              <form action="/tx_product/{{ $txproduct->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
              </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection