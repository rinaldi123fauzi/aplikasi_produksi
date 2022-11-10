@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah User</h1>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/user">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name') }}">
                @error('name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="category" class="form-label">Username</label>
                <select class="form-select" name="username">
                    <option selected>Open this select menu</option>
                    @foreach ($employees as $employee)
                        @if (old('username') == $employee->npk)
                            <option value="{{ $employee->npk }}" selected>{{ $employee->npk }} - {{ $employee->nama }}</option>
                        @else
                            <option value="{{ $employee->npk }}">{{ $employee->npk }} - {{ $employee->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autofocus value="{{ old('email') }}">
                @error('email')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autofocus value="{{ old('password') }}">
                @error('password')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection