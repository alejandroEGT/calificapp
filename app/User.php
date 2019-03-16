<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function crear($datos, $tipo)
    {
        $pass = $this->generaPass();
        $this->nombres = $datos->nombres;
        $this->apellidos = $datos->apellidos;
        $this->email = $datos->email;
        $this->password = bcrypt($pass);
        $this->tipo_usuario = $tipo;
        if ($this->save()) {
            $this->enviar_correo($datos, $pass);
            return true;
        }
        return false;
    }

    protected function generaPass(){
        //Se define una cadena de caractares. Te recomiendo que uses esta.
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        //Obtenemos la longitud de la cadena de caracteres
        $longitudCadena=strlen($cadena);
         
        //Se define la variable que va a contener la contraseña
        $pass = "";
        //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
        $longitudPass=10;
         
        //Creamos la contraseña
        for($i=1 ; $i<=$longitudPass ; $i++){
            //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
            $pos=rand(0,$longitudCadena-1);
         
            //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }

    protected function enviar_correo ($datos, $pass){

        $para      = $datos->email;
        $titulo    = 'CREACIÓN DE CUENTA EN CALIFICAP!!';
        $mensaje   = "Hola SUPER USUARIO tu password para iniciar sesión es: ".$pass.", en el siguiente link: http://localhost:8000/#/login";
        $cabeceras = 'From: master@calificap.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($para, $titulo, $mensaje, $cabeceras);
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response([
                'status' => 'success',
                'data' => $user
            ]);
    }
    public function refresh()
    {
        return response([
                'status' => 'success'
            ]);
    }
}
