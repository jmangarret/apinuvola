<?php

namespace App\Http\Controllers;

use App\Models\Viajes;
use Illuminate\Http\Request;
use App\Http\Requests\ViajesRequest;
use App\Http\Resources\ViajesCollection;
use App\Http\Resources\ViajesResource;


class ViajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ViajesCollection(Viajes::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ViajesRequest $request)
    {
        $data = $request->all();
        $viajes = Viajes::create($data);

        return response()->json([
            'data' => array_merge($data, ['id' => $viajes->id]),
            'messsage' => 'Register Succesfully...',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Viajes  $viajes
     * @return \Illuminate\Http\Response
     */
    public function show(Viajes $viajes)
    {
        return ViajesResource::make($viajes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Viajes  $viajes
     * @return \Illuminate\Http\Response
     */
    public function update(ViajesRequest $request, Viajes $viajes)
    {
        $viajes->update($request->all());

        return response()->json([
            'data' => array_merge($request->all(), ['id' => $viajes->id]),
            'messsage' => 'Updated Succesfully...',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Viajes  $viajes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Viajes $viajes)
    {
        $viajes->delete();

        return response()->json([
            'data' => array_merge($request->all(), ['id' => $viajes->id]),
            'messsage' => 'Deleted Succesfully...',
        ], 200);
    }
}
