@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Achivement</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/achivement/{{ $achivement->id }}">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="kode" class="form-label">Kode</label>
              <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" autofocus value="{{ old('kode', $achivement->kode) }}">
              @error('kode')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="time_from" class="form-label">Time From</label>
              <input type="time" class="form-control @error('time_from') is-invalid @enderror" id="time_from" name="time_from" autofocus value="{{ old('time_from', $achivement->time_from) }}">
              @error('time_from')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="time_to" class="form-label">Time To</label>
                <input type="time" class="form-control @error('time_to') is-invalid @enderror" id="time_to" name="time_to" autofocus value="{{ old('time_to', $achivement->time_to) }}">
                @error('time_to')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection