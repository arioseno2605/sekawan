<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/forms/regular.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:48 GMT -->
<head>
    <meta charset="utf-8" />
  
    <title>Rent Car</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('assets/css/material-dashboard.css')}}" rel="stylesheet" />
 
    <!--     Fonts and icons     -->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/google-roboto-300-700.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/sweetalert2.min.css')}}" rel="stylesheet" />
    
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="blue" data-background-color="white" data-image="../../assets/img/sidebar-1.jpg">
            <!--
                Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
                Tip 2: you can also add an image using data-image tag
                Tip 3: you can change the color of the sidebar with data-background-color="white | black"
            -->
            <div class="logo">
                <a href="#" class="simple-text">
           Rent Car
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="#" class="simple-text">
               
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    {{-- <div class="photo">
                        <img src="{{asset('logo1.jpeg')}}" />
                    </div> --}}
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <p>Hallo , {{Session::get('username')}}.</p>
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">My Profile</a>
                                </li>
                                <!-- <li>
                                    <a href="#">Edit Profile</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('admin.index')}}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                      </a>
                    </li>

                    <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.addbarang')}}">
                      <i class="material-icons">Car</i>
                      <p>Tambah Kendaraan</p>
                    </a>
                  </li>

                  <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.mobil')}}">
                      <i class="material-icons">list</i>
                      <p>Daftar Kendaraan</p>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.adddriver')}}">
                      <i class="material-icons">DirectionsCar</i>
                      <p>Tambah Driver</p>
                    </a>
                  </li>

                  <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.driver')}}">
                      <i class="material-icons">Account</i>
                      <p>Daftar Driver</p>
                    </a>
                  </li>
                
                </ul>
                
                <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.konfirmasi')}}">
                      <i class="material-icons">Sccount</i>
                      <p>Sewa</p>
                    </a>
                  </li>
                    </ul>
                  <ul class="nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.histori')}}">
                      <i class="material-icons">History</i>
                      <p>histori</p>
                    </a>
                  </li>
                    </ul>
                    <ul class="nav">
                  <li class="nav-item ">
                    <a class="nav-link" href="{{url('logout')}}">
                        <i class="fa fa-power-off"></i>
                      <p>Logout</p>
                    </a>
                  </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                  <div class="navbar-minimize">
                      <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                          <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                          <i class="material-icons visible-on-sidebar-mini">view_list</i>
                      </button>
                  </div>
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                      <!-- <a class="navbar-brand" href="#"> Regular Forms </a> -->
                  </div>
                  <div class="collapse navbar-collapse">
                      <ul class="nav navbar-nav navbar-right">
                          <li class="dropdown">
                              <a href="{{url('logout')}}" class="dropdown-toggle" data-toggle="dropdown" id="btnLogout">
                                  <i class="fa fa-power-off"></i>
                                  <!-- <span class="notification">5</span> -->
                                  <p class="hidden-lg hidden-md"> Logout <b class="caret"></b> </p>
                              </a>
                      
                      </ul>
                      
                  </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    @yield('layoutnya')
                </div>
            </div>
        </div>
    </div>
    
</body>
<!--   Core JS Files   -->
<script src="{{asset('assets/js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/material.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<!--  Charts Plugin -->
<!-- <script src="{{asset('assets/js/chartist.min.js')}}"></script> -->
<!--  Plugin for the Wizard -->
<script src="{{asset('assets/js/jquery.bootstrap-wizard.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>
<!--   Sharrre Library    -->
<script src="{{asset('assets/js/jquery.sharrre.js')}}"></script>
<!-- DateTimePicker Plugin -->
<script src="{{asset('assets/js/bootstrap-datetimepicker.js')}}"></script>
<!-- Vector Map plugin -->
<script src="{{asset('assets/js/jquery-jvectormap.js')}}"></script>
<!-- Sliders Plugin -->
<script src="{{asset('assets/js/nouislider.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js')}}"></script>-->
<!-- Select Plugin -->
<script src="{{asset('assets/js/jquery.select-bootstrap.js')}}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{asset('assets/js/jquery.datatables.js')}}"></script>
<!-- Sweet Alert 2 plugin -->
<script src="{{asset('assets/js/sweetalert2.js')}}"></script>
<!-- <script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script> -->
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('assets/js/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin    -->
<script src="{{asset('assets/js/fullcalendar.min.js')}}"></script>
<!-- TagsInput Plugin -->
<script src="{{asset('assets/js/jquery.tagsinput.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('assets/js/material-dashboard.js')}}"></script>

<script type="text/javascript">

// button logout call!
    $('li.dropdown').on('click','a#btnLogout', function(e){
        if(confirm('Anda yakin keluar aplikasi ?')){
            window.location.href = $(this).attr('href'); 
        }
        e.preventDefault();
    });

</script>

<!-- Extended js from content here! -->
@stack('scripts')


</html>