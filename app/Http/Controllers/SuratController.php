<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\KategoriSurat;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_surats = KategoriSurat::all();
        $surats = Surat::all();
        return view('surat.surat',compact('surats','kategori_surats'));
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
        if($request->hasFile('file_surat')) {
            $uploadPath = public_path('hasil-file-surat');

            $file = $request->file('file_surat');
            $nama_file_surat = $file->getClientOriginalName();

            if($file->move($uploadPath, $nama_file_surat)) {
                $media = new Surat;
                $media->kategori = $request->kategori;
                $media->judul = $request->judul;
                $media->file_surat = $nama_file_surat;
                $media->keterangan = $request->keterangan;
                $media->save();

                return redirect()->route('surats.index');
            }
        }

        // Surat::create([
        //     'kategori' => $request->kategori,
        //     'judul' => $request->judul,
        //     'file_surat' => $request->file_surat,
        // ]);

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
