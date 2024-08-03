<?php

namespace App\Http\Controllers\api\store\sort\cheapest;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Kala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CheapestController extends Controller
{


    public function cheapestWhereCategorie($categorie)
    {
        $validator = Validator::make(['categorie' => $categorie], [
            'categorie' => 'required|int',
        ]);
        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);





        $kalas = DB::table('kalas')
            ->leftJoin('kalas_proppertis', 'kalas_proppertis.kala_id', '=', 'kalas.id')
            ->leftJoin('proppertis', 'proppertis.id', '=', 'kalas_proppertis.propperti_id')
            ->leftJoin('categories', 'categories.id', '=', 'proppertis.categorie_id')
            ->where('categories.id', '=', $categorie)
            ->orderBy('kalas.price', )
            ->groupBy('kalas.id', 'kalas.name', 'kalas.weight', 'kalas.body', 'kalas.price', 'kalas.number_kala', 'kalas.created_at', 'kalas.updated_at')
            ->select('kalas.*')
            ->get();
        return response()->json(['kalas' => $kalas], 200);


    }

    public function cheapestWhereBrand($brand)
    {
        $validator = Validator::make([ 'brand' => $brand], [
            'brand' => 'required|int',

        ]);
        if ($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);
        $kalas = [];
        return response()->json(['kalas' => $kalas], 200);



    }

}






