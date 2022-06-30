@extends('layouts.layout-login')

@section('formlogin')

<br/>
                                <form action="{{ url('loginPost') }}" method="post">
                                @csrf   
                                <div class="card card-login card-hidden aligncenter">
                                    
                                    <p class="aligncenter">
                                    <h3>Login</h3>
                                           </p>

                                    <div class="card-content">
                                        <div class="form-group">
                                            <label for="username">Username:</label>
                                            <input type="text" class="form-control" id="username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="pass">Password:</label>
                                            <input type="password" class="form-control" id="pass" name="pass"></input>
                                        </div>
                                        
                                    </div>
                                           <!--ini buat cek doang-->
                                       <!-- bacaan 'alert' diambil dari with pass redirect -->
                                       @if(\Session::has('alert'))
                                        <div class="alert alert-danger">
                                           <div>{{Session::get('alert')}}</div>
                                        </div>
                                       @endif
                                        <!-- bacaan 'alert' diambil dari with pass redirect -->
                                       @if(\Session::has('alert-success'))
                                        <div class="alert alert-success">
                                           <div>{{Session::get('alert-success')}}</div>
                                        </div>
                                       @endif
                                       <!-- ini buat login -->
                                       <!-- yg penting mah di tag input name sama id harus sama di controller atau field di tabel / DB  -->
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">LOGIN</button>
                                    </div>
                                    <div>
                                    <a href="{{url('register')}}">Klik disini untuk Daftar</a>
                                </div>
                            </form>
@endsection
