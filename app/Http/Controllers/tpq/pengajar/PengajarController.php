<?php

namespace App\Http\Controllers\tpq\pengajar;

use App\Http\Controllers\Controller;
use App\Pengajar;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajar = Pengajar::orderBy('created_at', 'desc')->paginate(20);
        return view('tpq.pengajar.index', compact('pengajar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tpq.pengajar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengajar' => 'required',
        ]);

        if ($request->hasFile('files')) {
            $request->validate([
                'src_pengajar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $request->file->store('files', 'public');

            $pengajar = new Pengajar([
                'nama_pengajar' => $request->get('nama_pengajar'),
                'src_pengajar' => $request->file->hashName(),
            ]);

            $pengajar->save();
        }

        return redirect()->route('tpq.pengajar.index')->with('success', 'berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengajar  $pengajar
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajar $pengajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengajar  $pengajar
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajar $pengajar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengajar  $pengajar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengajar $pengajar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengajar  $pengajar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajar $pengajar)
    {
        //
    }
}
