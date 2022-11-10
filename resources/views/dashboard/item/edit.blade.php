@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Item</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/item/{{ $item->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Item</label>
                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" autofocus value="{{ old('kode', $item->kode) }}">
                @error('kode')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>
            <div class="mb-3">
              <label for="nama_item" class="form-label">Nama Item</label>
              <input type="text" class="form-control @error('nama_item') is-invalid @enderror" id="nama_item" name="nama_item" autofocus value="{{ old('nama_item', $item->nama_item) }}">
              @error('nama_item')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection