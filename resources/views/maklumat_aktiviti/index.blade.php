@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"style="text-align:center" >{{ __('Maklumat Aktiviti') }}
                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('aktiviti.index')}}">
                        <select name="tahun" class='select2 col-md-2'>
                            <option value="SEMUA">SEMUA TAHUN</option>
                            @foreach($listtahun as $tahun) <!-- condition ? output1 : output2 -->
                                <option value="{{$tahun->tahun}}" {{$current_year == $tahun->tahun ? 'selected' : ''}}>{{$tahun->tahun}}</option>
                            @endforeach
                        </select>
                        <input type="submit" value='CARI' class='btn btn-primary btn-sm'>
                    </form>

                    <table id="table" class="table table-striped" data-show-toggle="true" data-paging="true" data-filtering="true" data-sorting="true" data-state="true" data-toggle-column="last" data-use-parent-width="true" data-filter-position="right">
                        <thead>
                            <td width="10%">Tarikh</td>
                            <td width="10%">Jenis</td>
                            <td width="20%">Aktiviti</td>
                            <td width="10%">Peruntukan (RM)</td>
                            <td width="30%">Catatan</td>
                            <td width="20%">Tindakan</td>
                            <td width="20%" data-breakpoints="xs sm md lg">Tahun</td>
                            <td width="20%" data-breakpoints="xs sm md lg">Nama</td>
                            <td width="20%" data-breakpoints="xs sm md lg">Jawatan</td>
                            <td width="20%" data-breakpoints="xs sm md lg">Bahagian/Unit</td>
                        </thead>
                        <tbody>
                            @foreach($aktivitis as $aktiviti)
                            <tr style="text-transform:uppercase">
                                <!-- condition ? output1 : output2 -->
                                
                                <td>{{ date('d/m/Y', strtotime($aktiviti->tarikh_mula))}} {{$aktiviti->tarikh_akhir ? 'hingga '.date('d/m/Y', strtotime($aktiviti->tarikh_akhir)) : ''}}</td>
                                <td>{{$aktiviti->jenis}}</td>
                                <td>{{$aktiviti->nama_aktiviti}}</td>
                                <td>{{$aktiviti->peruntukan}}</td>
                                <td>{{$aktiviti->catatan}}</td>
                                <td>
                                    <!-- <a class="btn btn-sm btn-primary pull-right">PADAM</a> -->
                                    <form action='{{ route("aktiviti.destroy")}}' class="row" method="post">
                                        @csrf
                                        <input type="hidden" name="id_aktiviti" value="{{$aktiviti->id_aktiviti}}">
                                        <a class="btn btn-sm btn-primary col-6" href="{{ route('aktiviti.edit', $aktiviti->id_aktiviti)}}">UBAH</a>
                                        <input type="submit" class="btn btn-sm btn-danger col-6" value="PADAM">
                                    </form>
                                </td>
                                <td>{{$aktiviti->tahun}}</td>
                                <td>{{$aktiviti->pengguna->nama}}</td>
                                <td>{{$aktiviti->pengguna->jawatan}}</td>
                                <td>{{$aktiviti->pengguna->bahagian_unit}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="row">
                            <span class="col-10" style="text-align:center">JUMLAH KESELURUHAN PERUNTUKAN {{$current_year}} : RM {{$aktivitis->sum('peruntukan')}} </span>
                            <a class="btn btn-success padding: 10px 24px; btn-outline col-2" href="{{ route('aktiviti.create')}}">TAMBAH AKTIVITI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table').footable({
			"paging": {
				"enabled": true
			},
			"filtering": {
				"enabled": true
			},
			"sorting": {
				"enabled": true
			}
		});
    });
</script>

@endsection
