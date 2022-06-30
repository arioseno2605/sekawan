@extends('layouts.appadmin')
    @section('layoutnya')

            <table class="fc table">
                <tr>
                    <th>Id Driver</th>
                    <th>Nama Driver</th>
                    <th>Foto</th>
                    <th>Tanggal</th>
                    <th>Harga Driver</th>
                    <th>Aksi</th>
                </tr>
                @foreach($driver as $row)
                <tr>
                    <td>{{$row->id_driver}}</td>
                    <td>{{$row->nama_driver}}</td>
                    <td>
                    
						<!-- <tr> -->
					<img width="150px" src="{{ url('/images/'.$row->data_file) }}">
                        <!-- </tr> -->
                   
                    </td>
                    <td>{{$row->tgl}}</td>
                    <td>{{$row->harga_driver}}</td>
                    <td>
                    <a href="{{url('admin'.$row->id_driver)}}">detail</a>
                        <a href="{{url('admin/edit/driver'.$row->id_driver)}}">edit</a>
                        <form action="{{url('admin/delete'.$row->id_driver)}}" method="post">
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
