<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pertanyaan = DB::table('pertanyaan')->get();

        $pertanyaan = Pertanyaan::all();

        return view('items.index', compact('pertanyaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        // $request->validate([
        //     'judul' => 'required',
        //     'isi' => 'required'
        // ]);

        $pertanyaan = new Pertanyaan;
        $pertanyaan->judul = $request['judul'];
        $pertanyaan->isi = $request['isi'];
        $pertanyaan->save();

        return redirect('/pertanyaan')->with('success', 'Pertanyaan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pertanyaan_id)
    {
        // $pertanyaan = DB::table('pertanyaan')->where('id', $pertanyaan_id)->first();

        $pertanyaan = Pertanyaan::find($pertanyaan_id);

        return view('items.show', compact('pertanyaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pertanyaan_id)
    {
        // $pertanyaan = DB::table('pertanyaan')->where('id', $pertanyaan_id)->first();

        $pertanyaan = Pertanyaan::find($pertanyaan_id); 
        return view('items.edit', compact('pertanyaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pertanyaan_id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);

        // $query = DB::table('pertanyaan')
        //             ->where('id', $pertanyaan_id)
        //             ->update([
        //                 'judul' => $request['judul'],
        //                 'isi' => $request['isi']
        //             ]);

        $update = Pertanyaan::where('id', $pertanyaan_id)->update([
            'judul' => $request['judul'],
            'isi' => $request['isi']
        ]);

        return redirect('/pertanyaan')->with('success', 'Update Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pertanyaan_id)
    {
        // $query = DB::table('pertanyaan')->where('id', $pertanyaan_id)->delete();

        Pertanyaan::destroy($pertanyaan_id);
        return redirect('/pertanyaan')->with('success', 'Delete Berhasil');
    }
}
