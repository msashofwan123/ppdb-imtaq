<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

// class Controller extends BaseController
// {
//     use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
// }

class Controller extends BaseController
{
    public function index()
    {
        // Mengambil data dari tabel pendaftaran
        $dataPendaftar = DB::table('pendaftaran')->get();
    
        // Mengirim Variable $datapendaftar berisi tabel ke index
        return view('welcome', ['dataPendaftar' => $dataPendaftar]);
    }
}

