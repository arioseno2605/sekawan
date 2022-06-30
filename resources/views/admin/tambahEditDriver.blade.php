@extends('layouts.appadmin')
    @section('layoutnya')

        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Tambah Driver</h1>
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
            <form action="{{ url('admin/driverp',@$driver->id_driver) }}" enctype="multipart/form-data" method="post">
                @csrf
                <!-- nah ini buat pengecekan kalo $driver ada datanya maka ngejalanin method patch -->
                @if(!empty($driver))
                    @method('PATCH')
                @endif
                <div class="form-group">
                    <label for="nama_driver">Nama Driver:</label>
                    <!-- ini contoh old  -->
                    <input type="text"  class="form-control" id="nama_driver" name="nama_driver" value="{{old('nama_driver',@$driver->nama_driver)}}">
                </div>            
                <div class="form-group">
                    <label for="harga_driver">Harga Driver:</label>
                    <input type="text"  class="form-control" id="harga_driver" name="harga_driver" value="{{old('harga_driver',@$driver->harga_driver)}}">
                </div>                
                <div class="form-group">
                    <label for="deskripsi_driver">Deskripsi:</label>
                    <input type="text" class="form-control" id="deskripsi_driver" name="deskripsi_driver" value="{{old('deskripsi_driver',@$driver->deskripsi_driver)}}">
                </div>
                        <div class="form-group">
                                    <label>Foto Driver:</label><br/>
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