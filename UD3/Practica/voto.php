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

         
        try{
            $resultado = mysqli_query($conexion, $consulta);
            
            if(!$resultado){
                $mensaje = 'Consulta inválida. ' .mysqli_error($conexion) . "\n";
                $mensaje .= 'Consulta realizada: ' . $consulta;
                die($mensaje);
        
            } else if ($resultado){
                echo "Voto guardado con éxito.";   
            }

        }catch(mysqli_sql_exception $e){
            echo "Consulta errónea: por favor, revisa la sintaxis de tu consulta.";
        }
        

        
    }

    

    function revisarId(){
        $idPelicula = "-";
        $id= htmlspecialchars($_POST['id']);
        if(isset($id)){
            
            $idPelicula = $id;
        }

        return $idPelicula;
    }

$idPelicula = revisarId();
$datos = obtenerDatosFicha($idPelicula);


//Filtros de ordenacion
//Hacer método para el titulo de la categoria
//Query con el director y losactores
