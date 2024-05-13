<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\M_JenisEdukasi;
use App\Models\MateriEdukasi;
use App\Models\SubMateriEdukasi;
use App\Models\ulasan_edukasi; 
use App\Models\rating_edukasi; 
use App\Models\User;

class PenggunaEdukasi extends Controller
{
    public function index()
    {
        $jenis = M_JenisEdukasi::orderBy('created_at', 'desc')->with('materiEdukasi')->get(); //untuk menampilkan semua jenis di header                
        $first = M_JenisEdukasi::orderBy('created_at', 'desc')->first(); //untuk menampilkan jenis yang terbaru
        $materi = MateriEdukasi::where('jenis_id', $first->id)->first();        //ntuk mengambil jenis yang paling baru
        if ($materi != null) {
            $firstMateris = MateriEdukasi::where('jenis_id', $materi->jenis_id)->get(); //mengambil semua materi berdasarkan jenis yang paling baru
            $sub = MateriEdukasi::where('jenis_id', $materi->jenis_id)->first(); //mengambil semua materi berdasarkan jenis yang paling baru
            $firstSub = SubMateriEdukasi::where('materi_id', $sub->id)->orderBy('created_at', 'asc')->first();
            $firstRating = rating_edukasi::where('sub_id', $firstSub?->id)->count('id');
            $avgRating = rating_edukasi::where('sub_id', $firstSub?->id)->avg('rating');  
        } else {
            $firstMateris = null;
            $sub = null;
            $firstSub = null;
            $firstRating = null; 
            $avgRating = null; 
        }
        return view('pengguna.edukasi.list', compact('jenis', 'first', 'firstMateris', 'firstSub','firstRating','avgRating'));
    }
    public function materi(string $id)
    {
        $jenis = M_JenisEdukasi::orderBy('created_at', 'desc')->with('materiEdukasi')->get(); //untuk menampilkan semua jenis di header                
        $first = M_JenisEdukasi::where('id', $id)->first(); //untuk menampilkan jenis yang terbaru        
        $materi = MateriEdukasi::where('jenis_id', $first->id)->first();        //ntuk mengambil jenis yang paling baru
        if ($materi != null) {
            $firstMateris = MateriEdukasi::where('jenis_id', $materi->jenis_id)->get(); //mengambil semua materi berdasarkan jenis yang paling baru
            $sub = MateriEdukasi::where('jenis_id', $materi->jenis_id)->first(); //mengambil semua materi berdasarkan jenis yang paling baru
            $firstSub = SubMateriEdukasi::where('materi_id', $sub->id)->orderBy('created_at', 'asc')->first();
            $firstRating = rating_edukasi::where('sub_id', $firstSub?->id)->count('id');
            $avgRating = rating_edukasi::where('sub_id', $firstSub?->id)->avg('rating');  
        } else {
            $firstMateris = null;
            $sub = null;
            $firstSub = null;
            $firstRating = null; 
            $avgRating = null; 
        }
        return view('pengguna.edukasi.list', compact('jenis', 'first', 'firstMateris', 'firstSub','firstRating','avgRating'));
    }

    public function show(string $materi_id, string $sub_id)
    {
        $jenis = M_JenisEdukasi::orderBy('created_at', 'desc')->with('materiEdukasi')->get(); //untuk menampilkan semua jenis di header                
        $first = M_JenisEdukasi::where('id', $materi_id)->first(); //untuk menampilkan jenis yang terbaru        
        $materi = MateriEdukasi::where('jenis_id', $first->id)->first();        //ntuk mengambil jenis yang paling baru
        if ($materi != null) {
            $firstMateris = MateriEdukasi::where('jenis_id', $materi->jenis_id)->get(); //mengambil semua materi berdasarkan jenis yang paling baru
            $sub = MateriEdukasi::where('jenis_id', $materi->jenis_id)->first(); //mengambil semua materi berdasarkan jenis yang paling baru
            $firstSub = SubMateriEdukasi::where('id', $sub_id)->first();
            $firstRating = rating_edukasi::where('sub_id', $firstSub?->id)->count('id');
            $avgRating = rating_edukasi::where('sub_id', $firstSub?->id)->avg('rating');  
        } else {
            $firstMateris = null;
            $sub = null;
            $firstSub = null;
            $firstRating = null; 
            $avgRating = null; 
        }
        return view('pengguna.edukasi.list', compact('jenis', 'first', 'firstMateris', 'firstSub','firstRating','avgRating'));
    }

    

    public function ulasan(Request $request, string $id)
    {
        $ulasan = $request->validate([
            'author' => 'nullable',
            'isi' => 'required|string|max:120'
        ]);
        $user = User::find(auth()->user()?->id);
        if ($user !=  null) {
            $ulasan['user_id'] = $user;
        }
        $ulasan['sub_id'] = $id;

        ulasan_edukasi::create($ulasan);
        return redirect()->back();

    }
    public function rating(Request $request, string $id)
    {        
        $rating = $request->validate([            
            'rating' => 'required|integer'
        ]);
        $user = User::find(auth()->user()?->id);
        if ($user !=  null) {
            $rating['user_id'] = $user;
        }
        $rating['sub_id'] = $id;

        rating_edukasi::create($rating);
        return redirect()->back();

    }

}
