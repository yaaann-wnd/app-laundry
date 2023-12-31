<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use Illuminate\Http\Request;

class laundryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laundry = Laundry::all();

        return view('admin.laundry', compact('laundry'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_laundry' => 'required',
                'alamat_laundry' => 'required',
                'longitude_laundry' => 'required',
                'latitude_laundry' => 'required',
            ],
            [
                'nama_laundry.required' => 'Nama Laundry tidak boleh kosong!',
                'alamat_laundry.required' => 'Alamat tidak boleh kosong!',
                'longitude_laundry.required' => 'Pilih lokasi laundry di Map!',
                'latitude_laundry.required' => 'Pilih lokasi laundry di Map!',
            ]
        );

        $laundry = Laundry::create($request->all());

        if (!$laundry) {
            return redirect(route('laundry.index'))->with('error', 'Data yang anda masukkan tidak valid');
        }

        return redirect(route('laundry.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $laundry = Laundry::find($id);

        $laundry->delete();

        return redirect(route('laundry.index'));
    }
}
