<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dni;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    function __construct()
    {
        /*
        | Permisos que se cnfiguraran
        | User      =   show.user, create.user, edit.user, delete.user
        */
        $this->middleware('permission:show.user|create.user|edit.user|delete.user',['only'=>['index']]);
        $this->middleware('permission:create.user', ['only'=>['create', 'store']]); // indicar que puede crear y guardar datos 
        $this->middleware('permission:edit.user', ['only'=>['edit', 'update']]); // indicar que puede editar y actualizar 
        $this->middleware('permission:delete.user', ['only'=>['destroy']]); // indicar que puede eliminar datos 
        
    }




    public function datatable()
    {

        $data = User::all();
		return Datatables::of($data)->addColumn('actions', function($model) {

            $buttons = '<div class="btn-group">';
                /**
                 * Permisos
                 */
                if(auth()->user()->can('edit.user')){
                    $buttons .= "<a href='".route('user.edit', $model->id)."' data-id='$model->id' 
                    data-action='Update' class='btn btn-info' title='editar'><i class='fas fa-edit fa-1x'></i></a>";
                }

                if(auth()->user()->can('delete.user')) {
                    $buttons .= "<a href='javascript:void(0)' data-id='$model->id' data-route='".route('user.destroy', $model->id)
                    ."' class='btn btn-info btn-modal-delete-user' title='eliminar'><i class='fas fa-trash fa-1x'></i></a>";
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
        $documentos = Dni::all();
        $users = User::paginate(5);
        return view('users.index', compact('users', 'documentos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentos = Dni::all();
        $roles = Role::pluck('name', 'id')->all();
        return view('users.create', compact('roles', 'documentos'));
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
        $this->validate($request,[
            'fname' => 'required',
            'lname' => 'required',
            'dni_type' => 'required',
            'dni' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        DB::commit();

        } catch(\Exception $ex){
            DB::rollBack();
            throw $ex;
        }
        return redirect()->route('user.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Invocar modelos User y Rol
        $documentos = Dni::all();
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole', 'documentos'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Primero se realiza la validación del formulario
        $this->validate($request,[
            'fname' => 'required',
            'lname' => 'required',
            'dni_type' => 'required',
            'dni' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => "required|email|unique:users,email,$id",
            // 'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        //Condicional para exceptuar el campo password.
        $input = $request->all();
        if (!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input, array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('user.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            $type = 'success';
            $msg  = 'El Usuario ha sido eliminado exito';
        } catch (\Throwable $th) {
            $type = 'error';
            $msg  = 'El Usuario no puede eliminarse '. $th;
        }
        return compact('type', 'msg');
    }
}
