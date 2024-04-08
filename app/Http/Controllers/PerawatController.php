<?php

namespace App\Http\Controllers;

use App\Models\Perawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerawatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perawats = Perawat::all();
        // dd($perawats);
        return view('apps.perawat.list', compact('perawats'));
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
            'email' => 'required|unique:perawats,email',
            'jenis_kelamin' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
            'bagian' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_gabung' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        
        Perawat::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'bagian' => $request->bagian,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_gabung' => $request->tanggal_gabung,
        ]);

        return response()->json(['data'=> $request]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $perawat = Perawat::findOrFail($id);
        return view('apps.perawat.view', compact('perawat'));
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
            $record = Perawat::find($id);
            if ($record) {
                $record->delete();
                return response()->json(['success'=> 'berhasil menghapus data dokter dengan id-'.$id]);
            }
            else  return response()->json(['error'=> 'gagal menemukan data dokter dengan id-'.$id]);
        }
        else return response()->json(['error'=> 'data id tidak ada']);
    }
}
