<?php

namespace App\Http\Controllers;

use App\Terceros;
use Illuminate\Http\Request;

class TercerosController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        // $this->authorizeResource(Terceros::class);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Terceros::class);

        $table = (new \Okipa\LaravelTable\Table)->model(\App\Terceros::class)->routes(
            [
                'index' => ['name' => 'terceros.index'],
                'create' => ['name' => 'terceros.create'],
                'edit' => ['name' => 'terceros.edit'],
                'destroy' => ['name' => 'terceros.destroy'],
                'show' => ['name' => 'terceros.show'],
            ]
        );
        $table->column('cif')->title('CIF')->searchable();
        $table->column('name')->title('Nombre')->sortable()->searchable();
        $table->column('email')->title('E-mail');

        return view('terceros.index', compact('table'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Terceros::class);

        return view('terceros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Terceros::class);

        $attributes = $request->validate([
            'cif' => ['required', 'string'],
            'name' => ['required', 'string'],
        ]);

        Terceros::create($attributes);

        return redirect()->route('terceros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Terceros  $terceros
     * @return \Illuminate\Http\Response
     */
    public function show(Terceros $tercero)
    {
        $this->authorize('view', Terceros::class);

        return view('terceros.show', compact('tercero'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Terceros  $terceros
     * @return \Illuminate\Http\Response
     */
    public function edit(Terceros $tercero)
    {
        $this->authorize('update', Terceros::class);

        return view('terceros.edit', compact('tercero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Terceros  $terceros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terceros $tercero)
    {
        $this->authorize('update', Terceros::class);

        //TODO: validar!!!
        $tercero->cif = $request->cif;
        $tercero->name = $request->name;

        $tercero->save();

        return redirect()->route('terceros.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Terceros  $terceros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terceros $tercero)
    {
        $this->authorize('delete', Terceros::class);

        $tercero->delete();

        return redirect()->route('terceros.index');

    }

    /**
     * Search for specific cifs
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchCifs(Request $request)
    {
        //TO-DO: mover logica a modelo en vez de controlador

        $data = Terceros::select("cif", "name")
            ->where("cif", "like", "%{$request->get('q')}%")
            ->get();

        return response()->json($data);
    }
}
