<?php

namespace App\Http\Controllers\api\categorie;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Propperti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GetProppertiCategorieController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Categorie $categorie)
    {


        $proppertis=Propperti::where('categorie_id','=',$categorie->id)->select('name')->get();

        return response()->json(['categorie' => $categorie,'proppertis'=>$proppertis], 200);

    }
}
