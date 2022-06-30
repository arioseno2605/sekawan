@extends('layouts.appadmin')
    @section('layoutnya')




            <h2> Histori Sewa</h2>
            <table class="fc table">
                <tr>
                    <th>Nama Penyewa</th>
                    <th>Tanggal Sewa</th>
                    <th>Durasi</th>
                    <th>ID Kendaraan</th>
                    <th>ID Driver</th>
                    
                </tr>
                @foreach($sewa as $row)
                <tr>
                    <td>{{$row->nama_penyewa}}</td>
                    <td>{{$row->tanggal_order}}</td>
                    <td>{{$row->durasi}}</td>
                    <td>{{$row->id_barang}}</td>
                    <td>{{$row->id_driver}}</td>
                   
                </tr>
                @endforeach
               
            </table>
            <a href="{{url('admin/export')}}" class="btn btn-primary btn-lg">Download Laporan Sewa</a>


@endsection