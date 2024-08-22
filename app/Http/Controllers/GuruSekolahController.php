<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AbsenMasuk;
use App\Models\AbsenPulang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GuruSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function karyawan()
    {
        // Ambil kategori dari pengguna yang sedang login
        $kategori = auth()->user()->kategori;

        // Ambil user berdasarkan kategori
        $user = User::where('kategori', $kategori)->get();

        return view('guru.data-karyawan', compact('user'));
    }

    public function masukkaryawan()
    {
        // Ambil kategori dari pengguna yang sedang login
        $kategori = auth()->user()->kategori;
    
        // Ambil data absensi berdasarkan kategori pengguna yang sedang login
        $absenMasuk = AbsenMasuk::whereHas('user', function ($query) use ($kategori) {
            $query->where('kategori', $kategori);
        })->get();
    
        return view('guru.absen-masuk-guru', compact('absenMasuk'));
    }

    public function pulangkaryawan()
    {
        // Ambil kategori dari pengguna yang sedang login
        $kategori = auth()->user()->kategori;
    
        // Ambil data absensi berdasarkan kategori pengguna yang sedang login
        $absenPulang = AbsenPulang::whereHas('user', function ($query) use ($kategori) {
            $query->where('kategori', $kategori);
        })->get();
    
        return view('guru.absen-pulang-guru', compact('absenPulang'));
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function absen()
    {
        return view('guru.absen');
    }

    public function pulang()
    {
        return view('guru.pulang');
    }

    public function store(Request $request)
    {
        $request->validate(AbsenMasuk::$rules);
    
        try {
            $article = new AbsenMasuk($request->all());
    
            // Mengambil data pengguna yang sedang login
            $user = auth()->user();
    
            // Menyimpan data pengguna yang sedang login ke dalam artikel
            $article->user_id = $user->id;
    
            // Handle logo file
            if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
                $logoFile = $request->file('gambar');
                $logoFileName = 'logo_' . time() . '.' . $logoFile->getClientOriginalExtension();
                $logoFile->move(public_path('gambar/'), $logoFileName);
                $article->gambar = $logoFileName;
            }

    
            // Save the article
            $article->save();
    
            $request->session()->flash('success', 'Berhasil Absen Masuk.');
            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Gagal Absen Cek Gambar.');
            $request->session()->flash('error-details', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function absenpulang(Request $request)
    {
        $request->validate(AbsenPulang::$rules);
    
        try {
            $article = new AbsenPulang($request->all());
    
            // Mengambil data pengguna yang sedang login
            $user = auth()->user();
    
            // Menyimpan data pengguna yang sedang login ke dalam artikel
            $article->user_id = $user->id;
    
            // Handle logo file
            if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
                $logoFile = $request->file('gambar');
                $logoFileName = 'logo_' . time() . '.' . $logoFile->getClientOriginalExtension();
                $logoFile->move(public_path('gambar/'), $logoFileName);
                $article->gambar = $logoFileName;
            }

    
            // Save the article
            $article->save();
    
            $request->session()->flash('success', 'Berhasil Absen Pulang.');
            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Gagal Absen Cek Gambar.');
            $request->session()->flash('error-details', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AbsenMasuk  $absenMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(AbsenMasuk $absenMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AbsenMasuk  $absenMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(AbsenMasuk $absenMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AbsenMasuk  $absenMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AbsenMasuk $absenMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AbsenMasuk  $absenMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbsenMasuk $absenMasuk)
    {
        //
    }
}
