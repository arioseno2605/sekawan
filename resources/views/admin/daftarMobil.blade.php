@extends('layouts.appadmin')
    @section('layoutnya')

            <table class="fc table">
                <tr>
                    <th>Id Barang</th>
                    <th>Nama Barang</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                    <th>Harga Awal</th>
                    <th>Aksi</th>
                </tr>
                @foreach($barang as $row)
                <tr>
                    <td>{{$row->id_barang}}</td>
                    <td>{{$row->nama_barang}}</td>
                    <td>
                    
						<!-- <tr> -->
					<img width="150px" src="{{ url('/images/'.$row->data_file) }}">
                        <!-- </tr> -->
                   
                    </td>
                    <td>{{$row->tgl}}</td>
                    <td>{{$row->harga_awal}}</td>
                    <td>
                    <a href="{{url('admin'.$row->id_barang)}}">detail</a>
                        <a href="{{url('admin/edit/barang'.$row->id_barang)}}">edit</a>
                        <form action="{{url('admin/delete'.$row->id_barang)}}" method="post">
                            @csrf
                            <!-- ini buat jalanin method delete -->
                            @method('DELETE')
                            <br/>
                            <button type="submit">delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
               
            </table>

    
@endsection
