<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $response = Http::get("https://jsonplaceholder.typicode.com/todos");
        $users = $response->getBody();
        $pUsers = json_decode($users);
        $arrUsers = array_slice($pUsers, 0, 10);

        return view('user::index', compact('arrUsers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */

    public function update(Request $request)
    {
        $id = $request->id;
        $response = Http::put("https://jsonplaceholder.typicode.com/todos/".$id,
        [
            'json' => $request->all()
        ]
    );
    $response = $response->body();

    return $response; //Retornamos el json que nos provee el resultado de la peticion put
                     //Nos devuelve un arreglo con los datos del usuario que habrian sido cambiados
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $response = Http::delete("https://jsonplaceholder.typicode.com/todos/".$id);
        $response = $response->body();

        return response()->json(["deletedUserId" => $id, "data"=> $response]);
       //Retornamos json con un parametro data que se encuentra vacio que nos devulve la peticion
       //ya que este seria el resultado en base de datos mas el userId del usuario que fue eliminado,
       //con el fin de usarlo para eliminar el registro de la lista en el componente que muestra los usuarios 

    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {   

        $response = Http::post("https://jsonplaceholder.typicode.com/todos/",
        [
            'json' => $request->all()
        ]);
    $response = $response->body(); 
    
    return $response; //Retornamos el json que nos devulve la peticion post con la información del nuevo usuario que habria sido almacenada en la base de datos
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('user::edit');
    }

}
