@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"style="text-align:center" >{{ __('Laporan Maklumat Aktiviti') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Display tahun -->
                    <form action="{{route('laporan.index')}}">
                        <select name="tahun" class='select2 col-md-2'>
                            <option value="SEMUA">SEMUA TAHUN</option>
                            @foreach($listtahun as $tahun) <!-- condition ? output1 : output2 -->
                                <option value="{{$tahun->tahun}}" {{$current_year == $tahun->tahun ? 'selected' : ''}}>{{$tahun->tahun}}</option>
                            @endforeach
                        </select>
                        <input type="submit" value='CARI' class='btn btn-primary btn-sm'>
                    </form>
                    <br>
                    <!-- design table  -->
                    <table class='col-12 table table-striped' style="text-transform:uppercase">
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
<!-- dropdown list dan view "sila pilih tahun" -->
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder:"Sila pilih tahun"
        });
    });
</script>

@endsection
