<?php

namespace App\Http\Controllers\api\store\sort\visit;

use App\Http\Controllers\Controller;
use App\Models\Kalavisit;
use Illuminate\Http\Request;

class AddVisitController extends Controller
{
    public function addvisit($kala_id)
    {

        $kalavisit = Kalavisit::where('kala_id','=',$kala_id)->first();

        $kalavisit->number = $kalavisit->number + 1;
        $kalavisit->save();
    }
}
