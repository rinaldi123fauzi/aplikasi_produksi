@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Lokasi</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/location/{{ $location->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Lokasi</label>
                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" autofocus value="{{ old('kode', $location->kode) }}">
                @error('kode')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>
            <div class="mb-3">
              <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
              <input type="text" class="form-control @error('nama_lokasi') is-invalid @enderror" id="nama_lokasi" name="nama_lokasi" autofocus value="{{ old('nama_lokasi', $location->nama_lokasi) }}">
              @error('nama_lokasi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection