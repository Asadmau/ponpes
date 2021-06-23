<?php

namespace App\Http\Controllers\ponpes\pekerjaan;

use App\Http\Controllers\Controller;
use App\Pekerjaan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pekerjaan::orderBy('created_at', 'desc')->paginate(10);

        return view('ponpes.pekerjaan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ponpes.pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pekerjaan' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $data_input = [
                    'pekerjaan' => $request->input('pekerjaan'),
                ];
                Pekerjaan::create($data_input);
                return redirect()->route('ponpes.pekerjaan.index')->with('success', 'Data berhasil ditambahkan.');
            }
        } catch (\Throwable $th) {
            return redirect()->route('ponpes.pekerjaan.index')->with('fail_msg', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pekerjaan::find($id);

        return view('ponpes.pekerjaan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'pekerjaan' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $data_update = [
                    'pekerjaan' => $request->input('pekerjaan'),
                ];
                Pekerjaan::where('id', '=', $id)->update($data_update);
                return redirect()->route('ponpes.pekerjaan.index')->with('success', 'Data berhasil Di Edit.');
            }
        } catch (\Throwable $th) {
            return redirect()->route('ponpes.pekerjaan.index')->with('fail_msg', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pekerjaan::where('id', '=', $id)->delete();
        return redirect()->route('ponpes.pekerjaan.index')->with('success', 'Data berhasil dihapus.');
    }
}
