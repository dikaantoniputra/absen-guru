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
             ->where('status', 0)
             ->count();
 
         $jumlahAbsenPulangtK = AbsenPulang::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'TK');
             })
             ->where('status', 0)
             ->count();

             $jumlahAbsenMasukTKTolak = AbsenMasuk::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'TK');
             })
             ->where('status', 1)
             ->count();
 
            $jumlahAbsenPulangtKTolak = AbsenPulang::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'TK');
             })
             ->where('status', 1)
             ->count();
        
 
         $jumlahUserTK = User::where('kategori', 'TK')->count();
 
         $jumlahAbsenMasukSd = AbsenMasuk::whereDate('created_at', Carbon::today())
         ->whereHas('user', function ($query) {
             $query->where('kategori', 'SD');
         })
         ->where('status', 0)
         ->count();
 
         $jumlahAbsenPulangSd = AbsenPulang::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'SD');
             })
             ->where('status', 0)
             ->count();

        
             $jumlahAbsenMasukSdTolak = AbsenMasuk::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'SD');
             })
             ->where('status', 1)
             ->count();
 
            $jumlahAbsenPulangSdTolak = AbsenPulang::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'SD');
             })
             ->where('status', 1)
             ->count();
 
         $jumlahUserSD = User::where('kategori', 'SD')->count();
 
         $jumlahAbsenMasukSmp = AbsenMasuk::whereDate('created_at', Carbon::today())
         ->whereHas('user', function ($query) {
             $query->where('kategori', 'SMP');
         })
         ->where('status', 0)
         ->count();
 
         $jumlahAbsenPulangSmp = AbsenPulang::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'SMP');
             })
             ->where('status', 0)
             ->count();
        

             $jumlahAbsenMasukSmpTolak = AbsenMasuk::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'SMP');
             })
             ->where('status', 1)
             ->count();
 
            $jumlahAbsenPulangSmpTolak = AbsenPulang::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'SMP');
             })
             ->where('status', 1)
             ->count();
 
         $jumlahUserSMP = User::where('kategori', 'SMP')->count();
 
         $jumlahAbsenMasukSma = AbsenMasuk::whereDate('created_at', Carbon::today())
         ->whereHas('user', function ($query) {
             $query->where('kategori', 'SMA');
         })
         ->where('status', 0)
         ->count();
 
         $jumlahAbsenPulangSma = AbsenPulang::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'SMA');
             })
             ->where('status', 0)
             ->count();
        
             $jumlahAbsenMasukSmaTolak = AbsenMasuk::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'SMA');
             })
             ->where('status', 1)
             ->count();
 
            $jumlahAbsenPulangSmaTolak = AbsenPulang::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'SMA');
             })
             ->where('status', 1)
             ->count();
 
         $jumlahUserSMA = User::where('kategori', 'SMA')->count();
 
         $hariIni = date('Y-m-d');
 
         // Mendapatkan semua user yang datang pada hari ini
         $usersHariIni = AbsenMasuk::whereDate('created_at', $hariIni)
             ->orderBy('created_at', 'asc')
             ->get();
 
 
         return view('page.index', compact('jumlahAbsenMasukTK','jumlahAbsenPulangtK','jumlahUserTK','jumlahAbsenMasukSd','jumlahAbsenPulangSd','jumlahUserSD','jumlahAbsenMasukSmp','jumlahAbsenPulangSmp','jumlahUserSMP'
                                           ,'jumlahAbsenMasukSma','jumlahAbsenPulangSma','jumlahUserSMA','usersHariIni','jumlahAbsenMasukTKTolak','jumlahAbsenPulangtKTolak',
                                        'jumlahAbsenMasukSdTolak','jumlahAbsenPulangSdTolak','jumlahAbsenMasukSmpTolak','jumlahAbsenPulangSmpTolak','jumlahAbsenMasukSmaTolak','jumlahAbsenPulangSmaTolak'));
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
