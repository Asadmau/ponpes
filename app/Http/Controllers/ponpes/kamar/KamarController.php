<?php

namespace App\Http\Controllers\ponpes\kamar;

use App\Http\Controllers\Controller;
use App\Kamar;
use App\Pengurus;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengurus = Pengurus::all();
        $kamar = Kamar::all();
        return view('ponpes.kamar.index', compact('kamar', 'pengurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengurus = Pengurus::orderBy('nama_pengurus', 'asc')->get();
        return view('ponpes.kamar.create', compact('pengurus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Tidak boleh kosong, Wajib Di isi!!',
            'numeric' => 'Data Berupa Angka'
        ];
        $validasi = $request->validate([
            'nama_kamar' => 'required',
            'jml_lemari' => 'required|numeric',
        ]);

        if ($validasi) :
            $store = Kamar::create([
                'nama_kamar' => $request->nama_kamar,
                'pengurus_id' => $request->pengurus_id,
                'jml_lemari' => $request->jml_lemari,
            ], $messages);
            if ($store) {
                $request->session()->flash('success', 'Berhasil Di Tambahkan');
            } else {
                $request->session()->flash('error', 'Gagal Di Tambahkan');
            }
        endif;
        // dd($store);
        return redirect()->route('ponpes.index')->with('success', 'Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = [
            'kamar' => Kamar::find($id),
            'pengurus' => Pengurus::all()
        ];
        return view('ponpes.kamar.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Tidak boleh kosong, Wajib Di isi!!',
            'numeric' => 'Data Berupa Angka'
        ];
        $validasi = $request->validate([
            'nama_kamar' => 'required',
            'jml_lemari' => 'required|numeric',
        ]);

        if ($validasi) :
            $update = Kamar::find($id)->update([
                'nama_kamar' => $request->nama_kamar,
                'pengurus_id' => $request->pengurus_id,
                'jml_lemari' => $request->jml_lemari,
            ], $messages);
            if ($update) {
                $request->session()->flash('success', 'Berhasil Di Tambahkan');
            } else {
                $request->session()->flash('error', 'Gagal Di Tambahkan');
            }
        endif;
        // dd($update);
        return redirect()->route('ponpes.kamar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kamar::find($id);
        if ($data->delete()) {
            return back()->with('success', 'Data Berhasil Di hapus');
        } else {
            return back()->with('error', 'Data Gagal Di hapus');
        }
    }
}
