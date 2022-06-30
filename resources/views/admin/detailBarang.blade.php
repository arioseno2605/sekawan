
  @extends('layouts.appadmin')
  @section('layoutnya')

        <div class="content">
         
            <table class="fc table">
                @foreach($barangDetail as $row)
                <tr>
                    <th>Id Barang</th>
                    <td>{{$row->id_barang}}</td>
                </tr>
                <tr>
                    <th>Nama Barang</th>
                    <td>{{$row->nama_barang}}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{$row->tgl}}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>{{$row->harga}}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{$row->deskripsi_barang}}</td>
                </tr>
                @endforeach

            </table>

        </div>
        <!-- /.content -->
@endsection