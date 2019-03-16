<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table="cuentas";

    protected function crear ($datos) {

    	$this->nombres = $datos->nombres;
    	$this->apellidos = $datos->apellidos;
    	$this->establecimiento = $datos->establecimiento;
    	$this->direccion = $datos->direccion;
    	$this->email = $datos->email;
    	$this->celular = $datos->celular;
    	$this->comentario = $datos->comentario;
    	$this->estado_cuenta = "1";

    	if ( $this->save() ) {
    		return true;
    	}
    	return false;
    }
}
