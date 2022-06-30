<?php

namespace App\Http\Controllers;


use App\Barang;
use App\Driver;
use App\Booking;

use Illuminate\Http\Request;
use App\Http\Controllers\PetugasController;
use App\Petugas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    

/* struktur pembuatan function */
/* public function FunctionName()
{
    code
} */

    public function viewHome()
    {
    	//ini buat ngeprotect halaman
    	//kalo belum login
    	if(!Session::get('login')){
    		//masuk sini
            return redirect('petugas/login')->with('alert','Kamu harus login dulu');

        //kalo id levelnya 1 masuk petugas
        }else{
            if (Session::get('id_level') == '1') {  
                $sewa = Booking::select(\DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(\DB::raw("Month(created_at)"))
                ->pluck('count');
            return view('petugas.home', compact('sewa'));
          

            } elseif (Session::get('id_level') == '2') {
                return redirect('admin/home');                
            } else{
                return redirect('/');
            }
                         
        }
    	
    }

    public function viewPersetujuan()
    {
        //ini buat ngeprotect halaman
        //kalo belum login
        if(!Session::get('login')){
            //masuk sini
            return redirect('petugas/login')->with('alert','Kamu harus login dulu');
  
        }elseif(Session::get('id_level') == 1){
            
            $driver = Driver::all();
            $barang = Barang::all();
            $sewa = Booking::where('status', '1')->get();

         

           return view('petugas.persetujuan', compact('driver','barang','sewa'));
                     
        }else{
            return redirect('admin/home');
        }
    
    }

    public function setujuPost($kode_sewa)
    {
        //ini untuk mengambil data  lelang berdaasarkan id
        $data = \App\Booking::find($kode_sewa);
        //ini untuk mengubah status di tabel lelang
        $data->status = "2";

        //ini untuk ubah data
        $statusc = $data->update();

        //ini untuk pengecekan
        if ($statusc) {
            //kalo berhasil
            return redirect('petugas/home')->with('alert-success','Kamu berhasil Register');
        } else {
            //kalo gagal
            return redirect('petugas/home')->with('alert-error','register gagal');
        }

    }

    public function viewDisetujui()
    {
        //ini buat ngeprotect halaman
        //kalo belum login
        if(!Session::get('login')){
            //masuk sini
            return redirect('petugas/login')->with('alert','Kamu harus login dulu');
  
        }elseif(Session::get('id_level') == 1){
            
            $driver = Driver::all();
            $barang = Barang::all();
            $sewa = Booking::where('status', '2')->get();

         

           return view('petugas.disetujui', compact('driver','barang','sewa'));
                     
        }else{
            return redirect('admin/home');
        }
    
    }


}
