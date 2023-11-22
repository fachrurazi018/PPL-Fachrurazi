<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Pendapatan;
use App\Models\Produk;
use App\Models\Umkm;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $data = Umkm::all();
        $produk = Produk::all();
        $kegiatan = Kegiatan::all();
        $pendapatan = Pendapatan::all();
        return view('admin.dashboard2',compact('data','produk','kegiatan','pendapatan'));
    }
    
    public function umkm(){
        $data = Umkm::all();
        
        return view('admin.umkm.data', compact('data'));
    }
    
    public function tambahumkm(){
        $data = Umkm::all();
        
        return view('admin.umkm.tambah', compact('data'));
    }
    
    public function insertumkm(Request $request){
        Umkm::create($request->all());
        
        return redirect()->route('umkm')->with('success', 'Data berhasil ditambahkan');
    }
    
    public function tampilkanumkm($id){
        $data = Umkm::find($id);
        return view('admin.umkm.tampil', compact('data'));
    }
    
    public function updateumkm(Request $request, $id){
        $data = Umkm::find($id);
        $data->update($request->all());
        return redirect()->route('umkm')->with('success', 'Data berhasil diperbarui');
    }
    
    public function delete($id){
        $data = Umkm::find($id);
        $data->delete();
        
        return redirect()->route('umkm')->with('success', 'Data berhasil dihapus');
    }
    
    
    public function produk(){
        $data = Produk::join('umkms', 'produks.umkm_id', '=', 'umkms.id')->select('produks.*', 'umkms.nama_usaha')
        ->get();
        
        return view('admin.produk.data', compact('data'));
    }
    
    public function tambahproduk(){
        $data = Umkm::all();
        $item = Produk::all();
        return view('admin.produk.tambah', compact('data','item'));
    }
    
    public function insertproduk(Request $request){
        $request->validate([
            'umkm_id' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Contoh validasi untuk file gambar
            'nama_gambar' => 'required',
        ]);
        
        // Simpan file gambar yang diunggah ke dalam penyimpanan yang ditentukan (misalnya: folder 'images' di dalam folder 'public')
        $imageName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('images'), $imageName);
        
        // Buat objek Produk dengan mengambil data dari request
        $produk = new Produk();
        $produk->umkm_id = $request->umkm_id;
        $produk->gambar = $imageName; // Simpan nama file gambar ke dalam kolom 'gambar'
        $produk->nama_gambar = $request->nama_gambar;
        $produk->save();
        
        return redirect()->route('produk')->with('success', 'Data berhasil ditambahkan');
    }
    
    public function tampilkanproduk($id){
        $data = Produk::find($id);
        $item = Umkm::all();
        
        if (!$data) {
            return redirect()->route('produk')->with('error', 'Data tidak ditemukan');
            // atau tambahkan penanganan error lainnya sesuai kebutuhan aplikasi Anda
        }
        
        return view('admin.produk.tampil', compact('data','item'));
    }
    
    public function updateproduk(Request $request, $id){
        $data = Produk::find($id);
        
        // Proses validasi dan penyimpanan gambar baru
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . '.' . $file->getClientOriginalExtension();
            $tujuan_upload = public_path('/images'); // Lokasi penyimpanan gambar di dalam direktori public
            $file->move($tujuan_upload, $nama_file);
            
            // Perbarui nama gambar di database
            $data->gambar = $nama_file;
        }
        
        // Update data lainnya
        $data->update($request->except('gambar'));
        
        return redirect()->route('produk')->with('success', 'Data berhasil diperbarui');
    }
    
    public function deleteproduk($id){
        $data = Produk::find($id);
        if ($data) {
            $data->delete();
            return redirect()->route('produk')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('produk')->with('error', 'Data tidak ditemukan');
        }
    }


        
    public function kegiatan(){
        $data = Kegiatan::join('umkms', 'kegiatans.umkm_id', '=', 'umkms.id')->select('kegiatans.*', 'umkms.nama_usaha')
        ->get();
        
        return view('admin.kegiatan.data', compact('data'));
    }
    
    public function tambahkegiatan(){
        $data = Umkm::all();
        $item = Kegiatan::all();
        return view('admin.kegiatan.tambah', compact('data','item'));
    }
    
    public function insertkegiatan(Request $request){
        $request->validate([
            'umkm_id' => 'required',
            'nama_kegiatan' => 'required',
            'gambar_kegiatan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'penjelasan' => 'required',
        ]);
        
        // Simpan file gambar yang diunggah ke dalam penyimpanan yang ditentukan (misalnya: folder 'images' di dalam folder 'public')
        $imageName = time().'.'.$request->gambar_kegiatan->extension();
        $request->gambar_kegiatan->move(public_path('images'), $imageName);
        
        // Buat objek Produk dengan mengambil data dari request
        $kegiatan = new Kegiatan();
        $kegiatan->umkm_id = $request->umkm_id;
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->gambar_kegiatan = $imageName; // Simpan nama file gambar ke dalam kolom 'gambar'
        $kegiatan->penjelasan = $request->penjelasan;
        $kegiatan->save();
        
        return redirect()->route('kegiatan')->with('success', 'Data berhasil ditambahkan');
    }
    
    public function tampilkankegiatan($id){
        $data = Kegiatan::find($id);
        $item = Umkm::all();
        
        if (!$data) {
            return redirect()->route('kegiatan')->with('error', 'Data tidak ditemukan');
            // atau tambahkan penanganan error lainnya sesuai kebutuhan aplikasi Anda
        }
        
        return view('admin.kegiatan.tampil', compact('data','item'));
    }
    
    public function updatekegiatan(Request $request, $id){
        $data = Kegiatan::find($id);
        
        // Proses validasi dan penyimpanan gambar baru
        if ($request->hasFile('gambar_kegiatan')) {
            $file = $request->file('gambar_kegiatan');
            $nama_file = time() . '.' . $file->getClientOriginalExtension();
            $tujuan_upload = public_path('/images'); // Lokasi penyimpanan gambar di dalam direktori public
            $file->move($tujuan_upload, $nama_file);
            
            // Perbarui nama gambar di database
            $data->gambar_kegiatan = $nama_file;
        }
        
        // Update data lainnya
        $data->update($request->except('gambar_kegiatan'));
        
        return redirect()->route('kegiatan')->with('success', 'Data berhasil diperbarui');
    }
    
    public function deletekegiatan($id){
        $data = Kegiatan::find($id);
        if ($data) {
            $data->delete();
            return redirect()->route('kegiatan')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('kegiatan')->with('error', 'Data tidak ditemukan');
        }
    }

    public function pendapatan(){
        $data = Pendapatan::join('umkms', 'pendapatans.umkm_id', '=', 'umkms.id')->select('pendapatans.*', 'umkms.nama_usaha')
        ->get();
        
        return view('admin.pendapatan.data', compact('data'));
    }
    
    public function tambahpendapatan(){
        $data = Umkm::all();
        $item = Pendapatan::all();
        
        return view('admin.pendapatan.tambah', compact('data','item'));
    }
    
    public function insertpendapatan(Request $request){
        Pendapatan::create($request->all());
        
        return redirect()->route('pendapatan')->with('success', 'Data berhasil ditambahkan');
    }
    
    public function tampilkanpendapatan($id){
        $data = Pendapatan::find($id);
        $item = Umkm::all();
        return view('admin.pendapatan.tampil', compact('data','item'));
    }
    
    public function updatependapatan(Request $request, $id){
        $data = Pendapatan::find($id);
        $data->update($request->all());
        return redirect()->route('pendapatan')->with('success', 'Data berhasil diperbarui');
    }
    
    public function deletependapatan($id){
        $data = Pendapatan::find($id);
        $data->delete();
        
        return redirect()->route('pendapatan')->with('success', 'Data berhasil dihapus');
    }
}
