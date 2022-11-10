@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Karyawan</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/employee">
            @csrf
            <div class="mb-3">
                <label for="npk" class="form-label">NPK</label>
                <input type="text" class="form-control @error('npk') is-invalid @enderror" id="npk" name="npk" autofocus value="{{ old('npk') }}">
                @error('npk')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old('nama') }}">
              @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" cols="30" rows="10">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection