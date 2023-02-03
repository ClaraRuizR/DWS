<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
class UsuarioAccesoDatos
{
	
	function __construct()
    {
    }

	function insertar($usuario,$perfil,$clave)
	{
		$conexion = mysqli_connect('localhost','root','root');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		
        mysqli_select_db($conexion, 'torneosTenisMesaDB');
		$consulta = mysqli_prepare($conexion, "INSERT INTO T_Usuarios(nombre, clave, perfil) VALUES (?,?,?);");
        $hash = password_hash($clave, PASSWORD_DEFAULT);
        $consulta->bind_param("sss", $usuario,$hash,$perfil);
        $res = $consulta->execute();
        
		return $res;
	}

    function verificar($usuario,$clave)
    {
        $conexion = mysqli_connect('localhost','root','root');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
        mysqli_select_db($conexion, 'torneosTenisMesaDB');
        $consulta = mysqli_prepare($conexion, "SELECT nombre, clave, perfil FROM T_Usuarios WHERE nombre = ?;");
        $sanitized_usuario = mysqli_real_escape_string($conexion, $usuario);       
        $consulta->bind_param("s", $sanitized_usuario);
        $consulta->execute();
        $res = $consulta->get_result();


        if ($res->num_rows==0)
        {
            return 'NOT_FOUNDa';
        }

        if ($res->num_rows>1) //El nombre de usuario debería ser único.
        {
            return 'NOT_FOUNDb';
        }

        $myrow = $res->fetch_assoc();
        $x = $myrow['clave'];
        if (password_verify($clave, $x))
        {
            return $myrow['perfil'];
        } 
        else 
        {
            return 'NOT_FOUNDc';
        }
    }
}
// $usuario = 'UsuarioErroneo';
// $clave = 'a';
// $usuariosDAL = new UsuarioAccesoDatos();
// $res = $usuariosDAL->insertar($usuario, 2, $clave);

// $usuario = 'Jugador';
// $clave = 'jugador1234';
// $res = $usuariosDAL->insertar($usuario, 1, $clave); 

// $usuario = 'Clara';
// $clave = 'clara1234';
// $res = $usuariosDAL->insertar($usuario, 2, $clave); 


// $usuario = 'UsuarioErroneo';
// $clave = 'a';
// $usuariosDAL = new UsuarioAccesoDatos();
// $res = $usuariosDAL->verificar($usuario, $clave);
// var_dump($res);