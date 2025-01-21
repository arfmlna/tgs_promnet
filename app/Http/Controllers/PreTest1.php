<?php

namespace App\Http\Controllers;

use Flasher\SweetAlert\Laravel\Facade\SweetAlert;
use Illuminate\Http\Request;

class PreTest1 extends Controller
{
    public $data = [];

    public function index()
    {
        $this->data['nama'] = $nama = "Arif Maulana";
        $this->data['usia'] = $usia = 21;
        $this->data['status'] = $status = "Pelajar";
        return view('pretest1', $this->data);
    }

    public function usiaku(Request $request)
    {
        $usia = $request->input('usia');
        $status = "";
        if ($usia <= 18) {
            $status = "Anda masih di bawah umur.";
        } else if( $usia > 18 && $usia <= 60){
            $status = "Anda adalah orang dewasa.";
        } else if( $usia > 60){
            $status = "Anda adalah seorang lansia.";
        }
        SweetAlert()->addInfo($status);
        return redirect()->route('pretest1');
    }
}
