<?php

namespace App\Http\Controllers\api\store\sort\visit;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kalavisit;
use Illuminate\Support\Facades\Validator;

class MostvisitingController extends Controller
{
    public function mostvisitAll()
    {
        $kalas = Kalavisit::with('kala')->orderBy('number', 'desc')->get();

        return response()->json(['kalavisit' => $kalas], 200);

    }

    public function mostvisitWhereAll($categorie, $brand)
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
            ->orderBy('kalavisits.number', 'DESC')
            ->groupBy('kalas.id', 'kalas.name', 'kalas.weight', 'kalas.body', 'kalas.price', 'kalas.number_kala', 'kalas.created_at', 'kalas.updated_at')
            ->select('kalas.*')
            ->get();

        return response()->json(['kalas' => $kalas], 200);

    }


    public function mostvisitWhereCategorie($categorie)
    {
        $validator = Validator::make(['categorie' => $categorie], [
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
            ->orderBy('kalavisits.number', 'DESC')
            ->groupBy('kalas.id', 'kalas.name', 'kalas.weight', 'kalas.body', 'kalas.price', 'kalas.number_kala', 'kalas.created_at', 'kalas.updated_at')
            ->select('kalas.*')
            ->get();
        return response()->json(['kalas' => $kalas], 200);


    }

    public function mostvisitWhereBrand($brand)
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



