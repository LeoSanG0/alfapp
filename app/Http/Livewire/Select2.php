<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\State;

class Select2 extends Component
{
    public $state;

    

    public function render()
    {   
        // $this->state = State::orderBy('name', 'asc')->get();

        return view('quotes.create');
        //->extends('layouts.theme.app')
        //->section('content');
    }
   

}
