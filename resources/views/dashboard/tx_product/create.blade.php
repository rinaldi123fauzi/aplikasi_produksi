@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Transaksi Produk</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/tx_product">
            @csrf
            <div class="mb-3">
                <label for="transaction_date" class="form-label">Tanggal</label>
                <input type="text" class="form-control @error('transaction_date') is-invalid @enderror" id="transaction_date" name="transaction_date" value="{{ now()->format('Y-m-d H:i:s')  }}" readonly>
                @error('transaction_date')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Lokasi</label>
                <select class="form-select" name="location_id" autofocus>
                    <option selected>Open this select menu</option>
                    @foreach ($locations as $location)
                        @if (old('location_id') == $location->id)
                            <option value="{{ $location->id }}" selected>{{ $location->nama_lokasi }}</option>
                        @else
                            <option value="{{ $location->id }}">{{ $location->nama_lokasi }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Item</label>
                <select class="form-select" name="item_id">
                    <option selected>Open this select menu</option>
                    @foreach ($items as $item)
                        @if (old('item_id') == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_item }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->nama_item }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="qty_transaction" class="form-label">Qty </label>
                <input type="number" class="form-control @error('qty_transaction') is-invalid @enderror" id="qty_transaction" name="qty_transaction" value="{{ old('qty_transaction') }}">
                @error('qty_transaction')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection