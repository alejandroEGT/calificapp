<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\User;
use Illuminate\Http\Request;

class cuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = Cuenta::where('estado_cuenta', 1)->count();
        $cuentas = Cuenta::where('estado_cuenta', 1)->get();

        return [
            'count' => $count,
            'cuentas' => $cuentas
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuenta = Cuenta::crear($request);
        if ($cuenta) {
           return "success okki!!";
        }
        return "filed =(";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Cuenta::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $cuenta = Cuenta::find($id);
        $cuenta->estado_cuenta = "2";
        if($cuenta->save()){
             $user = User::crear($cuenta, 2);
            if ($user) {
                return "Success ok!!!";
            }
            return "Failed =(";

        }
        return "false";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
