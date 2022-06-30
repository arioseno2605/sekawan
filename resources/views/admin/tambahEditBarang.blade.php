@extends('layouts.appadmin')
    @section('layoutnya')

        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Tambah Mobil</h1>
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
            <form action="{{ url('admin',@$barang->id_barang) }}" enctype="multipart/form-data" method="post">
                @csrf
                <!-- nah ini buat pengecekan kalo $barang ada datanya maka ngejalanin method patch -->
                @if(!empty($barang))
                    @method('PATCH')
                @endif
                <div class="form-group">
                    <label for="nama_barang">Nama Kendaraan:</label>
                    <!-- ini contoh old  -->
                    <input type="text"  class="form-control" id="nama_barang" name="nama_barang" value="{{old('nama_barang',@$barang->nama_barang)}}">
                </div>            
                <div class="form-group">
                    <label for="harga">Harga Sewa:</label>
                    <input type="text"  class="form-control" id="harga" name="harga" value="{{old('harga',@$barang->harga)}}">
                </div>                
                <div class="form-group">
                    <label for="deskripsi_barang">Deskripsi:</label>
                    <input type="text" class="form-control" id="deskripsi_barang" name="deskripsi_barang" value="{{old('deskripsi_barang',@$barang->deskripsi_barang)}}">
                </div>
                        <div class="form-group">
                                    <label>Gambar Item:</label><br/>
                                    <input type="file" name="filename" id="filename" multiple>

                                    <div class="row mb-4">
                        <div class="col-md-4 mx-auto text-center">
                    <br/>
                    <label class="align-item-center" style="font-weight:normal;" for="BuktiGambar">
                        <div style="border:1px solid grey;border-style:dashed" class=" rounded-lg text-center p-3">
                        <!-- <div style="border:1px solid grey;border-style:dashed;max-width:100px;max-height:100px;min-width:100px;min-height:100px" class=" rounded-lg text-center p-3"> -->
                            <img style="object-fit:contain;"
                            src="//placehold.it/140?text=IMAGE" class="img-fluid" id="preview" />
                        </div>
</div>
                    </label>
                </div>
                </div>
              
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
            
            </form>
        </div>
        <!-- /.content -->

        @push('scripts')
         <script>
       $(document).ready(function(){
            // input plugin

            // get file and preview image
            $("#filename").on('change',function(){
                var input = $(this)[0];
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#preview').attr('src', e.target.result).fadeIn('slow');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            })  
        });
         </script>
         @endpush
  @endsection