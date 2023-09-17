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

                    <table id="table" class="table table-stripe">
                        <thead>
                            <td width="10%">Tarikh</td>
                            <td width="10%">Jenis</td>
                            <td width="20%">Aktiviti</td>
                            <td width="10%">Peruntukan (RM)</td>
                            <td width="30%">Catatan</td>
                            <td width="20%">Tindakan</td>
                        </thead>
                        <tbody>
                            @foreach($aktivitis as $aktiviti)
                            <tr>
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
                                        <a class="btn btn-sm btn-primary col-6" href="{{ route('aktiviti.edit', $aktiviti)}}">UBAH</a>
                                        <input type="submit" class="btn btn-sm btn-danger col-6" value="PADAM">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="row">
                            <span class="col-10" style="text-align:center">JUMLAH KESELURUHAN PERUNTUKAN 2024 : RM{{$aktivitis->sum('peruntukan')}} </span>
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
