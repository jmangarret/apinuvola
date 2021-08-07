<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Http\Resources\ClienteCollection;
use App\Http\Resources\ClienteResource;
use Illuminate\Http\Request;

use App\Models\Cliente;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ClienteCollection(Cliente::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $data = $request->all();
        $data['foto']= $request->file('foto')->store('fotos/'.date('Y').'/'.date('M'));
        $cliente = Cliente::create($data);

        return response()->json([
            'data' => array_merge($data, ['id' => $cliente->id]),
            'messsage' => 'Register Succesfully...',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return ClienteResource::make($cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filterByName(Request $request)
    {

        if (!$request->nombre){
            return response()->json([
                'data' => array_merge($request->all()),
                'messsage' => 'ERROR: Field nombre is required...',
            ], 422);
        }
        $clientes = Cliente::where('nombre','like',$request->nombre.'%')->get();

        return new ClienteCollection($clientes);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filterByEmail(Request $request)
    {
        if (!$request->email){
            return response()->json([
                'data' => array_merge($request->all()),
                'messsage' => 'ERROR: Field email is required...',
            ], 422);
        }

        $clientes = Cliente::where('email','like',$request->email.'%')->get();

        return new ClienteCollection($clientes);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filterByTelf(Request $request)
    {
        if (!$request->telf){
            return response()->json([
                'data' => array_merge($request->all()),
                'messsage' => 'ERROR: Field telf is required...',
            ], 422);
        }

        $clientes = Cliente::where('telefono','like',$request->telf.'%')->get();

        return new ClienteCollection($clientes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $cliente
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());

        return response()->json([
            'data' => array_merge($request->all(), ['id' => $cliente->id]),
            'messsage' => 'Updated Succesfully...',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cliente $cliente)
    {
        $cliente->viajes()->delete();

        Storage::delete($cliente->foto);

        $cliente->delete();

        return response()->json([
            'data' => array_merge($request->all(), ['id' => $cliente->id]),
            'messsage' => 'Deleted Succesfully...',
        ], 200);

    }
}
