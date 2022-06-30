<?php

namespace App\Http\Controllers;


use App\Barang;
use App\Driver;
use App\Booking;
use App\Exports\UsersExport;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
	
    public function viewHome()
    {
    	if (!Session::get('login')) {
    		return redirect('/');
    	}else{
    		if (Session::get('id_level') == '1') {
                return redirect('petugas/home');                
            } elseif (Session::get('id_level') == '2') {
                $sewa = Booking::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');
    			return view('admin.home', compact('sewa'));
                
            } else{
                return redirect('/');
            }
    	}
    }

    
    public function viewTambahBarang()
    {
        //ini buat ngeprotect halaman
        //kalo belum login
        if(!Session::get('login')){
            //masuk sini
            return redirect('petugas/login')->with('alert','Kamu harus login dulu');

        //kalo id levelnya 1 masuk petugas    
        }elseif(Session::get('id_level') == 2){
            //ini untuk menampilkan tampilan tambahBarang pada folder petugas
           return view('admin.tambahEditBarang');
                     
        }else{
            return redirect('petugas/home');
        }
    }
    public function tambahBarangPost(Request $request)
    {
       
        //ini untuk memvalidasi apa aja yg mau diinputkan ketika tambah barang
        $this->validate($request,[
            'nama_barang' => 'required',
            'filename' => 'required',
            'filename.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000',
            'harga' => 'required',
            'deskripsi_barang' => 'required',
        ]);
     
            $filename = $request->file('filename');        
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('filename')->getClientOriginalName());
            $request->file('filename')->move(public_path('images'), $filename);
          
       
        //ini untuk menampung model kalo ada bacaan new berarti buat tambah data
        $data = new \App\Barang;

        //ini untuk tanggal (tahun , bulan , tanggal)
        $date = date("Y-m-d");
        //ini untuk memasukkan data dari nama_barang diambil dari $request->nama_barang ini data yg di inputkan user
        $data->nama_barang = $request->nama_barang;
        $data->data_file = $filename;
        //ini mengisi tanggal dengan variabel date yg tadi di buat
        $data->tgl = $date;
        $data->harga = $request->harga;
        $data->deskripsi_barang = $request->deskripsi_barang;

        //ini untuk simpand data
        $status = $data->save();

        //ini buat pengecekan
        if ($status) {
            //kalo berhasil
            return redirect('admin/mobil')->with('alert-success','Kamu berhasil Register');
        } else {
            //kalo gagal
            return redirect('admin/tambah/barang')->with('alert-error','register gagal');
        }
   
    }
    public function viewMobil()
    {
    	if (!Session::get('login')) {
    		return redirect('/');
    	}else{
    		if (Session::get('id_level') == '1') {
                return redirect('petugas/home');                
            } elseif (Session::get('id_level') == '2') {
                $data['barang'] = \App\Barang::get();
               
    			return view('admin.daftarMobil',$data);
                
            } else{
                return redirect('/');
            }
    	}
    }
    
    public function viewDetailBarang($id_barang)
    {
        //ini buat ngeprotect halaman
        //kalo belum login
        if(!Session::get('login')){
            //masuk sini
            return redirect('petugas/login')->with('alert','Kamu harus login dulu');

        //kalo id levelnya 1 masuk admin
        }elseif(Session::get('id_level') == 2){
            $data['barangDetail'] = \App\Barang::where('id_barang',$id_barang)->get();
            //ini untuk menampilakn tampilannya sama $datanya agar bisa di akses di tampilan
            return view('admin.detailBarang',$data);
        //kalo bukan masuk petugas             
        }else{
            return redirect('petugas/home');
        }
    }

    public function viewTambahDriver()
    {
        //ini buat ngeprotect halaman
        //kalo belum login
        if(!Session::get('login')){
            //masuk sini
            return redirect('petugas/login')->with('alert','Kamu harus login dulu');

        //kalo id levelnya 1 masuk petugas    
        }elseif(Session::get('id_level') == 2){
            //ini untuk menampilkan tampilan tambahDriver pada folder petugas
           return view('admin.tambahEditDriver');
                     
        }else{
            return redirect('petugas/home');
        }
    }
    public function tambahDriverPost(Request $request)
    {
       
        //ini untuk memvalidasi apa aja yg mau diinputkan ketika tambah driver
        $this->validate($request,[
            'nama_driver' => 'required',
            'filename' => 'required',
            'filename.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000',
            'harga_driver' => 'required',
            'deskripsi_driver' => 'required',
        ]);
     
            $filename = $request->file('filename');        
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('filename')->getClientOriginalName());
            $request->file('filename')->move(public_path('images'), $filename);
          
         
        //ini untuk menampung model kalo ada bacaan new berarti buat tambah data
        $data = new \App\Driver;

        //ini untuk tanggal (tahun , bulan , tanggal)
        $date = date("Y-m-d");
        $data->nama_driver = $request->nama_driver;
        $data->data_file = $filename;
        // $filename = $request->data_file;
        //ini mengisi tanggal dengan variabel date yg tadi di buat
        $data->tgl = $date;
        $data->harga_driver = $request->harga_driver;
        $data->deskripsi_driver = $request->deskripsi_driver;
      
        //ini untuk simpand data
        $status = $data->save();

        //ini buat pengecekan
        if ($status) {
            //kalo berhasil
            return redirect('admin/driver')->with('alert-success','Kamu berhasil Register');
        } else {
            //kalo gagal
            return redirect('admin/tambah/driver')->with('alert-error','register gagal');
        }
   
    }
    public function viewDriver()
    {
    	if (!Session::get('login')) {
    		return redirect('/');
    	}else{
    		if (Session::get('id_level') == '1') {
                return redirect('petugas/home');                
            } elseif (Session::get('id_level') == '2') {
                $data['driver'] = \App\Driver::get();
               
    			return view('admin.daftarDriver',$data);
                
            } else{
                return redirect('/');
            }
    	}
    }
    
    public function viewDetailDriver($id_driver)
    {
        //ini buat ngeprotect halaman
        //kalo belum login
        if(!Session::get('login')){
            //masuk sini
            return redirect('petugas/login')->with('alert','Kamu harus login dulu');

        //kalo id levelnya 1 masuk admin
        }elseif(Session::get('id_level') == 2){
            $data['driverDetail'] = \App\Driver::where('id_driver',$id_driver)->get();
            //ini untuk menampilakn tampilannya sama $datanya agar bisa di akses di tampilan
            return view('admin.detailDriver',$data);
        //kalo bukan masuk petugas             
        }else{
            return redirect('petugas/home');
        }
    }
    public function viewSewa()
    {
        //ini buat ngeprotect halaman
        //kalo belum login
        if(!Session::get('login')){
            //masuk sini
            return redirect('petugas/login')->with('alert','Kamu harus login dulu');

        //kalo id levelnya 1 masuk petugas    
        }elseif(Session::get('id_level') == 2){
         $driver = Driver::all();
         $barang = Barang::all();
           return view('admin.sewa', compact('driver','barang'));
                     
        }else{
            return redirect('petugas/home');
        }
    }

    public function tambahSewa(Request $request)
    {
       
        //ini untuk memvalidasi apa aja yg mau diinputkan ketika tambah driver
        $this->validate($request,[
            
            'tanggal_order' => 'required',
            'durasi' => 'required',
            'nama_penyewa' => 'required',
            'id_barang' => 'required',
            'id_driver' => 'required',
            'status' => '1',
        ]);
     
        
         
        //ini untuk menampung model kalo ada bacaan new berarti buat tambah data
        $data = new \App\Booking;

        //ini untuk tanggal (tahun , bulan , tanggal)
        $date = date("Y-m-d");
        $data->tanggal_order = $request->tanggal_order;
      
        $data->durasi = $request->durasi;
        $data->nama_penyewa = $request->nama_penyewa;
        $data->id_barang = $request->id_barang;
        $data->id_driver = $request->id_driver;
        $data->status = '1';

        //ini untuk simpand data
        $status = $data->save();

        //ini buat pengecekan
        if ($status) {
            //kalo berhasil
            return redirect('admin/home')->with('alert-success','Kamu berhasil Register');
        } else {
            //kalo gagal
            return redirect('admin/sewa')->with('alert-error','register gagal');
        }
   
    }
    
    public function Konfirmasi()
    {
        //ini buat ngeprotect halaman
        //kalo belum login
        if(!Session::get('login')){
            //masuk sini
            return redirect('petugas/login')->with('alert','Kamu harus login dulu');
  
        }elseif(Session::get('id_level') == 2){
            
            $driver = Driver::all();
            $barang = Barang::all();
            $sewa = Booking::where('status', '2')->get();

           return view('admin.mastersewa', compact('driver','barang','sewa'));
                     
        }else{
            return redirect('petugas/home');
        }
    
    }
    
    public function konfirmasiPost($kode_sewa)
    {
        //ini untuk mengambil data  lelang berdaasarkan id
        $data = \App\Booking::find($kode_sewa);
        //ini untuk mengubah status di tabel lelang
        $data->status = "3";

        //ini untuk ubah data
        $statusc = $data->update();

        //ini untuk pengecekan
        if ($statusc) {
            //kalo berhasil
            return redirect('admin/indexsewa')->with('alert-success','Kamu berhasil Register');
        } else {
            //kalo gagal
            return redirect('admin/indexsewa')->with('alert-error','register gagal');
        }

    }

    public function Histori()
    {
        //ini buat ngeprotect halaman
        //kalo belum login
        if(!Session::get('login')){
            //masuk sini
            return redirect('petugas/login')->with('alert','Kamu harus login dulu');
  
        }elseif(Session::get('id_level') == 2){
            
            $driver = Driver::all();
            $barang = Barang::all();
            $sewa = Booking::where('status', '3')->get();

           return view('admin.histori', compact('driver','barang','sewa'));
                     
        }else{
            return redirect('petugas/home');
        }
        
    
    }
    public function export() 
    {
        return Excel::download(new UsersExport, 'laporansewa.xlsx');
    }

    
}
