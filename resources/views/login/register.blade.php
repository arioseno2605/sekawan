
@extends('layouts.layout-login')

@section('formlogin')

            <form action="{{ url('registerPost') }}" method="post">
                @csrf
                <div class="card card-login card-hidden aligncenter">
                                    
                                    <p class="aligncenter">
                                    <h3>Register</h3>
                                           </p>
                <div class="card-content">
                <div class="form-group">
                    <label for="nama_petugas">Name:</label>
                    <input type="text"  class="form-control" id="nama_petugas" name="nama_petugas">
                </div>
                <div class="form-group">
                    <label for="id_level">Level:</label>
                          <select class="" name="id_level" id="id_level"><br>
                            <option value="">-- Pilih Level -- </option>
                            <option value="1">petugas</option>
                            <option value="2">admin</option>
                          </select>
                </div>                
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="pass">Password:</label>
                    <input type="password" class="form-control" id="pass" name="pass">
                </div>
                <div class="form-group">
                    <label for="cpass">Password Confirmation:</label>
                    <input type="password" class="form-control" id="cpass" name="cpass">
                </div>
                </div>  
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                </div>
                <div>
                                    <a href="{{url('login')}}">Klik disini untuk Login</a>
                                </div>
            </form>
@endsection
