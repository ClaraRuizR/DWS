<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

require("../Infraestructura/usuarioAccesoDatos.php");

class UsuarioReglasNegocio
{

	function __construct()
    {
    }
    
    function verificar($usuario, $clave)
    {
        $usuariosDAL = new UsuarioAccesoDatos();

        if(strlen($clave) < 8){
            echo "<h3 style='background-color: rgb(162, 62, 62); text-align: center; color: white; padding: 10px'>Error: la contraseña debe ser de como mínimo 8 caracteres.</h3";
        }
        $res = $usuariosDAL->verificar($usuario,$clave);
        return $res;
    }
}

