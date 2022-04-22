<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;

class StateController extends Controller
{
    public function index()
    {
        //
        $states = State::paginate(5);
        return view('states.index', compact('states'));

    }

    public function citiesByStateId($id){
        $cities = City::where('id_states', $id)->get();
        return $cities;
    }


}