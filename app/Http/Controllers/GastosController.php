<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Gasto;
use Illuminate\Support\Facades\Validator;

class GastosController extends Controller
{

    public function index()
    {
        $gastos = Gasto::all();
        return Inertia::render('Gastos/Index', ['gastos' => $gastos]);
    }

    public function create()
    {
        return Inertia::render('Gastos/Create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nome' => ['required'],
            'tipo' => ['required'],
            'valor' => ['required'],
        ])->validate();

        Gasto::create($request->all());

        return redirect()->route('gastos.index');
    }

    public function edit(Gasto $gasto)
    {
        return Inertia::render('Gastos/Edit', [
            'gasto' => $gasto
        ]);
    }

    public function update($id, Request $request)
    {
        Validator::make($request->all(), [
            'nome' => ['required'],
            'tipo' => ['required'],
            'valor' => ['required'],
        ])->validate();

        Gasto::find($id)->update($request->all());
        return redirect()->route('gastos.index');
    }

    public function destroy($id)
    {
        Gasto::find($id)->delete();
        return redirect()->route('gastos.index');
    }
}
