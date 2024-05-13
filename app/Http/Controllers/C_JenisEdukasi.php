<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_JenisEdukasi;
use App\Models\MateriEdukasi;
use App\Models\SubMateriEdukasi;
use App\Models\rating_edukasi;

class C_JenisEdukasi extends Controller
{
    public function index()
    {
        $jenis = M_JenisEdukasi::orderBy('created_at', 'desc')->with('materiEdukasi')->get(); //untuk menampilkan semua jenis di header                
        $first = M_JenisEdukasi::orderBy('created_at', 'desc')->first(); //untuk menampilkan jenis yang terbaru
        $materi = MateriEdukasi::where('jenis_id', $first?->id)->first();        //ntuk mengambil jenis yang paling baru
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
        // dd($materi);
        return view('admin.edukasi.list', compact('jenis', 'first', 'firstMateris', 'firstSub','firstRating','avgRating'));
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        $Jenis = $request->validate([
            'judul_modul' => 'required'
        ]);
        $newJenis = M_JenisEdukasi::create($Jenis);

        return back();
    }
    public function toEdukasi(Request $request)
    {
        $jenis = M_JenisEdukasi::first();
        dd($jenis->id);
        return redirect(route('admin.edukasi', [$jenis->id]));
    }
}
