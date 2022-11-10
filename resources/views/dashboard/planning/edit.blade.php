@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Planning</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/planning/{{ $planning->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="kode" class="form-label">Kode</label>
                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" autofocus value="{{ old('kode', $planning->kode) }}">
                @error('kode')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>
            <div class="mb-3">
              <label for="qty_target" class="form-label">Qty Target</label>
              <input type="number" class="form-control @error('qty_target') is-invalid @enderror" id="qty_target" name="qty_target" autofocus value="{{ old('qty_target', $planning->qty_target) }}">
              @error('qty_target')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="waktu_target" class="form-label">Waktu Target (Detik)</label>
                <input type="decimal" class="form-control @error('waktu_target') is-invalid @enderror" id="waktu_target" name="waktu_target" autofocus value="{{ old('waktu_target', $planning->waktu_target) }}">
                @error('waktu_target')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection