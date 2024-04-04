<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (request()->ajax()) {
            // $dokters = Dokter::query();
            // return DataTables::of($dokters)
            //     ->toJson();
            
        $dokters = Dokter::all();
        //     return DataTables::of($dokters)->make();
        // }
        // dd($dokters);
        return view('apps.dokter.list2', compact('dokters'));
        // return view('apps.dokter.list2');
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
        // $this->validate($request,[
        //     'nama' => 'required',
        //     'email' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'nomor_hp' => 'required',
        //     'alamat' => 'required',
        //     'spesialis' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'tanggal_gabung' => 'required',
        // ]);
        
        dd($request->tanggal_lahir);

        
        Dokter::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'spesialis' => $request->spesialis,
            'tanggal_lahir' => date_format($request->tanggal_lahir, "YYYY-MM-DD"),
            'tanggal_gabung' => date_format($request->tanggal_gabung,"YYYY-MM-DD"),
        ]);

        // DB::transaction(function () {
          
        // }, 5);
        return response()->json(['success'=>'Laravel ajax example is being processed.']);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd('show'.$id);
        $dokter = Dokter::findOrFail($id);
        return view('apps.dokter.view', compact('dokter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd('delete'.$id);
        // $teetime = Dokter::where('id', '=', $id)->firstOrFail();
        // $teetime->destroy();
    }
}
