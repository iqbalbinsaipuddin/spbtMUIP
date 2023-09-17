@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- nama -->
                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- No KP -->
                        <div class="row mb-3">
                            <label for="no_kp" class="col-md-4 col-form-label text-md-end">{{ __('Nombor Kad Pengenalan') }}</label>

                            <div class="col-md-6">
                                <input id="no_kp" type="no_kp" class="form-control @error('no_kp') is-invalid @enderror" name="no_kp" value="{{ old('no_kp') }}" required autocomplete="no_kp">

                                @error('no_kp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Katalaluan -->
                        <div class="row mb-3">
                            <label for="katalaluan" class="col-md-4 col-form-label text-md-end">{{ __('Katalaluan') }}</label>

                            <div class="col-md-6">
                                <input id="katalaluan" type="password" class="form-control @error('katalaluan') is-invalid @enderror" name="katalaluan" required autocomplete="new-katalaluan">

                                @error('katalaluan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Katalaluan confirmed -->
                        <div class="row mb-3">
                            <label for="katalaluan-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Pastikan Katalaluan') }}</label>

                            <div class="col-md-6">
                                <input id="katalaluan-confirm" type="password" class="form-control" name="katalaluan_confirmation" required autocomplete="new-katalaluan">
                            </div>
                        </div>

                        <!-- Jawatan -->
                        <div class="row mb-3">
                            <label for="jawatan" class="col-md-4 col-form-label text-md-end">{{ __('Jawatan') }}</label>

                            <div class="col-md-6">
                                <input id="jawatan" type="text" class="form-control @error('jawatan') is-invalid @enderror" name="jawatan" value="{{ old('jawatan') }}" required autocomplete="jawatan" autofocus>

                                @error('jawatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Bahagian/unit -->
                        <div class="row mb-3">
                            <label for="bahagian_unit" class="col-md-4 col-form-label text-md-end">{{ __('Bahagian/Unit') }}</label>

                            <div class="col-md-6">
                                <input id="bahagian_unit" type="text" class="form-control @error('bahagian_unit') is-invalid @enderror" name="bahagian_unit" value="{{ old('bahagian_unit') }}" required autocomplete="bahagian_unit" autofocus>

                                @error('bahagian_unit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
