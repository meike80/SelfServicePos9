<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $nama = "Risna";
        $alamat = "Risna";
        $tanggal_lahir = "21 juli 2002";
        $data_array = array(
            "nama" => array(
                "Risna", "risna", "Risna",
            ),
        );

        return view('profile.index', compact('nama', 'alamat', 'tanggal_lahir', 'data_array'));
    }
}
