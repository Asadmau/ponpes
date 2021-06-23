<?php

namespace App\Http\Controllers\ponpes\pengurus;

use App\Http\Controllers\Controller;
use App\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $no = 1;
        $pengurus = Pengurus::orderBy('created_at', 'desc')->paginate(20);
        return view('ponpes.pengurus.index', compact('pengurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ponpes.pengurus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $rand        = rand(000, 999);

        // if ($request->hasFile('image')) {
        //     $file   = $request->file('image');
        //     $ext    = $file->getClientOriginalExtension();

        //     $image_pengurus = 'pengurus_' . $rand . '_' . date('YmdHis') . '.' . $ext;

        //     //moving
        //     $file->move(public_path(), 'img', $image_pengurus);
        // } else {
        //     $image_pengurus = NULL;
        // }

        $messages = [
            'required' => ':data tidak boleh kosong',
            'numeric' =>  ':data harus berupa anggka',
            'unique' => ':NISN sudah ada',
            'min' => ':minamal 9 angka'
        ];
        $validasi = $request->validate([
            'nama_pengurus' => 'required',
            'nis' => 'required|numeric|unique:pengurus|min:9',
            'tmp_lahir' => 'required',
            'thn_lahir' => 'required',
            'jns_kelamin' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'thn_akademik' => 'numeric|required',
            'src_pengurus' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $messages);

        if ($validasi) :
            $file = $request->file('src_pengurus')->store('img', 'public');
            $store = Pengurus::create([
                'nis' => $request->nis,
                'nama_pengurus' => $request->nama_pengurus,
                'tmp_lahir' => $request->tmp_lahir,
                'thn_lahir' => $request->thn_lahir,
                'jns_kelamin' => $request->jns_kelamin,
                'alamat' => $request->alamat,
                'jabatan' => $request->jabatan,
                'thn_akademik' => $request->thn_akademik,
                'src_pengurus' => $file
            ]);
            if ($store) :
                $request->session()->flash('success', 'Berhasil di tambahkan');
            else :
                $request->session()->flash('error', 'Maaf Data Gagal Ditambahkan');
            endif;
        endif;

        return redirect()->route('ponpes.pengurus.index')->with('success', 'Data berhasil Berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function show(Pengurus $pengurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pengurus::find($id);
        return view('ponpes.pengurus.edit', compact('data'));
        // return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $messages = [
        //     'required' => ':attribute tidak boleh kosong!',
        //     'numeric' => ':attribute harus berupa angka!',
        // ];

        // $validasi = $request->validate([
        //     'nama_pengurus' => 'required',
        //     'tmp_lahir' => 'required',
        //     'thn_lahir' => 'required',
        //     'jns_kelamin' => 'required',
        //     'alamat' => 'required',
        //     'jabatan' => 'required',
        //     'thn_akademik' => 'numeric|required',
        // ], $messages);

        // if ($validasi) :
        //     $update = Pengurus::find($id)->update([
        //         'nis' => $request->nis,
        //         'nama_pengurus' => $request->nama_pengurus,
        //         'tmp_lahir' => $request->tmp_lahir,
        //         'thn_lahir' => $request->thn_lahir,
        //         'jns_kelamin' => $request->jns_kelamin,
        //         'alamat' => $request->alamat,
        //         'jabatan' => $request->jabatan,
        //         'thn_akademik' => $request->thn_akademik,
        //         'src_pengurus' => $request->src_pengurus
        //     ]);
        //     if ($update) :
        //         $request->session()->flash('success', 'Berhasil di Edit');
        //     else :
        //         $request->session()->flash('error', 'Maaf Data Gagal DiEdit');
        //     endif;
        // endif;

        // return redirect()->route('pengurus.index');
        // ambil data dulu sesuai parameter $Id
        $pengurus = Pengurus::find($id);

        // Lalu update data nya ke database
        if ($request->file('src_pengurus')) {

            Storage::delete('public/' . $pengurus->src_pengurus);
            $file = $request->file('src_pengurus')->store('img', 'public');
            $pengurus->src_pengurus = $file;
        }

        $pengurus->nama_pengurus = $request->nama_pengurus;
        $pengurus->tmp_lahir = $request->tmp_lahir;
        $pengurus->thn_lahir = $request->thn_lahir;
        $pengurus->weigth = $request->weigth;
        $pengurus->categories_id = $request->categories_id;
        $pengurus->stok = $request->stok;


        $pengurus->save();

        return redirect()->route('ponpes.pengurus.index')->with('status', 'Berhasil Mengubah Kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pengurus::find($id);
        if ($data->delete()) {

            return back()->with('success', 'Data Berhasil Di hapus');
        } else {
            return back()->with('error', 'Gagal dihapus');
        }
    }
}
