<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }
    
    private function getUsers() : array{
        return [
            [
        'email'=>'admin1@gmail.com',
        'password'=>'$2y$12$bxQ8grnTKzMkYLrV/gRDeO1JqmbcI.nlvcdO6Z03mOsOB1hWYyDtm',
        'nama'=>'Danvers',
        'foto' =>'w.jpg',
        'dibuat_pada' =>'2025-09-27'
        ],
        [
        'email'=>'admin2@gmail.com',
        'password'=>'$2y$12$SD0xuC6hgqAQTjKmI5p9w.zCL791bjxojvtMff4axbZ/BOWU4aUYq',
        'nama'=>'Senna',
        'foto' =>'a2.jpg',
        'dibuat_pada' =>'2025-05-12'
        ],
    ];
    }
    //logic untuk memproses login
    public function login(Request $request){
        $auth = $request->only('email','password');
        //mengambil nilai user dan passowrd
        foreach($this->getUsers() as $users){
            //cek user/password sesuai,lanut ke halaman dashboard
            if (
                $users['email'] == $auth['email']
            && Hash::check($auth['password'],$users['password'])
            ){
                // atur zona waktu ke Asia/Jakarta (WIB)
                date_default_timezone_set('Asia/Jakarta');
                
                // simpan waktu login saat ini dalam format WIB
                $users['terakhir_login'] = date('d F Y, H:i') . ' WIB';
                
                Session::put('user',$users);
                return redirect()->route('profil');
            }
        }
        //pesan jika usn/pass salah
        return back()->withError(['error' => 'Username Atau Password Salah']);
    }
    // logic untuk logout
    public function logout(){
        Session::forget('user'); // hapus session user
        Session::flush();        // optional: hapus semua session
        return redirect()->route('login')->with('success', 'Anda berhasil logout!');
    }

}
