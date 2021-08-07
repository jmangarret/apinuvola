<?php

namespace App\Http\Controllers;

use App\Http\Resources\ViajesCollection;
use App\Models\Viajes;

class ViajeswebController extends Controller
{
    public function index()
    {
        $viajes = new ViajesCollection(Viajes::paginate(5));

        return view('viajes.index', ['data'=>$viajes]);
    }
    public function show($email)
    {
        $viajes = new ViajesCollection(Viajes::where('email',$email)->paginate(5));

        return view('viajes.index', ['data'=>$viajes]);
    }
}
