<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Agregar modelos
use App\Models\Quote;
use App\Models\State;
use App\Models\City;
use App\Models\Scope;
use App\Models\Customer;
use App\Models\Company;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class QuoteController extends Controller
{
    function __construct()
    {
        /*
        | Permisos que se configuraran
        | Quote  =   show.quote, create.quote, edit.quote, delete.quote
        */     
        $this->middleware('permission:show.quote|create.quote|edit.quote|delete.quote',['only'=>['index']]);
        $this->middleware('permission:create.quote', ['only'=> ['create', 'store']]); // indicar que puede crear y guardar datos 
        $this->middleware('permission:edit.quote', ['only'=> ['edit', 'update']]); // indicar que puede editar y actualizar 
        $this->middleware('permission:delete.quote', ['only'=> ['destroy']]); // indicar que puede eliminar datos
        $this->middleware('permission:pdf.quote', ['only'=> ['pdf']]); // indicar que puede generar PDF     

    }

    public function datatable(){

        $data = Quote::with('customer')->get();

		return Datatables::of($data)->addColumn('actions', function($model) {

            $buttons = '<div class="btn-group">';
                /**
                 * Cambiar permisos
                 */
                if(auth()->user()->can('pdf.quote')){
                    $buttons .= "<a href='".route('quote.pdf', $model->id)."' class='btn btn-danger' title='pdf' download><i class='fas fa-file-pdf fa-1x'></i></a>";
                }

                if(auth()->user()->can('edit.quote')){
                    $buttons .= "<a href='".route('quote.edit', $model->id)."' data-id='$model->id' data-action='Update' class='btn btn-info' title='editar'><i class='fas fa-edit fa-1x'></i></a>";
                }

                if(auth()->user()->can('delete.quote')) {
                    $buttons .= "<a href='javascript:void(0)' data-id='$model->id' data-route='".route('quote.destroy', $model->id)."' class='btn btn-info btn-modal-delete-quote' title='eliminar'><i class='fas fa-trash fa-1x'></i></a>";
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
    public function index( Request $request)
    {
        $companies = Company::all();
        $states = State::all();
        $city =  City::all();
        $scopes = Scope::all();
        $customers = Customer::all();
        $quotes = Quote::paginate(5);
        return view('quotes.index', compact('quotes', 'states','city','scopes', 'customers', 'companies'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $states    = State::all();
        $city      =  City::all();
        $scopes    = Scope::all();
        $customers = Customer::all();

        $code         = Quote::pluck('code')->last();
        $current_date = Carbon::now('America/Bogota');

        $pci = explode('-', $code);

        $new_pci = "PCI-RTP-{$current_date->year}-{$pci[3]}";

        return view('quotes.create',compact('states','city','scopes', 'customers', 'companies', 'new_pci'));
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
        //Primero se realiza la validación del formulario
        request()->validate([
            'code'=>'required',
            'date'=>'required',
            'name_project'=>'required',
            'observations'=>'required',
            'execution_time'=>'required',
            'subtotal'=>'required',
            'iva'=>'required',
            'total'=>'required',
            'value_add'=>'required',
            'validity'=>'required',
            'status'=>'required',
            'fscope'=>'required',
            'funit_value'=>'required',
            'sscope'=>'required',
            'sunit_value'=>'required',
            'tscope'=>'required',
            'tunit_value'=>'required',
            'payment_method'=>'required',
            'id_customers'=>'required',
            'id_cities'=>'required',
            'id_state'=>'required'
        ]);
        Quote::create($request->all());
        DB::commit();
        return redirect()->route('quote.index');           

        

        } catch(\Exception $ex){
            DB::rollBack();
            throw $ex;
        }
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
    public function edit(Quote $quote)
    {   
        $companies = Company::all();
        $states = State::all();
        $city =  City::all();
        $scopes = Scope::all();
        $customers = Customer::all();
        return view ('quotes.edit', compact('quote', 'states', 'city', 'scopes', 'customers', 'companies'));
    }

    public function editAjax($id)
    {  
        $quote = Quote::join('customers as c', 'c.id', 'quotes.id_customers')
                      ->join('companies as co', 'co.id', 'c.id_companies')
                      ->select('quotes.id_state', 'quotes.id_cities', 'quotes.id_customers', 'quotes.fscope', 'quotes.sscope', 'quotes.tscope', 'c.id_companies')
                      ->find($id);
        return compact('quote');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //Primero se realiza la validación del formulario
        request()->validate([
            'code'=>'required',
            'date'=>'required',
            'name_project'=>'required',
            'observations'=>'required',
            'execution_time'=>'required',
            'subtotal'=>'required',
            'iva'=>'required',
            'total'=>'required',
            'value_add'=>'required',
            'validity'=>'required',
            'status'=>'required',
            'fscope'=>'required',
            'funit_value'=>'required',
            // 'sscope'=>'required',
            // 'sunit_value'=>'required',
            // 'tscope'=>'required',
            'tunit_value'=>'required',
            'payment_method'=>'required',
            'id_customers'=>'required',
            'id_cities'=>'required',
            'id_state'=>'required'
        ]);

        // $request['sscope'] = isset($request->sscope) ? $request->sscope : NULL;
        // $request['sunit_value'] = isset($request->sunit_value) ? $request->sunit_value : NULL;
        // $request['tscope'] = isset($request->tscope) ? $request->tscope : NULL;
        // $request['tunit_value'] = isset($request->tunit_value) ? $request->tunit_value : NULL;

        $quote->update($request->all());
        return redirect()->route('quote.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        try {
            $quote->delete();
            $type = 'success';
            $msg  = 'La cotizacion ha sido eliminada exito';
        } catch (\Throwable $th) {
            $type = 'error';
            $msg  = 'La cotizacion no puede eliminarse '. $th;
        }
        return compact('type', 'msg');
    }

    public function formOptions(){
        $states = State::all();
        return compact('states');
    }

    public function pdf(Quote $quote)
    {
        $mpdf = new \Mpdf\Mpdf();
        $html = view('quotes.pdf', compact('quote'));
        $mpdf->WriteHTML($html);
        $fileName = $quote->code.'-'.time().'.pdf';
        try {
            $mpdf->Output($fileName, 'D');
        } catch (\Mpdf\MpdfException $e) {
            echo $e->getMessage();
        }
    }

    public function Cities (){
        $states = State::all();
        $cities = City::all();

        return view ('quotes.edit', compact('quote', 'states', 'city', 'scopes', 'customers', 'companies'));
    }
}
