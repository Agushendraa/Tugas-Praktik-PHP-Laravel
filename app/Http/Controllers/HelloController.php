<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        // Mengirim data ke view
        $pesan = "Halo dari HelloController! Laravel kamu sudah jalan 🎉";
        return view('hello', ['message' => $pesan]);
    }
}
