<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\PasswordRequest;
use DB;
use App\User;
use App\Empleado;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index()
    {
        $user = User::orderBy('updated_at', 'DESC')->get();
        return view('sistema.usuario.userIndex')->with('user', $user);
    }

    public function create()
    {
        $empleado = Empleado::select(DB::raw('CONCAT(em_paterno," ",em_materno," ",em_especial,", ",em_nombre) AS nombre_completo'),'id')
                                ->where('em_estado',1)
                                ->orderBy('em_paterno','DESC')
                                ->lists('nombre_completo','id');
        return view('sistema.usuario.userCreate')
                ->with('empleado', $empleado);
    }

    public function store(UsuarioRequest $request)
    {
        try
        {
            $user = new User($request->all());
            $user->password = bcrypt($request->input('password'));
            $empleado = Empleado::find($user->id_empleado);
            $user->usuario_fotografia = $empleado->em_fotografia;
            $user->usuario_nombre = ($empleado->em_nombre.' '.$empleado->em_paterno.' '.$empleado->em_materno);
            $user->save();
            flash('Se ha registrado de manera satisfactoria la cuenta de usuario :<b>'.$user->usuario_cuenta.'</b>','success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar agregar un nuevo usuario, '.$ex->getMessage(), 'danger');
        }
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('sistema.usuario.newPassword')->with('user', $user);
    }

    public function update(PasswordRequest $request, $id)
    {
        try
        {
            $user = User::find($id);
            $user->fill($request->all());
            $user->password = bcrypt($request->input('password'));
            $user->update();
            flash('Se actualizo de manera satisfactoria la contraseña del usuario : <b>'.$user->usuario_cuenta.'</b>, por lo que se recomienda salir y volver a ingresar al sistema', 'success');
        }
        catch(\Exception $ex)
        {
            flash('Ocurrió un problema al intentar actualizar la contraseña, error: '.$ex->getMessage(),'danger');
        }
        return redirect()->route('principal.index');
    }
}
