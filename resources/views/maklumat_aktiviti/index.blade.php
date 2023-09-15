@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Maklumat Aktiviti') }}
                    <a class="pull-right" href="{{ route('aktiviti.create')}}">TAMBAH</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table>
                        <thead>
                            <td>Tarikh</td>
                            <td>Jenis</td>
                            <td>Aktiviti</td>
                            <td>Peruntukan (RM)</td>
                            <td>Catatan</td>
                            <td>Tindakan</td>
                        </thead>
                        <tbody>
                            @foreach($aktivitis as $aktiviti)
                            <tr>
                                <td>{{$aktiviti->tarikh_mula}} hingga {{$aktiviti->tarikh_akhir}}</td>
                                <td>{{$aktiviti->jenis}}</td>
                                <td>{{$aktiviti->nama_aktiviti}}</td>
                                <td>{{$aktiviti->peruntukan}}</td>
                                <td>{{$aktiviti->catatan}}</td>
                                <td>
                                    <button>UBAH</button>
                                    <button>PADAM</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
