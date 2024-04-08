<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $dokters = Dokter::query();
            return DataTables::of($dokters)
                ->toJson();
            // return DataTables::of($dokters)->make();
        }
        else{
            $dokters = Dokter::all();
            // dd($dokters);
            return view('apps.dokter.list', compact('dokters'));
        }
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:dokters,email',
            'jenis_kelamin' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
            'spesialis' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_gabung' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        
        Dokter::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'spesialis' => $request->spesialis,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_gabung' => $request->tanggal_gabung,
        ]);

        // if (request()->ajax()) {
            // $dokters = Dokter::all();
            // dd(DataTables::of($dokters)->toJson());
            // return DataTables::of($dokters)->make();
        // }
        return response()->json(['data'=> $request]);
        // return response()->json($dokters);
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
        if($id) {
            $record = Dokter::find($id);
            if ($record) {
                $record->delete();
                return response()->json(['success'=> 'berhasil menghapus data dokter dengan id-'.$id]);
            }
            else  return response()->json(['error'=> 'gagal menemukan data dokter dengan id-'.$id]);
        }
        else return response()->json(['error'=> 'data id tidak ada']);
    }
}
