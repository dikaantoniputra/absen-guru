<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AbsenMasuk;
use App\Models\AbsenPulang;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $userId = auth()->user()->id;
     
         // Ambil data absensi hanya untuk pengguna yang sedang login
         // dan urutkan berdasarkan waktu dari yang terbaru
         $absenMasuk = AbsenMasuk::where('user_id', $userId)
                                 ->whereDate('created_at', Carbon::today())
                                 ->get();

          $absenPulang = AbsenPulang::where('user_id', $userId)
                                 ->whereDate('created_at', Carbon::today())
                                 ->get();

        return view('page.index', compact('absenMasuk','absenPulang'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function masukkaryawan()
     {
         // Ambil ID pengguna yang sedang login
         $userId = auth()->user()->id;
     
         // Ambil data absensi hanya untuk pengguna yang sedang login
         // dan urutkan berdasarkan waktu dari yang terbaru
         $absenMasuk = AbsenMasuk::where('user_id', $userId)
                                 ->orderBy('created_at', 'desc')
                                 ->get();
     
         return view('guru.absen-masuk-guru', compact('absenMasuk'));
     }
     

    public function pulangkaryawan()
    {
        // Ambil kategori dari pengguna yang sedang login
        $userId = auth()->user()->id;
     
        // Ambil data absensi hanya untuk pengguna yang sedang login
        // dan urutkan berdasarkan waktu dari yang terbaru
        $absenPulang = AbsenPulang::where('user_id', $userId)
                                ->orderBy('created_at', 'desc')
                                ->get();
    
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

            $user = auth()->user();

            // Cek apakah pengguna sudah absen pada hari ini
            $today = now()->format('Y-m-d');
            $existingAbsen = AbsenMasuk::where('user_id', $user->id)
                                ->whereDate('created_at', $today)
                                ->first();
    
            if ($existingAbsen) {
                // Jika sudah ada absen hari ini, tampilkan pesan kesalahan
                $request->session()->flash('error', 'Anda sudah absen hari ini. Harap absen hanya satu kali per hari. Jika Harap Hubungi Admin');
                return redirect()->back()->withInput();
            }

            
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

            $user = auth()->user();

            $today = now()->format('Y-m-d');
            $existingAbsenMasuk = AbsenMasuk::where('user_id', $user->id)
                                    ->whereDate('created_at', $today)
                                    ->first();

            if (!$existingAbsenMasuk) {
                // Jika belum ada absen masuk hari ini, tampilkan pesan kesalahan
                $request->session()->flash('error', 'Anda belum absen masuk hari ini. Harap lakukan absen masuk terlebih dahulu. pada tombol hijau absen masuk');
                return redirect()->back()->withInput();
            }

            // Cek apakah pengguna sudah absen pada hari ini
            $today = now()->format('Y-m-d');
            $existingAbsen = AbsenPulang::where('user_id', $user->id)
                                ->whereDate('created_at', $today)
                                ->first();
    
            if ($existingAbsen) {
                // Jika sudah ada absen hari ini, tampilkan pesan kesalahan
                $request->session()->flash('error', 'Anda sudah absen hari ini. Harap absen hanya satu kali per hari. Jika Harap Hubungi Admin');
                return redirect()->back()->withInput();
            }

            
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
