@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"style="text-align:center" >{{ __('Maklumat Aktiviti') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('laporan.index')}}">
                        <select name="tahun">
                            @foreach($listtahun as $tahun) <!-- condition ? output1 : output2 -->
                                <option value="{{$tahun->tahun}}" {{$current_year == $tahun->tahun ? 'selected' : ''}}>{{$tahun->tahun}}</option>
                            @endforeach
                        </select>
                        <input type="submit" value='CARI' class='btn btn-primary btn-sm'>
                    </form>
                    
                    <table class='col-12 table table-striped'>
                        <tr>
                            <th>Tahun</th>
                            <th>Jenis</th>
                            <th>Jumlah Aktiviti</th>
                            <th>Peruntukan (RM)</th>
                        </tr>
                        @foreach($aktivitis as $aktiviti)
                            <tr>
                                <td>{{$current_year}}</td>
                                <td>{{$aktiviti->jenis}}</td>
                                <td>{{$aktiviti->total}}</td>
                                <td>{{$aktiviti->peruntukan}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" style="bg-color:grey; text-align:right; ">JUMLAH KESELURUHAN (RM)</td>
                            <td>{{$aktivitis->sum('peruntukan')}}</td>
                        </tr>
                    </table>
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
