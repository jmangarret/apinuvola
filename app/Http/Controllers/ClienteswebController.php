<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClienteCollection;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;
use Illuminate\Support\Facades\Storage;

class ClienteswebController extends Controller
{
    public function index()
    {
        $clientes = new ClienteCollection(Cliente::paginate(5));

        return view('clientes.index', ['data'=>$clientes]);
    }

    public function show(Cliente $cliente)
    {
        //$cliente =  ClienteResource::make($cliente);
        //dd($cliente->resolve());
        return view('clientes.show', $cliente);

    }

    public function destroy($email)
    {
        $cliente = Cliente::where('email',$email)->first();

        Storage::delete($cliente->foto);

        $cliente->viajes()->delete();

        $cliente->delete();

        return redirect('clientes');

    }
}
