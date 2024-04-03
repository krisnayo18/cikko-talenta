<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
                ->json();
        }

        $dokters = Dokter::all();
        // dd($dokters);
        return view('apps.dokter.list2', compact('dokters'));
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
        // dd($request);
        return $request;
        
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
