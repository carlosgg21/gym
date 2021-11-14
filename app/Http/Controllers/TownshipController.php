<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Township;

class TownshipController extends Controller
{
    public function getTownByProvince($id){
        $townships = Township:: orderBy('name', 'ASC')->where('province_id',$id)->pluck("id","name");
        return  response()->json($townships, 200);
    }
}
