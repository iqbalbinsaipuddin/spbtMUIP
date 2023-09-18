@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center">{{ __('MAKLUMAT AKTIVITI') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('aktiviti.store')}}" method='post'>
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <Label for="nama">NAMA</Label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="col-12" name="nama" required maxlength="100" disabled value="{{$current_user->nama}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <Label for="unit">BAHAGIAN/UNIT</Label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="col-12" name="unit" disabled value="{{$current_user->bahagian_unit}}">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <Label for="tahun">TAHUN</Label>
                            </div>
                            <div class="col-9">
                                <input type="number" class="col-12" name="tahun" required min="2000" max="2030">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <Label for="tarikh_mula">TARIKH</Label>
                            </div>
                            <div class="col-3">
                                <input type="date" class="col-12" name="tarikh_mula" required>
                            </div>
                            <div class="col-3">
                                <Label for="tarikh_akhir">SEHINGGA</Label>
                            </div>
                            <div class="col-3">
                                <input type="date" class="col-12" name="tarikh_akhir">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <Label for="jenis">JENIS</Label>
                            </div>
                            <div class="col-9">
                                <select class="col-12 select2" name="jenis" required>
                                    <option></option>
                                    <option value="latihan">Latihan</option>
                                    <option value="sewaan">Sewaan</option>
                                    <option value="mesyuarat">Mesyuarat</option>
                                    <option value="forum">Forum</option>
                                    <option value="lain-lain">Lain-lain</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <Label for="nama_aktiviti">AKTIVITI</Label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="col-12" name="nama_aktiviti" required maxlength="100">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <Label for="peruntukan">PERUNTUKAN (RM)</Label>
                            </div>
                            <div class="col-9">
                                <input type="number" class="col-12" name="peruntukan" required step="0.01">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <Label for="catatan">CATATAN</Label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="col-12" name="catatan" required maxlength="100">
                            </div>
                        </div>
                        <div>
                            <input class="btn btn-sm btn-success" type="submit">
                            <a class="btn btn-sm btn-secondary" href="{{ url()->previous()}}">Kembali</a>
                         
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.select2').select2({
         placeholder: 'Select an option',
        });
    });
</script>

@endsection
