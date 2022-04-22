<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Customer;

class CompaniesController extends Controller
{
    //
    public function index()
    {
        //
        $companies = Company::paginate(5);
        return view('companies.index', compact('companies'));

    }

    public function customersByCompaniesId($id){
        $customer = Customer::where('id_companies', $id)->get();
        return $customer;
    }
}
