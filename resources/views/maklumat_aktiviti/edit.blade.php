@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center" >{{ __('UBAH MAKLUMAT AKTIVITI') }}
                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('aktiviti.update', $maklumat_aktiviti->id_aktiviti)}}" method='post'>
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <Label for="nama">NAMA</Label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="col-12" name="nama" required maxlength="100" disabled value="{{$current_user->name}}" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <Label for="unit">BAHAGIAN/UNIT</Label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="col-12" name="unit" disabled value="{{$current_user->id}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <Label for="tahun">TAHUN</Label>
                            </div>
                            <div class="col-9">
                                <input type="number" class="col-12" name="tahun" required min="2000" max="2030" value='{{$maklumat_aktiviti->tahun}}'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <Label for="tarikh_mula">TARIKH</Label>
                            </div>
                            <div class="col-3">
                                <input type="date" class="col-12" name="tarikh_mula" required value='{{date("Y-m-d", strtotime($maklumat_aktiviti->tarikh_mula))}}'>
                            </div>
                            <div class="col-3">
                                <Label for="tarikh_akhir">SEHINGGA</Label>
                            </div>
                            <div class="col-3">
                                <input type="date" class="col-12" name="tarikh_akhir" value='{{date("Y-m-d", strtotime($maklumat_aktiviti->tarikh_akhir))}}'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <Label for="jenis">JENIS</Label>
                            </div>
                            <div class="col-9">
                                <select class="col-12 select2" name="jenis" required>
                                    <option></option>
                                    <option value="latihan" {{ $maklumat_aktiviti->jenis == "latihan" ? 'selected' : '' }}>Latihan</option>
                                    <option value="sewaan" {{ $maklumat_aktiviti->jenis == "sewaan" ? 'selected' : '' }}>Sewaan</option>
                                    <option value="mesyuarat" {{ $maklumat_aktiviti->jenis == "mesyuarat" ? 'selected' : '' }}>Mesyuarat</option>
                                    <option value="forum" {{ $maklumat_aktiviti->jenis == "forum" ? 'selected' : '' }}>Forum</option>
                                    <option value="lain-lain" {{ $maklumat_aktiviti->jenis == "lain-lain" ? 'selected' : '' }}>Lain-lain</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <Label for="nama_aktiviti">AKTIVITI</Label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="col-12" name="nama_aktiviti" required maxlength="100" value='{{$maklumat_aktiviti->nama_aktiviti}}'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <Label for="peruntukan">PERUNTUKAN (RM)</Label>
                            </div>
                            <div class="col-9">
                                <input type="number" class="col-12" name="peruntukan" required step="0.1" value='{{$maklumat_aktiviti->peruntukan}}'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <Label for="catatan">CATATAN</Label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="col-12" name="catatan" required maxlength="100" value='{{$maklumat_aktiviti->catatan}}'>
                            </div>
                        </div>
                        <div>
                            <input type="submit">
                            <a class="btn btn-sm btn-primary" href="{{ route('aktiviti.index')}}">Kembali</a>
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
