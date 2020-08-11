<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PertanyaanController extends Controller
{
    public function create() {
        return view('items.create');
    }

    public function store(Request $request) {
        //dd($request->all());

        $request->validate([
            'judul' => 'required|unique:pertanyaan',
            'isi' => 'required'
        ]);

        $query = DB::table('pertanyaan')->insert([
            'judul' => $request['judul'],
            'isi' => $request['isi']
        ]);

        return redirect('/pertanyaan')->with('success', 'Pertanyaan Berhasil Ditambahkan!');
    }

    public function index(){
        $pertanyaan = DB::table('pertanyaan')->get();
        return view('items.index', compact('pertanyaan'));
    }

    public function show($pertanyaan_id){
        $pertanyaan = DB::table('pertanyaan')->where('id', $pertanyaan_id)->first();
        return view('items.show', compact('pertanyaan'));
    }

    public function edit($pertanyaan_id){
        $pertanyaan = DB::table('pertanyaan')->where('id', $pertanyaan_id)->first();

        return view('items.edit', compact('pertanyaan'));
    }

    public function update($pertanyaan_id, Request $request) {
        $request->validate([
            'judul' => 'required|unique:pertanyaan',
            'isi' => 'required'
        ]);

        $query = DB::table('pertanyaan')
                    ->where('id', $pertanyaan_id)
                    ->update([
                        'judul' => $request['judul'],
                        'isi' => $request['isi']
                    ]);

        return redirect('/pertanyaan')->with('success', 'Update Berhasil');
    }

    public function destroy($pertanyaan_id){
        $query = DB::table('pertanyaan')->where('id', $pertanyaan_id)->delete();

        return redirect('/pertanyaan')->with('success', 'Delete Berhasil');
    }
}
