<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//simpen use disini
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

/* struktur pembuatan function */
/* public function FunctionName()
{
    code
} */

	public function logoutPost(){
    	//ini buat logout
        Session::flush();
        //ini buat ngarahin ke halaman selanjutnya
        //di dalem method redirect itu nama route yg ->with(); ini ga wajib
        return redirect('/')->with('alert','Kamu sudah logout');
    }

/* ==================================================================================== */
/* =========================ADMIN DAN PETUGAS========================================== */
/* ==================================================================================== */    

public function viewLogin()
    {
    	//ini buat ngeprotect halaman
    	//kalo belum login
    	if(!Session::get('login')){
    		//masuk sini
        	//ini untuk menampilkan view login di dalam folder petugas titik berfungsi untuk mengambil view dalam folder setelahnya
    		return view('login.login');
        }
        else{
        	//kalo udah masuk sini
            if (Session::get('id_level') == '1') {
                return redirect('petugas/home');                
            } elseif (Session::get('id_level') == '2') {
                return redirect('admin/home');                
            } else{
                return redirect('/');
            }
        	         
        }
    	
    }

    public function loginPost(Request $request)
    {
    	//ini untuk mengambil data pada input
    	$username = $request->username;
    	$pass = $request->pass;

    	//ini untuk menentukan username di dalam database dengan yg di inputkan (mengcheck)
    	$data = \App\Petugas::where('username',$username)->first();
    	if($data){
    		//ini juga sama untuk mengecek tapi ini juga buat ngetranslate pasword yg acak acakan(brcypt)
    		if(Hash::check($pass,$data->pass)){
    			//ini untuk mengambil data si user yg udah di cek
    			Session::put('id_petugas',$data->id_petugas);
    			Session::put('nama_petugas',$data->nama_petugas);
    			Session::put('username',$data->username);
    			Session::put('pass',$data->pass);
				Session::put('id_level',$data->id_level);
				//ini untuk login paling penting
    			Session::put('login',TRUE);

                //ini buat pengecekan apakah admin atau petugas
                if (Session::get('id_level') == 1) {              
                    //ini untuk mengarahkan ke halaman home petugas
                    return redirect('petugas/home')->with('alert-success','Kamu berhasil Login');
                } else {
                    //ini untuk mengarahkan ke halaman home admin
                    return redirect('admin/home')->with('alert-success','Kamu berhasil Login');
                }

    		}else{
    			//ini kalo salah
                return redirect('login')->with('alert','Password atau Username, Salah !');
            }

        }else{
        	//ini juga kalo salah
            return redirect('login')->with('alert','Password atau Username, Salah!');
        }

    }


	public function viewRegister()
    {
        //ini buat ngeprotect halaman
        //kalo belum login terus mau register
        //tanda tanya artinya false atau ga ada
        if(!Session::get('login')){
            //masuk sini            
    	    return view('login.register');
        }
        else{
            //kalo udah masuk sini
            if (Session::get('id_level') == '1') {
                return redirect('petugas/home');                
            } elseif (Session::get('id_level') == '2') {
                return redirect('admin/home');                
            } else{
                return redirect('/');
            }
                     
        }
    	//ini untuk menampilkan halaman register di dalam folder masyarakat
    }
    public function registerPost(Request $request)
    {
    	//ini untuk validasi. apa aja yang mau di input dalam register
    	$this->validate($request, [
    		'nama_petugas' => 'required|min:3',
    		'id_level' => 'required',
    		'username' => 'required|min:5',
    		'pass' => 'required|min:8',
    		'cpass' => 'required|same:pass',
    	]);

    	//ini memanggil model petugas
    	$data = new \App\Petugas;
    	//ini memasukkan data yg di inputkan ke dalam model terus nanti ke database
        //$data->namafield = $request->Namepada tag input yg ada di tampilan
        //$request untuk mengambil data
    	$data->nama_petugas = $request->nama_petugas;
    	$data->id_level = $request->id_level;
    	$data->username = $request->username;
        //bcrypt buat ngerubag password kaya protect
    	$data->pass = bcrypt($request->pass);
    	//ini buat save
    	$statusc = $data->save();
    	//ini buat cek
    	if ($statusc) {    		
    		//kalo berhasil
    		return redirect('login')->with('alert-success','Kamu berhasil Register');
    	} else {
    		//kalo gagal
    		return redirect('register')->with('alert-error','register gagal');
    	}

    }


}
