<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    function __construct()
    {
        /*
        | Permisos que se configuraran
        | Customer  =   show.customer, create.customer, edit.customer, delete.customer
        */     
        $this->middleware('permission:show.customer|create.customer|edit.customer|delete.customer',['only'=>['index']]);
        $this->middleware('permission:create.customer', ['only'=> ['create', 'store']]); // indicar que puede crear y guardar datos 
        $this->middleware('permission:edit.customer', ['only'=> ['edit', 'update']]); // indicar que puede editar y actualizar 
        $this->middleware('permission:delete.customer', ['only'=> ['destroy']]); // indicar que puede eliminar datos     
    }

    public function datatable()
    {
        // $data = User::with(['customer'])->get();
        $data = Customer::all();
		return Datatables::of($data)->addColumn('actions', function($model) {

            $buttons = '<div class="btn-group">';
                /**
                 * Permisos
                 */
                if(auth()->user()->can('edit.customer')){
                    $buttons .= "<a href='".route('customer.edit', $model->id)."' data-id='$model->id' 
                    data-action='Update' class='btn btn-info' title='editar'><i class='fas fa-edit fa-1x'></i></a>";
                }

                if(auth()->user()->can('delete.customer')) {
                    $buttons .= "<a href='javascript:void(0)' data-id='$model->id' data-route='".route('customer.destroy', $model->id)
                    ."' class='btn btn-info btn-modal-delete-customer' title='eliminar'><i class='fas fa-trash fa-1x'></i></a>";
                }

            $buttons .= '</div>';

			return $buttons;
        })->rawColumns(['actions'])->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        $customers = Customer::paginate(5);
        return view('customers.index', compact('customers', 'companies'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('customers.create', compact('companies'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction(); //Esto funciona para hacer el RollBack en la Db si hay un error de create
        try
        {
        request()->validate([
            'fname_contact'=>'required',
            'lname_contact'=>'required',
            'company'=>'required', 
            'nit'=>'required',
            'address'=>'required', 
            'phone'=>'required',
            'email'=>'required',
            'id_companies'=>'required'
        ]);
        Customer::create($request->all());
        DB::commit();

        } catch(\Exception $ex){
            DB::rollBack();
            throw $ex;
        }
        return redirect()->route('customer.index'); 
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view ('customers.edit', compact('customer', 'companies'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        request()->validate([
            'fname_contact'=>'required',
            'lname_contact'=>'required',
            'company'=>'required', 
            'nit'=>'required',
            'address'=>'required', 
            'phone'=>'required',
            'email'=>'required',
            'id_companies'=>'required'
        ]);
        $customer->update($request->all());
        return redirect()->route('customer.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            $type = 'success';
            $msg  = 'El cliente ha sido eliminado exito';
        } catch (\Throwable $th) {
            $type = 'error';
            $msg  = 'El cliente no puede eliminarse '. $th;
        }
        return compact('type', 'msg');
    }
}
