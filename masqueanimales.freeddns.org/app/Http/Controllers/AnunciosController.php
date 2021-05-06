<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAnuncioPost;
use App\Models\CategoriaAnuncio;

class AnunciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*public function __construct()
    {
        $this->middleware('auth')->only('edit');
    }*/


    public function index()
    {

        $anuncios = Anuncio::orderBy("created_at")->paginate(6);

        return view('anuncios.index')->with('anuncios', $anuncios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anuncios.create', ['anuncio' => new Anuncio()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnuncioPost $request)
    {
        $idUsuario = Auth::user()->id;

        Anuncio::create($request->validated() + [
            'idUsuario' => $idUsuario
        ]);

        return redirect()->route('anuncios.index')->with('estado', 'Registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncio $anuncio)
    {
        return view('anuncios.show')->with('anuncio', $anuncio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Anuncio $anuncio)
    {
        return view('anuncios.edit')->with('anuncio', $anuncio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAnuncioPost $request, Anuncio $anuncio)
    {
        $anuncio->update($request->validated());

        return redirect()->route('anuncios.index')->with('estado', 'Anuncio modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncio $anuncio)
    {
        $anuncio->delete();
        return back()->with('estado', 'Se ha borrado correctamente');
    }

    public function misAnuncios()
    {
        $idUsuario = Auth::user()->id;
        $anuncios = Anuncio::select()->where('idUsuario', '=', $idUsuario)->paginate(10);
        return view('anuncios.index')->with('anuncios', $anuncios);
    }

    public function filtrar(CategoriaAnuncio $categoria)
    {
        $anuncios = Anuncio::select()->where('idCategoria', '=', $categoria->id)->paginate(6);
        $categorias = CategoriaAnuncio::select()->get();
        return view('anuncios.index')->with('anuncios', $anuncios)->with('categorias', $categorias);
    }
}
