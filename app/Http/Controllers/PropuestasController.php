<?php

namespace App\Http\Controllers;

use App\Notifications\NewWatcher;
use App\Propuestas;
use App\User;
use Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PropuestasController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        // $this->authorizeResource(Propuestas::class);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', Propuestas::class);

        $user = auth()->id();

        $table = (new \Okipa\LaravelTable\Table)->model(\App\Propuestas::class)->routes(
            [
                'index' => ['name' => 'propuestas.index'],
                'create' => ['name' => 'propuestas.create'],
                'edit' => ['name' => 'propuestas.edit'],
                'destroy' => ['name' => 'propuestas.destroy'],
                'show' => ['name' => 'propuestas.show'],
            ]
        )->query(function ($query) use ($user) {
            // lo quiero todo
            $query->select('*');
            // pero solo del usuario
            $query->where('owner', '=', $user);
        });

        $table->column('id')->title('ID')->searchable();
        $table->column('cif')->title('CIF')->sortable()->searchable();
        $table->column('type')->title('Tipo');
        $table->column('shortdescription')->title('Descripcion');

        return view('propuestas.index', compact('table'));

    }

    /**
     * Muestra las propuestas asignadas a un tercero
     *
     * @return \Illuminate\Http\Response
     */
    public function myWatchers()
    {

        $user = auth()->id();

        $table = (new \Okipa\LaravelTable\Table)->model(\App\Propuestas::class)->routes(
            [
                'index' => ['name' => 'propuestas.index'],
                'create' => ['name' => 'propuestas.create'],
                'edit' => ['name' => 'propuestas.edit'],
                'destroy' => ['name' => 'propuestas.destroy'],
                'show' => ['name' => 'propuestas.show'],
            ]
        )->query(function ($query) use ($user) {
            // some examples of what you can do
            $query->select('*');
            $query->join('propuestas_users', 'propuestas_gasto.id', '=', 'propuestas_users.propuestas_id');
            // add a constraint
            $query->where('propuestas_users.user_id', '=', $user);
        });

        $table->column('id')->title('ID')->searchable();
        $table->column('cif')->title('CIF')->sortable()->searchable();
        $table->column('type')->title('Tipo');
        $table->column('shortdescription')->title('Descripcion');

        return view('propuestas.index', compact('table'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Propuestas::class);

        return view('propuestas.create');
    }

    /**
     * Show the form for creating a new resource.
     * SOLO OBRAS
     *
     * @return \Illuminate\Http\Response
     */
    public function createObras()
    {
        $this->authorize('create', Propuestas::class);

        return view('propuestas.createObras');
    }

    /**
     * Show the form for creating a new resource.
     * SOLO SERVICIOS
     *
     * @return \Illuminate\Http\Response
     */
    public function createServicios()
    {
        $this->authorize('create', Propuestas::class);

        return view('propuestas.createServicios');
    }

    /**
     * Show the form for creating a new resource.
     * SOLO SUMINISTROS
     *
     * @return \Illuminate\Http\Response
     */
    public function createSuministros()
    {
        $this->authorize('create', Propuestas::class);

        return view('propuestas.createSuministros');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Propuestas::class);

        $attributes = $request->validate([
            'cif' => ['required', 'string'],
            'totalamount' => ['required', 'numeric', 'min:1', 'max:40000'],
            'type' => ['required', 'numeric', 'min:1', 'max:3'],
            'shortdescription' => ['required', 'string', 'max:250'],
            'objeto' => ['string', 'nullable', 'max:250'],
            'facturacion' => ['numeric', 'nullable', 'min:1', 'max:2'],
            'finishdate' => ['after:today', 'nullable'],
        ]);

        $user = Auth::user();

        $attributes['owner'] = $user->id;

        Propuestas::create($attributes);

        flash('Propuesta creada con exito')->success();

        return redirect()->route('propuestas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Propuestas  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function show(Propuestas $propuesta)
    {
        $this->authorize('view', $propuesta);

        //TO-DO: mover fuera de controlador

        $allUsers = User::select('id', 'name')->get();

        $users = $allUsers->merge($propuesta->users);

        return view('propuestas.show', compact('propuesta', 'users', 'allUsers'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Propuestas  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Propuestas $propuesta)
    {
        $this->authorize('view', $propuesta);

        return view('propuestas.edit', compact('propuesta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Propuestas  $propuestas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propuestas $propuesta)
    {
        $this->authorize('view', $propuesta);

        $attributes = $request->validate([
            'shortdescription' => ['required', 'string', 'max:250'],
            'objeto' => ['string', 'nullable', 'max:250'],
            'facturacion' => ['numeric', 'nullable', 'min:1', 'max:2'],
            'finishdate' => ['after:today', 'nullable'],
        ]);

        $propuesta->update($attributes);

        $propuesta->save();

        flash('Propuesta editada con exito')->success();

        return redirect()->route('propuestas.show', $propuesta->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Propuestas  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propuestas $propuesta)
    {
        $this->authorize('delete', $propuesta);

        $propuesta->delete();

        return redirect()->route('propuestas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Propuestas  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function addAmount(Propuestas $propuesta, Request $request)
    {
        $this->authorize('view', $propuesta);

        if ($propuesta->addAmount($request->amount)) {
            flash('Cantidad añadida con exito')->success();
            return redirect()->route('propuestas.show', array('propuesta' => $propuesta->id));
        } else {
            flash('La cantidad introducida es inválida')->error();
            return redirect()->route('propuestas.show', array('propuesta' => $propuesta->id));
        }

        return redirect()->route('propuestas.index');
    }

    /**
     * Add watchers to propuesta
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PRopuestas  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function editWatchers(Propuestas $propuesta, Request $request)
    {
        //TO-DO: mover logica a modelo en vez de controlador

        $propuesta->users()->sync($request->watchers);

        foreach ($request->watchers as $watcher) {
            User::find($watcher)->notify(new NewWatcher($propuesta));
        }

        return redirect()->route('propuestas.show', array('propuesta' => $propuesta->id));
    }

    /**
     * Crear PDF de la propuesta
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PRopuestas  $propuesta
     * @return \Illuminate\Http\Response
     */
    public function createpdf(Propuestas $propuesta)
    {

        $pdf = PDF::loadView('pdf.propuesta', compact('propuesta'));
        return $pdf->stream();

    }

}
