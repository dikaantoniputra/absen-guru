<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AbsenMasuk;
use App\Models\AbsenPulang;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;

class YayasanController extends Controller
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

        // yayasan
         //  yayasan
         $jumlahAbsenMasukYayasan = AbsenMasuk::whereDate('created_at', Carbon::today())
         ->whereHas('user', function ($query) {
             $query->where('kategori', 'YAYASAN');
         })
         ->where('status', 0)
         ->count();
 
         $jumlahAbsenPulangYayasan = AbsenPulang::whereDate('created_at', Carbon::today())
             ->whereHas('user', function ($query) {
                 $query->where('kategori', 'YAYASAN');
             })
             ->where('status', 0)
             ->count();
        
        
 
         $jumlahUserYayasan = User::where('kategori', 'yayasan')->count();

        $hariIni = date('Y-m-d');

        // Mendapatkan semua user yang datang pada hari ini
        $usersHariIni = AbsenMasuk::whereDate('created_at', $hariIni)
            ->orderBy('created_at', 'asc')
            ->get();


        return view('page.index', compact('jumlahAbsenMasukTK','jumlahAbsenPulangtK','jumlahUserTK','jumlahAbsenMasukSd','jumlahAbsenPulangSd','jumlahUserSD','jumlahAbsenMasukSmp','jumlahAbsenPulangSmp','jumlahUserSMP'
                                          ,'jumlahAbsenMasukSma','jumlahAbsenPulangSma','jumlahUserSMA','usersHariIni','jumlahAbsenMasukTKTolak','jumlahAbsenPulangtKTolak',
                                       'jumlahAbsenMasukSdTolak','jumlahAbsenPulangSdTolak','jumlahAbsenMasukSmpTolak','jumlahAbsenPulangSmpTolak','jumlahAbsenMasukSmaTolak','jumlahAbsenPulangSmaTolak',
                                    'jumlahAbsenMasukYayasan','jumlahAbsenPulangYayasan','jumlahUserYayasan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function karyawan()
    {
        
        $user = User::where('kategori', '!=', 'admin')->get();

        return view('yayasan.data-karyawan', compact('user'));

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

        return view('yayasan.absen-masuk-tk', compact('absenPulang','absenMasuk'));
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

        return view('yayasan.absen-masuk-sd', compact('absenPulang','absenMasuk'));
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

        return view('yayasan.absen-masuk-smp', compact('absenPulang','absenMasuk'));
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

        return view('yayasan.absen-masuk-sma', compact('absenPulang','absenMasuk'));
    }

   

    public function laporantk(Request $request)
    {
        $queryMasuk = AbsenMasuk::whereHas('user', function($q) {
            $q->where('kategori', 'TK'); // Assuming 'category' is the field for the category
        });
    
        $queryPulang = AbsenPulang::whereHas('user', function($q) {
            $q->where('kategori', 'TK'); // Assuming 'category' is the field for the category
        });

        // Apply date filter if dates are provided
        if ($request->start_date && $request->end_date) {
            $queryMasuk->whereBetween('created_at', [$request->start_date, $request->end_date]);
            $queryPulang->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        // Apply name filter if a name is provided
        if ($request->name) {
            $queryMasuk->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
            $queryPulang->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }

        $absenMasuk = $queryMasuk->get();
        $absenPulang = $queryPulang->get();

        return view('yayasan.laporan-masuk-tk', compact('absenMasuk', 'absenPulang'));
    }

    public function laporansd(Request $request)
    {
        $queryMasuk = AbsenMasuk::whereHas('user', function($q) {
            $q->where('kategori', 'SD'); // Assuming 'category' is the field for the category
        });
    
        $queryPulang = AbsenPulang::whereHas('user', function($q) {
            $q->where('kategori', 'SD'); // Assuming 'category' is the field for the category
        });

        // Apply date filter if dates are provided
        if ($request->start_date && $request->end_date) {
            $queryMasuk->whereBetween('created_at', [$request->start_date, $request->end_date]);
            $queryPulang->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        // Apply name filter if a name is provided
        if ($request->name) {
            $queryMasuk->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
            $queryPulang->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }

        $absenMasuk = $queryMasuk->get();
        $absenPulang = $queryPulang->get();

        return view('yayasan.laporan-masuk-sd', compact('absenMasuk', 'absenPulang'));
    }

    public function laporansmp(Request $request)
    {
        $queryMasuk = AbsenMasuk::whereHas('user', function($q) {
            $q->where('kategori', 'SMP'); // Assuming 'category' is the field for the category
        });
    
        $queryPulang = AbsenPulang::whereHas('user', function($q) {
            $q->where('kategori', 'SMP'); // Assuming 'category' is the field for the category
        });

        // Apply date filter if dates are provided
        if ($request->start_date && $request->end_date) {
            $queryMasuk->whereBetween('created_at', [$request->start_date, $request->end_date]);
            $queryPulang->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        // Apply name filter if a name is provided
        if ($request->name) {
            $queryMasuk->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
            $queryPulang->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }

        $absenMasuk = $queryMasuk->get();
        $absenPulang = $queryPulang->get();

        return view('yayasan.laporan-masuk-smp', compact('absenMasuk', 'absenPulang'));
    }

    public function laporansma(Request $request)
    {
        $queryMasuk = AbsenMasuk::whereHas('user', function($q) {
            $q->where('kategori', 'SMP'); // Assuming 'category' is the field for the category
        });
    
        $queryPulang = AbsenPulang::whereHas('user', function($q) {
            $q->where('kategori', 'SMP'); // Assuming 'category' is the field for the category
        });

        // Apply date filter if dates are provided
        if ($request->start_date && $request->end_date) {
            $queryMasuk->whereBetween('created_at', [$request->start_date, $request->end_date]);
            $queryPulang->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        // Apply name filter if a name is provided
        if ($request->name) {
            $queryMasuk->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
            $queryPulang->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }

        $absenMasuk = $queryMasuk->get();
        $absenPulang = $queryPulang->get();

        return view('yayasan.laporan-masuk-sma', compact('absenMasuk', 'absenPulang'));
    }

    


    
}
