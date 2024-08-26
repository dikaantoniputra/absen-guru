<?php

namespace App\Http\Controllers;

use App\Models\AbsenMasuk;
use App\Models\AbsenPulang;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function hariantk()
    {
        
        $absenMasuk = AbsenMasuk::whereDate('created_at', Carbon::today())
        ->whereHas('user', function ($query) {
            $query->where('kategori', 'TK');
        })
        ->get();

        $absenPulang = AbsenPulang::whereDate('created_at', Carbon::today())
        ->whereHas('user', function ($query) {
            $query->where('kategori', 'TK');
        })
        ->get();

        return view('page.harian.absen-masuk-tk', compact('absenPulang','absenMasuk'));
    }

    public function hariansd()
    {
        
        $absenMasuk = AbsenMasuk::whereDate('created_at', Carbon::today())
        ->whereHas('user', function ($query) {
            $query->where('kategori', 'SD');
        })
        ->get();

        $absenPulang = AbsenPulang::whereDate('created_at', Carbon::today())
        ->whereHas('user', function ($query) {
            $query->where('kategori', 'SD');
        })
        ->get();

        return view('page.harian.absen-masuk-sd', compact('absenPulang','absenMasuk'));
    }

    public function hariansmp()
    {
        
        $absenMasuk = AbsenMasuk::whereDate('created_at', Carbon::today())
        ->whereHas('user', function ($query) {
            $query->where('kategori', 'SMP');
        })
        ->get();

        $absenPulang = AbsenPulang::whereDate('created_at', Carbon::today())
        ->whereHas('user', function ($query) {
            $query->where('kategori', 'SMP');
        })
        ->get();

        return view('page.harian.absen-masuk-smp', compact('absenPulang','absenMasuk'));
    }

    public function hariansma()
    {
        
        $absenMasuk = AbsenMasuk::whereDate('created_at', Carbon::today())
        ->whereHas('user', function ($query) {
            $query->where('kategori', 'SMA');
        })
        ->get();

        $absenPulang = AbsenPulang::whereDate('created_at', Carbon::today())
        ->whereHas('user', function ($query) {
            $query->where('kategori', 'SMA');
        })
        ->get();

        return view('page.harian.absen-masuk-sma', compact('absenPulang','absenMasuk'));
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
