<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    //
    public function index()
    {
        //
        $cities = City::paginate(5);
        return view('cities.index', compact('cities'));

    }
}
