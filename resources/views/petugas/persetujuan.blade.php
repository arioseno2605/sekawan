@extends('layouts.apppetugas')
    @section('layoutnya')
<h2> FORM PERSETUJUAN </h2>
<br></br>
            <table class="fc table">
                <tr>
                    <th>Nama Penyewa</th>
                    <th>Tanggal Sewa</th>
                    <th>Durasi</th>
                    <th>ID Kendaraan</th>
                    <th>ID Driver</th>
                    <th>Aksi</th>
                </tr>
                @foreach($sewa as $row)
                <tr>
                    <td>{{$row->nama_penyewa}}</td>
                    <td>{{$row->tanggal_order}}</td>
                    <td>{{$row->durasi}}</td>
                    <td>{{$row->id_barang}}</td>
                    <td>{{$row->id_driver}}</td>
                    <td>
                        <a href="{{url('petugas/setuju/'.$row->kode_sewa)}}">Setuju</a>
                    </td>
                </tr>
                @endforeach
               
            </table>



@endsection