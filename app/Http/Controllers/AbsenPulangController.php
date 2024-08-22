<?php

namespace App\Http\Controllers;

use App\Models\AbsenPulang;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class AbsenPulangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absenPulang = AbsenPulang::all();
        return view('page.pulang.index', compact('absenPulang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('page.pulang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
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
    
            $request->session()->flash('success', 'Berhasil menambahkan.');
            return redirect()->route('absenpulang.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Gagal menambahkan.');
            $request->session()->flash('error-details', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AbsenPulang  $AbsenPulang
     * @return \Illuminate\Http\Response
     */
    public function show(AbsenPulang $AbsenPulang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AbsenPulang  $AbsenPulang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $masuk = AbsenPulang::select('*')->findOrFail($id);
        
        return view('page.pulang.edit', [
            'masuk' => $masuk,
        ]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AbsenPulang  $AbsenPulang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(AbsenPulang::$rules);
    
        try {
            // Mencari data yang akan di-update berdasarkan ID
            $article = AbsenPulang::findOrFail($id);
    
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
            return redirect()->route('absenpulang.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Gagal memperbarui data.');
            $request->session()->flash('error-details', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AbsenPulang  $AbsenPulang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Mencari data yang akan dihapus berdasarkan ID
            $article = AbsenPulang::findOrFail($id);
    
            // Menghapus file gambar jika ada
            if ($article->gambar && file_exists(public_path('gambar/' . $article->gambar))) {
                unlink(public_path('gambar/' . $article->gambar));
            }
    
            // Menghapus data dari database
            $article->delete();
    
            session()->flash('success', 'Berhasil menghapus data.');
            return redirect()->route('AbsenPulang.index')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus data.');
            session()->flash('error-details', $e->getMessage());
            return redirect()->back();
        }
    }
    
}
