@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Selamat Datang!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Tahniah!') }}
                    <br>
                    {{ __('Anda telah berjaya memasuki Sistem Perancangan Belanjawan Tahunan') }}
                    <br>
                    Sila klik di bawah untuk ke halaman Maklumat Aktiviti
                    <br>
                    <a class="btn btn-success padding: 10px 24px; btn-outline col-4" href="{{ route('aktiviti.index') }}">MAKLUMAT AKTIVITI</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
