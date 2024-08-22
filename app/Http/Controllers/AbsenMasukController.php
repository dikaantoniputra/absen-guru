<?php

namespace App\Http\Controllers;

use App\Models\AbsenMasuk;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class AbsenMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absenMasuk = AbsenMasuk::all();
        return view('page.masuk.index', compact('absenMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('page.masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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
    
            $request->session()->flash('success', 'Berhasil menambahkan.');
            return redirect()->route('absenmasuk.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Gagal menambahkan.');
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
    public function edit($id)
    {
        //
        $masuk = AbsenMasuk::select('*')->findOrFail($id);
        
        return view('page.masuk.edit', [
            'masuk' => $masuk,
        ]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AbsenMasuk  $absenMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(AbsenMasuk::$rules);
    
        try {
            // Mencari data yang akan di-update berdasarkan ID
            $article = AbsenMasuk::findOrFail($id);
    
            // Mengambil semua data yang di-input kecuali gambar
            $article->fill($request->except('gambar'));
    
            // Handle logo file
            if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
                // Menghapus file gambar lama jika ada
                if ($article->gambar && file_exists(public_path('gambar/' . $article->gambar))) {
                    unlink(public_path('gambar/' . $article->gambar));
                }
    
                // Menyimpan file gambar baru
                $logoFile = $request->file('gambar');
                $logoFileName = 'logo_' . time() . '.' . $logoFile->getClientOriginalExtension();
                $logoFile->move(public_path('gambar/'), $logoFileName);
                $article->gambar = $logoFileName;
            }
    
            // Menyimpan perubahan data
            $article->save();
    
            $request->session()->flash('success', 'Berhasil memperbarui data.');
            return redirect()->route('absenmasuk.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Gagal memperbarui data.');
            $request->session()->flash('error-details', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AbsenMasuk  $absenMasuk
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
{
    try {
        // Mencari data yang akan dihapus berdasarkan ID
        $article = AbsenMasuk::findOrFail($id);

        // Menghapus file gambar jika ada
        if ($article->gambar && file_exists(public_path('gambar/' . $article->gambar))) {
            unlink(public_path('gambar/' . $article->gambar));
        }

        // Menghapus data dari database
        $article->delete();

        session()->flash('success', 'Berhasil menghapus data.');
        return redirect()->route('absenmasuk.index')->with('success', 'Data berhasil dihapus.');
    } catch (\Exception $e) {
        session()->flash('error', 'Gagal menghapus data.');
        session()->flash('error-details', $e->getMessage());
        return redirect()->back();
    }
}

}
