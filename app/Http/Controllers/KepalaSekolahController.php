<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AbsenMasuk;
use App\Models\AbsenPulang;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;

class KepalaSekolahController extends Controller
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
        $kategori = auth()->user()->kategori;
        $userId = auth()->user()->id;
        
        // Ambil data absensi berdasarkan kategori pengguna yang sedang login, tetapi tidak termasuk pengguna yang sedang login
        $kategori = auth()->user()->kategori;

        // Ambil data absen masuk berdasarkan kategori pengguna yang sedang login, termasuk pengguna yang sedang login
        $usersHariIni = AbsenMasuk::whereHas('user', function ($query) use ($kategori) {
            $query->where('kategori', $kategori);
        })->whereDate('created_at', today()) // Kondisi untuk hanya mengambil data hari ini
          ->get();
        

         

        return view('page.index', compact('jumlahAbsenMasukTK','jumlahAbsenPulangtK','jumlahUserTK','jumlahAbsenMasukSd','jumlahAbsenPulangSd','jumlahUserSD','jumlahAbsenMasukSmp','jumlahAbsenPulangSmp','jumlahUserSMP'
                                          ,'jumlahAbsenMasukSma','jumlahAbsenPulangSma','jumlahUserSMA','usersHariIni','jumlahAbsenMasukTKTolak','jumlahAbsenPulangtKTolak',
                                       'jumlahAbsenMasukSdTolak','jumlahAbsenPulangSdTolak','jumlahAbsenMasukSmpTolak','jumlahAbsenPulangSmpTolak','jumlahAbsenMasukSmaTolak','jumlahAbsenPulangSmaTolak','usersHariIni'));
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

        return view('kepala-unit.data-karyawan', compact('user'));
    }

    public function masukkaryawan()
    {
        // Ambil kategori dan ID dari pengguna yang sedang login
        $kategori = auth()->user()->kategori;
        $userId = auth()->user()->id;

        // Ambil data absensi berdasarkan kategori pengguna yang sedang login, tetapi tidak termasuk pengguna yang sedang login
        $absenMasuk = AbsenMasuk::whereHas('user', function ($query) use ($kategori, $userId) {
            $query->where('kategori', $kategori)
                ->where('id', '!=', $userId); // Kondisi untuk mengecualikan pengguna yang sedang login
        })->get();

        return view('kepala-unit.absen-masuk-guru', compact('absenMasuk'));
    }


    public function pulangkaryawan()
    {
        // Ambil kategori dari pengguna yang sedang login
        $kategori = auth()->user()->kategori;
        $userId = auth()->user()->id;
    
        // Ambil data absensi berdasarkan kategori pengguna yang sedang login
        $absenPulang = AbsenPulang::whereHas('user', function ($query) use ($kategori, $userId) {
            $query->where('kategori', $kategori)
            ->where('id', '!=', $userId); // Kondisi untuk mengecualikan pengguna yang sedang login
        })->get();
    
        return view('kepala-unit.absen-pulang-guru', compact('absenPulang'));
    }

    public function masukkepsek()
    {
        // Ambil kategori dari pengguna yang sedang login
        $userId = auth()->user()->id;
     
        // Ambil data absensi hanya untuk pengguna yang sedang login
        // dan urutkan berdasarkan waktu dari yang terbaru
        $absenMasuk = AbsenMasuk::where('user_id', $userId)
                                ->orderBy('created_at', 'desc')
                                ->get();
    
        return view('kepala-unit.absen-masuk-kepala', compact('absenMasuk'));
    }

    public function pulangkepsek()
    {
        // Ambil kategori dari pengguna yang sedang login
        $userId = auth()->user()->id;
     
        // Ambil data absensi hanya untuk pengguna yang sedang login
        // dan urutkan berdasarkan waktu dari yang terbaru
        $absenPulang = AbsenPulang::where('user_id', $userId)
                                ->orderBy('created_at', 'desc')
                                ->get();
    
        return view('kepala-unit.absen-pulang-kepala', compact('absenPulang'));
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function absen()
    {
        return view('kepala-unit.absen');
    }

    public function pulang()
    {
        return view('kepala-unit.pulang');
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
    
            $request->session()->flash('success', 'Berhasil Absen.');
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
    
            $request->session()->flash('success', 'Berhasil Absen.');
            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Gagal Absen Cek Gambar.');
            $request->session()->flash('error-details', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function laporanTk(Request $request)
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

        return view('kepala-unit.laporan-masuk-tk', compact('absenMasuk', 'absenPulang'));
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

        return view('kepala-unit.laporan-masuk-sd', compact('absenMasuk', 'absenPulang'));
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

        return view('kepala-unit.laporan-masuk-smp', compact('absenMasuk', 'absenPulang'));
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

        return view('kepala-unit.laporan-masuk-sma', compact('absenMasuk', 'absenPulang'));
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
