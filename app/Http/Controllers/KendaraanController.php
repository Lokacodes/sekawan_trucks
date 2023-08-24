<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\Validator;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraans = Kendaraan::all();
        // dd($kendaraans);
        return view('layouts.trucks', compact('kendaraans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $validator = Validator::make($data, [
            'nama_kendaraan' => 'required|max:255',
            'plat_nomor' => 'required|max:255',
            'jenis_kendaraan' => 'required|max:255',
            'tipe_BBM' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('trucks')
                ->withErrors($validator)
                ->withInput();
        }

        Kendaraan::create($data);

        return redirect()->route('trucks');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $item = Kendaraan::findOrFail($id);

        $validator = Validator::make($data, [
            'nama_kendaraan' => 'required|max:255',
            'plat_nomor' => 'required|max:255',
            'jenis_kendaraan' => 'required|max:255',
            'tipe_BBM' => 'required|max:255',
            'penggunaan_BBM' => 'required|max:255',
            'status_kendaraan' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('trucks')
                ->withErrors($validator)
                ->withInput();
        }

        $item->update($data);

        return redirect()->route('trucks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
