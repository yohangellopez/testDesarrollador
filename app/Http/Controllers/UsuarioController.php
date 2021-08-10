<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\EmailMailable;

class UsuarioController extends Controller
{

    public function create(Request $request){
        $datos_user = $request->input('datos_user', null);
        $params = json_decode($datos_user, true); //devuelve un objeto

        if(!empty($params)){
            //limpiar datos
            $params = array_map('trim', $params);

            //validamos los datos
            $validate = \Validator::make($params, [
                'nombre'      => 'required',
                'apellido'      => 'required',
                'sexo'      => 'in:Masculino,Femenino',
                'email'     => 'required|email|unique:usuarios',
                'password'  => 'required'
            ]);
            
            if($validate->fails()){
                $data = array(
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'El usuario no se ha creado',
                    'error' => $validate->errors()
                );
            }else{

                $usuario = User::create([
                    'nombre' => $params['nombre'],
                    'apellido' => $params['apellido'],
                    'sexo' => $params['sexo'],
                    'email' => $params['email'],
                    'password' => bcrypt($params['password']),
                ]);

                Mail::to($params['email'])->send(new EmailMailable($usuario));
                $data = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'El usuario se ha creado correctamente'
                );
            }
        }else{
            $data = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'Datos enviados de manera incorrecta'
            );
        }
        return response()->json($data, $data['code']);
    }
}
