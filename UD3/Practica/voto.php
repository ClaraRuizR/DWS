<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);

    function obtenerDatosFicha($idPelicula){

        $conexion = mysqli_connect('localhost','root','root');
        
        if (mysqli_connect_errno()){
            echo "Error al acceder a MySQL: " . mysqli_connect_error();
        } 
        mysqli_select_db($conexion, 'cartelera2');
        
        $sanitizedId= mysqli_real_escape_string($conexion, $idPelicula);
    
        $consulta = "UPDATE T_Peliculas SET votos = votos + 1 WHERE ID = '".$sanitizedId. "';";    
        
        if(!isset($idPelicula)){
            $resultado = false;
        }else{
            $resultado = mysqli_query($conexion, $consulta);
        }

        if($resultado == false){
            $mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
            $mensaje .= 'Consulta realizada: ' . $consulta;
            die($mensaje);
    
        } else if ($resultado == true){
            echo "Voto guardado con éxito.";   
        }
    }

    

    function revisarId(){
        $idPelicula = "-";
        $id = 12;
        //$id= htmlspecialchars($_POST['id']);
        if(isset($id) && $id <= 10){
            
            $idPelicula = $id;
            return $idPelicula;

        } else{
            echo "Error: el ID introducido no corresponde a ninguna película.";
        }
    }

$idPelicula = revisarId();
var_dump($idPelicula);
$datos = obtenerDatosFicha($idPelicula);


//$idPelicula = htmlspecialchars($_POST['campo1']);

//Forzar un error con var_dump
//Probar una consulta erronea
//metodo externo para recibir la id

