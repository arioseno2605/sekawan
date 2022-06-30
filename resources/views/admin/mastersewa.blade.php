@extends('layouts.appadmin')
    @section('layoutnya')


<a href="{{url('admin/sewa')}}" class="btn btn-primary btn-lg">Form Sewa Kendaraan</a>

            <h2> Konfirmasi Penyewaan </h2>
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
                        <a href="{{url('admin/konfirmasi/'.$row->kode_sewa)}}">Setuju</a>
                    </td>
                  
                </tr>
                @endforeach
               
            </table>


@endsection