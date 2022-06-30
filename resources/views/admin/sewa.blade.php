@extends('layouts.appadmin')
    @section('layoutnya')

        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Form Sewa</h1>
            <hr>
            <!-- ini buat cek doang -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- ini buat register -->
            <!-- yg penting mah di tag input name sama id harus sama di controller atau field di tabel / DB  -->
            <form action="{{ url('admin/sewap',@$sewa->kode_sewa) }}" enctype="multipart/form-data" method="post">
                @csrf
                <!-- nah ini buat pengecekan kalo $driver ada datanya maka ngejalanin method patch -->
                <div class="form-group">
                    <label for="nama_penyewa">Nama penyewa:</label>
                    <!-- ini contoh old  -->
                    <input type="text"  class="form-control" id="nama_penyewa" name="nama_penyewa" value="{{old('nama_penyewa',@$sewa->nama_penyewa)}}">
                </div>            
                <div class="form-group">
                    <label for="tanggal_order">Tanggal Order:</label>
                    <input type="date"  class="form-control" id="tanggal_order" name="tanggal_order" value="{{old('tanggal_order',@$sewa->tanggal_order)}}">
                </div>                
                <div class="form-group">
                    <label for="durasi">Durasi: (hari)</label>
                    <input type="number" class="form-control" id="durasi" name="durasi" value="{{old('durasi',@$sewa->durasi)}}">
                </div>
              
             
                <div class="form-group">
                            <p>Kendaraan </p>
                            <select name="id_barang" id="id_barang" class="form-control">
                                <option value=""> - Select One - </option>
                                @foreach($barang as $barang)
                                    <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                                @endforeach
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <p>Driver </p>
                            <select name="id_driver" id="id_driver" class="form-control">
                                <option value=""> - Select One - </option>
                                @foreach($driver as $driver)
                                    <option value="{{ $driver->id_driver }}">{{ $driver->nama_driver }}</option>
                                @endforeach
                            </select>
                           
                        </div>
                        <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
            </form>
        </div>
        <!-- /.content -->

  @endsection
