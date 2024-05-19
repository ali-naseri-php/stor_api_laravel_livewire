<?php

namespace App\Http\Controllers\api\store;


use App\Http\Controllers\api\store\sort\visit\AddVisitController;
use App\Http\Controllers\Controller;
use App\Models\Kala;


class GetProppertiKalaController extends Controller
{
    public function getproppertikala(int $id)
    {


        $kala = Kala::with('properties')->find($id);



        $addvisit=new AddVisitController();
        $addvisit->addvisit($kala->id);
        return response()->json(['kala' => $kala], 200);


    }
}
