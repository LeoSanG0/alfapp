<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Agregar modelos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Yajra\DataTables\DataTables;

class RolController extends Controller
{
    function __construct()
    {
        /*
        | Permisos que se cnfiguraran
        | Rol       =   show.rol, create.rol, edit.rol, delete.rol
        */
        $this->middleware('permission:show.rol|create.rol|edit.rol|delete.rol',['only'=>['index']]);
        $this->middleware('permission:create.rol', ['only'=>['create', 'store']]); // indicar que puede crear y guardar datos 
        $this->middleware('permission:edit.rol', ['only'=>['edit', 'update']]); // indicar que puede editar y actualizar 
        $this->middleware('permission:delete.rol', ['only'=>['destroy']]); // indicar que puede eliminar datos 
        
    }

    public function datatable()
    {
        // $data = User::with(['customer'])->get();
        $data = Role::all();
		return Datatables::of($data)->addColumn('actions', function($model) {

            $buttons = '<div class="btn-group">';
                /**
                 * Permisos
                 */
                if(auth()->user()->can('edit.rol')){
                    $buttons .= "<a href='".route('role.edit', $model->id)."' data-id='$model->id' 
                    data-action='Update' class='btn btn-info' title='editar'><i class='fas fa-edit fa-1x'></i></a>";
                }

                if(auth()->user()->can('delete.rol')) {
                    $buttons .= "<a href='javascript:void(0)' data-id='$model->id' data-route='".route('role.destroy', $model->id)
                    ."' class='btn btn-info btn-modal-delete-role' title='eliminar'><i class='fas fa-trash fa-1x'></i></a>";
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
        //Hacer referencia al modelo de roles
        $roles = Role::paginate(5);
        return view('roles.index', compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 'crear' y 'editar' se crean de esa forma para las plantillas y diferenciar de los nombres de los metodos
        $permission = Permission::get();
        return view('roles.create', compact('permission')); //roles.create hace referencia a la ruta view/roles/create.blade.php
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Para guardas los datos
        $this->validate($request, ['name' => 'required', 'permission' => 'required']);
        $role = Role::create(['name' => $request->input('name')]);
        $role-> syncPermissions($request->input('permission'));

        return redirect()->route('role.index');
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
    public function edit($id)
    {
        $role = Role::find ($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
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
        $this->validate($request, ['name' => 'required', 'permission' => 'required']);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('role.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
            $type = 'success';
            $msg  = 'El rol ha sido eliminado exito';
        } catch (\Throwable $th) {
            $type = 'error';
            $msg  = 'El rol no puede eliminarse '. $th;
        }
        return compact('type', 'msg');
    }
}
