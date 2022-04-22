<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    //
    public function index()
    {
        //
        $banks = Bank::paginate(5);
        return view('banks.index', compact('banks'));

    }
}
