<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\PemilikUmkm;
use App\Models\Pendapatan;
use App\Models\Produk;
use App\Models\Umkm;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $umkm = Umkm::get();
        $produk = Produk::with('umkm')->get();
        $kegiatan = Kegiatan::with('umkm')->get();
        $pendapatan = Pendapatan::with('umkm')->get();
        return view('user.dashboard',compact('umkm','produk','kegiatan','pendapatan'));
    }  

    public function show(Umkm $umkm){
        $umkm->load('kegiatan','produk','pendapatan');
        $data = Produk::all();
        return view('user.detail', compact('umkm','data'));
    }
}
