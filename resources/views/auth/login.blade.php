@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                There were some errors with your request.
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row mb-3">
                            <label for="no_kp" class="col-md-4 col-form-label text-md-end">{{ __('Nombor Kad Pengenalan') }}</label>

                            <div class="col-md-6">
                                <input id="no_kp" type="number" class="form-control @error('no_kp') is-invalid @enderror" name="no_kp" value="{{ old('no_kp') }}" required autocomplete="no_kp" autofocus>
                             </div>
                        </div>

                        <div class="row mb-3">
                            <label for="katalaluan" class="col-md-4 col-form-label text-md-end">{{ __('Katalaluan') }}</label>

                            <div class="col-md-6">
                                <input id="katalaluan" type="password" class="form-control @error('katalaluan') is-invalid @enderror" name="katalaluan" required autocomplete="current-katalaluan">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Masuk') }}
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
