<?php

namespace App\Http\Controllers\api\store\sort\visit;

use App\Http\Controllers\Controller;
use App\Models\Kalavisit;


class AddKalaController extends Controller
{
    public function addkala($kala_id)
    {
        $kalavisit = new Kalavisit();
        $kalavisit->kala_id = $kala_id;
        $kalavisit->number = 1;
        $kalavisit->save();
    }
}
