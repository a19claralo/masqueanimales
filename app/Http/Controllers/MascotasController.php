<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use App\Models\CategoriaMascota;
use App\Http\Requests\StoreMascotaPost;

class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascotas = Mascota::orderBy("created_at")->paginate(6);

        return view('mascotas.index')->with('mascotas', $mascotas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mascotas.create', ['mascota' => new Mascota()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMascotaPost $request)
    {
        Mascota::create($request->validated());
        return redirect()->route('mascotas.index')->with('estado', 'Registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mascota $mascota)
    {
        return view('mascotas.show')->with('mascota', $mascota);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit')->with('mascota', $mascota);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMascotaPost $request, Mascota $mascota)
    {
        $mascota->update($request->validated());

        return redirect()->route('mascotas.index')->with('estado', 'Se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
        return back()->with('estado', 'Se ha borrado correctamente');
    }

    public function filtrar(CategoriaMascota $categoria)
    {
        $mascotas = Mascota::select()->where('idCategoria', '=', $categoria->id)->paginate(6);
        $categorias = CategoriaMascota::select()->get();
        return view('mascotas.index')->with('mascotas', $mascotas)->with('categorias', $categorias);
    }
}
