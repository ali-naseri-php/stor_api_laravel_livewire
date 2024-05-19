<?php

namespace App\Http\Controllers\api\store\sort\costly;

use App\Http\Controllers\Controller;
use App\Models\Kala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CostlyController extends Controller
{
    public function costlyAll()
    {

        $kalas = Kala::orderBy('price', 'DESC')->get();
        return response()->json(['kalas' => $kalas], 200);


    }

    public function costlyWhereAll($categorie, $brand)
    {
        $validator = Validator::make(['categorie' => $categorie, 'brand' => $brand], [
            'categorie' => 'required|int',
            'brand' => 'required|int',

        ]);
        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);


        $kalas = DB::table('kalas')
            ->leftJoin('kalavisits', 'kalavisits.kala_id', '=', 'kalas.id')
            ->leftJoin('kalas_proppertis', 'kalas_proppertis.kala_id', '=', 'kalas.id')
            ->leftJoin('proppertis', 'proppertis.id', '=', 'kalas_proppertis.propperti_id')
            ->leftJoin('categories', 'categories.id', '=', 'proppertis.categorie_id')
            ->where('categories.id', '=', $categorie)
            ->orderBy('kalas.price', 'DESC')
            ->groupBy('kalas.id', 'kalas.name', 'kalas.weight', 'kalas.body', 'kalas.price', 'kalas.number_kala', 'kalas.created_at', 'kalas.updated_at')
            ->select('kalas.*')
            ->get();
        return response()->json(['kalas' => $kalas], 200);


    }

    public function costlyWhereCategorie($categorie)
    { $validator = Validator::make(['categorie' => $categorie], [
        'categorie' => 'required|int',
    ]);
        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);


        $kalas = DB::table('kalas')
            ->leftJoin('kalavisits', 'kalavisits.kala_id', '=', 'kalas.id')
            ->leftJoin('kalas_proppertis', 'kalas_proppertis.kala_id', '=', 'kalas.id')
            ->leftJoin('proppertis', 'proppertis.id', '=', 'kalas_proppertis.propperti_id')
            ->leftJoin('categories', 'categories.id', '=', 'proppertis.categorie_id')
            ->where('categories.id', '=', $categorie)
            ->orderBy('kalas.price',"DESC" )
            ->groupBy('kalas.id', 'kalas.name', 'kalas.weight', 'kalas.body', 'kalas.price', 'kalas.number_kala', 'kalas.created_at', 'kalas.updated_at')
            ->select('kalas.*')
            ->get();
        return response()->json(['kalas' => $kalas], 200);



    }
    public function costlyWhereBrand($brand){

        $validator = Validator::make([ 'brand' => $brand], [
            'brand' => 'required|int',

        ]);
        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);
        $kalas = [];
        return response()->json(['kalas' => $kalas], 200);

    }
}




