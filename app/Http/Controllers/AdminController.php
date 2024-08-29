<?php

namespace App\Http\Controllers;

use App\Models\User;
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

     public function index()
     {
         
         $jumlahAbsenMasukTK = AbsenMasuk::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'TK');
             })
             ->count();
 
         $jumlahAbsenPulangtK = AbsenPulang::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'TK');
             })
             ->count();
 
         $jumlahUserTK = User::where('kategori', 'TK')->count();
 
         $jumlahAbsenMasukSd = AbsenMasuk::whereDate('created_at', Carbon::today())
         ->whereHas('user', function ($query) {
             $query->where('kategori', 'SD');
         })
         ->count();
 
         $jumlahAbsenPulangSd = AbsenPulang::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'SD');
             })
             ->count();
 
         $jumlahUserSD = User::where('kategori', 'SD')->count();
 
         $jumlahAbsenMasukSmp = AbsenMasuk::whereDate('created_at', Carbon::today())
         ->whereHas('user', function ($query) {
             $query->where('kategori', 'SMP');
         })
         ->count();
 
         $jumlahAbsenPulangSmp = AbsenPulang::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'SMP');
             })
             ->count();
 
         $jumlahUserSMP = User::where('kategori', 'SMP')->count();
 
         $jumlahAbsenMasukSma = AbsenMasuk::whereDate('created_at', Carbon::today())
         ->whereHas('user', function ($query) {
             $query->where('kategori', 'SMA');
         })
         ->count();
 
         $jumlahAbsenPulangSma = AbsenPulang::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'SMA');
             })
             ->count();
 
         $jumlahUserSMA = User::where('kategori', 'SMA')->count();
 
         $hariIni = date('Y-m-d');
 
         // Mendapatkan semua user yang datang pada hari ini
         $usersHariIni = AbsenMasuk::whereDate('created_at', $hariIni)
             ->orderBy('created_at', 'asc')
             ->get();
 
 
         return view('page.index', compact('jumlahAbsenMasukTK','jumlahAbsenPulangtK','jumlahUserTK','jumlahAbsenMasukSd','jumlahAbsenPulangSd','jumlahUserSD','jumlahAbsenMasukSmp','jumlahAbsenPulangSmp','jumlahUserSMP'
                                           ,'jumlahAbsenMasukSma','jumlahAbsenPulangSma','jumlahUserSMA','usersHariIni'));
     }
     

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
